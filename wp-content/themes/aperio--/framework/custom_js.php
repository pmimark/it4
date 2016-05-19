<?php 
    
function brad_custom_js(){
    global $brad_data ,$google_fonts;
	
	echo $brad_data['fonts_js'];
    echo $brad_data['google_analytics'];
	
    $default_fonts = array( 'My Font One', 'My Font Two', 'Arial' , "'Arial Black'", "'Bookman Old Style'" , "'Comic Sans MS'" ,'Courier', 'Garamond' ,'Georgia' , 'Impact', "'Lucida Console'" , "'Lucida Sans Unicode'" , "'MS Sans Serif'" , 
"'MS Serif'", "'Palatino Linotype'" , "Tahoma" , "'Times New Roman'", "'Trebuchet MS'", 'Verdana' ,    
 );	
   
 
   $gfonts = array();   

   /* Now Load Google Fonts */
   foreach($google_fonts as $google_font) {
   //Remove the Backup font Family
   $gfonts_array = explode(", ", $google_font );
   $font = $gfonts_array[0];
   //If not a Default Font
   if( !empty($font) && !in_array($font , $default_fonts) ) {
        $gfonts[urlencode($font)] = '"' . urlencode($font) . ':300,400,400italic,500,600,700,700italic:latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese"';
	}
 }
	if(is_array($gfonts) && !empty($gfonts)) {
		$gfonts = implode($gfonts, ', ');
	}
	?>
	<script type="text/javascript">
	WebFontConfig = {
		<?php if(!empty($gfonts)): ?>google: { families: [ <?php echo $gfonts; ?> ] } ,<?php endif; ?>
		custom: {
            families: [ 'fontAwesome' <?php if(!empty($brad_data['custom_iconfont']['name'])) echo ' , "'.$brad_data['custom_iconfont']['name'].'"';?> ],
             urls: ['<?php echo get_template_directory_uri();?>/css/icons.css' <?php if(!empty($brad_data['custom_iconfont']['css-url'])) echo ' , "'.$brad_data['custom_iconfont']['css-url'].'"';?>]
         }
	};
	(function() {
		var wf = document.createElement('script');
		wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
		  '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
		wf.type = 'text/javascript';
		wf.async = 'true';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(wf, s);
	})();
</script>
<?php 
	}	
	
  add_action( 'wp_enqueue_scripts', 'brad_custom_js' );
  
function brad_custom_js2(){
    global $brad_data , $device ; 
	if(!is_admin()  && !in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ):?> 
<!-- Custom Scripts -->
<script type="text/javascript">
(function($){
    'use strict';
	jQuery(document).ready(function($){ 
	
	<?php if( $brad_data['check_loader'] == true): ?>
	
	//Leaving Page Fade Out Effect
	  jQuery('a.external').click(function(e){
		var url = jQuery(this).attr('href');		
		e.preventDefault();		
		if(url != '#'){
	         jQuery('body').append('<div class="brad-loader-overlay" style="display:none;opacity=0;filter:alpha(opacity=0)"><div class="bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div></div>');
			 jQuery('.brad-loader-overlay').fadeIn( 400 , "easeInOutExpo" , function(){		 			
			    document.location.href = url;
		  	});
		}
	});	
	
	<?php  if( $device->isMobile() || $device->isTablet() ) {	?>
	
	 window.addEventListener("DOMContentLoaded", function() {
	     $("body").queryLoader2({						
	       showbar: false ,		
		   backgroundColor: "transparent",			
		   completeAnimation: "fade",
		   minimumTime: 500,
		   onComplete : function() {
				$(".brad-loader-overlay").fadeOut( 300 , "easeInOutExpo" , function(){
					$(".brad-loader-overlay").remove();
				});
			}
		});
      });
							
	  
	  <?php } else { ?>
	  
	  $("body").queryLoader2({						
	        showbar: false ,		
		   backgroundColor: "transparent",	
		   completeAnimation: "fade",
		   minimumTime: 500,
		   onComplete : function() {
				$(".brad-loader-overlay").fadeOut( 300 , "easeInOutExpo" , function(){
					$(".brad-loader-overlay").remove(); 
				});
			}
		});
	  
	  <?php } ?>	
	  <?php endif; ?>
	  
	  var retina = window.devicePixelRatio > 1 ? true : false;
         <?php if($brad_data['media_logo_retina']['url'] && $brad_data['logo_width'] ): ?>
        if(retina) {
        	jQuery('#logo .default-logo').attr('src', '<?php echo $brad_data["media_logo_retina"]['url']; ?>');
        	jQuery('#logo img').css('max-width', '<?php echo intval($brad_data["logo_width"]); ?>px');
			<?php if($brad_data['media_logo_retina_white']['url']){ ?>
			jQuery('#logo .white-logo').attr('src', '<?php echo $brad_data["media_logo_retina_white"]['url']; ?>');
			<?php } else { ?>
			jQuery('#logo .white-logo').attr('src', '<?php echo $brad_data["media_logo_retina"]['url']; ?>');
			<?php } ?>
			<?php if( $brad_data['header_layout'] == 'type4' || $brad_data['header_layout'] == 'type5' ){ ?>
			jQuery('#side_logo .default-logo').attr('src', '<?php echo $brad_data["media_logo_retina"]['url']; ?>');
			jQuery('#side_logo img').css('max-width', '<?php echo intval($brad_data["logo_width"]); ?>px');
			<?php } ?>
        }
        <?php endif; ?>
		
	});
}(jQuery))	
</script>
        <?php
		endif;
	}
	
  add_action( 'wp_footer', 'brad_custom_js2' , 99 );
  
  
?>