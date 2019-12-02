<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php
        require "../estrutura/header.php";
        if(count($_SESSION) == 0){
            echo "<script language= 'JavaScript'> alert('Erro, usuário não autenticado!') </script>";
            echo "<script language= 'JavaScript'> location.href='../' </script>";
        
        }
        
        $bd = new BD();
        $questoes = $bd->selecionarQuestoes($conexao, $_POST['idQuiz']);
        $qtdQuestoes = count($bd->selecionarQuestoes($conexao, $_POST['idQuiz']));
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
        <script src="../estrutura/js/cronometro.js"></script>

        <title>Responder Quiz</title>

        <style>
            .qSelecionada {
                background: #75b3ff;
            }

        </style>
    </head>

    <body onload="tempo();">
        <form action="../acoes/quiz.php" method="post">
            <div class="container" align="justify" style="margin-top: 5%;">

                <div class="card" style="width: 65rem;">

                    <div class="row">
                        <div class="col" align="center">
                            <div class="card-header">
                                <?php echo "<h4>" . $_POST['nomeQuiz'] . "</h4>"; ?>
                                <h4 style="margin-top: 2%;" id="cronometro"><label id="hora" name="hora"> 00:</label><label id="minuto" name="minuto">00:</label><label id="segundo" name="segundo">00 </label></h4>
                                <input type="hidden" id="tempo" name="tempo" value="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col"> 
                            <?php for ($i = 0; $i < $qtdQuestoes; $i++) { ?>
                                <div class="card-body" style="width: auto; height: max-content; border-style: solid; border-width: 2px; padding-left: 4%; padding-right: 4%; padding-bottom: 3%; padding-top: 3%;" id="Q<?php echo (string) ($i + 1); ?>">
                                    <ol type="a" class="list-group">
                                        <div class="row">
                                            <div class="col"> <h5 class="card-title" style="text-align: left;" ><?php echo "<h5> " . (string) ($i + 1) . "	. " . $questoes[$i]['enunciado'] . "</h5><br>"; ?></h5> </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="nmQ<?php echo (string) ($i + 1); ?>" id="rbQ<?php echo (string) ($i + 1); ?>-a" value="a">
                                            <label class="form-check-label" for="rbQ<?php echo (string) ($i + 1); ?>-a" name="nmQ<?php echo (string) ($i + 1); ?>-a" style="color: black;">
                                                a) &nbsp <?php echo $questoes[$i]['a']; ?>
                                            </label>
                                        </div>
                                        <br>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="nmQ<?php echo (string) ($i + 1); ?>" id="rbQ<?php echo (string) ($i + 1); ?>-b" value="b">
                                            <label class="form-check-label" for="rbQ<?php echo (string) ($i + 1); ?>-b" style="color: black;">
                                                b) &nbsp <?php echo $questoes[$i]['b']; ?>
                                            </label>
                                        </div>
                                        <br>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="nmQ<?php echo (string) ($i + 1); ?>" id="rbQ<?php echo (string) ($i + 1); ?>-c" value="c">
                                            <label class="form-check-label" for="rbQ<?php echo (string) ($i + 1); ?>-c" style="color: black;">
                                                c) &nbsp <?php echo $questoes[$i]['c']; ?>
                                            </label>
                                        </div>
                                        <br>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="nmQ<?php echo (string) ($i + 1); ?>" id="rbQ<?php echo (string) ($i + 1); ?>-d" value="d">
                                            <label class="form-check-label" for="rbQ<?php echo (string) ($i + 1); ?>-d" style="color: black;">
                                                d) &nbsp <?php echo $questoes[$i]['d']; ?>
                                            </label>
                                        </div>
                                        <br>


                                        <?php if ($questoes[$i]['e'] != "") { ?>
                                            <div class="row">
                                                <div class="col"> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="nmQ<?php echo (string) ($i + 1); ?>" id="rbQ<?php echo (string) ($i + 1); ?>-e" value="e">
                                                        <label class="form-check-label" for="rbQ<?php echo (string) ($i + 1); ?>-e" style="color: black;">
                                                            e) &nbsp <?php echo $questoes[$i]['e']; ?> 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>


                                        <?php } ?>

                                        <input type="hidden" name="idPergunta<?php echo (string) ($i + 1); ?>" value="<?php echo $questoes[$i]['idPerg']; ?>">

                                    </ol>
                                </div>

                            <?php } ?>
                        </div>
                    </div>

                    <div class="conatainer" align="center">
                        <div class="card-footer text-muted" style=" width: 65rem;" align="center">
                            <div class="row justify-content-center">
                                <div class="col-4">
                                    <a href="#" class="btn btn-primary justify-content-start" id="btnVoltar" style="width: 100px"> Voltar</a>
                                </div>
                                <div class="col-4">
                                    <a href="#" class="btn btn-primary justify-content-start" id="btnProximo" style="width: 100px">Próximo</a>
                                    <button href="#" class="btn btn-primary justify-content-start" id="btnConcluir" style="width: 100px">Concluir</button>
                                    <input type="hidden" name="acao" value="calcular">
                                    <input type="hidden" name="qtdQuestoes" value="<?php echo $qtdQuestoes; ?>">
                                    <input type="hidden" name="idQuiz" value="<?php echo $_POST['idQuiz']; ?>">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  


        <input type="hidden" name="nomeQuiz" value="<?php $_POST['nomeQuiz']; ?>">
        <input type="hidden" name="idUsuario" value="<?php echo $usuario[0]['id']; ?>">
    </form>

</body>





</html>

<script>
    $(document).ready(function () {
        let questao = 1;
        $("#btnConcluir").hide();

        for (let index = 2; index <= <?php echo $qtdQuestoes; ?>; index++) {
            $("#Q" + index).hide();
        }

        $("#btnProximo").click(function () {
            $("#Q" + questao).hide();
            $("#Q" + (questao + 1)).show();
            questao++;

            if (questao == <?php echo $qtdQuestoes; ?>) {
                $("#btnProximo").hide();
                $("#btnConcluir").show();
            }

        });

        $("#btnVoltar").click(function () {
            if (questao > 1) {
                $("#Q" + questao).hide();
                $("#Q" + (questao - 1)).show();
                questao--;
                if (questao == <?php echo (string) ($qtdQuestoes - 1); ?>) {
                    $("#btnProximo").show();
                    $("#btnConcluir").hide();
                }
            }
        });

        $('#btnConcluir').click(function (event) {
            let mensagem = "";
            let respostas = "";
            for (let i = 1; i <= questao; i++) {
                if (i != questao) {
                    respostas += i + " - " + $("input[name='nmQ" + i + "']:checked").val() + "\n";
                } else {
                    respostas += i + " - " + $("input[name='nmQ" + i + "']:checked").val() + "\n";
                }
            }

            opcao = confirm("Confirmar respostas: \n" + respostas);
            if (opcao == false) {
                event.preventDefault();
                tempo();
            }

            $('#tempo').val($('#cronometro').text());

            alert($('#tempo').val());
            parar();
        });

        $('#alternativas').on('click', function () {
            $('#alternativas').toggleClass('qSelecionada');
        });


    });
</script>
