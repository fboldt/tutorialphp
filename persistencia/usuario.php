<?php
require_once "usuario/credencial.php";
require_once "persistencia/conexao.php";

class PersistenciaUsuario implements PersisteCredencial {
    private $persistencia;
    function __construct() {
        $this->persistencia = getConexao();
    }
    function criaTabelaUsuarios() {
        $query = "CREATE TABLE IF NOT EXISTS usuarios (
            login VARCHAR(16) NOT NULL UNIQUE,
            senha VARCHAR(128) NOT NULL,
            id INT NOT NULL AUTO_INCREMENT,
            PRIMARY KEY (id)
        )";
        $result = $this->persistencia->query($query);
    }
    function insereUsuario($login, $senha) {
        $query = "INSERT INTO usuarios (login, senha) VALUES ('$login','$senha')";
        $result = $this->persistencia->query($query);
    }
    function carregaUsuarios() {
        $query = "SELECT * FROM usuarios";
        $result = $this->persistencia->query($query);
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