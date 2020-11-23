<?php

require_once "usuario/controle.php";
insereLoginSenha($_POST["login"], $_POST["senha"]);

require_once 'index.php';

?>