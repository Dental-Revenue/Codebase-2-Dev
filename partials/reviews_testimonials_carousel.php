<?php 
	$instance = $template_args['instance']; 
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
	$raw_title = get_post_meta(get_the_id(),$instance.'_headline',true);
	$maintitle = str_replace(array('(',')'), array("<h2 class='$headline_style'>","</h2>"),$raw_title);
	$subtitle = str_replace(array('{','}'), array('<h3>','</h3>'),$maintitle);
	$title = str_replace(array('[',']'), array('<p>','</p>'),$subtitle);
?>
<div class="section-title"><?php echo $title; ?></div>
<div class="row">
	
	<div class="row">
    <div class="slick-init slick-reviews_testimonials_carousel">
      
     <?php
	    $tests = get_post_meta(get_the_id(),$instance.'_testimonials',true);
      $args = array( 'post_type' => 'testimonials', 'p' => $tests, 'order' => 'ASC', 'orderby'=> 'menu_order' );
      $loop = new WP_Query( $args );
      while ( $loop->have_posts() ) : $loop->the_post(); ?>
            
        <div class="textslider-item">
          <?php if(has_post_thumbnail()){
	          $post_id = get_the_ID();
            the_post_thumbnail( 'sm-square',array('alt' => get_post_meta(get_post_thumbnail_id($post_id), '_wp_attachment_image_alt', true) ) );
          } ?>
          <p><?php echo get_the_content(); ?></p>
          <div>
            <span><?php the_title(); ?></span>
            <?php if(get_post_meta( get_the_id(), 'meta_testimonial_video', true )){ ?>
              <em>|</em><a href="http://www.youtube.com/watch?v=<?php echo get_post_meta( get_the_id(), 'meta_testimonial_video', true ); ?>" class="popup-youtube">Watch Video <i class="fab fa-youtube"></i></a>
            <?php } ?>
          </div>
        </div>
      
      <?php endwhile; wp_reset_postdata(); ?>
      
    </div>
  </div>
	
</div>
