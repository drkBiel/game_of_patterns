

<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="estrutura/css/style.css">
</head>

  
  <body>

  <header class="bg-gradient">
    <a href=""><img src="img/logo.jpg" width="160" height="60"  class="position-absolute img-fluid"></a>
    <ul class="nav justify-content-end form-inline">
        
        <form method="post" action="acoes/usuario.php" class="nav-item form-group">
          <div class="nav-item form-group">
            <label class="mr-sm-2">Email:</label>
            <input class="form-control m-1 mr-sm-2" type="email" name="lgEmail">
          </div>
      
          <div class="nav-item form-group">
            <label class="mr-sm-2">Senha:</label>
            <input class="form-control m-2 mr-sm-2" type="password" name="lgSenha" >  
          </div>
          
          <input type="hidden" name="acao" value="logar">

          <div class="nav-item form-group">
            <input class="btn btn-warning mr-2" type="submit" name="" value="Entrar">
          </div>

        </form>
        
        
    
    </ul>
  </header>
<!-- Logo -->
<hr> <!-- Linha -->
<div class="row">
    <div class="col-md-6">
      <br><br>
    <div class="container">
      <div class="jumbotron bg-light">
        <h1 class="display-4"><strong>Bem Vindo!</strong></h1>
        <p class="lead">Junte a nós e aprenda da melhor forma possível os <strong>padrões de projetos</strong> mais populares</p>
        <hr class="my-4">
        <p class="lead">Aqui você aprende junto com vários outros estudantes. Além disso, pode ainda avaliar seu rendimento e interagir com colegas através de ranking e nosso fórum!</p>
        <p>
          <input class="btn btn-info" value="Saiba mais" type="button" name="">
        </p>
      </div>
    </div>  
  </div>

<!-- form cadastro -->
  <div class="col-md-6">
    <div class="container"><br><br>
      <h3 align="center">Primeira vez no Game Of Patterns?</h3>
      <h6 align="center">Cadastre-se, é rápido e fácil</h6><br>
      <form class="row" id="formCad" action="acoes/usuario.php" method="post">
        <div class="form-group col-md-12">
          <label>Nome:</label>
          <input type="text" class="form-control col-md-10" placeholder="Nome" name="cdNome" id="cdNome" required="Insira o email">
        </div>

        <div class="form-group col-md-12">
          <label>Endereço de email:</label>
          <input type="email" class="form-control col-md-10" id="cdEmail" placeholder="Email" name="cdEmail" required>
        </div>
  
        <div class="form-group col-md-12">
          <label>Senha:</label>
          <input type="password" class="form-control col-md-10" id="cdSenha" placeholder="Escolha uma senha" name="cdSenha" id="cdSenha" required="Insira a senha">
        </div>

        <div class="form-group col-md-12">
          <label>Confirmar senha:</label>
          <input type="password" class="form-control col-md-10" placeholder="Confirme sua senha" id="conf_senha" required="Confirme a senha">
        </div>

        <input type="hidden" name="acao" value="cadastrar" required="Confirme a senha">
   
        <div class="form-group col-md-12">
          <label>Eu sou:</label><br>
          <input type="radio" name="tpUser" value="2" required>
          <label>Professor</label>
          <input type="radio" name="tpUser" value="1" required="required">
          <label>Aluno</label>
          <br>
        </div>

        <div align="center" class="form-group col-md-12">
          <input type="submit" class="btn btn-warning col-md-6" id="btnCad" value="Inscreva - me">
        </div>


        
      </form>
    </div>
  </div>
</div>
<!-- Rodapé -->
<footer class="card text-center">

  <div class="card-body">
  	<h5 class="card-title text-warning">Aceitamos Sugestões</h5>
  	<p>Toda contribuição será bem vinda</p>
  	<a href="login.php" class="btn btn-light">Voltar Ao Topo</a>
  </div>
  <div class="card-footer">
  	Entrega do dia 11 de Agosto de 2019.
  </div>
</footer>
  
</body>

<script src="estrutura/js/jquery-3.4.1.js">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>
  $('#btnCad').click(function(event) {
    if($('#cdSenha').val() != $('#conf_senha').val()){
      alert( "Senhas incompativeis" );   
      event.preventDefault();
    }
          
  });

</script>
