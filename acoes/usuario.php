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
    }
    
    
    else if($acao == "logar"){
        //Dados do login
        $lgEmail = $_POST['lgEmail'] ? $_POST['lgEmail'] : '';
        $lgSenha = $_POST['lgSenha'] ? $_POST['lgSenha'] : '';
        
        $lgUsuario = $bd->selecionarUsuario($conexao, $lgEmail, $lgSenha);

        //Armazena o dado do tipo do Usuario que vai ser logado;
        var_dump($lgUsuario);
        
        echo $lgUsuario;
        
        session_start();
        $_SESSION['nome'] = $lgUsuario['nome'];
                
        
    }
    


?>