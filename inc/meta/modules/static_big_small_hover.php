<?php
	
	$box->add_field( array(
		'name' => 'Title',
		'id' => $prefix.'title',
		'type' => 'text'
	));
	$box->add_field( array(
		'name' => 'Big Image',
		'id'   => $prefix.'big_img',
		'type' => 'file',
		'options' => array('url' => false),
		'query_args' => array(
			'type' => array('image/gif','image/jpeg','image/png')
		)
	));
	$box->add_field( array(
		'name' => 'Big Image Link Title',
		'id' => $prefix.'big_img_link_title',
		'type' => 'text'
	));
	$box->add_field( array(
		'name' => 'Button Link To...',
		'id' => $prefix.'big_img_link',
		'type' => 'text_url'
	));
	$box->add_field( array(
		'name' => 'Small Top Image',
		'id'   => $prefix.'small_top_img',
		'type' => 'file',
		'options' => array('url' => false),
		'query_args' => array(
			'type' => array('image/gif','image/jpeg','image/png')
		)
	));
	$box->add_field( array(
		'name' => 'Small Top Link Title',
		'id' => $prefix.'small_top_link_title',
		'type' => 'text'
	));
	$box->add_field( array(
		'name' => 'Small Top Link To...',
		'id' => $prefix.'small_top_link',
		'type' => 'text_url'
	));
	$box->add_field( array(
		'name' => 'Small Bottom Image',
		'id'   => $prefix.'small_bottom_img',
		'type' => 'file',
		'options' => array('url' => false),
		'query_args' => array(
			'type' => array('image/gif','image/jpeg','image/png')
		)
	));
	$box->add_field( array(
		'name' => 'Small Bottom Link Title',
		'id' => $prefix.'small_bottom_link_title',
		'type' => 'text'
	));
	$box->add_field( array(
		'name' => 'Small Bottom Link To...',
		'id' => $prefix.'small_bottom_link',
		'type' => 'text_url'
	));
				
?>