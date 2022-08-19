<?php
/**
 * Responsive gallery for headshots, before-after pictures, and/or text excerpts.
 * Template Name: Smart Gallery
 * 
 * @category Page_Template
 * @package  Smart_Gallery
 * @author   Paul Mulligan <paul@dentalrevenue.com>
 * @license  GNU Free Documentation License http://www.gnu.org/licenses/fdl-1.3.html
 * @link     Documentation https://github.com/Dental-Revenue/documentation/blob/main/Smart%20Gallery%20Documentation.pdf
 */

get_header();
get_template_part('partials/page-head');
?>
<!-- BEGIN MAIN DIV -->
<div role="main">
  <!-- BEGIN ROW DIV -->
  <div class="row">
    <?php
    if (have_posts()) : while (have_posts()) : the_post();
            the_content();
    endwhile;
    endif;
    $columns = get_post_meta(get_the_ID(), 'sg_select', true);
    $deluxe = get_post_meta(get_the_ID(), 'sg_deluxe', true);
    $background_color = get_post_meta(get_the_ID(), 'sg_bg-color', true);
    $title_color = get_post_meta(get_the_ID(), 'sg_title-color', true);
    $description_color = get_post_meta(get_the_ID(), 'sg_description-color', true);
    $tags = array();
    $gallery = new WP_Query(
        array(
        'post_type' => 'gallery',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
        )
    );
    // BEGIN GALLERY 1 WHILE STATEMENT
    while ($gallery->have_posts()) {
        $gallery->the_post();
        $post_id = get_the_ID();
        $headshot = get_post_meta($post_id, 'headshot', true);
        $before_image = get_post_meta($post_id, 'before_image', true);
        $smart_title = get_post_meta($post_id, 'smart_title', true);
        $smart_excerpt = get_post_meta($post_id, 'description', true);
        $spacer = get_post_meta($post_id, 'spacer', true);
        GLOBAL $tags;
        $new_tags = get_the_tags();
        if ($new_tags) {
            foreach ($new_tags as $tag) {
                array_push($tags, $tag);
            }
        }
        if ($headshot) {
            $headshot_picture_grid_css = ' headshot-grid';
        }
        if ($deluxe) {
            $deluxe_grid_css = ' deluxe-grid';
        }
        if ($before_image) {
            $before_image_grid_css = ' before-grid';
        }
        if ($smart_title) {
            $smart_title_grid_css = ' title-grid';
        }
        if ($smart_excerpt) {
            $smart_excerpt_grid_css = ' excerpt-grid';
        }
        if ($spacer) {
            $spacer_grid_css = ' spacer-grid';
        }
        // END GALLERY 1 WHILE STATEMENT
    };
    ?>
    <div class="filter-container">
      <ul class="filter-list">
        <?php
        $filtered_tags = array();
        foreach ($tags as $tag) {
            if (!in_array($tag, $filtered_tags)) {
                array_push($filtered_tags, $tag);
            }
        }
        foreach ($filtered_tags as $tag) {
            ?>
            <a href="#" id="<?php echo str_replace(' ', '', strtolower($tag->name)); ?>" class="btn filter" onclick="FilterPicker(this.id)"><?php echo $tag->name; ?></a>
            <?php
        }
        if ($filtered_tags) {
            ?>
          <a href="#" id="all" class="btn filter" onclick="FilterPicker(this.id)">All</a>
            <?php
        }
        ?>
      </ul>
    </div>
    <!-- BEGIN PICTURE GRID DIV -->
    <div id="picture-grid" class="<?php echo $columns; ?>-column-grid<?php echo $headshot_picture_grid_css;
                                                                           echo $deluxe_grid_css;
                                                                           echo $before_image_grid_css;
                                                                           echo $smart_title_grid_css;
                                                                           echo $smart_excerpt_grid_css;
                                                                           echo $spacer_grid_css; ?>">
      <?php
        // BEGIN GALLERY 2 WHILE STATEMENT
        while ($gallery->have_posts()) {
            $gallery->the_post();
            $post_id = get_the_ID();
            $headshot = get_post_meta($post_id, 'headshot', true);
            $before_image = get_post_meta($post_id, 'before_image', true);
            $after_image = get_post_meta($post_id, 'after_image', true);
            $smart_title = get_post_meta($post_id, 'smart_title', true);
            $smart_excerpt = get_post_meta($post_id, 'description', true);
            $spacer = get_post_meta($post_id, 'spacer', true);
            $tags = get_the_tags();
            ?>
        <!-- BEGIN GRID PATIENT GRID -->
        <div class="grid-patient all <?php
        if ($tags) {
            foreach ($tags as $tag) {
                echo str_replace(' ', '', strtolower($tag->name)) . " ";
            }
        }
        ?>"
            <?php
            if ($deluxe) {
                ?>
                style="background-color: <?php echo $background_color; ?> !important" 
                <?php
            }
            ?>>
            <?php
            if ($headshot) {
                ?>
                <img src="<?php echo wp_get_attachment_image_src($headshot, 'lg')[0]; ?>" class="headshot-image" />
                <?php
            }
            // BEGIN BEFORE PICTURE IF
            if ($before_image) {
                ?>
                <!-- BEGIN BEFORE AFTER CONTAINER DIV -->
                <div class="before-after-container">
                    <img src="<?php echo wp_get_attachment_image_src($before_image, 'lg')[0]; ?>" class="before-image" id="before-<?php echo $post_id; ?>" />
                    <div class="slide-container">
                        <input type="range" min="1" max="1000" value="500" class="slider<?php if ($spacer) {
                            echo ' spacer';
                       } ?>" id="range-slider-<?php echo $post_id; ?>" oninput="SliderChanger(this.value, this.id)">
                    </div>
                    <img src="<?php echo wp_get_attachment_image_src($after_image, 'lg')[0]; ?>" class="after-image" id="after-<?php echo $post_id; ?>" />
                <!-- END BEFORE AFTER CONTAINER DIV -->
                </div>
                <?php
                // BEGIN EXCERPT IF
                if ($smart_excerpt || $smart_title || $spacer) {
                    ?>
                    <div class="excerpt-container">
                        <?php
                        if ($smart_title) {
                            ?>
                            <h3 class="gallery-title" style="color: <?php echo $title_color; ?>"><?php echo $smart_title; ?></h3>
                            <?php
                        }
                        ?>
                        <p class="gallery-excerpt" style="color: <?php echo $description_color; ?>"><?php echo $smart_excerpt; ?></p>
                    </div>
                    <?php
                    // END EXCERPT IF
                }
                // END BEFORE PICTURE IF
            }
            // BEGIN EXCERPT IF
            if (!$before_image && ($smart_excerpt || $smart_title || $spacer)) {
                ?>
                <div class="excerpt-container">
                    <?php
                    if ($smart_title) {
                        ?>
                        <h3 class="gallery-title" style="color: <?php echo $title_color; ?>"><?php echo $smart_title; ?></h3>
                        <?php
                    }
                    ?>
                    <p class="gallery-excerpt" style="color: <?php echo $description_color; ?>"><?php echo $smart_excerpt; ?></p>
                </div>
                <?php
                // END EXCERPT IF
            }
            ?>
      <!-- END GRID PATIENT GRID -->
      </div>
            <?php
            // END GALLERY 2 WHILE STATEMENT
        }
        ?>
    <!-- END PICTURE GRID DIV -->
    </div>
  <!-- END ROW DIV -->
  </div>
<!-- END MAIN DIV -->
</div>
<?php
get_footer();
?>