<?php	
$box->add_field( array(
	'name' => 'Specials Breaker Headline',
	'id' => $prefix.'specials_breaker_headline',
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
	'name' => 'Paragraph',
	'id' => $prefix.'specials_breaker_text',
	'type' => 'textarea_small',
	'attributes'  => array(
 		'required'    => 'required',
 	),
));
$box->add_field( array(
	'name' => 'Display Paragraph on Mobile?',
	'id'   => $prefix.'paragraph_mobile',
	'type' => 'select',
	'options'          => array(
		'yes' => 'Yes',
		'no' => 'No',
	),
	'default' => 'yes',
));
$box->add_field( array(
	'name' => 'Specials Breaker Button Text',
	'id' => $prefix.'specials_breaker_button_text',
	'type' => 'text',
	'attributes'  => array(
 		'placeholder' => 'A small amount of text',
 	),
));
$box->add_field( array(
	'name' => 'Specials Breaker Button URL',
	'id' => $prefix.'specials_breaker_button_url',
	'type' => 'text',
	'attributes'  => array(
 		'placeholder' => 'https:// or /example',
 	),
));


?>