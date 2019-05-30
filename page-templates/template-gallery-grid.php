<?php
/*
Template Name: Gallery - Grid Style
*/
?>

<?php get_header(); ?>
	
	<!-- page head -->
  <?php get_template_part( 'partials/page-head' ); ?> 

	<!-- main -->
	<div role="main">	
		<div class="row">
			
				<div class="g-grid-cont">

		    	<div class="main-content">
		    	  <?php if (have_posts()) : while (have_posts()) : the_post();
		    	    the_content();
        	  endwhile; endif; ?>
		    	</div>
		    	
		    	<?php 
			    	$gallery_items = get_post_meta(get_the_id(),'gallery_repeat_group',true); 
			    	if(!empty($gallery_items)){
				    	$filter_array = array();
				    	foreach($gallery_items as $item){
					    	if(!empty($item['tags'])){ array_push($filter_array, $item['tags']); }
					    } 
				    	if(!empty($filter_array)){
		    	?>
					    	<div class="g-grid-filters">
								  <a href="#" class="active" data-filter=".f-all">All</a>
								  <?php 
									  $filter_array = array();
									  foreach($gallery_items as $item){
											$filters = '';		
											if(isset($item['tags'])){ $filters = $item['tags']; } 
											foreach($filters as $filter){ 
												if(!in_array($filter, $filter_array)){ array_push($filter_array, $filter); }
											} 
										} 
										
										foreach($filter_array as $filter){ ?>
											<a href="#" data-filter=".f-<?php echo sanitize_title($filter); ?>"><?php echo $filter; ?></a>
										<?php } ?>
								</div>
		    	<?php } ?>
		    	<div class="g-grid-grid">
					  <div class="g-grid-sizer"></div>
					  <?php $gallery_count = 1; foreach($gallery_items as $item){
							
							$gallery_img_1 = $gallery_img_2 = $gallery_desc = $feat_type = $filters = '';
							
							if(isset($item['desc'])){ $gallery_desc = $item['desc']; }
							
							if(isset($item['tags'])){ $filters = $item['tags']; }
							
							if(isset($item['img_1'])){ 
								$gallery_img_1_id = $item['img_1_id']; 
								$gallery_img_1 = wp_get_attachment_image_src( $gallery_img_1_id, 'sg-stitch' ); 
								$feat_type = 'portrait';
							}
							
							if(isset($item['img_2']) && $item['img_2']!=''){ 
								$gallery_img_2_id = $item['img_2_id']; 
								$gallery_img_2 = wp_get_attachment_image_src( $gallery_img_2_id, 'sg-stitch' ); 
								$feat_type = 'ba';
							} ?>
							
							<div class="g-grid-grid-item f-all <?php echo $feat_type; if(!empty($filters)){foreach($filters as $filter){echo ' f-'.sanitize_title($filter);}} ?>">
								
								<a href="#" class="g-grid-patient" data-images="<?php echo '#img'.$gallery_img_1_id; ?>">
									
									<span class="overlay"></span>
									
									<img src="<?php echo $gallery_img_1[0]; ?>" alt="<?php echo 'Main Gallery Image '.$gallery_count.' | '.get_the_title(); ?>" />
						      
						      <?php if($feat_type=='ba'){ ?>  
						        <img src="<?php echo $gallery_img_2[0]; ?>" alt="<?php echo 'Secondary Gallery Image '.$gallery_count.' | '.get_the_title(); ?>" />
						      <?php } ?>
						      
						      <?php if(!empty($gallery_desc)){ ?>
						        <span class="excerpt"><?php echo $gallery_desc; ?></span>
						      <?php } ?>
						      
					      </a>
					      
					      <div class="g-grid-lightbox-images mfp-hide">
						      <?php if($feat_type=='ba'){
						            echo "<div class='g-grid-lightbox-set' id='img".$gallery_img_1_id."'>"."<img src='about:blank' data-src='".$gallery_img_1[0]."' />"."<img src='about:blank' data-src='".$gallery_img_2[0]."' /></div>";
						          }else{
						            $gallery_img_1_lg = wp_get_attachment_image_src( $gallery_img_1_id, 'g-grid-primary-lg' );
						            echo "<div class='g-grid-lightbox-single' id='img".$gallery_img_1_id."'>"."<img src='about:blank' data-src='".$gallery_img_1_lg[0]."' /></div>";
						          } ?>
					      </div>
							</div>
						<?php $gallery_count++; } ?>
		    	</div>
		    </div>
		  <?php } else { echo 'No Gallery Items Present'; } ?>
		  </div>
		
		</div>
	</div>
	
<?php get_footer(); ?>