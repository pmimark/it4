<?php
/**
 *
 *
 * MemberMouse(TM) (http://www.membermouse.com)
 * (c) MemberMouse, LLC. All rights reserved.
 **/
class MM_Session
{
	public static $MM_SESSION_DIRTY = false;
	public static $MM_SESSION_DATA = null;
	public static $MM_SESSION_ID = null;
	public static $MM_SESSION_TIMESTAMP = null;
	public static $MM_SESSION_EXISTS = null;
	public static $MM_SESSION_VALID = null;
	public static $MM_SESSION_LIFESPAN = 1200;
	public static $MM_COOKIE_ID = null;
	public static $KEY_IMPORT_MEMBERS = "import-members";
	public static $KEY_CURR_USER_ID = "current-user-id";
	public static $KEY_LAST_USER_ID = "last-user-id";
	public static $KEY_LAST_COUPON_VALUE = "last-coupon";
	public static $KEY_UPDATE_USER_ID = "update-user-id";
	public static $KEY_LAST_ORDER_ID = "last-order-id";
	public static $KEY_LAST_FORM = "last-form";
	public static $KEY_LOGIN_FORM_USER_ID = "login-form-user-id";
	public static $KEY_LOGIN_FORM_USERNAME = "login-form-username";
	public static $KEY_ERRORS = "errors";
	public static $KEY_MESSAGES = "messages";
	public static $KEY_CHECKOUT_FORM = "checkout-form";
	public static $KEY_SMARTTAGS = "smarttags";
	public static $KEY_MM_LICENSE = "license";
	public static $KEY_CSV = "csv";
	public static $KEY_PREVIEW_MODE = "preview";
	public static $KEY_USING_DB_CACHE = "using_db_cache";
	public static $KEY_TRANSACTION_KEY = "transaction_key";
	public static $PARAM_LOGIN_TOKEN = "reftok";
	public static $PARAM_USER_ID = "user_id";
	public static $PARAM_MESSAGE_KEY = "message";
	public static $PARAM_COMMAND_DEACTIVATE = "mm-deactivate";
	public static $PARAM_SUBMODULE = "submodule";
	public static $PARAM_USER_DATA_PASSWORD = "user-data-password";

	public static function value($name, $val = null)
	{
		self::sessionSetTimestamp ();

		if (self::sessionExists () && self::sessionLoad ())
		{
			if (! is_null ( $val ))
			{
				self::$MM_SESSION_DIRTY = (! isset ( self::$MM_SESSION_DATA [MM_PREFIX . $name] ) || self::$MM_SESSION_DATA [MM_PREFIX . $name] != $val);
				self::$MM_SESSION_DATA [MM_PREFIX . $name] = $val;
			}

			if (isset ( self::$MM_SESSION_DATA [MM_PREFIX . $name] ))
			{
				return self::$MM_SESSION_DATA [MM_PREFIX . $name];
			}
		}
		else
		{
			self::sessionStart ();
			return self::value ( $name, $val );
		}

		return false;
	}


	public static function clear($name)
	{
		self::sessionSetTimestamp ();

		if (self::sessionExists () && self::sessionLoad ())
		{
			self::$MM_SESSION_DATA [MM_PREFIX . $name] = null;
			unset ( self::$MM_SESSION_DATA [MM_PREFIX . $name] );
		}
	}


	/**
	 * Start a new session
	 */
	private static function sessionStart()
	{
		global $wpdb;

		setcookie ( self::getCookieId (), self::getSessionId (), 0, '/' );
		$_COOKIE [self::getCookieId ()] = self::getSessionId ();

		self::$MM_SESSION_EXISTS = true;
		self::$MM_SESSION_VALID = true;

		$wpdb->insert ( MM_TABLE_SESSIONS, array (
				'id' => self::getSessionId (),
				'data' => serialize ( array () ),
				'insert_date' => self::$MM_SESSION_TIMESTAMP,
				'update_date' => self::$MM_SESSION_TIMESTAMP,
				'expiration_date' => strftime ( "%Y-%m-%d %H:%M:%S", strtotime ( self::$MM_SESSION_TIMESTAMP ) + self::$MM_SESSION_LIFESPAN )
		) );

		self::$MM_SESSION_DATA = array ();
	}


