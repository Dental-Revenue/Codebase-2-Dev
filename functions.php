<?php

// ================================================ SCRIPTS	AND STYLESHEETS
function theme_scripts_styles() {
    
    $appearance_info = get_option('appearance_info');
    $heading_font = $appearance_info['heading_font'];
    $body_font = $appearance_info['body_font'];
    wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family='.$heading_font.':400,600,800|'.$body_font.':300,400,400i,600&display=swap' , false, false);
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/stylesheets/vendor/font-awesome/css/all.css',false, false);
    wp_enqueue_style( 'main-styles', get_template_directory_uri() . '/assets/stylesheets/style.css',false, false);
  
  wp_deregister_script('jquery');
  
  
  //recaptcha, conditionally loaded
    /* Recaptcha v3
    $form_info = get_option('form_info');
    $recaptcha = $form_info['form_recaptcha']; */
  wp_register_script('recaptcha', ("https://www.google.com/recaptcha/api.js"), array(), null,true); 
  
}
add_action( 'wp_enqueue_scripts', 'theme_scripts_styles' );

function admin_scripts_styles() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/admin/admin.css');
  wp_enqueue_script('jquery-ui', get_template_directory_uri().'/admin/jquery-ui.min.js');
  wp_enqueue_script('admin-scripts', get_template_directory_uri().'/admin/admin.js');
}
add_action('admin_enqueue_scripts', 'admin_scripts_styles');
  
// ================================================ LIBRARIES
if ( file_exists(  __DIR__ . '/inc/libs/cmb2/init.php' ) ) {
  require_once  __DIR__ . '/inc/libs/cmb2/init.php';
}
if ( file_exists(  __DIR__ . '/inc/libs/shortcode-button/shortcode-button.php' ) ) {
  require_once  __DIR__ . '/inc/libs/shortcode-button/shortcode-button.php';
}



// ================================================ SHORTCODES
if ( file_exists(  __DIR__ . '/inc/shortcodes.php' ) ) {
  require_once  __DIR__ . '/inc/shortcodes.php';
}
if ( file_exists(  __DIR__ . '/inc/custom-shortcode-mini-gallery.php' ) ) {
  require_once  __DIR__ . '/inc/custom-shortcode-mini-gallery.php';
}
if ( file_exists(  __DIR__ . '/inc/custom-shortcode-testimonials.php' ) ) {
  require_once  __DIR__ . '/inc/custom-shortcode-testimonials.php';
}
if ( file_exists(  __DIR__ . '/inc/custom-shortcode-faq.php' ) ) {
  require_once  __DIR__ . '/inc/custom-shortcode-faq.php';
}
if ( file_exists(  __DIR__ . '/inc/custom-shortcode-well.php' ) ) {
  require_once  __DIR__ . '/inc/custom-shortcode-well.php';
}

// ================================================ THEME OPTIONS
if ( file_exists(  __DIR__ . '/inc/theme-options.php' ) ) {
  require_once  __DIR__ . '/inc/theme-options.php';
}
if ( file_exists(  __DIR__ . '/inc/theme-options-ref.php' ) ) {
  require_once  __DIR__ . '/inc/theme-options-ref.php';
}

// ================================================ STANDARD PAGE META
if ( file_exists(  __DIR__ . '/inc/meta/meta-standard.php' ) ) {
  require_once  __DIR__ . '/inc/meta/meta-standard.php';
}

// ================================================ MODULES META
if ( file_exists(  __DIR__ . '/inc/meta/meta-modules.php' ) ) {
  require_once  __DIR__ . '/inc/meta/meta-modules.php';
}

// CUSTOM HP MODULES
if ( file_exists(  __DIR__ . '/inc/custom-modules.php' ) ) {
  require_once  __DIR__ . '/inc/custom-modules.php';
}

// ================================================ TESTIMONIALS META
if ( file_exists(  __DIR__ . '/inc/meta/meta-testimonials.php' ) ) {
  require_once  __DIR__ . '/inc/meta/meta-testimonials.php';
}
// ================================================ TESTIMONIALS CPT
if ( file_exists(  __DIR__ . '/inc/cpts/cpt-testimonials.php' ) ) {
  require_once  __DIR__ . '/inc/cpts/cpt-testimonials.php';
}

// ================================================ GALLERIES META
if ( file_exists(  __DIR__ . '/inc/meta/meta-gallery-pages.php' ) ) {
  require_once  __DIR__ . '/inc/meta/meta-gallery-pages.php';
}
if (file_exists(__DIR__ . '/inc/meta/meta-smart-gallery-template.php')) {
    include_once __DIR__ . '/inc/meta/meta-smart-gallery-template.php';
}
// ================================================ GALLERIES CPT
if (file_exists(__DIR__ . '/inc/cpts/cpt-smart-gallery.php')) {
    include_once __DIR__ . '/inc/cpts/cpt-smart-gallery.php';
}

// ================================================ SERVICES META
if ( file_exists(  __DIR__ . '/inc/meta/service-template-meta.php' ) ) {
  require_once  __DIR__ . '/inc/meta/service-template-meta.php';
}

// ================================================ WIDGETS
if ( file_exists(  __DIR__ . '/inc/custom-widgets.php' ) ) {
  require_once  __DIR__ . '/inc/custom-widgets.php';
}

//sending convirza id before enqueueing script
function main_script(){
    //main js file
    wp_register_script( 'scripts', get_template_directory_uri() . '/assets/scripts/scripts-min.js', array(), null,true);
    wp_localize_script( 'scripts', 'global', array('convirzaID' => site_ops_convirza_id(false)));
    wp_enqueue_script('scripts');
}
add_action( 'wp_enqueue_scripts', 'main_script' );

// MODIFIED GET TEMPLATE PART TO ACCEPT ARGUMENTS
function get_partial( $file, $template_args = array(), $cache_args = array() ) {
    $template_args = wp_parse_args( $template_args );
    $cache_args = wp_parse_args( $cache_args );
    if ( $cache_args ) {
        foreach ( $template_args as $key => $value ) {
            if ( is_scalar( $value ) || is_array( $value ) ) {
                $cache_args[$key] = $value;
            } else if ( is_object( $value ) && method_exists( $value, 'get_id' ) ) {
                $cache_args[$key] = call_user_method( 'get_id', $value );
            }
        }
        if ( ( $cache = wp_cache_get( $file, serialize( $cache_args ) ) ) !== false ) {
            if ( ! empty( $template_args['return'] ) )
                return $cache;
            echo $cache;
            return;
        }
    }
    $file_handle = $file;
    do_action( 'start_operation', 'hm_template_part::' . $file_handle );
    if ( file_exists( get_stylesheet_directory() . '/' . $file . '.php' ) )
        $file = get_stylesheet_directory() . '/' . $file . '.php';
    elseif ( file_exists( get_template_directory() . '/' . $file . '.php' ) )
        $file = get_template_directory() . '/' . $file . '.php';
    ob_start();
    $return = require( $file );
    $data = ob_get_clean();
    do_action( 'end_operation', 'hm_template_part::' . $file_handle );
    if ( $cache_args ) {
        wp_cache_set( $file, $data, serialize( $cache_args ), 3600 );
    }
    if ( ! empty( $template_args['return'] ) )
        if ( $return === false )
            return false;
        else
            return $data;
    echo $data;
}



// HEX TO HSL (FOR LIGHTNESS DETECTION)
function hexToHsl($hex) {
    $hex = array($hex[0].$hex[1], $hex[2].$hex[3], $hex[4].$hex[5]);
    $rgb = array_map(function($part) {
        return hexdec($part) / 255;
    }, $hex);

    $max = max($rgb);
    $min = min($rgb);

    $l = ($max + $min) / 2;

    if ($max == $min) {
        $h = $s = 0;
    } else {
        $diff = $max - $min;
        $s = $l > 0.5 ? $diff / (2 - $max - $min) : $diff / ($max + $min);

        switch($max) {
            case $rgb[0]:
                $h = ($rgb[1] - $rgb[2]) / $diff + ($rgb[1] < $rgb[2] ? 6 : 0);
                break;
            case $rgb[1]:
                $h = ($rgb[2] - $rgb[0]) / $diff + 2;
                break;
            case $rgb[2]:
                $h = ($rgb[0] - $rgb[1]) / $diff + 4;
                break;
        }

        $h /= 6;
    }

    return array($h, $s, $l);
}

