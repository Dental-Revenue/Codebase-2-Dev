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
$group_field = $box->add_field( array(
	'id' => $prefix.'fold_boxes',
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
	'name' => 'Slide Excerpt',
	'id'   => 'excerpt',
	'type' => 'textarea_small',
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

$box->add_field( array(
	'name' => 'Main Slide Alignment',
	'id'   => $prefix.'alignment',
	'type' => 'select',
	'options'          => array(
		'align-left' => 'Left',
		'align-right' => 'Right',
		'align-center' => 'Center',
	),
	'default' => 'align-left',
));

?>
