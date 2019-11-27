<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php
        require "../estrutura/header.php";
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

    </head>
    <body>
        <!-- divisão -->
        <h1 align="center">Ranking Geral</h1>
        <div  id="area" class="shadow-lg p-3 b-5 bg-light rounded mt-2">
            <div id="quadro">
                <table class="table " align="center" id="tabela_ranking">
                    <thead>
                        <tr>
                            <th>Ranking</th>
                            <th>Nome de usuário</th>
                            <th>Pontuação</th>
                        </tr>
                    </thead>
                    <?php
                    $ranking = $bd->montarRanking($conexao);
                     echo '<tr>';
                        echo '<td> <i><img src="../img/1.png"></i>' . (string) (1) . ' º</td>';
                        echo '<td>' . $ranking[$i]['nome'] . '</td>';
                        echo '<td>' . number_format($ranking[$i]['pont'], 2, '.', '') . '</td>';
                        echo '</tr>';
                    for ($i = 0; $i < count($ranking); $i++) {
                        echo '<tr>';
                        echo '<td>' . (string) ($i + 2) . ' º</td>';
                        echo '<td>' . $ranking[$i]['nome'] . '</td>';
                        echo '<td>' . number_format($ranking[$i]['pont'], 2, '.', '') . '</td>';
                        echo '</tr>';
                    }
                    ?>

                </table>
            </div>
        </div> <!-- area -->

      

        <footer class="card text-center">
           
        </footer>


    </body>
    <script src="../estrutura/js/jquery-3.4.1.js"></script>
    <script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity = "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin = "anonymous" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>
