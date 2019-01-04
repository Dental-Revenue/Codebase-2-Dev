<?php	

$box->add_field( array(
	'name' => 'Main Headline',
	'id' => $prefix.'headline',
	'type' => 'text',
	'attributes'  => array(
 		'required'    => 'required',
 	),
));
$box->add_field( array(
	'name' => 'Left Side Image',
	'id'   => $prefix.'left_side_image',
	'type' => 'file',
	'options' => array('url' => false),
	'query_args' => array(
		'type' => array('image/gif','image/jpeg','image/png')
	)
));
$box->add_field( array(
	'name' => 'Left Site Content',
	'id' => $prefix.'left_side_content',
	'type' => 'wysiwyg',
	'attributes' => array(
 		'required' => 'required',
 	),
));

?>