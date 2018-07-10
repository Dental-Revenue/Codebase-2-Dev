<?php get_header(); ?>

	<!-- page head -->
  <?php get_template_part( 'partials/page-head' ); ?> 	

	<!-- main -->
	<div role="main">	
		<div class="row">
		
			<div class="columns eight">
				<div class="main-content">
				  <p>We're sorry, we can't find what you were looking for. <br />Try returning <a href="/">home</a>, or searching below</p>
				  <?php get_search_form(); ?>
				  <script type="text/javascript">
				    document.getElementById('s') && document.getElementById('s').focus();
				  </script>
				</div>                
			</div>
			
			<div class="columns four">
				<?php get_sidebar(); ?>
			</div>
		
		</div>
	</div>

<?php get_footer(); ?>