<?php 
  include "header.php";
 ?>
<body>
<header class="bg-gradient"> 
  <a href=""><img src="../img/logo.jpg" width="160" height="60"  class="position-absolute img-fluid"></a>
<ul class="nav justify-content-end form-inline">
  <li class="nav-item">
    <button type="button" class="btn btn-outline-info m-2">
      <span class="badge badge-light"><img src="img/inicio-icone.png"></span> Página Inicial
    </button> 

    <button type="button" class="btn btn-outline-info m-2">
      <span class="badge badge-light"><img src="img/adiciona-icone.png"></span> Criar Quiz
    </button>

    <button type="button" class="btn btn-outline-info m-2">
      <span class="badge badge-light"><img src="img/configuracao-icone.png"></span> Configurações
    </button>
  </li>
  </ul>
</header> 

<div class="row">
   <div class="col-3">
     <img src="../img/perfil.png" alt="perfil" class="rounded img-fluid">
   </div>  

   <div class="col-9">
     <h3 class="text-warning">Nome de usuario</h3>
    <div class="col-4 border border-warning rounded">
    <div class="card">
      <div class="card-body">
        <h5 class="text-info">Pontuação no Ranking</h5>
        <p><span class="badge badge-light">20</span></p>
      </div>
    </div>
  </div>
</div> <!-- col-9 -->
</div> <!-- row -->
<div class="row">
  <div class="col-3">
      
  </div>
  
  <div class="col-9">
   <h3 class="text-warning">Minhas Badges</h3>
  

  </div>
</div>
 <?php 
   include "foot.php"; 
 ?>