<?php
require_once "usuario/credencial.php";
require_once "persistencia/postgres/conexao.php";

class PersistenciaUsuario implements PersisteCredencial {
    private $persistencia;
    function __construct() {
        $this->persistencia = getConexao();
    }
    function criaTabelaUsuarios() {
        $query = "CREATE TABLE IF NOT EXISTS usuarios (
            login VARCHAR(16) NOT NULL UNIQUE,
            senha VARCHAR(128) NOT NULL,
            id serial PRIMARY KEY
        )";
        return pg_query($this->persistencia, $query);
    }
    function insereUsuario($login, $senha) {
        $query = "INSERT INTO usuarios (login, senha) VALUES ('$login','$senha')";
        return pg_query($this->persistencia, $query);
    }
    function getSenha($login) {
        $query = "SELECT senha FROM usuarios WHERE login='$login'";
        $result = pg_query($this->persistencia, $query);
        $senha = NULL;
        if ($result && pg_num_rows($result) > 0) {
            $senha = pg_fetch_array($result, NULL, MYSQLI_ASSOC)['senha'];
        }
        return $senha;
    }
}
?>