<?php
/*
Template Name: Gallery - Scroll Style
*/
?>

<?php get_header(); ?>
	
	<!-- page head -->
  <?php get_template_part( 'partials/page-head' ); ?> 

	<!-- main -->
	<div role="main">	
		<div class="row">
				
				<?php 
			   $gallery_items = get_post_meta(get_the_id(),'gallery_repeat_group',true); 
			   if(!empty($gallery_items)){
				?>
				
				<div class="g-scroll-contain">

		    	<div class="main-content">
		    	  <?php if (have_posts()) : while (have_posts()) : the_post();
		    	    the_content();
        	  endwhile; endif; ?>
		    	</div>
		    	
		    	<div class="slick-g-scroll">
        	
        		  <?php 
	        		  foreach($gallery_items as $item){
								$gallery_img_1 = $gallery_img_2 = $gallery_desc = $feat_type = $headshot= $headshot_id = $gallery_name = '';
								if(isset($item['name'])){ $gallery_name = $item['name']; }
								if(isset($item['desc'])){ $gallery_desc = $item['desc']; }
								if(!empty($item['img_1'])){ 
									$gallery_img_1_id = $item['img_1_id']; 
									$gallery_img_1 = wp_get_attachment_image_src( $gallery_img_1_id, 'lg-square' ); 
									$feat_type = 'portrait';
								}
								if(!empty($item['img_2'])){ 
									$gallery_img_2_id = $item['img_2_id']; 
									$gallery_img_2 = wp_get_attachment_image_src( $gallery_img_2_id, 'lg-square' ); 
									$feat_type = 'ba';
								} 
								if(!empty($item['headshot'])){ 
									$headshot_id = $item['headshot_id'];
									$headshot = wp_get_attachment_image_src( $headshot_id, 'lg' );  
								}
							?>
	        		  
        		  <div class="g-scroll-slide <?php echo $feat_type; ?>">
        					
	      	  			<?php 
	      	  			  if(!empty($headshot)){ 
		      	  			  echo '<div class="headshot"><img src="'.$headshot[0].'"></div>';
		      	  			  echo '<div class="headshot-content">'; 
											if(!empty($gallery_img_2)){ echo '<img src="'.$gallery_img_2[0].'">'; }
	      	  			  	if(!empty($gallery_img_1)){ echo '<img src="'.$gallery_img_1[0].'">';	}
											if(!empty($gallery_name)){ echo '<h3>'.$gallery_name.'</h3>'; }
											if(!empty($gallery_desc)){ echo '<p>'.$gallery_desc.'</p>'; }
		      	  			  echo '</div>';
		      	  			  
		      	  			} else {
											if(!empty($gallery_img_2)){ echo '<img src="'.$gallery_img_2[0].'">'; }
	      	  			  	if(!empty($gallery_img_1)){ echo '<img src="'.$gallery_img_1[0].'">';	}
											if(!empty($gallery_name)){ echo '<h3>'.$gallery_name.'</h3>'; }
											if(!empty($gallery_desc)){ echo '<p>'.$gallery_desc.'</p>'; }
										}
	      	  			?>
	      	  			
        		  </div>
        		
        		<?php } ?>   
	
		    	</div>
		  	</div>
				<?php } else { echo 'No Gallery Items Present'; } ?>
		</div>
	</div>
	
<?php get_footer(); ?>