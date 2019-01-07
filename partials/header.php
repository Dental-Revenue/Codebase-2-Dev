<?php
	$appearance_info = get_option( 'appearance_info');
	$nav_style = $appearance_info['nav_style'];

?>

<?php if ($nav_style == 'style-a') { ?>
	<header class="header <?php echo $nav_style; ?>">  
	  
	  <div class="header-logo">
	    <h1>    <a class="logo" href="/"><img src="<?php site_ops_logo(); ?>" alt="<?php site_ops_practice_name(); ?>" /></a>
	    </h1>  </div>
	  
	  <div class="header-top">
	    <div class="row full">
	      
	      <div class="header-contact">
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
	          <div class="contact-option street-address">
	            <i class="fas fa-map-marker-alt"></i>
	            <p><?php site_ops_address(); ?> <span class="bold"><?php echo site_ops_city(false).', '.site_ops_state(false).' '.site_ops_zip(false); ?></span></p>
	          </div> 
	      </div>
	    
	    </div>
	  </div>
	  
	  
	  <div class="header-bottom">
	    <div class="row full">
	    
	      <nav class="large-nav">
	        <?php wp_nav_menu(array('container' => '')); ?>        
					<a href="/schedule-appointment/" class="schedule btn sm outline">Schedule Appointment</a>
	      </nav>
	      
	      <nav class="mobile-nav ">
	        <a href="#" id="panel-main"><i class="icon ion-navicon"></i><span>Menu</span></a>
	                <a href="#"><i class="icon ion-ios-calendar-outline"></i><span>Schedule Appt</span></a>
	        <a href="#" id="panel-more"><i class="icon ion-ios-more-outline"></i><span>More Info</span></a>
	      </nav>
	    
	    </div>
	  </div>
	  
	  
	</header> 
<?php } else if ($nav_style == 'style-b') { ?>
<header class="header <?php echo $nav_style; ?>">  
	  
	  <div class="header-logo">
	    <h1><a class="logo" href="/"><img src="<?php site_ops_logo(); ?>" alt="<?php site_ops_practice_name(); ?>" /></a></h1>  
	  </div>
	  
	  
	  
	  <div class="header-bottom">
	    <div class="row full">
	    
	      <nav class="large-nav">
	        <?php wp_nav_menu(array('container' => '')); ?>        
					<a href="/schedule-appointment/" class="schedule btn sm outline">Schedule Appointment</a>
	      </nav>
	      
	      <nav class="mobile-nav ">
	        <a href="#" id="panel-main"><i class="icon ion-navicon"></i><span>Menu</span></a>
	                <a href="#"><i class="icon ion-ios-calendar-outline"></i><span>Schedule Appt</span></a>
	        <a href="#" id="panel-more"><i class="icon ion-ios-more-outline"></i><span>More Info</span></a>
	      </nav>
	    
	    </div>
	  </div>
	  
	  
	</header>

<?php } ?>