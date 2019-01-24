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



?>