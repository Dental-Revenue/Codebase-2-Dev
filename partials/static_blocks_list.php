<?php $instance = $template_args['instance'];
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style']; 
  $display_list_block = get_post_meta(get_the_id(),$instance.'_display_list_block',true);
?>

<div class="row">
  
  <?php
  $headline = get_post_meta(get_the_id(),$instance.'_headline',true);
	$subtitle = get_post_meta(get_the_ID(), $instance.'_subtitle', true);
	$content = get_post_meta(get_the_id(),$instance.'_content',true);
	?>
  <div class="static_blocks_list-text">
    <?php if(!empty($headline)){ ?><h2 class="<?php echo $headline_style; ?>" <?php if(empty($content)){ ?>style="padding-bottom: 6px;"<?php } ?>><?php echo $headline; ?></h2><?php } ?>
    <?php if ($subtitle) : ?>
    <p class="module-subtitle <?php echo $headline_style; ?>"><?php echo $subtitle; ?></p>
  <?php endif; ?>
    <?php if(!empty($content)){ ?><div class="rte"><?php echo $content; ?></div><?php } ?>
  </div>

  <div class="static_blocks_list-left block-set" <?php if($display_list_block === 'no'){ ?>style="width:100%;"<?php } ?>>
	<?php
  $blocks = get_post_meta(get_the_id(),$instance.'_grid_blocks',true);
  foreach ((array) $blocks as $key => $block ) {
	$image = wp_get_attachment_image_src( $block['block_image_id'], 'large' );
  ?>
  <a href="<?php echo $block['block_url']; ?>" class="block" style="background-image:url(<?php echo $image[0]; ?>);">
    <div class="fold-overlay" style="background-color: rgba(0, 0, 0, 0.15);opacity: 1;position: absolute;left: 0;top: 0;width: 100%;height: 100%;transition: opacity 0.4s;"></div>
    <p><?php echo $block['block_title']; ?> <i class="fa fa-plus-circle" aria-hidden="true"></i></p>
    <p><?php echo $block['block_excerpt']; ?></p>
  </a>
  <?php } ?>
  </div>
  
  <?php
	  $headline = get_post_meta(get_the_id(),$instance.'_list_headline',true);
    $subtitle = get_post_meta(get_the_ID(), $instance.'_list_subtitle', true);
		$content = get_post_meta(get_the_id(),$instance.'_list_content',true);
    $items = get_post_meta(get_the_id(),$instance.'_list_items',true);
	?>
  <?php if($display_list_block === 'yes'){ ?>
  <div class="static_blocks_list-right">
    <?php if(!empty($headline)){ ?><h3><?php echo $headline; ?></h3><?php } ?>
    <?php if ($subtitle) : ?>
      <p class="list-subtitle"><?php echo $subtitle; ?></p>
    <?php endif; ?>
    <?php if(!empty($content)){ ?><div class="rte"><?php echo $content; ?></div><?php } ?>
    <?php if(!empty($items)){ ?>
    <ul>
	    <?php foreach ((array) $items as $key => $item ) {
	    ?>
			  <?php if(!empty($item['list_item_url'])){ ?>
		    	<li><a href="<?php echo $item['list_item_url']; ?>"><?php echo $item['list_item']; ?></a></li>
		    <?php } else { ?>
		    	<li><?php echo $item['list_item']; ?></li>
		    <?php } ?>
	    <?php } ?>
    </ul>
    <?php } ?>
    <?php $page = get_pages(array('meta_key' => '_wp_page_template','meta_value' => 'page-templates/template-schedule.php')); ?>
    <a class="schedule btn on-light" href="<?php echo get_permalink($page[0]->ID); ?>"><?php site_ops_cta_text(); ?></a>
  </div>
  <?php } ?>
  
</div>