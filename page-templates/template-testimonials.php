<?php
/*
Template Name: Testimonials 
*/
?>

<?php get_header(); ?>
	
	<!-- page head -->
  <?php get_template_part( 'partials/page-head' ); ?> 

	<!-- main -->
	<div role="main" class="testimonials-template">	
		<div class="row">

		  <div class="columns eight">
				
				<div class="main-content">
				  <?php if (have_posts()) : while (have_posts()) : the_post();
					  the_content();
          endwhile; endif; ?>
				</div>   				
				
				<div class="interior-testimonials">
					 <?php
						$place_id = getOption('practice_info');
						$place_id = $place_id['google_place_id'];
						
						if(!$place_id || $place_id==''){
							echo "Set Place ID in Theme Settings";
						}else{
						
							$jsonurl = "https://maps.googleapis.com/maps/api/place/details/json?placeid=$place_id&key=AIzaSyD7dIa6edUzrhrYIrwXDab2B0nfF56om5w";
							$json = file_get_contents($jsonurl);
							$json = json_decode($json);
							
							//echo '<pre>'.$json.'</pre>';
							//var_dump($json);
							
							$company_name = $json->result->name;
							$company_url = $json->result->url;
							$company_logo = $json->result->icon;
							$company_stars = $json->result->rating;
								$company_stars_array = explode(".", $company_stars);
								$company_stars_full = $company_stars_array[0];
								$company_stars_half = count($company_stars_array) > 1 ? $company_stars_array[1] : '';
							
							$reviews = $json->result->reviews;
							$counter = 0;
							
							foreach ($reviews as $review){
								if($review->rating>4){
									$counter++;
									$patient_name = $review->author_name;
									$patient_review_url = $review->author_url;
									$patient_image = $review->profile_photo_url;
									$patient_stars = $review->rating;
										$patient_stars_array = explode(".", $patient_stars);
										$patient_stars_full = $patient_stars_array[0];
										$patient_stars_half = count($patient_stars_array) > 1 ? $patient_stars_array[1] : '';
									$patient_review = $review->text; ?>
									
									
									<div class="testimonial">
			              <div class="testimonial-img">
			              <?php if($patient_image != ''){ ?>
			                <a href="<?php echo $patient_review_url; ?>" class="g-panel-img" target="_blank"><img src="<?php echo $patient_image;?>" alt="<?php echo $patient_name; ?>" /></a>
			              <?php }else{ ?>
			                <i class="icon ion-ios-chatboxes-outline"></i>
			              <?php } ?>
			              </div>
			              <div class="testimonial-text">
			                <h3><a href="<?php echo $patient_review_url; ?>" target="_blank"><?php echo $patient_name; ?></a> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/layout/g-logo.png" alt="Google Logo" class="g-logo" /></h3>
			                <p><?php echo $patient_stars; ?> out of 5 stars</p>
			                <p><?php echo wp_trim_words($patient_review,60); ?></p>
			              </div>
			            </div>
									
									
								<?php }
								if($counter>2){ break; }
							}
						} ?>
					
					
					 				
  				<?php
          $args = array( 'post_type' => 'testimonials', 'order' => 'ASC', 'orderby'=> 'menu_order', 'posts_per_page' => -1 );
          $loop = new WP_Query( $args );
          while ( $loop->have_posts() ) : $loop->the_post();
    
            $thumb_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
            $thumb_url = $thumb_array['0'];
            ?>
    
            <div class="testimonial">
              <div class="testimonial-img">
              <?php if(has_post_thumbnail()){
                the_post_thumbnail( 'sm-square',array('alt' => get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true) ) );
              }else{ ?>
                <i class="icon ion-ios-chatboxes-outline"></i>
              <?php } ?>
              </div>
              <div class="testimonial-text">
                <h3><?php the_title(); ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/layout/g-logo.png" alt="Google Logo" class="g-logo" /></h3>
                <p><?php echo get_the_content(); ?></p>
                <?php if(get_post_meta( get_the_ID(), 'meta_testimonial_video', true )){ ?>
                  <a href="http://www.youtube.com/watch?v=<?php echo get_post_meta( get_the_ID(), 'meta_testimonial_video', true ); ?>" class="popup-youtube">Watch Video <i class="icon ion-social-youtube-outline"></i></a>
                <?php } ?>
              </div>
            </div>
      
          <?php endwhile; ?>
  				
				</div>
				
			</div> 
			
			<div class="columns four">
				<?php get_sidebar(); ?>
			</div>               

		</div>
	</div>
	
	<!-- horizontal rule -->
	<hr class="row" />

<?php get_footer(); ?>