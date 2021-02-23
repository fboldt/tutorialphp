<?php

function isLocalhost($whitelist = ['127.0.0.1', '::1']) {
    return in_array($_SERVER['REMOTE_ADDR'], $whitelist);
}

function getLocalhostConexao() {
    $hostname = 'localhost';
    $database = 'tutorialphp';
    $username = 'francisco';
    $password = 'francisco';
    $connstring = "host=$hostname dbname=$database user=$username password=$password";
    return pg_connect($connstring);
}

function getConexao() {
    if(isLocalhost()) {
        return getLocalhostConexao();
    }
    return pg_connect(getenv("DATABASE_URL"));
}

?>