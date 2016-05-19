<?php
// Template Name: Header Type Boxed2
?>
<?php
 global $brad_data;
 $brad_data['bg_style_boxed']['background-color']= '#ffffff';
 $brad_data['header_dwidth'] = 'grid';
 $brad_data['layout'] = 'boxed';
 $brad_data['boxed_bstyle'] = 'minimal';
 $brad_data['boxed_shadow'] = 'no';
 $brad_data['boxed_border']['border-top'] = '1px';
 $brad_data['boxed_border']['border-style'] = 'solid';
 $brad_data['boxed_border']['border-color'] = '#e8e8e8';
 $brad_data['check_fixed_header'] = false ;
 $brad_data['bg_style_boxed']['background-color'] = '#fff';
 $brad_data['header_layout']= 'type3';
 $brad_data['check_searchicons_header'] = 1;
 $brad_data['header_bstyle'] = 'center';
 $brad_data['header_height']= 150;
 $brad_data['show_second_nav'] = false;
 $brad_data['boxed_bpadding'] = 'yes';
 $brad_data['boxed_pcover_header'] = 'no';
 $brad_data['boxed_vpadding']  = 'yes';
 $brad_data['color_footerbg']  = '#fcfcfc';
 $brad_data['color_footertext'] = '#999999';
 $brad_data['font_footerheadline']['color']  = '#111';
 $brad_data['font_footerheadline']['line-height'] = '45px';
 $brad_data['color_footerdivider'] = '#eee';
 $brad_data['font_footerheadline_bg']  = '#f5f5f5';
 $brad_data['color_footerlink'] = '#666666';
 $brad_data['color_footerlinkhover']  = '#333';
 $brad_data['footer_border']  = array('border-top' => '1px' , 'border-color' => '#ddd', 'border-style' => 'solid');
 $brad_data['copyright_border']  = array('border-top' => '1px' , 'border-color' => '#ddd', 'border-style' => 'solid');
 $brad_data['color_bgcopyright'] = '#fff';
 $brad_data['color_copyrightdivider'] = '#eee';
 $brad_data['color_copyrightlink']  = '#555';
 $brad_data['color_copyrightlinkhover'] = '#444';
 get_header(); 
 
 if(  get_post_meta( get_the_ID() , 'brad_page_layout' , true ) == 'sidebar') {
	$page_type = 'sidebar';
	} else {
	$page_type = 'full-width';
	}
 ?>

<?php get_template_part( 'framework/templates/page/content', $page_type ); ?>

<?php get_footer(); ?>