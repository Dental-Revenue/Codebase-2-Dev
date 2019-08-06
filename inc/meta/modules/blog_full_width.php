<?php

$box->add_field( array(
	'name' => 'Title',
	'id' => $prefix.'title',
	'type' => 'textarea_small',
	'default' => '(Title){Subtitle}[Paragraph]',
	'desc' => 'Supports (Title){Subtitle}[Paragraph]'
));

$box->add_field( array(
	'name' => 'Has Images?',
	'id' => $prefix.'has_images',
	'type' => 'radio_inline',
	'options' => array(
		'yes' => __( 'Yes', 'cmb2' ),
		'no'   => __( 'No', 'cmb2' )
	)
));
	
?>
