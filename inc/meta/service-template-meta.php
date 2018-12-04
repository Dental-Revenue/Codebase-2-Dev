<?php

// =============================================================== SERVICE TEMPLATE WP ADMIN OVERRIDES
if(!function_exists('remove_editor_init')){
function remove_editor_init() {
  if (!is_admin()){return;}
  $current_post_id = filter_input( INPUT_GET, 'post', FILTER_SANITIZE_NUMBER_INT );
  $update_post_id = filter_input( INPUT_POST, 'post_ID', FILTER_SANITIZE_NUMBER_INT );
  if (isset($current_post_id)){$post_id = absint($current_post_id);}elseif(isset($update_post_id)){$post_id = absint($update_post_id);}else{return;}
  if(isset($post_id)){
    $template_file = get_post_meta( $post_id, '_wp_page_template', true );
    if('page-templates/template-service.php'===$template_file){
      remove_post_type_support( 'page', 'editor' );
    }
  }
}
add_action( 'init', 'remove_editor_init' );
}


// =============================================================== SERVICE TEMPLATE META FUNCTIONS

if(!function_exists('cmb2_get_testimonials')){
//get testimonials for a meta box 
function cmb2_get_testimonials() {
  $posts = get_posts(array('post_type'   => 'testimonials','numberposts' => -1,));
  $post_options = array();
  if($posts){
    foreach($posts as $post ){ $post_options[ $post->ID ] = wp_trim_words($post->post_content,20); }
  }
  return $post_options;
}
}


// =============================================================== SERVICE TEMPLATE META

