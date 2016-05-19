<?php global $brad_data ,$brad_sidebar;
   $brad_sidebar = 'yes';
   if(get_post_meta($post->ID, 'brad_sidebar_position', true) == 'left') {
		$content_css = 'content-right';
		$sidebar_css = 'sidebar-left';
	} else {
		$content_css = 'content-left';
		$sidebar_css = 'sidebar-right';
	}
?>
<div class="section-with-sidebar">
  <div class="container">
    <div class="row-fluid">
      <div class="row-fluid">
      <div id="sidebar" class="span3 sidebar <?php echo $sidebar_css; ?>" style="">
          <div class="inner-content">
         <?php brad_dynamic_sidebar()?>
          </div>
        </div>
        <div id="content" class="content span9  <?php echo $content_css;?> headline-bg-<?php echo $brad_data['bgcolor_sidebar_hl']?>">
            <div class="inner-content">
             <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
             <?php the_content(); ?>
             <?php if(!$brad_data['check_disablecomments']): ?>
       	          <?php wp_reset_query(); ?>
	             <?php comments_template(); ?>
             <?php endif; ?>
             <?php endwhile; ?>
             <?php endif; ?>
             </div>
           </div>
      </div>
    </div>
  </div>
</div>