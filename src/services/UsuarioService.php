<?php
    require $_SERVER['DOCUMENT_ROOT']."/bimp/src/models/Usuario.php";

    class UsuarioService{
        public function Login(){
            $login = new Usuario();
        }
        
    }

?>