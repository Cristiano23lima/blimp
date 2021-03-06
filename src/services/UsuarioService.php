<?php 
    require $_SERVER['DOCUMENT_ROOT']."/bimp/src/models/Usuario.php";
    require "../config/Conexao.php";

    class UsuarioService{
        public function inserirUsuario(Usuario $usuario){
            $conexao = new Conexao();
            $inserir = $conexao->abrirConexao()->prepare("INSERT INTO tb_usuarios(email, nome, senha, telefone, endereco) VALUES(:email, :nome, :senha, :telefone, :endereco)");
            $inserir->bindValue(":nome", $usuario->getNome());
            $inserir->bindValue(":email", $usuario->getEmail());
            $inserir->bindValue(":telefone", $usuario->getTelefone());
            $inserir->bindValue(":endereco", $usuario->getEndereco());
            $inserir->bindValue(":senha", password_hash($usuario->getSenha(), PASSWORD_DEFAULT));
            if($inserir->execute() === true){
                return $usuario;//retorna o usuario cadastrado
            }else{
                return false;
            }
        }

        public function buscarTodosUsuarios(){//retorna um array de dados
            $conexao = new Conexao();
            $buscar = $conexao->abrirConexao()->prepare("SELECT * FROM tb_usuarios");
            if($buscar->execute() === true){
                return $buscar->fetchAll();
            }else{
                return false;
            }
        }

        public function buscarUsuarioId($id){
            $conexao = new Conexao();
            $buscar = $conexao->abrirConexao()->prepare("SELECT * FROM tb_usuarios WHERE id = :id");
            $buscar->bindValue(":id", $id);
            if($buscar->execute() === true){
                $dados = $buscar->fetch(PDO::FETCH_OBJ);
                $usuario = new Usuario();
                $usuario->setNome($dados->nome);
                $usuario->setEmail($dados->email);
                $usuario->setEndereco($dados->endereco);
                $usuario->setTelefone($dados->telefone);
                return $usuario;
            }else{
                return false;
            }
        }
    }
?>