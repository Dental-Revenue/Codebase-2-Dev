<?php
	$box->add_field( array(
		'name' => 'Text bars stick up?',
		'id'   => $prefix.'text_bars',
		'type' => 'select',
		'options'          => array(
			'text_bar_up' => 'Yes',
			'text_bar_down' => 'No',
		),
		'default' => 'text_bar_down',
	));
	$box->add_field( array(
		'name' => 'Title',
		'id' => $prefix.'title',
		'type' => 'text'
	));
	$group_field = $box->add_field( array(
		'id' => $prefix.'images',
		'type' => 'group',
		'options' => array(
			'group_title'   => __( 'Images {#}', 'cmb2' ),
			'add_button'    => __( 'Add Images', 'cmb2' ),
			'remove_button' => __( 'Remove Image', 'cmb2' ),
			'sortable'      => true,
			'closed'    		=> true
		),
	));
	$box->add_group_field( $group_field, array(
		'name' => 'Image',
		'id'   => $prefix.'img',
		'type' => 'file',
		'options' => array('url' => false),
		'query_args' => array(
			'type' => array('image/gif','image/jpeg','image/png')
		)
	));
	$box->add_group_field( $group_field, array(
		'name' => 'Image Link Title',
		'id' => $prefix.'img_link_title',
		'type' => 'text'
	));
	$box->add_group_field( $group_field, array(
		'name' => 'Button Link To...',
		'id' => $prefix.'img_link',
		'type' => 'text_url'
	));
				
?>