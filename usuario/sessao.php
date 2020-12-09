<?php
class Sessao {
    private $credencial;
    function __construct() {
        session_start();
    }
    function getLogin() {
        return $_SESSION['login'];
    }
    function login($login) {
        $_SESSION["login"] = $login;
    }
    function logout() {
        $_SESSION["login"] = "";
    }
}
?>