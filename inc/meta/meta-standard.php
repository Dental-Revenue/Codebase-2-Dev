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

}

add_action( 'cmb2_admin_init', 'standard_meta' );

function show_on_defaultPages_and_allPosts( $box ){
	$post_id = $box->object_id();
	$post_template = get_page_template_slug( $post_id );
	if( $post_template == ''){ return true; } else { return false; }
}
