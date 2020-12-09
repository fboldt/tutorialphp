<?php
require_once "mensagem/modelo.php";
require_once "usuario/sessao.php";

class ControleMensagem {
    private $persistencia;
    function __construct(PersisteMensagem $persistencia) {
        $this->persistencia = $persistencia;
    }
    function getMensagens() {
        return array_reverse($this->persistencia->carregaMensagens());
    }
    function insereMensagem($texto) {
        $sessao = Sessao();
        $quem = $sessao->getLogin();
        $quando = date("Y-m-d H:i:s");
        $mensagem = criaMensagem($texto, $quem, $quando);
        $this->persistencia->salvaMensagem($mensagem);
    }
}
?>