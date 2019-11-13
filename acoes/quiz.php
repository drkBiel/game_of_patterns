<?php
    $acao = $_POST['acao'] ? $_POST['acao'] : ' ';

    if ($acao == "calcular"){
        require "../bd/bd.php";
        $bd = new BD();
        $conexao = $bd->conexao();
        
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

?>