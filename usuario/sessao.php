<?php
require_once "usuario/credencial.php";

class Sessao {
    private $credencial;
    function __construct(PersisteCredencial $persistencia) {
        session_start();
        $persistencia = $persistencia;
        $this->credencial = new Credencial($persistencia);
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