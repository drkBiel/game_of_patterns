<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../estrutura/css/style.css">
		<link rel="stylesheet" href="../estrutura/css/style.css" type="text/css"></head>
		<link rel="stylesheet" type="text/css" href="../estrutura/css/jquery.quiz.css" />
		<script src="../estrutura/js/cronometro.js"></script>
		<script>
			
		</script>
		
		<title>Responder Quiz</title>
	</head>

	<body onload="parar();">

		<header class="bg-light"> 
			<a href=""><img src="../img/logo.jpg" width="160" height="60"  class="position-absolute"></a>
			<ul class="nav justify-content-end form-inline">
			<li class="nav-item">
				<button type="button" class="btn btn-outline-info m-2">
				<span class="badge badge-light"><img src="../img/inicio-icone.png"></span> Página Inicial
				</button> 

				<button type="button" class="btn btn-outline-info m-2">
				<span class="badge badge-light"><img src="../img/adiciona-icone.png"></span> Criar Quiz
				</button>

				<button type="button" class="btn btn-outline-info m-2">
				<span class="badge badge-light"><img src="../img/configuracao-icone.png"></span> Configurações
				</button>
			</li>
			</ul>
		</header> 
		<div id="quiz-Pde1" style="margin -top:: 20%;">
			<div id="quiz-header">
				<h1>Quiz I - Padrões estruturais </h1>
				<br>
				<h3><span id="hora">00:</span><span id="minuto">00:</span><span id="segundo">00</span></h3><br>
				<br>
				<table align="center">
					<tr>
						<td> <p><a id="quiz-home-btn"><button class="btn btn-outline-warning" onclick="limpa()" style="width:110px"> Reiniciar </button></a></p> </td>
						<td width="200px">
							<div id="quiz-start-screen">
								<p><a href="#" id="quiz-start-btn" class=""> <button class="btn btn-outline-secondary" onclick="tempo(1);" style="width:110px"> Iniciar quiz </button> </a></p>
							</div>
						</td>
						<td> <p><a href="tInicial.php"><button class="btn btn-outline-danger" style="width:110px"> Sair </button></a></p> </td>
					</tr>
				</table>
				<br>
				<input type="hidden" id="parar"name="">
			</div>
			
		</div>

		<footer class="card text-center" style=" position:absolute; bottom:0;  width:100%;">
			<div class="card-footer">
				Entrega do dia 11 de Agosto de 2019.
			</div>
		</footer>
	</body>

	<!-- Scripts -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="../estrutura/js/jquery.quiz.js"></script>
	<script src="../quizzes/quiz-Padroes1.js"></script>
	


</html>