<?php

	 $fbox_id = rand() ; 
	 $output = ''; 
     extract(shortcode_atts(array(
	  'columns' => '2' , 
	  'style' => 'style1' ,  
	  'padding' => '' ,
	  'fc_align' => 'no' ,
	  'vpadding' => '',
	  'fi_align' => 'no',
	  'bg_color' => '#ffffff' , 
	  'inner_vpadding' => "default" ,
	  'inner_hpadding' => "default" ,
	  'divider' => 'no' ,
	  'di_style' => 'style1' ,
	  'color_scheme' => 'default',
	  'di_color' => 'default',
	  'di_type' => 'tiny',
	  'border_color' => '' ,
	  'border_width' => '1',
	  "bg_shadow" => "no" ,
	  'bg_radius' => 'yes' , 
	  'height' => '50',
	  'box_style' => 'style1' , 
	  'icon_size' => 'normal' ,  
	  'icon_style' => 'style1' , 
	  'icon_side' => 'left', 
	  'icon_bw' => '1', 
	  'icon_c' => '' ,
	  'icon_br' => '50%' ,
	  'icon_c_opc' => '1' ,
	  'icon_bc' => '' ,
	  'icon_bgc' => '' ,
	  'icon_c_hover' => '' ,
	  'icon_c_opc_hover' => '' , 
	  'icon_bgc_hover' => '' ,
	  'enable_crease' => 'no' , 
	  'el_class' => ''),$atts));

     if($columns == '' || empty($columns)) { $columns = 2; }

	 
	 /* Css Styles for feature box */
	 $output .= "<style type='text/css' scoped>#feature_boxes_{$fbox_id} .feature_box > .brad-icon{";
	 
	 if( $icon_style == 'style2' || $icon_style == 'style3'){
		 $output .= "-webkit-border-radius:{$icon_br};border-radius:{$icon_br};";
	 }
	 
	 if( $icon_c != '' ){

		 $output .=  "color:{$icon_c};";
	 }
	 if( $icon_bc != '' && $icon_style == 'style2' ){
		 $output .=  "border-color:{$icon_bc};";
		 $output .= 'border-width:'.intval($icon_bw).'px;';
	 }
	 if( $icon_bgc != '' && $icon_style == 'style3' ){
		 $output .=  "background-color:{$icon_bgc};";
	 }
	 $output .= "}";
	 
	 if( ( $icon_bgc_hover != '' || $icon_c_hover != '' ) && ( $icon_style == 'style3' || $icon_style == 'style2')){
		 $output .= "#feature_boxes_{$fbox_id} .feature_box:hover > .brad-icon{";
		 if( $icon_bgc_hover != ''){
			 $output .=  "background-color:{$icon_bgc_hover};";
		 }
		 if($icon_c_hover != '' ){
			 $output .=  "color:{$icon_c_hover};";
		 }
		 $output .=  "}";
	 }
	 
	 if( ( $bg_color != '' || $border_color != '' ) && $style == 'style3' ){
		 $output .= "#feature_boxes_{$fbox_id} .span .inner-content{";
		 $bg_radius = preg_match("/px/i",$bg_radius) || preg_match("/%/i",$bg_radius) ? $bg_radius : intval($bg_radius).'px';
		 $output .= "border-radius:{$bg_radius};-webkit-border-radius:{$bg_radius};min-height:".intval($height)."px;";
		 
		 if( $bg_color != '' ){
		
		     $output .= "background-color:{$bg_color};";
		 }
		 if( $border_color != '' ){
		     $output .= "border-color:{$border_color};border-width:".intval($border_width)."px;";
			}
		 $output .= "}";
	 }
	 
	 $output .= "</style>";
	 
	 $el_class = $this->getExtraClass($el_class);
	 $css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'row-fluid '.$style.' background-shadow-'.$bg_shadow.' feature_boxes box-'.$box_style.' enable-hr-'.$divider.' element-vpadding-'.$vpadding.' hr-type-'.$di_type.' hr-color-'.$di_color.' hr-style-'.$di_style.' '.$icon_size.'-size element-inner-vertical-padding-'.$inner_vpadding.' element-inner-horizental-padding-'.$inner_hpadding.' icon-side-'.$icon_side.'  iconbox-'.$icon_style.'  align-content-center-'. $fc_align.' align-icon-center-'.$fi_align.' columns-'.$columns.' crease-background-'.$enable_crease.' content-box '.$color_scheme.' element-padding-'.$padding.' '.$el_class.' ', $this->settings['base']);

	 $output .= "\n\t".'<div id="feature_boxes_container_'.$fbox_id.'" class="clearfix" >';
     $output .= "\n\t\t".'<div id="feature_boxes_'.$fbox_id.'" class="'.$css_class.'">';
     $output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
	 $output .= "\n\t\t".'</div>';
     $output .= "\n\t".'</div>'.$this->endBlockComment('feature_boxes')."\n";
     echo $output;	
	