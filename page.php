<?php get_header(); ?>
	
	<!-- page head -->
  <?php get_template_part( 'partials/page-head' ); ?> 

	<!-- main -->
	<div role="main">	

		<div class="row">
		
			<div class="columns eight">
				<div class="main-content">
				  <?php if (have_posts()) : while (have_posts()) : the_post();
					  the_content();
          endwhile; endif; ?>
				</div>                
			</div>
			
			<div class="columns four">
				<?php get_sidebar(); ?>
			</div>
		
		</div>
			
	</div>

<?php get_footer(); ?>