<?php
chdir("../../");
require_once "mensagem/controle.php";
$controleMensagem = new ControleMensagem();
$controleMensagem->insereMensagem($_POST['texto']);

header("Location: /tutorialphp/");
?>