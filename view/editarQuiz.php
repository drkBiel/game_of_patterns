<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php
        if(count($_SESSION) == 0){
            echo "<script language= 'JavaScript'> alert('Erro, usuário não autenticado!') </script>";
            echo "<script language= 'JavaScript'> location.href='../' </script>";
        
        }
        require "../estrutura/header.php";
        $bd = new BD();
        $conexao = $bd->conexao();

        $questoes = $bd->selecionarQuestoes($conexao,$_POST['idQuiz']);
        $quiz = $bd->selecionarQuiz($conexao,$_POST['idQuiz']);

        $hqr = $bd->selecionarHQRUsuario($conexao, $usuario[0]['id']);
        ?>
        <title>Ranking</title>
        <meta charset="ISO-8859-15">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="shortcut icon" href="../img/favicon.png">
        <link rel="stylesheet" type="text/css" href="../estrutura/css/ranking.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body onload="verificarQuestoes()">
        <!-- divisão -->
        <h1 align="center">Questões</h1>
        
        <h4> 
            <form action="../acoes/quiz.php" method="post" style="margin-top: 1%; margin-bottom: 1%; ">
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" name="nome" style="width: 50%; margin-left: 75%; text-align:center" value="<?php echo $quiz[0]['nome']; ?>" required="">
                    </div>

                    <div class="col">
                        <input class="btn btn-info" type="submit" value="Alterar nome"  style="margin-left: 25%;">
                    </div>

                    <input type="hidden" name="idUser" value="<?php echo $usuario[0]['id']; ?>">
                    <input type="hidden" name="idQuiz" value="<?php echo $quiz[0]['id_Quiz']; ?>">
                    <input type="hidden" name="acao" value="editar">
                
                </div>
            </form>

            <div class="form-row">
                <div class="col">
                    <button class="btn btn-info" style="margin-left: 47%; margin-top: 1%;"
                    id="addQuestao" >
                        <i class="fa fa-plus"></i> Questão 
                    </button>
                </div>
            </div>
                
                
                
            
        </h4>
        <div  id="area" class="shadow-lg p-3 b-5 bg-light rounded mt-2">
            <div id="quadro">
            <h5>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Questão</th>
                            <th scope="col">Enunciado</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i=0; $i < count($questoes); $i++) { ?>
                        
                            <tr>
                                <td><?php echo ($i+1). "ª"; ?></td>
                                <td><?php echo substr($questoes[$i]['enunciado'], 0, 50); ?></td>
                                <td> 
                                    <a href="#" data-toggle="modal" data-target="#modalEdit<?php echo $i;?>"><i class="fa fa-edit"></i> </a> &nbsp
                                    <a href="#" onclick="delQuestao(<?php echo ($i+1) . ', ' . $questoes[$i]['idPerg'];?>)"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>

                            
                            <form action="../acoes/quiz.php" id="frmExcluir<?php echo $questoes[$i]['idPerg'];?>" method="post">
                                <input type="hidden" name="acao" value="excluirQuestao">
                                <input type="hidden" name="idQuiz" value="<?php echo $_POST['idQuiz'];?>">
                                <input type="hidden" name="idPerg" value="<?php echo $questoes[$i]['idPerg'];?>">
                            </form>


                            <!-- Modal -->
                            <form action="../acoes/quiz.php" method="post">
                                <div class="modal fade" id="modalEdit<?php echo $i; ?>" aria-labelledby="exampleModalLabel"  style="color:black;">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header" >
                                            <h3 class="modal-title" style="margin-left:35%;"> <?php echo ($i+1); ?>ª - Questão </h3>
                                           
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        
                                        <div class="modal-body">
                                            
                                            <textarea name="enun_alts_q<?php echo $questoes[$i]['idPerg'];?>" class="form-control" id="content_question" style="width: 90%; height:200px; margin-left: 5%;" required=""><?php echo $questoes[$i]['enunciado'];?></textarea>
                                            
                                            <input type="hidden" name="acao" value="editarQuestao">
                                            <input type="hidden" name="idPerg" value="<?php echo $questoes[$i]['idPerg'];?>">
                                            <input type="hidden" name="idQuiz" value="<?php echo $_POST['idQuiz'];?>">
                                            <input type="hidden" name="questao<?php echo $questoes[$i]['idPerg']; ?>" value="<?php echo $questoes[$i]['idPerg'];?>">
                                            
                                            <div class="form-row" style="margin-top: 4%; margin">
                                                
                                                <div class="col">
                                                    <label for="" style="margin-left: 35%;">Alternativa correta: &nbsp</label> 
                                                </div>
                        
                                                <div class="col">
                                                    <input id="alt_crt" class="form-control" type="text" placeholder=" a - e"
                                                    name="alt_crt_q<?php echo $questoes[$i]['idPerg']; ?>" value="<?php echo $questoes[$i]['crt'] ?>"
                                                    style="text-align:center; width: 40%; margin-left:3%;" onkeypress="return ApenasLetras(event,this);" maxlength="1" required="">
                                                </div>
                                            
                                            </div>
                                            

                                            <div class="container" id="container_q<?php echo $questoes[$i]['idPerg']; ?>" style="margin-left:2%; margin-top:3%;">
                                                <div class="row" id="div_alt_a">
                                                    <div class="col-sm-1" align="right" style="margin-right:0%;">
                                                        <label>a)</label>
                                                    </div>

                                                    <div class="col-sm-11">
                                                        <input class="form-control" id="alt_a"  type="text" name="alt_a_q<?php echo $questoes[$i]['idPerg'];?>" style="width: 92%;" value="<?php echo $questoes[$i]['a']; ?>" required="">
                                                    </div>
                                                        
                                                </div>    

                                                <div class="row" id="div_alt_b" style="margin-top:2%;">
                                                    <div class="col-sm-1" align="right" style="margin-right:0%;">
                                                        <label>b)</label>
                                                    </div>

                                                    <div class="col-sm-11">
                                                        <input id="alt_b" class="form-control" type="text" name="alt_b_q<?php echo $questoes[$i]['idPerg'];?>"  style="width: 92%;" value="<?php echo $questoes[$i]['b']; ?>" required="">
                                                    </div>
                                                </div>    

                                                <div class="row" id="div_alt_c" style="margin-top:2%;">
                                                    <div class="col-sm-1" align="right" style="margin-right:0%;">
                                                        <label>c)</label>
                                                    </div>

                                                    <div class="col-sm-11">
                                                        <input id="alt_c"  class="form-control" type="text" name="alt_c_q<?php echo $questoes[$i]['idPerg'];?>"  style="width: 92%;" value="<?php echo $questoes[$i]['c']; ?>" required="">
                                                    </div>

                                                        

                                                </div>    

                                                <div class="row" id="div_alt_d" style="margin-top:2%;">
                                                    <div class="col-sm-1" align="right" style="margin-right:0%;">
                                                        <label>d)</label>
                                                    </div>

                                                    <div class="col-sm-11">
                                                        <input id="alt_d"  class="form-control" type="text" name="alt_d_q<?php echo $questoes[$i]['idPerg'];?>"  style="width: 92%;" value="<?php echo $questoes[$i]['d']; ?>" required="">
                                                    </div>
                                                </div>    

                                                <div class="row" id="div_alt_e<?php echo $questoes[$i]['idPerg']; ?>" style="margin-top:2%;">
                                                    <div class="col-sm-1" align="right" style="margin-right:0%;">
                                                        <label>  e)</label>
                                                    </div>

                                                    <div class="col-sm-11">
                                                        <input id="alt_e"  class="form-control" type="text" name="alt_e_q<?php echo $questoes[$i]['idPerg'];?>" style="width: 92%;" value="<?php echo $questoes[$i]['e']; ?>" required="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row" id="div_acao_e" style="margin-top:2%; margin-left:47%;">
                                                <h3>
                                                    <div class="col-sm-12">
                                                        <a href="#" id="del_alt_e<?php echo $questoes[$i]['idPerg']; ?>" onclick="delAlternativa(<?php echo $questoes[$i]['idPerg']; ?>);"><i class="fa fa-times-circle" style="margin-left:0%;"></i></a>
                                                        <a href="#" id="add_alt_e<?php echo $questoes[$i]['idPerg']; ?>" onclick="addAlternativa(<?php echo $questoes[$i]['idPerg']; ?>);" style="display:none;"><i class="fa fa-plus-circle" style="margin-left:0%;"></i></a>
                                                    </div>
                                                </h3>
                                            </div> 
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Cofirmar</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php } ?>
                        
                    </tbody>
                </table>
            </h5>
            </div>
        </div> <!-- area -->
        
        

        <footer class="card text-center">
            <div class="card-footer">
                Entrega do dia 25 de Setembro de 2019.
            </div>
        </footer>
        
        <form action="../acoes/quiz.php" method="post">
            <div class="modal fade" id="modalCadastrar" aria-labelledby="exampleModalLabel"  style="color:black;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" style="margin-left:27%;"> Adicionar questão </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">

                        <label for="" style="margin-left: 42%">Enunciado </label> 
                        <textarea name="enun_alts_q" class="form-control" id="content_question" style="width: 90%; height:200px; margin-left: 5%;" required=""></textarea>
                        
                        <div class="form-row" style="margin-top: 4%; margin">
                                                
                            <div class="col">
                                <label for="" style="margin-left: 40%;">Alternativa correta: &nbsp</label> 
                            </div>

                            <div class="col">
                                <input id="alt_crt" class="form-control" type="text" placeholder=" a - e"
                                name="alt_crt_q" style="text-align:center; width: 40%; margin-left:3%;"
                                onkeypress="return ApenasLetras(event,this);" maxlength="1" required="">
                            </div>
                        
                        </div>
                        
                        <input type="hidden" name="idQuiz" value="<?php echo $_POST['idQuiz'];?>">
                        <input type="hidden" name="acao" value="adicionarQuestao">
                                    
                        

                        <div class="container" id="container_q0" style="margin-left:2%; margin-top:2%;">
                            <div class="row" id="div_alt_a">
                                <div class="col-sm-1" align="right" style="margin-right:0%;">
                                    <label>a)</label>
                                </div>

                                <div class="col-sm-11">
                                    <input class="form-control" id="alt_a"  type="text" name="alt_a_q" style="width: 92%;" required="">
                                </div>
                                    
                            </div>    

                            <div class="row" id="div_alt_b" style="margin-top:2%;">
                                <div class="col-sm-1" align="right" style="margin-right:0%;">
                                    <label>b)</label>
                                </div>

                                <div class="col-sm-11">
                                    <input id="alt_b" class="form-control" type="text" name="alt_b_q"  style="width: 92%;" required="">
                                </div>
                            </div>    

                            <div class="row" id="div_alt_c" style="margin-top:2%;">
                                <div class="col-sm-1" align="right" style="margin-right:0%;">
                                    <label>c)</label>
                                </div>

                                <div class="col-sm-11">
                                    <input id="alt_c"  class="form-control" type="text" name="alt_c_q"  style="width: 92%;" required="">
                                </div>

                                    

                            </div>    

                            <div class="row" id="div_alt_d" style="margin-top:2%;">
                                <div class="col-sm-1" align="right" style="margin-right:0%;">
                                    <label>d)</label>
                                </div>

                                <div class="col-sm-11">
                                    <input id="alt_d"  class="form-control" type="text" name="alt_d_q"  style="width: 92%;" required="">
                                </div>
                            </div>    

                            <div class="row" id="div_alt_e0" style="margin-top:2%;">
                                <div class="col-sm-1" align="right" style="margin-right:0%;">
                                    <label>e)</label>
                                </div>

                                <div class="col-sm-11">
                                    <input id="alt_e"  class="form-control" type="text" name="alt_e_q" style="width: 92%;" required="">
                                </div>
                            </div>

                               
                        </div>

                        <div class="row" id="div_acao_e" style="margin-top:2%; margin-left:47%;">
                            <h3>
                                <div class="col-sm-12">
                                    <a href="#" id="del_alt_e0" onclick="delAlternativa(0);"><i class="fa fa-times-circle" style="margin-left:0%;"></i></a>
                                    <a href="#" id="add_alt_e0" onclick="addAlternativa(0);" style="display:none;"><i class="fa fa-plus-circle" style="margin-left:0%;"></i></a>
                                </div>
                            </h3>
                        </div>
                        
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Div alt e) base -->
        <div class="row" id="div_alt_e0" style="margin-top:2%; display:none;">
            <div class="col-sm-1" align="right" style="margin-right:0%;">
                <label> e)</label>
            </div>

            <div class="col-sm-11">
                <input id="alt_e"  class="form-control" type="text" name="alt_e_q" style="width: 92%;">
            </div>
        </div>
        
    </body>
    <script src="../estrutura/js/jquery-3.4.1.js"></script>
    <script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity = "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin = "anonymous" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>
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
    function delQuestao(numQuestao, idPerg) {
        let resp = confirm("Deseja excluir a "+ numQuestao + "ª Questão?");
        if (resp == 1){
            alert(1);
            $("#frmExcluir"+idPerg).submit();
        }
    }

    function delAlternativa(idQuestao) {
        let resp = confirm("Deseja excluir a alternativa: e)?")
        if (resp == 1) {
            $("#div_alt_e"+idQuestao).remove();    
        }

        $("#del_alt_e"+idQuestao).hide();
        $("#add_alt_e"+idQuestao).show();
    }

    function addAlternativa(idQuestao) {
        $("#div_alt_e0").show();
        let cloneAlternativa = $("#div_alt_e0").clone();
        $("#div_alt_e0").hide();

        cloneAlternativa.attr("id","div_alt_e"+idQuestao);

        $("#container_q"+idQuestao).append(cloneAlternativa);

        $("#del_alt_e"+idQuestao).show();
        $("#add_alt_e"+idQuestao).hide();
                
    }

    function verificarQuestoes(){
        if (<?php echo count($questoes) ?> >= 10){
            $("#addQuestao").removeAttr("data-toggle","modal");
            $("#addQuestao").removeAttr("data-target","#modalCadastrar");
            $("#addQuestao").attr("onclick","alert('Quantidade de máxima questões atingida!')")
        }else{
            $("#addQuestao").attr("data-toggle","modal");
            $("#addQuestao").attr("data-target","#modalCadastrar");
        }
    }


    
</script>
</html>
