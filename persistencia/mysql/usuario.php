<?php
require_once "usuario/credencial.php";
require_once "persistencia/mysql/conexao.php";

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
    function getSenha($login) {
        $query = "SELECT senha FROM usuarios WHERE login='$login'";
        $result = $this->persistencia->query($query);
        $senha = NULL;
        if ($result && $result->num_rows > 0) {
            $senha = $result->fetch_array(MYSQLI_ASSOC)['senha'];
        }
        return $senha;
    }
}
?>