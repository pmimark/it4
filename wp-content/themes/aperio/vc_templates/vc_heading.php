<?php 

	extract(shortcode_atts(array('type' => 'h1' , 'icon' => '' , 'style'=>'' , 'color' => 'default'  , 'align' => 'left' , 'title' => 'Your title here' , 'margin_bottom' => '20px' , 'divider_color' => 'dark' , 'bw' => 'default' , 'bc' => 'default' , 'divider_height' => 'default', 'divider_width' => 'default'),$atts));
	$output = "\n\t".'<'.$type.' class="title text'.$align.' '.$style.' bw-'.$bw.'px dh-'.$divider_height.'px  divider-'.$divider_color.' bc-'.$bc.'  dw-'.$divider_width.' color-'.$color.'" style="margin-bottom:'.$margin_bottom.'px">';
	$output .= '<span>'.$title . brad_icon($icon , '' ,'',false) .'</span>';
	$output .= "\n\t".'</'.$type.'>'.$this->endBlockComment('heading')."\n";
	echo $output;
 
?>