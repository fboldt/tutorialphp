<?php

require_once "usuario/controle.php";
$controleUsuario = new ControleUsuario();
$controleUsuario->insereLoginSenha($_POST["login"], $_POST["senha"]);

require_once 'index.php';

?>