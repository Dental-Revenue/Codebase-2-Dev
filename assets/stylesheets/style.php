<?php

require_once("../../../../../wp-load.php");
$init_main_color = !empty(site_ops_brand_color(false)) ? site_ops_brand_color(false) : '#d93';
$init_heading_font = !empty(site_ops_heading_font(false)) ? site_ops_heading_font(false) : 'Raleway';
$init_body_font = !empty(site_ops_body_font(false)) ? site_ops_body_font(false) : 'Karla';
$init_button_style = !empty(site_ops_buttons_style(false)) ? site_ops_buttons_style(false) : '3px';
$init_headline_case = !empty(site_ops_headline_case(false)) ? site_ops_headline_case(false) : 'uppercase';

require_once  __DIR__ . '/../../inc/libs/scssphp/scss.inc.php';
require_once  __DIR__ . '/../../inc/libs/scssphp/example/Server.php';
use Leafo\ScssPhp\Compiler;
use Leafo\ScssPhp\Server;
$directory = __DIR__ ;

$scss = new Compiler();
$scss->setVariables(array(
    'main-color' => $init_main_color,
    'heading-font' => $init_heading_font,
    'body-font' => $init_body_font,
    'buttons-style' => $init_button_style,
    'headline-case' => $init_headline_case,
));
$scss->setFormatter('Leafo\ScssPhp\Formatter\Compressed');
$scss->setImportPaths($directory);
$scss->setLineNumberStyle(Compiler::LINE_COMMENTS);

$server = new Server($directory, null, $scss);
$server->serve();

//echo $directory;

?>