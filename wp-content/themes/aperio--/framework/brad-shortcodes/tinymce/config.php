<?php
$brad_shortcodes = array();
$brad_shortcodes['shortcode-generator'] = array(
	'no_preview' => true,
	'params' => array(),
	'shortcode' => '',
	'popup_title' => ''
);

// Columns
$brad_shortcodes['columns'] = array(
	'params' => array(),
	'shortcode' => '[columns] {{child_shortcode}}[/columns] ',
	'no_preview' => true,
	
	
	// can be cloned and re-arrange
	'child_shortcode' => array(
		'params' => array(
			'column' => array(
				'type' => 'select',
				'label' => __('Column Type', 'brad_framework'),
				'desc' => '',
				'options' => array(
					'one_half' => 'One Half',
					'one_third' => 'One Third',
					'one_fourth' => 'One Fourth',
					'one_fifth' => 'One Fifth',
					'one_sixth' => 'One Sixth',				
					'two_thirds' => 'Two Thirds',
					'three_fourths' => 'Three Fourths'
				)
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => __('Column Content', 'brad_framework'),
				'desc' => 'Be sure to add a [clear] shortcode between rows of columns.',
			)
		),
		'shortcode' => '[{{column}}]{{content}}[/{{column}}] ',
		'clone_button' => __('Add Another Column', 'brad_framework')
	)
);


$brad_shortcodes['share-box'] = array(
    'popup_title' => 'Share Box',
	'params' => array(
	
	'te' => array(
			'type' => 'select',
			'label' => __('Twitter', 'brad_framework'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No',
	    	),
		   'std' => 'yes',
		   'desc' => ''
		),
		
		
	'gp' => array(
			'type' => 'select',
			'label' => __('Google Plus', 'brad_framework'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No',
	    	),
		   'std' => 'yes',
		   'desc' => ''
		),
		
	 'li' => array(
			'type' => 'select',
			'label' => __('Linked In', 'brad_framework'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No',
	    	),
		   'std' => 'yes',
		   'desc' => ''
		),
		
		'fb' => array(
			'type' => 'select',
			'label' => __('Facebook', 'brad_framework'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No',
	    	),
		   'std' => 'yes',
		   'desc' => ''
		),
		
		'pin' => array(
			'type' => 'select',
			'label' => __('Pinterest', 'brad_framework'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No',
	    	),
		   'std' => 'yes',
		   'desc' => ''
		)
	),

	'shortcode' => '[share_box te="{{te}}" fb="{{fb}}" li="{{li}}" gp="{{gp}}" pin="{{pin}}"]',
);


$brad_shortcodes['video'] = array(
    'popup_title' => 'Embed Video',
	'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => __('Video Type', 'brad_framework'),
			'options' => array(
				'vimeo' => 'Vimeo',
				'youtube' => 'Youtube',
	    	),
		   'std' => 'vimeo',
		   'desc' => ''
		),
		
		'autoplay' => array(
			'type' => 'select',
			'label' => __('Autoplay', 'brad_framework'),
			'options' => array(
				'false' => 'False',
				'true' => 'True',
			),
			'std' => 'false',
			'desc' => ''
		),	
		
	 'id' => array(
			'type' => 'text',
			'label' => __('Video Id', 'brad_framework'),
			'std' => '',
			'desc' => ''
		)	
	),
		
	'shortcode' => '[video type="{{type}}" id="{{id}}" autoplay="{{autoplay}}"]',
);


// Drop Cap
$brad_shortcodes['dropcap'] = array(
        'popup_title' => 'Dropcap',
        'params' => array(
          'style' => array(
				'std' => '',
				'type' => 'select',
				'label' => __('Drop Cap Container', 'brad_framework'),
				'desc' => '',
				'options'=>array(
				  'disable'   => 'Disable' ,
				  'enable' => 'Enable')
			),
			
		'bgc' => array(
				'std' => '',
				'desc'=> '',
				'type' => 'colorpicker',
				'label' => __('Drop Cap Container Background Color', 'brad_framework')
			),	
			
	    'bw' => array(
				'std' => '0',
				'type' => 'text',
				'desc'=> '',
				'label' => __('Drop Cap container Border Width', 'brad_framework')
			),		
			
		'bc' => array(
				'std' => '',
				'desc'=> '',
				'type' => 'colorpicker',
				'label' => __('Drop Cap Container Border Color', 'brad_framework')
			),	
			
		'color' => array(
				'std' => '',
				'desc'=> '',
				'type' => 'colorpicker',
				'label' => __('Drop Cap Color', 'brad_framework')
			),
			
	    'br' => array(
				'std' => '9999px',
				'type' => 'text',
				'desc'=> '',
				'label' => __('Drop Cap container Border Radius', 'brad_framework')
			),
			
								
			
		'content' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Dropcap Content', 'brad_framework'),
			'desc' => __('Enter the text for this button.', 'brad_framework')
	)

     ),
