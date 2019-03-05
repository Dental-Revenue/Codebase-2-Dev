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
	
	
	<?php
	global $wpdb;
	global $post;
	$modules = $wpdb->get_results( "SELECT * FROM modules ORDER BY display_order ASC");
	foreach($modules as $m){
		if(get_the_id() == $m->page){
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
	}
?>



<?php get_footer(); ?>