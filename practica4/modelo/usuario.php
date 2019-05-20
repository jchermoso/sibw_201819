<?php

class usuario {
    private $id;
    private $tipo;
    private $nombre;
    private $email;
    private $password;

    public static $ROLES = ['registrado', 'moderador', 'gestor', 'superusuario'];

    public function __construct() {
        $this->id = -1;
        $this->tipo = NULL;
        $this->nombre = NULL;
        $this->email = NULL;
        $this->password = NULL;
    }

    public function getId() {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
        return $this;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }

}