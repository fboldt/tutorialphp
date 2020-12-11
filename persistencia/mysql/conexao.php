<?php
function getConexao() {
    $hostname = 'localhost';
    $database = 'tutorialphp';
    $username = 'francisco';
    $password = 'francisco';
    $mysqlconnection = new mysqli($hostname, $username, $password, $database);
    return $mysqlconnection;
}
?>