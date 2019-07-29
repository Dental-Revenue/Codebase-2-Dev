<?php 
	global $post;
	$instance = $template_args['instance']; 
	$raw_headline = get_post_meta(get_the_id(),$instance.'_title',true);
	$title = str_replace(array('{','}'), array('<span>','</span>'),$raw_headline);
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style']; 
	$color = (get_post_meta(get_the_id(),$instance.'_bg_color',true)!='') ? get_post_meta(get_the_id(),$instance.'_bg_color',true) : '#ffffff' ;
?>
<h2 class="<?php echo $headline_style; ?>" style="background-color:<?php echo $color; ?>"><?php echo $title; ?></h2>

<div class="slick-init slick-reviews_testimonials_fold">
  
  <?php
  $args = array( 'post_type' => 'testimonials', 'order' => 'ASC', 'orderby'=> 'menu_order', 'posts_per_page' => -1 );
  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) : $loop->the_post(); ?>
  
  	<?php	
    $video = get_post_meta( get_the_ID(), 'testimonial_video', true );
    $services = get_post_meta( get_the_ID(), 'testimonial_service', true );
    ?>
        
    <div class="reviews_testimonials_fold-item <?php if(has_post_thumbnail()){ echo 'has-thumb'; } ?>" >
      
      
      	<?php if(has_post_thumbnail()){ ?>
      	
      		<?php
      		$img_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
					$img_url = $img_array[0];
					?>
      	
      	  <div class="reviews_testimonials_fold-overlay" style="background-image: url(<?php echo $img_url; ?>);"></div>
      	  <div class="reviews_testimonials_fold-thumb">
      	    <?php the_post_thumbnail( 'lg-square',array('alt' => get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true) ) ); ?>
      	    <?php if($video && $video!=''){ ?>
      	    	<a href="http://www.youtube.com/watch?v=<?php echo $video; ?>" class="popup-youtube"><i class="ion-social-youtube" aria-hidden="true"></i></a>
      	    <?php } ?>
      	  </div>
      	<?php } ?>
      	
      	<div class="reviews_testimonials_fold-text">
        	<h3><?php echo get_the_title(); ?></h3>
        	<p><?php echo wp_trim_words( get_the_content(), 120, "..." ); ?></p>
        	<?php if($services && $services!=''){ ?>
        		<h4>What we did</h4>
						<p><?php echo $services; ?></p>
					<?php } ?>
      	</div>
      
      </div>
      
  
  <?php endwhile; wp_reset_query(); ?>
      
</div>

<?php $page = get_pages(array('meta_key' => '_wp_page_template','meta_value' => 'page-templates/template-testimonials.php')); ?>
<?php if($page && $page!=''){ ?> <a class="reviews_testimonials_fold-view-all btn on-light" href="<?php echo get_permalink($page[0]->ID); ?>">View All Testimonials</a> <?php } ?>
