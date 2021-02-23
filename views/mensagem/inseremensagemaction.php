<?php
chdir("../../");
require_once "controle.php";
$controleMensagem = criaControleMensagem();
$controleMensagem->insereMensagem($_POST['texto']);

header("Location: ../../index.php");
?>