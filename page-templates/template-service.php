<?php
/*
Template Name: Service
*/
?>

<?php get_header(); ?>

	<!-- page head -->
  <?php get_template_part( 'partials/page-head' ); ?>

  
	<!-- main -->
	<div role="main" class="service-template">	
		<div class="row">
		
			<div class="columns eight">
				  
				<?php $postID = get_the_ID(); ?>
  			
  			 <?php if (have_posts()) : while (have_posts()) : the_post();
					  the_content();
          endwhile; endif; ?>
					  
			</div>
			
			<div class="columns four">
				<?php get_sidebar(); ?>
			</div>
		
		</div>
		
	</div>
	
	<?php if(get_post_meta($postID, 'service_why_hidden', true)=='false'){ ?>
	  <div class="service-why service-module">
    	<div class="row">
      	
      	<?php if(get_post_meta(1, 'service_why_image', true)){
        	$profile_id = get_post_meta(1, 'service_why_image_id', true);
          $profile_array = wp_get_attachment_image_src( $profile_id, 'sm-square' );
          $profile_url = $profile_array[0]; ?>
          <img class="doctor-profile" src="<?php echo $profile_url; ?>" alt="<?php echo do_shortcode('[doc_name_1]'); ?>" />
        <?php } ?>
      	
      	<h2>Why choose <?php echo do_shortcode('[practice_name]');?>?</h2>
      	<?php echo apply_filters('the_content',get_post_meta(1, 'service_why_content', true)); ?>

      	<?php if(get_post_meta(1, 'service_why_affiliations_show', true)=='true'){ ?>
        	<div class="slick-service-associations">
          	<?php
            $associations = get_post_meta(1, 'service_why_affiliations_common', true);	
            foreach ((array)$associations as $key => $entry ) { ?>
              <div>
                <div style="background-image: url(//cdn.dentalrevenue.com/assets/images/associations/<?php echo $entry; ?>.jpg);"></div>
              </div>
            <?php } ?>
            <?php
            $custom_associations = get_post_meta(1, 'service_why_affiliations_custom', true);	
            if($custom_associations && $custom_associations!=''){
            foreach ((array)$custom_associations as $key => $entry ) { ?>
              <div>
                <?php $img_array = wp_get_attachment_image_src( $key, 'small' ); ?>
                <div style="background-image: url(<?php echo $img_array[0]; ?>);"></div>
              </div>
            <?php }} ?>
        	</div>
      	<?php } ?>
    	</div>
	  </div>
	<?php } ?>
	
	<?php if(get_post_meta($postID, 'service_related_hidden', true)=='false'){ ?>
	  <div class="service-related service-module">
    	<div class="row">
      	<h2>Related Procedures</h2>
      	<?php
        $related = get_post_meta($postID, 'service_related_procedures', true);	
        foreach ((array)$related as $key => $entry ) { ?>
          <a href="<?php echo get_permalink($entry); ?>" class="btn solid"><?php echo get_the_title($entry); ?></a>
        <?php } ?>
    	</div>
	  </div>
	<?php } ?>
	

<?php get_footer(); ?>