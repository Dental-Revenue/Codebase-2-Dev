<?php
	$box->add_field( array(
		'name' => 'Static Block Headline',
		'id' => $prefix.'headline',
		'description' => 'Optional.',
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
		'name' => 'Static Block Excerpt',
		'id' => $prefix.'excerpt',
		'description' => 'Optional',
		'type' => 'textarea_small'
	));
	$box->add_field( array(
		'name' => 'Static Block Link Text',
		'id' => $prefix.'url_text',
		'description' => 'Optional. Text for View Testimonials Link.',
		'type' => 'text',
		'default' => 'View Testimonials'
	));
	$box->add_field( array(
		'name' => 'Static Block URL',
		'id' => $prefix.'url',
		'description' => 'Optional. URL for View Testimonials Link.',
		'type' => 'text'
	));
	$box->add_field( array(
		'name' => 'Display Static Block Above?',
		'id'   => $prefix.'display_static_block',
		'type' => 'select',
		'options'          => array(
			'yes' => 'Yes',
			'no' => 'No',
		),
		'default' => 'yes',
	));
	$box->add_field( array(
		'name' => 'Block Background Color',
		'id' => $prefix.'grid_bg_color',
		'type' => 'colorpicker'
	));
	$box->add_field( array(
		'name' => 'Display Blocks as Rectangle or Square?',
		'id'   => $prefix.'display_rectangle_or_square',
		'type' => 'select',
		'options'          => array(
			'rectangle' => 'Rectangle',
			'square' => 'Square',
		),
		'default' => 'rectangle',
	));
	$box->add_field( array(
		'name' => 'Add Spacing Around Blocks?',
		'id'   => $prefix.'add_spacing',
		'type' => 'select',
		'options'          => array(
			'yes' => 'Yes',
			'no' => 'No',
		),
		'default' => 'no',
	));
	$group_field = $box->add_field( array(
		'id' => $prefix.'blocks',
		'type' => 'group',
		'options' => array(
			'group_title'   => __( 'Block {#}', 'cmb2' ),
			'add_button'    => __( 'Add Block', 'cmb2' ),
			'remove_button' => __( 'Remove Block', 'cmb2' ),
			'sortable'      => true,
			'closed'    		=> true
		),
	));
	$box->add_group_field( $group_field, array(
		'name' => 'Block Background Color',
		'id'   => 'bg_color',
		'type' => 'colorpicker',
		'options' => array(
			'alpha' => true,
		),
		'default' => 'rgba(221,153,51,.5)'
	));
	$box->add_group_field( $group_field, array(
		'name' => 'Block Name',
		'id'   => 'name',
		'type' => 'text',
	));
	$box->add_group_field( $group_field, array(
		'name' => 'Block Excerpt',
		'id'   => 'excerpt',
		'type' => 'textarea_small',
	));
	$box->add_group_field( $group_field, array(
		'name' => 'CTA Text',
		'id'   => 'url_text',
		'type' => 'text',
		'default' => 'Watch Video',
	));
	$box->add_group_field( $group_field, array(
		'name' => 'Secondary CTA Text',
		'id'   => 'second_url_text',
		'type' => 'text',
		'default' => 'Watch Video',
	));
	$box->add_group_field( $group_field, array(
		'name' => 'CTA URL',
		'id'   => 'url',
		'type' => 'text',
	));
	$box->add_group_field( $group_field, array(
		'name' => 'Secondary CTA URL',
		'id'   => 'second_url',
		'type' => 'text',
	));
	$box->add_group_field( $group_field, array(
		'name' => 'Block BG Image',
		'id'   => 'image',
		'type' => 'file',
		'options' => array('url' => false),
		'query_args' => array(
			'type' => array('image/gif','image/jpeg','image/png')
		)
	));
	
	
?>