<?php

/*---------------------------------------------------*/
/* Social Share
/*---------------------------------------------------*/
add_shortcode('share_box','brad_share_box');
function brad_share_box( $atts , $content = null) {
	global $post , $brad_includes;
	 $output = '';
	 extract(shortcode_atts(array(
	  'fb'  =>  'yes' ,
	  'te'  =>  'yes' ,
	  'gp'  =>  'yes' ,
	  'li'  =>  'yes' ,
	  'pin'  =>  'yes' 
	  ),$atts));
	  
	  $output .= '<div class="post-share clearfix"><h4 class="share-label">'. __('Share','brad') .'</h4><ul class="post-share-menu">';
	  
	  if($fb == 'yes'): 
          $output .= '<li><a href="http://www.facebook.com/sharer.php?u='. get_the_permalink($post->ID) .'&amp;t='. get_the_title() .'"  class="facebook-share"><i class="fa-facebook"></i></a></li>';
	  endif;
	  
	  if($tw == 'yes'): 
          $output .= '<li ><a href="http://twitter.com/home?status='. get_the_title() .' '. get_the_permalink($post->ID) .'" class="twitter-share"><i class="fa-twitter"></i></a></li>';
	  endif;
	  
	  if($li == 'yes'): 
          $output .= '<li><a href="http://linkedin.com/shareArticle?mini=true&amp;url='. get_the_permalink($post->ID) .'&amp;title='. get_the_title() .'" class="linkedin-share"><i class="fa-linkedin"></i></a></li>';
	  endif;
	  
	  if($pin == 'yes'): 
          $output .= '<li ><a href="http://pinterest.com/pin/create/button/?url='. urlencode(get_the_permalink($post->ID)) .'&amp;description='. urlencode(get_the_title()) .'&amp;" class="pinterest-share"><i class="fa-pinterest"></i></a></li>';
	  endif;
	  
	  if($gp == 'yes'): 
          $output .= '<li><a href="https://plus.google.com/share?url='.get_the_permalink($post->ID).'"  class="google-share"><i class="fa-google-plus"></i></a></li>';
	  endif;
	  
	  $output .= '</ul></div>';
	  
	  return $output;
}
	  
