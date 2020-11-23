<?php
require_once "usuario/credencial.php";

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