<?php
	
add_action( 'edit_form_after_editor', 'generate_block_cta' );
function generate_block_cta( $post ) {
?>
  <div class="block-cta postbox">
	  <h2>DR Module Manager</h2>
	  <div class="inside clearfix">
		  <?php if(!empty($_GET['post'])){ ?>
	  		<p>Add and order any modules from the DR module library.</p>
				<a href="/wp-admin/admin.php?page=manage-modules&editing=<?php echo $_GET['post']; ?>" class="button button-primary button-large">Manage Modules</a>
			<?php } else { ?>
				<p>Please publish this post or save to a draft before adding modules.</p>
			<?php } ?>
	  </div>
  </div>
<?php }
	




add_filter( 'wpseo_metabox_prio', function() { return 'low'; } );




add_action( 'admin_menu', 'homepage_menu' );

function homepage_menu() {
	add_submenu_page( 
		'Hidden!',
		'Manage Modules',
		'Hidden!',
		'manage_options',
		'manage-modules',
		'render_modules'
	);
}

function render_modules(){ ?>

	<?php
	  global $wpdb;
	  $editing = $_GET['editing'];
	 ?>
	
	<div class="wrap module-manager">
		
		
		<div class="mm-header clearfix">
    	<h1>Manage Modules: <span><?php echo get_the_title($editing); ?></span></h1>
    	<a href="/wp-admin/post.php?post=<?php echo $editing; ?>&action=edit" class="page-title-action">Page Editor</a>
		</div>
		
		
		<div class="row">
			
			
			<div class="columns four">
				<div class="mm-form">
					<form method="post" action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>">
						<h2>Add Module</h2>
						<label>Module #</label>
						<select name="module_name">
							<option value="fold_slider">Fold Slider</option>
							<option value="fold_slider_2">Fold Slider 2</option>
							<option value="fold_slices">Fold Slices</option>
							<option value="fold_boxes">Fold Boxes</option>
							<option value="fold_mobile">Fold Mobile</option>
							<option value="fold_mobile_2">Fold Mobile 2</option>
							<option>------------------</option>
							<option value="static_mini_blocks">Static Mini Blocks</option>
							<option value="static_big_small">Static Big/Small</option>
							<option value="static_big_small_hover">Static Big/Small Hover</option>
							<option value="static_big_big">Static Big/Big</option>
							<option value="static_intro_section">Static Intro Section</option>
							<option value="static_block_grid">Static Block Grid</option>
							<option value="static_cta_fold">Static CTA Fold</option>
							<option value="static_image_split">Static Image Split</option>
							<option value="static_image_offset">Static Image Offset</option>
							<option value="static_blocks_list">Static Blocks List</option>
							<option value="static_photo_list">Static Photo List</option>
							<option value="static_image_content">Static Image Content</option>
							<option value="static_side_by_side">Static Side By Side</option>
							<option value="static_multiple_col">Static Multiple Columns</option>
							<option value="static_tabs">Static Tabs</option>
							<option value="static_4_up">Static 4-Up</option>
							<option value="static_5_up">Static 5-Up</option>
							<option value="static_embed">Static Embed</option>
							<option>------------------</option>
							<option value="breaker">Breaker</option>
							<option value="specials_breaker">Specials Breaker</option>
							<option value="spacer">Spacer</option>
							<option>------------------</option>
							<option value="carousel_1">Carousel 1</option>
							<option value="carousel_2">Carousel 2</option>
							<option value="carousel_3">Carousel 3</option>
							<option>------------------</option>
							<option value="blog_big_small">Blog Big Small</option>
							<option value="blog_columns">Blog Columns</option>
							<option value="blog_full_width">Blog Full Width</option>
							<option>------------------</option>
							<option value="logo_scroll">Logo Scroll</option>
							<option value="reviews_testimonials_fold">Reviews Testimonials Fold</option>
							<option value="reviews_testimonials_carousel">Reviews Testimonials Carousel</option>
							<option value="reviews_testimonials_grid">Reviews Testimonials Grid</option>
							<option value="reviews_google">Reviews Google</option>
						</select>
						<label>Module Name</label>
						<input type="text" name="module_display_name" />
						<p>Both Fields are required. The module name is for admin organization only</p>
						<input type="hidden" name="editing" value="<?php echo $editing; ?>" />
						<input type="hidden" name="action" value="add_module">
						<button type="submit" class="button button-primary button-large">Add Module</button>
    			</form>
				</div>
			</div>
			
			
			<div class="columns eight" id="sortable">
				
				<?php
				$modules = $wpdb->get_results( "SELECT * FROM modules WHERE page = ".$editing." ORDER BY display_order ASC");
				foreach($modules as $m){ ?>
					<div class='hp-module-block' data-instance="<?php echo $m->id; ?>">
						<h2><?php echo $m->name; ?></h2>
						<?php
							$str = $m->module;
							$str = str_replace("_"," ",$str);
							$str = ucwords(strtolower($str));
						?>
						<p>Module: <?php echo $str; ?></p>
						<form method="post" action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>">
							<input type="hidden" name="instance" value="<?php echo $m->id; ?>" />
							<input type="hidden" name="editing" value="<?php echo $editing; ?>" />
							<input type="hidden" name="action" value="delete_module">
							<button type="submit" class="module-trash page-title-action">x</button>
    				</form>
					</div>
				<?php } ?>
				
			</div>

 
	</div><!-- .wrap -->
	
<?php }
	
	
	
add_action( 'admin_post_add_module', 'add_module' );

function add_module() {
  
  global $wpdb;
  $editing = $_POST['editing'];
  $wpdb->insert( 
	  "modules", 
	  	array(  
	  		'module' => $_POST['module_name'],
	  		'name' => $_POST['module_display_name'],
	  		'page' => $editing
	  	), 
	  	array('%s','%s','%d') 
	);
	
	wp_redirect( '/wp-admin/admin.php?page=manage-modules&editing='.$editing );
	exit;
    
}


add_action( 'admin_post_delete_module', 'delete_module' );

function delete_module() {
  
  global $wpdb;
  $editing = $_POST['editing'];
  $wpdb->delete( 
	  "modules", 
	  	array(  
	  		'id' => $_POST['instance']
	  	), 
	  	array('%d') 
	);
	
	wp_redirect( '/wp-admin/admin.php?page=manage-modules&editing='.$editing );
	exit;
    
}


add_action("wp_ajax_update_module_order", "update_module_order");
function update_module_order() {

  global $wpdb;
  $result = $wpdb->update( 
	  "modules", 
	  	array(  
	  		'display_order' => $_REQUEST['order']
	  	),
	  	array(  
	  		'id' => $_REQUEST['instance']
	  	), 
	  	array('%d'),
	  	array('%d')
	);
	if($result===FALSE){
		echo 'error';
	}else{
		echo 'success';
	}

}




?>
