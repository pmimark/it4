<?php global $brad_data , $post , $brad_includes, $wp_query; ?>
<?php $brad_includes['load_isotope'] = true; $brad_includes['load_bxslider'] = true; ?>

<?php if (have_posts()) : ?>
<?php 
if( $brad_includes['load_infiniteScroll'] == true && ( $brad_data['blog_pagination'] == 'if_scroll' || $brad_data['blog_pagination'] == 'loadmore' )) {
	   $output .= '<p>'. __('Sorry You cannot create more than 1 infinite scroll or Load More Posts ( Portfolios ) per page . Please change this in page builder or blog settings ','brad') .'</p>';
	}
	else {
?>
<?php $ex_class = ($brad_data['blog_pagination'] == 'ifscroll' || $brad_data['blog_pagination'] == 'loadmore' ) ? 'posts-with-infinite' : '' ; ?>

<div class="blog-gird <?php echo $ex_class;?>">
  <div class="spinner-block">
    <div class="spinner"></div>
    <img src="<?php echo get_template_directory_uri()?>/images/loader.gif" /> </div>
  <ul class="posts-grid row-fluid element-padding-<?php echo $brad_data['blog_padding']?> element-vpadding-<?php echo $brad_data['blog_vpadding'];?> posts-grid-bg-<?php echo $brad_data['grid_blog_style']?>" data-masonry="<?php echo $brad_data['blog_masonry'];?>">
    <?php  while (have_posts()) : the_post();
      get_template_part('framework/templates/blog/posts/post-format-grid/post' , get_post_format());
     endwhile; ?>
  </ul>
  <p class="hidden">
    <?php posts_nav_link(); ?>
  </p>
  <?php if( $brad_data['blog_pagination'] == 'ifscroll' || $brad_data['blog_pagination'] == 'loadmore'){
		echo '<div id="infinite_scroll_loading"></div>';
	    $brad_includes['load_infiniteScroll'] = true ;
     }
	 
     if( $brad_data['blog_pagination'] == 'default' || $brad_data['blog_pagination'] == 'ifscroll' || $brad_data['blog_pagination'] == 'loadmore'):
			   $p_class =  $brad_data['blog_pagination'] == 'default' ? '' : 'hidden';
               brad_pagination($wp_query->max_num_pages , 2 , true , $p_class , $wp_query->query_vars['paged']);
            endif;	 
 

     if( $brad_data['blog_pagination'] == 'loadmore' ):
                echo  '<p id="load_more" class="sp-container aligncenter"><a  href="#" class="button button_alternate icon-align-left" title="'.__('Load More Posts..','brad').'">'.__('Load More','brad').'</a></p>';
      endif;

?>
</div>
<?php } ?>
<?php endif; ?>
