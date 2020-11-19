<?php

require_once "usuario/controle.php";

$usuario = new Usuario();

$usuario->logout();

require_once 'index.php';

?>