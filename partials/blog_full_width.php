<?php 
	$instance = $template_args['instance']; 
	$posts_have_images = get_post_meta( get_the_ID(), $instance.'_has_images', true );
?>
  
	  <?php
    $args = array( 'post_type' => 'post', 'orderby' => 'post_date','order' => 'DESC','posts_per_page' => 3 );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
  		
  		<?php
      $thumb_url_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'lg', true);
      $thumb_url = $thumb_url_array[0];
    	?>
  		  							
      <article class="hp-post <?php if($posts_have_images == 'no' || empty($posts_have_images)){echo "no-images";}?>">
	      <p class="blog-date"><?php the_time('M\<\b\r\/\>d');?></p>
        <?php if($posts_have_images == 'yes'){ ?><a class="feat-img" style="background-image:url(<?php echo $thumb_url; ?>)" href="<?php the_permalink(); ?>"></a><?php } ?>
        <div class="hp-post-content">
        <?php if (the_title()) : ?>
      	  <h3 class="post-title hp-headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php endif; ?>
          <p><?php echo wp_trim_words(get_the_content(), 30); ?></p>
          <a class="read-more btn outline" href="<?php the_permalink(); ?>">Read More</a>
        </div>
      </article>
  		
  	<?php endwhile; wp_reset_query(); ?>