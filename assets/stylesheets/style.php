<?php

$loadPath = preg_replace('/wp-content.*$/','',__DIR__);

require_once($loadPath. "wp-load.php");
$init_main_color = !empty(site_ops_brand_color(false)) ? site_ops_brand_color(false) : '#d93';
$init_nav_color = !empty(site_ops_nav_color(false)) ? site_ops_nav_color(false) : '#000';
$init_heading_font = !empty(site_ops_heading_font(false)) ? site_ops_heading_font(false) : 'Raleway';
$init_body_font = !empty(site_ops_body_font(false)) ? site_ops_body_font(false) : 'Karla';
$init_button_style = !empty(site_ops_buttons_style(false)) ? site_ops_buttons_style(false) : '3px';
$init_headline_case = !empty(site_ops_headline_case(false)) ? site_ops_headline_case(false) : 'uppercase';

require_once  __DIR__ . '/../../inc/libs/scssphp/scss.inc.php';

use ScssPhp\ScssPhp\Compiler;
use ScssPhp\ScssPhp\Formatter\Compressed;

$directory = __DIR__ ;
$formatterName = "ScssPhp\\ScssPhp\\Formatter\\Compressed";

$scss = new scssc();
$scss->setVariables(array(
    'main-color' => $init_main_color,
    'heading-font' => $init_heading_font,
    'body-font' => $init_body_font,
    'buttons-style' => $init_button_style,
    'headline-case' => $init_headline_case,
    'nav-color' => $init_nav_color
));
$scss->setFormatter('scss_formatter_compressed');
$scss->setImportPaths($directory);

$scssIn = file_get_contents($directory . '/style.scss');
$cssOut = $scss->compile($scssIn);
file_put_contents($directory . '/style.css', $cssOut);

?>