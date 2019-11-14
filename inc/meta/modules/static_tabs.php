<?php 
	
$group_field = $box->add_field(array(
  'id' => $prefix . 'items',
  'type' => 'group',
  'options' => array(
    'group_title' => __( 'Item {#}', 'cmb2' ),
    'add_button' => __( 'Add Another Item', 'cmb2' ),
    'remove_button' => __( 'Remove Item', 'cmb2' ),
    'sortable' => true,
    'closed' => true,
  ),
));

$box->add_group_field($group_field, array(
  'name' => 'Item Title*',
  'id' => 'title',
  'type' => 'text',
  'attributes' => array(
    'required' => 'required',
  ),
));
$box->add_group_field($group_field, array(
  'name' => 'Item Excerpt',
  'id' => 'excerpt',
  'type' => 'textarea_small',
));
$box->add_group_field( $group_field, array(
	'name' => 'Item Alignment',
	'id'   => 'alignment',
	'type' => 'select',
	'options'          => array(
		'align-left' => 'Left',
		'align-right' => 'Right',
		'align-center' => 'Center',
	),
	'default' => 'align-center',
));
$box->add_group_field($group_field, array(
  'name' => 'Item Background Image*',
  'id' => 'image',
  'type' => 'file',
  'attributes' => array(
    'required' => 'required',
  ),
));
$box->add_group_field( $group_field, array(
	'name' => 'Background Image Alt',
	'id'   => 'alt',
	'type' => 'text',
));
$box->add_group_field($group_field, array(
  'name' => 'Item Background Darkness',
  'description' => 'From 0 (no added darkness) to 100 (completely black)',
  'id' => 'darkness',
  'type' => 'text',
));

$box->add_group_field($group_field, array(
	'name' => 'Link To...*',
	'id' => 'link',
	'type' => 'select',
	'options_cb' => 'cmb2_get_post_options',
));
$box->add_group_field($group_field, array(
  'name' => 'Link Title*',
  'id' => 'link_title',
  'type' => 'text',
  'attributes' => array(
    'required' => 'required',
  ),
));	
	
?>