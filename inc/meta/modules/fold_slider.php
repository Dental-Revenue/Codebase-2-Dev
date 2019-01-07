<?php   
	
$group_field = $box->add_field( array(
	'id' => $prefix.'fold_slides',
	'type' => 'group',
	'options' => array(
		'group_title'   => __( 'Slide {#}', 'cmb2' ),
		'add_button'    => __( 'Add Slide', 'cmb2' ),
		'remove_button' => __( 'Remove Slide', 'cmb2' ),
		'sortable'      => true,
		'closed'    		=> true
	),
));
$box->add_group_field( $group_field, array(
	'name' => 'Slide Title',
	'id'   => 'title',
	'type' => 'text',
));
$box->add_group_field( $group_field, array(
	'name' => 'Slide Excerpt',
	'id'   => 'excerpt',
	'type' => 'textarea_small',
));
$box->add_group_field( $group_field, array(
	'name' => 'Link to...',
	'id'   => 'url',
	'type' => 'text',
));
$box->add_group_field( $group_field, array(
	'name' => 'Slide Image',
	'id'   => 'image',
	'type' => 'file',
	'options' => array('url' => false),
	'query_args' => array(
		'type' => array('image/gif','image/jpeg','image/png')
	)
));

?>