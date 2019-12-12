<?php

// =============================================================== SERVICE TEMPLATE META

if(!function_exists('service_template_meta')){
function service_template_meta() {
  $prefix = 'service_';
  
 //why choose
  $box = new_cmb2_box( array(
    'id' => 'service_why',
    'title' => __( 'Why Choose Us', 'cmb2' ),
    'object_types' => array( 'page' ),
    'show_on' => array( 'key' => 'page-template', 'value' => 'page-templates/template-service.php' ),
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true,
  ));
  $box->add_field( array(
    'name' => 'Hidden?',
    'id' => $prefix . 'why_hidden',
    'type' => 'radio_inline',
    'options' => array(
      'true' => 'Yes, hide from public view.',
      'false' => 'No',
    ),
    'default' => 'true',
  ));
  $box->add_field( array(
    'name' => 'Doctor Profile Image',
    'id' => $prefix . 'why_image',
    'type' => 'file'
  ));
  $box->add_field( array(
    'name' => 'Why Choose Us Text',
    'id' => $prefix . 'why_content',
    'type' => 'wysiwyg',
    'options' => array(
      'textarea_rows' => 6
    ),
    'after' => 'cmb2_wysiwyg_word_counter',
  ));
  $box->add_field( array(
    'name' => 'Show Affiliations?',
    'id' => $prefix . 'why_affiliations_show',
    'type' => 'radio_inline',
    'options' => array(
      'true' => 'Yes, show the affiliations slider.',
      'false' => 'No',
    ),
    'default' => 'false',
  ));
  $box->add_field( array(
    'name' => 'Common Affiliations',
    'id' => $prefix . 'why_affiliations_common',
    'type' => 'multicheck',
    'options' => array(
      'aacd' => 'AACD',
      'dawson' => 'Dawson',
      'care-credit' => 'Care Credit',
      'agd' => 'AGD Academy of General Dentistry',
      'ada' => 'ADA American Dental Association',
      'invisalign' => 'Invisalign',
      'zoom' => 'Zoom Whitening',
      'aboi' => 'ABOI',
      'icoi' => 'ICOI',
      'six-month-smiles' => 'Six Month Smiles'
    ),
  ));
  $box->add_field( array(
    'name' => 'Custom Affiliations',
    'desc' => 'Affiliation not listed? Add custom ones.',
    'id'   => $prefix . 'why_affiliations_custom',
    'type' => 'file_list',
  ));
  
  //related
  $box = new_cmb2_box( array(
    'id' => 'service_related',
    'title' => __( 'Related Procedures', 'cmb2' ),
    'object_types' => array( 'page' ),
    'show_on' => array( 'key' => 'page-template', 'value' => 'page-templates/template-service.php' ),
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true,
  ));
  $box->add_field( array(
    'name' => 'Hidden?',
    'id' => $prefix . 'related_hidden',
    'type' => 'radio_inline',
    'options' => array(
      'true' => 'Yes, hide from public view.',
      'false' => 'No',
    ),
    'default' => 'true',
  ));
  $box->add_field( array(
    'name' => 'Procedures',
    'id' => $prefix . 'related_procedures',
    'type' => 'multicheck',
    'options_cb' => 'cmb2_get_post_options'
  ));
  
  
}
add_action( 'cmb2_admin_init', 'service_template_meta' );
}



if(!function_exists('override_meta_save')){
//why choose filters to override and only save to post id 1
function override_meta_save( $empty, $a, $args, $object ) {
	$fields = array('service_why_image','service_why_image_id','service_why_content','service_why_affiliations_show','service_why_affiliations_common','service_why_affiliations_custom');
	if(in_array($a['field_id'], $fields)){
		if ( ! $a['single'] ) {
			return add_metadata( $a['type'], 1, $a['field_id'], $a['value'], false );
		}
		return update_metadata( $a['type'], 1, $a['field_id'], $a['value'] );
	}
}
add_filter( 'cmb2_override_meta_save', 'override_meta_save', 10, 4 );
}


if(!function_exists('override_meta_show')){
function override_meta_show( $default, $objectid, $a, $object ) {
	$fields = array('service_why_image','service_why_image_id','service_why_content','service_why_affiliations_show','service_why_affiliations_common','service_why_affiliations_custom');
	if(in_array($a['field_id'], $fields)){
  	return get_post_meta( 1, $a['field_id'], true );
	}else{
  	return $default;
	}
}
add_filter( 'cmb2_override_meta_value', 'override_meta_show', 10, 4 );
}

?>