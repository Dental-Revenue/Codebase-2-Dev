<?php 

$box->add_field( array(
	'name' => 'Slider Height',
	'desc' => 'include measurement (i.e. px, % or vh)',
	'id' => $prefix.'height',
	'type' => 'text',
	'attributes'  => array(
 		'required'    => 'required',
 	),
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
	'name' => 'Import Font Family #1',
	'desc' => "Find fonts on https://fonts.google.com. Please only use font families not used in Practice Info -> Appearances. You will only need to import a font family only once. Example: @import url('https://fonts.googleapis.com/css2?family=Work+Sans:wght@100&display=swap');",
    'id' => $prefix . 'import_title_font_family',
    'type' => 'text',
));
$box->add_field( array(
	'name' => 'Import Font Family #2',
	'desc' => "Find fonts on https://fonts.google.com. Please only use font families not used in Practice Info -> Appearances. You will only need to import a font family only once. Example: @import url('https://fonts.googleapis.com/css2?family=Work+Sans:wght@100&display=swap');",
    'id' => $prefix . 'import_title_font_family_2',
    'type' => 'text',
));

$group_field = $box->add_field( array(
	'id' => $prefix.'fold_slides',
	'type' => 'group',
	'options' => array(
		'group_title'   => __( 'Slide {#}', 'cmb2' ),
		'add_button'    => __( 'Add Slide', 'cmb2' ),
		'remove_button' => __( 'Remove Slide', 'cmb2' ),
		'sortable'      => true,
		'closed'    		=> true
	),
));

$box->add_group_field( $group_field, array(
	'name' => 'Slide Title',
	'id'   => 'title',
	'type' => 'text',
));
$box->add_group_field( $group_field, array(
	'name' => 'Font Styling',
	'id'   => 'title_styling',
	'type' => 'textarea_small',
	'desc' => "Adjust as needed. Example: font-family: 'Work Sans', sans-serif;font-weight:100;font-size:56px;line-height:90%;text-transform:uppercase;color:#fff;",
));
$box->add_group_field( $group_field, array(
	'name' => 'Font Styling (Mobile)',
	'id'   => 'title_styling_mobile',
	'type' => 'textarea_small',
	'desc' => "Adjust as needed. Example: font-family: 'Work Sans', sans-serif;font-weight:100;font-size:30px;line-height:90%;text-transform:uppercase;color:#fff;",
));
$box->add_group_field( $group_field, array(
	'name' => 'Decorative Horizontal Line?',
	'id'   => 'title_line',
		'type' => 'select',
		'options'          => array(
			'Yes' => 'Yes',
			'No' => 'No',
		),
		'default' => 'No',
));
$box->add_group_field( $group_field, array(
	'name' => 'Decorative Line Styling',
	'id'   => 'title_line_style',
	'type' => 'textarea_small',
	'desc' => 'Adjust as needed',
	'default' => 'width:100px;height:4px;background-color:#fff;margin:30px auto 30px auto;',
));

$box->add_group_field( $group_field, array(
	'name' => 'Slide Subtitle',
	'id'   => 'subtitle',
	'type' => 'text',
));
$box->add_group_field( $group_field, array(
	'name' => 'Font Styling',
	'id'   => 'subtitle_styling',
	'type' => 'textarea_small',
	'desc' => "Adjust as needed. Example: font-family: 'Work Sans', sans-serif;font-weight:100;font-size:56px;line-height:90%;text-transform:uppercase;color:#fff;",
));
$box->add_group_field( $group_field, array(
	'name' => 'Font Styling (Mobile)',
	'id'   => 'subtitle_styling_mobile',
	'type' => 'textarea_small',
	'desc' => "Adjust as needed. Example: font-family: 'Work Sans', sans-serif;font-weight:100;font-size:30px;line-height:90%;text-transform:uppercase;color:#fff;",
));
$box->add_group_field( $group_field, array(
	'name' => 'Decorative Horizontal Line?',
	'id'   => 'line',
		'type' => 'select',
		'options'          => array(
			'Yes' => 'Yes',
			'No' => 'No',
		),
		'default' => 'No',
));
$box->add_group_field( $group_field, array(
	'name' => 'Decorative Line Styling',
	'id'   => 'line_style',
	'type' => 'textarea_small',
	'desc' => 'Adjust as needed',
	'default' => 'width:100px;height:4px;background-color:#fff;margin:30px auto 30px auto;',
));
$box->add_group_field( $group_field, array(
	'name' => 'Slide Excerpt',
	'id'   => 'excerpt',
	'type' => 'textarea_small',
));
$box->add_group_field( $group_field, array(
	'name' => 'Font Styling',
	'id'   => 'excerpt_styling',
	'type' => 'textarea_small',
	'desc' => "Adjust as needed. Example: font-family: 'Work Sans', sans-serif;font-weight:100;font-size:56px;line-height:90%;text-transform:uppercase;color:#fff;",
));
$box->add_group_field( $group_field, array(
	'name' => 'Font Styling (Mobile)',
	'id'   => 'excerpt_styling_mobile',
	'type' => 'textarea_small',
	'desc' => "Adjust as needed. Example: font-family: 'Work Sans', sans-serif;font-weight:100;font-size:30px;line-height:90%;text-transform:uppercase;color:#fff;",
));
$box->add_group_field( $group_field, array(
	'name' => 'Slide Alignment',
	'id'   => 'alignment',
	'type' => 'select',
	'options'          => array(
		'align-left' => 'Left',
		'align-right' => 'Right',
		'align-center' => 'Center',
	),
	'default' => 'align-center',
));
$box->add_group_field( $group_field, array(
	'name' => 'Button Text',
	'id'   => 'cta',
	'type' => 'text',
));
$box->add_group_field( $group_field, array(
	'name' => 'Link to...',
	'id'   => 'url',
	'type' => 'text',
));
$box->add_group_field( $group_field, array(
	'name' => 'Slide Image',
	'id'   => 'image',
	'type' => 'file',
	'options' => array('url' => false),
	'query_args' => array(
		'type' => array('image/gif','image/jpeg','image/png')
	)
));
$box->add_group_field( $group_field, array(
	'name' => 'Slide Image Alt',
	'id'   => 'alt',
	'type' => 'text',
));
$box->add_group_field( $group_field, array(
	'name' => 'Background Video (webm)',
	'id' => 'video_webm',
	'type' => 'file'
));
$box->add_group_field( $group_field, array(
  'name' => 'Background Video (mp4)',
  'id' => 'video_mp4',
  'type' => 'file'
));
$box->add_group_field( $group_field, array(
	'name' => 'Background Color',
	'id' => 'bg_color',
	'type' => 'colorpicker'
));
$box->add_group_field( $group_field, array(
	'name' => 'Background Color 2 For Gradient',
	'id' => 'bg_color_2',
	'type' => 'colorpicker'
));

?>
