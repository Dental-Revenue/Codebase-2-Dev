<?php
	
// ================================================ BUILD SIDEBARS
if (function_exists('register_sidebar')){
  register_sidebar(
    array(
    'name' => __( 'Default Sidebar'),
    'id' => 'default-sidebar',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    )
  );
}

// Register and load all widgets

function wpb_load_widget() {
  register_widget( 'widget_appt' );
  register_widget( 'widget_blog' );
  
  register_widget( 'widget_gallery' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

//Schedule Appointment Widget 
class widget_appt extends WP_Widget {
  
  function __construct() {parent::__construct('appt', __('Appointment Button', 'widget_form_domain'));}
  
  public function widget( $args, $instance ) {
    $btn_text = $instance['title'];
    echo $args['before_widget']; ?>
      <?php $page = get_pages(array('meta_key' => '_wp_page_template','meta_value' => 'page-templates/template-schedule.php')); ?>
      <a href="<?php echo get_permalink($page[0]->ID); ?>">
        <?php if($btn_text && $btn_text!=''){ echo $btn_text; }else{ site_ops_cta_text(); } ?>
      </a>
    <?php echo $args['after_widget'];
  }
		
  public function form( $instance ) {
    if (isset($instance[ 'title' ])){ $title = $instance[ 'title' ];}else{$title = __( site_ops_cta_text(false), 'widget_form_domain' );}
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Button Text:</label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php
  }
	
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
      return $instance;
  }
}


//Blog Widget 

class widget_blog extends WP_Widget {
  
  function __construct() {parent::__construct('blog', __('Blog Posts', 'widget_blog_domain'), array( 'description' => __( 'Shows 3 recent post titles. Control the specific category on each page.', 'widget_blog_domain' ), ));}
  
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    $queried_object = get_queried_object();
    if ( $queried_object ) { $post_id = $queried_object->ID; }
    echo $args['before_widget'];
    if (!empty($title)){echo $args['before_title'] . $title . $args['after_title'];}
    $blog_args = array( 'post_type' => 'post', 'orderby' => 'post_date','order' => 'DESC','posts_per_page' => 3 );
    if(get_post_meta( $post_id, 'meta_sidebar_category', true )!=''){$blog_args['cat'] = get_post_meta( $post_id, 'meta_sidebar_category', true );}
    $loop = new WP_Query( $blog_args );
    while ( $loop->have_posts() ) : $loop->the_post();
      echo "<a href='".get_the_permalink()."'>".get_the_title()."</a>";
    endwhile;
    echo $args['after_widget'];
  }
		
  public function form( $instance ) {
    if (isset($instance[ 'title' ])){ $title = $instance[ 'title' ];}else{$title = __( 'From Our Blog', 'widget_blog_domain' );}
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php
  }
	
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
      return $instance;
  }

}


// Gallery Widget

if(!class_exists('widget_gallery')){
class widget_gallery extends WP_Widget {
  
  function __construct() {parent::__construct('gallery', __('Smile Gallery', 'widget_form_domain'));}
  
  public function widget( $args, $instance ) {
    
    $queried_object = get_queried_object();
    if($queried_object){
      $post_id = $queried_object->ID;
      $hide_widget = get_post_meta($post_id, 'widget_gallery_show', true);
      $widget_cat = get_post_meta($post_id, 'widget_gallery_cat', true);
    }
    
    if(!$hide_widget){
    
      $title = $instance['title'];
      echo $args['before_widget'];
      if (!empty($title)){echo $args['before_title'] . $title . $args['after_title'];}      
        
      if($post_id){
        
        echo "<div class='slick-widget-gallery'>";
        
        $gallery_args = array( 'post_type' => 'smile_gallery', 'orderby' => 'post_date','order' => 'DESC','posts_per_page' => 8 );
        if($widget_cat){
          $gallery_args = array( 'post_type' => 'smile_gallery', 'orderby' => 'post_date','order' => 'DESC','posts_per_page' => 8, 'meta_query' => array(array('key' => 'meta_patient_categories','value' => $widget_cat,'compare' => 'LIKE')));
        }
        $loop = new WP_Query( $gallery_args );
        while ( $loop->have_posts() ) : $loop->the_post();
        
        	echo "<a href='#' class='slick-widget-gallery-img'>";
        
        	if(!get_post_meta(get_the_ID(), 'meta_patient_primary_id', true)){
	        	echo wp_get_attachment_image( get_post_thumbnail_id(get_the_ID()), 'md-square' );
        	}else{
	        	$primary_id = get_post_meta(get_the_ID(), 'meta_patient_primary_id', true);
						$stitch_id = get_post_meta(get_the_ID(), 'meta_patient_stitch_id', true);
	        	if($primary_id && $stitch_id){
            	echo wp_get_attachment_image( $stitch_id, 'md-square' );
          	}else{
            	echo wp_get_attachment_image( $primary_id, 'md-square' );
          	}
        	}
					
					echo "</a>";
          
        endwhile;
        
        echo "</div>";
        
      }
      
      $page = get_pages(array('meta_key' => '_wp_page_template','meta_value' => 'page-templates/template-smile-gallery.php'));
      if($page[0]->ID){
        echo "<a href='".get_permalink($page[0]->ID)."' class='btn'>View Smile Gallery</a>";
      }
        
      echo $args['after_widget'];
    
    }
    
  }
		
  public function form( $instance ) {
    if (isset($instance[ 'title' ])){ $title = $instance[ 'title' ];}else{$title = __( 'Smile Gallery', 'widget_form_domain' );}
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Gallery Title:</label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
      <label for="">Gallery Images Source:</label> 
      <select class="widefat" id="gallery-source" name="gallery-source" type="text"> 
	      <option>Select from Gallery Pages...</option>
	      <?php $gallery_src = array( 'post_type' => 'page', 'orderby' => 'post_date','order' => 'DESC','posts_per_page' => -1, 'meta_query' => array( array( 'key' => '_wp_page_template', 'value' => 'template-gallery-grid.php' ) ) ); 
		    $src = new WP_Query( $gallery_src );
        while ( $src->have_posts() ) : $src->the_post(); 
        global $post; $post_slug=$post->post_name;?>
	      <option value="<?php echo $post_slug; ?>"><?php the_title(); ?></option>
	      <?php endwhile; ?>
      </select>
    </p>
    <?php
  }
	
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
      return $instance;
  }

}
}
 //end check to see if this widget already exists 



?>