<?php

class BD {

    public function conexao() {
        echo "2.1 - Erro";

        echo "2.2 - Erro";
        mb_http_output("iso-8859-1");
        echo "2.3 - Erro";
        $conexao = mysqli_connect("localhost", "root", "", "db_gop");
        echo "2.4 - Erro";
        if (!$conexao) {
            echo "2.5 - Erro";
            $men_erro = "Erro ao conectar" . mysqli_connect_error();
            echo "2.6 - Erro";
            die($men_erro);
            echo "2.7 - Erro";
        } else {
            echo "2.8 - Erro";
            return $conexao;
            echo "2.9 - Erro";
        }
    }

    // Ações do Usuário
    public function cadastrarUsuario($con, $nome, $email, $tipUsuario, $senha) {
        $senha = md5($senha);

        $consulta = "INSERT INTO `usuario`( `nome`, `email`, `tipo_Usuario`, `senha`, `pontuacao`, `tempo_total`, `id's_Badges`) VALUES ('$nome','$email','$tipUsuario','$senha',0,0,'')";
        $resultado = mysqli_query($con, $consulta);
    }

    public function verificarUsuario($con, $email, $senha) {
        $senha = md5($senha);
        $consulta = "SELECT nome, tipo_Usuario from usuario WHERE email = '$email' and senha = '$senha'";
        $resultado = mysqli_query($con, $consulta);

        return mysqli_num_rows($resultado);
    }

    public function selecionarUsuario($con, $email) {
        $consulta = "SELECT * from usuario WHERE email = '$email'";
        $resultado = mysqli_query($con, $consulta);
        $usuario = array();
        $listUsuario = array();

        $i = 0;

        while ($listUsuarios = mysqli_fetch_array($resultado)) {
            $usuario[$i]['id'] = $listUsuarios['id_User'];
            $usuario[$i]['nome'] = $listUsuarios['nome'];
            $usuario[$i]['email'] = $listUsuarios['email'];
            $usuario[$i]['pont'] = $listUsuarios['pontuacao'];
            $usuario[$i]['tempo'] = $listUsuarios['tempo_Total'];
            $usuario[$i]['tpUser'] = $listUsuarios['tipo_Usuario'];


            $i++;
        }
        return $usuario;
    }

    public function editarUsuario($con, $id, $nome, $email, $senha) {
        $senha = md5($senha);

        if ($email == " ") {
            $comando = "UPDATE `usuario` SET nome='$nome', senha='$senha' WHERE id_User = $id";
        } else if ($senha == " ") {
            $comando = "UPDATE `usuario` SET nome='$nome', email='$email' WHERE id_User = $id";
        } else {
            $comando = "UPDATE `usuario` SET nome='$nome', email='$email', senha='$senha' WHERE id_User = $id";
        }

        $resultado = mysqli_query($con, $comando);
    }

    public function selecionarIdBadges($con, $email) {
        $consulta = "SELECT id'sBadges from usuario WHERE email = '$email'";
        $resultado = mysqli_query($con, $consulta);

        $usuario = array();
        $listUsuario = array();

        $i = 0;

        while ($listUsuarios = mysqli_fetch_array($resultado)) {
            $usuario[$i]['idBadges'] = $listUsuarios["id'sBadges"];
            $i++;
        }

        var_dump($usuario);

        return $usuario;
    }

    //Atualizar pontuação do Usuário
    public function atualizarPontuacao($con, $idUsuario, $pontuacao, $idQuiz, $tempo) {
        $consulta = "SELECT * from usuario WHERE id_User = '$idUsuario'";
        $resultado = mysqli_query($con, $consulta);
        $usuario = array();
        $listUsuario = array();

        $i = 0;

        while ($listUsuarios = mysqli_fetch_array($resultado)) {
            $usuario[$i]['pontuacao'] = $listUsuarios['pontuacao'];
            $usuario[$i]['tempo'] = $listUsuarios['tempo_Total'];
            $i++;
        }

        $comando = "SELECT * FROM historico_qr WHERE id_Quiz = '$idQuiz' AND id_User = '$idUsuario'";
        $resultado = mysqli_query($con, $comando);

        $qtdQuizzes = mysqli_num_rows($resultado);

        if ($qtdQuizzes < 1) {
            $comando = "INSERT INTO `historico_qr`(`id_User`, `id_Quiz`, `tempo`, `pontuacao`) VALUES ('$idUsuario','$idQuiz','$tempo','$pontuacao')";
            $resultado = mysqli_query($con, $comando);

            $pontuacao += (float) $usuario[0]['pontuacao'];
            $tempo += (float) $usuario[0]['tempo'];

            $comando = "UPDATE `usuario` SET pontuacao='$pontuacao', tempo_Total='$tempo' WHERE id_User = $idUsuario";
            $resultado = mysqli_query($con, $comando);
        } else {
            
        }
    }

