<?php
/*
Template Name: Gallery #1
*/
?>

<?php get_header(); ?>

	<!-- page head -->
  <?php get_template_part( 'partials/page-head' ); ?>

	<!-- main -->
  <div role="main">	
  	<div id="gallery-1" class="row">
	  	
	  	<?php //get image sets and start loop
		  $image_sets = get_post_meta( get_the_ID(), 'g1_image_sets', true );
		  foreach ( (array) $image_sets as $index => $set ) { ?>
		  
		  	<?php //get details about this image set
			  $primary_image_type = $set['primary_image'];
			  $lightbox_image_type = $set['lighbox_image'];
			  ?>
			  
		  	<div class="gallery-1-image-set f-all">
		  	
		  		<a href="#g1-lightbox-<?php echo $index; ?>" class="g1-primary-image <?php echo $primary_image_type; ?>">
		  			<?php if($primary_image_type=='hero'){
			  			//use hero medium image
		  			}else if($primary_image_type=='ba'){
			  			//use two thumb stitches
		  			}?>
		  		</a>
		  		
		  		<div id="g1-lighbox-<?php echo $index; ?>" class="g1-lightbox-image <?php echo $lightbox_image_type; ?>">
			  		<?php if($lightbox_image_type=='default'){
			  			//use the xl version of the primary image
		  			}else if($lightbox_image_type=='hero'){
			  			//use hero xl image
		  			}else if($lightbox_image_type=='ba'){
			  			//use two large stitches
		  			}?>
		  		</div>
		  	
		  	</div>

		  <?php } ?>
		  
		  
	  	
  	</div>
  </div>
  
<?php get_footer(); ?>  







  <?php
/*
Template Name: Smile Gallery
*/
?>

