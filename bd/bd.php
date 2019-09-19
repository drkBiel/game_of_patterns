<?php
    class BD{
        public function conexao(){
            $conexao = mysqli_connect("localhost","root","","db_gop");
            if (!$conexao) {
                $men_erro = "Erro ao conectar" . mysqli_connect_error();
                die($men_erro);
            } else {
                return $conexao;
            }
            
        }

        public function cadastrarUsuario($con, $nome, $email, $tipUsuario, $senha){
            $senha = md5($senha);
            $contEmail = verificarEmail($email);
            
            $consulta  = "INSERT INTO `usuario`( `nome`, `email`, `tipoUsuario`, `senha`, `pontuacao`, `tempo_total`) VALUES ('$nome','$email','$tipUsuario','$senha',0,0)";

            if ($contEmail > 1){
                echo "<script type='javascript'>alert('Email ja cadastrado!');";
            }else{
                $resultado =  mysqli_query($con,$consulta);
            }
 
        }

        public function selecionarUsuario($con, $email, $senha){
            $senha = md5($senha);
            $consulta = "SELECT nome, tipoUsuario from usuario WHERE email = '$email' and senha = '$senha'";
            $resultado = mysqli_query($con, $consulta);
            
            return mysqli_fetch_array($resultado);
            
        }

        private function verificarEmail($con, $email){
            $senha = md5($senha);
            $consulta = "SELECT tipoUsuario from usuario WHERE email = '$email'";
            $resultado = mysqli_query($con, $consulta);
            
            return mysqli_num_rows($resultado);
            
        }
        
        
    }

?>