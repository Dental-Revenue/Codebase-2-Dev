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
				<div class="main-content">
				  <?php if (have_posts()) : while (have_posts()) : the_post();
					  the_content();
          endwhile; endif; ?>
				</div>                
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
		
		</div>
			
	</div>
	
	
	<?php get_partial('/partials/module_loop'); ?>

<?php get_footer(); ?>