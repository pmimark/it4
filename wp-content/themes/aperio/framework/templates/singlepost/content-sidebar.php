<?php global $brad_data , $brad_includes , $post;
    $brad_includes["load_bxslider"] = true;
 if($brad_data['select_blogsidebar'] == 'sidebar-left' ) {
		$content_css = 'content-right';
		$sidebar_css = 'sidebar-left';
	} else {
		$content_css = 'content-left';
		$sidebar_css = 'sidebar-right';
	}
 ?>
<?php while ( have_posts() ) : the_post(); ?>

<section id="section_0" class="section section-with-sidebar blog-sidebar single-post-page post-content">
  <div class="container">
    <div class="row-fluid">
      <div class="row-fluid">
        <div id="content" class="span9 content <?php echo $content_css;?>">
          <div class="inner-content"> 
            <!-- Single Post -->
            <?php  get_template_part("framework/templates/singlepost/post-format/post",get_post_format())?>
            
            <!-- Post Links -->
            <div class="page-links"><?php wp_link_pages();?></div>
            <?php $relatedPosts = brad_get_related_posts(get_the_ID()); ?>
            <?php if ( $brad_data['check_relatedposts'] && $relatedPosts->have_posts() ) : ?>
            <!-- Related Posts -->
            <div class="related-posts-container <?php if( get_post_format() == 'link' || get_post_format() == 'quote') { echo 'no-border'; }?>">
              <h3 class="title style1 bw-2px dh-2px mb30  divider-primary bc-dark  dw-default color-default" ><span><?php echo __("Related Posts","brad");?></span></h3>
              <ul class="related-posts">
                <?php while($relatedPosts->have_posts()): $relatedPosts->the_post(); ?>
                <li><a class="" href="<?php the_permalink();?>">
                  <?php the_title(); ?>
                  </a> <span>(
                  <?php the_time(get_option('date_format')); ?>
                  )</span></li>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
              </ul>
            </div>
            <?php endif; ?>
           
            <?php if($brad_data['check_authorinfo']):  ?>
            <!-- Author Info -->
            <div class="about-the-author clearfix">
              <h3 class="title style1 mb30 bw-2px dh-2px  divider-primary bc-dark  dw-default color-default"><span>
                  <?php _e('About the Author', 'brad'); ?>
                  </span>
              </h3>
              <div class="avatar"><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php echo get_avatar( get_the_author_meta('user_email'), '60', '' ); ?></a></div>
              <div class="author-info">
                <?php if( get_the_author_meta('description') != '') { the_author_meta('description');  } else { echo __('The Author has not yet added any info about himself','brad'); } ?>
              </div>
            </div>
            <?php endif; ?>
            <?php comments_template();?>
          </div>
        </div>
        <div id="sidebar" class="span3 sidebar <?php echo $sidebar_css; ?> headline-bg-<?php echo $brad_data['bgcolor_sidebar_hl']?>" style="">
          <div class="inner-content">
            <?php brad_dynamic_sidebar()?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section" style="padding-top:0; padding-bottom:80px;">
  <div class="container">
    <div class="row-fluid page-nav-container">
      <div class="row-fluid">
        <div class="page-nav-prev">
          <?php previous_post_link('%link' ,'<i class="fa-angle-left"></i><h4>'. __('Previous Post','brad') .'</h4><p>%title</p>'); ?>
        </div>
        <div class="page-nav-next">
          <?php next_post_link('%link' , '<i class="fa-angle-right"></i><h4>'. __('Next Post','brad') .'</h4><p>%title</p>'); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endwhile; ?>