'shortcode' => '[dropcap style="{{style}}" color="{{color}}" br="{{br}}" bw="{{bw}}" bc="{{bc}}" bgc="{{bgc}}"]{{content}}[/dropcap]',
);



// Drop Cap
$brad_shortcodes['gap'] = array(
        'popup_title' => 'Gap',
        'params' => array(
		'height' => array(
			'std' => '20',
			'type' => 'text',
			'label' => __('Gap Height', 'brad_framework'),
			'desc' => __('Enter the Gap Height in pixel <b>Note:</b> Do\'t include "px" only numbers', 'brad_framework')
	)

     ),
'shortcode' => '[gap height="{{height}}"]',
);



// Checklist

$brad_shortcodes['checklist'] = array(
     "popup_title" => __("Checklist", "brad-framework"),
	 'params' => array(
	  'style' => array(
		 'std' => 'style1' ,
		 'type' => 'select' ,
		 'label' => __("Style","brad-framework"),
		 'desc' => '',
		 'options' => array(
		     'style1' => 'Style 1' , 
		     'style2' => 'Style 2' ,
			 'style3' => 'Style 3' ,
			 'style4' => 'Style 4'
			 )
		  ) ,
		  
	  'size' => array(
	   'std' => 'small' ,
	   'type' => 'select' ,
	   'label' => __("Icon Size","brad-framework"),
	   'desc' => '',
	   'options' => array(
		   'small' => 'small' , 
		   'medium' => 'medium' ,
		   'large' => 'large'
		   )
		) 
		,	  
	  'icon' => array(
			'std' => '',
			'type' => 'iconpicker',
			'label' => __('List Icon', 'brad_framework') ,
			'desc' => ''
		)		  
		 ),
	'shortcode' => '[checklist size="{{size}}" style="{{style}}" icon="{{icon}}" ] {{child_shortcode}}[/checklist] ',
	'no_preview' => true,
	
	
	// can be cloned and re-arrange
	'child_shortcode' => array(
		'params' => array(
			'content' => array(
				'std' => 'Your Content here',
				'type' => 'textarea',
				'desc' => '' ,
				'label' => __('List Item Content', 'brad_framework')
			) 
		
		),
		
		'shortcode' => '[item] {{content}} [/item] ',
		'clone_button' => __('Add Another List Item', 'brad_framework')
	)
);



//Icon list
$brad_shortcodes['iconlist'] = array(
     "popup_title" => __("Iconlist", "brad-framework"),
	 'params' => array(
	  'style' => array(
		 'std' => 'default' ,
		 'type' => 'select' ,
		 'label' => __("List Style","brad-framework"),
		 'desc' => '',
		 'options' => array(
		     'style1' => 'Style 1' , 
		     'style2' => 'Style 2' ,
			 'style4' => 'Style 3'
			 )
		  ),
	  'size' => array(
	   'std' => 'small' ,
	   'type' => 'select' ,
	   'label' => __("Icon Size","brad-framework"),
	   'desc' => '',
	   'options' => array(
		   'small' => 'small' , 
		   'medium' => 'medium' ,
		   'large' => 'large'
		   )
		) 
		) ,
	 'shortcode' => '[iconlist size="{{size}}" style="{{style}}"]{{child_shortcode}}[/iconlist] ',
	 'no_preview' => true,
	
	
	// can be cloned and re-arrange
	'child_shortcode' => array(
		'params' => array(
		  'content' => array(
				'std' => 'Your Content here',
				'type' => 'textarea',
				'desc' => '' ,
				'label' => __('List Item Content', 'brad_framework')
			) 
			,
		  'icon' => array(
			'std' => '',
			'type' => 'iconpicker',
			'label' => __('Icon', 'brad_framework'),
			"iconType" => "all" ,
			'desc' => ''
		   )	
		),
		
		'shortcode' => '[listitem icon="{{icon}}"] {{content}} [/listitem] ',
		'clone_button' => __('Add Another List Item', 'brad_framework')
	)
);



