<?php 

$box->add_field( array(
	'name' => 'Height',
	'desc' => 'include measurement (i.e. px, % or vh)',
	'id' => $prefix.'height',
	'type' => 'text',
	'attributes'  => array(
 		'required'    => 'required',
 	),
));
$box->add_field( array(
	'name' => 'Overlay Color',
	'id' => $prefix.'bg_color',
	'type' => 'colorpicker'
));
$box->add_field( array(
	'name' => 'Overlay Color 2 (Gradient)',
	'id' => $prefix.'bg_color_2',
	'type' => 'colorpicker'
));
$box->add_field( array(
	'name' => 'Overlay Darkness',
	'desc' => 'Defaults to 30 (percent)',
	'default' => '30',
    'id' => $prefix . 'overlay',
    'type' => 'text',
    'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		),
));
$box->add_field( array(
	'name' => 'Title',
	'id'   => $prefix . 'title',
	'type' => 'text',
));
$box->add_field( array(
	'name' => 'Excerpt',
	'id'   => $prefix . 'excerpt',
	'type' => 'textarea_small',
));
$box->add_field( array(
	'name' => 'Button 1 Text',
	'id'   => $prefix . 'cta',
	'type' => 'text',
));
$box->add_field( array(
	'name' => 'Button 1 Link to...',
	'id'   => $prefix . 'url',
	'type' => 'text',
));
$box->add_field( array(
	'name' => 'Button 2 Text',
	'id'   => $prefix . 'cta_2',
	'type' => 'text',
));
$box->add_field( array(
	'name' => 'Button 2 Link to...',
	'id'   => $prefix . 'url_2',
	'type' => 'text',
));

?>