<?php get_header(); ?>
	
	<!-- page head -->
  <?php get_template_part( 'partials/page-head' ); ?> 

	<!-- main -->
	<div role="main">	
		<div class="row">
			
			
			
			
			
				<div class="sg-cont">

		    	<div class="main-content">
		    	  <?php if (have_posts()) : while (have_posts()) : the_post();
		    	    the_content();
        	  endwhile; endif; ?>
		    	</div>
		    
					<?php global $filters; if(count($filters)>0){ ?>
					<div class="sg-filters">
					  <a href="#" class="active" data-filter=".f-all">All</a>
					  <?php foreach($filters as $key => $filter){ ?>
					    <a href="#" data-filter=".f-<?php echo sanitize_title($filter); ?>"><?php echo $filter; ?></a>
					  <?php } ?>
					  <?php if( current_user_can('edit_others_pages') ) { ?>
						  <a href="#" data-filter=".f-uncategorized">Uncategorized</a>
					  <?php } ?>
					</div>
					<?php } ?>
		    
					<div class="sg-grid">
					  <div class="sg-sizer"></div>
					  
					  <?php
					  $args = array( 'post_type' => 'smile_gallery', 'order' => 'ASC', 'posts_per_page' => -1 );
					  $loop = new WP_Query( $args );
					  while ( $loop->have_posts() ) : $loop->the_post();
					  if(!get_post_meta($post->ID, 'meta_smile_gallery_before_id', true) && !has_post_thumbnail()){ //make sure this isn't a v2
					  ?>
					  
					    <?php
					    $patient_filters = get_post_meta($post->ID, 'meta_patient_categories', true);
					    $patient_text = get_post_meta($post->ID, 'meta_patient_text', true);            
					    $patient_primary_id = get_post_meta($post->ID, 'meta_patient_primary_id', true);
					    $patient_stitch_id = get_post_meta($post->ID, 'meta_patient_stitch_id', true);
					    
					    if($patient_stitch_id && $patient_stitch_id!=''){
					      $patient_primary_array = wp_get_attachment_image_src( $patient_primary_id, 'sg-stitch' );
					      $patient_stitch_array = wp_get_attachment_image_src( $patient_stitch_id, 'sg-stitch' );
					      $patient_stitch_url = $patient_stitch_array['0'];
					      $patient_stitch_alt = get_post_meta( $patient_stitch_id, '_wp_attachment_image_alt', true);
					      $feat_type = 'ba';
					    }else{
					      $patient_primary_array = wp_get_attachment_image_src( $patient_primary_id, 'sg-primary' );
					      $feat_type = 'portrait';
					    }
					    $patient_primary_url = $patient_primary_array['0'];
					    $patient_primary_alt = get_post_meta( $patient_primary_id, '_wp_attachment_image_alt', true);
					  
					    $lightbox_photos = get_post_meta($post->ID, 'meta_lightbox_group', true);
					
					    ?>
					  
					  
					    <div class="sg-grid-item f-all <?php echo $feat_type; ?> <?php if($patient_filters && $patient_filters!=''){foreach($patient_filters as $key=>$filter){echo 'f-'.sanitize_title($filter).' ';}} if(empty($patient_filters)){ echo "f-uncategorized"; } ?> ">
						
						    <a href="#" class="sg-patient" data-images="<?php if($lightbox_photos){foreach((array) $lightbox_photos as $key => $entry ){ echo '#img'.$entry['lightbox_primary_id'].' '; }}else{echo '#img'.$patient_primary_id;} ?>">
						    	
						    	<span class="overlay"></span>
						    	
						      <img src="<?php echo $patient_primary_url; ?>" alt="<?php echo $patient_primary_alt; ?>" />
						      <?php if($feat_type=='ba'){ ?>  
						        <img src="<?php echo $patient_stitch_url; ?>" alt="<?php echo $patient_stitch_alt; ?>" />
						      <?php } ?>
						      
						      <?php if($patient_text && $patient_text!=''){ ?>
						        <span class="excerpt"><?php echo $patient_text; ?></span>
						      <?php } ?>
						      
					      </a>
					      
					      <?php if( current_user_can('edit_others_pages') ) { echo "<p><a href='".get_edit_post_link()."' target='_blank'>Edit Patient</a></p>"; } ?>
					  
					      <div class="sg-lightbox-images mfp-hide">
						      <?php if(is_array($lightbox_photos)){
							      
							      foreach((array) $lightbox_photos as $key => $entry ) {
					            if(array_key_exists('lightbox_stitch_id',$entry) && $entry['lightbox_stitch_id']!=''){
					              //this is a set
					              $lightbox_primary_array = wp_get_attachment_image_src( $entry['lightbox_primary_id'], 'sg-stitch-md' );
					              $lightbox_stitch_array = wp_get_attachment_image_src( $entry['lightbox_stitch_id'], 'sg-stitch-md' );
					              echo "<div class='sg-lightbox-set' id='img".$entry['lightbox_primary_id']."'>"."<img src='about:blank' data-src='".$lightbox_primary_array[0]."' />"."<img src='about:blank' data-src='".$lightbox_stitch_array[0]."' /></div>";
					            }else{
					              //this is a single
					              $lightbox_primary_array = wp_get_attachment_image_src( $entry['lightbox_primary_id'], 'sg-primary-md' );
					              echo "<div class='sg-lightbox-single' id='img".$entry['lightbox_primary_id']."'>"."<img src='about:blank' data-src='".$lightbox_primary_array[0]."' /></div>";
					            }
					          }
					        }else{
					          //this is if there are no additional images, just show the feature bigger
					          if($feat_type=='ba'){
					            echo "<div class='sg-lightbox-set' id='img".$patient_primary_id."'>"."<img src='about:blank' data-src='".$patient_primary_url."' />"."<img src='about:blank' data-src='".$patient_stitch_url."' /></div>";
					          }else{
					            $patient_primary_lg_array = wp_get_attachment_image_src( $patient_primary_id, 'sg-primary-lg' );
					            echo "<div class='sg-lightbox-single' id='img".$patient_primary_id."'>"."<img src='about:blank' data-src='".$patient_primary_lg_array[0]."' /></div>";
					          }
					        } ?>
					      </div>
					  
					    </div>
  		    
						<?php } endwhile; ?>
  		    
		    	</div>
		    
		  	</div>
			

			               

		</div>
	</div>