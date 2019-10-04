<?php
    class BD{
        public function conexao(){
            $conexao = mysqli_connect("us-cdbr-iron-east-05.cleardb.net","b067d1527549e8","b7cf4a61","heroku_74583cad15e5fd0");
            if (!$conexao) {
                $men_erro = "Erro ao conectar" . mysqli_connect_error();
                die($men_erro);
            } else {
                return $conexao;
            }
        }

        // Ações do Usuário
        public function cadastrarUsuario($con, $nome, $email, $tipUsuario, $senha){
            $senha = md5($senha);
            
            $consulta  = "INSERT INTO `usuario`( `nome`, `email`, `tipoUsuario`, `senha`, `pontuacao`, `tempo_total`) VALUES ('$nome','$email','$tipUsuario','$senha',0,0)";
            $resultado =  mysqli_query($con,$consulta);
           
        }

        public function verificarUsuario($con, $email, $senha){
            $senha = md5($senha);
            $consulta = "SELECT nome, tipoUsuario from usuario WHERE email = '$email' and senha = '$senha'";
            $resultado = mysqli_query($con, $consulta);
            
            return mysqli_num_rows($resultado);
            
        }

        public function selecionarUsuario($con, $email){
            $consulta = "SELECT * from usuario WHERE email = '$email'";
            $resultado = mysqli_query($con, $consulta);
            
            $usuario = array();
            $listUsuario = array();

            $i = 0;

            while ($listUsuarios = mysqli_fetch_array($resultado)){ 
                $usuario[$i]['id'] = $listUsuarios['id_User'];
                $usuario[$i]['nome'] = $listUsuarios['nome'];
                $usuario[$i]['email'] = $listUsuarios['email'];
    
                $i++;        
            }

            return $usuario;
        }


        public function editarUsuario($con, $id, $nome, $email, $senha){
            $senha = md5($senha);

            if ($email == " "){
                $comando = "UPDATE `usuario` SET nome='$nome', senha='$senha' WHERE id_User = $id";
            }else if($senha == " "){
                $comando = "UPDATE `usuario` SET nome='$nome', email='$email' WHERE id_User = $id";
            }else{
                $comando = "UPDATE `usuario` SET nome='$nome', email='$email', senha='$senha' WHERE id_User = $id";
            }

            $resultado = mysqli_query($con, $comando);
                         
        }
        
    }

?>
