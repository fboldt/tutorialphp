<?php
require_once "mensagem/controle.php";
$controleMensagem = new ControleMensagem();
$mensagens = $controleMensagem->getMensagens();

foreach($mensagens as $mensagem) {
    echo "<br><div>";
    echo $mensagem['quem'] . " (" . $mensagem['quando'] . ")<br>";
    echo $mensagem['texto'];
    echo "</div>";
}
?>