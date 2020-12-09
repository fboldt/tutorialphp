<?php
chdir("../../");
require_once "usuario/controle.php";
$controleUsuario = new ControleUsuario();
$controleUsuario->insereLoginSenha($_POST["login"], $_POST["senha"]);

header("Location: /tutorialphp/");
?>