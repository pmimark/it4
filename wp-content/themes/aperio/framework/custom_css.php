<?php 
function brad_custom_css_styles(){
	global $brad_data ,  $brad_page_id;
	
	if(!is_admin()) :
	?>
   <!-- Custom Stylesheet -->
  <style type="text/css">
  <?php
	if(
		!empty($brad_data['custom_font_woff_1']['url'])  && !empty($brad_data['custom_font_ttf_1']['url'])  &&
		!empty($brad_data['custom_font_svg_1']['url'])  && !empty($brad_data['custom_font_eot_1']['url'])
	):
	?>
  @font-face {
	font-family: 'Custom Font One';
	src: url('<?php echo $brad_data['custom_font_eot_1']['url']; ?>');
	src:
		url('<?php echo $brad_data['custom_font_eot_1']['url']; ?>?#iefix') format('eot'),
		url('<?php echo $brad_data['custom_font_woff_1']['url']; ?>') format('woff'),
		url('<?php echo $brad_data['custom_font_ttf_1']['url']; ?>') format('truetype'),
		url('<?php echo $brad_data['custom_font_svg_1']['url']; ?>#MyFontOne') format('svg');
	font-weight: normal;
	font-style: normal;
	}
  <?php endif; ?>

  <?php
	if(
		!empty($brad_data['custom_font_woff_2']['url'])  && !empty($brad_data['custom_font_ttf_2']['url'])  &&
		!empty($brad_data['custom_font_svg_2']['url'])  && !empty($brad_data['custom_font_eot_2']['url'])
	):
	?>
  @font-face {
	font-family: 'Custom Font Two';
	src: url('<?php echo $brad_data['custom_font_eot_2']['url']; ?>');
	src:
		url('<?php echo $brad_data['custom_font_eot_2']['url']; ?>?#iefix') format('eot'),
	    url('<?php echo $brad_data['custom_font_woff_2']['url']; ?>') format('woff'),
		url('<?php echo $brad_data['custom_font_ttf_2']['url']; ?>') format('truetype'),
		url('<?php echo $brad_data['custom_font_svg_2']['url']; ?>#MyFontTwo') format('svg');
	font-weight: normal;
	font-style: normal;
 }
<?php endif; ?>	
    body,
    .boxed-layout{
	   <?php   
	   $bg_color  = get_post_meta( $brad_page_id , 'brad_bg_color', true ) != '' ? get_post_meta( $brad_page_id , 'brad_bg_color', true ) : $brad_data['bg_style']['background-color'];
	   $bg_attachment = get_post_meta( $brad_page_id , 'brad_bg_attachment', true ) != '' ? get_post_meta( $brad_page_id , 'brad_bg_attachment', true ) : $brad_data['bg_style']['background-attachment'];
	   $bg_size = get_post_meta( $brad_page_id , 'brad_bg_cover', true ) != '' ? get_post_meta( $brad_page_id , 'brad_bg_cover', true ) : $brad_data['bg_style']['background-size'];
	   $bg_pos = get_post_meta( $brad_page_id , 'brad_bg_position', true ) != '' ? get_post_meta( $brad_page_id , 'brad_bg_position', true ) : $brad_data['bg_style']['background-position'];
	   $bg_repeat = get_post_meta( $brad_page_id , 'brad_bg_repeat', true ) != '' ? get_post_meta( $brad_page_id , 'brad_bg_repeat', true ) : $brad_data['bg_style']['background-repeat']; ?>
	   
	  <?php 
	  if( get_post_meta( $brad_page_id , 'brad_bg_image', true )){
	      $img_id =  preg_replace('/[^\d]/' , '' , get_post_meta($brad_page_id,'brad_bg_image',true));
		  $img = wp_get_attachment_image_src ( $img_id ,'');
		  echo 'background-image:url("'. $img[0] .'");';
	  }
	  else if( $brad_data['bg_style']['background-image'] != ''){
	       echo 'background-image:url("'. $brad_data['bg_style']['background-image'] .'");'; 
	   }?>	
	   background-color:<?php echo $bg_color;?>;
	   background-repeat:<?php echo $bg_repeat;?>;
	   background-position:<?php echo $bg_pos;?>;
	   -webkit-background-size: <?php echo $bg_size;?>; 
       -moz-background-size: <?php echo $bg_size;?>; 
	   -o-background-size: <?php echo $bg_size;?>; 
	   background-size: <?php echo $bg_size;?>;
	   background-attachment:<?php echo $bg_attachment;?>;
    }
	 
    body{
        font-family: <?php echo $brad_data['font_body']['font-family'] ?> ;
        font-size: <?php echo $brad_data['font_body']['font-size']?>;
        font-style: <?php echo $brad_data['font_body']['font-style']?>;
		font-weight: <?php echo $brad_data['font_body']['font-weight']?>;
	    line-height:<?php echo $brad_data['font_body']['line-height'];?>;
        color: <?php echo $brad_data['font_body_color']?>;
	    <?php if($brad_data['layout'] == "boxed"){ ?>
	    background-color:<?php echo $brad_data['bg_style_boxed']['background-color']?>;
	    <?php if($brad_data['bg_pattern'] && $brad_data['bg_patterns'] != "") { ?>
	        background-image:url('<?php echo get_template_directory_uri().'/images/patterns/'.$brad_data['bg_patterns']?>');
			background-repeat:repeat;
			background-position:left top;
			background-attachment: fixed;
	    <?php } else { ?>
	    <?php if(!empty($brad_data['bg_style_boxed']['background-image'])) : ?>
	    background-image:url("<?php echo $brad_data['bg_style_boxed']['background-image']?>");
	    <?php endif; ?>
	    background-repeat:<?php echo $brad_data['bg_style_boxed']['background-repeat']?>;
	    background-position:<?php echo $brad_data['bg_style_boxed']['background-position']?>;
	    -webkit-background-size: <?php echo $brad_data['bg_style_boxed']['background-size']?>; 
	    -moz-background-size: <?php echo $brad_data['bg_style_boxed']['background-size']?>; 
	    -o-background-size: <?php echo $brad_data['bg_style_boxed']['background-size']?>; 
	    background-size: <?php echo $brad_data['bg_style_boxed']['background-size']?>;
	    background-attachment:<?php echo $brad_data['bg_style_boxed']['background-attachment']?>;
	    <?php }
	    } ?>
   }
   
   .button , input[type="submit"],
   .brad-info-box{
	   font-family:<?php echo $brad_data['font_body']['font-family'] ?> ;
   }
   
   ul.product_list_widget li a,
   .button,
   .counter-title > span.counter-value,
   .readmore{
	   font-family:<?php echo $brad_data['font_secondary']['font-family'] ?>;
   }
   
   .post-meta-data.style2{
	   font-family:<?php echo $brad_data['font_blog']['font-family'];?>;
	   font-weight:<?php echo $brad_data['font_blog']['font-weight'];?>;
	   font-style:<?php echo $brad_data['font_blog']['font-style'];?>;
	   letter-spacing:<?php echo $brad_data['font_blog']['letter-spacing'];?>;
	   text-transform:<?php echo $brad_data['font_blog']['text-transform'];?>;
	   font-size: <?php echo $brad_data['font_blog']['font-size']?>;
   }
   
   .posts-grid .post-meta-data.style2{
	   font-size:<?php echo $brad_data['font_blog_grid'];?>px;
   }
   
	 
  /*blockquote style */
  blockquote{
    font-family: <?php echo $brad_data['font_blockquote']['font-family'] ?> ;
    font-size: <?php echo $brad_data['font_blockquote']['font-size']?>;
    font-style: <?php echo $brad_data['font_blockquote']['font-style']?>;
	font-weight: <?php echo $brad_data['font_blockquote']['font-weight']?>;
	line-height:<?php echo $brad_data['font_blockquote']['line-height'];?>;
	letter-spacing:<?php echo $brad_data['font_blockquote']['letter-spacing'];?>;
	text-transform:<?php echo $brad_data['font_blockquote']['text-transform'];?>;
    color: <?php echo $brad_data['font_blockquote']['color'];?>;
  }

   /*-----------------------------------------------------*/
   /* Heading Styles
   /*-----------------------------------------------------*/

   h1{
    font-family: <?php echo $brad_data['font_h1']['font-family'] ?> ;
    font-size: <?php echo $brad_data['font_h1']['font-size']?>;
    font-style: <?php echo $brad_data['font_h1']['font-style']?>;
	font-weight: <?php echo $brad_data['font_h1']['font-weight']?>;
	line-height:<?php echo $brad_data['font_h1']['line-height'];?>;
	letter-spacing:<?php echo $brad_data['font_h1']['letter-spacing'];?>;
	text-transform:<?php echo $brad_data['font_h1']['text-transform'];?>;
    color: <?php echo $brad_data['font_h1_color']?>;
	}

  h2{
    font-family: <?php echo $brad_data['font_h2']['font-family'] ?> ;
    font-size: <?php echo $brad_data['font_h2']['font-size']?>;
    font-style: <?php echo $brad_data['font_h2']['font-style']?>;
	 font-weight: <?php echo $brad_data['font_h2']['font-weight']?>;
	line-height:<?php echo $brad_data['font_h2']['line-height'];?>;
	letter-spacing:<?php echo $brad_data['font_h2']['letter-spacing'];?>;
	text-transform:<?php echo $brad_data['font_h2']['text-transform'];?>;
    color: <?php echo $brad_data['font_h2_color']?>;
   }

   h3{
    font-family: <?php echo $brad_data['font_h3']['font-family'] ?> ;
    font-size: <?php echo $brad_data['font_h3']['font-size']?>;
    font-style: <?php echo $brad_data['font_h3']['font-style']?>;
	font-weight: <?php echo $brad_data['font_h3']['font-weight']?>;
	line-height:<?php echo $brad_data['font_h3']['line-height'];?>;
	letter-spacing:<?php echo $brad_data['font_h3']['letter-spacing'];?>;
	text-transform:<?php echo $brad_data['font_h3']['text-transform'];?>;
    color: <?php echo $brad_data['font_h3_color']?>; 
   }

  h4{
    font-family: <?php echo $brad_data['font_h4']['font-family'] ?>;
    font-size: <?php echo $brad_data['font_h4']['font-size']?>;
    font-style: <?php echo $brad_data['font_h4']['font-style']?>;
	font-weight: <?php echo $brad_data['font_h4']['font-weight']?>;
	line-height:<?php echo $brad_data['font_h4']['line-height'];?>;
	letter-spacing:<?php echo $brad_data['font_h4']['letter-spacing'];?>;
	text-transform:<?php echo $brad_data['font_h4']['text-transform'];?>;
    color: <?php echo $brad_data['font_h4_color']?>;
   } 

  h5{
    font-family: <?php echo $brad_data['font_h5']['font-family'] ?>;
    font-size: <?php echo $brad_data['font_h5']['font-size']?>;
    font-style: <?php echo $brad_data['font_h5']['font-style']?>;
	font-weight: <?php echo $brad_data['font_h5']['font-weight']?>;
	line-height:<?php echo $brad_data['font_h5']['line-height'];?>;
	letter-spacing:<?php echo $brad_data['font_h5']['letter-spacing'];?>;
	text-transform:<?php echo $brad_data['font_h5']['text-transform'];?>;
    color: <?php echo $brad_data['font_h5_color']?>;
   }

  h6{
    font-family: <?php echo $brad_data['font_h6']['font-family'] ?>;
    font-size: <?php echo $brad_data['font_h6']['font-size']?>;
    font-style: <?php echo $brad_data['font_h6']['font-style']?>;
	font-weight: <?php echo $brad_data['font_h6']['font-weight']?>;
	line-height:<?php echo $brad_data['font_h6']['line-height'];?>;
	letter-spacing:<?php echo $brad_data['font_h6']['letter-spacing'];?>;
	text-transform:<?php echo $brad_data['font_h6']['text-transform'];?>;
    color: <?php echo $brad_data['font_h6_color']?>; 
   }
   
  .sidebar .widget > h4 {
	font-family: <?php echo $brad_data['font_sidebar_hl']['font-family'] ?>;
    font-size: <?php echo $brad_data['font_sidebar_hl']['font-size']?>;
    font-style: <?php echo $brad_data['font_sidebar_hl']['font-style']?>;
	font-weight: <?php echo $brad_data['font_sidebar_hl']['font-weight']?>;
	line-height:<?php echo $brad_data['font_sidebar_hl']['line-height'];?>;
	letter-spacing:<?php echo $brad_data['font_sidebar_hl']['letter-spacing'];?>;
	text-transform:<?php echo $brad_data['font_sidebar_hl']['text-transform'];?>;
    color: <?php echo $brad_data['color_sidebar_hl']?>;
	background-color:<?php echo $brad_data['bgcolor_sidebar_hl']?>;
   }
   

   a{
	   color:<?php echo $brad_data['color_link'];?>;
   }
    a:hover{
		color:<?php echo $brad_data['color_hover'];?>;
	}
	
  
  .tooltips a{
	  border-bottom-color:<?php echo $brad_data['color_link'];?>
  }
  
  .tooltips a:hover{
	  border-bottom-color:<?php echo $brad_data['color_hover'];?>
  }
  
 
   .boxed-layout{
	   border:<?php echo $brad_data['boxed_border']['border-top'];?> <?php echo $brad_data['boxed_border']['border-style'];?> <?php echo $brad_data['boxed_border']['border-color'];?>;
   }

/*----------------------------------------------*/ 
/* Topbar 
/*----------------------------------------------*/

  #top_bar {
	background-color:<?php echo $brad_data['topbar_bg_color'];?>;
	border-bottom-color:<?php echo $brad_data['topbar_border_color'];?>;
	color:<?php echo $brad_data['topbar_font_color'];?>;
  }
  #top_bar .social-icons li{
	  border-color:<?php echo $brad_data['topbar_ci_divi']?>;
  }
   #top_bar .contact-info span,
   #top_bar .top-menu > li {
     border-color:<?php echo $brad_data['topbar_ci_divi'];?>;
  }
  
  #top_bar .social-icons li a ,
  #top_bar .top-menu > li a ,
  #top_bar  a {
	  color:<?php echo $brad_data['top_link_color'];?>;
  }
  #top_bar .social-icons li a:hover ,
  #top_bar .top-menu > li a:hover ,
  #top_bar a:hover {
	  color:<?php echo $brad_data['top_link_color_hover'];?>;
  }


  /*----------------------------------------------*/
  /* Main Navigation Styles
  /*----------------------------------------------*/

   #header.shrinked #main_navigation{
	 min-height:<?php echo $brad_data['shrink_nav_height'];?>px;
  }
  
  #header.shrinked #main_navigation #logo ,
  #header.shrinked #main_navigation ul.main_menu > li,
  #header.shrinked.type3 #header-search-button,
  #header.shrinked.type3 .cart-container,
  #header.shrinked.type3 .header-nav .social-icons{
	  height:<?php echo $brad_data['shrink_nav_height'];?>px!important;
	  line-height:<?php echo $brad_data['shrink_nav_height'];?>px!important;
	  max-height:<?php echo $brad_data['shrink_nav_height'];?>px!important;
  }
  
  
  <?php if( intval($brad_data['logo_con_width']) > 0) :?>
  .logo-container{
	   width:<?php echo intval($brad_data['logo_con_width'])?>px;
   }
   #header.type2 .logo-container{
	   margin-left:-<?php echo intval($brad_data['logo_con_width']/2)?>px;
   }
   #header.type2 .left-nav-container{
	   padding-right:<?php echo intval($brad_data['logo_con_width']/2 + 40)?>px;
   }
   #header.type2 .right-nav-container{
	   padding-left:<?php echo intval($brad_data['logo_con_width']/2 + 40)?>px;
   }
   
