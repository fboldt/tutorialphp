<?php
require_once "mensagem/controle.php";
$controleMensagem = new ControleMensagem();
$controleMensagem->insereMensagem($_POST['texto']);

require_once 'index.php';

?>