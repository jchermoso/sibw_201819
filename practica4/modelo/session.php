<?php 
require_once "modelo.php";

    class Session{
        public function __construct(){}

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
