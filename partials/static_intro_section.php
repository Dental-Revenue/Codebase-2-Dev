<?php 
	$instance = $template_args['instance'];
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];

	$paragraph = apply_filters('the_content', get_post_meta(get_the_id(),$instance.'_paragraph',true));
	$paragraph_mobile = get_post_meta(get_the_id(),$instance.'_paragraph_mobile',true);	
?>
<?php if($paragraph_mobile === 'no' ){ ?><style>.static_intro_section h2:after {margin-bottom: 15px;}</style><?php } ?>
<div class="row sm">
  
  <?php
	$raw_headline = get_post_meta(get_the_id(),$instance.'_heading',true);
	$headline = str_replace(array('{','}'), array('<span>','</span>'),$raw_headline);
	$link = get_post_meta(get_the_id(),$instance.'_link',true);
	?>
  
  <h2 class="<?php echo $headline_style; ?>"><?php echo $headline; ?></h2>
  <div class="rte">
	  <?php if(!empty($paragraph) && $paragraph_mobile === 'yes' ){ ?><?php echo $paragraph; ?><?php } ?>
    <?php if ($link != '') { ?>
			<a href="<?php echo $link; ?>" class="btn solid">Learn More</a>
		<?php } ?>
  </div>    
  
</div>