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
		if(!empty($color2)){ 
			$lightness2 = getColorLightness($color2); 
			$lightness = ($lightness+$lightness2)/2;
		}
		
		if($lightness<700){$classes .= 'invert';}
		
		//open the module container
		echo '<div id="i'.$instance.'" class="module '.$m->module.' '.$classes.'" style="'.$colorCSS.'" >';
		
			//insert a background image, if applicable
			if(isset($image_lg) && $image_lg[0]!=''){ ?>
				<div class='module-image' style='opacity:<?php echo $image_opacity; ?>;'>
					<img alt="<?php if (isset($image_alt) && $image_alt!=''){ echo $image_alt; } else { echo 'Background Image'; } ?>" src="<?php echo $image_atf[0]; ?>" srcset="<?php echo $image_lg[0]; ?> 500w, <?php echo $image_xl[0]; ?> 700w, <?php echo $image_xxl[0]; ?> 1300w, <?php echo $image_atf[0]; ?> 3000w" sizes="100vw,(min-width: 300px) 700px,(min-width: 700px) 1300px,(min-width: 1300px) 1800px" />
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
