<?php 
    require $_SERVER['DOCUMENT_ROOT']."/bimp/src/models/Usuario.php";
    require "../config/Conexao.php";

    class UsuarioService{
        function inserirUsuario(Usuario $usuario){
            $conexao = new Conexao();
            $inserir = $conexao->prepare("INSERT INTO tb_usuario(email, nome, senha, telefone, endereco) VALUES(:email, :nome, :senha, :telefone, :endereco)");
            $inserir->bindValue(":nome", $usuario->getNome());
            $inserir->bindValue(":email", $usuario->getEmail());
            $inserir->bindValue(":telefone", $usuario->getTelefone());
            $inserir->bindValue(":endereco", $usuario->getEndereco());
            $inserir->bindValue(":senha", password_hash($usuario->getSenha(), PASSWORD_DEFAULT));
            if($inserir->execute() === true){
                return true;
            }else{
                return false;
            }
        }

        function buscarTodosUsuarios(){
            $conexao = new Conexao();
            $buscar = $conexao->prepare("SELECT * FROM tb_usuario");
            if($buscar->execute() === true){
                $usuario = array(new Usuario());
                $usuario = $buscar->fetchAll();
                return $usuario;
            }else{
                return false;
            }
        }

        function buscarUsuarioId($id){
            $conexao = new Conexao();
            $buscar = $conexao->prepare("SELECT * FROM tb_usuario WHERE id = :id");
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