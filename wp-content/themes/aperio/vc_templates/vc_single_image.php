<?php

	$output =  '';
    extract(shortcode_atts(array(
      'image' => '' ,
      'img_size'  => 'full',
	  'custom_img_size' => '',
	  'img_align' => 'none' ,
	  'img_lightbox' => false,
	  'icon_lightbox' => '118|ss-air',
      'img_link_large' => false,
      'img_link' => '',
      'img_link_target' => '_self',
      'el_class' => '',
      'css_animation' => '',
	  'css_animation_delay' => 0
       ), $atts));
 
	$img_id = preg_replace('/[^\d]/', '', $image);
	if($custom_img_size != '') {
		$img_size = $custom_img_size;
	}

    $img = wpb_getImageBySize(array( 'attach_id' => $img_id, 'thumb_size' => $img_size ));
    if ( $img == NULL ) $img['thumbnail'] = '<img src="http://placekitten.com/g/400/300" /> <small>'.__('This is image placeholder, edit your page to replace it.', "brad-framework").'</small>';
    $el_class = $this->getExtraClass($el_class);

    $link_to = '';
	$icon = brad_icon($icon_lightbox);
    if ($img_lightbox == 'yes') {
		if($img_link_large == 'yes'){
            $img_src = wp_get_attachment_image_src( $img_id, 'large');
            $link_to = '<a href="'.$img_src[0].'" class="icon image-lightbox" rel="prettyPhoto[singleImage'. rand() .']">'.$icon.'</a>';
		}
		else if(!empty($img_link)){
			$link_to = '<a href="'.$img_link.'" class="icon image-lightbox" rel="prettyPhoto[singleImage'. rand() .']">'.$icon.'</a>';
		}
   }
   
    $css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'single-image', $this->settings['base']);
    $css_class .= brad_getCSSAnimation($css_animation);
	
    $output .= "\n\t".'<div class="single-image-container img-align-'.$img_align.' '.$el_class.'"><div class="'.$css_class.'" data-animation-delay="'.$css_animation_delay.'" data-animation-effect="'.$css_animation.'">';
    $output .= "\n\t\t". $img['thumbnail'];
	$output .= "\n\t\t\t".$link_to;
    $output .= "\n\t".'</div></div>'.$this->endBlockComment('.image');
    echo $output;	
