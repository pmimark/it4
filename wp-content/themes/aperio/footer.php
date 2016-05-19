<?php  global $brad_data;?>

<footer id="footer" class="cover-padding-<?php echo $brad_data['boxed_pcover_footer']?>">
  <?php if($brad_data['check_footerwidgets']){	?>
  <div class="footer-widgets headline-bg-<?php echo $brad_data['font_footerheadline_bg']?>">
    <div class="container">
      <div class="row-fluid">
        <div class="footer-widget-container row-fluid">
          <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widgets Area1')) : ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  
  
  <?php if($brad_data['check_footerwidgets2']){	?>
  <div class="footer-widgets2 headline-bg-<?php echo $brad_data['font_footerheadline_bg2']?>">
    <div class="container">
      <div class="row-fluid">
        <div class="footer-widget-container row-fluid">
          <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widgets Area2')) : ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  
  <div id="copyright">
    <div class="container">
      <div class="row-fluid">
        <div class="row-fluid">
          <div class="copyright-text copyright-left">
            <?php if($brad_data['textarea_copyright'] != "") { ?>
            <?php echo $brad_data['textarea_copyright']; ?>
            <?php } ?>
          </div>
          <div class="textright copyright-right">
            <?php if( $brad_data['footer_rightcontent'] == 'menu'){
		  if(has_nav_menu('footer_navigation')){
           wp_nav_menu(array('theme_location' => 'footer_navigation','depth' => 1 , 'container' => false, 'menu_id' => 'footer_menu','menu_class' => 'footer-menu')); 
		   }
		  }
		  elseif ( $brad_data['footer_rightcontent'] == 'top'){
			  echo '<a class="go-top readmore" href="#" ><span>'. __('Go to Top','brad') .'</span><span class="brad-icon"><i class="fa fa-caret-up"></i></span></a>';
		  }
		  elseif ( $brad_data['footer_rightcontent'] == 'social'){
		   get_template_part('framework/headers/social-icons');
		  }
		  ?>
            <!-- Top Bar Social Icons END --> 
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- end copyright -->

<?php if( $brad_data['layout'] == 'boxed') { ?>
</div>
<!-- End Boxed Layout -->
<?php  } ?>
<?php wp_footer(); ?>
<!-- End footer -->
</body></html>