/*---------------------------------------------------*/
/* Slidr Shortcode 
/*---------------------------------------------------*/
add_shortcode('bradslider','brad_bradslider');
function brad_bradslider( $atts , $content = null) {
	global $post , $brad_includes;
	 static $slider_id = 1;
	 $output = '';
	 extract(shortcode_atts(array(
	  'category'  =>  '' , 
	  'type'  => 'gallery',
	  'effect'   => 'fade',
	  'post_category' => '' ,
	  'order'           => 'date',
	  'orderby'         => 'DESC',
	  'show_excerpt'  => 'yes' ,
	  'show_categories' => 'yes' ,
	  'show_date' => 'yes',
	  'show_readmore' => 'yes' ,
	  'max'         => 10 ,
	  'excerpt_length'  => '20' ,
	  'max_width' => '1210px' ,
	  'height'      =>  '500' ,  
	  'fullheight'  =>  'no' , 
	  'swipe'  => 'yes' , 
	  'parallax'    =>  'no' ,
	  'navigation'  => 'yes',
	  'pagination'  => 'yes',
	  'responsive_height' => 'yes',
	  'interval'  => '5000',
	  'header_slider' => 'no',
	  'autoplay'    => '0'
	  ),$atts));
	  
 if( $type == 'post'){
	 $args = array(
	    'post_type' => 'post',
	    'post_status' => 'publish',
	    'posts_per_page' => (int)$max,
		'order'          => $order,
		'orderby'        => $orderby
         );
		 
	 if(!empty($post_category)){
			$cat_id = explode(',', $post_category );
			$args['tax_query'] = array(
				array(
				 'taxonomy' => 'category',
				 'field' => 'slug',
				 'terms' => $cat_id
				     )
			     );
		}
 }
 
 else{
	 $args = array(
		   'post_type' => 'bradslider',
		   'post_status' => 'publish',
		   'order' => 'DESC', 
		   'orderby' => 'menu_order' ,
		   'posts_per_page' => -1
	   );
       if( $category != ''):
		 $cat_slug = explode(',', $category );
		 $args['tax_query'] = array(
			array(
			  'taxonomy' => 'bradslider-category',
			  'field' => 'slug',
			  'terms' => $cat_slug
			  )
		 );
	  endif;
	}
			  
	 $pagination_lines = '';
	 $slides_count = 0;
	 $height = intval($height > 0) ? $height : 500;
	 $carousels = new WP_Query($args);
	 if( $carousels -> have_posts()):
	 
	 $style =  $parallax_script1 = $parallax_script2 = $parallax_script3 =  '';

	 
	 if($parallax == 'yes'){
		 $parallax_script2 = ' data-start="transform: translateY(0px); opacity:1;" data-300="transform: translateY(-100px);opacity:0;"';
		 $parallax_script1 = ' data-start="transform: translateY(0px);" data-1440="transform: translateY(-500px);"';
		 $parallax_script3 = ' data-start="opacity: 1;" data-300="opacity:0;"';
	 }
	
	 if($fullheight != 'yes'){
		 $style = 'height:'.$height.'px; max-height:'.$height.'px;';
	 }

    
	$output .= "<style type='text/css' scoped>#brad_slider{$slider_id} .carousel-caption-content { max-width:{$max_width};}</style>";
	 
	 $output .= '<div class="brad-slider-wrapper" style="'.$style.'"><div id="brad_slider'.$slider_id.'" class="carousel brad-slider slide '. $effect .' fullheight-'. $fullheight .' header-slider-'. $header_slider .' navigation-'.$navigation.'" data-height="'.$height.'"  data-fullheight='.$fullheight.'  data-rs-height="'. $responsive_height .'" data-interval="'.$interval.'" " data-swipe="'.$swipe.'" style="'.$style.'"><div class="carousel-preloader"><div class="spinner"></div><img src="'.get_template_directory_uri().'/images/loader.gif" /></div><div class="carousel-inner parallax-slider-'. $parallax .'" '. $parallax_script1 .'>';
	 
	 
	 while($carousels->have_posts()): $carousels->the_post();
	 
	   if( $type == 'post'){
		   
		   if(has_post_thumbnail()){
			 $slider_title = get_the_title();
			 $slider_excerpt = brad_limit_words(get_the_excerpt(),intval($excerpt_length));
			 $slider_date = get_the_date();
			 $slider_image = wp_get_attachment_image_src(get_post_thumbnail_id(), '');
			 $slider_btn_link = get_permalink();
			 $slider_color =  get_post_meta($post->ID,'brad_slider_color',true);
		     $slider_bg_opacity = get_post_meta($post->ID,'brad_slider_bg_opacity',true);
			 $slider_bg_color = get_post_meta($post->ID,'brad_slider_bg_color',true);
			 $slider_button_style = get_post_meta($post->ID,'brad_slider_button_style',true);
			 $slider_style = 'opacity:'. $slider_bg_opacity .'; filter:alpha(opacity='. intval($slider_bg_opacity*100). ');';
			 $slider_bg_cover = get_post_meta($post->ID,'brad_slider_bg_cover' , true);
		     $slider_bg_repeat = get_post_meta($post->ID,'brad_slider_bg_repeat' , true);
		     $slider_bg_pos = get_post_meta($post->ID,'brad_slider_bg_pos' , true);
			 
			 if($slider_bg_color != ''){
				 $slider_style .= 'background-color:'. $slider_bg_color. ';';
			 }
			 
			 
			 $output .= '<div class="item"  data-header-scheme="header-scheme-'. $slider_color .'"  data-slider-scheme="color-'.$slider_color.'"><div class="image bg-cover-'.$slider_bg_cover.'" style="background-image:url('. $slider_image[0] .'); background-position:'.$slider_bg_pos.'; background-repeat:'. $slider_bg_repeat .' " data-kenburn="no"><img src="'. $slider_image[0] .'"></div><div class="slider-bg-overlay" style="'. $slider_style .'"></div><div class="carousel-caption caption-halign-center caption-valign-center color-'.$slider_color.'" '. $parallax_script2 .'  ><div class="carousel-caption-wrapper"><div class="carousel-caption-content  fadeIn"><div class="carousel-caption-inner-content">';
		 
		 if($show_date == 'yes' || $show_categories == 'yes'){
			 $output .= '<h6 class="slider-subtitle">';
			 if($show_date == 'yes'):
			     $output .= '<span>'. $slider_date .'</span>';
			 endif;
			 if($show_categories == 'yes'):
			  $categories = get_the_category();
			  $separator = '';
			  if($categories){
				  $output .= '<span>';
	              foreach($categories as $category) {
		               $output .= $separator.'<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" , 'brad' ), $category->name ) ) . '">'.$category->cat_name.'</a>';
					   $separator = ' , ';
	               }
				  $output .= '</span>'; 
			   }
			  
			 endif;
			 $output .= '</h6>';
		 }
		 
		 if($slider_title != ''){
			 $output .= '<h2 class="slider-title"><span>' .$slider_title. '</span></h2>';
		 }
		 
		 if( $show_excerpt == 'yes'){
			 $output .= '<div class="slider-content" >' .$slider_excerpt. '</div>';
		 }
		 
		 if($show_readmore == 'yes'){
			 $output .= '<div class="slider-buttons"><a  href="'. $slider_btn_link .'" class="button button_'.$slider_button_style.' button_large">'. __('Read More','brad').'</a></div>';
		 }
		 
		 $output .= '</div></div></div></div></div>';
		 
		 $pagination_lines .= '<li data-target="#brad_slider'.$slider_id.'" data-slide-to="'.$slides_count.'">';

		   }
	   }
	   
	   else{
		 $slider_image_id =  preg_replace('/[^\d]/', '' , get_post_meta($post->ID,'brad_slider_image',true));
		 $slider_image = wp_get_attachment_image_src ( $slider_image_id ,'');
		 $slider_bg_cover = get_post_meta($post->ID,'brad_slider_bg_cover' , true);
		 $slider_bg_repeat = get_post_meta($post->ID,'brad_slider_bg_repeat' , true);
		 $slider_bg_pos = get_post_meta($post->ID,'brad_slider_bg_pos' , true);
		 $slider_type = get_post_meta($post->ID,'brad_slider_type' , true);
		 $slider_video_mp4 =  get_post_meta($post->ID,'brad_slider_video_mp4',true);
		 $slider_video_ogv =  get_post_meta($post->ID,'brad_slider_video_ogv',true);
		 $slider_video_webm =  get_post_meta($post->ID,'brad_slider_video_webm',true);
		 $slider_video_ratio =  get_post_meta($post->ID,'brad_video_ratio',true);
		 $caption_halign = get_post_meta($post->ID,'brad_slider_caption_align',true);
		 $caption_valign = get_post_meta($post->ID,'brad_slider_caption_valign',true);
		 $slider_title = get_post_meta($post->ID,'brad_slider_title',true);
		 $slider_subtitle = get_post_meta($post->ID,'brad_slider_subtitle',true);
		 $slider_caption = get_post_meta($post->ID,'brad_slider_caption',true);
		 $slider_button = get_post_meta($post->ID,'brad_slider_button',true);
		 $slider_button_style = get_post_meta($post->ID,'brad_slider_button_style',true);
		 $slider_color =  get_post_meta($post->ID,'brad_slider_color',true);
		 $slider_button_alternate = get_post_meta($post->ID,'brad_slider_button_alternate',true);
		 $slider_button_style_alternate = get_post_meta($post->ID,'brad_slider_button_style_alternate',true);
		 $slider_content_width = get_post_meta($post->ID,'brad_slider_content_width',true);
		 $slider_header_color = get_post_meta($post->ID,'brad_slider_header_color' , true);
		 $slider_effect = get_post_meta($post->ID,'brad_slider_caption_animation' , true);
		 $slider_btn_link = get_post_meta($post->ID,'brad_slider_btn_link',true);
		 $slider_altbtn_link = get_post_meta($post->ID,'brad_slider_altbtn_link',true);
		 $slider_bg_opacity = get_post_meta($post->ID,'brad_slider_bg_opacity',true);
		 $slider_bg_color = get_post_meta($post->ID,'brad_slider_bg_color',true);
		 $kenburn = get_post_meta($post->ID,'brad_slider_kenburn',true);
		 $kbpos_start = get_post_meta($post->ID,'brad_slider_kbpos_start',true);
		 $kbpos_end = get_post_meta($post->ID,'brad_slider_kbpos_end',true);
		 $kbzoom_start = get_post_meta($post->ID,'brad_slider_kbzoom_start',true);
		 $kbzoom_end = get_post_meta($post->ID,'brad_slider_kbzoom_end',true);
		 $kbduration = get_post_meta($post->ID,'brad_slider_kbduration',true);
		 $slider_style = 'opacity:'. $slider_bg_opacity .'; filter:alpha(opacity='. intval($slider_bg_opacity*100). ');';
			 
		 if($slider_bg_color != ''){
			 $slider_style .= 'background-color:'. $slider_bg_color. ';';
		 }
			 
			 
		 if( $kenburn == 'yes'){
			 $slider_bg_pos = $kbpos_start;
		 }
		 
		 $output .= '<div class="item" data-video-ratio="'.$slider_video_ratio.'"  data-header-scheme="header-scheme-'. $slider_header_color .'" data-slider-scheme="color-'.$slider_color.'"><div class="image bg-cover-'.$slider_bg_cover.'" style="background-image:url('. $slider_image[0] .'); background-position:'.$slider_bg_pos.'; background-repeat:'. $slider_bg_repeat .'" data-kenburn="'.$kenburn.'" data-kbstart="'.$kbpos_start.'" data-kbend="'.$kbpos_end.'" data-kbzoom-start="'.$kbzoom_start.'" data-kbzoom-end="'.$kbzoom_end.'" data-kb-duration="'.$kbduration.'" ><img src="'. $slider_image[0] .'"></div>';
		 
		 if($slider_type == 'video' && ( $slider_video_mp4 != '' || $slider_video_ogv != '' || $slider_video_webm != '')){
			 
			 $brad_includes['load_mediaelement'] = true;
			 
			 $output .= '<div class="carousel-video"><video poster="'.$slider_image[0].'"  preload="auto" autoplay loop="loop" muted="muted">';	
			 if($slider_video_mp4 != ""){
				$output .= '<source src="'.$slider_video_mp4.'" type="video/mp4">';
			 }
			 if ($slider_video_webm != "") {
				$output .= '<source src="'.$slider_video_webm.'" type="video/webm">';
			 }
			 if ($slider_video_ogv != "") {
				$output .= '<source src="'.$slider_video_ogv.'" type="video/ogg">';
			 }
			$output .= '</video></div>';
		 }
		 
		 $output .= '<div class="slider-bg-overlay" style="'.$slider_style.'"></div><div class="carousel-caption caption-halign-'. $caption_halign .' caption-valign-'.$caption_valign.' color-'.$slider_color.'"'. $parallax_script2 .'  ><div class="carousel-caption-wrapper"><div class="carousel-caption-content  ' .$slider_effect. '"><div class="carousel-caption-inner-content">';
		 
		 if($slider_subtitle != ''){
			 $output .= '<h6 class="slider-subtitle">'. $slider_subtitle .'</h6>';
		 }
		 
		 if($slider_title != ''){
			 $output .= '<h2 class="slider-title"><span>' .$slider_title. '</span></h2>';
		 }
		 
		 if( $slider_caption != ''){
			 $output .= '<div class="slider-content" >' .$slider_caption. '</div>';
		 }
		 
		 if($slider_button_alternate != '' || $slider_button != ''){
			 $output .= '<div class="slider-buttons">';
			 if($slider_button != ''){
				 $output .= '<a  href="'. $slider_btn_link .'" class="button button button_'.$slider_button_style.'">'.$slider_button.'</a>';
			 }
			 if($slider_button_alternate != ''){
				 $output .= '<a href="'. $slider_altbtn_link .'" class="button button button_'.$slider_button_style_alternate.'">'.$slider_button_alternate.'</a>';
			 }
			 $output .= '</div>';
		 }
		 
		 $output .= '</div></div></div></div></div>';
		 
		 $pagination_lines .= '<li data-target="#brad_slider'.$slider_id.'" data-slide-to="'.$slides_count.'">';
	   }
	   
	   $slides_count++;
	 endwhile;
	 wp_reset_postdata();
	 $output .= '</div>';
	 
	 if($pagination == 'yes'){
		 $output .= '<ol class="carousel-indicators">'.$pagination_lines.'</ol>';
	 }
	 
	 if($navigation == 'yes'){
		 $output .= '<a class="left carousel-control" href="#brad_slider'.$slider_id.'" data-slide="prev" '. $parallax_script3 .'></a><a class="right carousel-control" href="#brad_slider'.$slider_id.'" data-slide="next" '. $parallax_script3 .'></a>';
	 }
	 
	 $output .= '</div></div>';
	 
	 $brad_includes['load_bootstrapCarousel'] = true;
	 endif;

	 $slider_id++;	  
	 return $output;		  
 }
 

	
