<!DOCTYPE html>
<html>
    <head>
        <?php
        require "../estrutura/header.php";
        require "../estrutura/foot.php";
        if(count($_SESSION) == 0){
            echo "<script language= 'JavaScript'> alert('Erro, usuário não autenticado!') </script>";
            echo "<script language= 'JavaScript'> location.href='../' </script>";
        
        }
        
        $bd = new BD();
        $hqr = $bd->selecionarHQRUsuario($conexao, $usuario[0]['id']);
        $posicao = $bd->verificarPosicao($conexao, $_SESSION['email']);
        $allHQR = $bd->selecionarHQRs($conexao);
        $ranking = $bd->montarRanking($conexao);
        $quizzes = $bd->selecionarQuizSistema($conexao,$usuario[0]['id']);

        $colTempHqr = array_column($allHQR, 'tempo');
        $idColMin = array_search(min($colTempHqr), $colTempHqr);
        $idColMax = array_search(max($colTempHqr), $colTempHqr);

        ?>
         
        

        <title>Game Of Partterns</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="shortcut icon" href="../img/favicon.png">
        <link rel="stylesheet" type="text/css" href="../estrutura/css/perfil.css">

    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-3 align-self-center" align="center"> <!-- Imagem -->
                    <img src="../img/perfil.png">
                    <a href="conf_perfil.php">
                    <b><h6> <?php echo $usuario[0]['nome'] ?> </h5></b> 
                        <button type="submit" id="btnCad" class="btn btn-warning mt-2">
                            <span class="badge badge-gradient"><img src="../img/configuracao-icone.png"></span> Atualizar 
                        </button>
                    </a>
                </div>

                <div class="col-md-3" align="center"> <!-- Posição No Ranking -->
                    

                    <div class="cd_perfil bg-light">
                        <h5 align="center" id="tl_perfil">Posição no ranking</h5>
                        <h5 align="center" id="dd_perfil"><?php echo $posicao; ?></h5>
                    </div>
                </div>

                <div class="col-md-3"> <!-- Posição geral -->
                    <div class="cd_perfil bg-light" >
                        <h5 align="center" id="tl_perfil">Pontuação geral</h5>
                        <h5 align="center" id="dd_perfil"><?php echo $usuario[0]['pont'] ?></h5>
                    </div>
                </div>

                <div class="col-md-3"> <!-- Numero de quizzes -->
                    <div class="cd_perfil bg-light">
                        <h5 align="center" id="tl_perfil">Número de quizzes</h5>
                        <h5 align="center" id="dd_perfil"> <?php echo count($hqr); ?> </h5>
                    </div>
                </div>
            </div>
        </div>

          <div class="container" style="margin-top: 5%;">
            <div class="row">
                <div class="col-md-3 align-self-center"> <!-- Imagem -->
                    
                </div>

                
                
                <div id="badges" class="col-md-9 container"> <!-- Posição No Ranking -->
                    <h5 align="center" class="mt-2">Minhas Conquistas</h5>
                    <hr style="width: 100%;">

                    <div class="row">
                        
                        <?php if(count($hqr) == count($quizzes) && count($hqr) != 0) {?>
                            <div class="col">
                                <div class="card border-secondary mb-1" style="max-width: 8rem;">
                                    <div class="card-header align-self-center" style="max-width:8rem; padding-left:1%;">
                                        <img class="align-self-center" src="../img/badges/rei_quiz.png" style="width:8rem;  padding-right:8%; padding-left:8%;">
                                    </div>
                                    
                                    <div class="card-body align-self-center">
                                        <span> <p class="card-text" style="font-family: inherit; color:#fa7202; font-weight: 700;">Rei dos quizzes</p> </span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        
                        <?php if($ranking[0]['email'] == $_SESSION['email']) { ?>
                            <div class="col">
                                <div class="card border-secondary mb-1" style="max-width: 8rem;">
                                    <div class="card-header align-self-center" style="max-width:8rem; padding-left:1%;">
                                        <img class="align-self-center" src="../img/badges/medalha-1.png" style="width:8rem;  padding-right:8%; padding-left:8%;">
                                    </div>
                                    
                                    <div class="card-body align-self-center">
                                        <span> <p class="card-text" style="font-family: inherit; color:#fa7202; font-weight: 700;">1º Lugar</p> </span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if($ranking[1]['email'] == $_SESSION['email']) { ?>
                            <div class="col">
                                <div class="card border-secondary mb-1" style="max-width: 8rem;">
                                    <div class="card-header align-self-center" style="max-width:8rem; padding-left:1%;">
                                        <img class="align-self-center" src="../img/badges/medalha-2.png" style="width:8rem;  padding-right:8%; padding-left:8%;">
                                    </div>
                                    
                                    <div class="card-body align-self-center">
                                        <span> <p class="card-text" style="font-family: inherit; color:#fa7202; font-weight: 700;">2º Lugar</p> </span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if($ranking[2]['email'] == $_SESSION['email']) { ?>
                            <div class="col">
                                <div class="card border-secondary mb-1" style="max-width: 8rem;">
                                    <div class="card-header align-self-center" style="max-width:8rem; padding-left:1%;">
                                        <img class="align-self-center" src="../img/badges/medalha-3.png" style="width:8rem;  padding-right:8%; padding-left:8%;">
                                    </div>
                                    
                                    <div class="card-body align-self-center">
                                        <span> <p class="card-text" style="font-family: inherit; color:#fa7202; font-weight: 700;">3º Lugar</p> </span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if($allHQR[$idColMin]['id_User'] == $usuario[0]['id']) { ?>
                            <div class="col">
                                <div class="card border-secondary mb-1" style="max-width: 8rem;">
                                    <div class="card-header align-self-center" style="max-width:8rem; padding-left:1%;">
                                        <img class="align-self-center" src="../img/badges/mais-rapido.png" style="width:8rem;  padding-right:8%; padding-left:8%;">
                                    </div>
                                    
                                    <div class="card-body align-self-center">
                                        <span> <p class="card-text" style="font-family: inherit; color:#fa7202; font-weight: 700;">Respondeu rápido</p> </span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if($allHQR[$idColMax]['id_User'] == $usuario[0]['id']) { ?>
                            <div class="col">
                                <div class="card border-secondary mb-1" style="max-width: 8rem;">
                                    <div class="card-header align-self-center" style="max-width:8rem; padding-left:1%;">
                                        <img class="align-self-center" src="../img/badges/mais-lento.png" style="width:8rem;  padding-right:8%; padding-left:8%;">
                                    </div>
                                    
                                    <div class="card-body align-self-center">
                                        <span> <p class="card-text" style="font-family: inherit; color:#fa7202; font-weight: 700;">Respondeu lento</p> </span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>

        <footer class="card text-center">
            <div class="card-footer">

            </div>
        </footer>


        
   

    <script src="../estrutura/js/jquery-3.4.1.js"></script>
    <script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity = "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin = "anonymous" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



</html>
