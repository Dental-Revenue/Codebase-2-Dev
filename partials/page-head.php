<?php
	$appearance_info = get_option( 'appearance_info');
	$page_head_img = '';
	if(isset($appearance_info['page_head_img'])){ $page_head_img = $appearance_info['page_head_img']; }
	
	function std_page_head_info(){
		 if(is_archive()){ ?>
      
      <?php if (is_category()) { ?>
        <h1>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h1>
      <?php }elseif( is_tag() ){ ?>
        <h1>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>
      <?php }elseif( is_author() ){ ?>
        <h1>Author Archive</h1>
      <?php }elseif( isset($_GET['paged']) && !empty($_GET['paged']) ){ ?>
        <h1>Blog Archives</h1>
      <?php } ?>
      
    <?php }else if(is_home()){ ?>
      
      <h1><?php if (get_the_h1()) {  the_h1(); }else{ echo "Blog"; } ?></h1> 
    
    <?php }else if(is_404()){ ?>  
    
      <h1>404 Not Found</h1>
    
    <?php }else{ ?>  
			
			<h1><?php if (get_the_h1()) { the_h1(); }else{ the_title(); } ?></h1>
		
		<?php }
	}
?>

<?php if(empty($page_head_img)){ ?>

<div class="page-head no-img-bg">
	<div class="row"> 
  	
  	<?php if (function_exists('yoast_breadcrumb')){yoast_breadcrumb('<p class="breadcrumbs">','</p>');} ?>
  	
  	<?php std_page_head_info(); ?>
		
	</div>
</div>

<?php } else { ?>


<div class="page-head img-bg" style="background-image:url(<?php echo $page_head_img; ?>);">
	<div class="page-head-overlay"></div>
	<div class="row"> 
		
		<?php std_page_head_info(); ?>
				
	</div>
	
	<?php if (function_exists('yoast_breadcrumb')){yoast_breadcrumb('<div class="breadcrumbs"><div class="row">','</div></div>');} ?>
</div>

<?php } ?>