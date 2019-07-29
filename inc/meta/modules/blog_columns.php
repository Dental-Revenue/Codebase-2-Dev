<?php	

$box->add_field( array(
	'name' => 'Headline',
	'id' => $prefix.'headline',
	'description' => 'Supports {subhead}',
	'type' => 'text'
));

$box->add_field( array(
	'name' => 'Post Category',
	'id' => $prefix.'category',
	'type' => 'select',
	'options_cb' => 'cmb2_get_term_options',
	'default' => 'all'
));

?>
