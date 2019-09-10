<?php  
 include "header.php";
?>


<body> 
<header class="bg-gradient">
  <a href=""><img src="img/logo.jpg" width="160" height="60"  class="position-absolute"></a>
<ul class="nav justify-content-end form-inline">
  <div class="nav-item form-group">
   <label class="mr-sm-2 text-warning">Email:</label>
   <input class="form-control m-2 mr-sm-2" type="email" name="email">
   </div>
   <div class="nav-item form-group">
   <label class="text-warning mr-sm-2">Senha:</label>
   <input class="form-control m-2 mr-sm-2" type="password" name="senha">  
   </div>
   <div class="nav-item form-group">
   	 <input class="btn btn-outline-warning mr-2" type="button" name="" value="Entrar">
   </div>
</ul>
</header>
<!-- Logo -->

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
   	 		<input class="btn btn-outline-primary" value="Saiba mais" type="button" name="">
   	 	</p>
   	 </div>
  </div>  
</div>
<!-- form cadastro -->
  <div class="col-md-6">
    <div class="container"><br><br>
      <h3 align="center">Primeira vez no Game Of Patterns?</h3>
      <h6 align="center">Cadastre-se, é rápido e fácil</h6><br>
<form class="row">
  <div class="form-group col-md-12">
    <label>Endereço de email:</label>
    <input type="email" class="form-control col-md-10" id="exampleInputEmail1" placeholder="Email">
  </div>
  
  <div class="form-group col-md-12">
    <label>Senha:</label>
    <input type="password" class="form-control col-md-10" placeholder="Escolha uma senha">
  </div>

  <div class="form-group col-md-12">
    <label>Senha:</label>
    <input type="password" class="form-control col-md-10" placeholder="Confirme sua senha">
   </div>
   
   <div class="form-group col-md-12">
     <label>Eu sou:</label><br>
     <input type="radio" name="professor">
     <label>Professor</label>
     <input type="radio" name="aluno">
     <label>Aluno</label>
     <br>
   </div>
  <div align="center" class="form-group col-md-12">
    <button type="submit" class="btn btn-outline-warning col-md-6">Inscreva - me</button>
  </div>

  <div align="center" class="form-group col-md-12">
    <button type="submit" class="btn btn-outline-primary col-md-6">Entre com o Facebook</button>
  </div>

  <div align="center" class="form-group col-md-12">
    <button type="submit" class="btn btn-outline-danger col-md-6">Entre com o Google</button>
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

<?php 
   include "foot.php";
?>