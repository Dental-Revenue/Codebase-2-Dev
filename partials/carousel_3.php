<?php $instance = $template_args['instance']; 
	$items = get_post_meta(get_the_id(),$instance.'_items',true);
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
?>

<?php $cpt_override =""; $num_slides = $items; ?>

  
<div class="row">
	<?php
  $headline = get_post_meta(get_the_id(),$instance.'_headline',true);
  $subtitle = get_post_meta(get_the_ID(), $instance.'_subtitle', true);
	?>
  <?php if(!empty($headline)){ ?><h2 class="<?php echo $headline_style; ?>"><?php echo $headline; ?></h2><?php 
        } else { ?>
        <div class="spacer">&nbsp;</div>
        <?php } ?>
        <?php if ($subtitle) : ?>
          <p class="<?php echo $headline_style; ?>"><?php echo $subtitle; ?></p>
        <?php endif; ?>
</div>

<div class="row">
	 <?php $image_type = get_post_meta(get_the_id(),$instance.'_image_type',true); ?>
  <div class="slick-init slick-carousel_3 <?php if($image_type == 'circle') {?>slick-circle<?php } ?>" data-slides="<?php echo $num_slides; ?>" >
    
    <?php
    $blocks = get_post_meta(get_the_id(),$instance.'_blocks',true);
    foreach ((array) $blocks as $key => $block ) {
	  $image = wp_get_attachment_image_src( $block['image_id'], 'md-square' );
    ?>
    
      <div class="carousel-item">
        <a href="<?php echo $block['url']; ?>" >
          <img src="<?php echo $image[0]; ?>" alt="carousel image" />
        </a>
        <div class="carousel-text">
        <?php if ($block['title']) : ?>
						<h3><a href="<?php echo $block['url']; ?>"><?php echo $block['title']; ?></a></h3>
					<?php endif; ?>
          <p><?php echo $block['excerpt']; ?></p>
          <a href="<?php echo $block['url']; ?>" class="read-more">Read More</a>
        </div>
      </div>
      	
    <?php } ?>
    
  </div>
</div>