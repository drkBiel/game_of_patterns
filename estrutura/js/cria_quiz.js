$('#enunciado').hide();
$('#alternativas').hide();
$('#btnConcluir').hide();

let cont = 0;
let questao = 1;

$("#btnGerarQuestoes").click(function () {
    if ((parseInt($('#qtdQuestoes').val())) <= 10 && (parseInt($('#qtdQuestoes').val())) >= 2) {
        for (i = cont; i < parseInt($('#qtdQuestoes').val()); i++) {

            if (parseInt($("#qtdQuestoes").val()) > cont) {
                $("#btnProximo").show();
                $("#btnConcluir").hide();
            }
            cont += 1;

            //Criando um clone dos campos #enunciado e #alternativas
            let cloneEnunciado = $("#enunciado").clone();
            cloneEnunciado.addClass('enun_q' + (cont));

            let cloneAlternativas = $("#alternativas").clone();
            cloneAlternativas.addClass('alts_q' + (cont));

            //Adicionando as classes e os nomes das alternativas de cada questão
            cloneAlternativas.children().children().children('#div_alt_a').children(".col-sm-11").children().addClass('alt_a_q' + (cont));
            cloneAlternativas.children().children().children('#div_alt_a').children(".col-sm-11").children().attr("name", 'alt_a_q' + (cont));

            cloneAlternativas.children().children().children('#div_alt_b').children(".col-sm-11").children().addClass('alt_b_q' + (cont));
            cloneAlternativas.children().children().children('#div_alt_b').children(".col-sm-11").children().attr("name", 'alt_b_q' + (cont));

            cloneAlternativas.children().children().children('#div_alt_c').children(".col-sm-11").children().addClass('alt_c_q' + (cont));
            cloneAlternativas.children().children().children('#div_alt_c').children(".col-sm-11").children().attr("name", 'alt_c_q' + (cont));

            cloneAlternativas.children().children().children('#div_alt_d').children(".col-sm-11").children().addClass('alt_d_q' + (cont));
            cloneAlternativas.children().children().children('#div_alt_d').children(".col-sm-11").children().attr("name", 'alt_d_q' + (cont));

            cloneAlternativas.children().children().children('#div_alt_e').children(".col-sm-11").children().addClass('alt_e_q' + (cont));
            cloneAlternativas.children().children().children('#div_alt_e').children(".col-sm-11").children().attr("name", 'alt_e_q' + (cont));

            //Adicionando as classes da ação e da alternativa correta de cada questão
            cloneEnunciado.children('.d-flex').children().children('#alt_crt').addClass('alt_crt_q' + (cont));
            cloneEnunciado.children('.d-flex').children().children('#alt_crt').attr("name", 'alt_crt_q' + (cont));

            //Adiconando nome e classe no enunciado da questão
            cloneEnunciado.children('.row').children('.col-md-12').children().children().last().addClass("enun_alt_q" + cont);
            cloneEnunciado.children('.row').children('.col-md-12').children().children().last().attr("name", "enun_alt_q" + cont);


            cloneEnunciado.children(".form-group").children(".col-xs-2").children().attr("name", "qtd_alts_q" + cont);

            //Alterando o número da questão
            cloneEnunciado.children().children().children().children('#numQuestao').text(cont + "ª - Questão");

            $('.alt_e_q' + questao).parent().parent().hide();
            $('.alts_q' + questao).removeAttr("style");

            //Adicionando os clones à div da area das questões
            $('#areaQuestoes').append(cloneEnunciado);
            $('#areaQuestoes').append(cloneAlternativas);

            //Mostrando a 1ª Questão ao usuário
            if (cont == 1) {
                $('.enun_q' + (cont)).removeAttr('style');
            } else if (cont > 1) {
                $('.alt_e_q' + questao).parent().parent().hide();
            }
        }

    } else {
        if ((cont + $('#qtdQuestoes').val()) > 10) {
            alert("Quantidade de questões acima do permitido!");
        }

        if ((cont + $('#qtdQuestoes').val()) < 2) {
            alert("Quantidade de questões abaixo do permitido!");
        }

    }

});



$(document).on('click', '.btnGerarAlternativas', function () {
    //Capturando a quantidade de alternativas
    let numAlts = $('.enun_q' + questao).children(".form-group").children(".col-xs-2").children().val();

    if (numAlts >= 4 && numAlts <= 5) {
        $('.alts_q' + questao).removeAttr("style");
        $('.alt_e_q' + cont).parent().parent().hide();

        //Verificando a qtd de alternativas
        if (numAlts == 4) {
            $('.alt_e_q' + questao).parent().parent().hide();
        } else if (numAlts == 5) {
            $('.alt_e_q' + questao).parent().parent().show();
        }

    } else {
        if (numAlts < 4) {
            alert("Quantidade de alternativas abaixo do permitido!");
        }

        if (numAlts > 5) {
            alert("Quantidade de alternativas acima do permitido!");
        }
    }


});

