<?php
require_once "usuario/controle.php";
$controleUsuario = new ControleUsuario();
$controleUsuario->logout();

require_once 'index.php';

?>