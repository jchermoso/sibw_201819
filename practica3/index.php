<?php
require_once 'vendor/autoload.php';
require_once 'modelo/modelo.php';

$bd = new BD;

$renderparams = array();

$renderparams["menu"] = $bd->select_menu();
$renderparams["evento"] = $bd->select_evento();
$renderparams["galeria"] = $bd->select_galeria();

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment( $loader,[]);

$request = $_SERVER['REQUEST_URI'];
switch ($request) {
    case '/' :
    case '' :
        echo $twig->render('portada.html',$renderparams);
        break;
    case '/evento' :
        $id = $_POST("idEvento");
        echo $id ." dsrgsrg"; die();
        echo $twig->render('evento.html',$renderparams);
        break;
    case '/contacto':
        echo $twig->render('contacto.html', $renderparams);
        break;
    /*default:
        $renderparams['error'] = 404;
        echo $twig->render('404.html', $renderparams);
        break;*/
}

/*echo $twig->render('portada.html',$renderparams);
echo $twig->render('evento.html',$renderparams);*/
?>
