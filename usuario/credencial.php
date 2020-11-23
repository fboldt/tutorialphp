<?php
require_once "usuario/persistencia.php";
class Credencial {
    private $usuarios;
    private $persistencia;
    function __construct() {
        $this->persistencia = new Persistencia();
        $this->usuarios = $this->persistencia->carregaUsuarios();
    }
    function __destruct() {
        $this->persistencia->salvaUsuarios($this->usuarios);
    }
    function confereLoginSenha($login, $senha) {
        $usuarioExiste = array_key_exists($login, $this->usuarios);
        if ($usuarioExiste) {
            $senhaConfere = $this->usuarios[$login] == $senha;
        }
        return $usuarioExiste && $senhaConfere;
    }
    function insereLoginSenha($login, $senha) {
        $this->usuarios[$login] = $senha;
    }
}
?>