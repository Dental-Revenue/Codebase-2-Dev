<?php
	
	$box->add_field( array(
		'name' => 'Title',
		'id' => $prefix.'title',
		'type' => 'text'
	));
	$box->add_field( array(
		'name' => 'CTA Title',
		'id' => $prefix.'cta_title',
		'type' => 'text'
	));
	$box->add_field( array(
		'name' => 'CTA Subtitle',
		'id' => $prefix.'cta_subtitle',
		'type' => 'text'
	));
	$box->add_field( array(
		'name' => 'CTA Excerpt',
		'id' => $prefix.'cta_excerpt',
		'type' => 'wysiwyg'
	));
	$box->add_field( array(
		'name' => 'CTA Alignment',
		'id' => $prefix.'cta_alignment',
		'type' => 'radio_inline',
		'options' => array(
			'left' => __( 'Left', 'cmb2' ),
			'center'   => __( 'Center', 'cmb2' ),
			'right'     => __( 'Right', 'cmb2' ),
		)
	));

	$group_field = $box->add_field( array(
		'id' => $prefix.'buttons',
		'type' => 'group',
		'options' => array(
			'group_title'   => __( 'Button {#}', 'cmb2' ),
			'add_button'    => __( 'Add Button', 'cmb2' ),
			'remove_button' => __( 'Remove Button', 'cmb2' ),
			'sortable'      => true,
			'closed'    		=> true
		),
	));
	$box->add_group_field( $group_field, array(
		'name' => 'Button Title',
		'id' => 'title',
		'type' => 'text'
	));
	$box->add_group_field( $group_field, array(
		'name' => 'Button Link To...',
		'id' => 'link',
		'type' => 'text_url'
	));


?>