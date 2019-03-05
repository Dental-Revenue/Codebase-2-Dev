<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php wp_title(''); ?></title>		
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/other/favicon.png">
<link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/other/apple-touch-icon-precomposed.png" >

<?php wp_head(); ?>

<?php if(!empty(site_ops_recaptcha(false)) && is_page_template('page-templates/template-schedule.php')){
  wp_enqueue_script('recaptcha');
} ?>

<?php if(!empty(site_ops_gtm_id(false))){ ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-<?php site_ops_gtm_id(); ?>');</script>
<!-- End Google Tag Manager -->
<?php } ?>
	
</head>

<body <?php body_class(); ?>>
	
<?php if(!empty(site_ops_gtm_id(false))){ ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-<?php site_ops_gtm_id(); ?>"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php } ?>
  
<?php get_template_part( 'partials/header' ); ?>
<?php get_template_part( 'partials/fold' ); ?>

<div class="page-wrap">