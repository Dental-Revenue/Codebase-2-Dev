<?php
	$box->add_field( array(
		'name' => 'Grid Headline',
		'id' => $prefix.'headline',
		'default' => '(Title){Subtitle}[Paragraph]',
		'description' => 'Optional. Supports (Title){Subtitle}[Paragraph]',
		'type' => 'textarea_small'
	));
	$box->add_field( array(
		'name' => 'Grid URL',
		'id' => $prefix.'url',
		'description' => 'Optional. URL for View Testimonials Link.',
		'type' => 'text'
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
		'name' => 'YouTube Video URL',
		'id'   => 'url',
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
