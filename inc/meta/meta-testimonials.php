<?php 

function testimonials_meta() {

	$prefix = 'testimonial_';
	$box = new_cmb2_box( array(
    'id' => $prefix.'_info',
    'title' => __( 'Testimonial Information', 'cmb2' ),
    'object_types' => array( 'testimonials', ),
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true,
  ));
	  
	$box->add_field( array(
  	'name' => __( 'Description of Services', 'cmb2' ),
		'id' => $prefix . 'service',
		'type' => 'textarea_small',
	));
	
	$box->add_field( array(
  	'name' => __( 'Youtube Video ID (optional)', 'cmb2' ),
		'desc' => __( 'Find video ID in youtube url after ?v=', 'cmb2' ),
		'id' => $prefix . 'video',
		'type' => 'text',
	));
}

add_action( 'cmb2_admin_init', 'testimonials_meta' );
?>