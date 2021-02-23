<?php
// function getConexao() {
//     $hostname = 'localhost';
//     $database = 'tutorialphp';
//     $username = 'francisco';
//     $password = 'francisco';
//     $connstring = "host=$hostname dbname=$database user=$username password=$password";
//     return pg_connect($connstring);
// }
function getConexao() {
    return pg_connect(getenv("DATABASE_URL"));
}
?>