<!DOCTYPE html>
<html>
    <head>
     <?php 
        require '../bd/bd.php';
        $bd = new BD();
        session_start();
        $conexao = $bd->conexao();
        $usuario = $bd->selecionarUsuario($conexao,$_SESSION['email']);
      ?>
      
      <title>Game Of Partterns</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="shortcut icon" href="../img/favicon.png">
      <link rel="stylesheet" type="text/css" href="../estrutura/css/perfil.css">

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
      <div class="container" style="margin-top: 5%;">
        <div class="row">
          <div class="col align-self-center"> <!-- Imagem -->
              <img src="../img/perfil.png" style="margin-left: 13%;">
              <a href="conf_perfil.php">
                <button type="submit" id="btnCad" class="btn btn-warning mt-2">
                  <span class="badge badge-gradient"><img src="../img/configuracao-icone.png"></span> Atualizar 
                </button>
              </a>
            </div>

          <div class="col-md-3"> <!-- Posição No Ranking -->
            <b><h3 style="margin-top:16%; color: #fa7202; margin-left:9%;"> <?php echo $usuario[0]['nome'] ?> </h3></b> 
            <div class="cd_perfil bg-light" style="margin-top:15%;">
              <h5 align="center" id="tl_perfil">Posição no ranking</h5>
              <h5 align="center" id="dd_perfil">4</h5>
            </div>
          </div>

          <div class="col-md-3"> <!-- Posição geral -->
            <div class="cd_perfil bg-light" style="margin-top:43%;">
              <h5 align="center" id="tl_perfil">Pontuação geral</h5>
              <h5 align="center" id="dd_perfil">4</h5>
            </div>
          </div>

          <div class="col-md-3"> <!-- Numero de quizzes -->
            <br>
            <div class="cd_perfil bg-light" style="margin-top:33%;">
              <h5 align="center" id="tl_perfil">Número de quizzes</h5>
              <h5 align="center" id="dd_perfil">4</h5>
            </div>
          </div>
         </div>
        </div>

        <div class="row" style="margin-left: 35%;">
          <div class="col-md-3"> <!-- Posição No Ranking -->
            <b><h3 style="margin-top:16%; color: #fa7202; margin-left:9%;"> Minhas badges </h3></b> 
            <div class="cd_perfil bg-light" style="margin-top:15%;">
              <h5 align="right" id="tl_perfil">  </h5>
              <h5 align="center" id="dd_perfil"> </h5>
            </div>
          </div>

        </div>
      </div>

    <script src="../estrutura/js/jquery-3.4.1.js">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    

    
</html>