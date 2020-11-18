<?php

session_start();
$login = "alice";
$senha = "123";
if ($_POST["login"] == $login && $_POST["senha"] == $senha) {
    $_SESSION["login"] = $_POST["login"];
}

require_once 'index.php';

?>