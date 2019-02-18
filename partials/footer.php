<footer>
  
  <div class="footer-top">
    <div class="row">
    
      <div class="footer-left google-map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12096.416292877355!2d-73.99359366652621!3d40.7157253833263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25980805f939b%3A0x988ab4c5b9ea32ea!2sNew+York%2C+NY+10002!5e0!3m2!1sen!2sus!4v1457465176347" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>      </div>
      
      <div class="footer-right" itemscope itemtype="http://schema.org/Dentist">
        
        <div class="footer-column">
          <a href="/" class="logo"><span itemprop="name"><img src="<?php site_ops_logo(); ?>" alt="<?php site_ops_practice_name(); ?>" /></span></a>
        </div>
        
        <div class="footer-column">      
          <div class="contact-option">
            <i class="fas fa-map-marker-alt"></i>
            <p>
              <span itemprop="streetAddress"><?php site_ops_address(); ?></span><br />
              <span class="bold">
                <span itemprop="addressLocality"><?php site_ops_city(); ?></span>,
                <span itemprop="addressRegion"><?php site_ops_state(); ?></span>
                <span itemprop="postalCode"><?php site_ops_zip(); ?></span>
              </span>
            </p>
          </div>
          <?php if(!empty(site_ops_new_patient_phone(false))){ ?>
          <div class="contact-option">
            <i class="fas fa-phone fa-flip-horizontal"></i>
            <p>New Patients <span class="bold"><?php site_ops_new_patient_phone(); ?></span></p>
          </div> 
          <?php } ?>
          <?php if(!empty(site_ops_current_patient_phone(false))){ ?>
          <div class="contact-option">
            <i class="fas fa-phone fa-flip-horizontal"></i>
            <p>Current Patients <span class="bold"><?php site_ops_current_patient_phone(); ?></span></p>
          </div> 
          <?php } ?>
          <a href="/schedule-appointment/" class="btn outline schedule"><?php site_ops_cta_text(); ?></a>
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
            <p>New Patients <span class="bold"><?php site_ops_new_patient_phone(); ?></span></p>
          </div>
          <div class="option">
            <i class="fas fa-phone fa-flip-horizontal"></i>
            <p>Current Patients <span class="bold"><?php site_ops_current_patient_phone(); ?></span></p>
          </div>
          <div class="option">
            <i class="fas fa-map-marker-alt"></i>
            <p>
              <span itemprop="streetAddress"><?php site_ops_address(); ?></span><br />
							<span class="bold">
              	<span itemprop="addressLocality"><?php site_ops_city(); ?></span>,
								<span itemprop="addressRegion"><?php site_ops_state(); ?></span>
								<span itemprop="postalCode"><?php site_ops_zip(); ?></span>
							</span>
          	</p>
          </div>
          <div class="option">
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
        
      </div>
    
    </div>
  </div>
  
  <div class="footer-bottom">
    <div class="row">
     
      <ul class="social">
				<?php if(!empty(site_ops_facebook(false))){ ?><li><a href='<?php site_ops_facebook(); ?>'><i class='fab fa-facebook-f'></i></a></li><?php } ?>
				<?php if(!empty(site_ops_twitter(false))){ ?><li><a href='<?php site_ops_twitter(); ?>'><i class='fab fa-twitter'></i></a></li><?php } ?>
				<?php if(!empty(site_ops_linkedin(false))){ ?><li><a href='<?php site_ops_linkedin(); ?>'><i class='fab fa-linkedin-in'></i></a></li><?php } ?>
				<?php if(!empty(site_ops_google_plus(false))){ ?><li><a href='<?php site_ops_google_plus(); ?>'><i class='fab fa-google-plus-g'></i></a></li><?php } ?>
				<?php if(!empty(site_ops_youtube(false))){ ?><li><a href='<?php site_ops_youtube(); ?>'><i class='fab fa-youtube'></i></a></li><?php } ?>
				<?php if(!empty(site_ops_instagram(false))){ ?><li><a href='<?php site_ops_instagram(); ?>'><i class='fab fa-instagram'></i></a></li><?php } ?>
				<?php if(!empty(site_ops_yelp(false))){ ?><li><a href='<?php site_ops_yelp(); ?>'><i class='fab fa-yelp'></i></a></li><?php } ?>
			</ul>      
			
			<ul class="legal">
        <li>Dental Website by <a href="http://dentalrevenue.com">Dental Revenue</a></li>
        <li><a href="/sitemap">Sitemap</a></li>
        <li><a href="/privacy">Privacy Policy</a></li>
        <li><a href="/terms">Terms of Use</a></li>
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
			
			  <a href="<?php echo $side_tab_link; ?>" class="social-side-tab" style="background-color:<?php echo $side_tab_color; ?>;">
					<span><i class="<?php echo $side_tab_icon; ?>"></i> <?php echo $side_tab_title_short; ?></span>
					<span><?php echo $side_tab_title_long; ?></span>
			  </a>
		  
		  <?php 
			  } 
			  
			  if(site_ops_side_tabs_active(false) == 'yes_social'){
			?>
		  
		  <?php if(!empty(site_ops_facebook(false))){ ?>
			  <a href="<?php site_ops_facebook(); ?>" class="social-side-tab" style="background-color:#3b5998;">
					<span><i class="fab fa-facebook-f"></i> Like Us</span>
					<span>Like Us On Facebook</span>
			  </a>
			<?php } ?>
			<?php if(!empty(site_ops_google_plus(false))){ ?>
			  <a href="<?php site_ops_google_plus(); ?>" class="social-side-tab" style="background-color:#dd4b39;">
					<span><i class="fab fa-google-plus-g"></i> Reviews</span>
					<span>Read Our Google Reviews</span>
			  </a>
			<?php } ?>
			<?php if(!empty(site_ops_yelp(false))){ ?>
			  <a href="<?php site_ops_yelp(); ?>" class="social-side-tab" style="background-color:#b62717;">
					<span><i class="fab fa-yelp"></i> Reviews</span>
					<span>Read Our Yelp Reviews</span>
			  </a>
			 <?php } ?>
		  
		  <?php } ?>
	  </div>
	
	<?php } ?>
  
</footer>

</div> <!-- end page wrap -->