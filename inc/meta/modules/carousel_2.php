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
		'id' => $prefix.'carousel_items',
		'type' => 'group',
		'options' => array(
			'group_title'   => __( 'Carousel Item {#}', 'cmb2' ),
			'add_button'    => __( 'Add Carousel Item', 'cmb2' ),
			'remove_button' => __( 'Remove Carousel Item', 'cmb2' ),
			'sortable'      => true,
			'closed'    		=> true
		),
	));
	$box->add_group_field($group_field, array(
    'name' => 'Item Background Image*',
    'id' => 'image',
    'type' => 'file',
    'options' => array('url' => false),
		'query_args' => array(
			'type' => array('image/gif','image/jpeg','image/png')
		)
	));
	$box->add_group_field( $group_field, array(
		'name' => 'Item Title',
		'id' => 'title',
		'type' => 'text'
	));
  $box->add_group_field( $group_field, array(
    'name' => __( 'Link to Page', 'cmb2' ),
    'desc' => __( 'Select a page that this carousel item should link to', 'cmb2' ),
    'id' => 'carousel_page',
    'type' => 'select',
    'options_cb' => 'cmb2_get_post_options'
  ));
	
?>