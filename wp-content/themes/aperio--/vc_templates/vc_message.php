<?php


/* Message Box
-------------------------------------------------------*/


		$output = $color = $el_class = $css_animation = '';
        extract(shortcode_atts(array(
          'color' => 'alert-info',
		  'close' => '',
		  'bgc' => 'transparent',
		  'br' => '0' ,
		  'tcolor' => '#888888',
		  'bw' => '1',
		  'bc'  => '#dddddd',
          'el_class' => '',
          'css_animation' => '',
		  'css_animation_delay' => ''), $atts));
       
	  $el_class = $this->getExtraClass($el_class);
      $id = rand();

      $color = ( $color != '' ) ? $color : '';
      $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'alert '.$color.$el_class, $this->settings['base']);
	  $css_class .= $this->getCSSAnimation($css_animation);
	  
	  if($color == 'custom'){
		  $br = intval($br).'px';
		  $output .= "<style type='text/css' scoped>#message_{$id} .close{border-color:{$bc}}#message_{$id}{ color:{$tcolor}; background-color:{$bgc}; border:".intval($bw)."px solid {$bc}; -webkit-border-radius:{$br};-moz-border-radius:{$br};border-radius:{$br};}</style>";
	  }
	  
      $output .= "\n\t".'<div id="message_'.$id.'" class="'.$css_class.'" data-animation-effect="'.$css_animation.'" data-animation-delay="'.$css_animation_delay.'">';
	  if( $close === 'yes') {
		  $output .= '<span class="close">x</span>';
	  }
	  $output .= "\n\t\t".wpb_js_remove_wpautop($content);
	  $output .= "\n\t".'</div>'.$this->endBlockComment('alert box')."\n";
      echo $output;