    public function selecionarHQR($con, $idQuiz) {
        $comando = "SELECT * FROM historico_qr WHERE id_Quiz = '$idQuiz'";
        $resultado = mysqli_query($con, $comando);
        $tblQuiz = array();
        $i = 0;

        while ($quizzes = mysqli_fetch_array($resultado)) {
            $tblQuiz[$i]['pontuacao'] = $quizzes['pontuacao'];
            $tblQuiz[$i]['tempo'] = $quizzes['tempo'];

            $i += 1;
        }

        return $tblQuiz;
    }

    //Funções do histórico QR
    public function selecionarHQRUsuarioQuiz($con, $idQuiz, $idUsuario) {
        $comando = "SELECT * FROM historico_qr WHERE id_Quiz = '$idQuiz' AND id_User = '$idUsuario'";
        $resultado = mysqli_query($con, $comando);
        $tblQuiz = array();
        $i = 0;

        while ($quizzes = mysqli_fetch_array($resultado)) {
            $tblQuiz[$i]['pontuacao'] = $quizzes['pontuacao'];
            $tblQuiz[$i]['tempo'] = $quizzes['tempo'];

            $i += 1;
        }

        return $tblQuiz;
    }

    public function selecionarHQRUsuario($con, $idUsuario) {
        $comando = "SELECT * FROM historico_qr WHERE id_User = '$idUsuario'";
        $resultado = mysqli_query($con, $comando);
        $tblQuiz = array();
        $i = 0;

        while ($quizzes = mysqli_fetch_array($resultado)) {
            $tblQuiz[$i]['pontuacao'] = $quizzes['pontuacao'];
            $tblQuiz[$i]['tempo'] = $quizzes['tempo'];
            $tblQuiz[$i]['idQuiz'] = $quizzes['id_Quiz'];
            $i += 1;
        }

        return $tblQuiz;
    }

    // Funções do Quiz

    public function selecionarQuizzes($con) {
        $comando = "SELECT * FROM quiz";
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

    public function selecionarQuiz($con, $idQuiz) {
        $comando = "SELECT * FROM quiz WHERE id_Quiz = '$idQuiz'";
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

    public function selecionarQuestoes($con, $idQuiz) {
        $comando = "SELECT * FROM perguntas WHERE id_Quiz = '$idQuiz'";
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

    public function verificarResposta($con, $resposta, $idPergunta) {
        $comando = "SELECT * FROM perguntas WHERE id_Pergunta = '$idPergunta' and alt_Correta = '$resposta'";
        $resultado = mysqli_query($con, $comando);
        return mysqli_num_rows($resultado);
    }

    public function montarRanking($con) {
        $comando = "SELECT nome, pontuacao FROM `usuario` ORDER BY pontuacao DESC";
        $resultado = mysqli_query($con, $comando);
        $usuarios = array();
        $listUsuarios = array();

        $i = 0;

        while ($listUsuarios = mysqli_fetch_array($resultado)) {
            $usuarios[$i]['nome'] = $listUsuarios['nome'];
            $usuarios[$i]['pont'] = $listUsuarios['pontuacao'];

            $i++;
        }

        return $usuarios;
    }
    
    
    public function verificarPosicao($con, $email){
        $ranking = $this->montarRanking($con);
        $usuario = $this->selecionarUsuario($con, $email);
        
        $posicao = 0;
        for($i = 0; $i < count($ranking);$i++){
            if($usuario[0]['nome'] == $ranking[$i]['nome']){
                $posicao = $i + 1;
                break;
            }
        }
        
        return $posicao;
    }

}

?> 
