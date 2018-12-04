<?php
	
$box->add_field( array(
	'name' => 'Title',
	'id' => $prefix.'title',
	'type' => 'text',
));
$box->add_field( array(
	'name' => 'Image',
	'id' => $prefix.'img',
	'type' => 'file',
	'options' => array('url' => false),
	'query_args' => array(
		'type' => array('image/gif','image/jpeg','image/png')
	)
));
$box->add_field( array(
	'name' => 'Excerpt',
	'id' => $prefix.'excerpt',
	'type' => 'wysiwyg',
	'options' => array(
		'textarea_rows' => 5
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