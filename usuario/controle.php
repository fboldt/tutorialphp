<?php
require_once "usuario/credencial.php";
require_once "usuario/usuario.php";

function getLogin() {
    $usuario = new Usuario();
    $login = $usuario->getLogin();
    return $login;
}

function login($login, $senha) {
    $usuario = new Usuario();
    $usuario->login($login, $senha);
}

function logout() {
    $usuario = new Usuario();
    $usuario->logout();
}

function insereLoginSenha($login, $senha) {
    $credencial = new Credencial();
    $credencial->insereLoginSenha($login, $senha);
}
?>