<?php
	
$box->add_field( array(
	'name' => 'Title Regular Weight',
	'id' => $prefix.'title_reg',
	'type' => 'text'
));
$box->add_field( array(
	'name' => 'Title Bold',
	'id' => $prefix.'title_bold',
	'type' => 'text'
));

$group_field = $box->add_field( array(
	'id' => $prefix.'columns',
	'type' => 'group',
	'options' => array(
		'group_title'   => __( 'Columns {#}', 'cmb2' ),
		'add_button'    => __( 'Add Column', 'cmb2' ),
		'remove_button' => __( 'Remove Column', 'cmb2' ),
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
	
?>	
	