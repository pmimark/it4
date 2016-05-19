<?php

function brad_scripts_basic() { 
    
	if(!is_admin()  && !in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ):
	 
	 wp_reset_query();
	 global $brad_includes , $post , $brad_data;
	 
	 $js_min = '';
	 if( $brad_data['minify_scripts'] == true){
		 $js_min = '.min';
	 }
	 
	/* ------------------------------------------------------------------------ */
	/* Register Scripts */
	/* ------------------------------------------------------------------------ */
	wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr.js', '', null, TRUE);
	wp_register_script('prettyPhoto', get_template_directory_uri() . '/js/prettyPhoto.js', array(), null, TRUE);
	wp_register_script('waypoints', get_template_directory_uri() . '/js/jquery.waypoints.js', array(), null, TRUE);
	wp_register_script('isotope', get_template_directory_uri() . '/js/isotope.js', array(), null, TRUE);
	wp_register_script('infiniteScroll', get_template_directory_uri() . '/js/jquery.infinitescroll'.$js_min.'.js', null, '', TRUE);
	wp_register_script('fitvids', get_template_directory_uri() . '/js/fitvids'.$js_min.'.js', array(), null, TRUE);
	wp_register_script('bxslider', get_template_directory_uri() . '/js/bxslider'.$js_min.'.js', array(), null, TRUE);
	wp_register_script('caroufred', get_template_directory_uri() . '/js/caroufred.js', array(), null, TRUE);
	wp_register_script('bootstrap.carousel', get_template_directory_uri() . '/js/bootstrap.carousel'.$js_min.'.js', array(), null, TRUE);
    wp_register_script('mediaelement', get_template_directory_uri() . '/js/mediaelement-and-player.min.js', array(), null, TRUE);
	wp_register_script('plugins', get_template_directory_uri() . '/js/plugins.js', array(), null, TRUE);
	wp_register_script('skrollr', get_template_directory_uri() . '/js/skrollr.js', array(), null, TRUE);
	wp_register_script('gmaps', 'http://maps.google.com/maps/api/js?sensor=false', array(), null, TRUE);
	wp_register_script('infobox', 'http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js', array(), null, TRUE);
	wp_register_script('jquery.scrollTo', get_template_directory_uri() . '/js/jquery.scrollTo.min.js', array(), null, TRUE);
	wp_register_script('jquery.imagesloaded', get_template_directory_uri() . '/js/imagesloaded.js', array(), null, TRUE);
	wp_register_script('jquery.queryloader2', get_template_directory_uri() . '/js/jquery.queryloader2'.$js_min.'.js', array(), null, TRUE);
	wp_register_script('main', get_template_directory_uri() . '/js/main'.$js_min.'.js', array(), null, TRUE);
    /* -----------------------------------------------------------------S------- */
	/* Enqueue Scripts */
	/* ------------------------------------------------------------------------ */
	wp_enqueue_script( 'jquery', false, array(), null, true);
	wp_enqueue_script('modernizr');
	wp_enqueue_script('fitvids');
	wp_enqueue_script('prettyPhoto');
	wp_enqueue_script('plugins');
	wp_enqueue_script('skrollr');
	wp_enqueue_script('jquery.imagesloaded');
	wp_enqueue_script('jquery.scrollTo');
	
	if( $brad_data['check_loader'] == true){
	    wp_enqueue_script('jquery.queryloader2');
	}
	
	wp_enqueue_script('waypoints');
	if($brad_includes['load_gmap'] == true ){
	     wp_enqueue_script('gmaps');
		 if(!empty($brad_includes["global_mapData"])){
			    wp_localize_script('gmaps', 'global_mapData', $brad_includes["global_mapData"]);
		    }
		  wp_enqueue_script('infobox');	
	}
	if( $brad_includes['load_bootstrapCarousel'] == true){
        wp_enqueue_script('bootstrap.carousel');
	}
	if($brad_includes['load_isotope']  == true){
	    wp_enqueue_script('isotope');
	}
	if($brad_includes['load_infiniteScroll']  == true){
	     wp_enqueue_script('infiniteScroll');
	}
	if($brad_includes['load_bxslider']  == true){
	    wp_enqueue_script('bxslider');
	}
	if($brad_includes['load_caroufred']  == true){
	    wp_enqueue_script('caroufred');
	}
	if( $brad_includes['load_mediaelement']  == true){
	    wp_enqueue_script('mediaelement');
	}
  	wp_enqueue_script('main');
	
	// add some additional data
    wp_localize_script( 'main', 'main', array(
			'url' => get_template_directory_uri() ,
			'nomoreposts' => __('No more Posts to Load','brad-framework') ,
			'nomoreprojects' => __('No more Projects to Load','brad-framework') ,
			'ajaxurl'	=> admin_url( 'admin-ajax.php' ) ,
			'contactNonce' => wp_create_nonce( 'brad_contact_form' ) ,
			'lightboxArg' => array(
			'animation_speed' => strtolower($brad_data["lightbox_animation_speed"]) ,
			'overlay_gallery' => $brad_data["lightbox_gallery"] ? true : false ,
			'autoplay_slideshow' => $brad_data["lightbox_autoplay"] ? true : false,
			'slideshow' => $brad_data['lightbox_slideshow_speed'] ,
			'theme' => $brad_data['lightbox_theme'] ,
			'opacity' => $brad_data['lightbox_opacity'],
			'show_title' => $brad_data["lightbox_title"] ? true : false,
			'social_tools' => $brad_data["lightbox_social"] ? true : false ,
			'disable_for_sma' => $brad_data["lightbox_smartphones"]  ? true : false
		)
		) );
		
		
	//comments
	if ( is_singular() && comments_open()  )
	    wp_enqueue_script('comment-reply');	
		
	endif;
		
    } 

 add_action( 'wp_footer' , 'brad_scripts_basic' , 10 ); 
?>