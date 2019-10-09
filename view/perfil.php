<!DOCTYPE html>
<html>
    <head>
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
        <button type="button" class="btn btn-info m-2">
          Página Inicial<span class="badge badge-gradient"><img src="../img/inicio-icone.png"></span>
        </button> 

        <button type="button" class="btn btn-info m-2">
        Usuário <span class="badge badge-gradient"><img src="../img/perfil-icone.png"></span> 
        </button>
      </li>
    </ul>
    </div>
    </header> 
    <hr><!-- Barra -->
      <div class="container">
       <div class="row">
         <div align="center" class="col-md-3"> <!-- Imagem -->
           <img src="../img/perfil.png">
           <button type="submit" id="btnCad" class="btn btn-warning mt-2">
            <span class="badge badge-gradient"><img src="../img/configuracao-icone.png"></span> Atualizar
            </button>
         </div>
         <div class="col-md-3"> <!-- Posição No Ranking -->
          <div class="cd_perfil bg-light">
           <h6>Posição No Ranking</h6>
           <span class="badge badge-gradient"><p>12</p></span>
         </div>
         </div> 
         <div class="col-md-3"> <!-- Posição geral -->
          <div class="cd_perfil bg-light">
           <h6>Posição Geral</h6>
           <span class="badge badge-gradient"><p>6</p></span>
         </div>
         </div>
         <div class="col-md-3"> <!-- Numero de quizzes -->
          <div class="cd_perfil bg-light">
           <h6>Número de quizzes</h6>
           <span class="badge badge-gradient"><p>4</p></span>
         </div>
         </div>
         </div>
       </div>
      </div>
       



    </body>
    <script src="../estrutura/js/jquery-3.4.1.js">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    

    
</html>