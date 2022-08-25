<?php $instance = $template_args['instance'];
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style']; ?>


<div class="row">
  
  <?php
  $headline = get_post_meta(get_the_id(),$instance.'_headline',true);
  $subtitle = get_post_meta(get_the_ID(), $instance.'_subtitle', true);
	
	$content = get_post_meta(get_the_id(),$instance.'_content',true);
	
	?>
  <div class="static_photo_list-text">
    <?php if(!empty($headline)){ ?><h2 class="<?php echo $headline_style; ?>"><?php echo $headline; ?></h2><?php } ?>
    <?php if ($subtitle) : ?>
      <p class="spl-subtitle <?php echo $headline_style; ?>"><?php echo $subtitle; ?></p>
    <?php endif; ?>
    <?php if(!empty($content)){ ?><div class="rte"><?php echo $content; ?></div><?php } ?>
  </div>  
  
  <?php 
	$attachment_id = get_post_meta(get_the_id(),$instance.'_left_image_id',true);
	$image = wp_get_attachment_image_src( $attachment_id, 'lg' );
  $image_xxl = wp_get_attachment_image_src( get_post_meta(get_the_id(),$instance.'_left_image_id',true), 'xxl' );
  $image_xl = wp_get_attachment_image_src( get_post_meta(get_the_id(),$instance.'_left_image_id',true), 'xl' );
  $image_lg = wp_get_attachment_image_src( get_post_meta(get_the_id(),$instance.'_left_image_id',true), 'lg' );
  $image_alt = get_post_meta(get_the_id(),$instance.'_left_alt',true);
	
	?>
  <div class="static_photo_list-left">
    <img alt="<?php if (isset($image_alt) && $image_alt!=''){ echo $image_alt; } else { echo 'Module Image'; } ?>" src="<?php echo $image_xxl[0]; ?>" srcset="<?php echo $image_lg[0]; ?> 500w, <?php echo $image_xl[0]; ?> 700w, <?php echo $image_xxl[0]; ?> 3000w" sizes="100vw,(min-width: 300px) 700px,(min-width: 700px) 1300px" />
  </div> 
  
  
  <div class="static_photo_list-right">
    <?php
	  $headline = get_post_meta(get_the_id(),$instance.'_list_headline',true);
    $subtitle = get_post_meta(get_the_ID(), $instance.'_list_subtitle', true);
		
		$content = get_post_meta(get_the_id(),$instance.'_list_content',true);
		?>
    <?php if ($headline) : ?>
      <h3><?php echo $headline; ?></h3>
    <?php endif; ?>
    <?php if ($subtitle) : ?>
      <p class="list-subtitle"><?php echo $subtitle; ?></p>
    <?php endif; ?>
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
