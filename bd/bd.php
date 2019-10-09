<?php
    class BD{
        public function conexao(){
            mb_internal_encoding("UTF-8"); 
            mb_http_output( "iso-8859-1" );  
            $conexao = mysqli_connect("localhost","root","","db_gop");
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
            
            $consulta  = "INSERT INTO `usuario`( `nome`, `email`, `tipo_Usuario`, `senha`, `pontuacao`, `tempo_total`, `id's_Badges`) VALUES ('$nome','$email','$tipUsuario','$senha',0,0,'')";
            $resultado =  mysqli_query($con,$consulta);
           
        }

        public function verificarUsuario($con, $email, $senha){
            $senha = md5($senha);
            $consulta = "SELECT nome, tipo_Usuario from usuario WHERE email = '$email' and senha = '$senha'";
            $resultado = mysqli_query($con, $consulta);
            echo $consulta;
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

        public function selecionarIdBadges($con, $email){
            $consulta = "SELECT id'sBadges from usuario WHERE email = '$email'";
            $resultado = mysqli_query($con, $consulta);
            
            $usuario = array();
            $listUsuario = array();

            $i = 0;

            while ($listUsuarios = mysqli_fetch_array($resultado)){ 
                $usuario[$i]['idBadges'] = $listUsuarios["id'sBadges"];
                $i++;        
            }

            var_dump($usuario);

            return $usuario;
        }


        // Funções do Quiz

        public function selecionarQuizzes($con){
            $comando =  "SELECT * FROM quiz";
            $resultado = mysqli_query($con, $comando);
            $tblQuiz = array();
            $i = 0;
            
            while ($quizzes = mysqli_fetch_array($resultado)) {
                $tblQuiz[$i]['id'] = $quizzes['id_Quiz'];
                $tblQuiz[$i]['nome'] = $quizzes['nome'];
                $tblQuiz[$i]['descricao'] = $quizzes['descricao'];

                $i += 1;
            }

            return $tblQuiz;

        }


        public function selecionarQuestoes($con, $idQuiz){
            $comando =  "SELECT * FROM perguntas WHERE id_Quiz = '$idQuiz'";
            $resultado = mysqli_query($con, $comando);
            $tblQuestoes = array();
            $i = 0;

           
            while ($questoes = mysqli_fetch_array($resultado)) {
                $tblQuestoes[$i]['idPerg'] = $questoes['id_Pergunta'];
                $tblQuestoes[$i]['enunciado'] = $questoes['enunciado'];
                $tblQuestoes[$i]['a'] = $questoes['alt_A'];
                $tblQuestoes[$i]['b'] = $questoes['alt_B'];
                $tblQuestoes[$i]['c'] = $questoes['alt_C'];
                $tblQuestoes[$i]['d'] = $questoes['alt_D'];
                $tblQuestoes[$i]['e'] = $questoes['alt_E'];

                $i += 1;
            }

            return $tblQuestoes;
        }

        public function verificarResposta($con, $resposta, $idPergunta){
            $comando =  "SELECT * FROM perguntas WHERE id_Pergunta = '$idPergunta' and alt_Correta = '$resposta'";
            $resultado = mysqli_query($con, $comando);
            echo $comando;
            return mysqli_num_rows($resultado);
        }

    }
?> 