<!DOCTYPE html>
<html lang="pt-br">
    <head>
    
      <title>Ranking</title>
      <meta charset="ISO-8859-15">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="shortcut icon" href="../img/favicon.png">
      <link rel="stylesheet" type="text/css" href="../estrutura/css/ranking.css">

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
							Usuário<span class="badge badge-gradient"><img src="../img/perfil-icone.png"></span> 
						</button>
				</a>
      </li>
    </ul>
    </div>
    </header> 
    <hr><!-- Barra -->
    <!-- divisão -->
    <div class="m-4 position-absolute">
      <p><a href=""><strong>Voltar</strong></a></p>
    </div>
     <h1 align="center">Ranking Geral</h1>
    <div  id="area" class="shadow-lg p-3 b-5 bg-light rounded mt-2">
      <div id="quadro">
         <table class="table" align="center" id="tabela_ranking">
        <thead>
         <tr>
           <th>Ranking</th>
           <th>Nome de usuário</th>
           <th>Pontuação</th>
         </tr>
        </thead>
        <tr>
           <td>1</td>
           <td>Usuário</td>
           <td>234</td>
        </tr>
        <tr>
           <td>2</td>
           <td>Usuário</td>
           <td>234</td>
        </tr>
          <tr>
           <td>3</td>
           <td>Usuário</td>
           <td>234</td>
        </tr>
        <tr>
           <td>4</td>
           <td>Usuário</td>
           <td>234</td>
        </tr>
        <tr>
           <td>5</td>
           <td>Usuário</td>
           <td>234</td>
         </tr>
       </table>
      </div>
    </div> <!-- area -->
       
    <footer class="card text-center">
      <div class="card-footer">
        Entrega do dia 25 de Setembro de 2019.
      </div>
    </footer>


    </body>
    <script src="../estrutura/js/jquery-3.4.1.js">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>