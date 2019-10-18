<!DOCTYPE html>
<html>
    <head>

      <title>Game Of Partterns</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="shortcut icon" href="../img/favicon.png">
      <link rel="stylesheet" type="text/css" href="../estrutura/css/cria_quiz.css">
    

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
    <!-- divisão -->
    <div class="m-4 position-absolute">
      <p><a href=""><strong>Voltar</strong></a></p>
    </div>
    <h1 align="center">Criação do Quiz</h1> <!-- Título -->
    <div  id="area" class="shadow-lg p-3 b-5 bg-light rounded mt-2">
      <div id="nomedoquiz" class="nav justify-content-center form-inline">
           <div id="form_quiz">
             Nome do Quiz: <input class="form-control" type="text">
             Número de Questões: <input class="form-control" type="number">
             <input type="button" class="btn btn-warning" value="Gerar">
           </div>
      </div>  
      <div id="questao">
         <h3>1 - Questão: </h3>
         <textarea placeholder="Escreva o conteúdo da questão ..." id="content_question"></textarea>
      </div>  
     <!-- Quantidade de alternativas -->
      <div class="mt-2 p-4" id="qtd_questao">
         <div class="row">
           <div class="col-md-6">
             <label>Número de Alternativas:</label>
             <input id="num_q" class="mt-2" type="number" name="">
             <input type="button" class="btn btn-warning" value="Gerar">
             <form class="form-group">
               <label>a)</label>
               <input class="form-control" type="text" name="">
               <label>b)</label>
               <input class="form-control" type="text" name="">
               <label>c)</label>
               <input class="form-control" type="text" name="">
               <label>d)</label>
               <input class="form-control" type="text" name="">
               <label>e)</label>
               <input class="form-control" type="text" name="">
             </form>
           </div> <!-- col 6 -->
           <div class="col-md-6">
             <label>Informe a alternativa correta:</label>
             <input id="alt_c"  type="text" placeholder="a - e" name="">
           </div>
         </div>
      </div>
      </div> <!-- area -->
      
   

    <footer class="card text-center">
      <div class="card-footer">
        Entrega do dia 25 de Setembro de 2019.
      </div>
    </footer>


    </body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>