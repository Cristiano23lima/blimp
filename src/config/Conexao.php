<?php 
    include "../environment/env.php";

    class Conexao{
        private $conexao;

        function __construct(){
            $this->abrirConexao();
        }
        function __clone(){}

        function __destruct(){
           $this->fechaConexao();
           foreach($this as $key => $value){//destroi todas as variaveis salvas na memoria
            unset($this->key);//destroi a variavel
           }
        }

        public function abrirConexao(){
            try{
                $this->conexao = new pdo("mysql:host=".$ENV_DEV['hostname'].";dbname=".$ENV_DEV['dbname'], $ENV_DEV['username'], $ENV_DEV['password']);
            }catch(Exception $e){
                echo "Erro no banco de dados";
            }

            return $this->conexao;
        }

        public function fechaConexao(){
            $this->conexao = null;
        }
    }

?>