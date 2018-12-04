<?php   
	
	
$box->add_field( array(
	'name' => 'Primary Title',
	'desc' => 'Supports Primary Image',
	'id' => $prefix.'primary_title',
	'type' => 'text',
));
$box->add_field( array(
	'name' => 'Primary Image',
	'desc' => 'Largest Image to the Left',
	'id' => $prefix.'primary_img',
	'type' => 'file',
	'options' => array('url' => false),
	'query_args' => array(
		'type' => array('image/gif','image/jpeg','image/png')
	)
));
$box->add_field( array(
	'name' => 'Primary Excerpt',
	'id' => $prefix.'primary_excerpt',
	'type' => 'wysiwyg',
	'options' => array(
		'textarea_rows' => 5
	)
));
$box->add_field( array(
	'name' => 'Primary Link Title',
	'id' => $prefix.'primary_link_title',
	'type' => 'text'
));

$box->add_field( array(
	'name' => 'Primary Link To...',
	'id' => $prefix.'primary_link',
	'type' => 'text_url'
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
	'name' => 'Secondary Block Title',
	'id'   => 'title',
	'type' => 'text',
));
$box->add_group_field( $group_field, array(
	'name' => 'Secondary Block Image',
	'desc' => 'Secondary Image to the Right',
	'id' => 'image',
	'type' => 'file',
	'options' => array('url' => false),
	'query_args' => array(
		'type' => array('image/gif','image/jpeg','image/png')
	)
));
$box->add_group_field( $group_field, array(
	'name' => 'Secondary Block Excerpt',
	'id' => 'excerpt',
	'type' => 'wysiwyg',
	'options' => array(
		'textarea_rows' => 5
	)
));
$box->add_group_field( $group_field, array(
	'name' => 'Secondary Block Link Title',
	'id' => 'link_title',
	'type' => 'text'
));
$box->add_group_field( $group_field, array(
	'name' => 'Secondary Block Link To...',
	'id' => 'link',
	'type' => 'text_url'
));


?>