	/**
	 * Load the session data from the database into memory for quicker access
	 */
	private static function sessionLoad()
	{
		global $wpdb;

		if (is_null ( self::$MM_SESSION_DATA ))
		{
			self::$MM_SESSION_ID = $_COOKIE [self::getCookieId ()];

			$results = $wpdb->get_results ( "SELECT `data` FROM `" . MM_TABLE_SESSIONS . "` WHERE `id` = '" . $_COOKIE [self::getCookieId ()] . "' AND `expiration_date` >= '" . self::$MM_SESSION_TIMESTAMP . "'" );

			switch (true)
			{
				case isset ( $results [0]->data ) :
					self::$MM_SESSION_DATA = unserialize ( $results [0]->data );
					break;
				default :
				  self::$MM_SESSION_DIRTY = false;
        	self::$MM_SESSION_DATA = null;
        	self::$MM_SESSION_ID = null;
        	self::$MM_SESSION_TIMESTAMP = null;
        	self::$MM_SESSION_EXISTS = null;
        	self::$MM_SESSION_VALID = null;
        	self::$MM_COOKIE_ID = null;
        	self::sessionSetTimestamp ();
					return false;
					break;
			}
		}
		return true;
	}


	/**
	 * Called upon wordpress' shutdown hook.
	 * Write session data that's currently stored in memory to database
	 */
	public static function sessionWrite()
	{
		global $wpdb;

		// if (self::sessionExists () && self::sessionLoad () && self::$MM_SESSION_DIRTY)
		if (self::sessionExists () && self::sessionLoad ())
		{
			/**
			 * Since this method is publicly accessible, we can't be certain the timestamp has been
			 * set, so let's set it prior to updating the expiration date of the Session
			 */
			self::sessionSetTimestamp ();

			// We don't want to store the MM User Data Password in the database, so let's clear it before we write the session to the db
			if(self::value(self::$PARAM_USER_DATA_PASSWORD) !== false)
			{
				self::clear(MM_Session::$PARAM_USER_DATA_PASSWORD);
			}
			
			$wpdb->update ( MM_TABLE_SESSIONS, array (
					'data' => serialize ( self::$MM_SESSION_DATA ),
					'update_date' => self::$MM_SESSION_TIMESTAMP,
					'expiration_date' => strftime ( "%Y-%m-%d %H:%M:%S", strtotime ( self::$MM_SESSION_TIMESTAMP ) + ((self::value("MM_SESSION_LIFESPAN")) ? self::value("MM_SESSION_LIFESPAN") : self::$MM_SESSION_LIFESPAN) )
			), array (
					'id' => self::getSessionId ()
			) );
		}
	}


	/**
	 * Delete expired sessions
	 */
	public static function sessionReap()
	{
		global $wpdb;

		$wpdb->query ( "DELETE FROM `" . MM_TABLE_SESSIONS . "` WHERE `expiration_date` < '" . self::$MM_SESSION_TIMESTAMP . "'" );

		if (! self::sessionLoad ())
		{
			$_COOKIE [self::getCookieId ()] = null;
			unset ( $_COOKIE [self::getCookieId ()] );
			setcookie ( self::getCookieId (), '', time () - 3600, '/' );
		}
	}


	/**
	 * Set the timestamp if it isn't already set.
	 * This is used to check for expired sessions
	 * to reap and also to set the xpiration date of a new and/or updated session
	 */
	private static function sessionSetTimestamp()
	{
		if (is_null ( self::$MM_SESSION_TIMESTAMP ))
		{
			self::$MM_SESSION_TIMESTAMP = strftime ( "%Y-%m-%d %H:%M:%S" );
		}
	}


