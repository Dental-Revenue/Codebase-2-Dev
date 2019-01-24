<?php $instance = $template_args['instance'];
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style']; ?>


<div class="row">
  
  <?php
  $raw_headline = get_post_meta(get_the_id(),$instance.'_headline',true);
	$headline = str_replace(array('{','}'), array('<span>','</span>'),$raw_headline);
	
	$content = get_post_meta(get_the_id(),$instance.'_content',true);
	
	?>
  <div class="static_photo_list-text">
    <?php if(!empty($headline)){ ?><h2 class="<?php echo $headline_style; ?>"><?php echo $headline; ?></h2><?php } ?>
    <?php if(!empty($content)){ ?><div class="rte"><?php echo $content; ?></div><?php } ?>
  </div>  
  
  <?php 
	$attachment_id = get_post_meta(get_the_id(),$instance.'_left_image_id',true);
	$image = wp_get_attachment_image_src( $attachment_id, 'lg' );
	?>
  <div class="static_photo_list-left">
    <img src="<?php echo $image[0]; ?>" alt="module image" />
  </div> 
  
  
  <div class="static_photo_list-right">
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
    <a class="schedule btn on-light" href="<?php echo get_permalink($page[0]->ID); ?>"><?php site_ops_cta_text(); ?></a>

  </div>
  
  
</div>

<?php $bg_override = ""; ?>