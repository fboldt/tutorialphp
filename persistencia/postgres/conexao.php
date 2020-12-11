<?php
function getConexao() {
    $hostname = 'localhost';
    $database = 'tutorialphp';
    $username = 'francisco';
    $password = 'francisco';
    $stringconexao = "host=$hostname dbname=$database user=$username password=$password";
    return pg_connect($stringconexao);
}
?>