<?php

		global $brad_data ;	
		extract(shortcode_atts(array(
		  "value" => '50',
		  "size" => '220',
		  "color" => '#555555',
		  'scales'  => 'no',
		  'scalecolor' => '#777777',
		  'corner_type' => 'square',
		  'speed' => 1500 ,
		  "label_value" => '',
		  'inverse' => 'no',
		  "icon" => '' ,
		  "align" => 'aligncenter' ,
		  ""  => "" ,
		  //'subtitle' => 'no',
		  //"sub_label_value" => '',
		  "el_class" => '' ,
		  "track_color" => '',
		  "bar_color" => ''
		  ), $atts));

	   $el_class = $this->getExtraClass( $el_class );
	   $output = $style = $linewidth = '';
	   $bar_color = $bar_color != '' ? $bar_color : $brad_data['color_primary'] ; 
	   $track_color = $track_color != '' ? $track_color : '#f4f4f4';
	   $size_m = intval($size) > 0 ? intval($size)/220 : 1;
	   $linewidth = 10*$size_m;
	   $fontsize = 40*$size_m;
	   
	   $style .= "font-size:{$fontsize}px;height:{$size}px;width:{$size}px;line-height:{$size}px;color:{$color}";
		
	   $css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' chart-shortcode  '.$align.'"  data-percent="0" data-animatepercent="'.$value.'" data-size="'.$size.'" data-line-width="'.$linewidth.'" data-scales='.$scales.' data-inverse="'.$inverse.'" data-speed="'.$speed.'" data-barcolor="'.$bar_color.'" data-corner-type="'.$corner_type.'"  data-scalecolor="'.$scalecolor.'" data-trackcolor="'.$track_color.'"'.$el_class, $this->settings['base']);
  $output = "\n\t".'<div class="'.$css_class.'" style="'.$style.'">';
  
  if( $label_value != '' ) { $output .= $label_value; }
  else if ($icon != '') { $output .= brad_icon($icon,'','',false); }
  $output .=  "\n\t".'</div>'.$this->endBlockComment('Pie chart')."\n";
  echo $output;
