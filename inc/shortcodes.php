<?php
	

//all theme options
$shortcodes = array('practice_name','street_address','city','state','zip_code','new_patient_phone','current_patient_phone','google_map','company_hours','doctor_name','doctor_name_two','doctor_name_three','review_link');	
function generate_shortcode( $atts, $content = '', $shortcode = '' ){ 
  if($shortcode=='company_hours'){
    $var = getOption($shortcode,$break=true);
  }else{
    $var = getOption($shortcode);
  }
  return $var;
}
foreach ($shortcodes as $shortcode) {
  add_shortcode( $shortcode, 'generate_shortcode' );
}


//new patient phone wrapped in tracknum
function new_patient_phone_span_shortcode($atts){
  $var = getOption('new_patient_phone');
  return '<span class="tracknum">'.$var.'</span>';
}
add_shortcode( 'new_patient_phone_span', 'new_patient_phone_span_shortcode' );


//site url
function site_url_shortcode($atts){
  return get_site_url();
}
add_shortcode( 'site_url', 'site_url_shortcode' );


//video iframe
function video_frame( $atts, $content = null ) {
  return '<iframe class="video-iframe" src="'.$content.'"></iframe>';
}
add_shortcode("video", "video_frame");







function cmb2_do_frontend_form_shortcode( $atts = array() ) {
	global $post;

	/**
	 * Depending on your setup, check if the user has permissions to edit_posts
	 */
	if ( ! current_user_can( 'edit_posts' ) ) {
		return __( 'You do not have permissions to edit this post.', 'lang_domain' );
	}

	/**
	 * Make sure a WordPress post ID is set.
	 * We'll default to the current post/page
	 */
	if ( ! isset( $atts['post_id'] ) ) {
		$atts['post_id'] = $post->ID;
	}

	// If no metabox id is set, yell about it
	if ( empty( $atts['id'] ) ) {
		return __( "Please add an 'id' attribute to specify the CMB2 form to display.", 'lang_domain' );
	}

	$metabox_id = esc_attr( $atts['id'] );
	$object_id = absint( $atts['post_id'] );
	// Get our form
	$form = cmb2_get_metabox_form( $metabox_id, $object_id );

	return $form;
}





?>