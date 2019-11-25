<?php
    require "../bd/bd.php";
    $bd = new BD();
    $conexao = $bd->conexao();
    $acao = $_POST['acao'] ? $_POST['acao'] : ' ';

    if ($acao == "calcular"){
        
        $qtdQuestoes = (int)$_POST['qtdQuestoes'];
        $idPergs = array();
        $respQuestoes = array();
        
        $i = 0;
        $qt = 1;
        $qtsCorretas = 0;

        $tmp =  explode(":",$_POST['tempo']);
        $hr =  (float) $tmp[0]*60;
        $min = (float) $tmp[1];
        $seg = (float) $tmp[2]/60;

        $tempo = $hr + $min + $seg;


        for ($i=0; $i < $qtdQuestoes; $i++) {
            $idPerg[$i] = $_POST['idPergunta'. (string)$qt];
            $respQuestoes[$i] = $_POST['nmQ'. (string)$qt];
        }

        for ($i=0; $i < $qtdQuestoes; $i++) { 
            $resp = $bd->verificarResposta($conexao, $respQuestoes[$i],$idPerg[$i]);
            if ($resp == 1){
                $qtsCorretas++;
            }

            $qt++;
        }
        $tempo = number_format($tempo,2);

        if ($qtdQuestoes == $qtsCorretas) {
            $pontuacao = (float) ($qtsCorretas * 100)/($tempo);
        
        } else if($qtsCorretas == 0){
            $pontuacao = 0;
        
        } else if($qtdQuestoes > $qtsCorretas){
            $pontuacao = (float) (($qtdQuestoes - $qtsCorretas)*100)/$tempo;
        
        } 
        
        $pontuacao = (float) number_format($pontuacao, 2, '.', '');
        $bd->atualizarPontuacao($conexao, $_POST['idUsuario'], $pontuacao, $_POST['idQuiz'], $tempo);
        
        header('Location: ../quizzes/finalizado.php?idQuiz='.$_POST['idQuiz']);

    }

    else if($acao == "cadastrar"){
        $qtdQuestoes = $_POST['qtdQuestoes'];

        $bd->cadastrarQuiz($conexao, $_POST['nomeQuiz'], $_POST['idUsuario'], "");
        $quiz = $bd->selecionarUltimoQuiz($conexao);

        
        for ($i=1; $i <= $qtdQuestoes; $i++) {
            
            if((int)$_POST['qtd_alts_q'.$i] == 5){
                $bd->cadastrarQuestao($conexao, $quiz[0]["id_Quiz"], $_POST['enun_alt_q'.$i], $_POST['alt_a_q'.$i], $_POST['alt_b_q'.$i], $_POST['alt_c_q'.$i], $_POST['alt_d_q'.$i], $_POST['alt_e_q'.$i], $_POST['alt_crt_q'.$i]);
            } 
            
            else if ((int)$_POST['qtd_alts_q'.$i] == 4){
                $bd->cadastrarQuestao($conexao, $quiz[0]["id_Quiz"], $_POST['enun_alt_q'.$i], $_POST['alt_a_q'.$i], $_POST['alt_b_q'.$i], $_POST['alt_c_q'.$i], $_POST['alt_d_q'.$i], "", $_POST['alt_crt_q'.$i]);
            } 
        }

        echo "<script language= 'JavaScript'> alert('Quiz criado realizado com sucesso!') </script>";

        echo "<script language= 'JavaScript'> location.href='../view/inicial.php' </script>";
        
    }

    else if($acao == "editar"){
        $qtdQuestoes = $_POST['qtdQuestoes'];
        
        $bd->editarQuiz($conexao, $_POST['idQuiz'], $_POST['nomeQuiz'], $_POST['idUsuario'], "");
        $quiz = $bd->selecionarQuiz($conexao,$_POST['idQuiz']);

        
        for ($i=1; $i <= $qtdQuestoes; $i++) {
            if((int)$_POST['numAlternativas_q'.$i] == 5){
                $bd->editarQuestao($conexao, $_POST['idQuestao'.$i] ,$quiz[0]["id_Quiz"], $_POST['enun_alt_q'.$i], $_POST['alt_a_q'.$i], $_POST['alt_b_q'.$i], $_POST['alt_c_q'.$i], $_POST['alt_d_q'.$i], $_POST['alt_e_q'.$i], $_POST['alt_crt_q'.$i]);
            } 
            
            else if ((int)$_POST['numAlternativas_q'.$i] == 4){
                $bd->editarQuestao($conexao, $_POST['idQuestao'.$i], $quiz[0]["id_Quiz"], $_POST['enun_alt_q'.$i], $_POST['alt_a_q'.$i], $_POST['alt_b_q'.$i], $_POST['alt_c_q'.$i], $_POST['alt_d_q'.$i], "", $_POST['alt_crt_q'.$i]);
            } 
        }

        echo "<script language= 'JavaScript'> alert('Quiz alterado com sucesso!') </script>";

    }

?>