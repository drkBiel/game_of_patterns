<!DOCTYPE html>
<html>
    <head>
        <title>Game Of Partterns</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="shortcut icon" href="../img/favicon.png">
        <link rel="stylesheet" type="text/css" href="../estrutura/css/style.css">

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

                        <a href="ranking.php">
                            <button type="button" class="btn btn-info m-2">
                                Ranking <span class="badge badge-gradient"><img src="../img/ranking.png"></span> 
                            </button>
                        </a>

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
        <div  id="area" class="shadow-lg p-3 b-5 bg-light rounded mt-2">
            <div id="cabecalho">
                <div class="mt-2"><h1 align="center">Recupere Sua Senha</h1></div>
            </div>
            <div class="row">
                <div class="col-md-2" id="lado_esquerdo">
                    <div align="center">
                        <br>
                    </div>
                </div>

                <div class="col-md-4" id="lado_direito">

                    <div id="form">
                        <form class="form-group" action="" method="post">
                            <input type="hidden" name="acao" value="editar"> 
                            <label>E-mail:</label>
                            <input class="form-control" type="email" name="email" id="email">
                            <label>Nova senha:</label>
                            <input class="form-control" type="password" name="senha" id="senha">
                            <label>Confirme Senha:</label>
                            <input class="form-control" type="password" name="conf_senha" id="conf_senha">
                            <button type="submit" id="btnCad" class="btn btn-warning mt-2">
                                Recuperar
                            </button>

                        </form>
                    </div>

                    <div class="col-md-2" id="lado_esquerdo">
                        <div align="center">
                            <br>
                        </div>
                    </div>


                </div> <!-- Lado Direito -->
            </div> <!-- row -->
        </div> <!-- area -->

        <footer class="card text-center">
            <div class="card-footer">
                Entrega do dia 25 de Setembro de 2019.
            </div>
        </footer>


    </body>
    <script src="../estrutura/js/jquery-3.4.1.js">
        < script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity = "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin = "anonymous" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</html>
