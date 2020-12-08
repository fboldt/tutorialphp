<?php
require_once "mensagem/modelo.php";

class MysqlMensagem implements PersisteMensagem {
    private $mysqlconnection;
    function __construct() {
        $hostname = 'localhost';
        $database = 'tutorialphp';
        $username = 'francisco';
        $password = 'francisco';
        $this->mysqlconnection = new mysqli($hostname, $username, $password, $database);
    }
    function criaTabelaMensagens() {
        $query = "CREATE TABLE IF NOT EXISTS mensagens (
            texto VARCHAR(128) NOT NULL,
            tempo TIMESTAMP NOT NULL,
            id INT NOT NULL AUTO_INCREMENT,
            PRIMARY KEY (id),
            usuid INT NOT NULL,
            FOREIGN KEY (usuid) REFERENCES usuarios(id)
        )";
        $result = $this->mysqlconnection->query($query);
        return $result;
    }
    private function getUsuarioId($login) {
        $query = "SELECT id FROM usuarios WHERE login='$login' LIMIT 1";
        $result = $this->mysqlconnection->query($query);
        $usuid = NULL;
        if ($result && $result->num_rows > 0) {
            $usuid = $result->fetch_array(MYSQLI_ASSOC)['id'];
        }
        return $usuid;
    }
    function salvaMensagem($mensagem) {
        $usuid = $this->getUsuarioId($mensagem['quem']);
        $result = NULL;
        if ($usuid) {
            $texto = $mensagem['texto'];
            $tempo = $mensagem['quando'];
            $query = "INSERT INTO mensagens (texto, tempo, usuid) VALUES ('$texto', '$tempo', '$usuid')";
            $result = $this->mysqlconnection->query($query);
        }
        return $result;
    }
    private function getLoginUsuario($usuid) {
        $query = "SELECT login FROM usuarios WHERE id='$usuid' LIMIT 1";
        $result = $this->mysqlconnection->query($query);
        $login = NULL;
        if ($result && $result->num_rows > 0) {
            $login = $result->fetch_array(MYSQLI_ASSOC)['login'];
        }
        return $login;        
    }
    function carregaMensagens() {
        $query = "SELECT * FROM mensagens";
        $result = $this->mysqlconnection->query($query);
        $mensagens = array();
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $login = $this->getLoginUsuario($row['usuid']);
            $mensagem = criaMensagem($row['texto'], $login, $row['tempo']);
            array_push($mensagens, $mensagem);
        }
        return $mensagens;
    }
}
?>