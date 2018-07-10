<?php get_header(); ?>

  <!-- main -->
	<div role="main">	

		<div class="row">

		
			<div class="columns eight">
				
				<?php 
				if(is_single()){ 
					
					if (have_posts()) : while (have_posts()) : the_post(); ?>
						<article <?php post_class(array('single-post','main-content')) ?> id="post-<?php the_ID(); ?>">
							<?php the_content(); ?>
					  </article>	
					<?php endwhile; endif;
					
				}else{
					if (have_posts()) : while (have_posts()) : the_post(); ?>
					  
					  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
					
            <article <?php post_class('index-post') ?> id="post-<?php the_ID(); ?>">
              <a href="<?php the_permalink(); ?>" class="post-thumb" style="background-image:url(<?php echo $image[0]; ?>);"></a>
              <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
              <span class="post-meta"><?php the_time('M j, Y') ?> :: <a href="#"><?php echo get_the_author(); ?></a></span>
              <p><?php echo wp_trim_words(get_the_content(),20); ?></p>
              <a href="<?php the_permalink(); ?>" class="post-more">Read More</a>
            </article>
					
					<?php endwhile; endif; ?>  
				
				<?php } ?>
					
				<hr />
					
			  <?php include (TEMPLATEPATH . '/inc/pagination.php' ); ?>          
				
			</div>
			
			
			<div class="columns four">
				
				<?php get_sidebar(); ?>
				
			</div>
			
		
		</div> <!-- /row -->
			
	</div>


<?php get_footer(); ?>