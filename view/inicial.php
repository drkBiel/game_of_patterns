<!DOCTYPE html>
<html>
    <head>
        <?php
            require "../estrutura/header.php";
            
            $quiz = $bd->selecionarQuizzes($conexao);
            $qtdQuizzes = count($quiz);

            $quizProfs = $bd->selecionarQuizzesProfessores($conexao);
            $qtdQuizzesProfs = count($quizProfs);

            $hqr = $bd->selecionarHQRUsuario($conexao, $usuario[0]['id']);
            $qPercorridos = array();
            $qProfsPercorridos = array();
        ?>
       
        <title>Game Of Partterns</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="shortcut icon" href="../img/favicon.png">
        <link rel="stylesheet" type="text/css" href="../estrutura/css/inicial.css">

    </head>
    <body>
        
        <h3 style="margin-left:10%; margin-top:3%;"> Teste seus conhecimentos sobre padrões de projetos - Quizzes</h3>


        <div id="area_cards">
            <div class="row"> <!-- Linha de cards -->

                <?php for ($i = 0; $i < $qtdQuizzes; $i++) { ?>
                    <form action='../usuario/responderQuiz.php' method='post'>
                        <div class="col-md-3">
                            <div class="card ml-3" style="width: 20rem; position: relative;"> <!-- card -->
                                <div class="card-body" style="position: relative;">
                                    <h5 class="card-title"> <?php echo $quiz[$i]['nome']; ?></h5>
                                    <p class="card-text"><?php echo $quiz[$i]['descricao']; ?></p>
                                    <input type='hidden' name='idQuiz' value="<?php echo $quiz[$i]['id'] ?>">
                                    <input type='hidden' name='nomeQuiz' value="<?php echo $quiz[$i]['nome'] ?>">

                                    <div class="container">
                                        <div class="row">
                                            <div class="col align-self-start"> <button href='#' type='submit' class='btn btn-warning'> Iniciar</button> </div>
                                            <div class="col align-self-end"> <a href='#' class='btn btn-info'> Forum</a> </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>

        <br>
        <h3 style="margin-left:10%; margin-top:1%;"> Respondidos</h3>

        <div id="area_cards">
            <div class="row"> <!-- Linha de cards -->

                <?php
                    for ($i = 0; $i < count($hqr); $i++) {
                        $quiz = $bd->selecionarQuiz($conexao, $hqr[$i]['idQuiz']);
                        
                        if (in_array($quiz, $qPercorridos)){ }
                        
                        else{   
                            $qPercorridos[$i] = $quiz;
                            if($quiz[0]['id_User'] != 0){?>
                            
                            <div class="col-md-3">
                                <div class="card ml-3" style="width: 20rem; position: relative; margin-left: 10%;"> <!-- card -->
                                    <div class="card-body" style="position: relative;">

                                        <h5 class="card-title"> <?php echo $quiz[0]['nome']; ?></h5>
                                        <p class="card-text"> <b> Criado por: <?php echo  $quiz[0]['nome'];?> </b></p>
                                        <p class="card-text"><?php if($quiz[0]['descricao'] != "") { echo $quiz[0]['descricao']; } else{ echo "Esse quiz não possui descrição";}   ?></p>
                                        <input type='hidden' name='idQuiz' value="<?php echo $quiz[$i]['id_Quiz'] ?>">
                                        <input type='hidden' name='nomeQuiz' value="<?php echo $quiz[$i]['nome'] ?>">

                                        <div class="container">
                                            <div class="row">
                                                <div class="col align-self-start"> <button href='#' type='submit' class='btn btn-warning'> Iniciar</button> </div>
                                                <div class="col align-self-end"> <a href='#' class='btn btn-info'> Forum</a> </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php
                            }
                            if($quiz[0]['id_User'] == 0){?>
                            
                                <div class="col-md-3">
                                    <div class="card ml-3" style="width: 20rem; position: relative; margin-left: 10%;"> <!-- card -->
                                        <div class="card-body" style="position: relative;">
    
                                            <h5 class="card-title"> <?php echo $quiz[0]['nome']; ?></h5>
                                            <p class="card-text"><?php if($quiz[0]['descricao'] != "") { echo $quiz[0]['descricao']; } else{ echo "Esse quiz não possui descrição";}   ?></p>
                                            <input type='hidden' name='idQuiz' value="<?php echo $quiz[$i]['id_Quiz'] ?>">
                                            <input type='hidden' name='nomeQuiz' value="<?php echo $quiz[$i]['nome'] ?>">
    
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col align-self-start"> <button href='#' type='submit' class='btn btn-warning'> Iniciar</button> </div>
                                                    <div class="col align-self-end"> <a href='#' class='btn btn-info'> Forum</a> </div>
                                                </div>
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
                            <?php
                                }
                            }
                        }?>

                <?php if ($i == 0) { ?> <h4 style="color: #fa7202;" class="text-center" align="center"> &nbsp&nbsp&nbsp&nbsp Nenhum quiz repondido </h4> <?php } ?>
            </div>
        </div>

        
        <h3 style="margin-left:10%; margin-top:2%;">Criados por professores</h3>


        <div id="area_cards">
            <div class="row"> <!-- Linha de cards -->

                <?php
                    for ($i = 0; $i < ($qtdQuizzesProfs); $i++) {?>
                        <form action='../usuario/responderQuiz.php' method='post'>
                        <?php
                            $profQuiz = $bd->selecionarUsuarioID($conexao, $quizProfs[0]['id_User']);
                            if (in_array($quiz, $qProfsPercorridos)){ }
                            
                            else{  $qProfsPercorridos[$i] = $quiz; ?>
                            
                                <div class="col-md-3">
                                    <div class="card ml-3" style="width: 20rem; position: relative; margin-left: 10%;"> <!-- card -->
                                        <div class="card-body" style="position: relative;">

                                            <h5 class="card-title"> <?php echo $quizProfs[0]['nome']; ?></h5>
                                            <p class="card-text"> <b> Criado por: <?php echo  $profQuiz[0]['nome'];?> </b></p>
                                            <p class="card-text"><?php if($quizProfs[0]['descricao'] != "") { echo $quizProfs[0]['descricao']; } else{ echo "Esse quiz não possui descrição";}   ?></p>
                                            <input type='hidden' name='idQuiz' value="<?php echo $quizProfs[$i]['id_Quiz'] ?>">
                                            <input type='hidden' name='nomeQuiz' value="<?php echo $quizProfs[$i]['nome'] ?>">

                                            <div class="container">
                                                <div class="row">
                                                    <div class="col align-self-start"> <button href='#' type='submit' class='btn btn-warning'> Iniciar</button> </div>
                                                    <div class="col align-self-end"> <a href='#' class='btn btn-info'> Forum</a> </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                  <?php } ?>
                </form>
            <?php }?>

                <?php if ($i == 0) { ?> <h4 style="color: #fa7202;" class="text-center" align="center"> &nbsp&nbsp&nbsp&nbsp Nenhum quiz repondido </h4> <?php } ?>
            </div>
        </div>



    </body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>
