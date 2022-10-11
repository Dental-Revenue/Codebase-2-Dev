<?php $instance = $template_args['instance'];
	$appearance_info = get_option( 'appearance_info');
	$headline_style = $appearance_info['headline_style']; ?>
  
<div class="row">
	<div class="blog_big_small-left columns six">
		<?php
	  $headline = get_post_meta(get_the_id(),$instance.'_headline',true);
    $subtitle = get_post_meta(get_the_ID(), $instance.'_subtitle', true);
    ?>
    <?php if ($headline) : ?>
      <h2 class="<?php echo $headline_style; ?>"><?php echo $headline; ?></h2>
    <?php endif; ?>
    <?php if ($subtitle) : ?>
        <p class="<?php echo $headline_style; ?>"><?php echo $subtitle; ?></p>
    <?php endif; ?>
    <?php
    $args = array( 'post_type' => 'post', 'orderby' => 'post_date','order' => 'DESC','posts_per_page' => 1 );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <div class="hp-post">
      <p class="hp-post-date"><?php the_time('M\<\b\r\/\>d') ?></p>
      <div class="hp-post-content">
        <?php if (the_title()) : ?>
      	  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php endif; ?>
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
      <?php if (the_title()) : ?>
      	  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php endif; ?>
      	<p><?php echo wp_trim_words(get_the_content(), 16); ?></p>
      	<a class="arrow" href="<?php the_permalink(); ?>">Read More</a>
      </div>
    </div>
    <?php endwhile; wp_reset_postdata();  ?>
  </div>

</div>