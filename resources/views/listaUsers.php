<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="/css/app.css" rel="stylesheet">
        <title>Document</title>
    </head>
    
    <body>
    <br><br>
        <h2 align="center"> Lista de usuários </h2>
        <br>
        <table class="table table-stripedtable-bordered table-hover">
            <thead align="center">
                <td> <b>Nome </td>
                <td> <b>Email </td>
                <td> <b>Usuário </td>
            </thead>
            <?php foreach ($users as $p): ?>
                <tr>
                    <td><?php echo $p->name; ?> </td>
                    <td><?php echo $p->email ?> </td>
                    <td> <?php
                        $tUser = ""; 
                        if ($p->tipoUsuario == '1') {
                            $tUser = "Aluno";
                        } else if($p->tipoUsuario == '2') {
                            $tUser = "Professor";
                        }
                         echo $tUser ?> 
                    </td>
                    <td>
                        <a href="/users/dados/<?php echo $p->id;?>">
                            Visualizar
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    
    </body>
</html>