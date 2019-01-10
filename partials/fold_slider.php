<?php 
	$instance = $template_args['instance']; 
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
	
	$slider_type = get_post_meta(get_the_id(),$instance.'_type',true);
?>

<?php if($slider_type == 'traditional') { ?>
  <div class="slick-init slick-fold_slider">
	  
	  <?php
    $blocks = get_post_meta(get_the_id(),$instance.'_fold_slides',true);
    foreach ((array) $blocks as $key => $block ) {
	  $image = wp_get_attachment_image_src( $block['image_id'], 'xxl' );
    ?>
		<div class="fold-slide" style="background-image: url(<?php echo $image[0]; ?>);">
			<?php if(isset($block['video_webm']) && $block['video_webm']!='' && isset($block['video_mp4']) && $block['video_mp4']!=''){ ?>
				<video class="fold-video" autoplay loop muted data-audio="true" poster="<?php echo $image[0]; ?>">
					<source src="<?php echo $block['video_webm']; ?>" type="video/webm">
					<source src="<?php echo $block['video_mp4']; ?>" type="video/mp4">
  			</video>
  		<?php } ?>
  		<div class="fold-overlay" style="background-color: rgba(0,0,0,.4);"></div>
			<div class="fold-slide-text">
			  <h2><?php echo $block['title']; ?></h2>
			  <?php if(isset($block['excerpt'])){ ?><p><?php echo $block['excerpt']; ?></p><?php } ?>
			  <a class="btn solid" href="<?php echo $block['url']; ?>"><?php echo $block['cta']; ?></a>
			</div>
		</div>
		<?php } ?>
		
  </div>
<?php } else if ($slider_type == 'slice') { ?>

	<?php
	$slices = get_post_meta( get_the_ID(),$instance.'_fold_slides', true );
	if(sizeof($slices)<3){ echo "<p>The slice style ATF requires a minimum of 3 slides</p>"; }else{
	$num_slices = sizeof($slices)-1;
	$slice_width = (40/$num_slices);
	$overlay = (get_post_meta( get_the_ID(), $instance.'_overlay', true )!='') ? get_post_meta( get_the_ID(), $instance.'_overlay', true ) : 30 ;
	?>
		
	<div id="hp-fold" class="fold-slices" data-slice="<?php echo $slice_width; ?>">
		
		<?php $counter=0;
		foreach((array) $slices as $s ) {
			
			$image = wp_get_attachment_image_src($s['image_id'],'extra-large');
			?>
			
			<div class="fold-slice <?php if($counter==0){ echo 'active'; } ?>" style="background-image: url(<?php echo $image[0]; ?>);">
				
				<?php if(isset($s['video_webm']) && $s['video_webm']!='' && isset($s['video_mp4']) && $s['video_mp4']!=''){ ?>
					<video class="fold-video" autoplay loop muted data-audio="true" poster="<?php echo $image[0]; ?>">
						<source src="<?php echo $s['video_webm']; ?>" type="video/webm">
						<source src="<?php echo $s['video_mp4']; ?>" type="video/mp4">
	  			</video>
	  		<?php } ?>
				
				<div class="fold-overlay" style="background-color: rgba(0,0,0,<?php echo $overlay/100; ?>);"></div>
				<div class="fold-slice-content">
					<h2><?php echo $s['title']; ?></h2>
					<?php if(isset($s['excerpt'])){ ?><p><?php echo $s['excerpt']; ?></p><?php }else{ echo "<br/>"; } ?>
					<a class="btn solid" href="<?php echo $s['url']; ?>"><?php echo $s['cta']; ?></a>
				</div>
			</div>
	
		<?php $counter++; } ?>
	  
	</div>
	
	<?php } //end check for a minimum of 3 slides ?>


<?php } else if ($slider_type == 'panel') { ?>

	<?php
		$panels = get_post_meta( get_the_ID(),$instance.'_fold_slides', true );
		if(sizeof($panels)<4){ echo "<p>The slice style ATF requires a minimum of 4 slides</p>"; }else{
		?>

	<div id="hp-fold" class="fold-panel">
	  
	  
	  <?php $first = true;
		foreach((array) $panels as $p ) {
		$image = wp_get_attachment_image_src($p['image_id'],'xxl');
		?>
		
			<?php if ( $first ) { ?>
				<div class="slick-fold">
				  <div class="fold-slide slide-1" style="background-image: url(<?php echo $image[0]; ?>);">
						<div class="fold-overlay" style="background-color: rgba(0,0,0,.4);"></div>
				    <div class="hp-fold-text">
							<h2><?php echo $p['title']; ?></h2>
							<?php if(isset($p['excerpt'])){ ?><p><?php echo $p['excerpt']; ?></p><?php }else{ echo "<br/>"; } ?>
				      <a href="<?php echo $p['url']; ?>" class="btn solid"><?php echo $p['cta']; ?></a>
				    </div>
				  </div> 
		  	</div> 
		  <?php $first = false; } else { ?>
	  
			<div class="tri-fold-block">
				<div class="fold-overlay" style="background-color: rgba(0,0,0,.4);"></div>
				<a href="<?php echo $p['url']; ?>" class="tri-block" style="background-image: url(<?php echo $image[0]; ?>);"></a>
				<a href="<?php echo $p['url']; ?>" class="tri-block-link"><?php echo $p['cta']; ?></a>
		  </div>
		  
		  <?php } ?>
		<?php } ?>           
	  
	</div>

	<?php } //end check for a minimum of 4 slides ?>
<?php } ?>