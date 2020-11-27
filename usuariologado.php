<?php
require_once "usuario/controle.php";
$controleUsuario = new ControleUsuario();
$login = $controleUsuario->getLogin();

if (empty($login)) {
    require_once 'loginform.html';
} else {
    echo $login;
    echo ' <a href="logoutaction.php">logout</a>';
}

?>