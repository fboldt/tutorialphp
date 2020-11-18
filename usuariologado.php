<?php

session_start();

$login = $_SESSION["login"];
if (empty($login)) {
    require_once 'loginform.html';
} else {
    echo $login;
    echo ' <a href="logoutaction.php">logout</a>';
}

?>