<?php
/*
Plugin Name: PMPro Customizations
Plugin URI: http://www.paidmembershipspro.com/wp/pmpro-customizations/
Description: Customizations for Paid Memberships Pro
Version: .1
Author: Stranger Studios
Author URI: http://www.strangerstudios.com
*/

function my_pmprorh_init()
{
	//don't break if Register Helper is not loaded
	if(!function_exists("pmprorh_add_registration_field"))
	{
		return false;
	}

	global $pmprorh_options;
	//$pmprorh_options["register_redirect_url"] = home_url("/tools/rq/");
	//$pmprorh_options["use_email_for_login"] = true;
	//$pmprorh_options["directory_page"] = "/directory/";
	//$pmprorh_options["profile_page"] = "/profile/";

	$fields = array();
	$fields[] = new PMProRH_Field("address", "text", array("size"=>164, "class"=>"address", "profile"=>true, "required"=>false));
	$fields[] = new PMProRH_Field("phone", "text", array("size"=>40, "class"=>"phone", "profile"=>true, "required"=>true));
	
	foreach($fields as $field){
    	pmprorh_add_registration_field("after_username", $field);
    }
}
add_action("init", "my_pmprorh_init");