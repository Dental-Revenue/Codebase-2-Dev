<?php

function standard_meta() {
	//on all standard pages and blog pages
	$prefix = 'standard_';
	$box = new_cmb2_box( array(
    'id' => $prefix.'_info',
    'title' => __( 'Page Meta', 'cmb2' ),
    'object_types' => array( 'page', 'post'),
    'show_on_cb' => 'show_on_defaultPages_and_allPosts',
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true,
  ));
	  
	$box->add_field( array(
  	'name' => __( 'Sidebar on Page?', 'cmb2' ),
		'id' => $prefix . 'sidebar',
		'type' => 'radio_inline',
		'options'          => array(
			'on' => 'On',
			'off' => 'Off',
		),
		'default' => 'on'
	));
	
	
  if(is_active_widget( false, false, 'gallery', true )){
    $box->add_field( array(
      'name'    => 'Hide Widget?',
      'desc'    => 'Hide widget on this page.',
      'id'      => 'widget_gallerynew_show',
      'type' => 'checkbox',
      'show_on_cb' => 'sidebar_is_on',
    ));
  }

}

add_action( 'cmb2_admin_init', 'standard_meta' );

function show_on_defaultPages_and_allPosts( $box ){
	$post_id = $box->object_id();
	$post_template = get_page_template_slug( $post_id );
	if( $post_template == ''){ return true; } else { return false; }
}


function sidebar_is_on( $box ) {
	$status = get_post_meta( $box->object_id(), 'standard_sidebar', 1 );

	// Only show if sidebar is 'on'
	return 'on' === $status;
	
}

function h1_meta() {
	$prefix = 'h1_meta_';
  $box = new_cmb2_box(array(
    'id' => 'h1_info',
    'title' => __( 'H1 Information', 'cmb2' ),
    'object_types' => array( 'page', ),
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true,
  ));
  $box->add_field( array(
    'name' => __( 'H1 Tag', 'cmb2' ),
    'id' => $prefix . 'general_h1',
    'type' => 'text',
    'sanitization_cb' => false
  ));
}
add_action( 'cmb2_admin_init', 'h1_meta' );