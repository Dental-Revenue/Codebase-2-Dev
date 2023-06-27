<?php
	global $wpdb;
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
		$image_atf = wp_get_attachment_image_src( get_post_meta(get_the_id(),$instance.'_bg_image_id',true), 'xxl' );
		$image_xxl = wp_get_attachment_image_src( get_post_meta(get_the_id(),$instance.'_bg_image_id',true), 'xxl' );
		$image_xl = wp_get_attachment_image_src( get_post_meta(get_the_id(),$instance.'_bg_image_id',true), 'xl' );
	  	$image_lg = wp_get_attachment_image_src( get_post_meta(get_the_id(),$instance.'_bg_image_id',true), 'lg' );
	  	$image_alt = get_post_meta(get_the_id(),$instance.'_alt',true);
		$image_opacity = (get_post_meta(get_the_id(),$instance.'_bg_image_opacity',true)!='') ? (get_post_meta(get_the_id(),$instance.'_bg_image_opacity',true)/100) : 1 ;
		$lightness = getColorLightness($color);
		$overlap = get_post_meta(get_the_ID(), $instance.'_overlap', true);
		$bottom_margin = get_post_meta(get_the_ID(), $instance.'_bottom_margin', true);
		

		
		if(!empty($color2)){ 
			$lightness2 = getColorLightness($color2); 
			$lightness = ($lightness+$lightness2)/2;
		}
		
		if($lightness<700){$classes .= 'invert';}

		if($m->module == "reviews_testimonials_grid" && !empty($overlap)){echo '<div id="i'.$instance.'" class="module '.$m->module.' '.$classes.'" style="'.$colorCSS.' top:'.$overlap.'; width: 80%; margin: 0 auto; margin-bottom:'. $bottom_margin .'" >';}
		if($m->module == "static_image_split" && !empty($overlap)){echo '<div id="i'.$instance.'" class="module '.$m->module.' '.$classes.'" style="'.$colorCSS.' top:'.$overlap.'; width: 80%; margin: 0 auto; margin-bottom:'. $bottom_margin .'" >';}
		if($m->module == "static_blocks_list" && !empty($overlap)){echo '<div id="i'.$instance.'" class="module '.$m->module.' '.$classes.'" style="'.$colorCSS.' top:'.$overlap.'; width: 80%; margin: 0 auto; margin-bottom:'. $bottom_margin .'" >';}
		if($m->module == "static_image_offset" && !empty($overlap)){echo '<div id="i'.$instance.'" class="module '.$m->module.' '.$classes.'" style="'.$colorCSS.' top:'.$overlap.'; width: 80%; margin: 0 auto; margin-bottom:'. $bottom_margin .'" >';}

		//open the module container
		else {echo '<div id="i'.$instance.'" class="test module '.$m->module.' '.$classes.'" style="'.$colorCSS.'" >';}
		
			//insert a background image, if applicable
			if(isset($image_lg) && $image_lg[0]!=''){ ?>
				<div class='module-image' style='opacity:<?php echo $image_opacity; ?>;'>
					<img alt="<?php if (isset($image_alt) && $image_alt!=''){ echo $image_alt; } else { echo 'Background Image'; } ?>" src="<?php echo $image[0]; ?>" />
				</div>
			<?php }
			
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
