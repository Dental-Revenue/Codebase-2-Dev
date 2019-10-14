<?php	

$box->add_field( array(
	'name' => 'Left Side Image',
	'id'   => $prefix.'image',
	'type' => 'file',
	'options' => array('url' => false),
	'query_args' => array(
		'type' => array('image/gif','image/jpeg','image/png')
	)
));
$box->add_field( array(
	'name' => 'Image Alt',
	'id'   => 'alt',
	'type' => 'text',
));
$box->add_field( array(
	'name' => 'Main Headline',
	'id' => $prefix.'headline',
	'type' => 'text',
	'attributes'  => array(
 		'required'    => 'required',
 	),
));
$box->add_field( array(
	'name' => 'Module Content',
	'id' => $prefix.'content',
	'type' => 'wysiwyg',
	'attributes' => array(
 		'required' => 'required',
 	),
));

?>