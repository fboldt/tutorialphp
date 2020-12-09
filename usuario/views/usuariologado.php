<?php
require_once "usuario/controle.php";
$controleUsuario = new ControleUsuario();
$login = $controleUsuario->getLogin();

if (empty($login)) {
    require_once 'usuario/views/loginform.html';
} else {
    echo $login;
    echo ' <a href="usuario/views/logoutaction.php">logout</a>';
}

?>