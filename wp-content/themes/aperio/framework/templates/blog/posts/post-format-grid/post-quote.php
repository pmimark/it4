<?php global $brad_data , $brad_includes , $brad_love , $post; ?>
<?php 
   $bgimage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
   $bgcolor = get_post_meta($post->ID,'brad_quote-overlay-bg',true);
 $bgopacity = get_post_meta($post->ID,'brad_quote-overlay-opacity',true);
 if($bgcolor != ''){
	     $rgb = brad_hex2rgb($bgcolor);
	    $rgba = "rgba({$rgb[0]},{$rgb[1]},{$rgb[2]},{$bgopacity})";
	 $bgstyle = "background-color:{$rgba}";
 }
 else{
	 $bgstyle = "";
 }
?>
<?php 
   $class    = brad_get_class_name($brad_data['grid_blog_columns']);
   $img_type = brad_get_img_size($brad_data['grid_blog_columns'] , $brad_data['blog_masonry'] );
?>

<li id="post-<?php the_ID(); ?>" <?php post_class(' post-grid-item post-blockquote  bg-style-'.$brad_data['grid_blog_style'].' scheme-'.get_post_meta($post->ID , 'brad_quote-scheme' , true).' '.$class ); ?>>
  <div class="inner-content">
  <div class="post-blockquote-image" style="background-image:url(<?php echo $bgimage; ?>)"></div>
  <div class="post-blockquote-image-overlay" style="<?php echo $bgstyle;?>"></div>
    <div class="post-text-container post-blockquote-content">
      <?php if($brad_data['check_blog_date'] ||  $brad_data['check_blog_categories'] || is_sticky() ):?>
      <div class="post-meta-data  style2">
        <?php if( is_sticky() ){ echo '<span class="sticky-post">'. __('Sticky Post','brad') .'</span>';}?>
        <?php if($brad_data['check_blog_categories']){ ?>
        <span class="post-meta-cats">
        <?php the_category(' , '); ?>
        </span>
        <?php } ?>
        <?php if($brad_data['check_blog_date']){?>
        <span class="post-meta-date"><?php echo get_the_date();?></span>
        <?php } ?>
      </div>
      <?php endif; ?>
      
     <!--post format quote -->
    <div class="post-format-blockquote"> <i class="fa-quote-left"></i>
      <?php the_content(); ?>
    </div>
    
   
      <?php if($brad_data['check_author'] || $brad_data['check_readmore']  || (comments_open() && $brad_data['check_blog_comments']) || $brad_data['check_postlove'] || $brad_data['check_blogshare'] == true):?>
      <div class="post-bottom">
        <?php if(  $brad_data['check_readmore'] ) { echo '<a href="'. get_the_permalink() .'" class="button button_alternate button_small">'. __('Read More','brad').'</a>'; } ?>
        <div class="post-meta-data">
          <?php if( comments_open() && $brad_data['check_blog_comments']): ?>
          <span>
          <?php comments_popup_link(__('No Comment','brad') , __('1 Comment','brad') ,   __('% Comments','brad') ); ?>
          </span>
          <?php endif; ?>
          <?php if($brad_data['check_postlove']){
                  $love = $brad_love->add_love(true); 
		          echo '<span class="love-it">'. $love .'</span>';
                } ?>
          <?php if($brad_data['check_author']){ ?>
          <span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
          <?php the_author_meta( 'display_name' ); ?>
          </a></span>
          <?php } ?>
          <?php if($brad_data['check_blogshare'] == true): ?>
          <span class="post-share clearfix"> <a class="share-label" href="#"><?php echo __('Share','brad'); ?></a>
          <ul class="post-share-menu">
            <?php if($brad_data['check_sharingboxfacebook']): ?>
            <li><a href="http://www.facebook.com/sharer.php?u=<?php echo get_the_permalink(); ?>&amp;t=<?php echo get_the_title(); ?>"  class="facebook-share"><i class="fa-facebook"></i></a></li>
            <?php endif; ?>
            <?php if($brad_data['check_sharingboxtwitter']): ?>
            <li ><a href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>" class="twitter-share"><i class="fa-twitter"></i></a></li>
            <?php endif; ?>
            <?php if($brad_data['check_sharingboxlinkedin']): ?>
            <li><a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" class="linkedin-share"><i class="fa-linkedin"></i></a></li>
            <?php endif; ?>
            <?php if($brad_data['check_sharingboxpinterest']): ?>
            <?php $full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
            <li><a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>&amp;description=<?php echo urlencode($post->post_title); ?>&amp;media=<?php echo urlencode($full_image[0]); ?>" class="pinterest-share"><i class="fa-pinterest"></i></a></li>
            <?php endif; ?>
            <?php if($brad_data['check_sharingboxgoogle']): ?>
            <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"  class="google-share"><i class="fa-google-plus"></i></a></li>
            <?php endif; ?>
          </ul>
          </span>
          <?php endif; ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</li>