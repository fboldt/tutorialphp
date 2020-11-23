<?php

require_once "usuario/controle.php";
login($_POST["login"], $_POST["senha"]);

require_once 'index.php';

?>