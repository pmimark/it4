<?php
// Template Name: Header Type Boxed3
?>
<?php
 global $brad_data;
 $brad_data['bg_style_boxed']['background-color']= '#ffffff';
 $brad_data['header_dwidth'] = 'grid';
 $brad_data['layout'] = 'boxed';
 $brad_data['boxed_bstyle'] = 'default';
 $brad_data['boxed_shadow'] = 'no';
 $brad_data['boxed_border']['border-top'] = '1px';
 $brad_data['boxed_border']['border-style'] = 'solid';
 $brad_data['boxed_border']['border-color'] = '#eee';
 $brad_data['check_fixed_header'] = false ;
 $brad_data['bg_style_boxed']['background-color'] = '#f7f7f7';
 $brad_data['header_layout']= 'type3';
 $brad_data['check_searchicons_header'] = 1;
 $brad_data['header_height']= 150;
 $brad_data['boxed_pcover_header'] = 'yes';
 $brad_data['boxed_bpadding'] = 'yes';
 $brad_data['boxed_vpadding']  = 'no';

 get_header(); 
 
   if (have_posts()) : while (have_posts()) : the_post(); ?>
   <div class="fullwidth">
    <?php the_content(); ?>  
   </div>
  <?php endwhile; endif;?>

<?php get_footer(); ?>