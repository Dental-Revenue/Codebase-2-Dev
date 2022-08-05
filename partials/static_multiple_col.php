<?php 
	$instance = $template_args['instance'];
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
?>

<div class="row">
	<?php //get data
	$title_reg = get_post_meta( get_the_id(),$instance.'_title_reg', true );
	$title_bold = get_post_meta( get_the_id(),$instance.'_title_bold', true );
	?>
	<?php if ($title_reg || $title_bold) : ?>
  		<h2 class="<?php echo $headline_style; ?>"><?php echo $title_reg; ?> <span><?php echo $title_bold; ?></span></h2>
	<?php endif; ?>
</div>

<div class="row">
	<?php 
	$columns = get_post_meta(get_the_id(),$instance.'_columns',true);
	foreach ((array) $columns as $key => $column ) {
	  $column_title = $column_link = $column_link_title = $column_excerpt = '';
	  if(isset($column['title'])){ $column_title = $column['title']; }
		if(isset($column['link'])){ $column_link = $column['link']; }
		if(isset($column['link_title'])){ $column_link_title = $column['link_title']; } 
		if(isset($column['excerpt'])){ $column_excerpt = $column['excerpt']; } ?>
		
	  <div class="static_multiple_col-column columns three repeat">
		<?php if ($column_title) : ?>
			<h3><a href="<?php echo $column_link; ?>"><?php echo $column_title; ?></a></h3>
		<?php endif; ?>
	  	<?php echo wpautop($column_excerpt); ?>
	  	<a href="<?php echo $column_link; ?>" class="arrow"><?php echo $column_link_title; ?></a>
		</div>
	
	<?php } ?>

</div>