function getColorLightness($hex = 'No Color Provided'){
    global $post;
    $id = $post->ID;
    
    //if meta id is present, get that, if not get primary color
    if(empty($hex)){
        $color = '#ffffff';
    } elseif($hex != 'No Color Provided'){
        $color = $hex;
    } else { 
        $color = site_ops_brand_color(false); 
    }
    
    $color_nohash = str_replace('#', '', $color);
        
    //get background lightness
    $hsl = hexToHsl($color_nohash);
    $lightness = $hsl[2]*1000;
    return $lightness;
}

// REMOVE THEME SUPPORTS BASED ON PAGES/TEMPLATES by https://gist.github.com/ramseyp/4060095
$remove_theme_supports = true;
if ( $remove_theme_supports ) {
    function hide_theme_supports() {
      if(isset($_GET['post'])){
          $homepgname = get_the_title($_GET['post']);
            if($homepgname == 'Home'){ 
            remove_post_type_support('page', 'editor');
          }
      }
    }
    add_action( 'admin_init',  'hide_theme_supports' );
}


// ================================================ GLOBAL VARS
function get_form_processor(){
  $form_processor = 'https://ws.dentalrevenue.com/ws/forms/ProcessLeadCertV5.aspx';
  return $form_processor;
}

    
// ================================================ CORE META


    
//General Page Information Meta Box
/*
function general_meta() {
  $prefix = 'meta_';
  $box = new_cmb2_box(array(
    'id' => 'general_info',
    'title' => __( 'General Page Information', 'cmb2' ),
    'object_types' => array( 'page', ),
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true,
  ));
  $box->add_field( array(
    'name' => __( 'H1 Tag', 'cmb2' ),
    'id' => $prefix . 'general_h1',
    'type' => 'text',
    'sanitization_cb' => false
  ));
}
add_action( 'cmb2_admin_init', 'general_meta' );
*/


//Category Selector Meta Box for Blog Widget
/*
function taxonomy_meta(){
  if(is_active_widget( false, false, 'blog', true )){
    $prefix = 'meta_';
    $box = new_cmb2_box( array(
      'id' => 'sidebar_info',
      'title' => __( 'Sidebar Information', 'cmb2' ),
      'object_types' => array( 'page', ),
      'context' => 'side',
      'priority' => 'high',
      'show_names' => true,
    ));
    $box->add_field( array(
      'name' => 'Sidebar Blog Category',
      'desc' => 'The sidebar blog will show from all categories by default. Override that for this specific page here.',
      'id' => $prefix . 'sidebar_category',
      'type' => 'select',
      'options' => cmb2_get_term_options(),
      'show_option_none' => true,
    ));
  }
}
add_action( 'cmb2_admin_init', 'taxonomy_meta' );
*/




// ================================================ META FUNCTIONS
//Pages to exclude for metabox
/*
function cmb2_exclude_ids( $box ) {
    $ids_to_exclude = $box->prop( 'exclude_ids', array() );
    $excluded = in_array( $box->object_id(), $ids_to_exclude, true );
    return ! $excluded;
}
*/

//Page selector for any select metabox
/*
function cmb2_get_post_options( $query_args ) {
  $args = wp_parse_args( $query_args, array('post_type'   => 'page','numberposts' => -1,'orderby' => 'name','order' => 'ASC'));
  $posts = get_posts( $args );
  $post_options = array();
  if($posts){
    foreach($posts as $post ){ $post_options[ $post->ID ] = $post->post_title;}
  }
  return $post_options;
}
*/

//Term (Category) selector for any select metabox
/*
function cmb2_get_term_options( $taxonomy = 'category', $args = array() ){
  $args['taxonomy'] = $taxonomy;
  $args = wp_parse_args( $args, array( 'taxonomy' => 'category' ) );
  $taxonomy = $args['taxonomy'];
  $terms = (array) get_terms( $taxonomy, $args );
  $term_options = array();
  if ( ! empty( $terms ) ) {
    foreach ( $terms as $term ) {
      $term_options[ $term->term_id ] = $term->name;
    }
  }
  return $term_options;
}
*/

// ================================================ CMB2 CORE MODS

// add a word counter to wysiwyg field
function cmb2_wysiwyg_word_counter( $args, $field ) {
    wp_enqueue_script( 'word-count', array( 'jquery', 'underscore', 'word-count' ) );
    ?>

    <p id="<?php echo $field->id(); ?>-word-count" class="hide-if-no-js cmb2-wysiwyg-word-count"><?php printf( __( 'Word count: %s' ), '<span class="word-count">0</span>' ); ?></p>

    <script type="text/javascript">
        jQuery( function( $ ) {
            var editorId = '<?php echo $field->id(); ?>';
            /**
             * TinyMCE word count display
             */
            ( function( $, counter ) {
                $( function() {
                    var $content = $( '#' + editorId ),
                        $count = $( '#' + editorId + '-word-count' ).find( '.word-count' ),
                        prevCount = 0,
                        contentEditor;

                    /**
                     * Get the word count from TinyMCE and display it
                     */
                    function update() {
                        var text, count;

                        if ( ! contentEditor || contentEditor.isHidden() ) {
                            text = $content.val();
                        } else {
                            text = contentEditor.getContent( { format: 'raw' } );
                        }

                        count = counter.count( text );

                        if ( count !== prevCount ) {
                            $count.text( count );
                        }

                        prevCount = count;
                    }

                    /**
                     * Bind the word count update triggers.
                     *
                     * When a node change in the main TinyMCE editor has been triggered.
                     * When a key has been released in the plain text content editor.
                     */
                    $( document ).on( 'tinymce-editor-init', function( event, editor ) {
                        if ( editor.id !== editorId ) {
                            return;
                        }

                        contentEditor = editor;

                        editor.on( 'nodechange keyup', _.debounce( update, 1000 ) );
                    } );

                    $content.on( 'input keyup', _.debounce( update, 1000 ) );

                    update();
                } );
            } )( jQuery, new wp.utils.WordCounter() );

        });

    </script>
    <?php
}



//Form Widget 
/*
class widget_form extends WP_Widget {
  
  function __construct() {parent::__construct('form', __('Contact Form', 'widget_form_domain'));}
  
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    echo $args['before_widget'];
    if (!empty($title)){echo $args['before_title'] . $title . $args['after_title'];} ?>
    <form action="<?php echo get_form_processor(); ?>" method="post" name="form-sidebar">      
      <input type="text" name="Name" placeholder="Name" />
      <input type="text" name="EmailName" placeholder="Email" />
      <input type="text" name="Phone" placeholder="Phone" />
      <textarea name="Comments" placeholder="Comments"></textarea>
      
      <?php if(getOption('form_recaptcha') && getOption('form_recaptcha')!=''){ ?>
        <div class="captcha-container">
        <div class="g-recaptcha" data-sitekey="<?php showOption('form_recaptcha'); ?>"></div>
        </div>
      <?php } ?>
      
      <button type="submit">Submit</button>
      <input name="Subject" type="hidden" value="<?php bloginfo('name'); ?> Sidebar Form" />
      <input name="Campaign" type="hidden" value="Sidebar Form" />
      <input name="AccountID" type="hidden" value="<?php showOption('form_account_id'); ?>" />
      <input name="RedirectPageFullURL" type="hidden" value="<?php showOption('form_redirect'); ?>" />
      <input name="EmailRecipient" type="hidden" value="<?php showOption('form_to'); ?>" />
      <?php if(getOption('form_cc')){ ?>
        <input name="EmailCC" type="hidden" value="<?php showOption('form_cc'); ?>" />
      <?php } ?>
      <input type="hidden" name="gaSource" />
      <input type="hidden" name="gaMedium" />
      <input type="hidden" name="gaCampaign" />
      <input type="hidden" name="gaKeyword" />
      <input type="hidden" name="pagename" />
    </form>
    <?php echo $args['after_widget'];
  }
        
  public function form( $instance ) {
    if (isset($instance[ 'title' ])){ $title = $instance[ 'title' ];}else{$title = __( 'Get in Touch', 'widget_form_domain' );}
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
*/



