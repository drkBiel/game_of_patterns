<?php
    ob_start();
    echo "1 - Erro";
    require "../bd/bd.php";
    echo "1.1 - Erro";
    $bd = new BD();
    echo "1.1.1 - Erro";
    $conexao = $bd->conexao();
    echo "1.2 - Erro";
    
    $acao = $_POST['acao'];
    echo "1.3 - Erro";

    if($acao == "cadastrar"){
        echo "2 - Erro";
        //Dados do cadastro
        $nome = $_POST['cdNome'] ? $_POST['cdNome'] : ' ';
        $cdEmail = $_POST['cdEmail'] ? $_POST['cdEmail'] : ' ';
        $cdSenha = $_POST['cdSenha'] ? $_POST['cdSenha'] : ' ';
        $tpUsuario = $_POST['tpUser'] ? $_POST['tpUser'] : ' ';

        $bd->cadastrarUsuario($conexao, $nome, $cdEmail, $tpUsuario, $cdSenha);

        header('Location: ../index.php');
        end();
    }

    else if ($acao == "sair") {
        echo "3 - Erro";
        session_start();
        session_destroy();
        header('Location: ../index.php');
        end();
    }
    
    else if($acao == "logar"){
        //Dados do login
        echo "4 - Erro";
        $lgEmail = $_POST['lgEmail'] ? $_POST['lgEmail'] : '';
        $lgSenha = $_POST['lgSenha'] ? $_POST['lgSenha'] : '';
        
        $qtdUsuario = $bd->verificarUsuario($conexao, $lgEmail, $lgSenha);
       
        //Armazena o dado do tipo do Usuario que vai ser logado;
        if ($qtdUsuario == 1) {
            echo "5 - Erro";
            session_start();
            $_SESSION['email'] = $lgEmail;
            header('Location: ../view/inicial.php');
                            
        }else{
            echo "6 - Erro";
            header('Location: ../index.php');
            end();
        }
        
    }else if($acao == "editar"){
        echo "7 - Erro";
        $nome = $_POST['nome'] ? $_POST['nome'] : ' ';
        $email = $_POST['email'] ? $_POST['email'] : ' ';
        $senha = $_POST['senha'] ? $_POST['senha'] : ' ';
        $id = $_POST['id'];
        
        $bd->editarUsuario($conexao, $id, $nome, $email, $senha);
        
        $qtdUsuario = $bd->verificarUsuario($conexao, $email, $senha);
        
        if ($qtdUsuario == 1) {
            echo "8 - Erro";
            session_unset();
            session_start();

            $_SESSION['email'] = $email;
            
            header('Location: ../view/conf_perfil.php');
            end();
                                
        }
        
        
    }
    ob_end_flush();


?>
