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
        $conexao = $bd->conexao();

        $quiz = $bd->selecionarQuizzes($conexao);
        $qtdQuizzes = count($quiz);

        $hqr = $bd->selecionarHQRUsuario($conexao, $usuario[0]['id']);
        ?>
        <title>Ranking</title>
        <meta charset="ISO-8859-15">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="shortcut icon" href="../img/favicon.png">
        <link rel="stylesheet" type="text/css" href="../estrutura/css/ranking.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style> 
            img{
                display: inline-block;
                font: normal normal normal 14px/1 FontAwesome;
                font-size: inherit;
                text-rendering: auto;
                -webkit-font-smoothing: antialiased;
            }
        </style>
    </head>
    
    <body>
        
        <!-- divisão -->
        <h1 align="center">Ranking Geral</h1>
        <div  id="area" class="shadow-lg p-3 b-5 bg-light rounded mt-2">
            <div id="quadro">
                <table class="table " align="center" id="tabela_ranking">
                    <thead>
                        <tr>
                            <th style="padding-left:6%;">Ranking</th>
                            <th>Nome de usuário</th>
                            <th>Pontuação</th>
                        </tr>
                    </thead>
                    
                    
                    <?php
                    $ranking = $bd->montarRanking($conexao);
                    for ($i = 0; $i < count($ranking); $i++) {?>
                        <tr>
                            <td style="width:20%;" >
                                <div class="container">
                                    <div class="row justify-content-center" >
                                        
                                        <?php if ($_SESSION['email'] ==  $ranking[$i]['email']) {?>
                                            <div class="col-sm-3"> <i class="fa fa-circle" style="color: red; margin-right:3%;"></i> </div>
                                        <?php }else{ ?>
                                            <div class="col-sm-3"> <label for="" style="margin-right:3%;"></label> </div>
                                        <?php } ?>

                                        <?php if ($i == 0) {?>
                                            <div class="col-sm-3"> <i class="fa fa-trophy fa-2x" style="margin-right: 20%; color:#ffd700"></i> </div>
                                        <?php } ?>

                                        <?php if ($i == 1) {?>
                                            <div class="col-sm-3"> <i class="fa fa-trophy fa-2x" style="margin-right: 20%; color:#c0c0c0"></i> </div>
                                        <?php } ?>

                                        <?php if ($i == 2) {?>
                                            <div class="col-sm-3"> <i class="fa fa-trophy fa-2x" style="margin-right: 20%; color:#cd7f32"></i> </div>
                                        <?php } ?>
                                        
                                        <?php if ($i == (count($ranking) - 1)) {?>
                                            <div class="col-sm-3"> <img src="../img/turtle.png" style="margin-right: 20%;"> </div>
                                        <?php }else if ($i > 2) {?>
                                            <div class="col-sm-3"> <label for="" style="margin-right:3%;"></label> </div>
                                        <?php } ?>


                                        
                                        
                                        <div class="col-sm-4" style="margin-right:13%; margin-left:1%;"> <label style="color: #75b3ff; margin-right:40%;"> <?php echo (string) ($i + 1);?> </label> </div>
                                    </div>
                                </div>
                            </td>

                            <td > <?php echo $ranking[$i]['nome']; ?> </td>

                            <td> <?php echo number_format($ranking[$i]['pont'], 2, '.', '');?> </td>
                        </tr>
                    
                    <?php } ?>
                </table>
            </div>
        </div> <!-- area -->

      

        <!-- Direitos das imagens -->
        <div hidden="">Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
        


    </body>
    <script src="../estrutura/js/jquery-3.4.1.js"></script>
    <script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity = "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin = "anonymous" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>
