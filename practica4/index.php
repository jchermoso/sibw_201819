<?php
if(!isset($_SESSION)) {
  session_start();
}
error_reporting(0);

require_once 'vendor/autoload.php';
require_once 'modelo/modelo.php';
require_once 'modelo/session.php';

$bd = new BD;
$session = new Session;

date_default_timezone_set('Europe/Madrid');

$renderparams = [];

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment( $loader,[]);

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
    case '' :
        echo $session->getNick();
        
        $renderparams["menu"] = $bd->select_menu();
        $renderparams["eventos"] = $bd->select_evento();
        $renderparams["galeria"] = $bd->select_galeria();

        echo $twig->render('portada.html',$renderparams);
        break;
        
    case '/evento' :
        $id = $_POST["idEvento"];
        $renderparams["menu"] = $bd->select_menu();
        $renderparams["evento"] = $bd->getEvento($id);
        $renderparams["eventos"] = $bd->select_evento();
        $renderparams["galeria"] = $bd->select_galeria();
        $renderparams["comentarios"] = $bd->select_comentario($id);
        
        echo $twig->render('evento.html',$renderparams);
        break;
        
    case '/contacto':
        $renderparams["menu"] = $bd->select_menu();
        $renderparams["eventos"] = $bd->select_evento();
        
        $session->finalizar();
        
        echo $twig->render('contacto.html', $renderparams);
        break;
        
    case '/comentario':
        $nombre = $_POST["nombre"];
        $idEvento = $_POST["id"];
        $comentario = $_POST["comentario"];
        $email = $_POST["email"];
        $fecha_hora =  date(DATE_RFC2822);
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        
        $bd->insert_comentario($nombre,$idEvento,$comentario,$email,$fecha_hora,$ipAddress);
        header('Location: /');
        break;
        
    case '/imprimir':
        $id = $_POST["idEvento"];
        $renderparams["menu"] = $bd->select_menu();
        $renderparams["evento"] = $bd->getEvento($id);
        $renderparams["eventos"] = $bd->select_evento();
        $renderparams["galeria"] = $bd->select_galeria();        
        $renderparams["imprimir"] = TRUE;
    
        echo $twig->render('imprimir_evento.html', $renderparams);
        break;
        
    case '/login':
        if (isset($_POST["nombre"]) && isset($_POST["pass"])) {
            $nombre = $_POST["nombre"];
            $pass = $_POST["pass"];
        
            $bd->login($nombre,$pass);
        }
        $renderparams["menu"] = $bd->select_menu();
        
        echo $twig->render('login.html',$renderparams);
        break;
        
    case '/registro':
        if (isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["pass"])) {
            $nombre = $_POST["nombre"];
            $email = $_POST["email"];
            $pass = $_POST["pass"];
        
            $bd->registrar($nombre,$email,$pass);
        }
    
        $renderparams["menu"] = $bd->select_menu();
        
        echo $twig->render('registro.html',$renderparams);
        break;
        
    case '/panel':
        if (empty($session->getTipo())) {
            echo "Solo para miembros";
        }
        else {
            echo "ediiiiiii";
        }
        break;
    
    case '/header.html':
        
        break;
    
    default:
        $renderparams['error'] = 404;
        $renderparams["menu"] = $bd->select_menu();

        echo $twig->render('404.html', $renderparams);
        break;
}
?>
