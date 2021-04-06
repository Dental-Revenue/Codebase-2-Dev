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
	$box->add_field( array(
		'name' => 'Top Left Image',
		'id'   => $prefix.'top_left_img',
		'type' => 'file',
		'options' => array('url' => false),
		'query_args' => array(
			'type' => array('image/gif','image/jpeg','image/png')
		)
	));
	$box->add_field( array(
		'name' => 'Top Left Link Title',
		'id' => $prefix.'top_left_link_title',
		'type' => 'text'
	));
	$box->add_field( array(
		'name' => 'Top Left Link URL',
		'desc' => '/example or https://example.com',
		'id' => $prefix.'top_left_link_url',
		'type' => 'text'
	));
	$box->add_field( array(
		'name' => 'Bottom Left Image',
		'id'   => $prefix.'bottom_left_img',
		'type' => 'file',
		'options' => array('url' => false),
		'query_args' => array(
			'type' => array('image/gif','image/jpeg','image/png')
		)
	));
	$box->add_field( array(
		'name' => 'Bottom Left Link Title',
		'id' => $prefix.'bottom_left_link',
		'type' => 'text'
	));
	$box->add_field( array(
		'name' => 'Bottom Left Link URL',
		'desc' => '/example or https://example.com',
		'id' => $prefix.'bottom_left_link_url',
		'type' => 'text'
	));
	$box->add_field( array(
		'name' => 'Middle Image',
		'id'   => $prefix.'middle_img',
		'type' => 'file',
		'options' => array('url' => false),
		'query_args' => array(
			'type' => array('image/gif','image/jpeg','image/png')
		)
	));
	$box->add_field( array(
		'name' => 'Middle Link Title',
		'id' => $prefix.'middle_link_title',
		'type' => 'text'
	));
	$box->add_field( array(
		'name' => 'Middle Link URL',
		'desc' => '/example or https://example.com',
		'id' => $prefix.'middle_link_url',
		'type' => 'text'
	));
	$box->add_field( array(
		'name' => 'Top Right Image',
		'id'   => $prefix.'top_right_img',
		'type' => 'file',
		'options' => array('url' => false),
		'query_args' => array(
			'type' => array('image/gif','image/jpeg','image/png')
		)
	));
	$box->add_field( array(
		'name' => 'Top Right Link Title',
		'id' => $prefix.'top_right_link_title',
		'type' => 'text'
	));
	$box->add_field( array(
		'name' => 'Top Right Link URL',
		'desc' => '/example or https://example.com',
		'id' => $prefix.'top_right_link_url',
		'type' => 'text'
	));
	$box->add_field( array(
		'name' => 'Bottom Right Image',
		'id'   => $prefix.'bottom_right_img',
		'type' => 'file',
		'options' => array('url' => false),
		'query_args' => array(
			'type' => array('image/gif','image/jpeg','image/png')
		)
	));
	$box->add_field( array(
		'name' => 'Bottom Right Link Title',
		'id' => $prefix.'bottom_right_link_title',
		'type' => 'text'
	));
	$box->add_field( array(
		'name' => 'Bottom Right Link URL',
		'desc' => '/example or https://example.com',
		'id' => $prefix.'bottom_right_link_url',
		'type' => 'text'
	));
				
?>