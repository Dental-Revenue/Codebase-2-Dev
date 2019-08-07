<?php 
	$instance = $template_args['instance']; 
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
	$raw_title = get_post_meta(get_the_id(),$instance.'_title',true);
	$maintitle = str_replace(array('(',')'), array("<h2 class='$headline_style'>","</h2>"),$raw_title);
	$subtitle = str_replace(array('{','}'), array('<h3>','</h3>'),$maintitle);
	$title = str_replace(array('[',']'), array('<p>','</p>'),$subtitle);
?>
<div class="section-title"><?php echo $title; ?></div>

<div class="row">
  <div class="slick-init slick-carousel_1" data-slides="<?php echo get_post_meta(get_the_id(),$instance.'_items',true); ?>">
    
		<?php
    $blocks = get_post_meta(get_the_id(),$instance.'_blocks',true);
    foreach ((array) $blocks as $key => $block ) {
	  $image = wp_get_attachment_image_src( $block['image_id'], 'md-square' );
    ?>
      	
      <div class="carousel_1-block">
	      <a href="<?php echo $block['url']; ?>">
		      <img src="<?php echo $image[0]; ?>" alt="" />
	      </a>
				<div class="carousel_1-block-text">
					<h3><a href="<?php echo $block['url']; ?>"><?php echo $block['title']; ?></a></h3>
					<p><?php echo $block['excerpt']; ?></p>
					<a href="<?php echo $block['url']; ?>" class="read-more">Read More</a>
      	</div>
      </div>
      	
    <?php } ?>
    
  </div>
</div>
