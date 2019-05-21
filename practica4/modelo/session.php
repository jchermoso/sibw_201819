<?php 
require_once "modelo.php";

class Session{
    public function __construct(){
        if(!isset($_SESSION)) {
            session_start();
        }
    }

    function iniciar($nick,$tipo) {
        $_SESSION["tipo"] = $tipo;
        $_SESSION["nick"] = $nick;
    }

    function finalizar() {
        session_destroy();
    }
    
    function getNick() {
        return $_SESSION["nick"];
    }
    
    function getTipo() {
        return $_SESSION["tipo"];
    }
}
?> 