// Register and load all widgets
/*
function wpb_load_widget() {
  //get DS theme data
  $theme_data = wp_get_theme();
  $theme_name = $theme_data->get( 'Name' );
  $theme_version = $theme_data->get( 'Version' );
  
  register_widget( 'widget_blog' );
  register_widget( 'widget_form' );
  
  //limited support for ds-1 (1.1.3+) and ds-3 (1.1.2+)
  if( ($theme_name!='ds-1' && $theme_name!='ds-3') || ($theme_name=='ds-1' && version_compare($theme_version,  "1.1.3")>=0) || ($theme_name=='ds-3' && version_compare($theme_version,  "1.1.2")>=0) ){
    register_widget( 'widget_appt' );
  }
  
  //limited support for ds-1 (1.1.6+) and ds-3 (1.1.9+)
  if( ($theme_name!='ds-1' && $theme_name!='ds-3') || ($theme_name=='ds-1' && version_compare($theme_version,  "1.1.6")>=0) || ($theme_name=='ds-3' && version_compare($theme_version,  "1.1.9")>=0) ){
    register_widget( 'widget_gallery' );
  }
  
}
add_action( 'widgets_init', 'wpb_load_widget' );
*/


// Unregister all widgets we don't want
function unregister_default_widgets() {
  unregister_widget('WP_Widget_Pages');
  unregister_widget('WP_Widget_Calendar');
  unregister_widget('WP_Widget_Archives');
  unregister_widget('WP_Widget_Links');
  unregister_widget('WP_Widget_Meta');
  unregister_widget('WP_Widget_Search');
  unregister_widget('WP_Widget_Text');
  unregister_widget('WP_Widget_Categories');
  unregister_widget('WP_Widget_Recent_Posts');
  unregister_widget('WP_Widget_Recent_Comments');
  unregister_widget('WP_Widget_RSS');
  unregister_widget('WP_Widget_Tag_Cloud');
  //unregister_widget('WP_Nav_Menu_Widget');
  unregister_widget('Twenty_Eleven_Ephemera_Widget');
  wp_unregister_sidebar_widget('wpe_widget_powered_by');
}
add_action('widgets_init', 'unregister_default_widgets', 18);
    

// ================================================ BUILD OUT INITIAL PAGES AUTOMATICALLY

//Home Page (Front Page)

if (isset($_GET['activated']) && is_admin()){
    $new_page_title = 'Home';
    $new_page_content = '';
    $new_page_template = '';
    $page_check = get_page_by_title($new_page_title);
    $new_page = array(
        'post_type' => 'page',
        'post_title' => $new_page_title,
        'post_content' => $new_page_content,
        'post_status' => 'publish',
        'post_author' => 1,
    );
    if(!isset($page_check->ID)){ $new_page_id = wp_insert_post($new_page); }
    $homeSet = get_page_by_title( 'Home' );
    update_option( 'page_on_front', $homeSet->ID );
    update_option( 'show_on_front', 'page' );
}


//Blog Page (Posts Page)

if (isset($_GET['activated']) && is_admin()){
    $new_page_title = 'Blog';
    $new_page_content = '';
    $new_page_template = '';
    $page_check = get_page_by_title($new_page_title);
    $new_page = array(
        'post_type' => 'page',
        'post_title' => $new_page_title,
        'post_content' => $new_page_content,
        'post_status' => 'publish',
        'post_author' => 1,
    );
    if(!isset($page_check->ID)){ $new_page_id = wp_insert_post($new_page); }
    $blogSet = get_page_by_title( 'Blog' );
    update_option( 'page_for_posts', $blogSet->ID );
}


//Leave Review Page

if (isset($_GET['activated']) && is_admin()){
    $new_page_title = 'Leave a Review';
    $new_page_content = 'THE CONTENT FOR THIS PAGE IS PROVIDED BY CODEBASE';
    $new_page_template = 'leave-review.php';
    $page_check = get_page_by_title($new_page_title);
    $new_page = array(
        'post_type' => 'page',
        'post_title' => $new_page_title,
        'post_content' => $new_page_content,
        'post_status' => 'publish',
        'post_author' => 1,
    );
    if(!isset($page_check->ID)){
        $new_page_id = wp_insert_post($new_page);
        if(!empty($new_page_template)){
            update_post_meta($new_page_id, '_wp_hidden_template', $new_page_template);
        }
    }
}


//Privacy Policy Page

if (isset($_GET['activated']) && is_admin()){
    $new_page_title = 'Privacy Policy';
    $new_page_content = 'THE CONTENT FOR THIS PAGE IS PROVIDED BY CODEBASE';
    $new_page_template = 'privacy-policy.php';
    $page_check = get_page_by_title($new_page_title);
    $new_page = array(
        'post_type' => 'page',
        'post_title' => $new_page_title,
        'post_content' => $new_page_content,
        'post_status' => 'publish',
        'post_author' => 1,
    );
    if(!isset($page_check->ID)){
        $new_page_id = wp_insert_post($new_page);
        if(!empty($new_page_template)){
            update_post_meta($new_page_id, '_wp_hidden_template', $new_page_template);
        }
    }
}


//Terms of Use Page

if (isset($_GET['activated']) && is_admin()){
    $new_page_title = 'Terms of Use';
    $new_page_content = 'THE CONTENT FOR THIS PAGE IS PROVIDED BY CODEBASE';
    $new_page_template = 'terms-of-use.php';
    $page_check = get_page_by_title($new_page_title);
    $new_page = array(
        'post_type' => 'page',
        'post_title' => $new_page_title,
        'post_content' => $new_page_content,
        'post_status' => 'publish',
        'post_author' => 1,
    );
    if(!isset($page_check->ID)){
        $new_page_id = wp_insert_post($new_page);
        if(!empty($new_page_template)){
            update_post_meta($new_page_id, '_wp_hidden_template', $new_page_template);
        }
    }
}


//Sitemap Page

if (isset($_GET['activated']) && is_admin()){
    $new_page_title = 'Sitemap';
    $new_page_content = 'THE CONTENT FOR THIS PAGE IS PROVIDED BY CODEBASE';
    $new_page_template = 'site-map.php';
    $page_check = get_page_by_title($new_page_title);
    $new_page = array(
        'post_type' => 'page',
        'post_title' => $new_page_title,
        'post_content' => $new_page_content,
        'post_status' => 'publish',
        'post_author' => 1,
    );
    if(!isset($page_check->ID)){
        $new_page_id = wp_insert_post($new_page);
        if(!empty($new_page_template)){
            update_post_meta($new_page_id, '_wp_hidden_template', $new_page_template);
        }
    }
}



//Accessibility Page

if (is_admin()){
    $new_page_title = 'Accessibility';
    $page_check = get_page_by_title($new_page_title);
    if(!isset($page_check->ID)){
        $new_page_content = 'THE CONTENT FOR THIS PAGE IS PROVIDED BY CODEBASE';
        $new_page_template = 'accessibility.php';
        $new_page = array(
            'post_type' => 'page',
            'post_title' => $new_page_title,
            'post_content' => $new_page_content,
            'post_status' => 'publish',
            'post_author' => 1,
        );
        $new_page_id = wp_insert_post($new_page);
        if(!empty($new_page_template)){
            update_post_meta($new_page_id, '_wp_hidden_template', $new_page_template);
        }
    }
}


