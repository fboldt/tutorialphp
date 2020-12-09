<?php
require_once "usuario/controle.php";
require_once "persistencia/usuario.php";
require_once "mensagem/controle.php";
require_once "persistencia/mensagem.php";

function criaControleUsuario() {
    $persistencia = new PersistenciaUsuario();
    $controleUsuario = new ControleUsuario($persistencia);
    return $controleUsuario;
}
function criaControleMensagem() {
    $persistencia = new PersistenciaMensagem();
    $controleMensagem = new ControleMensagem($persistencia);
    return $controleMensagem;
}
?>