<?php 
	$instance = $template_args['instance']; 
	$num_slides = get_post_meta(get_the_id(),$instance.'_num_slides',true);
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style'];
	$raw_title = get_post_meta(get_the_id(),$instance.'_title',true);
	$maintitle = str_replace(array('(',')'), array("<h2 class='$headline_style'>","</h2>"),$raw_title);
	$subtitle = str_replace(array('{','}'), array('<h3>','</h3>'),$maintitle);
	$title = str_replace(array('[',']'), array('<p>','</p>'),$subtitle);
?>
<div class="section-title"><?php echo $title; ?></div>

<div class="row">
  <div class="slick-init slick-logo_scroll" data-slides="<?php echo $num_slides; ?>">
    <?php $images = get_post_meta( get_the_ID(), $instance.'_common_images', 1 ); 
	    foreach ( (array) $images as $image ) {
	     ?>
			<img src="<?php echo $image; ?>" alt="logo image" />  
    <?php } ?>
    <?php $entries = get_post_meta( get_the_ID(), $instance.'_images', 1 ); 
	    if ($entries != '') {
	    	foreach ( (array) $entries as $attachment_id => $attachment_url ) {
		     $img = wp_get_attachment_image_src( $attachment_id, 'logo' );
	     ?>
			<img src="<?php echo $img[0]; ?>" alt="logo image" />  
    <?php } } ?>
  </div>
</div>
