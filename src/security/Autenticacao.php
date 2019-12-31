<?php 
    require "../config/Conexao.php";
    require $_SERVER['DOCUMENT_ROOT']."/bimp/src/security/WebSecurity.php";

    class Autenticacao{
        function login($usuario, $senha){
            $conexao = new Conexao();
            $auth = $conexao->abrirConexao()->prepare("SELECT * FROM tb_usuarios WHERE email = :email");
            $auth->bindValue(":email", $usuario);
            if($auth->execute() === true){
                $usuarioSalvo = $auth->fetch(PDO::FETCH_OBJ);
                if(password_verify($senha, $usuarioSalvo->senha)){
                    //codigo do login
                    $jwt = new Jwt();
                    return $jwt->createToken($usuarioSalvo->nome, $usuarioSalvo->email);
                }else{
                    return 0;//dados invalidos
                }
            }else{
                return -1;//problema no servidor
            }
        }
    }

?>