<?php 
	$instance = $template_args['instance']; 
?>


<div class="row">
  
  
  <div class="m1-left">
    
    <?php
	  $headline = get_post_meta(get_the_id(),$instance.'_heading',true);
    $subtitle = get_post_meta(get_the_ID(), $instance.'_subtitle', true);
    ?>
    <?php if ($headline) : ?>
        <h2><?php echo $headline; ?></h2>
    <?php endif; ?>
    <?php if ($subtitle) : ?>
      <p class="smb-subtitle"><?php echo $subtitle; ?></p>
    <?php endif; ?>
    <div class="rte">
      <?php echo apply_filters('the_content', get_post_meta(get_the_id(),$instance.'_intro_paragraph',true)); ?>
    </div>
  </div>
  
  
  <div class="m1-right">
    
    <?php
    $blocks = get_post_meta(get_the_id(),$instance.'_blocks',true);
    foreach ((array) $blocks as $key => $block ) {
	  $image = wp_get_attachment_image_src( $block['image_id'], 'md' );
    ?>
      	
      <div class="m1-block">
	    	<div class="m1-block-image" style="background-image:url(<?php echo $image[0]; ?>);"></div>
				<div class="m1-block-text">
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