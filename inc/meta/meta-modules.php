<?php


// =============================================================== SERVICE TEMPLATE META

function homepage_meta() {
	
	global $wpdb;
	
	$current_page = 0;
	if ( isset( $_REQUEST['post'] ) ) {
    $current_page = absint( $_REQUEST['post'] ) ;
	} elseif ( isset( $_REQUEST['post_ID'] ) ) {
    $current_page = absint( $_REQUEST['post_ID'] ) ;
	}	
	$modules = $wpdb->get_results( "SELECT * FROM modules WHERE page = ".$current_page);
	
	//echo $current_page;
			
	foreach($modules as $m){
		
		$prefix = $m->id.'_';
		
		$box = new_cmb2_box( array(
    	'id' => $m->id,
			'title' => $m->name,//.' :: (Module '.$m->module.' Instance '.$m->id.')',
			'object_types' => array( 'page' ),
			'show_on'	  => array( 'id' => array( $m->page, ) ),
			'context' => 'normal',
			'priority' => 'high',
			'show_names' => true,
		));
		
		//for all blocks
		
		$box->add_field( array(
			'name' => 'Background Color',
			'id' => $prefix.'bg_color',
			'type' => 'colorpicker'
		));
		$box->add_field( array(
			'name' => 'Background Image',
			'id' => $prefix.'bg_image',
			'type' => 'file'
		));
		$box->add_field( array(
			'name' => 'Background Image Opacity',
			'desc' => '1-100',
			'classes' => 'double-rule',
			'id' => $prefix.'bg_image_opacity',
			'type' => 'text'
		));
		
		switch ($m->module) {
			
// ===============================================================================
			
			case "static_mini_blocks":
				
				require_once  __DIR__ . '/modules/static_mini_blocks.php';
				
			break;


// ===============================================================================
				

			case "static_intro_section":
				
				require_once  __DIR__ . '/modules/static_intro_section.php';

			break;


// ===============================================================================
			
			
			case "carousel_1":
				
				require_once  __DIR__ . '/modules/carousel_1.php';
				
			break;


// ===============================================================================
			
			
			case "carousel_2":
				
				require_once  __DIR__ . '/modules/carousel_2.php';
				
			break;
				

// ===============================================================================
			
			
			case "static_big_small":
				
				require_once  __DIR__ . '/modules/static_big_small.php';
				
			break;
				

// ===============================================================================
			
			
			case "static_big_small_hover":
				
				require_once  __DIR__ . '/modules/static_big_small_hover.php';
				
			break;


// ===============================================================================
			
			
			case "static_big_big":
				
				require_once  __DIR__ . '/modules/static_big_big.php';
			
			break;
			

// ===============================================================================
			
			
			case "breaker":
				
				require_once  __DIR__ . '/modules/breaker.php';
				
			break;


// ===============================================================================
			
			
			case "static_block_grid":
				
				require_once  __DIR__ . '/modules/static_block_grid.php';
				
			break;


// ===============================================================================
			
			
			case "blog_big_small":
				
				require_once  __DIR__ . '/modules/blog_big_small.php';
				
			break;


// ===============================================================================
			
			
			case "blog_columns":
				
				require_once  __DIR__ . '/modules/blog_columns.php';
				
			break;


// ===============================================================================
			
			
			case "blog_full_width":
				
				require_once  __DIR__ . '/modules/blog_full_width.php';
				
			break;
			

// ===============================================================================
			
			
			case "static_image_split":
				
				require_once  __DIR__ . '/modules/static_image_split.php';
				
			break;

// ===============================================================================

			case "logo_scroll":
			
				require_once  __DIR__ . '/modules/logo_scroll.php';
				
			break;
			

// ===============================================================================

			case "static_blocks_list":
			
				require_once  __DIR__ . '/modules/static_blocks_list.php';
				
			break;
			

// ===============================================================================


			case "static_photo_list":
			
				require_once  __DIR__ . '/modules/static_photo_list.php';
				
			break;
			

// ===============================================================================


			case "carousel_3":
			
				require_once  __DIR__ . '/modules/carousel_3.php';
				
			break;
			

// ===============================================================================


			case "static_image_content":
			
				require_once  __DIR__ . '/modules/static_image_content.php';
				
			break;
			

// ===============================================================================


			case "static_multiple_col":
			
				require_once  __DIR__ . '/modules/static_multiple_col.php';
				
			break;
			

// ===============================================================================


			case "static_side_by_side":
			
				require_once  __DIR__ . '/modules/static_side_by_side.php';
				
			break;
			

// ===============================================================================


			case "static_tabs":
			
				require_once  __DIR__ . '/modules/static_tabs.php';
				
			break;
			

// ===============================================================================


			case "static_cta_fold":
			
				require_once  __DIR__ . '/modules/static_cta_fold.php';
				
			break;
			

// ===============================================================================


			case "reviews_testimonials_fold":
			
				require_once  __DIR__ . '/modules/reviews_testimonials_fold.php';
				
			break;
			

// ===============================================================================


			case "reviews_testimonials_carousel":
			
				require_once  __DIR__ . '/modules/reviews_testimonials_carousel.php';
				
			break;
			

// ===============================================================================


			case "reviews_google":
			
				require_once  __DIR__ . '/modules/reviews_google.php';
				
			break;
			

// ===============================================================================

			
		} //end switch
	} 
  
  
}

add_action( 'cmb2_admin_init', 'homepage_meta' );

//Page selector for any select metabox
function cmb2_get_post_options( $query_args ) {
  $args = wp_parse_args( $query_args, array('post_type'   => 'page','numberposts' => -1,'orderby' => 'name','order' => 'ASC'));
  $posts = get_posts( $args );
  $post_options = array();
  if($posts){
    foreach($posts as $post ){ $post_options[ $post->ID ] = $post->post_title;}
  }
  return $post_options;
}






// ===META FUNCTIONS
function cmb2_get_term_options( $field ) {
	$args = $field->args( 'get_terms_args' );
	$args = is_array( $args ) ? $args : array();

	$args = wp_parse_args( $args, array( 'taxonomy' => 'category' ) );

	$taxonomy = $args['taxonomy'];

	$terms = (array) cmb2_utils()->wp_at_least( '4.5.0' )
		? get_terms( $args )
		: get_terms( $taxonomy, $args );

	// Initate an empty array
	$term_options = array();
	$term_options[ 'all' ] = 'All';
	if ( ! empty( $terms ) ) {
		foreach ( $terms as $term ) {
			$term_options[ $term->term_id ] = $term->name;
		}
	}

	return $term_options;
}

/** GET TESTIMONIALS*/

function cmb2_get_your_post_type_post_options() {
	return cmb2_get_post_options( array( 'post_type' => 'testimonials', 'numberposts' => -1 ) );
}

/** OUTPUT FILE LIST FOR LOGOS */
function cmb2_output_logo_file_list( $file_list_meta_key, $img_size = 'medium' ) {

	// Get the list of files
	$files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );

	// Loop through them and output an image
	foreach ( (array) $files as $attachment_id => $attachment_url ) {
		echo wp_get_attachment_image( $attachment_id, $img_size );
	}
}

?>