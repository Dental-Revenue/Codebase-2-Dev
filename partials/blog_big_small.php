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
	<div class="blog_big_small-left columns six">
		<?php
    $args = array( 'post_type' => 'post', 'orderby' => 'post_date','order' => 'DESC','posts_per_page' => 1 );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <div class="hp-post">
      <p class="hp-post-date"><?php the_time('M\<\b\r\/\>d') ?></p>
      <div class="hp-post-content">
      	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      	<p><?php echo wp_trim_words(get_the_content(), 50); ?></p>
      	<a class="arrow" href="<?php the_permalink(); ?>">Read More</a>
      </div>
    </div>
    <?php endwhile;  wp_reset_postdata(); ?>
  </div>
    
  <div class="blog_big_small-right columns six">
    <?php
    $args = array( 'post_type' => 'post', 'orderby' => 'post_date','order' => 'DESC','posts_per_page' => 2, 'offset'=> 1 );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <div class="hp-post">
      <p class="hp-post-date"><?php the_time('M\<\b\r\/\>d') ?></p>
      <div class="hp-post-content">
      	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      	<p><?php echo wp_trim_words(get_the_content(), 16); ?></p>
      	<a class="arrow" href="<?php the_permalink(); ?>">Read More</a>
      </div>
    </div>
    <?php endwhile; wp_reset_postdata();  ?>
  </div>

</div>
