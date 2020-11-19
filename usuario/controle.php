<?php

class Usuario {
    function __construct() {
        session_start();
    }
    function getLogin() {
        return $_SESSION['login'];
    }
    private function confereLoginSenha($login, $senha) {
        return $login == 'alice' && $senha == '123';
    }
    function login($login, $senha) {
        if ($this->confereLoginSenha($login, $senha)) {
            $_SESSION["login"] = $login;
        }
    }
    function logout() {
        $_SESSION["login"] = "";
    }
}

?>