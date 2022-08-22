<?php

$box->add_field( array(
	'name' => 'Main Headline',
	'id' => $prefix.'headline',
	'description' => 'Optional. Supports {subhead}',
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
$group_field = $box->add_field( array(
	'id' => $prefix.'grid_blocks',
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
	'name' => 'Block Title',
	'id'   => 'block_title',
	'type' => 'text',
));
$box->add_group_field( $group_field, array(
	'name' => 'Block Excerpt',
	'id'   => 'block_excerpt',
	'type' => 'textarea_small',
));
$box->add_group_field( $group_field, array(
	'name' => 'Link to...',
	'id'   => 'block_url',
	'type' => 'text',
));
$box->add_group_field( $group_field, array(
	'name' => 'Block Image',
	'id'   => 'block_image',
	'type' => 'file',
	'options' => array('url' => false),
	'query_args' => array(
		'type' => array('image/gif','image/jpeg','image/png')
	)
));
$box->add_field( array(
	'name' => 'Display List Block?',
	'id'   => $prefix.'display_list_block',
	'type' => 'select',
	'options'          => array(
		'yes' => 'Yes',
		'no' => 'No',
	),
	'default' => 'yes',
));
$box->add_field( array(
	'name' => 'List Headline',
	'id' => $prefix.'list_headline',
	'type' => 'text',
	'description' => 'Optional.',
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