//Icon
$brad_shortcodes['icon'] = array(
    'popup_title' => '' ,
	'params' => array( 	
	  
	 'size' => array(
			'type' => 'select',
			'label' => __('Icon Size', 'brad_framework'),
			'desc' => __('Select the Icon size.', 'brad_framework'),
			'std' => array('small') ,
			'options' => array(
				'normal'=>'Normal',
				'medium' => 'Medium',
				'large' => 'Large' ,
				'ex-large'=>'Extra Large')
		),	
			   
	'align' => array(
			'type' => 'select',
			'std' => '' ,
			'label' => __('Align', 'brad_framework'),
			'desc' => '',
			'options' => array(
			        '' => 'Justify',
			  'center' => 'Center' )
		),
		
   'style' => array(
			'type' => 'select',
			'std' => '' ,
			'label' => __('Style', 'brad_framework'),
			'desc' => '',
			'options' => array(
				'style1' => 'Style 1',
				'style2' => 'Style 2' ,
				'style3' => 'Style 3')
		),
		
	'link' => array(
	    'type' => 'text',
		'std' => ''	,
		'label' => 'Icon Link',
		'desc' => 'Leave blank if you do\'t want to have a link for icon',
	),
	
	'lb' => array(
	     'type' => 'checkbox',
		 'checkbox_text' => 'yes',
		 'std' => '',
		 'desc' => '' ,
		 'label' => __('Open Above link in lightbox? ' , 'brad-framework')
		 )
	,
		
		
	'color' => array(
	       'type' => 'colorpicker',
		   'std' => '',
		   'label' => __('icon Color','js_composer'),
		   'desc' => __('Leave Blank for Default','brad-framework') ,
		   ),
		   
    'color-hover' => array(
	       'type' => 'colorpicker',
		   'std' => '',
		   'label' => __('icon Color on hover','js_composer'),
		   'desc' => __('Leave Blank for Default','brad-framework') ,
		   ),
		   	
	 'border-color' => array(
			'type' => 'colorpicker',
			'std' => '' ,
			'label' => __('Icon Boder Color ', 'brad_framework'),
			'desc' => 'Leave blank for Default <strong>Note:</strong> This option work only for icons style2'
		),	
	
	'border-width' => array(
			'type' => 'text',
			'std' => '1' ,
			'label' => __('Border Width ', 'brad_framework'),
			'desc' => 'Default border width in px <strong>Note:</strong> This option work only for icons style2'
		),		
		
	'border-opacity' => array(
			'type' => 'text',
			'std' => '1' ,
			'label' => __('Icon Border Color opacity', 'brad_framework'),
			'desc' => 'Leave blank for Default <strong>Note:</strong> This option work only for icons style2'
		),				
		
					   	
	'bg-color' => array(
			'type' => 'colorpicker',
			'std' => '' ,
			'label' => __('Icon Background Color', 'brad_framework'),
			'desc' => 'Leave blank for Default <strong>Note:</strong> This option work only for icons style3'
		),	
		
	'bg-opacity' => array(
			'type' => 'text',
			'std' => '1' ,
			'label' => __('Icon Background Color opacity ', 'brad_framework'),
			'desc' => 'Leave blank for Default <strong>Note:</strong> This option work only for icons style3'
		),	
		
   
	  'bg-color-hover' => array(
			'type' => 'colorpicker',
			'std' => '' ,
			'label' => __('Icon Background Color on Hover', 'brad_framework'),
			'desc' => 'Leave blank for Default <strong>Note:</strong> This option work only for icons style2 and Icon Style 3'
		),	
		
	'bg-opacity-hover' => array(
			'type' => 'text',
			'std' => '1' ,
			'label' => __('Icon Background Color opacity on hover', 'brad_framework'),
			'desc' => 'Leave blank for Default'
		),	
				
	'enable-crease' => array(
	       'type' => 'checkbox',
		   'checkbox_text' => 'yes',
		   'std' => '',
		   'label' => __('Enable Crease Background ? ' , 'brad-framework'),
		   'desc' => ' Check this if you want to enable a crease backgound for icon style 2 or icon style3 ')
		   ,
		
	
	  'icon' => array(
			'std' => '',
			'type' => 'iconpicker',
			'label' => __('Icon', 'brad_framework'),
			'desc' => ''
		)
		
	 ) ,
		
	'shortcode' => '[vc_icon icon="{{icon}}" size="{{size}}" align="{{align}}" style="{{style}}" color="{{color}}" color_hover="{{color-hover}}" bg_color="{{bg-color}}" bg_opacity="{{bg-opacity}}" bg_opacity_hover="{{bg-opacity-hover}}" bg_color_hover="{{bg-color-hover}}" border_color="{{border-color}}" border_opacity="{{border-opacity}}" link="{{link}}" lb="{{lb}}" border_width="{{border-width}}" enable_crease="{{enable-crease}}"]',
);