//Replace the standard content for specific pages (leave review, ...)

function replace_content($content){
  global $post;
  $realtemplate = get_post_meta($post->ID, '_wp_page_template', true);
  $hiddentemplate = get_post_meta($post->ID, '_wp_hidden_template', true);
  if($realtemplate=='leave-review.php' || $hiddentemplate=='leave-review.php'){
    $content = '<div class="review-content"><h3>Thanks for choosing [practice_name]!</h3><p>Leaving a Google Review for us is easy! Use the link below to get started and follow the instructions. If you\'re on your phone, scroll down for the Google Map App instructions.</p><a href="[google_review_url]" target="_blank" rel="noopener" class="review-link">LEAVE A REVIEW</a><ol><li>Click on the link provided above. This will take you to your Google Maps and show our [practice_name] location.</li><li>Scroll down until you see the Rate and Review section. If you\'re on a desktop computer, click the "write a review" link, if you\'re on a mobile device select how many stars you would like to give [practice_name] and then write your review. Once you’re done writing your review, click post to add your review.</li></ol><img src="//cdn.dentalrevenue.com/assets/images/leave-review/google-review.jpg" alt="Leaving a Google Review" /><h3>On Your Phone & Don\'t Have the Google Maps App? No Problem!</h3><p>Download the Google Maps App and follow the instructions below:</p><a href="https://itunes.apple.com/us/app/google-maps/id585027354?mt=8" target="_blank" rel="noopener" class="review-link review-platform">Click here for iPhone</a> | <a href="https://play.google.com/store/apps/details?id=com.google.android.apps.maps&hl=en" target="_blank" rel="noopener" class="review-link review-platform">Click here for Android</a><ol><li>Once the Google Maps App has downloaded. Open it on your phone and use the search bar to type in "[practice_name]". The app will show you our location.</li><li>Scroll down to the Rate and Review section. Select how many stars you would like to give [practice_name] and then write your review. Once you’re done writing your review, click post to add your review.</li></ol><img src="//cdn.dentalrevenue.com/assets/images/leave-review/google-review.jpg" alt="Leaving a Google Review"><p>If you\'re not signed in to your Google Account or do not currently have a Google Account, the Google Maps App will guide you through a few quick steps to login or create an account.</p><p>Thanks again for showing your continued support for [practice_name]!</p></div>';
  }
  if($realtemplate=='privacy-policy.php' || $hiddentemplate=='privacy-policy.php'){
    $short_url = str_replace(array('https://', 'www.'),array('',''),get_site_url());
    $content = '<h3>[practice_name] Internet Privacy & Security Policy</h3><p>[practice_name] respects your privacy and is committed to protecting sensitive information at all times. This online privacy statement explains how [practice_name] collects, uses and safeguards information on [site_url]. This Internet Privacy Statement applies ONLY to information collected by the [practice_name] through its website.</p><p>By using this website, you are acknowledging and agreeing to the terms of use and conditions outlined in within this policy. Please read carefully.</p><h3>Changes to Internet Privacy Statement</h3><p>We reserve the right to amend the Internet Privacy Statement at any time, for any reason. We will post a notice that this Internet Privacy Statement has been amended by revising the "Last updated" date at the bottom of this page.</p><p>If you have questions about this Internet Privacy Statement, please send us an email to info@'.$short_url.'.</p><h3>Information We Collect and How We Use It</h3><p><b>Information we collect —</b> When you browse [site_url] and do not interact with the site for any online service or product from [practice_name], you browse anonymously. Personally identifiable information–such as your name, address, phone number and email address–is not collected as you browse.</p><p>If you choose to interact with our site in other ways, such as subscribing to our newsletter, submitting questions or comments or requesting information or materials, we will collect certain personal information from you. The type of personal information collected will vary but may include name, phone number, email address, and other demographic information. We do not collect Social Security numbers or Dates of Birth via our website. The type of product or service that you seek will determine the personal information that is collected. For a listing of the exact type of personal information that will be collected from you, please refer to the appropriate online form.</p><p><b>Tracking activity on our website —</b> We track how our site is used by both anonymous visitors and visitors who interact with the site. We may use third party software such as Google Analytics to help us analyze how users use the site. These tools may uses "cookies", which which are text files placed on your computer, to collect standard Internet log information and visitor behavior information in an anonymous form. The information generated by the cookie about your use of the website (including IP address) is transmitted to Google or other third party company. This information is then used to evaluate visitors’ us of the website and to compile statistical reports on website activity for [practice_name].</p><p>We may also use a tracked phone number that records calls for quality assurance purposes. This practice will be identified to the caller upon placing the phone call to the tracked number. Callers will here something similar to "This call may be recorded for training and quality assurance purposes".</p><p><b>How we use personal information —</b> Once collected, we may use your personal information (except for email address, which is outlined below) for the following purposes:</p><ul><li>Register you for products, services or programs you have requested</li><li>Answer your emails or on-line requests</li><li>Send information you request</li><li>Ensure the website is relevant to your needs</li><li>Deliver [practice_name] services such as newsletters, meetings or events</li><li>Notify you about new products/services, special offers, upgrades and other related information from the [practice_name]</li></ul><p><b>How we use your email address —</b> Users who have opted in to our electronic newsletter may periodically receive emails from us regarding new products/services, special offers, news and other related information from [practice_name].</p><p>We do not share, sell, trade, exchange or rent your email address to vendors for them to market their products or services to you. When we hire vendors to deliver emails to you on our behalf, they are under agreement and limited from using your email address for any other purpose.</p><p>When we send email to you, we may be able to identify information about your email address, such as whether you can view graphic-rich HTML email. If your email address is HTML-enabled, we may choose to send you graphic-rich HTML email messages.</p><p><b>How to opt out of email —</b> To opt out of an email list, please contact [practice_name], [current_patient_phone].</p><p><b>Children under 13 —</b> We do not knowingly solicit data online from or market online to children under the age of 13.</p><p>Information security — [practice_name] implements security measures to protect against unauthorized access to or unauthorized alteration, disclosure or destruction of data. We restrict access to personal information to our business partners who may need to know that information in order to operate, develop or improve our services. These individuals are bound by confidentiality obligations and may be subject to discipline, including termination and criminal prosecution, if they fail to meet these obligations.</p><h3>How we safeguard information</h3><p><b>Site security features —</b> [practice_name] takes extensive measures and carefully selects third party companies that have sound security practices in place. Please be aware that no data transmission over the Internet can be guaranteed 100% secured. For these reasons, and despite our measures, we cannot guarantee or warrant the security of any information transmitted to us electronically.</p><p>Our Internet Privacy Statement refers only to information collected through our website. For a copy of our HIPAA Notice of Privacy Practices, please contact [practice_name], [current_patient_phone].</p><p><b>Linking to other Internet sites —</b> [practice_name] website may link to other Internet sites as other Internet sites may link to [site_url]. [practice_name] is not responsible for the privacy practices or content of other websites and cannot monitor them. To ensure your privacy is protected, we recommend that you review the privacy statements of other Internet sites you visit.</p><h3>Contacting Us About Privacy</h3><p>You may contact us about our privacy practices at any time:<br/>Email: info@'.$short_url.'<br/>Phone: [current_patient_phone]</p><p>By Mail At: <br/>[practice_name], <br/>[street_address] <br/>[city], [state] [zip_code]</p><p>Last Update 02/03/2016</p>';
  }
  if($realtemplate=='terms-of-use.php' || $hiddentemplate=='terms-of-use.php'){
    $content = '<h3>[practice_name] Website Terms of Use – User Agreement</h3><p>By using this website, you are acknowledging and agreeing to the terms of use and conditions outlined in within this policy. Please read carefully.</p><p>We reserve the right to amend this information at any time, for any reason. We will post a notice that our Website Terms of Use has been amended by revising the "Last updated" date at the bottom of this page.</p><p>Please refer to our Privacy Statement for concerns about how we collect, use and maintain your information.</p><h3>Ownership</h3><p>This website, its entire contents including text, photos and materials available for download are the property of [practice_name] and/or its affiliates. This site offers educational information on the organization, products/services and resources. This information is not intended to be a substitute for professional or medical advice, diagnosis or treatment. Always seek the advice of your doctor if you have questions regarding a medical condition.</p><h3>Acceptable Use</h3><p>You are permitted to access the site for your personal, non-commercial use. Unlawful usage of the site or violations to these terms and conditions are prohibited and may result in legal action.</p><h3>Copyright</h3><p>The entire contents of [practice_name]’s website including: logos, trademarks, service marks, brand names, information, materials, interfaces, computer code, databases, text, images, photographs, audio and visual material, etc as well as design, structure and assembly, are the property of [practice_name], its licensors, partners, sponsors, advertisers, content providers or other third parties and is protected by law. The reproduction, transmission, distribution, sale, publication or otherwise is prohibited without prior written consent obtained from [practice_name] or the owner of the content if [practice_name] is not the owner.You may not alter, delete or conceal any copyright or other notices appearing in the [practice_name] content including notices appearing on materials available for download.</p><h3>Disclaimers</h3><p>While we make every attempt to ensure that the information provided on this website is timely and accurate, we can make warranties about the accuracy or completeness. We assume no liability for interruptions, errors, computer viruses or other hazards resulting from your use of this site.</p><h3>No Medical Advice</h3><p>This website is intended to provide educational information about the organization and the products/services it provides. This is intended to be general in nature and should not be mistaken for professional medical advice. Before making decisions about your health care, please consult with your personal physician.</p><h3>Limitation of Liability</h3><p>Our website may link to other websites, as other websites may link to ours. We do not review, control or take responsibility for the accuracy of content on these websites. Nor do we review, control or take responsibility for their privacy and security policies. Accessing these websites is at your own risk and [practice_name] shall assume no liability for users use on any linked sites.</p><h3>Privacy</h3><p>Most information transmitted electronically is not secure, therefore, we can make no guarantees to privacy or confidentiality. [practice_name] and its affiliates take extensive measures to protect sensitive information. Personal medical information should never be sent through our website. Please review our Privacy Statement for further information.</p><h3>Contact Us</h3><p>Please contact us with any questions regarding our Website Terms of Use by contacting [practice_name] at [current_patient_phone]</p><p>[practice_name], All Rights Reserved</p><p>Last Update: 02/03/2016</p>';
  }
  if($realtemplate=='site-map.php' || $hiddentemplate=='site-map.php'){
    $content = '<ul class="sitemap">'.wp_list_pages( array( 'echo'=>false, 'title_li' => false ) ).'</ul>';
  }
  if($realtemplate=='accessibility.php' || $hiddentemplate=='accessibility.php'){
    $content = '<div class="accessibility-content"><p>We are committed to providing a website that is accessible to the widest possible audience, regardless of technology or ability. We are always striving to increase the accessibility and usability of our website and in doing so adhere to many of the available standards and guidelines, such as those below:</p><ul><li>Provide text alternatives for non-text content.</li><li>Provide captions and other alternatives for multimedia.</li><li>Create content that can be presented in different ways, including by assistive technologies, without losing meaning.</li><li>Make it easier for users to see and hear content.</li><li>Make all functionality available from a keyboard.</li><li>Give users enough time to read and use content.</li><li>Do not use content that causes seizures.</li><li>Help users navigate and find content.</li><li>Make text readable and understandable.</li><li>Make content appear and operate in predictable ways.</li><li>Help users avoid and correct mistakes.</li><li>Maximize compatibility with current and future user tools.</li></ul><p>We are always seeking opportunities to improve website accessibility. If you experience any difficulty in accessing this website, please don\'t hesitate to contact us at [new_patient_phone_span].</p></div>';
  }
  return $content;
}
add_filter('the_content','replace_content');

