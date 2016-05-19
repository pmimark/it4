<?php
// Template Name: Header Type 3 fixed
?>
<?php
  global $brad_data;
 $brad_data['header_layout']= 'type3';
 $brad_data['header_height']= 150;
 $brad_data['check_searchicons_header'] = 1;
 $brad_data['check_fixed_header'] = true;
  $brad_data['logo_offset_top'] = 25;
 get_header();  ?>
 
 <?php  if (have_posts()) : while (have_posts()) : the_post(); ?>
   <div class="fullwidth">
    <?php the_content(); ?>  
   </div>
  <?php endwhile; endif; ?>

<?php get_footer(); ?>