/* Separator (Divider)
---------------------------------------------------------- */
$brad_shortcodes['separator'] = array(
   "popup_title" => __("Separator", "brad-framework"),
   "params" => array(
   "type" => array(
            "type" => "select",
            "label" => __( "Border Type" ,"brad-framework"),
			"desc" => "" ,
			"std" => "" ,
	        "options" => array( "large" => "100% Border" , "medium" => "Medium Border" , "small" => "Small Border" , "tiny" => "Extra Small Border" )
	       ),
	
	
		   
  "dh" =>  array(
      "type" => "select",
      "label" => __( "Border Thickness" ,"brad-framework"),
      "desc" => '' ,
	  'std' => '',
	  "options" => array('2' => "2px" , '1' => "1px", '3' => "3px" , '4' => '4px' , '5' => '4px' )
   ),
	
  "align" => array(
      "type" => "select",
	  "desc" => "" ,
	  "std" => "center" ,
      "label" => __('Separator Align', 'brad-framework'),
	  "options" => array(
		"left" => __("Align Left", 'brad-framework')  ,
		"center" => __("Align Center", 'brad-framework') ,
		"right" => __("Align Right", 'brad-framework')  ,
		 )
	),
	
  "color" => array(
      "type" => "select",
      "label" => __( "Border Color" ,"brad-framework"),
      "desc" => "",
	  'std' => '',
	  "options" => array(
	     "dark"  => "Dark",
	    "light" =>  "Light",
		"primary" => "Primary" )
	),
		
 "icon" => array(
      "type" => "iconpicker",
      "label" => __( "Icon" ,"brad-framework"),
      "desc" => "" ,
	  "std" => ""
	),
			
	
  "margin-top" => array(
      "type" => "text",
      "label" => __("Margin Top","brad-framework"),
	  "std" =>  '5' ,
	  "desc" => __('Default Top Margin in "px"','brad-framework')
	),
	
  "margin-bottom"  =>	array(
      "type" => "text",
      "label" => __("Margin Bottom","brad-framework"),
	  "std" =>  '25' ,
	  "desc" => __('Default Bottom Margin in "px"','brad-framework')
	)
  ),
 'shortcode' => '[vc_separator type="{{type}}" dh="{{dh}}" color="{{color}}" icon="{{icon}}" align="{{align}}" margin-bottom="{{margin-bottom}}" margin_top="{{margin-top}}"]'
 );  	
  


/* Special Title
-----------------------------------------------------------*/

$brad_shortcodes['heading'] = array(
  "popup_title" => __("label", "brad-framework"),
  "params" => array( 
    "title" => array(
      "type" => "text",
      "label" => __("Title","brad-framework"),
	  "std" =>  'Your Title Here' ,
	  "desc" => ""
	),
	
	"icon" => array(
      "type" => "iconpicker",
      "label" => __( "Icon" ,"brad-framework"),
      "desc" => "" ,
	  "std" => ""
	),
	
   "type" => array(
      "type" => "select",
      "label" => __( "Heading Type" ,"brad-framework"),
	  "options" => array(
	    "h1" => "heading 1" ,
		"h2" => "heading 2" ,
		"h3" => "heading 3" ,
		"h4" => "heading 4" ,
		"h5" => "heading 5" ,
		"h6" => "heading 6" ,
		 ),
	  "std" => "h1" ,
	  "desc" => ""	 
		 
	),
	
  "style" => array(
      "type" => "select",
      "label" => __( "Heading Style" ,"brad-framework"),
	  "options" => array(
	    "default" => __("Simple Heading" ,"brad-framework") ,
	   "style1" =>  __("With Divider at the bottom","brad-framework") ,
	   "style2" => 	__("With Divider in center","brad-framework") ,
	   "style3" => __("Boxed Border with Divider","brad-framework")  ,
	   "style4" => __("Boxed Border","brad-framework")
	 ),
	  "desc" => "",
	  "std" => ""	 
	),
	
  "bw" => array(
      "type" => "select",
      "label" => __( "Border Width" ,"brad-framework"),
	  "std" => "",
	  "desc" => "" ,
	  "options" => array( '2'  => "2px"  , '1'  => "1px" , '3'  => "3px"  , '4'  => '4px' , '5'  => '5px'  )
	  ),
	  
  "dh" => array(
      "type" => "select",
      "label" => __( "Divider Height" ,"brad-framework"),
	  "std" => "",
	  "desc" => "" ,
	  "options" => array( '2'  => "2px"  , '1'  => "1px" , '3'  => "3px"  , '4'  => '4px' , '5'  => '5px'  )
	  ),	  
	
	"divider_width" => array(
      "type" => "select",
      "label" => __( "Divider Width" ,"brad-framework"),
      "desc" => "",
	  "std" => "" ,
	  "options" => array(
	    "default" => __("Small (Default)","brad-framework") ,
		"parent" => __("Match With Text Length","brad-framework")  ,
		"full" => __("Full","brad-framework")  ,
		"medium" => __("Medium","brad-framework") )
	),
	  
	"divider_color" => array(
      "type" => "select",
      "label" => __( "Divider Color" ,"brad-framework"),
      "desc" => '',
	  'std' => '',
	  "options" => array(
	    "dark" => __("Dark","brad-framework") ,
		"light" =>  __("Light","brad-framework") ,
		"primary" => __("Primary","brad-framework")  )
	),
	
	"bc" => array(
      "type" => "select",
      "label" => __( "Border Color" ,"brad-framework"),
      "desc" => '',
	  'std' => '',
	  "options" => array(
	    "dark" => __("Dark","brad-framework")  ,
		"light" => __("Light","brad-framework")  ,
		"primary" => __("Primary","brad-framework") )
	),
	
	

	 "color" => array(
      "type" => "select",
      "label" => __( "Color" ,"brad-framework"),
      "desc" => '',
	  'std' => '',
	  "options" => array(
	    "default" => "Default" ,
		"primary" => "Primary Color"  )
	),
	
	 
	"align" =>  array(
      "type" => "select",
      "label" => __('Heading Align', 'brad-framework'),
	  "options" => array(
		"left" =>  __("Align Left", 'brad-framework'),
	  	"center" => __("Align Center", 'brad-framework') ,
		"right" => __("Align Right", 'brad-framework'),
		 ),
	 "desc" => "",
	 "std" => "left"	 
	),
	
   
	"margin-bottom" => array(
      "type" => "text",
      "label" => __("Margin Bottom","brad-framework"),
	  "std" =>  '20' ,
	  "desc" => __("Default Margin From Bottom in px","brad-framework")
	)	
  ),
  "shortcode" => '[vc_heading title="{{title}}" icon="{{icon}}" bw="{{bw}}" dh="{{dh}}" divider_width="{{divider_width}}" divider_color="{{divider_color}}" bc="{{bc}}" color="{{color}}" type="{{type}}" style="{{style}}" align="{{align}}" margin_bottom="{{margin-bottom}}"]' 
);
 
  
//highlighted
$brad_shortcodes['highlighted'] = array(
    'popup_title' => __('Highlighted Text' , 'brad-framework'),
	'params' => array( 	
	"style" => array(
      "type" => "select",
      "label" => __( "Heading Style" ,"brad-framework"),
	  "options" => array(
	    "style1" => "Style 1" ,
		"style2" => "Style 2") ,
	  "desc" => "",
	  "std" => ""	 
	),
   'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Highlighted Content', 'brad_framework'),
			'desc' => ''
	)) ,
	
	'shortcode' => '[highlighted style="{{style}}"]{{content}}[/highlighted]',
	'no_preview' => true
);