//AUTO GENERATE MODULES TABLE
function createModulesTable(){
    $sql =
        "CREATE TABLE IF NOT EXISTS modules (
          id int(32) NOT NULL auto_increment ,
          module varchar(100) NOT NULL,
          name varchar(255) NOT NULL,
          page int(32) NOT NULL,
          display_order int(32) NOT NULL,
          PRIMARY KEY  (id)
        )";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta( $sql );
}

add_action("after_switch_theme", "createModulesTable");
    
// ================================================ CORE FUNCTIONS

function getOption($name,$break=false){
    $value = get_option($name);
    if($break && $break==true){
      return nl2br($value);
    }else{
      return $value;
    }
}

//get the h1 tag for each page
function get_the_h1(){
    global $post;
  global $heading_level_one;
  if(is_home()){
    $heading_level_one = get_post_meta(get_option( 'page_for_posts' ), 'h1_meta_general_h1', true);
  }else if( get_post_meta($post->ID, 'h1_meta_general_h1', true) != '' ){
    $heading_level_one = get_post_meta($post->ID, 'h1_meta_general_h1', true);
  }
  if($heading_level_one!=''){return true;}else{return false;}
}
function the_h1(){
    global $post;
  global $heading_level_one;
  if(is_home()){
    $heading_level_one = get_post_meta(get_option( 'page_for_posts' ), 'h1_meta_general_h1', true);
  }else if( get_post_meta($post->ID, 'h1_meta_general_h1', true) != '' ){
    $heading_level_one = get_post_meta($post->ID, 'h1_meta_general_h1', true);
  }
  echo $heading_level_one;
}

//Remove Emoji support added to core in 4.2
function disable_wp_emojicons() {
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );
function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

//Remove Comments Bubble from WP Admin Top Bar
function remove_comment_bubble() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'remove_comment_bubble' );

//Remove Comments and Links from WP Admin Main Nav
function remove_menus(){
global $menu;
  $restricted = array(__('Links'), __('Comments'));
  end ($menu);
  while (prev($menu)){
      $value = explode(' ',$menu[key($menu)][0]);
      if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
  }
}
add_action('admin_menu', 'remove_menus');

//Put version numbers for codebase and active design style in wp admin footer
function change_admin_footer(){
  $theme_data = wp_get_theme();
  echo $theme_data->get( 'Name' ).' v '.$theme_data->get( 'Version' );
}
add_filter('admin_footer_text', 'change_admin_footer'); 
function change_footer_version() {
    $theme_data = wp_get_theme();
    if($theme_data->parent()){
    echo $theme_data->parent()->get( 'Name' ).' v '.$theme_data->parent()->get( 'Version' );
  }
}
add_filter( 'update_footer', 'change_footer_version', 9999);

//Remove Default Dashboard Widgets
function disable_default_dashboard_widgets() {
  remove_meta_box('dashboard_right_now', 'dashboard', 'core');
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
  remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
  remove_meta_box('dashboard_plugins', 'dashboard', 'core');
  remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
  remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
  remove_meta_box('dashboard_primary', 'dashboard', 'core');
  remove_meta_box('dashboard_secondary', 'dashboard', 'core');
}
add_action('admin_menu', 'disable_default_dashboard_widgets');

//Numbered Pagination
/*
function numeric_posts_nav() {
  if( is_singular() )
      return;
  global $wp_query;
  if( $wp_query->max_num_pages <= 1 )
      return;
  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $max   = intval( $wp_query->max_num_pages );
  if ( $paged >= 1 )
      $links[] = $paged;
  if ( $paged >= 3 ) {
      $links[] = $paged - 1;
      $links[] = $paged - 2;
  }
  if ( ( $paged + 2 ) <= $max ) {
      $links[] = $paged + 2;
      $links[] = $paged + 1;
  }
  if ( get_previous_posts_link() )
      printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
  if ( ! in_array( 1, $links ) ) {
      $class = 1 == $paged ? ' class="active"' : '';
      printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
      if ( ! in_array( 2, $links ) )
          echo '<li>…</li>';
  }
  sort( $links );
  foreach ( (array) $links as $link ) {
      $class = $paged == $link ? ' class="active"' : '';
      printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
  }
  if ( ! in_array( $max, $links ) ) {
      if ( ! in_array( $max - 1, $links ) )
          echo '<li>…</li>' . "\n";
      $class = $paged == $max ? ' class="active"' : '';
      printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
  }
  if ( get_next_posts_link() )
      printf( '<li>%s</li>' . "\n", get_next_posts_link() );
}
*/

