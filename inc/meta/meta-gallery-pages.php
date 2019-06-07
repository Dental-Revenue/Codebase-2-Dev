<?php


// =============================================================== SERVICE TEMPLATE META

function gallery_grid_meta() {
	
	$prefix = 'g_grid_';
	
	$box = new_cmb2_box( array(
    'id' => $prefix.'info',
		'title' => 'Gallery Information',
		'object_types' => array( 'page' ),
		'show_on' => array( 'key' => 'page-template', 'value' => array('page-templates/template-gallery-grid.php', 'page-templates/template-gallery-scroll.php' ) ),
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true,
	));
	
	$group_box = $box->add_field(array(
		'id'          => 'gallery_repeat_group',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'Gallery Item {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => __( 'Add Another Gallery Item', 'cmb2' ),
			'remove_button' => __( 'Remove Gallery Item', 'cmb2' ),
			'sortable'      => true, // beta
		),
	) );
  	
	$box->add_group_field( $group_box, array(
  	'name' => 'Image 1 (Main Photo)',
  	'desc' => 'If using for Smile Gallery, this would be the AFTER PHOTO. If only one photo is available, just upload here.',
		'id' => 'img_1',
		'type' => 'file'
	));
	$box->add_group_field( $group_box, array(
  	'name' => 'Image 2 (Secondary Photo)',
  	'desc' => 'If using for Smile Gallery, this would be the BEFORE PHOTO',
		'id' => 'img_2',
		'type' => 'file'
	));
  	
	$box->add_group_field( $group_box, array(
  	'name' => 'Headshot (Not Required)',
		'id' => 'headshot',
		'type' => 'file'
	));
	
	$box->add_group_field( $group_box, array(
  	'name' => 'Name',
		'id' => 'name',
		'type' => 'text'
	));
	
	$box->add_group_field( $group_box, array(
  	'name' => 'Description',
		'id' => 'desc',
		'type' => 'textarea'
	));
	$box->add_group_field( $group_box, array(
  	'name' => 'Tags',
  	'desc' => 'These are the tags that are used in filtering the items in the grid layout',
		'id' => 'tags',
		'repeatable' => true,
		'type' => 'text'
	));
  
}

add_action( 'cmb2_admin_init', 'gallery_grid_meta' );


?>