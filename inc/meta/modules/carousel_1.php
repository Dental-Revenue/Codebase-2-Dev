<?php   

$box->add_field( array(
	'name' => 'Title',
	'id' => $prefix.'title',
	'type' => 'textarea_small',
	'desc' => 'Supports (Title){Subtitle}[Paragraph]'
));
$box->add_field( array(
	'name' => 'Carousel Items',
	'desc' => 'Number of items visible per slide',
	'id' => $prefix.'items',
	'type' => 'select',
	'options'          => array(
		'2' => 'Two',
		'3' => 'Three',
		'4' => 'Four',
	),
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
	'name' => 'Block Title',
	'id'   => 'title',
	'type' => 'text',
));
$box->add_group_field( $group_field, array(
	'name' => 'Block Excerpt',
	'id'   => 'excerpt',
	'type' => 'textarea_small',
));
$box->add_group_field( $group_field, array(
	'name' => 'Link to...',
	'id'   => 'url',
	'type' => 'text',
));
$box->add_group_field( $group_field, array(
	'name' => 'Block Image',
	'id'   => 'image',
	'type' => 'file',
	'options' => array('url' => false),
	'query_args' => array(
		'type' => array('image/gif','image/jpeg','image/png')
	)
));

?>
