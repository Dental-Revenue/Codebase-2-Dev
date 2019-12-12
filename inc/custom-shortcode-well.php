<?php
function init_my_shortcode_button_well() {

	$button_slug = 'well';
	$js_button_data = array(
		'qt_button_text' => __( 'Add Well Block', 'shortcode-button' ),
		'button_tooltip' => __( 'Add Well Block', 'shortcode-button' ),
		'icon'           => 'dashicons-info',
		'include_close'  => true, // Will wrap your selection in the shortcode
		'mceView'        => true, // Live preview of shortcode in editor. YMMV.
		'l10ncancel'     => __( 'Cancel', 'shortcode-button' ),
		'l10ninsert'     => __( 'Insert Well Block', 'shortcode-button' ),
	);

	// Optional additional parameters
	$additional_args = array(
		'cmb_metabox_config'   => 'shortcode_button_cmb_config_well',
	);

	$button = new Shortcode_Button( $button_slug, $js_button_data, $additional_args );
}
// This hook, with this priority ensures the Shortcode_Button library is loaded.
add_action( 'shortcode_button_load', 'init_my_shortcode_button_well', ( SHORTCODE_BUTTONS_LOADED + 1 ) );

/**
 * Return CMB2 config array
 *
 * @param  array  $button_data Array of button data
 *
 * @return array               CMB2 config array
 */
function shortcode_button_cmb_config_well( $button_data ) {

	return array(
		'id'     => 'shortcode_'. $button_data['slug'],
		'fields' => array(
			array(
				'name'    => 'Title (optional)',
				'id'      => 'title',
				'type'    => 'text',
			)
		),
		// keep this w/ a key of 'options-page' and use the button slug as the value
		'show_on' => array( 'key' => 'options-page', 'value' => $button_data['slug'] ),
	);

}

function add_my_shortcode_button_well($atts, $content = ""){
	extract(shortcode_atts(array(
    'title' => ''
  ), $atts));
   
  $title_input = '';
  if($title != ''){$title_input = '<h2>'.$title.'</h2>';}
	//return '<div class="well">'.$title_input.''.preg_replace('/\<p\>\<\/p\>/', '', $content).'</div>';
	//return preg_replace('/\<p\>/', '', $content);
	//return $content;
	//$content = preg_replace(array('/\<p\>/','/\<\/p\>/'),array("",""),$content);
	return '<div class="well">'.$title_input.''.wpautop($content).'</div>';
	//return wpautop($content);
}

add_shortcode('well', 'add_my_shortcode_button_well');


?>