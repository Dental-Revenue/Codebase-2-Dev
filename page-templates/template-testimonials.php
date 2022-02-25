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
<?php if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; ?>
</div>
		
<div class="interior-testimonials">
<?php
  $args = array( 'post_type' => 'testimonials', 'order' => 'DESC', 'orderby'=> 'post_date', 'posts_per_page' => -1 );
  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) : $loop->the_post();
  $thumb_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
  $thumb_url = $thumb_array['0'];
?>
  <div class="testimonial">
    <div class="testimonial-img">
      <?php if(has_post_thumbnail()){the_post_thumbnail( 'sm-square',array('alt' => get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true) ) );}
      else { ?><img width="120" height="120" src="https://lh5.ggpht.com/-CFYUaGYh6Y8/AAAAAAAAAAI/AAAAAAAAAAA/MWWT48ek100/s128-c0x00000000-cc-rp-mo/photo.jpg" class="attachment-sm-square size-sm-square wp-post-image" alt="<?php the_title(); ?>" /><?php } ?>
    </div>
    <div class="testimonial-text">
      <h3><?php the_title(); ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/layout/g-logo.png" alt="Google Logo" class="g-logo" /></h3>
      <span><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></span>
      <p>5 out of 5 stars</p>
      <p><?php echo get_the_content(); ?></p>
      <?php if(get_post_meta( get_the_ID(), 'meta_testimonial_video', true )){ ?>
      <a href="http://www.youtube.com/watch?v=<?php echo get_post_meta( get_the_ID(), 'meta_testimonial_video', true ); ?>" class="popup-youtube">Watch Video <i class="icon ion-social-youtube-outline"></i></a>
      <?php } ?>
    </div>
  </div>
<?php endwhile; wp_reset_postdata();?>
</div>

<div class="reviews_google-buttons" style="text-align: center;">
<a href="<?php site_ops_google_review_url(); ?>" class="btn solid google" target="_blank" rel="noopener">Leave a Google Review</a>
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