<?php
require_once "mensagem/modelo.php";
require_once "usuario/controle.php";
require_once "mensagem/mysql.php";

class ControleMensagem {
    private $mysql;
    function __construct() {
        $this->mysql = new MysqlMensagem();
    }
    function getMensagens() {
        return array_reverse($this->mysql->carregaMensagens());
    }
    function insereMensagem($texto) {
        $controleUsuario = new ControleUsuario();
        $quem = $controleUsuario->getLogin();
        $quando = date("Y-m-d H:i:s");
        $mensagem = criaMensagem($texto, $quem, $quando);
        $this->mysql->salvaMensagem($mensagem);
    }
}
?>