//tooltip
$brad_shortcodes['tooltip'] = array(
    'popup_title' => 'Tooltip' ,
	'params' => array( 	
	'text' => array(
			'std' => '',
			'type' => 'text',
			'desc' => '',
			'label' => __('Tooltip Text', 'brad_framework'),
	),	
	
	'align' => array(
			'std' => '',
			'type' => 'select',
			'options' => array(
			    "top" => "Top" ,
				"bottom" => "Bottom" ,
				"left" => "Left" ,
				"right" => "Right" ),
			'desc' => '',
			'label' => __('Tooltip Text', 'brad_framework'),
	),	
	
   'content' => array(
			'std' => '',
			'type' => 'text',
			'desc' => '' ,
			'label' => __('Tooltip Content', 'brad_framework'),
	)) ,
	
	'shortcode' => '[tooltip text="{{text}}" align="{{align}}"]{{content}}[/tooltip]',
	'no_preview' => true
);




//social icons
$brad_shortcodes['icons'] = array(
    'popup_title' => 'Icons' ,
    'params' => array(
			'size' => array(
				'std' => '',
				'type' => 'select',
				'label' => __('Icons size', 'brad_framework'),
			    'desc' => __('Select the icon size', 'brad_framework'),
				'options' =>  array(
				     '' => __('Normal', 'brad_framework') ,
					 'medium' => __('Medium', 'brad_framework') ,
					 'medium2' => __('Above Medium', 'brad_framework') ,
					 'large' => __('Large', 'brad_framework') 
			         )
				) 
				,
				
		   'border-radius' => array(
				'std' => '0',
				'type' => 'text',
				'label' => __('Icons Border Radius', 'brad_framework'),
				'desc' => '' 
		
				) 
				,		
				
			'align' => array(
				'std' => '',
				'type' => 'select',
				'desc' => '',
				'label' => __('Icons align', 'brad_framework'),
				'options' =>  array(
				     '' => __('left', 'brad_framework') ,
					 'center' => __('Center', 'brad_framework') ,
					 'right' => __('Right', 'brad_framework') 
			         )
				) 
				,	
			
			'style' => array(
				'std' => '',
				'type' => 'select',
				'label' => __('Social Icons style', 'brad_framework'),
			    'desc' => __('Select the icon style', 'brad_framework'),
				'options' =>  array(
				     'style1' => __('Default', 'brad_framework') ,
					 'style2' => __('With Background color', 'brad_framework') 
			         )
				) 
				,
					
		  "icon-c" => array(
             "type" => "colorpicker",
             "label" => __("Icon Color", "brad-framework"),
			 "desc" => __("Leave Blank for default","brad-framework"),
             "std" => '' ,
             ),
			
			 
		   "icon-bgc" => array(
             "type" => "colorpicker",
             "label" => __("Icon Background Color", "brad-framework"),
			 "desc" => __("Leave Blank for default","brad-framework"),
             "std" => '' ,
             ),
			 
			"icon-c-hover" => array(
             "type" => "colorpicker",
             "label" => __("Icon Color:hover", "brad-framework"),
			 "desc" => __("Leave Blank for default","brad-framework"),
             "std" => '' ,
             ),
			 
	
		   "icon-bgc-hover" => array(
             "type" => "colorpicker",
             "label" => __("Icon Background Color:hover", "brad-framework"),
			 "desc" => __("Leave Blank for default","brad-framework"),
             "std" => '' ,
             ) 
			 	
			) ,
	'shortcode' => '[icons border_radius="{{border-radius}}" align="{{align}}" size="{{size}}" style="{{style}}" icon_c="{{icon-c}}" icon_bgc="{{icon-bgc}}" icon_c_hover="{{icon-c-hover}}"  icon_bgc_hover="{{icon-bgc-hover}}"]{{child_shortcode}}[/icons] ',
	'no_preview' => true,
	// can be cloned and re-arrange
   'child_shortcode' => array(
		'params' => array(
			'url' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Icon Link', 'brad_framework')	,
				'desc' => ''
			) ,
			
	      'title' => array(
				'std' => '',
				'type' => 'text',
				'desc' => '',
				'label' => __('Icon title ', 'brad_framework')
			) ,			
				
   	     'icon' => array(
			 'std' => '',
			 'type' => 'iconpicker',
			 'iconType' => 'social' ,
			 'label' => __('Social Icon', 'brad_framework'),
			 'desc' => ''
	       ),	
		
		 'target' => array(
			'type' => 'select',
			'label' => __('Link Target', 'brad_framework'),
			'desc' => __('Select where the Link should open.', 'brad_framework'),
			'options' => array(
				'_self' => '_self',
				'_parent' => '_parent',
				'_blank' => '_blank',
				'_top' => '_top',
			))	
		),
		'shortcode' => '[single_icon url="{{url}}" title="{{title}}"  icon="{{icon}}" target="{{target}}"]',
		'clone_button' => __('Add Another Icon', 'brad_framework')
	)
	
);


