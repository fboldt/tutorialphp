<?php
require_once "usuario/credencial.php";
require_once "usuario/sessao.php";
require_once "usuario/mysql.php";

class ControleUsuario {
    private $persistencia;
    private $sessao;
    function __construct() {
        $this->persistencia = new Mysql();
        $this->sessao = new Sessao($this->persistencia);
    }
    function getLogin() {
        $login = $this->sessao->getLogin();
        return $login;
    }
    function login($login, $senha) {
        $this->sessao->login($login, $senha);
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