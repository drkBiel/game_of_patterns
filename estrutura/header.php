<!DOCTYPE html>
<html>
  <head>
    <?php
      require "../bd/bd.php";
      session_start();
      $bd = new BD();
      $conexao = $bd->conexao();

      $usuario = $bd->selecionarUsuario($conexao, $_SESSION['email']);
      
    ?>
    <link rel="stylesheet" type="text/css" href="css/inicial.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  </head>
  <body>
    <header>
      <form action="../acoes/usuario.php" method="post"> 
        <div class="bg-gradient col-md-12" style="margin-top:0%;">
          <a href=""><img src="../img/logo.jpg" width="160" height="60"  class="position-absolute img-fluid text-hide" ></a>
          <ul class="nav justify-content-end form-inline">
            <li class="nav-item">
              <a href="inicial.php">
                <button type="button" class="btn btn-info m-2" style="margin-top:1%;">
                  Página Inicial<span class="badge badge-gradient"><img src="../img/inicio-icone.png"></span>
                </button>
              </a>

              <?php if($usuario[0]['tpUser'] == 2) { ?>
                <a href="../view/cria_quiz.php">
                  <button type="button" class="btn btn-info m-2">
                    Criar quiz <span class="badge badge-gradient"><img src="../img/icons8-adicionar.png"></span> 
                  </button>
                </a>
              <?php } ?>

              <a href="ranking.php">
                <button type="button" class="btn btn-info m-2">
                    Ranking <span class="badge badge-gradient"><img src="../img/ranking.png"></span> 
                  </button>
              </a>

              <a href="../view/perfil.php">
                <button type="button" class="btn btn-info m-2">
                  <?php echo $usuario[0]['nome']; ?> <span class="badge badge-gradient"><img src="../img/perfil-icone.png"></span> 
                </button>
              </a>
         
              <button type="submit" class="btn btn-info m-2">
                Sair <span class="badge badge-gradient"><img src="../img/icons8-sair.png"></span> 
              </button>
              <input type="hidden" name="acao" value="sair">
                
              
              
            </li>
          </ul>
        </div>
      </form>
    </header>
    <hr><!-- Barra -->

  </body>
  
</html>