<?php

class BD {

    public function conexao() {
        $conexao = mysqli_connect("us-cdbr-iron-east-05.cleardb.net","b067d1527549e8","b7cf4a61","heroku_74583cad15e5fd0");
        if (!$conexao) {
            $men_erro = "Erro ao conectar" . mysqli_connect_error();
            die($men_erro);
        } else {
            return $conexao;
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

    public function selecionarUsuarioID($con, $idUser) {
        $consulta = "SELECT * from usuario WHERE id_User = '$idUser'";
        $resultado = mysqli_query($con, $consulta);
        $usuario = array();
        $listUsuario = array();

        $i = 0;

        while ($listUsuarios = mysqli_fetch_array($resultado)) {
            $usuario[$i]['id'] = $listUsuarios['id_User'];
            $usuario[$i]['nome'] = $listUsuarios['nome'];
            $i++;
        }

        return $usuario;
    }

    public function verificarEmail($con, $email) {
        $consulta = "SELECT * from usuario WHERE email = '$email'";
        $resultado = mysqli_query($con, $consulta);

        return mysqli_num_rows($resultado);
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

        //Insere o novo registro na tabela do histórico
        $comando = "INSERT INTO `historico_qr`(`id_User`, `id_Quiz`, `tempo`, `pontuacao`) VALUES ('$idUsuario','$idQuiz','$tempo','$pontuacao')";
        $resultado = mysqli_query($con, $comando);

        //Verifica se a pontuação obtida é maior do que já possui
        if ($pontuacao > $usuario[0]['pontuacao']) {
            //Alteração da pontuação total
            $usuario[0]['pontuacao'] = (float) $usuario[0]['pontuacao'];
            $pont = $pontuacao - $usuario[0]['pontuacao'];
            $usuario[0]['pontuacao'] += $pont;
            $pont = $usuario[0]['pontuacao'];

            //Alteração do tempo total
            $usuario[0]['tempo'] = (float) $usuario[0]['tempo'];
            $temp = $pontuacao - $usuario[0]['tempo'];
            $usuario[0]['tempo'] += $temp;
            $temp = $usuario[0]['tempo'];

            $comando = "UPDATE `usuario` SET pontuacao='$pont', tempo_Total='$temp' WHERE id_User = $idUsuario";
            $resultado = mysqli_query($con, $comando);
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
        $comando = "SELECT * FROM quiz WHERE id_User = 0";
        $resultado = mysqli_query($con, $comando);
        $tblQuiz = array();
        $i = 0;

        while ($quizzes = mysqli_fetch_array($resultado)) {
            $tblQuiz[$i]['id'] = $quizzes['id_Quiz'];
            $tblQuiz[$i]['id_User'] = $quizzes['id_Quiz'];
            $tblQuiz[$i]['nome'] = $quizzes['nome'];
            $tblQuiz[$i]['descricao'] = $quizzes['descricao'];

            $i += 1;
        }

        return $tblQuiz;
    }

    public function selecionarQuizzesProfessores($con) {
        $comando = "SELECT * FROM quiz WHERE id_User != 0";
        $resultado = mysqli_query($con, $comando);
        $tblQuiz = array();
        $i = 0;

        while ($quizzes = mysqli_fetch_array($resultado)) {
            $tblQuiz[$i]['id_Quiz'] = $quizzes['id_Quiz'];
            $tblQuiz[$i]['id_User'] = $quizzes['id_User'];
            $tblQuiz[$i]['nome'] = $quizzes['nome'];
            $tblQuiz[$i]['descricao'] = $quizzes['descricao'];

            $i += 1;
        }

        return $tblQuiz;
    }

    public function selecionarQuizzesProfessor($con, $idUsuario) {
        $comando = "SELECT * FROM quiz WHERE id_User = '$idUsuario'";
        $resultado = mysqli_query($con, $comando);
        $tblQuiz = array();
        $i = 0;

        while ($quizzes = mysqli_fetch_array($resultado)) {
            $tblQuiz[$i]['id_Quiz'] = $quizzes['id_Quiz'];
            $tblQuiz[$i]['id_User'] = $quizzes['id_User'];
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
            $tblQuiz[$i]['id_Quiz'] = $quizzes['id_Quiz'];
            $tblQuiz[$i]['id_User'] = $quizzes['id_User'];
            $tblQuiz[$i]['nome'] = $quizzes['nome'];
            $tblQuiz[$i]['descricao'] = $quizzes['descricao'];

            $i += 1;
        }

        return $tblQuiz;
    }

    

    public function verificarResposta($con, $resposta, $idPergunta) {
        $comando = "SELECT * FROM perguntas WHERE id_Pergunta = '$idPergunta' and alt_Correta = '$resposta'";
        $resultado = mysqli_query($con, $comando);
        return mysqli_num_rows($resultado);
    }

    

    public function cadastrarQuiz($con, $nomeQuiz, $idUsuario, $descricao) {
        $comando = "INSERT INTO `quiz`(`id_User`, `nome`, `descricao`) VALUES ('$idUsuario','$nomeQuiz','$descricao')";
        mysqli_query($con, $comando);
    }

    

    public function selecionarUltimoQuiz($con) {
        $comando = "SELECT * FROM quiz WHERE id_Quiz = (SELECT max(id_Quiz) FROM quiz)";
        $resultado = mysqli_query($con, $comando);
        $tblQuiz = array();
        $i = 0;

        while ($quiz = mysqli_fetch_array($resultado)) {
            $tblQuiz[$i]['id_Quiz'] = $quiz['id_Quiz'];

            $i += 1;
        }

        return $tblQuiz;
    }

    public function editarQuiz($con, $idQuiz, $nomeQuiz, $idUsuario, $descricao) {
        $comando = "UPDATE `quiz` SET id_User='$idUsuario', nome ='$nomeQuiz', descricao ='$descricao' WHERE id_Quiz='$idQuiz'";
        mysqli_query($con, $comando);
    }

    public function excluirQuiz($con, $idQuiz){
        $comando = "DELETE FROM `quiz` WHERE id_Quiz = '$idQuiz'";
        $resultado = mysqli_query($con, $comando);
    }


    // Ranking
    public function montarRanking($con) {
        $comando = "SELECT nome, pontuacao, email FROM `usuario` ORDER BY pontuacao DESC";
        $resultado = mysqli_query($con, $comando);
        $usuarios = array();
        $listUsuarios = array();

        $i = 0;

        while ($listUsuarios = mysqli_fetch_array($resultado)) {
            $usuarios[$i]['nome'] = $listUsuarios['nome'];
            $usuarios[$i]['email'] = $listUsuarios['email'];
            $usuarios[$i]['pont'] = $listUsuarios['pontuacao'];

            $i++;
        }

        return $usuarios;
    }

    public function verificarPosicao($con, $email) {
        $ranking = $this->montarRanking($con);
        $usuario = $this->selecionarUsuario($con, $email);

        $posicao = 0;
        for ($i = 0; $i < count($ranking); $i++) {
            if ($usuario[0]['nome'] == $ranking[$i]['nome']) {
                $posicao = $i + 1;
                break;
            }
        }

        return $posicao;
    }


    //Questão    
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
            $tblQuestoes[$i]['crt'] = $questoes['alt_Correta'];

            $i += 1;
        }
        return $tblQuestoes;
    }


    public function cadastrarQuestao($con, $idQuiz, $enunciado, $alt_a, $alt_b, $alt_c, $alt_d, $alt_e, $alt_correta) {
        $comando = "INSERT INTO `perguntas`(`id_Quiz`, `enunciado`, `alt_A`, `alt_B`, `alt_C`, `alt_D`, `alt_E`, `alt_Correta`) VALUES ('$idQuiz','$enunciado','$alt_a','$alt_b','$alt_c','$alt_d','$alt_e','$alt_correta')";
        mysqli_query($con, $comando);
    }

    public function editarQuestao($con, $idPergunta, $idQuiz, $enunciado, $alt_a, $alt_b, $alt_c, $alt_d, $alt_e, $alt_correta) {
        $comando = "UPDATE `perguntas` SET id_Quiz ='$idQuiz', enunciado = '$enunciado', alt_A ='$alt_a', alt_B ='$alt_b', alt_C ='$alt_c', alt_D ='$alt_d', alt_E ='$alt_e', alt_Correta ='$alt_correta' WHERE id_Pergunta = '$idPergunta'";
        $resultado = mysqli_query($con, $comando);
    }

    public function excluirQuestao($con, $idPergunta){
        $comando = "DELETE FROM `perguntas` WHERE id_Pergunta = '$idPergunta'";
        $resultado = mysqli_query($con, $comando);
    }


    //Fórum
    public function inserirComentario($con, $idQuiz, $idUsuario, $comentatrio){
        $comando = "INSERT INTO `forum`(`id_User`, `id_Quiz`, `comentario`) VALUES ('$idUsuario', '$idQuiz', '$comentatrio')";
        mysqli_query($con, $comando);
    }

    public function selecionarComentarios($con, $idQuiz) {
        $comando = "SELECT * FROM forum WHERE id_Quiz = '$idQuiz'";
        $resultado = mysqli_query($con, $comando);
        $tblComentarios = array();
        $i = 0;


        while ($comentatrios = mysqli_fetch_array($resultado)) {
            $tblComentarios[$i]['idUser'] = $comentatrios['id_User'];
            $tblComentarios[$i]['comentario'] = $comentatrios['comentario'];
            $i += 1;
        }

        return $tblComentarios;
    }


    
}
?> 
