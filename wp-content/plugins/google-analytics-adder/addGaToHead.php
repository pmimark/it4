<?php
	$gaa_options = get_option('_google_analytics_adder_settings');
	$gaa_option_start = '_google_analytics_adder_general_';
if($gaa_options[$gaa_option_start.'is_analytics_enabled']){
	add_action('wp_head', 'gaa_addAnalytics');
}

function gaa_addAnalytics(){
	global $gaa_options;
	global $gaa_option_start;
 	$thedirectory = plugin_dir_path( __FILE__ );
	ob_start();
        //include $thedirectory.'template/templateRequirements.php';
        if($gaa_options[$gaa_option_start.'analytics_type'] == 'universal'){
        	include $thedirectory.'template/analytisJsTemplate.php';
        }
        else{
		include $thedirectory.'template/gaCodeTemplate2.php';
	}
	$out1 = ob_get_clean();
	echo $out1;
}
?>