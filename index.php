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

						the_post_navigation(
							array(
							'next_text' => '<p class="meta-nav">Next post<svg class="svg-icon" width="24" height="24" aria-hidden="true" role="img" focusable="false" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="m4 13v-2h12l-4-4 1-2 7 7-7 7-1-2 4-4z" fill="currentColor"></path></svg></p>' . '<p class="post-title">%title</p>',
							'prev_text' => '<p class="meta-nav"><svg class="svg-icon" width="24" height="24" aria-hidden="true" role="img" focusable="false" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M20 13v-2H8l4-4-1-2-7 7 7 7 1-2-4-4z" fill="currentColor"></path></svg>Previous post</p>' . '<p class="post-title">%title</p>',
							)
							);
					
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
				<?php cb2_pagination(); ?>
				
				<?php } ?>
					
				
					
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
	
	<?php
		
/*
		echo 'testing';
	global $wpdb;
	$modules = $wpdb->get_results( "SELECT * FROM modules ORDER BY display_order ASC");
	foreach($modules as $m){
		
		//get the module instance
		$instance = $m->id;
		
		//set up defaults
		$classes = '';
		$color = (get_post_meta(get_the_id(),$instance.'_bg_color',true)!='') ? get_post_meta(get_the_id(),$instance.'_bg_color',true) : '#ffffff' ;
		$color2 = get_post_meta(get_the_id(),$instance.'_bg_color_2',true);
		$colorCSS = !empty($color2) ? 'background:linear-gradient('.$color.', '.$color2.');' : 'background-color:'.$color.';';
		$image = wp_get_attachment_image_src( get_post_meta(get_the_id(),$instance.'_bg_image_id',true), 'large' );
		$image_opacity = (get_post_meta(get_the_id(),$instance.'_bg_image_opacity',true)!='') ? (get_post_meta(get_the_id(),$instance.'_bg_image_opacity',true)/100) : 1 ;
		
		$lightness = getColorLightness($color);
		if(!empty($color2)){ 
			$lightness2 = getColorLightness($color2); 
			$lightness = ($lightness+$lightness2)/2;
		}
		
		if($lightness<700){$classes .= 'invert';}
		
		//open the module container
		echo '<div id="i'.$instance.'" class="module '.$m->module.' '.$classes.'" style="'.$colorCSS.'" >';
		
			//insert a background image, if applicable
			if(isset($image) && $image[0]!=''){
				echo "<div class='module-image' style='opacity:".$image_opacity.";'><img src='".$image[0]."' alt='' /></div>";
			}
			
			//action for before the module content
			do_action('before_i'.$instance);
		
			//get the guts of the module
			echo "<div class='module-content'>";
				get_partial('/partials/'.$m->module, [ 'instance' => $m->id ]);
			echo "</div>";
			
			//action for after the module content
			do_action('after_i'.$instance);
		
		//close the module container
		echo '</div>';
		
	}
*/
?>


<?php get_footer(); ?>
