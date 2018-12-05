<header class="header test-duck">  
  
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
        <ul id="menu-primary-navigation" class="menu"><li id="menu-item-30" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-30"><a href="http://ds1demo1.wpengine.com/our-office/">Our Office</a>
<ul class="sub-menu">
	<li id="menu-item-100" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-100"><a href="http://ds1demo1.wpengine.com/our-office/tour-our-office/">Tour Our Office</a></li>
	<li id="menu-item-98" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-98"><a href="http://ds1demo1.wpengine.com/our-office/meet-dr-newzick/">Meet Dr. Newzick</a></li>
	<li id="menu-item-99" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-99"><a href="http://ds1demo1.wpengine.com/our-office/meet-our-team/">Meet Our Team</a></li>
</ul>
</li>
<li id="menu-item-29" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-29"><a href="http://ds1demo1.wpengine.com/our-services/">Our Services</a>
<ul class="sub-menu">
	<li id="menu-item-52" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-52"><a href="http://ds1demo1.wpengine.com/our-services/general-dentistry/">General Dentistry</a>
	<ul class="sub-menu">
		<li id="menu-item-102" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-102"><a href="http://ds1demo1.wpengine.com/our-services/general-dentistry/family-dentistry/">Family Dentistry</a></li>
		<li id="menu-item-51" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-51"><a href="http://ds1demo1.wpengine.com/our-services/general-dentistry/preventative-care/">Preventative Care</a></li>
		<li id="menu-item-50" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-50"><a href="http://ds1demo1.wpengine.com/our-services/general-dentistry/dental-bonding/">Dental Bonding</a></li>
		<li id="menu-item-49" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-49"><a href="http://ds1demo1.wpengine.com/our-services/general-dentistry/root-canals/">Root Canals</a></li>
		<li id="menu-item-48" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-48"><a href="http://ds1demo1.wpengine.com/our-services/general-dentistry/tooth-extractions/">Tooth Extractions</a></li>
	</ul>
</li>
	<li id="menu-item-53" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-53"><a href="http://ds1demo1.wpengine.com/our-services/cosmetic-dentistry/">Cosmetic Dentistry</a>
	<ul class="sub-menu">
		<li id="menu-item-56" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-56"><a href="http://ds1demo1.wpengine.com/our-services/cosmetic-dentistry/invisible-braces/">Invisible Braces</a></li>
		<li id="menu-item-55" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-55"><a href="http://ds1demo1.wpengine.com/our-services/cosmetic-dentistry/porcelain-veneers/">Porcelain Veneers</a></li>
		<li id="menu-item-54" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-54"><a href="http://ds1demo1.wpengine.com/our-services/cosmetic-dentistry/teeth-whitening/">Teeth Whitening</a></li>
	</ul>
</li>
	<li id="menu-item-57" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-57"><a href="http://ds1demo1.wpengine.com/our-services/restorative-dentistry/">Restorative Dentistry</a>
	<ul class="sub-menu">
		<li id="menu-item-62" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-62"><a href="http://ds1demo1.wpengine.com/our-services/restorative-dentistry/dental-crowns/">Dental Crowns</a></li>
		<li id="menu-item-61" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-61"><a href="http://ds1demo1.wpengine.com/our-services/restorative-dentistry/dental-bridges/">Dental Bridges</a></li>
		<li id="menu-item-60" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-60"><a href="http://ds1demo1.wpengine.com/our-services/restorative-dentistry/dental-implants/">Dental Implants</a></li>
		<li id="menu-item-59" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-59"><a href="http://ds1demo1.wpengine.com/our-services/restorative-dentistry/dentures-and-partials/">Dentures and Partials</a></li>
		<li id="menu-item-58" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-58"><a href="http://ds1demo1.wpengine.com/our-services/restorative-dentistry/tmj-therapy/">TMJ Therapy</a></li>
	</ul>
</li>
</ul>
</li>
<li id="menu-item-28" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-28"><a href="http://ds1demo1.wpengine.com/dental-concerns/">Dental Concerns</a>
<ul class="sub-menu">
	<li id="menu-item-72" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-72"><a href="http://ds1demo1.wpengine.com/dental-concerns/frequent-headaches/">Frequent Headaches</a></li>
	<li id="menu-item-71" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-71"><a href="http://ds1demo1.wpengine.com/dental-concerns/bleeding-gums/">Bleeding Gums</a></li>
	<li id="menu-item-70" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-70"><a href="http://ds1demo1.wpengine.com/dental-concerns/teeth-grinding/">Teeth Grinding</a></li>
	<li id="menu-item-69" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-69"><a href="http://ds1demo1.wpengine.com/dental-concerns/tooth-cavities/">Tooth Cavities</a></li>
	<li id="menu-item-68" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-68"><a href="http://ds1demo1.wpengine.com/dental-concerns/crooked-teeth/">Crooked Teeth</a></li>
</ul>
</li>
<li id="menu-item-27" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-27"><a href="http://ds1demo1.wpengine.com/for-patients/">For Patients</a>
<ul class="sub-menu">
	<li id="menu-item-78" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-78"><a href="http://ds1demo1.wpengine.com/for-patients/hours-location/">Hours &#038; Location</a></li>
	<li id="menu-item-77" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-77"><a href="http://ds1demo1.wpengine.com/for-patients/patient-forms/">Patient Forms</a></li>
	<li id="menu-item-76" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-76"><a href="http://ds1demo1.wpengine.com/for-patients/payment-and-insurance/">Payment and Insurance</a></li>
</ul>
</li>
<li id="menu-item-26" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26"><a href="http://ds1demo1.wpengine.com/smile-gallery/">Smile Gallery</a></li>
</ul>        <a href="/schedule-appointment/" class="schedule btn sm outline">Schedule Appointment</a>
      </nav>
      
      <nav class="mobile-nav ">
        <a href="#" id="panel-main"><i class="icon ion-navicon"></i><span>Menu</span></a>
                <a href="#"><i class="icon ion-ios-calendar-outline"></i><span>Schedule Appt</span></a>
        <a href="#" id="panel-more"><i class="icon ion-ios-more-outline"></i><span>More Info</span></a>
      </nav>
    
    </div>
  </div>
  
  
</header>