// Add RSS links to <head> section
add_theme_support( 'automatic-feed-links' );

// Clean up the <head>
function removeHeadLinks() {
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');


// Standard thumb generation   
add_theme_support( 'post-thumbnails' ); 

add_image_size('atf', 1800, '', true);
add_image_size('xxl', 1300, '', true);
add_image_size('xl', 700, '', true);
add_image_size('lg', 500, '', true);
add_image_size('md', 250, '', true);
add_image_size('sm', 120, '', true);
add_image_size('xs', 80, '', true);

add_image_size('xxl-square', 1300, 1300, true); 
add_image_size('xl-square', 700, 700, true); 
add_image_size('lg-square', 500, 500, true); 
add_image_size('md-square', 300, 300, true); 
add_image_size('sm-square', 120, 120, true); 
add_image_size('xs-square', 80, 80, true); 

//Thumb generation for Gallery V1
add_image_size('g1_ba_thumb', 300, 200, true);
add_image_size('g1_ba_full', 900, 600, true);  

/* special image sizes for gallery scroll style */
add_image_size('smile-gallery-portrait', 400, 600, true); 
  
/* special image sizes for gallery grid style */
add_image_size('sg-primary', 300, '', true);
add_image_size('sg-primary-md', 600, '', true);
add_image_size('sg-primary-lg', 900, '', true);
add_image_size('sg-stitch', 300, 200, true);
add_image_size('sg-stitch-md', 600, 400, true);
add_image_size('sg-stitch-lg', 900, 600, true);


// Menu Locations	
function register_menus() {
  register_nav_menus(array(
    'primary-navigation' => __( 'Primary Navigation' ),
  ));
}
add_action( 'init', 'register_menus' );






//Mega Menu
/**
 * Get Menu Items From Location
 *
 * @param $location : location slug given as key in register_nav_menus
 */
 

function getMenuItemsFromLocation($location) {
    $theme_locations = get_nav_menu_locations();
    $menu_obj = get_term( $theme_locations[$location], 'nav_menu' );
    return is_wp_error($menu_obj) ?  array() : getMenuItemsForParent($menu_obj->slug, 0);
}


/**
 * Get Menu Items For Parent
 * 
 * @param $menuSlug : menu slug for the CMS entry (not the key in register_nav_menus)
 * @param $parentId
 * @return array of items formatted as objects with : name / url / children (fetched recursively)
 */

function getMenuItemsForParent($menuSlug, $parentId) {
    $args = array(
            'post_type' => 'nav_menu_item',
            'meta_key' => '_menu_item_menu_item_parent',
            'meta_value' => $parentId,
            'tax_query' =>  array(
                 array(
                    'taxonomy' => 'nav_menu',
                    'field' => 'slug',
                    'terms' => array($menuSlug)
                )
            ),
            'order' => 'ASC',
            'orderby' => 'menu_order',
        );
    $tmpItems = query_posts($args);

    $items =  array();
    foreach ( $tmpItems as $tmpItem ) {
        $item = new stdClass;
        $type = get_post_meta($tmpItem->ID, '_menu_item_type', true);
        switch($type):

            case 'post_type':
                $postId = get_post_meta($tmpItem->ID, '_menu_item_object_id', true);
                $post = get_post($postId);
                $item->name = $post->post_title;
                $item->url = '/'.$post->post_type.'/'.$post->post_name;
                $item->id = $postId;
                break;

            case 'custom':
                $item->name = $tmpItem->post_title;
                $item->url = get_post_meta($tmpItem->ID, '_menu_item_url', true);
                $item->id = $tmpItem->ID;
                
            // note : this has to be completed with every '_menu_item_type' (could also come from plugin)

        endswitch;
        $item->children = getMenuItemsForParent($menuSlug, $tmpItem->ID);
        $items[] = $item;
    }
    wp_reset_query();

    return $items;
}



//var_dump(getMenuItemsFromLocation('primary-navigation'));












class Walker_Quickstart_Menu extends Walker_Nav_Menu {
    
    function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
    if ( ! $element ) {
        return;
    }
    
    $id_field = $this->db_fields['id'];
    $id       = $element->$id_field;
    
    // descend only when the depth is right and there are childrens for this element
    if ( $max_depth>0 ) {
        return;
    }

    //display this element
    $this->has_children = ! empty( $children_elements[ $id ] );
    if ( isset( $args[0] ) && is_array( $args[0] ) ) {
        $args[0]['has_children'] = $this->has_children; // Back-compat.
    }
 
    $cb_args = array_merge( array( &$output, $element, $depth ), $args );
    call_user_func_array( array( $this, 'start_el' ), $cb_args );
 
    //end this element
    $cb_args = array_merge( array( &$output, $element, $depth ), $args );
    call_user_func_array( array( $this, 'end_el' ), $cb_args );
}



    


        // Displays start of an element. E.g '<li> Item Name'
    // @see Walker::start_el()
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
        $object = $item->object;
        $type = $item->type;
        $title = $item->title;
        $description = $item->description;
        $permalink = $item->url;
        $has_children = $args->walker->has_children;
        
        
        $output .= "<li class='" .  implode(" ", $item->classes) . "'>";
            
        //Add SPAN if no Permalink
        if( $permalink && $permalink != '#' ) {
         $output .= '<a href="' . $permalink . '">';
        } else {
         $output .= '<span>';
        }
         
        $output .= $title;
        if( $description != '' && $depth == 0 ) {
         $output .= '<small class="description">' . $description . '</small>';
        }
        if( $permalink && $permalink != '#' && $has_children != true ) {
         $output .= '</a>';
        } else if ($permalink && $permalink != '#' && $has_children == true ) {
           $output .= '</a><span></span>';
          } else {
         $output .= '</span>';
        }
        
        //if has_children is true and title in array group meta field, display mega menu.
        
        if($has_children == true){
            $mega_headline = $mega_desc = $mega_button_title = $mega_button_url = $mega_img = $mega_img_id = $menu_orientation = '';
            $mega_option = get_option('mega_menu_info');
            if(!empty($mega_option['mega-headline-'.$item->ID])){ $mega_headline = $mega_option['mega-headline-'.$item->ID]; }
            if(!empty($mega_option['mega-desc-'.$item->ID])){ $mega_desc = $mega_option['mega-desc-'.$item->ID]; }
            if(!empty($mega_option['mega-button-title-'.$item->ID])){ $mega_button_title = $mega_option['mega-button-title-'.$item->ID]; }
            if(!empty($mega_option['mega-button-url-'.$item->ID])){ $mega_button_url = $mega_option['mega-button-url-'.$item->ID]; }
            if(!empty($mega_option['mega-file-'.$item->ID])){ 
                $mega_img = $mega_option['mega-file-'.$item->ID]; 
                $mega_img_id = $mega_option['mega-file-'.$item->ID.'_id'];
                $mega_img = wp_get_attachment_image_src( $mega_img_id, 'lg');
            }
            if(!empty($mega_option['mega-orientation-'.$item->ID])){ $menu_orientation = $mega_option['mega-orientation-'.$item->ID]; }
            
            $mega_contain_open = $mega_contain_close = $mega_section_image = $mega_section_title = '';
            if(!empty($mega_headline) || !empty($mega_img_id)){ 
                $brand_color_brightness = getColorLightness(site_ops_brand_color(false));
                
                $mega_contain_open = $brand_color_brightness > 500 ? '<span class="mega-menu-contain '.$menu_orientation.'">' : '<span class="mega-menu-contain invert '.$menu_orientation.'">'; 
                //$mega_contain_open = '<span class="mega-menu-contain '.$brand_color_brightness.' '.$menu_orientation.'">';
                $mega_contain_close = '</span>';
                $mega_section_image = !empty($mega_img) ? '<div class="mega-image" style="background-image:url('.$mega_img[0].');"></div>' : '';
                $mega_section_title = '<div class="mega-title-contain">';
                    $mega_section_title .= !empty($mega_headline) ? '<h3>'.$mega_headline.'</h3>' : '';
                    $mega_section_title .= !empty($mega_desc) ? '<p>'.$mega_desc.'</p>' : '';
                    $mega_section_title .= !empty($mega_button_url) && !empty($mega_button_title) ? '<a class="btn solid" href="'.$mega_button_url.'">'.$mega_button_title.'</a>' : ''; 
                    $mega_section_title .= '</div>';
            }
            
            $output .= $mega_contain_open;
            
            if(!empty($menu_orientation)){
                $output .= $mega_section_image;
                $output .= $mega_section_title;
            }
            
            $output .= '<ul class="sub-menu">';
            $menu_items = wp_get_nav_menu_items($args->menu->term_id);
            $gchild_counter = 0;
            foreach( $menu_items as $menu_item ){
                
                //</UL> AT LAST G ITEM FOR EACH PARENT
                
                //$menu_item_id = $menu_item->ID;
                $title = $menu_item->title;
                $parent = $menu_item->menu_item_parent;
                //$output .= "Title: ".$title.", Parent:".$parent." ";
                

                //if(empty($parent_id)){ $parent_id = '';}
                if(empty($grandparent_id)){ $grandparent_id = ''; }
                if ( empty($menu_item->menu_item_parent) ) { $parent_id = $item->ID; }
                    
                    //$output .= 'NAME: '.$title.' | MENU ITEM PARENT: '.$menu_item->menu_item_parent.' | MENU ITEM ID: '.$menu_item->ID.' | PARENT ID: '.$parent_id.'<br/>';
                    
                    $is_gchild = 1;
                    $gchild_counter++;
                    $output_end_ul = '';
                    if ( $grandparent_id != $menu_item->menu_item_parent ) {
                    //$output .= 'I AM A G-CHILD<br/>';
                    $is_gchild = 0;
                    if($gchild_counter>1){$output_end_ul = '</ul><span></span></li>';}
                    $gchild_counter = 0;
                  }
                  
                  if(!empty($output_end_ul)){ $output .= $output_end_ul;}

                    if ( $parent_id == $menu_item->menu_item_parent ) {
                        $grandparent_id = $menu_item->ID;
                    $link = $menu_item->url;
            $title = $menu_item->title;
            if ($is_gchild == 1 ) {
                        $output .= '<li class="item menu-item-has-children">';
                    } else {
                        $output .= '<li class="item menu-item-has-children">';
                    }
            //$output .= '<a href="'.$link.'" class="title">'.$title.' | MENU ITEM PARENT: '.$menu_item->menu_item_parent.' | PARENT ID: '.$parent_id.'</a>' ."\n";
            $output .= '<a href="'.$link.'" class="title">'.$title.'<span></span></a>' ."\n";
            //$output .= '</li>' ."\n";
                } 
                    
                if( $is_gchild == 1 ){
                    $link = $menu_item->url;
            $title = $menu_item->title;
            if($gchild_counter == 1){ $output .= '<ul class="sub-menu mega-menu">'; }
                    $output .= '<li class="item">' ."\n";
            $output .= '<a href="'.$link.'" class="title">'.$title.'<span></span></a>' ."\n";
            $output .= '</li>' ."\n";
                }
                
            }
            $output .= '</ul>'; 

        }
        
    }
    

     

}


