<?php
function init_my_shortcode_button_mini_gallery() {

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
		'cmb_metabox_config'   => 'shortcode_button_cmb_config_mini_gallery',
		// Set the conditions of the shortcode buttons
		//'conditional_callback' => 'shortcode_button_only_pages',

		// Use if you are not using CMB2 to generate the form fields
		// 'form_display_callback' => '',
	);

	$button = new Shortcode_Button( $button_slug, $js_button_data, $additional_args );
}
// This hook, with this priority ensures the Shortcode_Button library is loaded.
add_action( 'shortcode_button_load', 'init_my_shortcode_button_mini_gallery', ( SHORTCODE_BUTTONS_LOADED + 1 ) );


/**
 * Return CMB2 config array
 *
 * @param  array  $button_data Array of button data
 *
 * @return array               CMB2 config array
 */
function shortcode_button_cmb_config_mini_gallery( $button_data ) {

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
	
	$args = array( 'post_type' => 'page', 'post_status' => 'publish', 'meta_query' => array(array( 'key' => '_wp_page_template', 'value' => array('page-templates/template-gallery-grid.php', 'page-templates/template-gallery-scroll.php'),)));
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


function add_my_shortcode_button_mini_gallery($atts, $content = ""){
	extract(shortcode_atts(array(
    'title' => '',
    'page_id' => '',
    'type' => ''
  ), $atts));
  
  $has_title = false;
  if(!empty($title)){ $has_title = true; }
  
  $output = '';
  $output.= '<div class="mini-gallery-container '.$type;
  if($has_title){ $output.= ' has_title"><h2>'.$title.'</h2>'; } else { $output.='">'; }
  $output.= $type == 'slider' ? '<div class="mini-gallery-slider-contain"><div class="slick-mini-gallery">' : '<div class="grid-mini-gallery">';
  
  $gallery_items = get_post_meta($page_id,'gallery_repeat_group',true);
  if(!empty($gallery_items)){
	  $count = 1;
  	foreach($gallery_items as $item){
	  	if($count == 9){break;}
	  	$gallery_img = "";
	  	if(!empty($item['img_1'])){ 
				$gallery_img_id = $item['img_1_id']; 
				$gallery_img_thumb = wp_get_attachment_image_src( $gallery_img_id, 'lg-square' ); 
				$gallery_img_gallery = wp_get_attachment_image_src( $gallery_img_id, 'full' ); 
				$gallery_img_slider = wp_get_attachment_image_src( $gallery_img_id, 'xxl' ); 
			}
			
			if($type == 'slider'){
				$output .= '<div class="mini-gallery-slide" style="background-image:url('.$gallery_img_slider[0].');">';
				//$output .= '<img src="'.$gallery_img_slider[0].'">';
				$output .= '</div>';
		  } elseif($type =='grid'){
			  $output .= '<a href="'.$gallery_img_gallery[0].'" class="mini-gallery-grid-item" style="background-image:url('.$gallery_img_thumb[0].');"></a>';
		  }	else {
			  $output .= 'Please specify either grid or slider type';
			  break;
		 }
		 $count++;
	  }
  
  $output.= $type == 'slider' ? '</div></div></div>' : '</div></div>';
  return $output;

} else {
	return 'No Images Present';
}

return 'title:'.$title.' page_id:'.$page_id.' type:'.$type;
   
  
/*
  $title_input = '';
  if($title != ''){$title_input = '<h2>'.$title.'</h2>';}
	return '<div class="well">'.$title_input.''.$content.'</div>';
*/
}

add_shortcode('mini_gallery', 'add_my_shortcode_button_mini_gallery');
?>