//Button
$brad_shortcodes['button'] = array(
    'popup_title' => 'Button' ,
    'params' => array(
        "style" => array(
            "type" => "select",
            "label" => __("Style", "brad-framework"),
            "options" =>  array("" => __("Default", "brad-framework")  , "readmore" =>  __('Read More Button','brad-framework'),  "alternate" => __('With Border','brad-framework') , 'alternateprimary'  => __('Border With Primary color','brad-framework'),  "alternatewhite" =>   __('With Transparent Border','brad-framework') , "custom" => __("Custom","brad-framework")  ) ,
			"std" => '' ,
            "desc" =>  __("Select the default style for your button.", "brad-framework")
            ),
			
		"size" => array(
             "type" => "select",
             "label" => __("Size", "brad-framework"),
             "options" => array("normal" => "Normal" , "large" => "Large" , "small" => "Small"),
             "desc" => __("Select the Button size. Not for readmore button", "brad-framework"),
			 "std" => "normal"
        ),	
		
		"color-style" => array(
		    "type" => "select",
			"label" => __("color", "brad-framework"),
			"std" => '' ,
			'desc' => '' ,	
			'options' => array( "" => __("Default", "brad-framework") , "grey" => __("Grey Button", "brad-framework") , "green" =>  __("Green Button", "brad-framework"), "seagreen" => __("Sea Green Button", "brad-framework") , "orange" => __("Orange Button", "brad-framework"), "red" =>  __("Red Button", "brad-framework") , "white" => __("White Button", "brad-framework") , "black" =>  __("Black Button", "brad-framework") , "purple" => __("Purple Button", "brad-framework") , "yellow" =>  __("Yellow Button", "brad-framework")
			)
		 ),
		 
		"color" => array(
            "type" => "colorpicker",
            "label" => __("Button color", "brad-framework"),
            "std" => "",
            "desc" => 'Note: All the option below for related to button color , radius and border only work if button style is selected to custom'
        ),
		
		"color-hover" => array(
            "type" => "colorpicker",
            "label" => __("Button color:hover", "brad-framework"),
            "std" => "",
            "desc" => ''
        ),
	   
	    "acolor"  =>    array(
			"type" => "colorpicker",
			"label" => __("Accent color", "brad-framework"),
			"std" =>  '#555555',
			"desc" => ""
      ),	
	
      "acolor-hover" => array(
		  "type" => "colorpicker",
		  "label" => __("Accent color:hover", "brad-framework"),
		  "std" =>  '#444444' ,
		  "desc" => ""
		),	
	
		
      "bw" => array(
		  "type" => "text",
		  "label" => __("Border Width (in px)", "brad-framework"),
		  "std" => "0",
		  "desc" => ""
	  ),	
  
      'bcolor' => array(
		  "type" => "colorpicker",
		  "label" => __("Button Border color", "brad-framework"),
		  'std' => '',
		  'desc' => ''
		),
	
      "bcolor-hover" => array(
		  "type" => "colorpicker",
		  "label" => __("Button Border color:hover", "brad-framework"),
		  'desc' => '',
		  'std' => ''
		),
	
      "br" => array(
		"type" => "select",
		"label" => __("Button Border Radius", "brad-framework"),
		'std' => 'default',
		'desc' => '',
		"options" => array( 'default' => __('Full') , 'small' => __('Small','brad-framework') ,  'no' => __('None','brad-framework') )
      ),
			
      "align" => array(
	        "type" => "select",
	        "label" => __("Align","brad-framework"),
	        "options" => array(
	               "justify" => __("Justify","brad-framework") ,
				   "center" => __("Align Center","brad-framework")
				  ),
			 "desc" => "",
			 "std" => "none"
			),
			
        "title" => array(
            "type" => "text",
            "label" => __("Text on the button", "brad-framework"),
            "std" => __("Text on the button", "brad-framework"),
            "desc" => __("Text on the button.", "brad-framework")
         ),
		 
        "href" => array(
            "type" => "text",
            "label" => __("URL (Link)", "brad-framework"),
			"std" => "" ,
            "desc" => __("Enter the Button link. Do't forget to include http:// ", "brad-framework")
        ),
        "target" => array(
             "type" => "select",
             "label" => __("Target", "brad-framework"),
			 "std" => "",
			 "desc" => "",
             "options" => array("_self" => __("Same window", "brad-framework"), "_blank" => __("New window", "brad-framework"))
        ),
		
        "icon" => array(
             "type" => "iconpicker",
             "label" => __("Icon", "brad-framework"),
             "std" => "" ,
	         "desc" => __("Select the icon for your Button. Click an icon to select it and again click the same icon to deselecct it", "brad-framework")
        ),
		
        "icon-align" => array(
	         "type" => "select",
	         "label" => __("Icon Align","brad-framework"),
	         "options" => array(
	              "left" => __("Align Left","brad-framework"),
				  "right" => __("Align Right","brad-framework"),
				  ),
			"std" => "",
			"desc" => ""	  
         ),
		 
   
         "icon-style" => array(
	         "type" => "select",
	         "label" => __("Icon Style","brad-framework"),
	         "options" => array(
	              "" => __("Default","brad-framework"),
				  "style2" => __("With Border","brad-framework"),
				  "style3" => __("With Dark Background",'brad-framework')
				  ),
			 "desc" => __("Only Work for read more button","brad-framework"),
			 "std" => ""	  
	           ),  
			   
		 "icon-size" => array(
	         "type" => "select",
	         "label" => __("Icon Size","brad-framework"),
	         "options" => array(
	              "" => __("Normal","brad-framework"),
				  "medium" => __("Medium","brad-framework")
				  ),
			 "desc" => __("Only Work for read more button","brad-framework"),
			 "std" => ""	  
	           ),  
			   
			   	   
          "icon-c" => array(
             "type" => "colorpicker",
             "label" => __("Icon Color", "brad-framework"),
	         "desc" => __("Leave Blank for default color ( Work only for readmore button)","brad-framework"),
             "std" => '' ,
             ),  
         "icon-bc" => array(
             "type" => "colorpicker",
             "label" => __("Icon Border Color", "brad-framework"),
	         "desc" => __("Leave Blank for default border color ( Only work for readmore button )","brad-framework"),
             "std" => ''
        ),	  
         "icon-bgc" => array(
             "type" => "colorpicker",
             "label" => __("Icon Background Color", "brad-framework"),
	         "desc" => __("Leave Blank for default background color ( Only work for readmore button )","brad-framework"),
             "std" => ''
         ),	  
		  "icon-bgc-hover" => array(
             "type" => "colorpicker",
             "label" => __("Icon Background Color : hover", "brad-framework"),
	         "desc" => __("Leave Blank for default background color on hover ( Only work for readmore button )","brad-framework"),
             "std" => ''
         )
	  ),
	  "shortcode" => '[vc_button  style="{{style}}" color_style="{{color-style}}" acolor="{{acolor}}" acolor_hover="{{acolor-hover}}" bw="{{bw}}" bcolor="{{bcolor}}" bcolor_hover="{{bcolor-hover}}"  br="{{br}}" align="{{align}}" href="{{href}}" title="{{title}}" target="{{target}}" icon="{{icon}}" icon_align="{{icon-align}}" icon_size="{{icon-size}}" icon_style="{{icon-style}}" icon_c="{{icon-c}}" icon_bc="{{icon-bc}}" icon_bgc="{{icon-bgc}}" icon_bgc_hover="{{icon-bgc-hover}}" size="{{size}}"]' ,
	  'no_preview' => true
);


