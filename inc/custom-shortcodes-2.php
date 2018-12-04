<?php
function init_my_shortcode_button_2() {

	$button_slug = 'testimonials';
	$js_button_data = array(
		'qt_button_text' => __( 'Add Testimonials', 'shortcode-button' ),
		'button_tooltip' => __( 'Add Testimonials', 'shortcode-button' ),
		'icon'           => 'dashicons-admin-comments',
		'include_close'  => false, // Will wrap your selection in the shortcode
		'mceView'        => true, // Live preview of shortcode in editor. YMMV.
		'l10ncancel'     => __( 'Cancel', 'shortcode-button' ),
		'l10ninsert'     => __( 'Insert Testimonials', 'shortcode-button' ),
	);

	// Optional additional parameters
	$additional_args = array(
		'cmb_metabox_config'   => 'shortcode_button_cmb_config_2',
	);

	$button = new Shortcode_Button( $button_slug, $js_button_data, $additional_args );
}
// This hook, with this priority ensures the Shortcode_Button library is loaded.
add_action( 'shortcode_button_load', 'init_my_shortcode_button_2', ( SHORTCODE_BUTTONS_LOADED + 1 ) );

/**
 * Return CMB2 config array
 *
 * @param  array  $button_data Array of button data
 *
 * @return array               CMB2 config array
 */
function shortcode_button_cmb_config_2( $button_data ) {

	return array(
		'id'     => 'shortcode_'. $button_data['slug'],
		'fields' => array(
			array(
				'name'    => 'Title (optional)',
				'id'      => 'title',
				'type'    => 'text',
			),
			array(
				'name'    => 'Select Testimonials',
				'id'      => 'testimonials',
				'type'    => 'multicheck',
				'options_cb' => 'cmb2_get_testimonials',
				'row_classes' => 'cmb2-smalltext-list',
			),
		),
		// keep this w/ a key of 'options-page' and use the button slug as the value
		'show_on' => array( 'key' => 'options-page', 'value' => $button_data['slug'] ),
	);

}




function cmb2_get_testimonials() {
  $posts = get_posts(array('post_type'   => 'testimonials','numberposts' => -1,));
  $post_options = array();
  if($posts){
    foreach($posts as $post ){ $post_options[ $post->ID ] = '<b>'.$post->post_title.':</b> '.wp_trim_words($post->post_content,9); }
  }
  return $post_options;
}



?>