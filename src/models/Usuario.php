<?php 
    class Usuario{
        private $id;
        private $nome;
        private $email;
        private $senha;
        private $telefone;
        private $endereco;

        function __construct(){}
        function __clone(){}

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getNome(){
            return $this->nome;
        } 

        public function getEmail(){
            return $this->email;
        }

        public function getSenha(){
            return $this->senha;
        }

        public function getTelefone(){
            return $this->telefone;
        }

        public function getEndereco(){
            return $this->endereco;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function setSenha($senha){
            $this->senha = $senha;
        }

        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }

        public function setEndereco($endereco){
            $this->endereco = $endereco;
        }

        public function labels(){
            return array(
                'nome' => $this->nome,
                'email' => $this->email,
                'telefone' => $this->telefone
            );
        }

    }

?>