//Button
$brad_shortcodes['image'] = array(
    'popup_title' => 'Single Image' ,
    'params' => array(
	"image" => array(
      "type" => "uploader",
      "label" => __("Image", "brad-framework"),
      "std" => "",
      "desc" => __("Select image from media library.", "brad-framework")
    ),
	
	"img_size" => array(
      "type" => "select",
      "label" => __("Image size", "brad-framework"),
	  "options" => Array( 
	     "" => __("Default","brad-framework") ,
		 "thumb-large" => __("Large","brad-framework")  ,
		 "thumb-medium" => __("Medium","brad-framework")  ,
		 "thumb-normal" => __("Small","brad-framework") ,
		 "thumb-large-masonry" =>  __("Masonry Large","brad-framework")  ,
		 "thumb-medium-masonry" => __("Masonry Medium","brad-framework")  ,
		 "thumb-normal-masonry" => __("Masonry Small","brad-framework")  ,
		 "thumbnail" => __("Thumbnail","brad-framework")  ,
		 "fullwidth" => __("Fullwidth",'brad-framework')  ,
		 "mini" => __("Mini","brad-framework")  ,	 	 
		 "custom" =>  __("Custom","brad-framework")  ),
	  "desc" => ""	,
	  "std" => "" 
		 ),
		 
	"custom_img_size" => array(
	  "type" => "text",
	  "label" => __("Custom Image size", "brad-framework"), 
      "desc" => __("Enter image size in pixels: 200x100 (Width x Height). Leave empty to use default size. This will not work unless you select the image size to custom", "brad-framework"),
	  "std" => ""
    ),
	
	
	
    "css_animation" => array(
      "type" => "select",
      "label" => __("CSS Animation", "brad-framework"),
      "param_name" => "css_animation",
      "options" => array("" => __("No", "brad-framework"),  "fadeInLeft" => __("Left to Right", "brad-framework"), "fadeInRight" =>  __("Right to Left", "brad-framework") , "fadeInTop" =>  __("Bottom to top", "brad-framework"), "fadeInBottom" => __("Top to Bottom", "brad-framework") , "fadeInLeftBig" => __("Left to Right Big", "brad-framework") , "fadeInRightBig" => __("Right to Big big", "brad-framework") , "fadeInTopBig" => __("Bottom to Top Big", "brad-framework"),  "fadeInBottomBig" => __("Top to Bottom Big", "brad-framework")  ,"appearFromCenter" =>  __("Appear from center", "brad-framework")  , "fadeIn" => __("Fade In", "brad-framework") ),
     "desc" => __("Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", "brad-framework"),
	 "std" => "" 
	 ),
	"css_animation_delay" => array(
       "type" => "select",
       "label" => __("CSS Animation Delay", "brad-framework"),
       "options" => array( "" => __("No Delay", "brad-framework"), '100' => '100' , '200' => '200', '300' => '300' , '400' => '400' , '500' => '500' ,'600' => '600' , '700' => '700' , '800' => '800'),
	   "std" => "",
	   "desc" => ""
     ),
	 
	"img_align" =>  array(
      "type" => "select",
      "label" => __("Image Align", "brad-framework"),
      "std" => "",
	  "desc" => "" ,  
      "options" => array("" => __("None", "brad-framework") ,  "left" => __("Left", "brad-framework"), "right" => __("Right", "brad-framework") ,"center" =>  __("Center", "brad-framework") )
	),
	
   "img_lightbox" => array(
      "type" => 'checkbox',
	  "checkbox_text" => "Yes" ,
      "label" => __("Enable Lightbox Link Icon?", "brad-framework"),
      "desc" => __("If selected there will be  lightbox icon.", "brad-framework"),
      "std" => false
    ),
	
	"icon_lightbox" => array(
      "type" => 'iconpicker',
      "label" => __("Lightbox Icon?", "brad-framework"),
      "std" => '' ,
	  "desc" => "You must have Enalbed the light box icon above."
    ),
	
    "img_link_large" => array(
      "type" => 'checkbox',
      "label" => __("Lightbox Link to large image?", "brad-framework"),
      "desc" => __("If selected, image will be linked to the bigger image through lightbox. <b>Note:</b>You must have Enalbed the light box icon above.", "brad-framework"),
	  "checkbox_text" => "Yes" ,
      "std" => false ,
    ),
	
    "img_link" => array(
      "type" => "text",
	  "std" => "",
      "label" => __("Custom Image link for Lightbox", "brad-framework"),
      "desc" => __("Enter url if you want this image to have link. You can also enter youtube or vimeo video link . Video will be shown in lightbox.<b>Note:</b>You must have Enalbed the light box icon above.", "brad-framework"),
     
    )
  ),
  'shortcode' => '[vc_single_image image="{{image}}" css_animation="{{css_animation}}" css_animation_delay="{{css_animation_delay}}" img_size="{{img_size}}" custom_img_size="{{custom_img_size}}" img_lightbox="{{img_lightbox}}" icon_lightbox="{{icon_lightbox}}" img_link_large="{{img_link_large}}" img_link="{{img_link}}" img_align="{{img_align}}"  ]'
  );
 