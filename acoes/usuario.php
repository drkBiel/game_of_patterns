<?php
    session_start();
    if(count($_SESSION) > 0){
        echo count($_SESSION);
        ob_start();
        require "../bd/bd.php";
        $bd = new BD();
        $conexao = $bd->conexao();
        
        $acao = $_POST['acao'];

        if($acao == "cadastrar"){
            //Dados do cadastro
            $nome = $_POST['cdNome'] ? $_POST['cdNome'] : ' ';
            $cdEmail = $_POST['cdEmail'] ? $_POST['cdEmail'] : ' ';
            $cdSenha = $_POST['cdSenha'] ? $_POST['cdSenha'] : ' ';
            $tpUsuario = $_POST['tpUser'] ? $_POST['tpUser'] : ' ';

            if($bd->verificarEmail($conexao, $_POST['cdEmail']) > 0){
                echo "<script language= 'JavaScript'> alert('Email já cadastrado!') </script>";
            }else{
                $bd->cadastrarUsuario($conexao, $nome, $cdEmail, $tpUsuario, $cdSenha);
                echo "<script language= 'JavaScript'> alert('Cadastro realizado com sucesso') </script>";
            }
            
            echo "<script language= 'JavaScript'> location.href='../' </script>";
            end();
        }

        else if ($acao == "sair") {
            session_start();
            session_destroy();
            header('Location: ../index.php');
            end();
        }
        
        else if($acao == "logar"){
            //Dados do login
            $lgEmail = $_POST['lgEmail'] ? $_POST['lgEmail'] : '';
            $lgSenha = $_POST['lgSenha'] ? $_POST['lgSenha'] : '';
            
            $qtdUsuario = $bd->verificarUsuario($conexao, $lgEmail, $lgSenha);
        
            //Armazena o dado do tipo do Usuario que vai ser logado;
            if ($qtdUsuario == 1) {
                session_start();
                $_SESSION['email'] = $lgEmail;
                
                header('Location: ../view/inicial.php');
                end();
                                
            }else{
                echo "<script language= 'JavaScript'> alert('Login e/ou senha incorretos!') </script>";
                echo "<script language= 'JavaScript'> location.href='../index.php' </script>";
                end();
            }
            
        }else if($acao == "editar"){
            $nome = $_POST['nome'] ? $_POST['nome'] : ' ';
            $email = $_POST['email'] ? $_POST['email'] : ' ';
            $senha = $_POST['senha'] ? $_POST['senha'] : ' ';
            $id = $_POST['id'];
            
            $bd->editarUsuario($conexao, $id, $nome, $email, $senha);
            
            $qtdUsuario = $bd->verificarUsuario($conexao, $email, $senha);
            
            if ($qtdUsuario == 1) {
                session_unset();
                session_start();

                $_SESSION['email'] = $email;
                
                echo "<script language= 'JavaScript'> alert('Dados alterados com sucesso') </script>";
                echo "<script language= 'JavaScript'> location.href='../view/conf_perfil.php' </script>";
                end();
                                    
            }
            
            
        }
}else{
    echo "<script language= 'JavaScript'> alert('Erro, usuário não autenticado!') </script>";
    echo "<script language= 'JavaScript'> location.href='../' </script>";
}
?>
