<?php

class Credencial {
    private $usuarios;
    function __construct() {
        $this->usuarios = array();
        $this->usuarios['alice'] = '123';
        $this->usuarios['bruce'] = '234';
        $this->usuarios['carol'] = '345';
    }
    function confereLoginSenha($login, $senha) {
        $usuarioExiste = array_key_exists($login, $this->usuarios);
        if ($usuarioExiste) {
            $senhaConfere = $this->usuarios[$login] == $senha;
        }
        return $usuarioExiste && $senhaConfere;
    }
}

class Usuario {
    private $credencial;
    function __construct() {
        session_start();
        $this->credencial = new Credencial();
    }
    function getLogin() {
        return $_SESSION['login'];
    }
    function login($login, $senha) {
        if ($this->credencial->confereLoginSenha($login, $senha)) {
            $_SESSION["login"] = $login;
        }
    }
    function logout() {
        $_SESSION["login"] = "";
    }
}

?>