<?php
	
$box->add_field( array(
	'name' => 'Title',
	'id' => $prefix.'title',
	'type' => 'text',
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
	'name' => 'Title',
	'id' => 'title',
	'type' => 'text'
));
$box->add_group_field( $group_field, array(
	'name' => 'Excerpt',
	'id'   => 'excerpt',
	'type' => 'textarea_small',
));
$box->add_group_field( $group_field, array(
	'name' => 'Link Title',
	'id' => 'link_title',
	'type' => 'text',
	'default' => 'Learn More'
));
$box->add_group_field( $group_field, array(
	'name' => 'Link To...',
	'id' => 'link',
	'type' => 'text_url'
));
$box->add_group_field( $group_field, array(
	'name' => 'Image',
	'id'   => 'image',
	'type' => 'file',
	'options' => array('url' => false),
	'query_args' => array(
		'type' => array('image/gif','image/jpeg','image/png')
	)
));	
	
	
?>	
	