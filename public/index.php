<?php
header("Content-Type: text/html; charset=utf-8");
require_once("../config/config.php");
require_once("../src/vendor/autoload.php");

// echo DIRPAGE;
// echo '<br>'.DIRREQ;
// echo '<br>'.DIRIMG;
// echo '<br>'.DIRCSS;
// echo '<br>'.DIRJS;
// echo '<br>';
// echo '<pre>'; print_r($_SERVER); echo '</pre>';
//include(DIRREQ."App/View/Layout.php");

//use Src\Classes\ClassRoutes;

$Dispatch = new App\Dispatch();

//$n = new App\Model\ClassConexao();
//var_dump($n->conexaoDB());
//$n =new Src\Classes\ClassBreadcrumb();
//$n->addBreadcrumb();
?>

