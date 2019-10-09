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

        var_dump($respQuestoes);

        echo $qtsCorretas;

    }


    

?>