<div class="pagination">
	
	<?php if(is_single()){ ?>
	  
	  <div class="basic-pagination">
      <?php previous_post_link('%link', 'Previous Post', FALSE); ?>
      <?php next_post_link('%link', 'Next Post', FALSE); ?>
	  </div>
	
	<?php }else{ ?>
	  
	  <ul class="numbered-pagination">
		  <?php numeric_posts_nav(); ?>
	  </ul>
	  
	<?php } ?>
	
</div>