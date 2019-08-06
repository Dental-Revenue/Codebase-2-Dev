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
  
  <?php
	if(get_post_meta(get_the_id(),$instance.'_category',true)!='all'){
		$args = array( 'post_type' => 'post', 'cat' => get_post_meta(get_the_id(),$instance.'_category',true),'orderby' => 'post_date','order' => 'DESC','posts_per_page' => 3 );
	}else{
		$args = array( 'post_type' => 'post', 'orderby' => 'post_date','order' => 'DESC','posts_per_page' => 3 );
	}
  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) : $loop->the_post(); ?>
    
    <div class="blog_columns-post">
      
      <a href="<?php the_permalink(); ?>" class="feat-img">
        <?php the_post_thumbnail( 'recent-post',array('alt' => get_post_meta(get_post_thumbnail_id(get_the_id()), '_wp_attachment_image_alt', true) )); ?>
      </a>
      
      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      <span class="meta"><?php the_time('F j, Y'); ?></span>
      <hr />
      <p><?php echo wp_trim_words(get_the_content(),30); ?></p>
                  
    </div>
      	
  <?php endwhile; wp_reset_postdata(); ?>
  
</div>
