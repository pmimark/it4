<?php
// Template Name: Header Fixed
?>
<?php
  global $brad_data;
 $brad_data['check_fixed_header'] = true;
 $brad_data['check_auto_offset'] = true;
 $brad_data['shrink_nav_offset'] = 0;
 get_header();  ?>
 
 <?php  if (have_posts()) : while (have_posts()) : the_post(); ?>
   <div class="fullwidth">
    <?php the_content(); ?>  
   </div>
  <?php endwhile; endif; ?>

<?php get_footer(); ?>