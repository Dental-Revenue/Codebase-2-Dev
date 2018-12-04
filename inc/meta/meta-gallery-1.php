<?php


// =============================================================== SERVICE TEMPLATE META

function gallery_1_meta() {
	
	$prefix = 'g1_';
	
	$box = new_cmb2_box( array(
    'id' => $prefix.'info',
		'title' => 'Gallery Images',
		'object_types' => array( 'page' ),
		'show_on' => array( 'key' => 'page-template', 'value' => 'page-templates/template-gallery-1.php' ),
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true,
	));
	
	$image_set = $box->add_field( array(
		'id' => $prefix.'image_sets',
		'type' => 'group',
		'options' => array(
			'group_title' => __( 'Image Set {#}', 'cmb2' ),
			'add_button' => __( 'Add Another Image Set', 'cmb2' ),
			'remove_button' => __( 'Remove Image Set', 'cmb2' ),
			'sortable' => false,
			'closed' => true
		),
	));
	
	$box->add_group_field( $image_set, array(
    'name' => 'Primary Image Type',
    'id' => 'primary_image',
    'classes' => array('primary-trigger','g1-trigger'),
    'type' => 'select',
    'show_option_none' => true,
    'options' => array(
	    'hero' => 'Hero Image',
	    'ba' => 'Before/After'
    )
  ));
  	
  		//Primary Image Hidden Fields
  		$box->add_group_field( $image_set, array(
    		'name' => 'Hero Photo',
				'id' => 'primary_image_hero',
				'classes' => array('dr-hidden','primary-image-hero'),
				'type' => 'file'
			));
			$box->add_group_field( $image_set, array(
    		'name' => 'Before Photo',
				'id' => 'primary_image_before',
				'classes' => array('dr-hidden','primary-image-before'),
				'type' => 'file'
			));
			$box->add_group_field( $image_set, array(
    		'name' => 'After Photo',
				'id' => 'primary_image_after',
				'classes' => array('dr-hidden','primary-image-after'),
				'type' => 'file'
			));
  
  $box->add_group_field( $image_set, array(
    'name' => 'Lightbox Image Type',
    'id' => 'lightbox_image',
    'classes' => array('lightbox-trigger','g1-trigger'),
    'type' => 'select',
    'show_option_none' => true,
    'options' => array(
	    'default' => 'Use Primary Image',
	    'hero' => 'Hero Image',
	    'ba' => 'Before/After'
    )
  ));
  
  		//Lightbox Image Hidden Fields
  		$box->add_group_field( $image_set, array(
    		'name' => 'Hero Photo',
				'id' => 'lightbox_image_hero',
				'classes' => array('dr-hidden','lightbox-image-hero'),
				'type' => 'file'
			));
			$box->add_group_field( $image_set, array(
    		'name' => 'Before Photo',
				'id' => 'lightbox_image_before',
				'classes' => array('dr-hidden','lightbox-image-before'),
				'type' => 'file'
			));
			$box->add_group_field( $image_set, array(
    		'name' => 'After Photo',
				'id' => 'lightbox_image_after',
				'classes' => array('dr-hidden','lightbox-image-after'),
				'type' => 'file'
			));
  
  
}

add_action( 'cmb2_admin_init', 'gallery_1_meta' );


?>