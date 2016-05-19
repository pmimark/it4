<?php
// Template Name: Header Logo Center Transparent
?>
<?php
  global $brad_data;
 $brad_data['header_layout']= 'type2';
 $brad_data['header_height']= 140;
 $brad_data['logo_con_width'] = 200;
  $brad_data['logo_offset_top'] = 15;
 get_header(); 
?>

 <?php  if (have_posts()) : while (have_posts()) : the_post(); ?>
   <div class="fullwidth">
    <?php the_content(); ?>  
   </div>
  <?php endwhile; endif; ?>

<?php get_footer(); ?>