<?php endif; ?>

  #main_navigation{
	  min-height:<?php echo $brad_data['header_height'];?>px;
  }
  #main_navigation ,
  .header_container,
  #header.type3 .nav-container,
  #side_header {
      background:<?php echo $brad_data['bg_style_header']['background-color']?>;
<?php  if( $brad_data['bg_style_header']['background-image'] != ''): ?>
      background-image:url(<?php echo $brad_data['bg_style_header']['background-image'];?>);
	  background-repeat:<?php echo $brad_data['bg_style_header']['background-repeat'];?>;
	  background-position:<?php echo $brad_data['bg_style_header']['background-position'];?>;
<?php endif; ?>
  }
  ul.main_menu > li > a ,
  #side_header ul.side_menu > li > a { 
      color:<?php echo $brad_data['font_nav_color'];?>;
      font-size:<?php echo $brad_data['font_nav']['font-size'];?>;
      font-weight: <?php echo $brad_data['font_nav']['font-weight'];?>;
	  letter-spacing: <?php echo $brad_data['font_nav']['letter-spacing'];?>;
      font-family:<?php echo $brad_data['font_nav']['font-family']?>;
	  text-transform:<?php echo $brad_data['font_nav']['text-transform']?>;
	  border-bottom-color:<?php echo $brad_data['dropdown_border_color'];?>
   }
   
   .brad-mega-menu .brad-megamenu-title{
	  color:<?php echo $brad_data['megamenu_title_color']?>;
	  border-bottom-color:<?php echo $brad_data['megamenu_title_color']?>;
      font-size:<?php echo $brad_data['font_megamenu_dropdown']['font-size'];?>;
      font-weight: <?php echo $brad_data['font_megamenu_dropdown']['font-weight'];?>;
	  letter-spacing: <?php echo $brad_data['font_megamenu_dropdown']['letter-spacing'];?>;
      font-family:<?php echo $brad_data['font_megamenu_dropdown']['font-family']?>;
	  text-transform:<?php echo $brad_data['font_megamenu_dropdown']['text-transform']?>;
   }
   
  .main_menu > li:hover > a,
  .main_menu > li > a:hover ,
  #side_header ul.side_menu > li > a:hover {
	  color: <?php echo $brad_data['nav_font_hover_color'];?>
  }
  
  #side_header ul.side_menu > li > a,
  #side_header ul.side_menu > li > ul{
	  border-bottom-color:<?php echo $brad_data['sidenav_divi_color'];?>
  }

  .main_menu > li.active a,
  .main_menu > li.active a:hover ,
  #side_header ul.side_menu > li.active > a,
  #side_header ul.side_menu > li.active > a:hover
   {
	   color: <?php echo $brad_data['nav_font_active_color'];?>;
	   border-top-color:<?php echo $brad_data['nav_font_active_color'];?>;
}
<?php 
   $rgb  = brad_hex2rgb($brad_data['dropdown_background_color']);
   $rgba = 'rgba('.$rgb[0].','.$rgb[1].','.$rgb[2].','.$brad_data['dropdown_background_opacity'].')'; 
