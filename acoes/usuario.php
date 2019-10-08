<?php 
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

        $bd->cadastrarUsuario($conexao, $nome, $cdEmail, $tpUsuario, $cdSenha);

        header('Location: ../index.php');
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
            
            header('Location: ../view/conf_perfil.php');
                                
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
            
            header('Location: ../view/conf_perfil.php');
                                
        }
        
        
    }
    


?>