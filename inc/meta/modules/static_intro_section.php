<?php   
	
	

$box->add_field( array(
	'name' => 'Heading',
	'desc' => 'Supports {subhead}',
	'id' => $prefix.'heading',
	'type' => 'text',
));

$box->add_field( array(
	'name' => 'Paragraph',
	'id' => $prefix.'paragraph',
	'type' => 'wysiwyg',
	'options' => array(
		'textarea_rows' => 5
	)
));

$box->add_field( array(
	'name' => 'Learn More Link',
	'desc' => 'enter url',
	'id' => $prefix.'link',
	'type' => 'text',
));


?>