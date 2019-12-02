<?php 
    session_start();
    if(count($_SESSION) > 0){ ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/inicial.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <form action="../view/editarQuiz.php" id="redirecionar" method="post">
        <input type='hidden' name='idQuiz' value="<?php echo $_POST['idQuiz']; ?>">
    </form>

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
            
            echo "<script language= 'JavaScript'> location.href='../view/inicial.php' </script>";

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

            echo "<script language= 'JavaScript'> alert('Quiz criado com sucesso!') </script>";
            echo "<script language= 'JavaScript'> location.href='../view/inicial.php' </script>";
            
        }
        

        else if($acao == "editar"){
            $bd->editarQuiz($conexao, $_POST['idQuiz'], $_POST['nome'], $_POST['idUser'],"");
            echo "<script language= 'JavaScript'> alert('Quiz alterado com sucesso.') </script>";
            echo '<script language= "JavaScript"> $("#redirecionar").submit(); </script>';
        }

        else if($acao == "excluir"){
            $bd->excluirQuiz($conexao, $_POST['idQuiz']);

            echo "<script language= 'JavaScript'> alert('Quiz excluída com sucesso.') </script>";
            echo '<script language= "JavaScript"> $("#redirecionar").submit(); </script>';
        }

        


        else if($acao == "editarQuestao"){
            $q = $_POST['idPerg'];
            
            $bd->editarQuestao(
                $conexao, $_POST['idPerg'], $_POST['idQuiz'], $_POST['enun_alts_q'. $q],
                $_POST['alt_a_q'. $q], $_POST['alt_b_q'. $q], $_POST['alt_c_q'. $q],
                $_POST['alt_d_q'. $q], $_POST['alt_e_q'. $q], $_POST['alt_crt_q'. $q]
            );

            echo "<script language= 'JavaScript'> alert('Questão alterada com sucesso.') </script>";
            echo '<script language= "JavaScript"> $("#redirecionar").submit(); </script>';

        }

        else if($acao == "adicionarQuestao"){
            $bd->cadastrarQuestao(
                $conexao, $_POST['idQuiz'], $_POST['enun_alts_q'],
                $_POST['alt_a_q'], $_POST['alt_b_q'], $_POST['alt_c_q'],
                $_POST['alt_d_q'], $_POST['alt_e_q'], $_POST['alt_crt_q']
            );

            echo "<script language= 'JavaScript'> alert('Questão adicionada com sucesso.') </script>";
            echo '<script language= "JavaScript"> $("#redirecionar").submit(); </script>';
            
        
        }

        else if($acao == "excluirQuestao"){
            $bd->excluirQuestao($conexao, $_POST['idPerg']);

            echo "<script language= 'JavaScript'> alert('Questão excluída com sucesso.') </script>";
            echo '<script language= "JavaScript"> $("#redirecionar").submit(); </script>';
        }
}else{
    echo "<script language= 'JavaScript'> alert('Erro, usuário não autenticado!') </script>";
    echo "<script language= 'JavaScript'> location.href='../index.php' </script>";

}
?>