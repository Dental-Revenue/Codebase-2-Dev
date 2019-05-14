<?php $instance = $template_args['instance']; ?>

<div class="static_tabs-left">
	<ul class="nav nav-tabs" role="tablist">
		<?php $items = get_post_meta( get_the_ID(), $instance.'_items', true );
		$counter = 1;
		foreach ( (array) $items as $key => $item ) {
			$item_title = ''; //$item_link = $item_link_title
			if($counter == 1){ $active = 'class="active"'; } else { $active = '';}
		  if(isset($item['title'])){ $item_title = $item['title']; }	
			
			
			echo "<li><a href='#tab".$counter."-".$instance."'".$active." data-toggle='tab'>".$item_title."</a></li>";
			$counter++;
		} ?>
	</ul>
</div>


<div class="static_tabs-right">

	<?php $items = get_post_meta( get_the_ID(), $instance.'_items', true );
	$counter = 1;
	foreach ( (array) $items as $key => $item ) {
		$item_title = $item_img = $item_darkness = $item_link = $item_link_title = $item_excerpt = ''; 
		if(isset($item['title'])){ $item_title = $item['title']; }
		if(isset($item['image'])){ $item_img_id = $item['image_id']; }
		if(isset($item['image'])){ $item_img = wp_get_attachment_image_src( $item_img_id, 'xxl' ); }
		if(isset($item['darkness'])){ $item_darkness = $item['darkness']; }
		
		if(isset($item['link'])){ $item_link = get_permalink($item['link']); }
		if(isset($item['link_title'])){ $item_link_title = $item['link_title']; } 
		if(isset($item['excerpt'])){ $item_excerpt = $item['excerpt']; }
		 ?>
		
		<div style="background-image:url(<?php echo $item_img[0]; ?>)" id="tab<?php echo $counter; ?>-<?php echo $instance; ?>" class="tab-pane fade <?php if($counter==1){ echo 'show active'; } ?>">
		
			<?php if($item_darkness!=''){
				$darkness = $item_darkness/100; ?>
				<div class="static_tabs-overlay" style="background-color:rgba(0,0,0,<?php echo $darkness; ?>);"></div>
			<?php } ?>
		
			<div class='static_tabs-text'>
				<h3><?php echo $item_title; ?></h3>
				<?php if($item_excerpt != ''){ echo "<p>".$item_excerpt."</p>"; } ?>
				<a href="<?php echo $item_link; ?>" class="btn solid"><?php echo $item_link_title; ?></a>
			</div>
		
		</div>
		
	<?php $counter++; } ?>
	
</div>