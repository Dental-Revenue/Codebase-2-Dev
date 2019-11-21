<?php 
	$instance = $template_args['instance']; 
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
	$title = get_post_meta( get_the_ID(), $instance.'_title', true );
?>
<h2 class="<?php echo $headline_style; ?>"><?php echo $title; ?></h2>
  
  <div class="row">
	  
			<?php
			$args = array( 'post_type' => 'testimonials', 'order' => 'DESC', 'orderby'=> 'post_date', 'posts_per_page' => -1 );
		  $loop = new WP_Query( $args );
		  $i = 1;
		  while ( $loop->have_posts() && $i < 4) : $loop->the_post();
		  $thumb_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
		  $thumb_url = $thumb_array['0'];
		  $option = get_option('practice_info');
			?>
			
			<div class="g-box">
				<div class="g-panel g-client">
					<a href="<?php echo site_url(); ?>" class="g-panel-img" target="_blank"><img src="https://maps.gstatic.com/mapfiles/place_api/icons/generic_business-71.png" alt="<?php echo $option['practice_name']; ?>" /></a>
					<div class="g-panel-detail">
						<h3><a href="<?php echo site_url(); ?>" target="_blank"><?php echo $option['practice_name']; ?></a></h3>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/layout/g-logo.png" alt="Google Logo" class="g-logo" />
					</div>
				</div>
				<div class="g-panel g-customer">
					<a href="<?php echo site_url(); ?>" class="g-panel-img" target="_blank">
					<?php if(has_post_thumbnail()){the_post_thumbnail( 'sm-square',array('alt' => get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true) ) );}
      else { ?><img width="120" height="120" src="https://lh5.ggpht.com/-CFYUaGYh6Y8/AAAAAAAAAAI/AAAAAAAAAAA/MWWT48ek100/s128-c0x00000000-cc-rp-mo/photo.jpg" class="attachment-sm-square size-sm-square wp-post-image" alt="<?php the_title(); ?>" /><?php } ?>
					</a>
					<div class="g-panel-detail">
						<h3><a href="<?php echo site_url(); ?>" target="_blank"><?php the_title(); ?></a></h3>
						<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
						<p>5 out of 5 stars</p>
					</div>
					<p class="g-customer-excerpt"><?php echo wp_trim_words(get_the_content(),60); ?></p>
				</div>
			</div>
			
			<?php $i++; endwhile; wp_reset_postdata();?>
			
			<div class="reviews_google-buttons">
			<a href="<?php site_ops_google_review_url(); ?>" class="btn solid google" target="_blank">Leave a Google Review</a>
			<?php $page = get_pages(array('meta_key' => '_wp_page_template','meta_value' => 'page-templates/template-testimonials.php')); ?>
			<?php if(isset($page[0]->ID)){ ?><a href="<?php echo get_permalink($page[0]->ID); ?>" class="btn solid">View More Reviews</a><?php } ?>
			</div>
  
  </div>
