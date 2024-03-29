<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php
        require "../estrutura/header.php";
        $bd = new BD();
        
        $quiz = $bd->selecionarQuiz($conexao, $_GET['idQuiz']);
        $hqr = $bd->selecionarHQRUsuarioQuiz($conexao, $quiz[0]['id'], $usuario[0]['id']);

        $pontuacoes = array();
        $tempos = array();

        for ($i=0; $i < count($hqr); $i++) { 
            $pontuacoes[$i] = $hqr[$i]['pontuacao'];
            $tempos[$i] = $hqr[$i]['tempo'];
        }

        ?>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../estrutura/css/style.css">
        <link rel="stylesheet" href="../estrutura/css/style.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="../estrutura/css/jquery.quiz.css" />
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <title>Responder Quiz</title>

        <style>
            .qSelecionada {
                background: #75b3ff;
            }

        </style>
    </head>

    <body>
        <form action="../view/inicial.php" method="post">
            <div class="container" align="center" style="margin-top: 10%;">

                <div class="card" style="width: 40rem;" align="center">

                    <div class="row">
                        <div class="col" align="center">
                            <div class="card-header">
                                <h4 style="margin-top: 2%;"></h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col"> 
                            <div class="card-body" style="width: auto; height: max-content; border-style: solid; border-width: 2px; padding-left: 4%; padding-right: 4%; padding-bottom: 3%; padding-top: 3%;" id="Q<?php echo (string) ($i + 1); ?>">
                                <img src="../img/teste-passado.png">
                                <?php echo "<h4>" . $quiz[0]['nome'] . " finalizado</h4>"; ?> 
                                <br>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 align="center"> Maior </h4>
                                        <h5 style="margin-top: 10%;"> Tempo:  <?php echo min($tempos); ?> minutos </h5>
                                        <h5 style="margin-top: 2%;"> Pontuação: <?php echo max($pontuacoes); ?> </h5>        
                                    </div>

                                    <div class="col-md-6">
                                        <h4 align="center"> Obtido </h4>
                                        <h5 style="margin-top: 10%;"> Tempo:  <?php echo $tempos[count($tempos)-1]; ?> minutos </h5>
                                        <h5 style="margin-top: 2%; margin-bottom: 20%;"> Pontuação: <?php echo $pontuacoes[count($pontuacoes)-1]; ?> </h5>        
                                    </div>
                                    <br>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>

                    <div class="conatainer" align="center">
                        <div class="card-footer text-muted" style=" width: 40rem;" align="center">
                            <div class="row justify-content-center">
                                <div class="col-4">
                                    <button href="#" class="btn btn-primary justify-content-start" id="btnConcluir" style="width: 100px">Finalizar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  



    </form>




    <
    <!--footer class="card text-center" style=" position:relative; bottom:0;  width:100%;">
            <div class="card-footer">
                    Entrega do dia 11 de Agosto de 2019.
            </div>
    </footer-->
</body>

<!-- Scripts -->




</html>

