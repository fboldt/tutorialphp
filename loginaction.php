<?php

require_once "usuario/controle.php";

$usuario = new Usuario();

$usuario->login($_POST["login"], $_POST["senha"]);

require_once 'index.php';

?>