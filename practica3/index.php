<?php
require_once 'vendor/autoload.php';
require_once 'modelo/modelo.php';

$bd = new BD;

$renderparams = $bd->select_menu();
$renderparams = $bd->select_evento();

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment( $loader,[]);

//echo $twig->render('portada.html',$renderparams);
echo $twig->render('evento.html',$renderparams);
?>
