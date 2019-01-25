<?php 
	get_header(); 
	
	$page_sidebar = get_post_meta( get_the_id(), 'standard_sidebar', true );
	$global_sidebar = site_ops_global_sidebar(false);
	$class_row = "row sm"; $class_columns = "columns twelve";
	if($global_sidebar == 'on'){ 
		if($page_sidebar == 'on'){ $class_row = "row"; $class_columns = "columns eight"; }
	}
?>

	<!-- page head -->
  <?php get_template_part( 'partials/page-head' ); ?> 

  <!-- main -->
	<div role="main">	

		<div class="<?php echo $class_row; ?>">

		
			<div class="<?php echo $class_columns; ?>">
				
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
					
			  <?php //include (TEMPLATEPATH . '/inc/pagination.php' ); ?>          
				
			</div>
			
			<?php 
				if($global_sidebar == 'on'){ 
					if($page_sidebar == 'on'){ 
			?>
						<div class="columns four">
							<?php get_sidebar(); ?>
						</div>
			<?php 
					} 
				} 
			?>
		
		</div> <!-- /row -->
			
	</div>


<?php get_footer(); ?>