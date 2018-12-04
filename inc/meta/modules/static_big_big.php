<?php	

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
	'name' => 'Block Title',
	'id'   => 'title',
	'type' => 'text',
));
$box->add_group_field( $group_field, array(
	'name' => 'Block Image',
	'id' => 'image',
	'type' => 'file',
	'options' => array('url' => false),
	'query_args' => array(
		'type' => array('image/gif','image/jpeg','image/png')
	)
));
$box->add_group_field( $group_field, array(
	'name' => 'Block Excerpt',
	'id' => 'excerpt',
	'type' => 'wysiwyg',
	'options' => array(
		'textarea_rows' => 5
	)
));
$box->add_group_field( $group_field, array(
	'name' => 'Block Link Title',
	'id' => 'link_title',
	'type' => 'text'
));
$box->add_group_field( $group_field, array(
	'name' => 'Block Link To...',
	'id' => 'link',
	'type' => 'text_url'
));


?>