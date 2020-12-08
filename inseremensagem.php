<?php
require_once "usuario/controle.php";
$controleUsuario = new ControleUsuario();
$login = $controleUsuario->getLogin();

if (!empty($login)) {
    require_once 'inseremensagemform.html';
}

?>