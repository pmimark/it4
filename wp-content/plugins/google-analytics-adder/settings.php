<?php

class GoogleAnalyticsAdder{

    private $plugin_path;
    private $plugin_url;
    private $l10n;
    private $googleAnalyticsAdder;
    private $namespace = _google_analytics_adder;
    private $settingName = 'Google Analytics Adder';

    function __construct() 
    {	
        $this->plugin_path = plugin_dir_path( __FILE__ );
        $this->plugin_url = plugin_dir_url( __FILE__ );
        $this->l10n = 'wp-settings-framework';
        add_action( 'admin_menu', array(&$this, 'admin_menu'), 99 );
        
        // Include and create a new WordPressSettingsFramework
        require_once( $this->plugin_path .'wp-settings-framework.php' );
        $settings_file = $this->plugin_path .'settings/settings-general.php';
        
        $this->googleAnalyticsAdder = new WordPressSettingsFramework( $settings_file, $this->namespace, $this->get_settings() );
       
    }
    
    function admin_menu()
    {
        $page_hook = add_menu_page( __( $this->settingName, $this->l10n ), __( $this->settingName, $this->l10n ), 'update_core', $this->settingName, array(&$this, 'settings_page') );
        add_submenu_page( $this->settingName, __( 'Settings', $this->l10n ), __( 'Settings', $this->l10n ), 'update_core', $this->settingName, array(&$this, 'settings_page') );
    }
    
    function settings_page()
	{
	    // Your settings page
	    
	    ?>
		<div class="wrap">
			<div id="icon-options-general" class="icon32"></div>
			<h2><?php $this->settingName ?></h2>
			
			<h3>Google Analytics Adder</h3>
			<p>Easily add your Google Analytics code to your site.</p>	
			<?php //$this->plugin_template_stylesheet(); 
			?>			
			
			<?php 
			// Output your settings form
			$this->googleAnalyticsAdder->settings(); 
			?>
			
		</div>
		<?php
		
	}
	
	function validate_settings( $input )
	{
	    // Do your settings validation here
	    // Same as $sanitize_callback from http://codex.wordpress.org/Function_Reference/register_setting
    	return $input;
	}
	
	
        
        function get_settings(){
        	$wpsf_settings[] = array(
		    'section_id' => 'general',
		    'section_title' => $this->settingName.' Settings',
		    //'section_description' => 'Some intro description about this section.',
		    'section_order' => 5,
		    'fields' => array(
			    		array(
				            'id' => 'is_analytics_enabled',
				            'title' => 'Activate Google Analytics',
				            'desc' => 'Check here to turn on Google Analytics for your site.',
				            'type' => 'checkbox',
				            'std' => 0
				        ),
			      		 array(
				            'id' => 'ua_code',
				            'title' => 'UA Code',
				            'desc' => 'Place the UA code for your Google Analytics code here.',
				            'type' => 'text',
				            'std' => '',
				        ),
				        array(
				            'id' => 'analytics_type',
				            'title' => 'Analytics Type',
				            'desc' => "Choose analytics.js if you are using Universal Analytics.  Set a php global variable \$ga_userId if you want to use Google's User Id tracking.",
				            'type' => 'radio',
				            'std' => 'ga',
				            'choices' => array(
				                'ga' => 'ga.js',
				                'universal' => 'analytics.js',
				            )
				        ),
				        /*
				         array(
				            'id' => 'ua_domain',
				            'title' => 'Domain',
				            'desc' => 'Place the domain name for your Google Analytics code here without subdomain (i.e. example.com).',
				            'type' => 'text',
				            'std' => '',
				        ), 
				        */             
		        )
		        
        
    );
    return $wpsf_settings;
        }
 

}
new GoogleAnalyticsAdder();

?>