<?php
require_once "usuario/credencial.php";

class Mysql implements PersisteCredencial {
    private $mysqlconnection;
    function __construct() {
        $hostname = 'localhost';
        $database = 'tutorialphp';
        $username = 'francisco';
        $password = 'francisco';
        $this->mysqlconnection = new mysqli($hostname, $username, $password, $database);
    }
    function criaTabelaUsuarios() {
        $query = "CREATE TABLE IF NOT EXISTS usuarios (
            login VARCHAR(16) NOT NULL UNIQUE,
            senha VARCHAR(128) NOT NULL,
            id INT NOT NULL AUTO_INCREMENT,
            PRIMARY KEY (id)
        )";
        $result = $this->mysqlconnection->query($query);
    }
    function insereUsuario($login, $senha) {
        $query = "INSERT INTO usuarios (login, senha) VALUES ('$login','$senha')";
        $result = $this->mysqlconnection->query($query);
    }
    function carregaUsuarios() {
        $query = "SELECT * FROM usuarios";
        $result = $this->mysqlconnection->query($query);
        $usuarios = array();
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $usuarios[$row['login']] = $row['senha'];
        }
        return $usuarios;
    }
    function salvaUsuarios($usuarios) {
        foreach($usuarios as $login => $senha) {
            $this->insereUsuario($login, $senha);
        }
    }
}
?>