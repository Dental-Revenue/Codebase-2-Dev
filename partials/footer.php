<?php 
	$appearance_info = get_option( 'appearance_info');
	$nav_style = $appearance_info['nav_style'];
	$option2 = get_option('practice_info');
	$google_map_embed_url = $option2['google_map_embed_url'];
 
 
	$option3 = get_option('social_info'); 
	$facebook_link = $option3['facebook_link'];
	$instagram_link = $option3['instagram_link'];


?>

<footer>
  
  <div class="footer-top">
    <div class="row">

      <?php if(!wp_is_mobile()){ ?>   
      <div class="footer-left google-map-container">
	      <?php site_ops_google_map(); ?>
      </div>
      <?php } ?>

      <div class="footer-right">
        
        <div class="footer-column">
          <a href="/" class="logo"><span><img src="<?php site_ops_logo(); ?>" alt="<?php site_ops_practice_name(); ?>" /></span></a>
        </div>
        
        <div class="footer-column">      
          <div class="contact-option">
            <i class="fas fa-map-marker-alt"></i>
            <p>
              <span><?php site_ops_address(); ?></span><br />
              <span class="bold">
                <span><?php site_ops_city(); ?></span>,
                <span><?php site_ops_state(); ?></span>
                <span><?php site_ops_zip(); ?></span>
              </span>
            </p>
          </div>
          <?php if (!empty(site_ops_new_patient_phone(false))) { ?>
				<div class="contact-option">
					<i class="fas fa-phone fa-flip-horizontal"></i>
					<p>New Patients <span class="bold tracknum"><?php site_ops_new_patient_phone(); ?></span></p>
				</div>
          <?php } ?>
          <?php if(!empty(site_ops_current_patient_phone(false))){ ?>
          <div class="contact-option">
            <i class="fas fa-phone fa-flip-horizontal"></i>
            <p>Current Patients <span class="bold"><?php site_ops_current_patient_phone(); ?></span></p>
          </div> 
          <?php } ?>
          <a href="/request-appointment/" class="btn outline schedule"><?php site_ops_cta_text(); ?></a>
        </div>
        
        <div class="footer-column">
            <div class="contact-option company-hours">
              <i class="far fa-clock"></i>
              <p>
	              <?php 
		              $hoursArray = explode("\n", site_ops_company_hours(false)); 
		              foreach($hoursArray as $index=>$value){
                    if($index%2!=0){echo "<span>$value</span></span>";}else{echo "<span class='hour-set'>".$value." " ;}
                	}
		            ?>              
              </p>
            </div> 
                    
        </div>
        
        <div class="footer-info-mobile">
	        
          <div class="option">
            <i class="fas fa-phone fa-flip-horizontal"></i>
            <div>
	            <span class="bold tracknum">New Patients</span><br>
	            <?php site_ops_new_patient_phone(); ?>
	          </div>
          </div>
          <div class="option">
            <i class="fas fa-phone fa-flip-horizontal"></i>
            <div>
	            <span class="bold">Current Patients</span><br>
	            <?php site_ops_current_patient_phone(); ?>
	          </div>
          </div>
          <div class="option">
            <i class="fas fa-map-marker-alt"></i>
            <div>
              <span class="bold">Address</span><br />
              <?php site_ops_address(); ?><br />
							<?php site_ops_city(); ?>, <?php site_ops_state(); ?> <?php site_ops_zip(); ?>
          	</div>
          </div>
          <div class="option">
            <i class="far fa-clock"></i>
						<div>
							<span class="bold">Hours</span><br>
              <?php 
	              $hoursArray = explode("\n", site_ops_company_hours(false)); 
	              foreach($hoursArray as $index=>$value){
                  if($index%2!=0){echo "<span>$value</span></span>";}else{echo "<span class='hour-set'>".$value." " ;}
              	}
	            ?>              
            </div>
          </div>
          
          <div class="mobile-info-social">
	          <?php if(!empty(site_ops_facebook(false))){ ?><span><a href='<?php site_ops_facebook(); ?>' target='_blank' rel="noopener"><i class='fab fa-facebook-f'></i></a></span><?php } ?>
				<?php if(!empty(site_ops_twitter(false))){ ?><span><a href='<?php site_ops_twitter(); ?>' target='_blank' rel="noopener"><i class='fab fa-twitter'></i></a></span><?php } ?>
				<?php if(!empty(site_ops_linkedin(false))){ ?><span><a href='<?php site_ops_linkedin(); ?>' target='_blank' rel="noopener"><i class='fab fa-linkedin-in'></i></a></span><?php } ?>
				<?php if(!empty(site_ops_google_plus(false))){ ?><span><a href='<?php site_ops_google_plus(); ?>' target='_blank' rel="noopener"><i class='fab fa-google-plus-g'></i></a></span><?php } ?>
				<?php if(!empty(site_ops_youtube(false))){ ?><span><a href='<?php site_ops_youtube(); ?>' target='_blank' rel="noopener"><i class='fab fa-youtube'></i></a></span><?php } ?>
				<?php if(!empty(site_ops_instagram(false))){ ?><span><a href='<?php site_ops_instagram(); ?>' target='_blank' rel="noopener"><i class='fab fa-instagram'></i></a></span><?php } ?>
				<?php if(!empty(site_ops_yelp(false))){ ?><span><a href='<?php site_ops_yelp(); ?>' target='_blank' rel="noopener"><i class='fab fa-yelp'></i></a></span><?php } ?>
          </div>
            
        </div>
        
      </div>
    
    </div>
  </div>
  
  <div class="footer-bottom">
    <div class="row">
     
      <ul class="social">
				<?php if(!empty(site_ops_facebook(false))){ ?><li><a href='<?php site_ops_facebook(); ?>' target='_blank' rel="noopener"><i class='fab fa-facebook-f'></i></a></li><?php } ?>
				<?php if(!empty(site_ops_twitter(false))){ ?><li><a href='<?php site_ops_twitter(); ?>' target='_blank' rel="noopener"><i class='fab fa-twitter'></i></a></li><?php } ?>
				<?php if(!empty(site_ops_linkedin(false))){ ?><li><a href='<?php site_ops_linkedin(); ?>' target='_blank' rel="noopener"><i class='fab fa-linkedin-in'></i></a></li><?php } ?>
				<?php if(!empty(site_ops_google_plus(false))){ ?><li><a href='<?php site_ops_google_plus(); ?>' target='_blank' rel="noopener"><i class='fab fa-google-plus-g'></i></a></li><?php } ?>
				<?php if(!empty(site_ops_youtube(false))){ ?><li><a href='<?php site_ops_youtube(); ?>' target='_blank' rel="noopener"><i class='fab fa-youtube'></i></a></li><?php } ?>
				<?php if(!empty(site_ops_instagram(false))){ ?><li><a href='<?php site_ops_instagram(); ?>' target='_blank' rel="noopener"><i class='fab fa-instagram'></i></a></li><?php } ?>
				<?php if(!empty(site_ops_yelp(false))){ ?><li><a href='<?php site_ops_yelp(); ?>' target='_blank' rel="noopener"><i class='fab fa-yelp'></i></a></li><?php } ?>
			</ul>      
			
			<ul class="legal">
        <li>Dental Website by <a href="http://dentalrevenue.com">Dental Revenue</a></li>
        <li><a href="/sitemap">Sitemap</a></li>
        <li><a href="/privacy-policy">Privacy Policy</a></li>
        <li><a href="/terms">Terms of Use</a></li>
        <li><a href="/accessibility">Accessibility</a></li>
      </ul>
    
    </div>
  </div>
  
  <?php if(site_ops_side_tabs_active(false) == 'yes_no_social' || site_ops_side_tabs_active(false) == 'yes_social'){ ?>
  
	  <div class="social-side-tabs"> 
		  
		  <?php 
			  $social_side_tabs = site_ops_side_tabs_repeat(false);
			  foreach ( (array) $social_side_tabs as $key => $side_tab ) {
				  $side_tab_title_long = $side_tab_title_short = $side_tab_icon = $side_tab_link = $side_tab_color = '';
				  if(isset($side_tab['tab_long_title'])){ $side_tab_title_long = esc_html( $side_tab['tab_long_title'] ); }
				  if(isset($side_tab['tab_short_title'])){ $side_tab_title_short = esc_html( $side_tab['tab_short_title'] ); }
				  if(isset($side_tab['tab_icon'])){ $side_tab_icon = esc_html( $side_tab['tab_icon'] ); }
				  if(isset($side_tab['tab_link_url'])){ $side_tab_link = esc_html( $side_tab['tab_link_url'] ); }
				  if(isset($side_tab['tab_color'])){ $side_tab_color = esc_html( $side_tab['tab_color'] ); }
			?>
				<?php if($side_tab_title_long != ''){ ?>
			  <a href="<?php echo $side_tab_link; ?>" class="social-side-tab" style="background-color:<?php echo $side_tab_color; ?>;">
					<span><i class="<?php echo $side_tab_icon; ?>"></i> <?php echo $side_tab_title_short; ?></span>
					<span><?php echo $side_tab_title_long; ?></span>
			  </a>
				<?php } ?>
		  <?php 
			  } 
			  
			  if(site_ops_side_tabs_active(false) == 'yes_social'){
			?>
		  
		  <?php if(!empty(site_ops_facebook(false))){ ?>
			  <a href="<?php site_ops_facebook(); ?>" class="social-side-tab" style="background-color:#3b5998;" target="_blank" rel="noopener">
					<span><i class="fab fa-facebook-f"></i> Like Us</span>
					<span>Like Us On Facebook</span>
			  </a>
			<?php } ?>
			<?php if(!empty(site_ops_google_plus(false))){ ?>
			  <a href="<?php site_ops_google_plus(); ?>" class="social-side-tab" style="background-color:#dd4b39;" target="_blank" rel="noopener">
					<span><i class="fab fa-google-plus-g"></i> Reviews</span>
					<span>Read Our Google Reviews</span>
			  </a>
			<?php } ?>
			<?php if(!empty(site_ops_youtube(false))){ ?>
			  <a href="<?php site_ops_youtube(); ?>" class="social-side-tab" style="background-color:#c4302b;" target="_blank" rel="noopener">
					<span><i class="fab fa-youtube"></i> Watch</span>
					<span>Watch Our Youtube Videos</span>
			  </a>
			<?php } ?>
			<?php if(!empty(site_ops_yelp(false))){ ?>
			  <a href="<?php site_ops_yelp(); ?>" class="social-side-tab" style="background-color:#b62717;" target="_blank" rel="noopener">
					<span><i class="fab fa-yelp"></i> Reviews</span>
					<span>Read Our Yelp Reviews</span>
			  </a>
			 <?php } ?>
		  
		  <?php } ?>
	  </div>
	
	<?php } ?>
  
</footer>
</div> <!-- end page wrap -->
