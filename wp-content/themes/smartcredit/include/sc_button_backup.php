<?php
class WPBakeryShortCode_sc_button extends WPBakeryShortCode {

	/*
	 * Thi methods returns HTML code for frontend representation of your shortcode.
	 * You can use your own html markup.
	 *
	 * @param $atts - shortcode attributes
	 * @param @content - shortcode content
	 *
	 * @access protected
	 * vc_filter: VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG vc_shortcodes_css_class - hook to edit element class
	 * @return string
	 */
	protected function content( $atts, $content = null ) {

		$wrapper_start = $wrapper_end = '';
		extract( shortcode_atts( array(
			'loggedin_link' => '',
			'loggedin_text'	=>	__( 'Text on the button', "js_composer" ),
			'loggedout_link' => '',
			'loggedout_text' => __( 'Text on the button', "js_composer" );
			'title' => __( 'Text on the button', "js_composer" ),
			'color' => '',
			'icon' => '',
			'size' => '',
			'style' => '',
			'el_class' => '',
			'align' => ''
		), $atts ) );

		$class = 'vc_btn';
		//parse link
		if ( is_user_logged_in() ) {
			$loggedin_link = ( $loggedin_link == '||' ) ? '' : $loggedin_link;
			$loggedin_link = vc_build_link( $loggedin_link );
			$a_href = $loggedin_link['url'];
			$a_title = $loggedin_link['title'];
			$a_target = $loggedin_link['target'];
		} else {
			$loggedout_link = ( $loggedout_link == '||' ) ? '' : $loggedout_link;
			$loggedout_link = vc_build_link( $loggedout_link );
			$a_href = $loggedout_link['url'];
			$a_title = $loggedout_link['title'];
			$a_target = $loggedout_link['target'];
		}

		$class .= ( $color != '' ) ? ( ' vc_btn_' . $color . ' vc_btn-' . $color ) : '';
		$class .= ( $size != '' ) ? ( ' vc_btn_' . $size . ' vc_btn-' . $size ) : '';
		$class .= ( $style != '' ) ? ' vc_btn_' . $style : '';

		$el_class = $this->getExtraClass( $el_class );
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' ' . $class . $el_class, $this->settings['base'], $atts );
		$wrapper_css_class = 'vc_button-2-wrapper';
		if ( $align ) {
			$wrapper_css_class .= ' vc_button-2-align-'.$align;
		}

		return '<div class="'.esc_attr($wrapper_css_class).'"><a class="'.esc_attr( trim( $css_class ) ).'" href="'.esc_attr( $a_href ).'" title="'.esc_attr( $a_title ).'" target="'.esc_attr( $a_target ).'">'.$title.'</a></div>'.$this->endBlockComment( 'vc_button' );
	}
}

if(function_exists("vc_map"))
{
	vc_map( array(
	'name' => __( 'Smart Credit Button', 'js_composer' ),
	'base' => 'sc_button',
	'icon' => 'icon-wpb-ui-button',
	'category' => array(
		__( 'Content', 'js_composer' )
	),
	'description' => __( 'Eye catching button', 'js_composer' ),
	'params' => array(
		array(
			'type' => 'vc_link',
			'heading' => __( 'Logged-in URL (Link)', 'js_composer' ),
			'param_name' => 'loggedin_link',
			'description' => __( 'Button link.', 'js_composer' )
		),
		array(
			'type' => 'vc_link',
			'heading' => __( 'Logged-out URL (Link)', 'js_composer' ),
			'param_name' => 'loggedout_link',
			'description' => __( 'Button link.', 'js_composer' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Text on the button', 'js_composer' ),
			'holder' => 'button',
			'class' => 'vc_btn',
			'param_name' => 'title',
			'value' => __( 'Text on the button', 'js_composer' ),
			'description' => __( 'Text on the button.', 'js_composer' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Button alignment', 'js_composer' ),
			'param_name' => 'align',
			'value' => array(
				__( 'Inline', 'js_composer' ) => "inline",
				__( 'Left', 'js_composer' ) => 'left',
				__( 'Center', 'js_composer' ) => 'center',
				__( 'Right', 'js_composer' ) => "right"
			),
			'description' => __( 'Select button alignment.', 'js_composer' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Style', 'js_composer' ),
			'param_name' => 'style',
			'value' => SC_getVcShared( 'button styles' ),
			'description' => __( 'Button style.', 'js_composer' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Color', 'js_composer' ),
			'param_name' => 'color',
			'value' => SC_getVcShared( 'colors' ),
			'description' => __( 'Button color.', 'js_composer' ),
			'param_holder_class' => 'vc_colored-dropdown'
		),
		/*array(
		'type' => 'dropdown',
		'heading' => __( 'Icon', 'js_composer' ),
		'param_name' => 'icon',
		'value' => getVcShared( 'icons' ),
		'description' => __( 'Button icon.', 'js_composer' )
	),*/
		array(
			'type' => 'dropdown',
			'heading' => __( 'Size', 'js_composer' ),
			'param_name' => 'size',
			'value' => SC_getVcShared( 'sizes' ),
			'std' => 'md',
			'description' => __( 'Button size.', 'js_composer' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'js_composer' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	),
	'js_view' => 'VcButton2View'
	) );
}