?>
  .main_menu ul.sub-menu {
	background-color:<?php echo $brad_data['dropdown_background_color']?>;
	background-color:<?php echo $rgba;?>;
	border-color:<?php echo $brad_data['dropdown_border_color'];?>;
	border-color:<?php echo $brad_data['dropdown_border_color'];?>
	
}

 .main_menu ul.sub-menu li a ,
 #side_header .sub-menu li a {
	color:<?php echo $brad_data['font_dropdown_color'];?>;
    font-size:<?php echo $brad_data['font_nav_dropdown']['font-size'];?>;
    font-weight:<?php echo $brad_data['font_nav_dropdown']['font-weight']; ?>; 
    font-family:<?php echo $brad_data['font_nav_dropdown']['font-family'];?>;
	text-transform:<?php echo $brad_data['font_nav_dropdown']['text-transform'];?>;
	letter-spacing:<?php echo $brad_data['font_nav_dropdown']['letter-spacing'];?>;
  }

  .main_menu .sub-menu li.current-menu-item > a,
  .main_menu .sub-menu li.current-menu-item > a:hover,
  .main_menu .sub-menu li.current_page_item > a,
  .main_menu .sub-menu li.current_page_item > a:hover ,

  #side_header .sub-menu li.current-menu-item >  a,
  #side_header .sub-menu li.current-menu-item > a:hover,
  #side_header .sub-menu li.current_page_item > a,
  #side_header .sub-menu li.current_page_item > a:hover{
	 color:<?php echo $brad_data['font_dropdown_active_color'];?>;
  }


  .main_menu .sub-menu li a:hover{
	 color:<?php echo $brad_data['dropdown_font_hover_color'];?>;
}

  #side_header .sub-menu li a:hover{
	 color:<?php echo $brad_data['dropdown_font_hover_color'];?>;
  }

  #header-search-button a ,
  .cart-icon-wrapper ,
  .toggle-menu ,
  .header-nav .social-icons li a ,
  .carticon-mobile{
	 color:<?php echo $brad_data['color_ex_header'];?>;
	 background-color:<?php echo $brad_data['bg_ex_header'];?>;
	 
  }


  #header-search-button a:hover ,
  .cart-icon-wrapper:hover ,
  .toggle-menu:hover ,
  .header-nav .social-icons li a:hover ,
  .carticon-mobile:hover{
	 color:<?php echo $brad_data['color_ex_header_hover'];?>;
	 background-color:<?php echo $brad_data['bg_ex_header_hover'];?>;
  }
  
  #logo ,
  ul.main_menu > li ,
  #header.type3 #header-search-button,
  #header.type3 .cart-container,
  #header.type3 .header-nav .social-icons{
	  height:<?php echo $brad_data['header_height'];?>px;
	  line-height:<?php echo intval($brad_data['header_height'] );?>px;
	  max-height:<?php echo $brad_data['header_height'];?>px;
 }

 .main_menu > li > ul.sub-menu.brad-mega-menu > li{
	 border-right-color:<?php echo $brad_data['megamenu_di_color'];?>
 }
 

