<?php
	$appearance_info = get_option( 'appearance_info');
	$nav_style = $appearance_info['nav_style'];
	$extra_header_classes = '';
	$extra_header_classes .= !empty(site_ops_notification_message(false)) ? ' notification-active' : '' ;
?>

<header class="header<?php echo $extra_header_classes; ?>"> 

<?php if(!empty(site_ops_notification_message(false))){
	$notification_invert_color = getColorLightness()<700 ? ' invert' : '' ;
?>
	<div class="header-notification<?php echo $notification_invert_color; ?>">
		<div class="row">
			<p><?php site_ops_notification_message(); ?></a></p>
		</div>
	</div>
<?php } ?>

<?php if ($nav_style == 'header-style-a') { ?> 
	  
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
					<a href="/schedule-appointment/" class="schedule btn sm outline"><?php site_ops_cta_text(); ?></a>
	      </nav>
	      
	      <nav class="mobile-nav ">
	        <a href="#" id="panel-main"><i class="fas fa-bars"></i><span>Menu</span></a>
	                <a href="#"><i class="far fa-calendar-alt"></i><span>Schedule Appt</span></a>
	        <a href="#" id="panel-more"><i class="fas fa-info"></i><span>More Info</span></a>
	      </nav>
	    
	    </div>
	  </div>
	  
	  
<?php } else if ($nav_style == 'header-style-b') { ?>
	  
	  <div class="header-style-b-contain">
		  <div class="header-logo">
		    <h1><a class="logo" href="/"><img src="<?php site_ops_logo(); ?>" alt="<?php site_ops_practice_name(); ?>" /></a></h1>  
		  </div>
		  
		  <div class="header-bottom">
		    
		      <nav class="large-nav">
		        <?php wp_nav_menu(array('container' => '')); ?>        
						<a href="/schedule-appointment/" class="schedule btn sm outline"><?php site_ops_cta_text(); ?></a>
		      </nav>
		      
		      <nav class="mobile-nav ">
		        <a href="#" id="panel-main"><i class="fas fa-bars"></i><span>Menu</span></a>
		                <a href="#"><i class="far fa-calendar-alt"></i><span>Schedule Appt</span></a>
		        <a href="#" id="panel-more"><i class="fas fa-info"></i><span>More Info</span></a>
		      </nav>
		    
		    </div>
		  </div>
		</div>
	
<?php } else if ($nav_style == 'header-style-c') { ?>	 
	  
	  <div class="header-logo">
	    <h1>    <a class="logo" href="/"><img src="<?php site_ops_logo(); ?>" alt="<?php site_ops_practice_name(); ?>" /></a>
	    </h1>  </div>
	  
	  <div class="header-top">
	    <div class="row">
	      
        <div class="contact-option street-address">
          <i class="fas fa-map-marker-alt"></i>
          <p><?php site_ops_address(); ?> <span class="bold"><?php echo site_ops_city(false).', '.site_ops_state(false).' '.site_ops_zip(false); ?></span></p>
        </div>
        <?php if(!empty(site_ops_current_patient_phone(false))){ ?>
        <div class="contact-option">
          <i class="fas fa-phone fa-flip-horizontal"></i>
          <p>Current Patients <span class="bold"><?php site_ops_current_patient_phone(); ?></span></p>
        </div> 
        <?php } ?> 
	      <?php if(!empty(site_ops_new_patient_phone(false))){ ?>
        <div class="contact-option">
          <i class="fas fa-phone fa-flip-horizontal"></i>
          <p>New Patients <span class="bold"><?php site_ops_new_patient_phone(); ?></span></p>
        </div> 
        <?php } ?>  
	    
	    </div>
	  </div>
	  
	  
	  <div class="header-bottom">
	    <div class="row full">
	    
	      <nav class="large-nav">
	        <?php wp_nav_menu(array('container' => '')); ?>        
					<a href="/schedule-appointment/" class="schedule btn sm outline"><?php site_ops_cta_text(); ?></a>
	      </nav>
	      
	      <nav class="mobile-nav ">
	        <a href="#" id="panel-main"><i class="fas fa-bars"></i><span>Menu</span></a>
	                <a href="#"><i class="far fa-calendar-alt"></i><span><?php site_ops_cta_text(); ?></span></a>
	        <a href="#" id="panel-more"><i class="fas fa-info"></i><span>More Info</span></a>
	      </nav>
	    
	    </div>
	  </div>

<?php } ?>

</header> 