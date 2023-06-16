<?php
	
	
$box->add_field( array(
	'name' => 'Main Headline',
	'id' => $prefix.'headline',
	'description' => 'Optional',
	'type' => 'text'
));
$box->add_field(
	array(
		'name' => 'Subtitle',
		'id' => $prefix.'subtitle',
		'type' => 'text',
	)
);
$box->add_field( array(
	'name' => 'Module Content',
	'id' => $prefix.'content',
	'description' => 'Optional',
	'type' => 'wysiwyg',
	'options' => array(
	    'wpautop' => false, // use wpautop?
	    'textarea_rows' => get_option('default_post_edit_rows', 5)
	)
));
$box->add_field( array(
	'name' => 'Main Image',
	'id'   => $prefix.'left_image',
	'type' => 'file',
	'options' => array('url' => false),
	'query_args' => array(
		'type' => array('image/gif','image/jpeg','image/png')
	)
));
$box->add_field( array(
	'name' => 'Image Alt',
	'id'   => $prefix.'left_alt',
	'type' => 'text',
));
$box->add_field( array(
	'name' => 'List Headline',
	'id' => $prefix.'list_headline',
	'type' => 'text',
	'attributes'  => array(
 		'required'    => 'required',
 	),
));
$box->add_field(
	array(
		'name' => 'List Subtitle',
		'id' => $prefix.'list_subtitle',
		'type' => 'text',
	)
);
$box->add_field( array(
	'name' => 'List Content',
	'id' => $prefix.'list_content',
	'type' => 'wysiwyg',
	'options' => array(
	    'wpautop' => false, // use wpautop?
	    'textarea_rows' => get_option('default_post_edit_rows', 5)
	),
	'attributes' => array(
 		'required' => 'required',
 	),
));
$group_field = $box->add_field( array(
	'id' => $prefix.'list_items',
	'type' => 'group',
	'options' => array(
		'group_title'   => __( 'Item {#}', 'cmb2' ),
		'add_button'    => __( 'Add Item', 'cmb2' ),
		'remove_button' => __( 'Remove Item', 'cmb2' ),
		'sortable'      => true,
		'closed'    		=> true
	),
));
$box->add_group_field( $group_field, array(
	'name' => 'List Item',
	'id'   => 'list_item',
	'type' => 'text'
));
$box->add_group_field( $group_field, array(
	'name' => 'List Item Link URL',
	'description' => 'If the item needs a link add the url here, if not leave blank',
	'id'   => 'list_item_url',
	'type' => 'text'
));


?>