/*---------------------------------------------------*/
/* Gap
/*---------------------------------------------------*/

add_shortcode('gap', 'brad_gap');
	function brad_gap($atts, $content = null) {
		$output = '';
		extract(shortcode_atts(array(
		   'height' => '20'
         ), $atts));
		$output .= '<div class="gap" style="height:'.$height.'px"></div>';
		return $output;
	}





/*-----------------------------------------------------------------------------------*/
/*	Icon Lists
/*-----------------------------------------------------------------------------------*/
add_shortcode('iconlist','brad_iconlist');
function brad_iconlist( $atts, $content = null ) {
	extract( shortcode_atts( array(
           'style' => 'style1' , 'size'    => 'small'
           ), $atts ) );
    return '<ul class="styled-list '.$style.' size-'.$size.'">'. do_shortcode($content) .'</ul>';
}

add_shortcode('listitem','brad_listitem');
function brad_listitem( $atts, $content = null ) {
	extract( shortcode_atts( array(
           'icon' => ''
           ), $atts ) );
		   
	return '<li>'.brad_icon($icon , '','',false). do_shortcode($content) . '</li>';
}



/*-----------------------------------------------------------------------------------*/
/* List Item
/*-----------------------------------------------------------------------------------*/

add_shortcode('checklist','brad_list');
function brad_list( $atts, $content = null ) {
   extract(shortcode_atts(array(
       	'icon'      =>  '' ,
		'style'     =>  'style1',
		'size'    => 'small'
    ), $atts));
	
	$out = '<ul class="styled-list '.$style.' size-'.$size.'">';
	if($icon != "")
	{ $icon = brad_icon($icon,'','',false);}
	$content = str_replace ( '<i class="icon-to-replace"></i>',$icon , do_shortcode($content) );
	$out .= $content.'</ul>';
    return $out;
}

