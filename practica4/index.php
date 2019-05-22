<?php
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
        echo $session->getNick() . "<br>" . $session->getTipo();
        $renderparams["menu"] = $bd->select_menu();
        $renderparams["eventos"] = $bd->select_evento();
        $renderparams["galeria"] = $bd->select_galeria();
        $renderparams["nick"] = $session->getNick();
        $renderparams["tipo"] = $session->getTipo();

        echo $twig->render('portada.html',$renderparams);
        break;
        
    case '/evento' :
        echo $session->getNick();  
        $id = $_POST["idEvento"];
        $renderparams["tipo"] = $session->getTipo();
        $renderparams["menu"] = $bd->select_menu();
        $renderparams["evento"] = $bd->getEvento($id);
        $renderparams["eventos"] = $bd->select_evento();
        $renderparams["galeria"] = $bd->select_galeria();
        $renderparams["comentarios"] = $bd->select_comentario($id);
        
        echo $twig->render('evento.html',$renderparams);
        break;

    case '/nuevo_evento':
        $renderparams["menu"] = $bd->select_menu();
        $renderparams["evento"] = NULL;
        $renderparams["eventos"] = $bd->select_evento();
        $renderparams["tipo"] = $session->getTipo();
        $renderparams["titulo"] = 'Nuevo evento';

        echo $twig->render('nuevo-evento.html', $renderparams);
        break;

    case '/editar_evento':
        $id = $_POST["idEvento"];
        $renderparams["evento"] = $bd->getEvento($id);
        $renderparams["eventos"] = $bd->select_evento();
        $renderparams["galeria"] = $bd->select_galeria();
        $renderparams["comentarios"] = $bd->select_comentario($id);
        $renderparams["menu"] = $bd->select_menu();
        $renderparams["tipo"] = $session->getTipo();
        $renderparams["titulo"] = 'Editar evento';

        echo $twig->render('nuevo-evento.html', $renderparams);
        break;

    case '/guardar_evento':
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $grupo = $_POST['grupo'];
        $texto = $_POST['texto'];
        $fechaP = $id == -1? date(DATE_RFC2822) : $_POST['fecha1'];
        $fechaM = date(DATE_RFC2822);

        $bd->insert_update_evento($id,$nombre,$grupo,$texto,$fechaP,$fechaM);
        header('Location: /');
        break;

    case '/eliminar_evento':
        $id = $_POST["idEvento"];
        echo "$id";
        $bd->delete_evento($id);
        header('Location: /listado');
        break;

    case '/listado': // listado de eventos
        $renderparams["eventos"] = $bd->select_evento();
        $renderparams["menu"] = $bd->select_menu();
        $renderparams["tipo"] = $session->getTipo();
        $renderparams["titulo"] = 'Listado de eventos';

        echo $twig->render('listado-eventos.html', $renderparams);
        break;

    case '/contacto':
        echo $session->getNick();  
        $renderparams["menu"] = $bd->select_menu();
        $renderparams["eventos"] = $bd->select_evento();
                
        echo $twig->render('contacto.html', $renderparams);
        break;
        
    case '/comentario':
        $nombre = $session->getNick();
        $idEvento = $_POST["id"];
        $comentario = $_POST["comentario"];
        $fecha_hora =  date(DATE_RFC2822);
        
        $bd->insert_comentario($nombre,$idEvento,$comentario,$fecha_hora);
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
        $renderparams["login"] = 'login';
        
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
        $renderparams["eventos"] = $bd->select_evento();
        
        echo $twig->render('registro.html',$renderparams);
        break;        
    case '/logout':
        $session->finalizar();
        echo "¡Hasta luego!";
        header("Refresh:1; url=/");
        break;
    
    case '/editar_perfil':
        if (isset($_POST["pass"]) && isset($_POST["email"]) && isset($_POST["desc"])) {
            $bd->modificar_perfil($session->getNick(),$_POST["pass"],$_POST["email"],$_POST["desc"]);
        }

        $renderparams["perfil"] = $bd->select_usuario($session->getNick());
        $renderparams["menu"] = $bd->select_menu();

        echo $twig->render('operacion.html',$renderparams);
        break;
    
    case '/lista_comentarios':
        $renderparams["comentarios"] = $bd->select_comentarios();
        $renderparams["menu"] = $bd->select_menu();
        
        echo $twig->render('listado_comentarios.html',$renderparams);
        break;
    
    case '/editar_comentario':
        break;
    case '/eliminar_comentario':

        break;
    default:
        $renderparams['error'] = 404;
        
        echo $twig->render('404.html', $renderparams);
        break;
}
?>
