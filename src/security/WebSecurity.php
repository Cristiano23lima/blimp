<?php
    class Jwt{
        function createToken(String $nome, String $email){
            $header = [
                'alg' => 'HS256',
                'typ' => 'JWT'
            ];
        
            $header = json_encode($header);
            $header = base64_encode($header);
        
            $payload = [
                'iss' => 'localhost',
                'name' => $nome,
                'email' => $email
            ];
        
            $payload = json_encode($payload);
            $payload = base64_encode($payload);
        
            $signature = hash_hmac('sha256', "$header.$payload", 'blimp_design', true);
            $signature = base64_encode($signature);

            $token = "$header.$payload.$signature";

            return $token;
        }

        function validatyToken(String $token){//vai verificar se o token no cabeçalho do sistema é valido
            if($token == null){
                return false;
            }
            
            $part = explode(".", $token);
            
            $header = $part[0];
            $payload = $part[1];
            $signature = $part[2];

            $valid = hash_hmac('sha256',"$header.$payload",'blimp_design',true);
            $valid = base64_encode($valid);

            if($signature == $valid){
                return true;
            } else{
                return false;
            }
        }
    }
?>