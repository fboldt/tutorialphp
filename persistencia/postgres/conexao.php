<?php
require_once getcwd() . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(getcwd());
$dotenv->load();

function getConexao() {
    $stringconexao = $_ENV['POSTGRES_STRING_CONNECTION'];
    return pg_connect($stringconexao);
}
?>