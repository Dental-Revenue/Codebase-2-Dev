<?php	

$box->add_field( array(
	'name' => 'Title',
	'id' => $prefix.'title',
	'type' => 'textarea_small',
	'default' => '(Title){Subtitle}[Paragraph]',
	'desc' => 'Supports (Title){Subtitle}[Paragraph]'
));

$box->add_field( array(
	'name' => 'Post Category',
	'id' => $prefix.'category',
	'type' => 'select',
	'options_cb' => 'cmb2_get_term_options',
	'default' => 'all'
));

?>