function brad_item( $atts, $content = null ) {
	return '<li><i class="icon-to-replace"></i>'. do_shortcode($content) . '</li>';
}
add_shortcode('item','brad_item');




/*------------------------------------------------------*/
/*Dropcap
/*------------------------------------------------------*/

add_shortcode('dropcap','brad_dropcap');
function brad_dropcap($atts, $content = null) {
    extract(shortcode_atts(array(
        'style'      =>  'disable' ,
		'color' => '',
		'bc' => '' ,
		'bw' => '0',
		'bgc' => '',
		'br' => '9999px' 
    ), $atts));
	$out = $dstyle = '';
	
	
	$dstyle .= "color:{$color};";
	if($style == 'enable') {  
	$br = preg_match('/%/i',$br) ||  preg_match('/px/i',$br)  ? $br : intval($br).'px';
	$bw = preg_match('/%/i',$bw) ||  preg_match('/px/i',$bw)  ? $bw : intval($bw).'px';
	$dstyle .= "border:{$bw} solid {$bc}; background-color:{$bgc};border-radius:{$br};-webkit-border-radius:{$br};-moz-border-radius:{$br};";}
	
	$out = "<span class='dropcap container-". $style ."' style='".$dstyle."'>" .$content. "</span>";
    return $out;
}


