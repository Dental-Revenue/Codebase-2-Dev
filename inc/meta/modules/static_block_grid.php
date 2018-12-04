<?php	

$box->add_field( array(
	'name' => 'Grid Block Items',
	'desc' => 'Number of items visible per row',
	'id' => $prefix.'grid_items',
	'type' => 'select',
	'options'          => array(
		'four-items' => 'Four',
		'five-items' => 'Five',
		'six-items' => 'Six',
	),
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


?>