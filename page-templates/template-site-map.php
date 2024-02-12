<?php
/*
    Template Name: Sitemap
*/
get_header();
get_template_part('partials/page-head');
?>
<!-- main -->
<div role="main">
    <div class="row">
        <div class="columns twelve">
            <div class="main-content">
                <ul class="sitemap"><?php echo wp_list_pages( array( 'echo'=>false, 'title_li' => false ) ); ?></ul>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>