/*-----------------------------------------------------------------------------------*/
/* Media */
/*-----------------------------------------------------------------------------------*/
add_shortcode('video','brad_video');
function brad_video($atts) {
	extract(shortcode_atts(array(
		'type' 	=> '',
		'id' 	=> '',
		'width' 	=> false,
		'height' 	=> false,
		'autoplay' 	=> ''
	), $atts));
	
	if ($height && !$width) $width = intval($height * 16 / 9);
	if (!$height && $width) $height = intval($width * 9 / 16);
	if (!$height && !$width){
		$height = 320;
		$width = 560;
	}
	
	$autoplay = ($autoplay == 'yes' ? '1' : false);
		
	if($type == "vimeo") $return = "<div class='video'><iframe src='http://player.vimeo.com/video/$id?autoplay=$autoplay&amp;title=0&amp;byline=0&amp;portrait=0' width='$width' height='$height' class='iframe'></iframe></div>";
	
	else if($type == "youtube") $return = "<div class='video'><iframe src='http://www.youtube.com/embed/$id?HD=1;rel=0;showinfo=0' width='$width' height='$height' class='iframe'></iframe></div>";
	
	else if($type == "dailymotion") $return ="<div class='video'><iframe src='http://www.dailymotion.com/embed/video/$id?width=$width&amp;autoPlay={$autoplay}&foreground=%23FFFFFF&highlight=%23CCCCCC&background=%23000000&logo=0&hideInfos=1' width='$width' height='$height' class='iframe'></iframe></div>";
		
	if (!empty($id)){
		return $return;
	}
}



