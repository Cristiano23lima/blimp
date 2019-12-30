<?php
    require $_SERVER['DOCUMENT_ROOT']."/bimp/src/models/Usuario.php";

    class AutenticacaoService{
        public function login(String $email, String $senha){
            $login = new Usuario();
            $login->setEmail($email);
            $login->setSenha($senha);
            //autenticação
        }

        public function register(Usuario $usuario){
            
        }
        
    }

?>