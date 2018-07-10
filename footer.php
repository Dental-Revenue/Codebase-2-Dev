  <?php get_template_part( 'partials/footer' ); ?>

  <?php wp_footer(); ?>
  
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