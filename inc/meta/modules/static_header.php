<?php	

$box->add_field( array(
	'name' => 'Static Header Text',
	'id' => $prefix.'static_header_text',
	'type' => 'text',
	'attributes'  => array(
 		'placeholder' => 'Enter a title',
 		'required'    => 'required',
 	),
));

$box->add_field( array(
    'name' => 'Text Align',
    'id'   => $prefix.'static_text_align',
    'type' => 'select',
    'options'          => array(
        'left' => 'Left',
        'center' => 'Center',
        'right' => 'Right',
    ),
    'default' => 'center',
));

?>