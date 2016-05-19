<?php
/*
* Change admin login LOGO
*/
function smartcredit_logo() { 

/*

* we'll put our logo here, soon 

*/

?>

    <style type="text/css">

        body.login div#login h1 a {

		

            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/site-login-logo.png);

            padding-bottom: 30px;

        }

    </style>

<?php }

add_action( 'login_enqueue_scripts', 'smartcredit_logo' );

add_filter('wp_nav_menu_

items', 'do_shortcode');



add_action('wp_logout', 'go_home');


add_filter( 'wpmem_login_redirect', 'my_login_redirect' );

function my_login_redirect()
{
	// return the url that the login should redirect to
	return 'https://gocreditreport.co.uk';
}



/*

*	Function Name: go_home

*	Method: redirects a member or user to homepage when logged-out

*	Date Added: 5/28/2015

*	Author: Dev Lnitor

*/

function go_home(){

	wp_redirect(home_url());

	exit;

}



function sc_logout() {

	return wp_logout_url();

}



function sc_login() {

	return wp_nonce_url(get_site_url().'/wp-login.php?action=login');

}


function advertisement_script( $atts ) {
	return '<script language="javascript" type="text/javascript" src="//become.successfultogether.co.uk/view.asp?ref=739032&site=12752&type=html&hnb=6&js=1"></script>
	<noscript>
		<a href="//being.successfultogether.co.uk/click.asp?ref=739032&site=12752&type=b1&bnb=1" target="_blank">
			<img src="//become.successfultogether.co.uk/view.asp?ref=739032&site=12752&b=1" border="0" title="250x250" alt="250x250"/>
		</a><br />
	</noscript>';
}

add_shortcode("sc_logout", "sc_logout");

add_shortcode("sc_login", "sc_login");

add_shortcode("advertisement_script", "advertisement_script");



/*

*	Function Name: restrict_admin

*	Method: restricts only the wp dashboard to admin only, redirect users to homepage

*	Date Added: 5/23/2015

*	Author: Dev Lnitor

*/

function restrict_admin()

{

	if ( ! current_user_can( 'manage_options' ) && '/wp-admin/admin-ajax.php' != $_SERVER['PHP_SELF'] ) {

                wp_redirect( site_url() );

	}

}

add_action( 'admin_init', 'restrict_admin', 1 );



/*

*	Function Name: pu_login_failed

*	Method: Fail login attemp if logging-in with wrong username or password

*	Date Added: 5/23/2015

*	Author: Dev Lnitor

*/

add_action( 'wp_login_failed', 'pu_login_failed' ); // hook failed login



function pu_login_failed( $user ) {

  	// check what page the login attempt is coming from

  	$referrer = $_SERVER['HTTP_REFERER'];

  	// var_dump($referrer);die;

  	// check that were not on the default login page

	if ( !empty($referrer) && $user!=null ) {

		// make sure we don't already have a failed login attempt

		if ( !strstr($referrer, '?login=failed' )) {

			// Redirect to the login page and append a querystring of login failed

	    	wp_redirect( $referrer . '?login=failed');

	    } else {

	      	wp_redirect( $referrer );

	    }



	    exit;

	}

}



/*

*	Function Name: pu_blank_login

*	Method: Fail login attemp if logging-in with empty fields

*	Date Added: 5/23/2015

*	Author: Dev Lnitor

*/

add_action( 'authenticate', 'pu_blank_login');

function pu_blank_login( $user ){

  	// check what page the login attempt is coming from

  	$referrer = $_SERVER['HTTP_REFERER'];



  	$error = false;



  	if($_POST['log'] == '' || $_POST['pwd'] == '')

  	{

  		$error = true;

  	}



  	



  	// check that were not on the default login page

  	if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') && $error ) {

  		// make sure we don't already have a failed login attempt

    	if ( !strstr($referrer, '?login=failed') ) {

    		// Redirect to the login page and append a querystring of login failed

        	wp_redirect( $referrer . '?login=failed' );

      	} else {

        	wp_redirect( $referrer );

      	}



    exit;



  	}

}



if(!class_exists('VcSharedLibrary')){

	include_once('include/VcSharedLibrary.php');

}



/**

 * @param string $asset

 *

 * @return array

 */

function SC_getVcShared( $asset = '' ) {

	switch ( $asset ) {

		case 'colors':

			return SC_VcSharedLibrary::getColors();

			break;



		case 'icons':

			return SC_VcSharedLibrary::getIcons();

			break;



		case 'sizes':

			return SC_VcSharedLibrary::getSizes();

			break;



		case 'button styles':

		case 'alert styles':

			return SC_VcSharedLibrary::getButtonStyles();

			break;

		case 'message_box_styles':

			return SC_VcSharedLibrary::getMessageBoxStyles();

			break;

		case 'cta styles':

			return SC_VcSharedLibrary::getCtaStyles();

			break;



		case 'text align':

			return SC_VcSharedLibrary::getTextAlign();

			break;



		case 'cta widths':

		case 'separator widths':

			return SC_VcSharedLibrary::getElementWidths();

			break;



		case 'separator styles':

			return SC_VcSharedLibrary::getSeparatorStyles();

			break;



		case 'separator border widths':

			return SC_VcSharedLibrary::getBorderWidths();

			break;



		case 'single image styles':

			return SC_VcSharedLibrary::getBoxStyles();

			break;



        case 'toggle styles':

            return SC_VcSharedLibrary::getToggleStyles();

            break;



		default:

			# code...

			break;

	}



	return '';

}



if(class_exists("WPBakeryShortCode"))

{

	include_once("include/sc_button.php");

}

// Hook in
add_filter( 'woocommerce_checkout_fields' , 'inoplugs_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function inoplugs_override_checkout_fields( $fields ) {
$fields['billing']['billing_postcode']['label'] = 'Post Code';
$fields['shipping']['shipping_postcode']['label'] = 'Post Code';
return $fields;
}

//* Sample in how to make Shorcode without attributes
function MM_Form_Button_Label( $atts ){
	$freeMember = do_shortcode('[MM_Form_Button type="all" label="Sign Up" color="orange"]');
	$premiumMember = do_shortcode('[MM_Form_Button type="all" label="Checkout Using Credit/Debit Card" color="orange"]');
	if( isset( $_GET['rid']) && $_GET['rid'] == "p74et3"){
		return $premiumMember;
	}
	else {
		return $freeMember;
	}
}
add_shortcode( 'MM_Form_Button_Label', 'MM_Form_Button_Label' );
