<?php $instance = $template_args['instance'];
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style']; ?>


<div class="row">
  
  <?php
  $raw_headline = get_post_meta(get_the_id(),$instance.'_headline',true);
	$headline = str_replace(array('{','}'), array('<span>','</span>'),$raw_headline);
	
	$content = get_post_meta(get_the_id(),$instance.'_content',true);
	?>
  <div class="static_blocks_list-text">
    <?php if(!empty($headline)){ ?><h2 class="<?php echo $headline_style; ?>"><?php echo $headline; ?></h2><?php } ?>
    <?php if(!empty($content)){ ?><div class="rte"><?php echo $content; ?></div><?php } ?>
  </div>
  
  
  <div class="static_blocks_list-left block-set">
	  
	  <?php
    $blocks = get_post_meta(get_the_id(),$instance.'_grid_blocks',true);
    foreach ((array) $blocks as $key => $block ) {
		$image = wp_get_attachment_image_src( $block['block_image_id'], 'md-square' );
    ?>
	  
    <a href="<?php echo $block['block_url']; ?>" class="block" style="background-image:url(<?php echo $image[0]; ?>);">
      <p><?php echo $block['block_title']; ?> <i class="fa fa-plus-circle" aria-hidden="true"></i></p>
      <p><?php echo $block['block_excerpt']; ?></p>
    </a>
    
    <?php } ?>
    
  </div>
  
  
  <div class="static_blocks_list-right">
	  
	  <?php
	  $raw_headline = get_post_meta(get_the_id(),$instance.'_list_headline',true);
		$headline = str_replace(array('{','}'), array('<span>','</span>'),$raw_headline);
		
		$content = get_post_meta(get_the_id(),$instance.'_list_content',true);
		?>
    <h3><?php echo $headline; ?></h3>
    <div class="rte"><?php echo $content; ?></div>
    <ul>
	    <?php
	    $items = get_post_meta(get_the_id(),$instance.'_list_items',true);
	    foreach ((array) $items as $key => $item ) {
	    ?>
	    
			  <?php if(!empty($item['list_item_url'])){ ?>
		    	<li><a href="<?php echo $item['list_item_url']; ?>"><?php echo $item['list_item']; ?></a></li>
		    <?php } else { ?>
		    	<li><?php echo $item['list_item']; ?></li>
		    <?php } ?>
		    
	    <?php } ?>
    </ul>
    <?php $page = get_pages(array('meta_key' => '_wp_page_template','meta_value' => 'page-templates/template-schedule.php')); ?>
    <a class="schedule btn on-light" href="<?php echo get_permalink($page[0]->ID); ?>">Schedule Appointment</a>
  </div>
  
  
</div>