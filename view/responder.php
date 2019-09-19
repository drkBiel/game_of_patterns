<?php
   include "header.php"; 
 ?>
<body>
<header class="bg-light"> 
  <a href=""><img src="img/logo.jpg" width="160" height="60"  class="position-absolute"></a>
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
 



<div class="container mt-4">
<div id="quiz" align="center">
  <div id="quiz-header">
  	<hr>
    <h1 class="bg-light">Quiz I - Padrões estruturais </h1>
    <p><a id="quiz-home-btn" class="btn btn-outline-warning">Home</a></p>
  </div>
 <div id="quiz-start-screen">
    <p><a href="#" id="quiz-start-btn" class="quiz-button">Start</a></p>
 </div>
</div>
 
<div class="progress">
   <div class="progress-bar progress-bar-striped bg-info" role="progress-bar" style=" width:10%" aria-valuenow="1" aria-valuemin="1" aria-valuemax="10">
	</div>
 </div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
			<script src="../estrutura/js/jquery.quiz-min.js"></script>
			<script>
				$('#quiz').quiz({
					//resultsScreen: '#results-screen',
					//counter: false,
					//homeButton: '#custom-home',
					counterFormat: "Questão %current de %total",
					questions: [
					{
						'q': '1 - Em relação ao padrão Adapter, é correto afirmar? ',
						'options': [
						'a) a classe Adapter do padrão pode ser implementada através de herança múltipla (em linguagens que suportam esse mecanismo).',
						'b) ele adapta duas classes diferentes, de forma que tenham o mesmo conjunto de métodos de chamada.',
						'c) é útil utilizá-lo quando se precisa adaptar o comportamento de uma classe em tempo de execução.',
						'd) não há mecanismos de polimorfismo no padrão. Ele possui apenas agregações como forma de adaptação.'
						],
						'correctIndex': 0,
						'correctResponse': 'Custom correct response.',
						'incorrectResponse': 'Custom incorrect response.'
					},
					{
						'q': '2 - O conjunto que representa padrões de projeto estruturais é:',
						'options': [
						'a) Builder, AbstractFactory e Singleton.',
						'b) Observer, Proxy e Decorator.',
						'c) State, Adapter e Iterator.',
						'd) Bridge, Composite e Façade.'
						],
						'correctIndex': 3,
						'correctResponse': 'Custom correct response.',
						'incorrectResponse': 'Custom incorrect response.'
					},
					{
						'q': '3 - Que padrão de design pode ser usado para permitir que uma implementação específica e uma hierarquia de abstrações possa variar independentemente?',
						'options': [
						'a) Adapter',
						'b) Proxy',
						'c) Façade',
						'd) Bridge',
						'e) Flyweight'
						],
						'correctIndex': 2,
						'correctResponse': 'Custom correct response.',
						'incorrectResponse': 'Custom incorrect response.'
					},
					{
						'q': '4 - Que padrão de design abaixo pode ser utilizado quando existe a necessidade de lidar com uma grande quantidade de objetos e a possibilidade de se reutilizar instâncias para tornar mais eficiente a utilização de recursos (por exemplo, na implementação de um cache)?',
						'options': [
						'a) Adapter',
						'b) Proxy',
						'c) Façade',
						'd) Bridge',
						'e) Flyweight'
						],
						'correctIndex': 1,
						'correctResponse': 'Custom correct response.',
						'incorrectResponse': 'Custom incorrect response.'
					},
					{
						'q': '5 - Qual das situações abaixo é o cenário típico onde poderia ser utilizado um Façade?',
						'options': [
						'a) Um cliente precisa de uma interface que é diferente da interface fornecida pela classe existente.',
						'b) Um cliente precisa de uma interface idêntica à da classe existente mas não tem acesso direto a ela.',
						'c) Um cliente precisa de uma interface que simplifique o acesso a uma hierarquia de classes',
						'd) Um cliente precisa de uma interface que retorne uma única instância de uma classe existente',
						'e) Um cliente precisa ser notificado sobre alterações no estado de objetos'
						],
						'correctIndex': 3,
						'correctResponse': 'Custom correct response.',
						'incorrectResponse': 'Custom incorrect response.'
					}
					]
				});
			</script>
		</div>
		</div>

		<footer class="card text-center">
			<div class="card-footer">
				Entrega do dia 11 de Agosto de 2019.
			</div>
		</footer>
	</body>
</html>