$("#btnProximo").click(function () {
    if (questao + 1 <= cont) {
        $('.enun_q' + questao).hide();
        $('.alts_q' + questao).hide();

        questao += 1;

        $('.enun_q' + questao).show();
        $('.alts_q' + questao).show();
        $('.alt_e_q' + questao).parent().parent().hide();

        if (questao + 1 > cont) {
            $("#btnProximo").hide();
            $("#btnConcluir").show();
        }

    }
});

//Ativa a função do botão voltar
$("#btnVoltar").click(function () {
    if (questao > 1) {
        $('.enun_q' + questao).hide();
        $('.alts_q' + questao).hide();

        questao -= 1;

        $('.enun_q' + questao).show();
        $('.alts_q' + questao).show();

        if (questao + 1 <= cont) {
            $("#btnProximo").show();
            $("#btnConcluir").hide();
        }
    }
});

//Ativa a função do botão concluir
$("#btnConcluir").click(function () {
    let altsVazias = verificarAlternativas();
    let altCrtVazias = verificarAltsCrts();
    let enunciadosVazios = verificarEnunciados();

    if (altsVazias == 0 && altCrtVazias == 0 && enunciadosVazios == 0) {
        $("#formNovoQuiz").submit();
    }
});


//Verifica as alternativas de todas as questões
function verificarAlternativas() {
    let contAltsVazias = 0;
    let q = new Array(cont + 1);
    let mensagem = "Alternativas não preenchidas: ";
    for (let i = 1; i <= cont; i++) {

        let numAlts = $('.enun_q' + i).children(".form-group").children(".col-xs-2").children().val();
        q[i] = "\n      " + i + "ª Questão\n            ";

        let alt_a = $('.alt_a_q' + i).val();
        let alt_b = $('.alt_b_q' + i).val();
        let alt_c = $('.alt_c_q' + i).val();
        let alt_d = $('.alt_d_q' + i).val();

        if (alt_a == "") {
            q[i] += "a) ";
            contAltsVazias++;
        }

        if (alt_b == "") {
            q[i] += "b) ";
            contAltsVazias++;
        }

        if (alt_c == "") {
            q[i] += "c) ";
            contAltsVazias++;
        }

        if (alt_d == "") {
            q[i] += "d) ";
            contAltsVazias++;
        }

        if (numAlts == 5) {
            let alt_e = $('.alt_e_q' + i).val()

            if (alt_e == "") {
                q[i] += "e) ";
                contAltsVazias++;
            }
        }

        mensagem += q[i];
    }

    if (contAltsVazias > 0) {
        alert(mensagem);
    }

    return contAltsVazias;
}

//Verifica os campos da alternativas correta de todas as questões
function verificarAltsCrts() {
    let contAltCrtVazias = 0;
    let mensagem = "Alternativa correta não preenchida: \n      ";

    for (let i = 1; i <= cont; i++) {

        let alt_crt = $('.alt_crt_q' + i).val();

        if (alt_crt == "") {
            mensagem += i + "ª ";
            contAltCrtVazias++;
        }

    }

    if (contAltCrtVazias > 0) {
        alert(mensagem);
    }

    return contAltCrtVazias;
}

//Verifica os enunciados de todas as questões
function verificarEnunciados() {
    let contEnunVazios = 0;
    let mensagem = "Enunciados não preenchidos: \n      ";

    for (let i = 1; i <= cont; i++) {

        let enunciado = $(".enun_alt_q" + i).val();

        if (enunciado == "") {
            mensagem += i + "ª ";
            contEnunVazios++;
        }

    }

    if (contEnunVazios > 0) {
        alert(mensagem);
    }

    return contEnunVazios;
}

//Adaptação da ideia de Vinicius Bortoletto da comunidade da Allura
//Restringe o campo apenas a digitar letras de a-e 
function ApenasLetras(e, t) {
    try {
        if (window.event) {
            var charCode = window.event.keyCode;
        } else if (e) {
            var charCode = e.which;
        } else {
            return true;
        }
        if (charCode > 96 && charCode < 102)
        {
            return true;
        } else {
            return false;
        }
    } catch (err) {
        alert(err.Description);
    }
}