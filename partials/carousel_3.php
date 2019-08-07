<?php 
	$instance = $template_args['instance']; 
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
	$items = get_post_meta(get_the_id(),$instance.'_items',true);
	$raw_title = get_post_meta(get_the_id(),$instance.'_title',true);
	$maintitle = str_replace(array('(',')'), array("<h2 class='$headline_style'>","</h2>"),$raw_title);
	$subtitle = str_replace(array('{','}'), array('<h3>','</h3>'),$maintitle);
	$title = str_replace(array('[',']'), array('<p>','</p>'),$subtitle);
?>
<div class="section-title"><?php echo $title; ?></div>

<?php $cpt_override =""; $num_slides = $items; ?>

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
          <h3><a href="<?php echo $block['url']; ?>"><?php echo $block['title']; ?></a></h3>
          <p><?php echo $block['excerpt']; ?></p>
          <a href="<?php echo $block['url']; ?>" class="read-more">Read More</a>
        </div>
      </div>
      	
    <?php } ?>
    
  </div>
</div>
