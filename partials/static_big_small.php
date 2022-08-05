<?php $instance = $template_args['instance']; ?>

<div class="row">
  
  <div class="static_big_small-left">
    
    <?php 
	  $primary_title = get_post_meta(get_the_id(),$instance.'_primary_title',true);
	  $primary_img_id = get_post_meta(get_the_id(),$instance.'_primary_img_id',true); 
	  $primary_img = wp_get_attachment_image_src( $primary_img_id, 'lg' );
	  $primary_link = get_post_meta(get_the_id(),$instance.'_primary_link',true); 
	  $primary_link_title = get_post_meta(get_the_id(),$instance.'_primary_link_title',true);  
	  $primary_excerpt = get_post_meta(get_the_id(),$instance.'_primary_excerpt',true); 
	  ?>
	  
    <a href="<?php echo $primary_link; ?>" class="plus-parent">
      <img src="<?php echo $primary_img[0]; ?>" alt="<?php echo $primary_title; ?>" />
    </a>
    <div class="static_big_small-block-text">
      <?php if ($primary_title) : ?>
        <h3><a href="<?php echo $primary_link; ?>"><?php echo $primary_title; ?></a></h3>
      <?php endif; ?>
      <p><?php echo $primary_excerpt; ?></p>
      <a href="<?php echo $primary_link; ?>" class="read-more"><?php echo $primary_link_title; ?></a>
    </div>
  </div>
  
  <hr class="static_big_small-rule" />
  
  <div class="static_big_small-right">
	  
	  <?php
    $blocks = get_post_meta(get_the_id(),$instance.'_blocks',true);
    foreach ((array) $blocks as $key => $block ) {
	    $sec_title = $sec_img = $sec_link = $sec_link_title = $sec_excerpt = '';
	    if(isset($block['title'])){ $sec_title = $block['title']; }
		  if(isset($block['image'])){ $sec_img_id = $block['image_id']; }
		  if(isset($block['image'])){ $sec_img = wp_get_attachment_image_src( $sec_img_id, 'md-square' ); }
		  if(isset($block['link'])){ $sec_link = $block['link']; }
		  if(isset($block['link_title'])){ $sec_link_title = $block['link_title']; } 
		  if(isset($block['excerpt'])){ $sec_excerpt = $block['excerpt']; }
    ?>
	  
	  <div class="static_big_small-right-block">
      <a href="<?php echo $sec_link; ?>" class="plus-parent">
        <img src="<?php echo $sec_img[0]; ?>" alt="<?php echo $sec_title; ?>" />
      </a>
      <div class="static_big_small-block-text">
        <?php if ($sec_title) : ?>
          <h3><a href="<?php echo $sec_link; ?>"><?php echo $sec_title; ?></a></h3>
        <?php endif; ?>
        <p><?php echo $sec_excerpt; ?></p>
        <a href="<?php echo $sec_link; ?>" class="read-more"><?php echo $sec_link_title; ?></a>
      </div>
    </div>
    
    <?php } ?>
    
  </div>
    
</div>