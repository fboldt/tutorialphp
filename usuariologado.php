<?php

require_once "usuario/controle.php";

$usuario = new Usuario();

$login = $usuario->getLogin();

if (empty($login)) {
    require_once 'loginform.html';
} else {
    echo $login;
    echo ' <a href="logoutaction.php">logout</a>';
}

?>