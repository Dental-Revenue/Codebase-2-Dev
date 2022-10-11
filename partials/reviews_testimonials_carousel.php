<?php $instance = $template_args['instance'];
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style']; ?>
  
<div class="row">
	<?php
  $headline = get_post_meta(get_the_id(),$instance.'_headline',true);
  $subtitle = get_post_meta(get_the_ID(), $instance.'_subtitle', true);
  ?>
    <?php if ($headline) : ?>
      <h2 class="<?php echo $headline_style; ?>"><?php echo $headline; ?></h2>
    <?php endif; ?>
    <?php if ($subtitle) : ?>
      <p class="rtf-subtitle <?php echo $headline_style; ?>"><?php echo $subtitle; ?></p>
    <?php endif; ?>
</div>
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