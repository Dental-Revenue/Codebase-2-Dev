<?php 

$box->add_field( array(
	'name' => 'Static Background Image',
	'id' => $prefix.'static_bg_image',
	'type' => 'file',
	'desc' => '375px min recommended image width. Image is set to 100% width and Module Height is set based on the images aspect ratio.',
));
$box->add_field( array(
	'name' => 'Background Image Alt',
	'id' => $prefix.'static_image_alt',
	'type' => 'text',
));
$box->add_field( array(
	'name' => 'Overlay Color',
	'id' => $prefix.'overlay_color',
	'type' => 'colorpicker',
	'default' => '#000000',
));
$box->add_field( array(
	'name' => 'Overlay Color 2 (Gradient)',
	'id' => $prefix.'overlay_color_2',
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
