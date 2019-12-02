<!DOCTYPE html>
<html>
    <head>
    <?php 
        
        if(count($_SESSION) == 0){
            echo "<script language= 'JavaScript'> alert('Erro, usuário não autenticado!') </script>";
            echo "<script language= 'JavaScript'> location.href='../' </script>";
        
        }
        require "../estrutura/header.php";  ?>
        
        <title>Game Of Partterns</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="shortcut icon" href="../img/favicon.png">
        <link rel="stylesheet" type="text/css" href="../estrutura/css/cria_quiz.css">
    
    </head>
    <body>
    
    <h1 align="center">Criação do Quiz</h1> <!-- Título -->
     
    <div id="questao">
        <div class="container" id="enunciado">
            <div class="row"> 
                <div class="col-md-12" style="margin-left: 5%; margin-top: 2%;">
                    <div>
                        <h3 id="numQuestao">1 - Questão: </h3>
                        <textarea placeholder="Escreva o conteúdo da questão ..." id="content_question"> </textarea>
                    </div> 
                </div>
            </div>

            <div class=" form-group row justify-content-center" style="margin-top: 1%">
                
                <label class="col-xs-4 col-form-label"> Número de alternativas: </label>
                <div class="col-xs-2 col-xs-offset-2" style="margin-left: 1%;">
                    <input class="form-control" type="number" min="4" max="5" value="4" id="numAlternativas" style="width: 75%;">
                </div>
                    
                <div class="col-1">
                    <input type="button" class="btn btn-warning btnGerarAlternativas" style="margin-left:3%;" value="Gerar">
                </div>
                   
            </div>
            <div class="row d-flex justify-content-center" style="margin-top: 3%; margin-bottom: 3%; margin-left:0%;" id="div_alt_crt">
                <div class="col-12" align="center">
                    Alternativa correta: &nbsp
                    <input id="alt_crt" class="form-control" align="center" type="text" placeholder=" a - e" name="" style="text-align:center; width: 10%;"
                    onkeypress="return ApenasLetras(event,this);" maxlength="1">
                    <input id="acao" type="hidden" name="acao" value="cadastrar">
                    
                </div>
            </div>
            

        </div>
        
        <div id="alternativas">
            <div>
                <div class="container" style="margin-left:4%; margin-top:3%;">
                    <div class="row" id="div_alt_a">
                        <div class="col-sm-1" align="right" style="margin-right:0%;">
                            <label>a)</label>
                        </div>

                        <div class="col-sm-11">
                            <input class="form-control" id="alt_a"  type="text" name="" style="width: 78%;">
                        </div>
                            
                    </div>    

                    <div class="row" id="div_alt_b" style="margin-top:2%;">
                        <div class="col-sm-1" align="right" style="margin-right:0%;">
                            <label>b)</label>
                        </div>

                        <div class="col-sm-11">
                            <input id="alt_b" class="form-control" type="text" name=""  style="width: 78%;">
                        </div>
                    </div>    

                    <div class="row" id="div_alt_c" style="margin-top:2%;">
                        <div class="col-sm-1" align="right" style="margin-right:0%;">
                            <label>c)</label>
                        </div>

                        <div class="col-sm-11">
                            <input id="alt_c"  class="form-control" type="text" name=""  style="width: 78%;">
                        </div>

                            

                    </div>    

                    <div class="row" id="div_alt_d" style="margin-top:2%;">
                        <div class="col-sm-1" align="right" style="margin-right:0%;">
                            <label>d)</label>
                        </div>

                        <div class="col-sm-11">
                            <input id="alt_d"  class="form-control" type="text" name=""  style="width: 78%;">
                        </div>
                    </div>    

                    <div class="row" id="div_alt_e" style="margin-top:2%;">
                        <div class="col-sm-1" align="right" style="margin-right:0%;">
                            <label>e)</label>
                        </div>

                        <div class="col-sm-11">
                            <input id="alt_e"  class="form-control" type="text" name="" style="width: 78%;">
                        </div>
                    </div>    
                </div>
                
            </div> <!-- col 6 -->

        </div>
    </div>

    <form action="../acoes/quiz.php" method="post" class="form-group form-inline" id="formNovoQuiz" >
        <div  class="shadow-lg p-3 b-5 bg-light rounded mt-2 area">
            <div id="nomedoquiz" class="nav justify-content-center" style="height:auto;">
                <div>
                    <div class="container">
                        <div class="row" style="margin-top:2%; margin-bottom:1%;">
                            <div class="col-md-6">
                                Nome do Quiz:
                                <input class="form-control" type="text" name="nomeQuiz" style="margin-left:2%;" required="">
                            </div>

                            <div class="col-5">
                                Número de questões: &nbsp
                                <input class="form-control" type="number" id="qtdQuestoes" name="qtdQuestoes" placeholder="2 - 10" min="2" max="10" style="width: 28%;">
                            </div>

                            <div class="col-1" align="center">
                                <input type="button" class="btn btn-warning" id="btnGerarQuestoes" value="Gerar">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        <div id="areaQuestoes" style="margin-top:3%; margin-left:5%;"></div>
        <input type="hidden" name="acao" value="cadastrar">
        <input type="hidden" name="idUsuario" value="<?php echo $usuario[0]['id']; ?>">
    </form>
    
    
    
    <div class="container d-flex justify-content-center" style="margin-top:1%; margin-bottom:1%;">
        <div class="row">
            <div class="col-6">
                <input type="button" class="btn btn-warning" id="btnVoltar" style="margin-left:3%;" value="Voltar">
            </div>

            <div class="col-6">
                <input type="button" class="btn btn-warning" id="btnProximo" style="margin-left:3%;" value="Proximo">
                <input type="button" class="btn btn-warning" id="btnConcluir" style="margin-left:3%;" value="Concluir">
            </div>
        </div>
    </div>      
   


    </body>

    <footer class="card text-center">
      <div class="card-footer">
        Entrega do dia 25 de Setembro de 2019.
      </div>
    </footer>
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="../estrutura/js/cria_quiz.js"></script>

</html>

