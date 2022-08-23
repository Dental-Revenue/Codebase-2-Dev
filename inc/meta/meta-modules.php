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
	$modules = $wpdb->get_results( "SELECT * FROM modules WHERE page = ".$current_page." ORDER BY display_order ASC");
	
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
		if ($m->module != "fold_mobile") {
		
		$box->add_field( array(
			'name' => 'Background Color',
			'id' => $prefix.'bg_color',
			'type' => 'colorpicker'
		));
		$box->add_field( array(
			'name' => 'Background Color 2 For Gradient',
			'id' => $prefix.'bg_color_2',
			'type' => 'colorpicker'
		));
		$box->add_field( array(
			'name' => 'Background Image',
			'id' => $prefix.'bg_image',
			'type' => 'file'
		));
		$box->add_field( array(
			'name' => 'Background Image Alt',
			'id' => $prefix.'alt',
			'type' => 'text'
		));
		$box->add_field( array(
			'name' => 'Background Image Opacity',
			'desc' => '1-100',
			'classes' => 'double-rule',
			'id' => $prefix.'bg_image_opacity',
			'type' => 'text'
		));
		
		}
		
		switch ($m->module) {
			
// ===============================================================================
			
			case "static_mini_blocks":
				
				require  __DIR__ . '/modules/static_mini_blocks.php';
				
			break;


// ===============================================================================
				

			case "static_intro_section":
				
				require  __DIR__ . '/modules/static_intro_section.php';

			break;


// ===============================================================================
			
			
			case "carousel_1":
				
				require  __DIR__ . '/modules/carousel_1.php';
				
			break;


// ===============================================================================
			
			
			case "carousel_2":
				
				require  __DIR__ . '/modules/carousel_2.php';
				
			break;
				

// ===============================================================================
			
			
			case "static_big_small":
				
				require  __DIR__ . '/modules/static_big_small.php';
				
			break;
				

// ===============================================================================
			
			
			case "static_big_small_hover":
				
				require  __DIR__ . '/modules/static_big_small_hover.php';
				
			break;


// ===============================================================================
			
			
			case "static_big_big":
				
				require  __DIR__ . '/modules/static_big_big.php';
			
			break;
			

// ===============================================================================
			
			
			case "breaker":
				
				require  __DIR__ . '/modules/breaker.php';
				
			break;
			

// ===============================================================================
			
			
			case "specials_breaker":
				
				require  __DIR__ . '/modules/specials_breaker.php';
				
			break;


// ===============================================================================
			
			
			case "spacer":
				
				require  __DIR__ . '/modules/spacer.php';
				
			break;


// ===============================================================================
			
			
			case "static_block_grid":
				
				require  __DIR__ . '/modules/static_block_grid.php';
				
			break;


// ===============================================================================
			
			
			case "blog_big_small":
				
				require  __DIR__ . '/modules/blog_big_small.php';
				
			break;


// ===============================================================================
			
			
			case "blog_columns":
				
				require  __DIR__ . '/modules/blog_columns.php';
				
			break;


// ===============================================================================
			
			
			case "blog_full_width":
				
				require  __DIR__ . '/modules/blog_full_width.php';
				
			break;
			

// ===============================================================================
			
			
			case "static_image_split":
				
				require  __DIR__ . '/modules/static_image_split.php';
				
			break;
			

// ===============================================================================
			
			
			case "static_image_offset":
				
				require  __DIR__ . '/modules/static_image_offset.php';
				
			break;

// ===============================================================================

			case "logo_scroll":
			
				require  __DIR__ . '/modules/logo_scroll.php';
				
			break;
			

// ===============================================================================

			case "static_blocks_list":
			
				require  __DIR__ . '/modules/static_blocks_list.php';
				
			break;
			

// ===============================================================================


			case "static_photo_list":
			
				require  __DIR__ . '/modules/static_photo_list.php';
				
			break;
			

// ===============================================================================


			case "carousel_3":
			
				require  __DIR__ . '/modules/carousel_3.php';
				
			break;
			

// ===============================================================================


			case "static_image_content":
			
				require  __DIR__ . '/modules/static_image_content.php';
				
			break;
			

// ===============================================================================


			case "static_multiple_col":
			
				require  __DIR__ . '/modules/static_multiple_col.php';
				
			break;
			

// ===============================================================================


			case "static_side_by_side":
			
				require  __DIR__ . '/modules/static_side_by_side.php';
				
			break;
			

// ===============================================================================


			case "static_tabs":
			
				require  __DIR__ . '/modules/static_tabs.php';
				
			break;
			

// ===============================================================================


			case "static_cta_fold":
			
				require  __DIR__ . '/modules/static_cta_fold.php';
				
			break;
			

// ===============================================================================


			case "reviews_testimonials_fold":
			
				require  __DIR__ . '/modules/reviews_testimonials_fold.php';
				
			break;
			

// ===============================================================================


			case "reviews_testimonials_carousel":
			
				require  __DIR__ . '/modules/reviews_testimonials_carousel.php';
				
			break;
			

// ===============================================================================


			case "reviews_google":
			
				require  __DIR__ . '/modules/reviews_google.php';
				
			break;
			

// ===============================================================================


			case "static_4_up":
			
				require  __DIR__ . '/modules/static_4_up.php';
				
			break;
			

// ===============================================================================


			case "static_5_up":
			
				require  __DIR__ . '/modules/static_5_up.php';
				
			break;
			
// ===============================================================================


			case "static_embed":
			
				require  __DIR__ . '/modules/static_embed.php';
	
			break;

// ===============================================================================


			case "reviews_testimonials_grid":
			
				require  __DIR__ . '/modules/reviews_testimonials_grid.php';
				
			break;
			

// ===============================================================================


			case "fold_slider":
			
				require  __DIR__ . '/modules/fold_slider.php';
				
			break;
			

// ===============================================================================


			case "fold_slider_2":
			
				require  __DIR__ . '/modules/fold_slider_2.php';
				
			break;
			

// ===============================================================================


			case "fold_slices":
			
				require  __DIR__ . '/modules/fold_slices.php';
				
			break;
			

// ===============================================================================


			case "fold_boxes":
			
				require  __DIR__ . '/modules/fold_boxes.php';
				
			break;
			

// ===============================================================================


			case "fold_mobile":
			
				require  __DIR__ . '/modules/fold_mobile.php';
				
			break;
			

// ===============================================================================


			case "fold_mobile_2":
			
				require  __DIR__ . '/modules/fold_mobile_2.php';
				
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


add_filter( 'get_user_option_meta-box-order_page', 'cmb_metabox_order' );
function cmb_metabox_order( $order ) {
	
	$current_page = 0;
	if ( isset( $_REQUEST['post'] ) ) {
    $current_page = absint( $_REQUEST['post'] ) ;
	} elseif ( isset( $_REQUEST['post_ID'] ) ) {
    $current_page = absint( $_REQUEST['post_ID'] ) ;
	}	
	
	global $wpdb;
	$result = '';
	$modules = $wpdb->get_results( "SELECT * FROM modules WHERE page = ".$current_page." ORDER BY display_order ASC");
	foreach($modules as $m){
		$result .= $m->id.',';
	}
	$result = rtrim($result,',');
	
    return array(
        'normal' => $result,
    );
}

?>
