<?php
chdir("../../");
require_once "usuario/controle.php";
$controleUsuario = new ControleUsuario();
$controleUsuario->logout();

header("Location: /tutorialphp/");
?>