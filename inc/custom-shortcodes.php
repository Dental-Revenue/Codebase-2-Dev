<?php
function init_my_shortcode_button() {

	$button_slug = 'mini_gallery';

	// Set up the button data that will be passed to the javascript files
	$js_button_data = array(
		// Actual quicktag button text (on the text edit tab)
		'qt_button_text' => __( 'Add Mini Gallery', 'shortcode-button' ),
		// Tinymce button hover tooltip (on the html edit tab)
		'button_tooltip' => __( 'Add Mini Gallery', 'shortcode-button' ),
		// Tinymce button icon. Use a dashicon class or a 20x20 image url
		'icon'           => 'dashicons-images-alt2',

		// Optional parameters
		'include_close'  => false, // Will wrap your selection in the shortcode
		'mceView'        => true, // Live preview of shortcode in editor. YMMV.

		// Use your own textdomain
		'l10ncancel'     => __( 'Cancel', 'shortcode-button' ),
		'l10ninsert'     => __( 'Insert Mini Gallery', 'shortcode-button' ),

		// Optional modal settings override
		// 'dialogClass' => 'wp-dialog',
		// 'modalHeight' => 'auto',
		// 'width'       => 500,
	);

	// Optional additional parameters
	$additional_args = array(
		// Can be a callback or metabox config array
		'cmb_metabox_config'   => 'shortcode_button_cmb_config',
		// Set the conditions of the shortcode buttons
		//'conditional_callback' => 'shortcode_button_only_pages',

		// Use if you are not using CMB2 to generate the form fields
		// 'form_display_callback' => '',
	);

	$button = new Shortcode_Button( $button_slug, $js_button_data, $additional_args );
}
// This hook, with this priority ensures the Shortcode_Button library is loaded.
add_action( 'shortcode_button_load', 'init_my_shortcode_button', ( SHORTCODE_BUTTONS_LOADED + 1 ) );

/**
 * Return CMB2 config array
 *
 * @param  array  $button_data Array of button data
 *
 * @return array               CMB2 config array
 */
function shortcode_button_cmb_config( $button_data ) {

	return array(
		'id'     => 'shortcode_'. $button_data['slug'],
		'fields' => array(
			array(
				'name'    => 'Title (optional)',
				'id'      => 'title',
				'type'    => 'text',
			),
			array(
				'name'    => 'Source Images From...',
				'id'      => 'page_id',
				'type'    => 'select',
				'options_cb' => 'cmb_gallery_pages'
			),
			array(
				'name'    => 'Type',
				'id'      => 'type',
				'type'    => 'select',
				'options' => array(
					'grid' => 'Image Grid',
					'slider' => 'Image Slider'
				)
			),
		),
		// keep this w/ a key of 'options-page' and use the button slug as the value
		'show_on' => array( 'key' => 'options-page', 'value' => $button_data['slug'] ),
	);

}




function cmb_gallery_pages(){
	
	$args = array( 'post_type' => 'page', 'post_status' => 'publish', 'meta_query' => array(array( 'key' => '_wp_page_template', 'value' => 'page-templates/template-gallery-1.php',)));
	$the_query = new WP_Query($args);
	$page_options = array();
	while ( $the_query->have_posts() ) : $the_query->the_post();
		$page_options[ get_the_ID() ] = get_the_title();
	endwhile;
	return $page_options;
	
}




/**
 * Callback dictates that shortcode button will only display if we're on a 'page' edit screen
 *
 * @return bool Expects a boolean value
 */
function shortcode_button_only_pages() {
	if ( ! is_admin() || ! function_exists( 'get_current_screen' ) ) {
		return false;
	}

	$current_screen = get_current_screen();

	if ( ! isset( $current_screen->parent_base ) || $current_screen->parent_base != 'edit' ) {
		return false;
	}

	if ( ! isset( $current_screen->post_type ) || $current_screen->post_type != 'page' ) {
		return false;
	}

	// Ok, guess we're on a 'page' edit screen
	return true;
}
?>