//exclude noindex pages from sitemap
function exclude_no_indexes_from_wp_list_pages( $pages, $args ) {	
    if( array_key_exists( 'walker', $args ) ) {
        foreach ( $pages as $key => $item ) {
            $_yoast_wpseo_meta_robots_noindex = get_post_meta( $item->ID, '_yoast_wpseo_meta-robots-noindex', true );
            if( $_yoast_wpseo_meta_robots_noindex == 1 ) unset( $pages[$key] );
        }
    }
    return $pages;
}
add_filter( 'get_pages', 'exclude_no_indexes_from_wp_list_pages', 10, 2 );



// Add page slug to body class
function add_slug_to_body_class($classes){
  global $post;
  if (is_home()) {
        $key = array_search('blog', $classes);
      if ($key > -1) { unset($classes[$key]); }
  } elseif (is_page()) {
      $classes[] = sanitize_html_class($post->post_name);
  } elseif (is_singular()) {
      $classes[] = sanitize_html_class($post->post_name);
  }
  return $classes;
}	
add_filter('body_class', 'add_slug_to_body_class'); 

// Add header-style to body class
function add_header_style_to_body_class($classes){
  $appearance_info = get_option( 'appearance_info');
    $nav_style = $appearance_info['nav_style'];
  if ($nav_style != '') {
        $classes[] = $nav_style;
  }
  return $classes;
}	
add_filter('body_class', 'add_header_style_to_body_class'); 

// Add scroll_style to body class
function add_scroll_style_to_body_class($classes){
  $appearance_info = get_option( 'appearance_info');
    $scroll_style = $appearance_info['scroll_style'];
  if ($scroll_style != '') {
        $classes[] = $scroll_style;
  }
  return $classes;
}	
add_filter('body_class', 'add_scroll_style_to_body_class'); 


// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
/*
function remove_thumbnail_dimensions( $html ){
  $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
  return $html;
}
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); 
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); 
*/


// Report version numbers back to home base
add_filter( 'cron_schedules', 'codebase_add_weekly_cron_schedule' );
function codebase_add_weekly_cron_schedule( $schedules ) {
    $schedules['weekly'] = array(
        'interval' => 604800, // 1 week in seconds
        'display'  => __( 'Once Weekly' ),
    );
    return $schedules;
}
if ( ! wp_next_scheduled( 'codebase_report_home_cron' ) ) {
    wp_schedule_event( time(), 'weekly', 'codebase_report_home_cron' );
}
add_action( 'codebase_report_home_cron', 'codebase_report_home' );
function codebase_report_home() {
    $theme_data = wp_get_theme();
    $cb_v = $theme_data->parent()->get( 'Version' );
    $ds_name = $theme_data->get( 'Name' );
    $ds_v = $theme_data->get( 'Version' );
    $site_url = get_site_url();

    //using CURL send data to our DR version tracker
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"http://drversions.wpengine.com/wp-content/themes/drversions/processors/process-version.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('site_url' => $site_url,'cb_v' => $cb_v,'ds_name' => $ds_name,'ds_v' => $ds_v)));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec ($ch);
    curl_close ($ch);
}

// Disable Gutenberg
add_filter( 'gutenberg_can_edit_post_type', '__return_false' );
add_filter( 'use_block_editor_for_post_type', '__return_false' );
// Disable "Try Gutenberg" panel
remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel' );

