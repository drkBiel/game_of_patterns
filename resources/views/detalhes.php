<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Detalhes do User</title>
    </head>
    <body>
        <h2>Detalhes do Usuário: <?php echo $p->name; ?> </h2>
        <ul>
            <li> <b>Email:</b> <?php echo $p->email; ?> </li>
            <li> <b>Usuário:</b>
                <?php
                    $tUser = ""; 
                    if ($p->tipoUsuario == '1') {
                        $tUser = "Aluno";
                    } else if($p->tipoUsuario == '2') {
                        $tUser = "Professor";
                    }
                    echo $tUser;
                ?> 
            </li>
        </ul>

    </body>
</html>