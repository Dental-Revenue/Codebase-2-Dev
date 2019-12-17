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
				  
				<?php //pull general info and setup reusable functions
  			  
  			  $longname = get_post_meta(get_the_ID(), 'service_general_longname', true);
  			  if(get_post_meta(get_the_ID(), 'service_general_shortname', true)){
    		    $shortname =get_post_meta(get_the_ID(), 'service_general_shortname', true);
  			  }else{
    		    $shortname = $longname;
  			  }
  			  
  			  $postID = get_the_ID();
  			  
  			?>
				
				
				<?php if(get_post_meta(get_the_ID(), 'service_overview_hidden', true)=='false'){ ?>
				  <div class="service-overview service-module main-content">
  			    <h2><span><?php echo $shortname; ?></span> An Overview</h2>
  			    <?php echo apply_filters('the_content',get_post_meta(get_the_ID(), 'service_overview_content', true)); ?>
				  </div>
				<?php } ?>
				
				
				<?php if(get_post_meta(get_the_ID(), 'service_testimonials_hidden', true)=='false'){ ?>
				  <div class="service-testimonials service-module slick-service-testimonials">
  			    <?php $testimonials = get_post_meta(get_the_ID(), 'service_testimonials', true);
    		  	foreach($testimonials as $id){
              $testimonial = get_post($id); ?>
              <div class="service-testimonial"><?php echo apply_filters('get_the_content', $testimonial->post_content); ?><span><?php echo get_the_title($id); ?></span></div>
      	  	<?php } ?>
				  </div>
				<?php } ?>
				
				
				<?php if(get_post_meta(get_the_ID(), 'service_expectations_hidden', true)=='false'){ ?>
				  <div class="service-expectations service-module main-content">
  			    <h2><span><?php echo $longname; ?></span> What to Expect</h2>
  			    <?php echo apply_filters('the_content',get_post_meta(get_the_ID(), 'service_expectations_content', true)); ?>
  			    <?php if(get_post_meta(get_the_ID(), 'service_expectations_video', true)){ ?>
    			    <div class="video-sixteen-nine">
    			      <?php echo get_post_meta(get_the_ID(), 'service_expectations_video', true); ?>
    			    </div>
    			  <?php } ?>
				  </div>
				<?php } ?>
				
				
				<?php if(get_post_meta(get_the_ID(), 'service_faqs_hidden', true)=='false'){ ?>
				  <div class="service-faqs service-module">
  			    <h2><span><?php echo $longname; ?></span> FAQs</h2>
  			    <dl class="faq-accordion">
    			    <?php $entries = get_post_meta( get_the_ID(), 'service_faqs_group', true );
      			    foreach ((array)$entries as $key => $entry ) {
        			    echo '<dt><a href="#">'.$entry['question'].'</a></dt>';
        			    echo '<dd class="main-content">'.apply_filters('the_content',$entry['answer']).'</dd>';
      			    }
              ?>
            </dl>
				  </div>
				<?php } ?>
				
				
				<?php if(get_post_meta(get_the_ID(), 'service_cost_hidden', true)=='false'){ ?>
				  <div class="service-cost service-module">
  			    <h2><span>Cost of</span> <?php echo $shortname; ?></h2>
  			    <ul class="cost-list">
    			    <?php $entries = get_post_meta( get_the_ID(), 'service_cost_group', true );
      			    foreach ((array)$entries as $key => $entry ) {
        			    echo '<li>'.$entry['item'].'<span>'.$entry['cost'].'</span></li>';
      			    }
              ?>
  			    </ul>
				  </div>
				<?php } ?>

  			
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