<?php
class Credencial {
    private $usuarios;
    function __construct() {
        $this->usuarios = array();
        $this->usuarios['alice'] = '123';
        $this->usuarios['bruce'] = '234';
        $this->usuarios['carol'] = '345';
    }
    function confereLoginSenha($login, $senha) {
        $usuarioExiste = array_key_exists($login, $this->usuarios);
        if ($usuarioExiste) {
            $senhaConfere = $this->usuarios[$login] == $senha;
        }
        return $usuarioExiste && $senhaConfere;
    }
}
?>