/*-----------------------------------------------------------------------------------*/
/*  Icons 
/*-----------------------------------------------------------------------------------*/
add_shortcode('icons','brad_sh_icons');

function brad_sh_icons( $atts, $content = null) {
	$output = '';
	static $si_id = 1;
	  extract( shortcode_atts( array(
           'size'=>'', 'style' => '' ,'icon_c' => '', 'align' => 'left' , 'icon_bgc' => '', 'icon_c_hover' => '', 'border_radius' => '0' ,'icon_bgc_hover' => '',
      ), $atts ) );
	  if(  $icon_bgc != '' || $icon_c != '' || $icon_c_hover != ''  || $icon_bgc_hover != '' ){
		  $output .= "<style type='text/css' scoped>";
		  if(  $icon_bgc != '' || $icon_c != '' || intval($border_radius) > 0 ):
		  $output .= "#brad_icons_{$si_id} li a{";
		  if( $icon_c != '') { $output .= "color:{$icon_c};";}
		  if( $icon_bgc != '') { $output .= "background-color:{$icon_bgc};";}
		  if( intval($border_radius) > 0 ){ $output .= "-webkit-border-radius:{$border_radius};border-radius:{$border_radius};";}
		  $output .= "}";
		  endif;
		  
		  if(  $icon_bgc_hover != '' || $icon_c_hover != '' ):
		  $output .= "#brad_icons_{$si_id} li a:hover{";
		  if( $icon_c_hover != '') { $output .= "color:{$icon_c_hover};";}
		  if( $icon_bgc_hover != '') { $output .= "background-color:{$icon_bgc_hover};";}
		  $output .= "}";
		  endif;
		  
		  $output .= "</style>";
	  }
      $output .=  "\n\t".'<ul id="brad_icons_'.$si_id.'" class="brad-icons '.$size.' '.$style.' icons-align-'.$align.'">';
	  $output .= "\n\t\t".do_shortcode($content); 
	  $output .= "\n\t".'</ul>';
	  $si_id++;
	  return $output;
}


