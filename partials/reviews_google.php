<?php 
	$instance = $template_args['instance']; 
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
	$title = get_post_meta( get_the_ID(), $instance.'_title', true );
?>
<h2 class="<?php echo $headline_style; ?>"><?php echo $title; ?></h2>
  
  <div class="row">
	  
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
					
					<div class="g-box">
				
						<div class="g-panel g-client">
							<a href="<?php echo $company_url; ?>" class="g-panel-img" target="_blank"><img src="<?php echo $company_logo; ?>" alt="<?php echo $company_name; ?>" /></a>
							<div class="g-panel-detail">
								<h3><a href="<?php echo $company_url; ?>" target="_blank"><?php echo $company_name; ?></a></h3>
								<?php
								for ($x = 0; $x < $company_stars_full; $x++) {
									echo '<i class="ion-android-star" aria-hidden="true"></i>';
								} 
								if($company_stars_half!=''){
									echo '<i class="ion-android-star-half" aria-hidden="true"></i>';
								}
								?>
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/layout/g-logo.png" alt="Google Logo" class="g-logo" />
								<p><?php echo $company_stars; ?> out of 5 stars</p>
							</div>
						</div>
						
						<div class="g-panel g-customer">
							<a href="<?php echo $patient_review_url; ?>" class="g-panel-img" target="_blank"><img src="<?php echo $patient_image;?>" alt="<?php echo $patient_name; ?>" /></a>
							<div class="g-panel-detail">
								<h3><a href="<?php echo $patient_review_url; ?>" target="_blank"><?php echo $patient_name; ?></a></h3>
								<?php
								for ($x = 0; $x < $patient_stars_full; $x++) {
									echo '<i class="ion-android-star" aria-hidden="true"></i>';
								} 
								if($patient_stars_half!=''){
									echo '<i class="ion-android-star-half" aria-hidden="true"></i>';
								}
								?>
								<p><?php echo $patient_stars; ?> out of 5 stars</p>
							</div>
							<p class="g-customer-excerpt"><?php echo wp_trim_words($patient_review,60); ?></p>
						</div>
				
					</div>
					
				<?php }
				if($counter>2){ break; }
			}
		} ?>
		
		<div class="reviews_google-buttons">
			<a href="<?php site_ops_google_review_url(); ?>" class="btn solid google" target="_blank">Leave a Google Review</a>
			<?php $page = get_pages(array('meta_key' => '_wp_page_template','meta_value' => 'page-templates/template-testimonials.php')); ?>
			<?php if(isset($page[0]->ID)){ ?><a href="<?php echo get_permalink($page[0]->ID); ?>" class="btn solid">View More Reviews</a><?php } ?>
		</div>
  
  </div>