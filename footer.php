  <?php get_template_part( 'partials/footer' ); ?>

  <?php wp_footer(); ?>
  
  <!-- recaptcha v3 script -->
  <?php if(!empty(site_ops_recaptcha(false)) && is_page_template('page-templates/template-schedule.php')){ ?>	
  <script>
  grecaptcha.ready(function() {
    // do request for recaptcha token
    // response is promise with passed token
        grecaptcha.execute('<?php echo site_ops_recaptcha(); ?>', {action:'validate_captcha'})
                  .then(function(token) {
            // add token value to form
            document.getElementById('g-recaptcha-response').value = token;
        });
    });
  </script>
  <?php }  ?>
  
	<?php //Thank You Conversion Code	
  if(is_page('thank-you') && getOption('thank_you_conversion') && getOption('thank_you_conversion')!=''){
	  showOption('thank_you_conversion');
  } ?>
  
	<?php //Convirza Script
	if(getOption('convirza_id') && getOption('convirza_id')!='' && !isset($_GET['TrackNum']) && !isset($_COOKIE['TrackNum'])){ ?>
		<script type="text/javascript">
		$(document).ready(function(){
			if(!Cookies.get('TrackNum') || Cookies.get('TrackNum')==''){
				
				var script = document.createElement('script');
				script.onload = function () {
					function dniLoadingTimer() {
						if(typeof(getDNIRecord) == "function"){
							getDNIRecord("<?php echo getOption('convirza_id'); ?>", "dni.logmycalls.com");
				  	}else{
					  	setTimeout(dniLoadingTimer, 100);
				  	}
					}
					setTimeout(dniLoadingTimer, 100);
				};
				script.src = 'https://dni.logmycalls.com/dni.js?app_id=CT';
				document.head.appendChild(script);
				
			}
		});
		</script>
	<?php } ?>
  
</body>
</html>