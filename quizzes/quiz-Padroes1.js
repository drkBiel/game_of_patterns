

$('#quiz-Pde1').quiz({
    //resultsScreen: '#results-screen',
    //counter: false,
    //homeButton: '#custom-home',
    restartButtonText: "Reiniciar",
    
    counterFormat: "<hr>  <h2 class='bg-light' style='color: #fa7202;'> Questão %current de %total </h2>  <hr>",
    
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
        'correctResponse': 'Resposta correta.',
        'incorrectResponse': 'Resposta errada.',
        'points': 5
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
        'correctResponse': 'Resposta correta.',
        'incorrectResponse': 'Resposta errada.',
        'points': 5
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
        'correctResponse': 'Resposta correta.',
        'incorrectResponse': 'Resposta errada.',
        'points': 5
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
        'correctResponse': 'Resposta correta.',
        'incorrectResponse': 'Resposta errada.',
        'points': 5
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
        'correctResponse': 'Resposta correta.',
        'incorrectResponse': 'Resposta errada.',
        'points': 5
    }
    ]
});