<?php if( $brad_data['header_layout'] == 'type4' || $brad_data['header_layout'] == 'type5'): ?>

   #side_header .contact-info{
	   border-top-color:<?php echo $brad_data['sidenav_divi_color'];?>;
   }
   #side_header ul.side_menu >  li >  a{
	   border-bottom-color:<?php echo $brad_data['sidenav_divi_color'];?>;
   }

   #side_header .contact-info li{
	   color:<?php echo $brad_data['sidenav_ex_color'];?>
   }
   #side_header .contact-info li i{
	   color:<?php echo $brad_data['sidenav_ex_icon_color'];?>
   }
<?php endif;?>  

  #titlebar.titlebar-type-transparent{
	 padding-top:<?php echo $brad_data['header_height'];?>px;
 }

 
 
 /* Woocart Stylings */
 .cart-container .widget_shopping_cart{
<?php 
   $rgb  = brad_hex2rgb($brad_data['bg_woocart']);
   $rgba = 'rgba('.$rgb[0].','.$rgb[1].','.$rgb[2].','.$brad_data['woo_bg_opacity'].')'; 
?>	 
	 background-color:<?php echo $brad_data['bg_woocart']?>;
	 background-color:<?php echo $rgba;?>;
	 color:<?php echo $brad_data['color_woocart'] ?>;
 }
 
 .cart-container ul.product_list_widget li a{
	 color:<?php echo $brad_data['color_woolink'] ?>;
 }
 
 .cart-container ul.product_list_widget li a:hover{
	 color:<?php echo $brad_data['color_woolink_hover'] ?>;
 }
 
 .cart-container p.buttons .button{
	 color:<?php echo $brad_data['color_woolink'] ?>!important;
	 border-color:<?php echo $brad_data['color_woolink'] ?>!important;
 }
 
 .cart-container p.buttons .button:hover{
	 color:<?php echo $brad_data['color_woolink_hover'] ?>!important;
	 border-color:<?php echo $brad_data['color_woolink_hover'] ?>!important;
 }
 
 .cart-container .widget_shopping_cart_content .total{
	 border-bottom-color:<?php echo $brad_data['divi_woocart'] ?>!important;
	 border-top-color:<?php echo $brad_data['divi_woocart'] ?>!important;
 }
 
 .cart-container .widget_shopping_cart{
	 border:1px solid <?php echo $brad_data['divi_woocart'] ?>;
 }
 
 .cart-container ul.product_list_widget li .quantity{
	 color:<?php echo $brad_data['color_woocart'] ?>;
 }
 
 /* Brad Slider*/
 .carousel-caption h6{
	font-family: <?php echo $brad_data['font_slider_subtitle']['font-family'] ?>;
    font-size: <?php echo $brad_data['font_slider_subtitle']['font-size']?>;
    font-weight: <?php echo $brad_data['font_slider_subtitle']['font-weight']?>;
	font-style: <?php echo $brad_data['font_slider_subtitle']['font-style']?>;
	line-height:<?php echo $brad_data['font_slider_subtitle']['line-height'];?>;
	letter-spacing:<?php echo $brad_data['font_slider_subtitle']['letter-spacing'];?>;
	text-transform:<?php echo $brad_data['font_slider_subtitle']['text-transform'];?>;
  }

 
 .carousel-caption h2{
	font-family: <?php echo $brad_data['font_slider']['font-family'] ?>;
    font-size: <?php echo $brad_data['font_slider']['font-size']?>;
    font-style: <?php echo $brad_data['font_slider']['font-style']?>;
	font-weight: <?php echo $brad_data['font_slider']['font-weight']?>;
	line-height:<?php echo $brad_data['font_slider']['line-height'];?>;
	letter-spacing:<?php echo $brad_data['font_slider']['letter-spacing'];?>;
	text-transform:<?php echo $brad_data['font_slider']['text-transform'];?>;
  }
  
  
  .carousel-caption .slider-content{
	font-family: <?php echo $brad_data['font_slider_caption']['font-family'] ?>;
    font-size: <?php echo $brad_data['font_slider_caption']['font-size']?>;
    font-style: <?php echo $brad_data['font_slider_caption']['font-style']?>;
	 font-weight: <?php echo $brad_data['font_slider_caption']['font-weight']?>;
	line-height:<?php echo $brad_data['font_slider_caption']['line-height'];?>;
	letter-spacing:<?php echo $brad_data['font_slider_caption']['letter-spacing'];?>;
	text-transform:<?php echo $brad_data['font_slider_caption']['text-transform'];?>;
  }
  
  <?php if($brad_data['slider_nav'] == true): ?>
  .carousel-control{
	  width:<?php echo $brad_data['slider_navsize']?>px;
	  height:<?php echo $brad_data['slider_navsize']?>px;
	  line-height:<?php echo intval($brad_data['slider_navsize'] - 4 )?>px;
	  margin-top:-<?php echo intval($brad_data['slider_navsize']/2)?>px;
	  font-size:<?php echo $brad_data['slider_iconsize'];?>px;
	  -webkit-border-radius:<?php echo $brad_data['slider_radius'];?>px;
	  -moz-border-radius:<?php echo $brad_data['slider_radius'];?>px;
	  border-radius:<?php echo $brad_data['slider_radius'];?>px;
	  border-width:<?php echo $brad_data['slider_border']['border-top'];?>;
	  border-style:<?php echo $brad_data['slider_border']['border-style'];?>;
	  <?php if($brad_data['slider_bc'] != ''){ ?>
	     border-color:<?php echo $brad_data['slider_bc']?>!important;
     <?php } ?>
	  <?php if($brad_data['slider_bgc'] != ''){ ?>
	     background-color:<?php echo $brad_data['slider_bgc']?>!important;
     <?php } ?>
	 
	 <?php if($brad_data['slider_c'] != ''){ ?>
	     color:<?php echo $brad_data['slider_c']?>!important;
     <?php } ?>
  }
  
  .carousel-control:hover{
	  <?php if($brad_data['slider_bc_hover'] != ''){ ?>
	     border-color:<?php echo $brad_data['slider_bc_hover']?>!important;
     <?php } ?>
	 <?php if($brad_data['slider_c_hover'] != ''){ ?>
	     color:<?php echo $brad_data['slider_c_hover']?>!important;
     <?php } ?>
	 <?php if($brad_data['slider_bgc_hover'] != ''){ ?>
	     color:<?php echo $brad_data['slider_bgc_hover']?>!important;
     <?php } ?>
  }
  
  <?php endif; ?>
 
 /*----------------------------------------------*/
 /* titlebar Style
 /*----------------------------------------------*/
 #titlebar{
	  <?php if(get_post_meta($brad_page_id,'brad_titlebar_bg_color',true) != ''){ 
	      $brad_data['bg_titlebar']['background-color'] = get_post_meta($brad_page_id,'brad_titlebar_bg_color',true);
	  } 
	  if ( $brad_data['bg_titlebar']['background-color'] != ''){
		  echo 'background-color:' .$brad_data['bg_titlebar']['background-color'] .'!important;'; 
	  } ?>
  }
  
  #titlebar .titlebar-heading h1{
	  font-family: <?php echo $brad_data['font_titlebarheadline']['font-family'] ?>;
      font-style: <?php echo $brad_data['font_titlebarheadline']['font-style']?>;
	  font-weight: <?php echo $brad_data['font_titlebarheadline']['font-weight']?>;
	  line-height:<?php echo $brad_data['font_titlebarheadline_small']['line-height'];?>;
	  font-size: <?php echo $brad_data['font_titlebarheadline_small']['font-size']?>;
	  letter-spacing:<?php echo $brad_data['font_titlebarheadline_small']['letter-spacing'];?>;
	  text-transform:<?php echo $brad_data['font_titlebarheadline_small']['text-transform'];?>;
  }
  
  #titlebar.titlebar-size-medium .titlebar-heading h1 {
	line-height:<?php echo $brad_data['font_titlebarheadline_medium']['line-height'];?>;
	font-size: <?php echo $brad_data['font_titlebarheadline_medium']['font-size']?>;
	letter-spacing:<?php echo $brad_data['font_titlebarheadline_medium']['letter-spacing'];?>;
	text-transform:<?php echo $brad_data['font_titlebarheadline_medium']['text-transform'];?>;
  }
  
  #titlebar.titlebar-size-large .titlebar-heading h1 {
	line-height:<?php echo $brad_data['font_titlebarheadline_large']['line-height'];?>;
	font-size: <?php echo $brad_data['font_titlebarheadline_large']['font-size']?>;
	letter-spacing:<?php echo $brad_data['font_titlebarheadline_large']['letter-spacing'];?>;
	text-transform:<?php echo $brad_data['font_titlebarheadline_large']['text-transform'];?>;
  }

  #titlebar .parallax-image{
	 <?php 
	  if( get_post_meta($brad_page_id,'brad_bg_image_titlebar',true) != '') {
		  $img_id =   preg_replace('/[^\d]/' , '' , get_post_meta($brad_page_id,'brad_bg_image_titlebar',true));
		  $img = wp_get_attachment_image_src ( $img_id ,'');
		  echo 'background-image:url("'. $img[0] .'");';
     }
	 else if( $brad_data['bg_titlebar']['background-image'] != ''){
		 echo 'background-image:url('.$brad_data['bg_titlebar']['background-image'].');';
	 }
	 
	
	   $bg_size = get_post_meta( $brad_page_id , 'brad_titlebar_bg_cover', true ) != '' ? get_post_meta( $brad_page_id , 'brad_titlebar_bg_cover', true ) : $brad_data['bg_titlebar']['background-size'];
	   $bg_pos = get_post_meta( $brad_page_id , 'brad_titlebar_bg_pos', true ) != '' ? get_post_meta( $brad_page_id , 'brad_titlebar_bg_pos', true ) : $brad_data['bg_titlebar']['background-position'];
	   $bg_repeat = get_post_meta( $brad_page_id , 'brad_titlebar_bg_repeat', true ) != '' ? get_post_meta( $brad_page_id , 'brad_titlebar_bg_repeat', true ) : $brad_data['bg_titlebar']['background-repeat']; 
	  ?>
	   background-repeat:<?php echo $bg_repeat;?>;
	   background-position:<?php echo $bg_pos;?>;
	   -webkit-background-size: <?php echo $bg_size;?>; 
       -moz-background-size: <?php echo $bg_size;?>; 
	   -o-background-size: <?php echo $bg_size;?>; 
	   background-size: <?php echo $bg_size;?>;
  }
  
   <?php $bg_opacity = get_post_meta( $brad_page_id , 'brad_titlebar_bgo_opacity', true ) != '' ? get_post_meta( $brad_page_id , 'brad_titlebar_bgo_opacity', true ) : intval( $brad_data['titlebar_bgo_opacity'] ); 
	    $bg_overlay = get_post_meta( $brad_page_id , 'brad_titlebar_bgo_color', true ) != '' ? get_post_meta( $brad_page_id , 'brad_titlebar_bgo_color', true ) : $brad_data['titlebar_bgo_color']; 
	   ?>
  #titlebar .section-overlay{
	   background-color:<?php echo $bg_overlay;?>;
	   opacity:<?php echo $bg_opacity?>;
	   filter:alpha(opacity=<?php echo ($bg_opacity*100)?>);
 }
 
 #titlebar .titlebar-wrapper{
	 <?php if( intval(get_post_meta($brad_page_id , 'brad_title_height',true)) > 0 ){ 
	 $brad_data['titlebar_height'] = intval(get_post_meta($brad_page_id , 'brad_title_height',true));
	 }?>
	 height:<?php echo $brad_data['titlebar_height']?>px;
	 min-height:<?php echo $brad_data['titlebar_height']?>px;
 }

 #titlebar.titlebar-type-transparent .titlebar-wrapper{
	 padding-bottom:<?php echo intval($brad_data['header_height']/2 - 10);?>px;
 }

 #titlebar .titlebar-subcontent{
	 font-family: <?php echo $brad_data['font_titlebarsubtitle']['font-family'] ?>;
      font-style: <?php echo $brad_data['font_titlebarsubtitle']['font-style']?>;
	  font-weight: <?php echo $brad_data['font_titlebarsubtitle']['font-weight']?>;
	  letter-spacing:<?php echo $brad_data['font_titlebarsubtitle']['letter-spacing'];?>;
	  text-transform:<?php echo $brad_data['font_titlebarsubtitle']['text-transform'];?>;
}
  