	/**
	 * Generate the unnique/random Session ID
	 */
	private static function generateSessionId()
	{
		$entropy = "";
		
		try 
		{
			$throwException = TRUE;
			
			if($allowedPaths = ini_get('open_basedir'))
			{
				foreach(explode(":", $allowedPaths) as $path)
				{	
					if(preg_match("/^\/dev([\/]?)$/", $path))
					{
						$throwException = FALSE;
					}
				}
			}
			else
			{
				$throwException = FALSE;
			}
			
			if($throwException || !is_readable ( "/dev/urandom" ))
			{
				throw new Exception();
			}

			$handle = fopen ( '/dev/urandom', 'rb' );
			$entropy = md5 ( fread ( $handle, 64 ) );
			fclose ( $handle );
			
		}
		catch(Exception $e)
		{
			if (( double ) phpversion () >= 5.3 && function_exists ( "mcrypt_create_iv" ))
			{
				$entropy = md5 ( mcrypt_create_iv ( 64, MCRYPT_DEV_URANDOM ) );
			}
			else
			{
				$entropy = md5 ( AUTH_KEY );
			}
		}

		$microtime = array_reverse ( str_split ( $microtime = preg_replace ( "/[^0-9]+/", "", microtime ( true ) ), ceil ( strlen ( $microtime ) / 4 ) ) );
		$ip = array_reverse ( str_split ( $ip = preg_replace ( "/[^0-9]+/", "", $_SERVER ['REMOTE_ADDR'] ), ceil ( strlen ( $ip ) / 4 ) ) );
		$entropy = ($entropy) ? array_reverse ( str_split ( $entropy, ceil ( strlen ( $entropy ) / 4 ) ) ) : array ();

		$data = array ();
		switch (true)
		{
			case count ( $microtime ) >= count ( $ip ) && count ( $microtime ) >= count ( $entropy ) :
				$data [] = $microtime;
				$data [] = $ip;
				$data [] = $entropy;
				break;

			case count ( $ip ) >= count ( $microtime ) && count ( $ip ) >= count ( $entropy ) :
				$data [] = $ip;
				$data [] = $microtime;
				$data [] = $entropy;
				break;

			case count ( $entropy ) >= count ( $microtime ) && count ( $entropy ) >= count ( $ip ) :
			default :
				$data [] = $entropy;
				$data [] = $ip;
				$data [] = $entropy;
				break;
		}

		$result = array ();

		foreach ( $data [0] as $i => $chunk )
		{
			$result [] = $chunk;

			foreach ( $data as $j => $subdata )
			{
				if ($j != 0 && isset ( $subdata [$i] ) && $subdata [$i])
				{
					$result [] = $subdata [$i];
				}
			}
		}

		return md5 ( implode ( "", $result ) );
	}


	/**
	 * Get the Cookie ID.
	 * If one doesn't exists, create it first, then return it.
	 */
	private static function getCookieId()
	{
		if (is_null ( self::$MM_COOKIE_ID ))
		{
			$site_url_data = parse_url ( site_url () );
			self::$MM_COOKIE_ID = "mm_" . md5 ( $site_url_data ['host'] );
		}

		return self::$MM_COOKIE_ID;
	}


	/**
	 * Get the Session ID. If one doesn't exists, create it first, then return it.
	 */
	public static function getSessionId()
	{
		if (is_null ( self::$MM_SESSION_ID ))
		{
			self::$MM_SESSION_ID = self::generateSessionId ();
		}

		return self::$MM_SESSION_ID;
	}


	/**
	 * Checks to see if the session even exists
	 */
	private static function sessionExists()
	{
		if (is_null ( self::$MM_SESSION_EXISTS ))
		{
			if (! isset ( $_COOKIE [self::getCookieId ()] ) || ! $_COOKIE [self::getCookieId ()])
			{
				self::$MM_SESSION_EXISTS = false;
			}
			else
			{
				self::$MM_SESSION_EXISTS = true;
			}
		}

		return self::$MM_SESSION_EXISTS;
	}
	
	public static function sessionSetSessionLifespan($lifespan=null)
	{
  	if(is_null($lifespan))
  	{
    	self::clear("MM_SESSION_LIFESPAN");
  	}
  	else
  	{
      self::value("MM_SESSION_LIFESPAN", $lifespan);	
      return $lifespan;
  	}
	}
}
?>