add_shortcode('single_icon','brad_single_icon');
function brad_single_icon($atts,$content){
	
	extract( shortcode_atts( array(
      'icon' 	=> '',
      'url'		=> '#',
	  'title'   => '' ,
      'target' 	=> '_blank'
      ), $atts ) );
	 
	   
	 return "\n\t".'<li><a href="' . $url . '" title="' . $title . '" target="' . $target . '">'. brad_icon($icon , '' , '' , false) .'</a></li>'; 
	
	
	}
	
	
/*-----------------------------------------------------------------------------------*/
/* Tooltip */
/*-----------------------------------------------------------------------------------*/
add_shortcode('tooltip','brad_tooltip');

function brad_tooltip( $atts, $content = null){
	extract(shortcode_atts(array(
        'text' => '',
		'align' => 'top'
    ), $atts));

return '<span class="tooltips" data-align="'.$align.'"><a href="#"  title="'.$text.'" rel="tooltip" >'. do_shortcode($content) . '</a></span>';

}


/*---------------------------------------------------*/
/* highlight
/*---------------------------------------------------*/
function brad_highlighted($atts, $content = null) {

 $output = '';
 extract(shortcode_atts(array(
  'style' => 'style1'
  ), $atts));
  $output .= "\n\t".'<span class="highlighted '.$style.'">';
  $output .= "\n\t\t". do_shortcode($content);
  $output .= "\n\t".'</span>';
  return $output;
}
	
add_shortcode('highlighted','brad_highlighted');




/*-----------------------------------------------------*/
/*	Columns
/*-----------------------------------------------------*/


function brad_columns($atts , $content = null){
	
	return '<div class="row-fluid">' . do_shortcode($content) . '</div>';
	
	}
	add_shortcode('columns','brad_columns');
	
	
// 6
function brad_one_sixth( $atts, $content = null ) {
   return '<div class="span2">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_sixth', 'brad_one_sixth');



// 4
function brad_one_fourth( $atts, $content = null ) {
   return '<div class="span3">'.do_shortcode($content).'</div>';
}
add_shortcode('one_fourth', 'brad_one_fourth');

// 5
function brad_one_fifth( $atts, $content = null ) {
   return '<div class="one_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth', 'brad_one_fifth');


// 3
function brad_one_third( $atts, $content = null ) {
   return '<div class="span4">'.do_shortcode($content).'</div>';
}
add_shortcode('one_third', 'brad_one_third');


// 2
function brad_one_half( $atts, $content = null ) {
   return '<div class="span6">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'brad_one_half');


// 2/3
function brad_two_thirds( $atts, $content = null ) {
   return '<div class="span8">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_thirds', 'brad_two_thirds');

//3/4
function brad_three_fourths( $atts, $content = null ) {
   return '<div class="span9">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourths', 'brad_three_fourths');



/*-----------------------------------------------------*/
/*	code
/*-----------------------------------------------------*/
function brad_code( $atts, $content=null ) {
	$content = str_replace('<br />', '', $content);
	$content = str_replace('<p>', '', $content);
	$content = str_replace('</p>', '', $content);
    $code = '<pre class="">'.htmlentities($content).'</pre>';
	return $code;
}

add_shortcode('code', 'brad_code');



?>