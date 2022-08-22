<?php
	
	$box->add_field( array(
		'name' => 'Slider Headline',
		'id' => $prefix.'headline',
		'type' => 'text'
	));
	$box->add_field(
		array(
			'name' => 'Subtitle',
			'id' => $prefix.'subtitle',
			'type' => 'text',
		)
	);
	$box->add_field( array(
		'name'	=> 'Select Testimonials',
		'desc'	=> 'Select the Testimonials to include in the slider',
		'id'		=> $prefix . 'testimonials',
	  'type' 	=> 'multicheck_inline',
		'options_cb' => 'cmb2_get_your_post_type_post_options'
	));
	$box->add_field( array(
		'name'	=> 'Testimonial Options',
		'id'		=> $prefix . 'testimonial_options',
	  'type' 	=> 'multicheck_inline',
		'options' => array(
			'photo' => 'Show Testimonial Photo if available',
			'video' => 'Show Testimonial Video Link if available',
		),
	));
	
?>