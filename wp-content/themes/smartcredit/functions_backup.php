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

function sc_logout() {
	return wp_logout_url();
}

function sc_login() {
	return wp_nonce_url(get_site_url().'/wp-login.php?action=login');
}

add_shortcode("sc_logout", "sc_logout");
add_shortcode("sc_login", "sc_login");

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