/* Add Column Button and Column Shortcodes to Classic Editor
Code modified to fit into Codebase 2 Theme. Credit goes to
=== Lightweight Grid Columns ===
Contributors: edge22
Donate link: https://generatepress.com/ongoing-development
Requires at least: 4.5
Tested up to: 5.1
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Lightweight Grid Columns uses jQuery matchHeight to improve the responsive functionality of the columns.
http://brm.io/jquery-match-height/
jquery.matchHeight.js is licensed under The MIT License (MIT) 
Copyright (c) 2014 liabru
-START-
*/
if ( ! function_exists( 'column_shortcodes_register_shortcode' ) ) {
    add_action( 'init', 'column_shortcodes_register_shortcode' );
    /*
     * Declare our shortcode
     */
    function column_shortcodes_register_shortcode() {
        add_shortcode( 'column', 'columns_shortcode' );
    }
}
if ( ! function_exists( 'column_add_shortcode_button' ) ) {
    add_action( 'admin_init', 'column_add_shortcode_button' );
    /*
     * Set it up so we can register our TinyMCE button
     */
    function column_add_shortcode_button() {
        // check user permissions
        if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
            return;
        }

        // check if WYSIWYG is enabled
        if ( get_user_option( 'rich_editing' ) == 'true') {
            add_filter( 'mce_external_plugins', 'column_shortcodes_add_tinymce_plugin' );
            add_filter( 'mce_buttons', 'column_shortcodes_register_button' );
        }
    }
}
if ( ! function_exists( 'column_shortcodes_add_tinymce_plugin' ) ) {
    /*
     * Register our tinyMCE button javascript
     */
    function column_shortcodes_add_tinymce_plugin( $plugin_array ) {
        $plugin_array['column_shortcodes_button'] = get_template_directory_uri() . '/assets/scripts/column-button.js';
        return $plugin_array;
    }
}
if ( ! function_exists( 'column_shortcodes_register_button' ) ) {
    /*
     * Register our TinyMCE button
     */
    function column_shortcodes_register_button( $buttons ) {
        array_push( $buttons, 'column_shortcodes_button' );
        return $buttons;
    }
}
if ( ! function_exists( 'column_translatable_strings' ) ) {
    add_action( 'admin_head','column_translatable_strings', 0 );
    /*
     * Add translatable strings.
     */
    function column_translatable_strings() {
        ?>
        <script type="text/javascript">
            var column_add_columns = '<?php esc_html_e( 'Add columns', 'lightweight-grid-columns' ); ?>';
            var column_columns = '<?php esc_html_e( 'Add Column', 'lightweight-grid-columns' ); ?>';
            var column_desktop = '<?php esc_html_e( 'Desktop grid percentage', 'lightweight-grid-columns' ); ?>';
            var column_tablet = '<?php esc_html_e( 'Tablet grid percentage', 'lightweight-grid-columns' ); ?>';
            var column_mobile = '<?php esc_html_e( 'Mobile grid percentage', 'lightweight-grid-columns' ); ?>';
            var column_content = '<?php esc_html_e( 'Content', 'lightweight-grid-columns' ); ?>';
            var column_last = '<?php esc_html_e( 'Last column in row?', 'lightweight-grid-columns' ); ?>';
        </script>
        <?php
    }
}
if ( ! function_exists( 'column_shortcodes_admin_css' ) ) {
    add_action( 'admin_enqueue_scripts', 'column_shortcodes_admin_css' );
    /*
     * Add our admin CSS
     */
    function column_shortcodes_admin_css() {
        wp_enqueue_style( 'column-columns-admin', get_template_directory_uri() . '/assets/stylesheets/general/column-admin.css' );
    }
}
if ( ! function_exists( 'column_shortcodes_css' ) ) {
    add_action( 'wp_enqueue_scripts', 'column_shortcodes_css', 99 );
    /*
     * Add the unsemantic framework
     */
    function column_shortcodes_css() {
        wp_enqueue_style( 'column-unsemantic-grid-responsive-tablet', get_template_directory_uri() . '/assets/stylesheets/general/column-unsemantic-grid-responsive-tablet.css', array(), 1.0, 'all' );
        wp_register_script( 'column-matchHeight', get_template_directory_uri() . '/assets/scripts/column-jquery.matchHeight-min.js', array( 'jquery' ), 1.0, true );
    }
}
if ( ! function_exists( 'columns_shortcode' ) ) {
    /*
     * Create the output of the columns shortcode
     */
    function columns_shortcode( $atts , $content = null ) {
        extract( shortcode_atts(
            array(
                'grid' => '50',
                'tablet_grid' => '50',
                'mobile_grid' => '100',
                'last' => '',
                'class' => '',
                'style' => '',
                'equal_heights' => 'true',
                'id' => ''
            ), $atts )
        );

        if ( 'true' == $equal_heights ) {
            wp_enqueue_script( 'column-matchHeight' );
        }

        $content = sprintf(
            '<div %9$s class="column-column column-grid-parent %1$s %2$s %3$s %4$s %5$s"><div %6$s class="inside-grid-column">%7$s</div></div>%8$s',
            'column-grid-' . intval( $grid ),
            'column-tablet-grid-' . intval( $tablet_grid ),
            'column-mobile-grid-' . intval( $mobile_grid ),
            ( 'true' == $equal_heights ) ? 'column-equal-heights' : '',
            esc_attr( $class ),
            ( '' !== $style ) ? ' style="' . esc_attr( $style ) . '"' : '',
            do_shortcode( $content ),
            ( 'true' == $last ) ? '<div class="column-clear"></div>' : '',
            ( '' !== $id ) ? 'id="' . esc_attr( $id ) . '"' : ''
        );

        return force_balance_tags( $content );
    }
}
if ( ! function_exists( 'columns_helper' ) ) {
    add_filter( 'the_content', 'columns_helper' );
    /*
     * Fix the WP paragraph and <br /> issue with shortcodes
     */
    function columns_helper( $content ) {
        $array = array (
            '<p>[column' => '[column',
            'column]</p>' => 'column]',
            '<br />[column' => '[column',
            'column]<br />' => 'column]'
        );

        return strtr( $content, $array );
    }
}
if ( ! function_exists( 'column_ie_compatibility' ) ) {
    add_action( 'wp_head', 'column_ie_compatibility' );
    /**
     * Add compatibility for IE8 and lower
     * @since 0.3
     */
    function column_ie_compatibility() {
    ?>
        <!--[if lt IE 9]>
            <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/stylesheets/general/column-ie.min.css'; ?>" />
        <![endif]-->
    <?php
    }
}
/* Add Column Button and Column Shortcodes to Classic Editor
-END-
*/

// Compile CSS from SCSS Based on Variables from CMB2

function scss_php_compile() {
    include get_template_directory() . '/assets/stylesheets/style.php';
}

add_action( 'cmb2_save_options-page_fields_appearance_info', 'cmb2_save_apperance_options', 10, 3 );
 function cmb2_save_apperance_options( string $object_id, array $updated, CMB2 $cmb )
 {
     scss_php_compile();
 }
 
// Compile CSS after update of Codebase theme
add_action('after_setup_theme', 'compile_after_update');
function compile_after_update() {
        
    $current_version = wp_get_theme()->get('Version');
  $old_version = get_option( 'PREFIX_theme_version' );

  if ($old_version !== $current_version) {
        scss_php_compile();
        
    update_option('PREFIX_theme_version', $current_version);
  }
    
}

//force scss_php_compile after theme update
add_action('upgrader_process_complete', 'PREFIX_options_removal');

add_action('switch_theme', 'PREFIX_options_removal');
function PREFIX_options_removal () {
  delete_option('PREFIX_theme_version');
}

function cb2_pagination(){
    global $wp_query; 
    echo paginate_links();
}

function dental_revenue_post_types() {
    register_post_type('gallery', array(
      'description' => 'Gallery of images for the gallery page template',
      'menu_position' => 5,
      'public' => true,
      'menu_icon' => 'dashicons-format-gallery',
      'has_archive' => false,
      'supports' => array('excerpt'),
      'labels' => array(
        'name' => 'Gallery',
        'add_new_item' => 'Add New Picture',
        'edit_item' => 'Edit Picture',
        'all_items' => 'All Pictures',
        'singular_name' => 'Picture'
      )
    ));
  }
add_action('init', 'dental_revenue_post_types');

// Fully Disable Gutenberg editor.

add_filter('use_block_editor_for_post_type', '__return_false', 10);

// Don't load Gutenberg-related stylesheets.

add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );

function remove_block_css() {

wp_dequeue_style( 'wp-block-library' ); // Wordpress core

wp_dequeue_style( 'wp-block-library-theme' ); // Wordpress core

wp_dequeue_style( 'wc-block-style' ); // WooCommerce

wp_dequeue_style( 'storefront-gutenberg-blocks' ); // Storefront theme

}
?>
