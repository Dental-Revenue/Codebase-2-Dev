<?php	

$box->add_field( array(
	'name' => 'Breaker Text',
	'id' => $prefix.'breaker_text',
	'type' => 'text',
	'attributes'  => array(
 		'placeholder' => 'A small amount of text',
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
	'name' => 'Breaker Button Text',
	'id' => $prefix.'breaker_button_text',
	'type' => 'text',
	'attributes'  => array(
 		'placeholder' => 'A small amount of text',
 	),
));
$box->add_field( array(
	'name' => 'Breaker Button URL',
	'id' => $prefix.'breaker_button_url',
	'type' => 'text',
	'attributes'  => array(
 		'placeholder' => 'https:// or /example',
 	),
));


?>