/*-------------------------------------------------*/
/* Overlay and buttons
*---------------------------------------------------*/


  .button ,
  input[type="submit"]{
	  background-color:<?php echo $brad_data['color_buttonbg'];?>;
	  color:<?php echo $brad_data['color_buttontext'];?>;
}

  
/*---------------------------------------------------*/
/* Footer Styles
/*---------------------------------------------------*/

  #footer{
	font-size:<?php echo $brad_data['fontsize_footer'];?>px;
	line-height:<?php echo $brad_data['lineheight_footer']?>px;
  }

/*Fotter Widget Area1*/
<?php if($brad_data['check_footerwidgets'] == true) : ?>
 #footer .footer-widgets{
	 border-top:<?php echo $brad_data['footer_border']['border-top'];?> <?php echo $brad_data['footer_border']['border-style'];?> <?php echo $brad_data['footer_border']['border-color'];?>;
	 background-color:<?php echo $brad_data['color_footerbg'] ?>;
	 color: <?php echo $brad_data['color_footertext'] ?>;
 }
 
 #footer  .widget_nav_menu ul ul{
	  border-top:1px solid <?php echo $brad_data['color_footerdivider'];?>;
  }
  
  #footer .footer-widgets .widget-posts li .date {
      color : <?php echo $brad_data['color_footertext'] ?>;
  }

  #footer .footer-widgets .widget h4 {
     color:<?php echo $brad_data['font_footerheadline']['color'] ?>!important;
     font-family:<?php echo $brad_data['font_footerheadline']['font-family'] ?>,sans-serif;
     font-style:<?php echo $brad_data['font_footerheadline']['font-style'] ?>;
	 font-weight:<?php echo $brad_data['font_footerheadline']['font-weight'] ?>;
     font-size:<?php echo $brad_data['font_footerheadline']['font-size'] ?>;
	 line-height:<?php echo $brad_data['font_footerheadline']['line-height'] ?>;
	 letter-spacing:<?php echo $brad_data['font_footerheadline']['letter-spacing'] ?>;
	 text-transform:<?php echo $brad_data['font_footerheadline']['text-transform'] ?>;
	 background-color:<?php echo $brad_data['font_footerheadline_bg'];?>
  }
  
   #footer .footer-widgets a:link, #footer .footer-widgets a, #footer .footer-widgets a:visited, #footer .footer-widgets a:active{
      color:<?php echo $brad_data['color_footerlink']?>!important;
  }
  #footer .footer-widgets a:hover, #footer .footer-widgets .widget_tag_cloud a:hover{
      color:<?php echo $brad_data['color_footerlinkhover']?>;
  }
  <?php endif; ?>
  
  
  <?php if($brad_data['check_footerwidgets2'] == true) : ?>
  /*Footer widget area2 */
  
  #footer .footer-widgets2{
	 border-top:<?php echo $brad_data['footer_border2']['border-top'];?> <?php echo $brad_data['footer_border2']['border-style'];?> <?php echo $brad_data['footer_border2']['border-color'];?>;
	 background-color:<?php echo $brad_data['color_footerbg2'] ?>;
	 color: <?php echo $brad_data['color_footertext2'] ?>;
 }
 
 
  #footer .footer-widgets2 .widget_nav_menu ul ul{
	  border-top:1px solid <?php echo $brad_data['color_footerdivider2'];?>;
  }
  
  #footer .footer-widgets2 .widget-posts li .date {
      color : <?php echo $brad_data['color_footertext2'] ?>;
  }

  #footer .footer-widgets2 .widget h4 {
     color:<?php echo $brad_data['font_footerheadline2']['color'] ?>!important;
     font-family:<?php echo $brad_data['font_footerheadline2']['font-family'] ?>,sans-serif;
     font-style:<?php echo $brad_data['font_footerheadline2']['font-style'] ?>;
	 font-weight:<?php echo $brad_data['font_footerheadline2']['font-weight'] ?>;
     font-size:<?php echo $brad_data['font_footerheadline2']['font-size'] ?>;
	 letter-spacing:<?php echo $brad_data['font_footerheadline2']['letter-spacing'] ?>;
	 line-height:<?php echo $brad_data['font_footerheadline2']['line-height'] ?>;
	 text-transform:<?php echo $brad_data['font_footerheadline2']['text-transform'] ?>;
	  background-color:<?php echo $brad_data['font_footerheadline_bg2'];?>
  }
  
   #footer .footer-widgets2 a:link, #footer .footer-widgets2 a, #footer .footer-widgets2 a:visited, #footer .footer-widgets2 a:active{
      color:<?php echo $brad_data['color_footerlink2']?>!important;
  }
  #footer .footer-widgets2 a:hover, #footer .footer-widgets2 .widget_tag_cloud a:hover{
      color:<?php echo $brad_data['color_footerlinkhover2']?>;
	  
  }
  
  <?php endif; ?>
  
  /*footer copyright area */
  #copyright a  , 
  #copyright a:link ,
  #copyright a:active,
  #copyright .social-icons a ,
  #copyright .footer-menu > li a ,
  #copyright .go-top {
	 color: <?php echo $brad_data['color_copyrightlink']?>;
  }
  #copyright a:hover,
  #copyright .social-icons a:hover ,
  #copyright .footer-menu > li a:hover,
  #copyright .go-top:hover{
	 color:<?php echo $brad_data['color_copyrightlinkhover']?>;
  }
  .footer-menu > li{
	  border-right:1px solid <?php echo $brad_data['color_copyrightdivider'];?>;
  }
  
  #copyright{
	  border-top:<?php echo $brad_data['copyright_border']['border-top'];?> <?php echo $brad_data['copyright_border']['border-style'];?> <?php echo $brad_data['copyright_border']['border-color'];?>;
	  background-color:<?php echo $brad_data['color_bgcopyright'];?>;
	  color: <?php echo $brad_data['color_copyrighttext'] ?>;
  }


 /* overlay color */
 .overlay{
	 <?php $rgb  = brad_hex2rgb($brad_data['bg_overlay']);
           $rgba = 'rgba('.$rgb[0].','.$rgb[1].','.$rgb[2].','.$brad_data['bg_overlay_opacity'].')'; ?>
	background-color:<?php echo $brad_data['bg_overlay']; ?>;
	background-color:<?php echo $rgba;?>
 }
 
 .overlay-content,
  .portfolio-items.portfolio-style1 .portfolio-item .info h5,
 .portfolio-items.portfolio-style1 .portfolio-item .info h5 a{
	 color:<?php echo $brad_data['color_overlay'];?>!important;
 }
 
 .portfolio-items.portfolio-style1 .portfolio-item .info h3,
 .portfolio-items.portfolio-style1 .portfolio-item .info h3 a,
 .overlay-content h1,.overlay-content h2,.overlay-content h3,.overlay-content h4,.overlay-content h5,.overlay-content h6{
	 color:<?php echo $brad_data['color_overlay_heading']?>!important;
 }
 
 .overlay .lightbox-icon,
 .overlay .love-it{
	 color:<?php echo $brad_data['color_overlay_icon'];?>;
	 background-color:<?php echo $brad_data['bg_overlay_icon'];?>;
 }

