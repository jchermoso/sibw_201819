<?php 

include("src/db_connect.php");

$mysqli = new Connect("usuario","lechuza","sibw");

var_dump($mysqli);  

require_once 'vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('template');
$twig = new \Twig\Environment( $loader,[]);
echo $twig->render('pruebaTemplate.html' ,
    ['nombre' => 'Espinete' ,'edad' => 'Indefinida']);


?>

