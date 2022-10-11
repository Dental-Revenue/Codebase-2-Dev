<?php   
	
	
$box->add_field( array(
	'name' => 'Heading',
	'id' => $prefix.'heading',
	'type' => 'text',
));
$box->add_field(
	array(
		'name' => 'Subtitle',
		'id' => $prefix.'subtitle',
		'type' => 'text',
	)
);
$box->add_field( array(
	'name' => 'Intro Paragraph',
	'id' => $prefix.'intro_paragraph',
	'type' => 'wysiwyg',
	'options' => array(
		'textarea_rows' => 5
	)
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
	'type' => 'text',
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