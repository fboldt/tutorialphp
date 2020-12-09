<?php
chdir("../../");
require_once "usuario/controle.php";
$controleUsuario = new ControleUsuario();
$controleUsuario->login($_POST["login"], $_POST["senha"]);

header("Location: /tutorialphp/");
?>