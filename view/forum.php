<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <?php
        require "../estrutura/header.php"; 
        if(count($_SESSION) == 0){
            echo "<script language= 'JavaScript'> alert('Erro, usuário não autenticado!') </script>";
            echo "<script language= 'JavaScript'> location.href='../' </script>";
        }

        
        $quiz = $bd->selecionarQuiz($conexao,$_POST['idQuiz']);

        $user = $bd->selecionarUsuarioID($conexao, $quiz[0]['id_User']);
        $criador = !($user) ? "Equipe Game of Patterns" : $user[0]['nome'];


        ?>
        <title>Fórum</title>
        <meta charset="ISO-8859-15">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="shortcut icon" href="../img/favicon.png">
        <link rel="stylesheet" type="text/css" href="../estrutura/css/forum.css">



    </head>
    <body>

      
        <h1 align="center"> <?php echo $quiz[0]['nome']; ?> </h1>
        <h6 align="center"><?php echo "Criado por: ". $criador; ?></h6>
        <div  id="area">

            <div align="center" style="margin-top: 3%; margin-bottom: 1%;"><!-- Adicionar comentário -->
                <button type="button" class="btn btn-info m-2" data-toggle="modal" data-target="#exampleModal">
                    Adicionar Comentário
                </button>
            </div>

            <div id="quadro">
                <?php
                
                $comentario = $bd->selecionarComentarios($conexao, $_POST['idQuiz']);
                for ($i=0; $i < count($comentario); $i++) {
                  $user = $bd->selecionarUsuarioID($conexao, $comentario[$i]['idUser']); ?>  
                  
                  <span class="badge badge-gradient"><img src="../img/perfil-icone.png"></span><label class="label_quiz"> <?php echo $user[0]['nome']  ?> </label>
                  <div placeholder="Escreva o conteúdo da questão ..." id="comentario" style="margin-bottom: 2%;"><p class="comentario" style="margin-top:1%;"> <?php echo $comentario[$i]['comentario']; ?> </p></div>
                  
                <?php } ?>
            </div>

        </div> <!-- area -->

        <footer class="card text-center">
            <div class="card-footer">

            </div>
        </footer>

        <!-- Modal -->
        <form action="../acoes/a_Forum.php" method="post">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header d-flex justify-content-center">
                            <h4 class="modal-title" id="exampleModalLabel" >Comentário</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <textarea name="comentario" id="" cols="30" rows="10"  placeholder="Insira aqui o seu comentário" class="form-control" style="width:100%;" required=""></textarea>
                            <input type='hidden' name='idQuiz' value="<?php echo $_POST['idQuiz']; ?>">
                            <input type='hidden' name='idUser' value="<?php echo $usuario[0]['id']; ?>">
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-success" >Comentar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </body>

    <script src="../estrutura/js/jquery-3.4.1.js">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>