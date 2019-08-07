<?php	

$box->add_field( array(
	'name' => 'Specials Breaker Headline',
	'id' => $prefix.'title',
	'type' => 'textarea_small',
	'desc' => 'Supports (Title){Subtitle}[Paragraph]'
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