if(!function_exists('service_template_meta')){
function service_template_meta() {
  $prefix = 'service_';
  
  //general info
  $box = new_cmb2_box( array(
    'id' => 'service_info',
    'title' => __( 'Service Information', 'cmb2' ),
    'object_types' => array( 'page' ),
    'show_on' => array( 'key' => 'page-template', 'value' => 'page-templates/template-service.php' ),
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true,
  ));
  $box->add_field( array(
    'name' => 'Service Full Name (Required)',
    'id' => $prefix . 'general_longname',
    'type' => 'text',
    'attributes'  => array(
      'required'    => 'required',
    ),
  ));
  $box->add_field( array(
    'name' => 'Service Short Name (Optional)',
    'id' => $prefix . 'general_shortname',
    'type' => 'text'
  ));
  
  //overview
  $box = new_cmb2_box( array(
    'id' => 'service_overview',
    'title' => __( 'Overview', 'cmb2' ),
    'object_types' => array( 'page' ),
    'show_on' => array( 'key' => 'page-template', 'value' => 'page-templates/template-service.php' ),
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true,
  ));
  $box->add_field( array(
    'name' => 'Hidden?',
    'id' => $prefix . 'overview_hidden',
    'type' => 'radio_inline',
    'options' => array(
      'true' => 'Yes, hide from public view.',
      'false' => 'No',
    ),
    'default' => 'true',
  ));
  $box->add_field( array(
    'name' => 'Overview Content',
    'id' => $prefix . 'overview_content',
    'type' => 'wysiwyg',
    'after' => 'cmb2_wysiwyg_word_counter',
  ));
  
  //testimonials
  $box = new_cmb2_box( array(
    'id' => 'service_testimonials',
    'title' => __( 'Testimonials', 'cmb2' ),
    'object_types' => array( 'page' ),
    'show_on' => array( 'key' => 'page-template', 'value' => 'page-templates/template-service.php' ),
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true,
  ));
  $box->add_field( array(
    'name' => 'Hidden?',
    'id' => $prefix . 'testimonials_hidden',
    'type' => 'radio_inline',
    'options' => array(
      'true' => 'Yes, hide from public view.',
      'false' => 'No',
    ),
    'default' => 'true',
  ));
  $box->add_field( array(
    'name' => 'Select Testimonials to Show',
    'id' => $prefix . 'testimonials',
    'type' => 'multicheck',
    'options_cb' => 'cmb2_get_testimonials',
    'row_classes' => 'cmb2-smalltext-list',
  ));
  
  //expectations
  $box = new_cmb2_box( array(
    'id' => 'service_expectations',
    'title' => __( 'What to Expect', 'cmb2' ),
    'object_types' => array( 'page' ),
    'show_on' => array( 'key' => 'page-template', 'value' => 'page-templates/template-service.php' ),
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true,
  ));
  $box->add_field( array(
    'name' => 'Hidden?',
    'id' => $prefix . 'expectations_hidden',
    'type' => 'radio_inline',
    'options' => array(
      'true' => 'Yes, hide from public view.',
      'false' => 'No',
    ),
    'default' => 'true',
  ));
  $box->add_field( array(
    'name' => 'What to Expect Content',
    'id' => $prefix . 'expectations_content',
    'type' => 'wysiwyg',
    'options' => array(
      'textarea_rows' => 6
    ),
    'after' => 'cmb2_wysiwyg_word_counter',
  ));
  $box->add_field( array(
    'name' => 'What to Expect Video (Optional)',
    'desc' => 'Paste iframe here',
    'id' => $prefix . 'expectations_video',
    'type' => 'textarea_small',
    'escape_cb' => false,
    'sanitization_cb' => false
  ));
  
  //faqs
  $box = new_cmb2_box( array(
    'id' => 'service_faqs',
    'title' => __( 'FAQs', 'cmb2' ),
    'object_types' => array( 'page' ),
    'show_on' => array( 'key' => 'page-template', 'value' => 'page-templates/template-service.php' ),
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true,
  ));
  $box->add_field( array(
    'name' => 'Hidden?',
    'id' => $prefix . 'faqs_hidden',
    'type' => 'radio_inline',
    'options' => array(
      'true' => 'Yes, hide from public view.',
      'false' => 'No',
    ),
    'default' => 'true',
  ));
  $faqs_group = $box->add_field( array(
    'id' => 'service_faqs_group',
    'type' => 'group',
    'repeatable' => true,
    'options' => array(
      'group_title' => __( 'FAQ {#}', 'cmb2' ),
      'add_button' => __( 'Add FAQ', 'cmb2' ),
      'remove_button' => __( 'Remove FAQ', 'cmb2' ),
      'sortable' => true,
      'closed' => true,
    ),
  ));
  $box->add_group_field( $faqs_group, array(
    'name' => 'Question',
    'id' => 'question',
    'type' => 'text',
  ));
  $box->add_group_field( $faqs_group, array(
    'name' => 'Answer',
    'id' => 'answer',
    'type' => 'textarea_small',
  ));
  
  //cost
  $box = new_cmb2_box( array(
    'id' => 'service_cost',
    'title' => __( 'Cost', 'cmb2' ),
    'object_types' => array( 'page' ),
    'show_on' => array( 'key' => 'page-template', 'value' => 'page-templates/template-service.php' ),
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true,
  ));
  $box->add_field( array(
    'name' => 'Hidden?',
    'id' => $prefix . 'cost_hidden',
    'type' => 'radio_inline',
    'options' => array(
      'true' => 'Yes, hide from public view.',
      'false' => 'No',
    ),
    'default' => 'true',
  ));
  $cost_group = $box->add_field( array(
    'id' => 'service_cost_group',
    'type' => 'group',
    'repeatable' => true,
    'options' => array(
      'group_title' => __( 'Line {#}', 'cmb2' ),
      'add_button' => __( 'Add Line', 'cmb2' ),
      'remove_button' => __( 'Remove Line', 'cmb2' ),
      'sortable' => true,
      'closed' => true,
    ),
  ));
  $box->add_group_field( $cost_group, array(
    'name' => 'Item',
    'id' => 'item',
    'type' => 'text',
  ));
  $box->add_group_field( $cost_group, array(
    'name' => 'Cost',
    'id' => 'cost',
    'type' => 'text',
  ));
  
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