<?php
	
/*
require_once  __DIR__ . '/inc/libs/scssphp/scss.inc.php';
require_once  __DIR__ . '/inc/libs/scssphp/example/Server.php';

use Leafo\ScssPhp\Server;

$directory = __DIR__ . "/assets/stylesheets/";

$server = new Server($directory);
$server->serve();
*/


require_once("../../../../../wp-load.php");
$appearance_info = get_option( 'appearance_info');

require_once  __DIR__ . '/../../inc/libs/scssphp/scss.inc.php';
require_once  __DIR__ . '/../../inc/libs/scssphp/example/Server.php';
use Leafo\ScssPhp\Compiler;
use Leafo\ScssPhp\Server;
$directory = __DIR__ ;

$scss = new Compiler();
$scss->setVariables(array(
    'main-color' => $appearance_info['main_color'],
    'heading-font' => $appearance_info['heading_font'],
    'body-font' => $appearance_info['body_font'],
    'buttons-style' => $appearance_info['buttons_style'],
    'headline-case' => $appearance_info['headline_case'],
));
$scss->setFormatter('Leafo\ScssPhp\Formatter\Compressed');
$scss->setImportPaths($directory);
$scss->setLineNumberStyle(Compiler::LINE_COMMENTS);

$server = new Server($directory, null, $scss);
$server->serve();

//echo $directory;

?>