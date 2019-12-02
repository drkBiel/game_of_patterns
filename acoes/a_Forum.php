<?php 
    session_start();
    if(count($_SESSION) > 0){ ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/inicial.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <form action="../view/forum.php" id="redirecionar" method="post">
        <input type='hidden' name='idQuiz' value="<?php echo $_POST['idQuiz']; ?>">
        <input type='hidden' name='idUser' value="<?php echo $_POST['idUser']; ?>">
    </form>

    <?php
        ob_start();
        require "../bd/bd.php";
        $bd = new BD();
        $conexao = $bd->conexao();
        
        $bd->inserirComentario($conexao, $_POST['idQuiz'], $_POST['idUser'], $_POST['comentario']);
        
        echo "<script language= 'JavaScript'> alert('Comentario adicionado.') </script>";
        echo '<script language= "JavaScript"> $("#redirecionar").submit(); </script>';
}else{
    echo "<script language= 'JavaScript'> alert('Erro, usuário não autenticado!') </script>";
    echo "<script language= 'JavaScript'> location.href='../index.php' </script>";

}
?>
