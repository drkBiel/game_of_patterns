<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php
        require '../bd/bd.php';
        $bd = new BD();
        session_start();
        $conexao = $bd->conexao();
        $usuario = $bd->selecionarUsuario($conexao, $_SESSION['email']);
        $quiz = $bd->selecionarQuiz($conexao, $_GET['idQuiz']);
        $hqr = $bd->selecionarHQRUsuarioQuiz($conexao, $quiz[0]['id'], $usuario[0]['id']);
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
        <header class="bg-gradient"> 
            <div class="bg-gradient col-md-12">
                <a href=""><img src="../img/logo.jpg" width="160" height="60"  class="position-absolute img-fluid text-hide"></a>
                <ul class="nav justify-content-end form-inline">
                    <li class="nav-item">
                        <a href="../view/inicial.php">
                            <button type="button" class="btn btn-info m-2">
                                Página Inicial<span class="badge badge-gradient"><img src="../img/inicio-icone.png"></span>
                            </button>
                        </a>
                        
                        <a href="../view/ranking.php">
                            <button type="button" class="btn btn-info m-2">
                                Ranking <span class="badge badge-gradient"><img src="../img/ranking.png"></span> 
                            </button>
                        </a>

                        <a href="../view/perfil.php">
                            <button type="button" class="btn btn-info m-2">
                                <?php echo $usuario[0]['nome']; ?> <span class="badge badge-gradient"><img src="../img/perfil-icone.png"></span> 
                            </button>

                        </a>
                    </li>
                </ul>
            </div>
        </header>

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
                                Tempo: <h4 style="margin-top: 2%;"> <?php echo $hqr[0]['tempo'] ?> minutos </h4>
                                Pontuação: <h4 style="margin-top: 2%;"> <?php echo $hqr[0]['pontuacao'] ?> </h4>
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

