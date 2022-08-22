<?php	

$box->add_field( array(
	'name' => 'Main Headline',
	'id' => $prefix.'headline',
	'type' => 'text',
	'attributes'  => array(
 		'required'    => 'required',
 	),
));
$box->add_field(
	array(
		'name' => 'Subtitle',
		'id' => $prefix.'subtitle',
		'type' => 'text',
	)
);
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
$box->add_field( array(
	'name' => 'Left Side CTA Text',
	'id' => $prefix.'left_side_cta',
	'type' => 'text',
	'attributes'  => array(
 		'required'    => 'required',
 	),
));
$box->add_field( array(
	'name' => 'Left Side CTA URL',
	'id' => $prefix.'left_side_url',
	'type' => 'text',
	'attributes'  => array(
 		'required'    => 'required',
 	),
));
$box->add_field( array(
	'name' => 'Right Side Image',
	'id'   => $prefix.'right_side_image',
	'type' => 'file',
	'options' => array('url' => false),
	'query_args' => array(
		'type' => array('image/gif','image/jpeg','image/png')
	)
));
$box->add_field( array(
	'name' => 'Right Site Content',
	'id' => $prefix.'right_side_content',
	'type' => 'wysiwyg',
	'attributes' => array(
 		'required' => 'required',
 	),
));
$box->add_field( array(
	'name' => 'Right Side CTA Text',
	'id' => $prefix.'right_side_cta',
	'type' => 'text',
	'attributes'  => array(
 		'required'    => 'required',
 	),
));
$box->add_field( array(
	'name' => 'Right Side CTA URL',
	'id' => $prefix.'right_side_url',
	'type' => 'text',
	'attributes'  => array(
 		'required'    => 'required',
 	),
));

?>