<!DOCTYPE html>
<html>
    <head>
      <?php
        
        require "../bd/bd.php";
        $bd = new BD();
        $conexao = $bd->conexao();
        
        $quiz = $bd->selecionarQuizzes($conexao);
        $qtdQuizzes = count($quiz);

        session_start();
        $usuario = $bd->selecionarUsuario($conexao,$_SESSION['email']);
      ?>
      <title>Game Of Partterns</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="shortcut icon" href="../img/favicon.png">
      <link rel="stylesheet" type="text/css" href="../estrutura/css/inicial.css">

    </head>
    <body>
    <header> 
    <div class="bg-gradient col-md-12">
    <a href=""><img src="../img/logo.jpg" width="160" height="60"  class="position-absolute img-fluid text-hide"></a>
    <ul class="nav justify-content-end form-inline">
      <li class="nav-item">
        <a href="inicial.php">
            <button type="button" class="btn btn-info m-2">
              Página Inicial<span class="badge badge-gradient"><img src="../img/inicio-icone.png"></span>
            </button>
        </a>

          <a href="../view/perfil.php">
              <button type="button" class="btn btn-info m-2">
                <?php echo $usuario[0]['nome'];?> <span class="badge badge-gradient"><img src="../img/perfil-icone.png"></span> 
              </button>
          </a>
      </li>
    </ul>
    </div>
    </header>

    <hr><!-- Barra -->
    <br>
    <h3> <?php for ($i=0; $i < 24; $i++) { echo "&nbsp"; } ?> Teste seus conhecimentos sobre padrões de projetos - Quizzes</h3>
    
    
    <div id="area_cards">
      <div class="row"> <!-- Linha de cards -->
        
        <?php for ($i=0; $i < $qtdQuizzes; $i++) {?>
          <form action='../usuario/responderQuiz.php' method='post'>
            <div class="col-md-4">
              <div class="card ml-4" style="width: 20rem; position: relative;"> <!-- card -->
                    <div class="card-body" style="position: relative;">
                      <h5 class="card-title"> <?php echo  $quiz[$i]['nome']; ?></h5>
                      <p class="card-text"><?php echo  $quiz[$i]['descricao']; ?></p>
                      <input type='hidden' name='idQuiz' value="<?php echo $quiz[$i]['id']?>">
                      <input type='hidden' name='nomeQuiz' value="<?php echo $quiz[$i]['nome']?>">
                      
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
          <?php }?>
      </div>
    </div>
    
    <br>
    <h3><?php for ($i=0; $i < 24; $i++) { echo "&nbsp"; } ?>  Respondidos</h3>
    
    <div id="area_cards">
      <div class="row"> <!-- Linha de cards -->
        
        <?php for ($i=0; $i < 0; $i++) {?>
          <div class="col-md-4">
            <div class="card ml-4" style="width: 20rem; position: relative;"> <!-- card -->
                  <div class="card-body" style="position: relative;">
                    <h5 class="card-title"> <?php echo  $quiz[$i]['nome']; ?></h5>
                    <p class="card-text"><?php echo  $quiz[$i]['descricao']; ?></p>
                    <input type='hidden' name='idQuiz' value="<?php echo $quiz[$i]['id']?>">
                    <input type='hidden' name='nomeQuiz' value="<?php echo $quiz[$i]['nome']?>">
                    
                    <div class="container">
                      <div class="row">
                        <div class="col align-self-start"> <button href='#' type='submit' class='btn btn-warning'> Iniciar</button> </div>
                        <div class="col align-self-end"> <a href='#' class='btn btn-info'> Forum</a> </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
            </div>
          <?php }?>

          <?php if($i == 0){?> <h4 style="color: #fa7202;" class="text-center" align="center"> &nbsp&nbsp&nbsp&nbsp Nenhum quiz repondido </h4> <?php } ?>
      </div>
    </div>

  

    </body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>