/*--------------------------------------------*/
/* Color Primary
/*--------------------------------------------*/

  .special_amp,
  #top_bar .social-icons li a:hover,
  #top_bar .top-menu > li a:hover ,
  .social-icons a:hover,
  .commentlist .reply a ,
  .commentlist .comment-meta a:hover,
  .post-share-menu li a:hover,
  .widget-posts li h6 a:hover,
  .highlighted,
  .star-rating,
  .shop_table .remove:hover,
  .form-row label .required,
   ul.product_list_widget li .amount ,
  .single-product-tabset .comment-form label .required,
  .products .product .price ,
  .woocommerce-checkout .chosen-container .chosen-results li.active-result.highlighted,
  .woocommerce-account .chosen-container .chosen-results li.active-result.highlighted,
  .post-meta-data.style2 .post-meta-cats,
  .post-meta-data.style2 .post-meta-cats a,
  .button.button_alternateprimary,
  ul.product_list_widget li a:hover,
  .post-meta-data > span a:hover,
  .quantity .minus, .quantity .plus,
  .widget > ul > li > a:hover ,
  .widget_nav_menu ul li a:hover
  {
	  color:<?php echo $brad_data['color_primary'];?>;
  }
  

  .color-primary,
  .primary-color,
  .portfolio-tabs ul li.sort-item.active a,
  .button.button_alternatewhite:hover{
	  color:<?php echo $brad_data['color_primary'];?>!important;
  }
  


    .pagination a.active,
    ul.styled-list li i ,
	ul.styled-list.style2 li i ,
   .button.button_alternateprimary,
   .shop_table .remove:hover,
   .commentlist .reply a ,
   .quantity .minus,
   .quantity .plus,
   .bx-pager-item a.active, .pagination a.selected,
   .bx-carousel-container .bx-prev:hover,
   .bx-carousel-container .bx-next:hover,
   .clients-carousel-container .bx-prev:hover,
   .clients-carousel-container .bx-next:hover,
   .title.style1.divider-primary.textright,
   .title.style3.bc-primary span,
   .title.style4.bc-primary span,
   blockquote{
	  border-color:<?php echo $brad_data['color_primary'];?>;
  }
  
  .button.button_alternateprimary{
		border-color:<?php echo $brad_data['color_primary'];?>!important;
   }
  
  .portfolio-carousel a.carousel-prev:hover,
  .portfolio-carousel a.carousel-next:hover,
   ul.styled-list.style2 li i,
  .progress .bar,
  .highlighted.style2,
  .product-wrapper .onsale,
  .single-product-wrapper .onsale,
  .widget_price_filter .price_slider_wrapper .price_slider .ui-slider-handle,
  .bubblingG span,
  .toggle .toggle-title a span.plus ,
  .accordion .accordion-title a span.plus,
  .commentlist .reply a:hover,
  .quantity .minus:hover,
  .quantity .plus:hover,
  .portfolio-tabs ul li.sort-item a:after,
  .bx-carousel-container .bx-prev:hover,
  .bx-carousel-container .bx-next:hover,
  .clients-carousel-container .bx-prev:hover,
  .clients-carousel-container .bx-next:hover,
  .cart-icon-wrapper .count,
  .person .divider span{
	  background-color:<?php echo $brad_data['color_primary'];?>;
  }
  
 
  .hr.hr-border-primary span:before ,
  .hr.hr-border-primary span:after,
  .hr-color-primary .hr span:after,
  .hr-color-primary .hr span:before,
  .button.button_alternateprimary:hover,
  .title.style1.divider-primary span:after,
  .title.style2.divider-primary span:after,
  .title.style3.divider-primary span:after,
  .title.style1.textcenter.divider-primary span:before,
  .title.style2.textcenter.divider-primary span:before,
  .title.style3.textcenter.divider-primary span:before{
	  background-color:<?php echo $brad_data['color_primary'];?>!important;
  }
  
 

<?php echo $brad_data['custom_css']; ?>
</style>

<?php
  endif;
}

add_action( 'wp_head', 'brad_custom_css_styles' , 99 ) ;