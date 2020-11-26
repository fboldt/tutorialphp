<?php
interface PersisteCredencial {
    function carregaUsuarios();
    function salvaUsuarios($usuarios);
}
class Credencial {
    private $usuarios;
    private $persistencia;
    function __construct(PersisteCredencial $persistencia) {
        $this->persistencia = $persistencia;
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