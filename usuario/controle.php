<?php
require_once "usuario/sessao.php";
require_once "usuario/credencial.php";

class ControleUsuario {
    private $persistencia;
    private $sessao;
    private $credencial;
    function __construct(PersisteCredencial $persistencia) {
        $this->persistencia = $persistencia;
        $this->sessao = new Sessao();
        $this->credencial = new Credencial($this->persistencia);
    }
    function getLogin() {
        $login = $this->sessao->getLogin();
        return $login;
    }
    function login($login, $senha) {
        if ($this->credencial->confereLoginSenha($login, $senha)) {
            $this->sessao->login($login);
        }
    }
    function logout() {
        $this->sessao->logout();
    }
    function insereLoginSenha($login, $senha) {
        $credencial = new Credencial($this->persistencia);
        $credencial->insereLoginSenha($login, $senha);
    }
}
?>