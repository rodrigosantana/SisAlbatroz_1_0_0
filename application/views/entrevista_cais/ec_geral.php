<!-- Definindo o tipo de arquivo que vai ser -->
<!DOCTYPE html PUBLIC>
<!-- Abre o arquivo html e define a linguagem padrão -->
<html lang="pt-br">
<!-- Cabeçalho que não aparece para o usuário -->
<head>
    <!-- Informações sobre o texto e caracteres -->
    <meta http-equiv="Content-type" content="text/hetml; charset=UTF-8">
    <title>Entrevista de Cais</title>
    <!-- CSS customizado do form -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
    <!-- CSS do bootstrap    -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/select2/select2.css"/>
    <script src="<?php echo base_url();?>assets/js/jquery-1.11.2.js"></script>
    <!-- Biblioteca Bootstrap    -->
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/select2/select2.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/addPrototype.js"></script>
</head>

<header id="header" class="masthead">
    <img src="<?php echo base_url();?>assets/img/banner.jpg" alt="banner">
</header>

<body>
<!-- Início do corpo da página -->
<div class="container-fluid">
    <?php if (isset($mensagem)): ?>
        <div class="alert alert-success text-center" role="alert"><strong><?php echo $mensagem ?></strong></div>
    <?php endif;?>
    <br>
        <div class="col-sm-12 col-lg-12">
            <h1 class="">Entrevista Cais</h1>
            <br>
        </div>
    <!-- Visualizar erros de validação de form do CI    -->
    <?php echo validation_errors();?>
<!--    <div class="col-sm-12 col-lg-12">-->
<!--        <h2 class="text-center titulo"> Dados Gerais </h2>-->
<!--        <hr>-->
<!--    </div>-->
    <form class="form-horizontal" role="form" id="form" action="<?php echo base_url();?>index.php/entrevista_cais/salva" method="post">
        <input type="hidden" id="id_ec" name="id_ec" value="">

        <div class="panel panel-default geral">
            <div class="panel-heading">
                <h4> Dados Gerais </h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label for="resp_campo" class="col-md-4 control-label">Responsável de campo:</label>
                            <div class="col-md-8">
                                <select class="select2" id="resp_campo" name="resp_campo">
                                    <option></option>
                                    <!--                            --><?php //foreach ($observadores as $cad_observador): ?>
                                    <!--                                <option value="--><?php //echo $cad_observador->getObservId()?><!--">--><?php //echo $cad_observador->getObservNome()?><!--</option>-->
                                    <!--                            --><?php //endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label for="data_campo" class="col-md-4 control-label">Data:</label>
                            <div class="col-md-8">
                                <input type="date" class="form-control" id="data_campo" name="data_campo" value="<?php echo set_value('data_campo');?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label for="empresa" class="col-md-4 control-label">Empresa:</label>
                            <div class="col-md-8">
                                <select class="select2" id="empresa" name="empresa">
                                    <!--                            <option></option>-->
                                    <!--                            --><?php //foreach ($embarcacoes as $cad_embarcacao): ?>
                                    <!--                                <option value="--><?php //echo $cad_embarcacao->getEmbarcacaoId()?><!--">--><?php //echo $cad_embarcacao->getEmbarcacaoNome()?><!--</option>-->
                                    <!--                            --><?php //endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label for="municipio" class="col-md-4 control-label">Cidade:</label>
                            <div class="col-md-8">
                                <select class="select2" id="municipio" name="municipio">
                                    <!--                            <option></option>-->
                                    <!--                            --><?php //foreach ($embarcacoes as $cad_embarcacao): ?>
                                    <!--                                <option value="--><?php //echo $cad_embarcacao->getEmbarcacaoId()?><!--">--><?php //echo $cad_embarcacao->getEmbarcacaoNome()?><!--</option>-->
                                    <!--                            --><?php //endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label for="uf" class="col-md-4 control-label">Estado:</label>
                            <div class="col-md-8">
                                <select class="select2" id="uf" name="uf">
                                    <!--                            <option></option>-->
                                    <!--                            --><?php //foreach ($embarcacoes as $cad_embarcacao): ?>
                                    <!--                                <option value="--><?php //echo $cad_embarcacao->getEmbarcacaoId()?><!--">--><?php //echo $cad_embarcacao->getEmbarcacaoNome()?><!--</option>-->
                                    <!--                            --><?php //endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label for="embarcacao" class="col-md-4 control-label">Embarcação:</label>
                            <div class="col-md-8">
                                <select class="select2" id="embarcacao" name="embarcacao">
                                    <!--                            <option></option>-->
                                    <!--                            --><?php //foreach ($mestres as $cad_mestre): ?>
                                    <!--                                <option value="--><?php //echo $cad_mestre->getMestreId()?><!--">--><?php //echo $cad_mestre->getMestreApel()?><!--</option>-->
                                    <!--                            --><?php //endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label for="porto_saida" class="col-md-4 control-label">Porto de saída:</label>
                            <div class="col-md-8">
                                <select class="select2" id="porto_saida" name="porto_saida">
                                    <!--                            <option></option>-->
                                    <!--                            --><?php //foreach ($mestres as $cad_mestre): ?>
                                    <!--                                <option value="--><?php //echo $cad_mestre->getMestreId()?><!--">--><?php //echo $cad_mestre->getMestreApel()?><!--</option>-->
                                    <!--                            --><?php //endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label for="data_saida" class="col-md-4 control-label">Data de saída:</label>
                            <div class="col-md-8">
                                <input type="date" class="form-control" id="data_saida" name="data_saida" value="<?php echo set_value('data_saida');?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label for="hora_saida" class="col-md-4 control-label">Hora de saída:</label>
                            <div class="col-md-8">
                                <input type="date" class="form-control" id="hora_saida" name="hora_saida" value="<?php echo set_value('hora_saida');?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label for="data_chegada" class="col-md-4 control-label">Data de chegada:</label>
                            <div class="col-md-8">
                                <input type="date" class="form-control" id="data_chegada" name="data_chegada" value="<?php echo set_value('data_chegada');?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label for="hora_chegada" class="col-md-4 control-label">Hora de chegada:</label>
                            <div class="col-md-8">
                                <input type="date" class="form-control" id="hora_chegada" name="hora_chegada" value="<?php echo set_value('hora_chegada');?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label for="petrecho" class="col-md-4 control-label">Petrecho:</label>
                            <div class="col-md-8">
                                <select class="select2" id="petrecho" name="petrecho">
                                    <!--                            <option></option>-->
                                    <!--                            --><?php //foreach ($mestres as $cad_mestre): ?>
                                    <!--                                <option value="--><?php //echo $cad_mestre->getMestreId()?><!--">--><?php //echo $cad_mestre->getMestreApel()?><!--</option>-->
                                    <!--                            --><?php //endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label for="obs" class="col-md-4 control-label">Observações</label>
                            <div class="col-md-8">
                                <textarea class="form-control" id="obs" rows="2" name="obs" placeholder="Limite de 500 caracteres"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default petrecho">
            <div class="panel-heading">
                <h4>Dados do Petrecho</h4>
            </div>
            <div class="panel-body">

            </div>
        </div>
        <div class="panel panel-default area_pesca">
            <div class="panel-heading">
                <h4>Áreas de Pesca</h4>
            </div>
            <div class="panel-body">
                <div class="col-sm-6 col-lg-4">
                    <div class="form-group">
                        <label for="nome_area" class="col-md-4 control-label">Nome da área:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="nome_area" name="nome_area" value="<?php echo set_value('nome_area');?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="form-group">
                        <label for="prof_inicial" class="col-md-4 control-label">Profundidade inicial:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="prof_inicial" name="prof_inicial" value="<?php echo set_value('prof_inicial');?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="form-group">
                        <label for="prof_final" class="col-md-4 control-label">Profundidade final:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="prof_final" name="prof_final" value="<?php echo set_value('prof_final');?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default ave_inter">
            <div class="panel-heading">
                <h4>Interações com Aves</h4>
            </div>
            <div class="panel-body">
                <div class="col-sm-12 col-lg-6">
                    <div class="form-group">
                        <label for="ave_interacao" class="col-md-8 control-label lb_ave_interacao">Foi observado aves durante a operação de pesca:</label>
                        <div class="col-md-4">
                            <label class="radio-inline" for="ave_interacao">
                                <input type="radio" class="" name="ave_interacao" id="ave_interacao" value="true">Sim
                            </label>
                            <label class="radio-inline" for="ave_interacao">
                                <input type="radio" class="" name="ave_interacao" id="ave_interacao" value="false">Não
                            </label>
                        </div>
                    </div>
                </div><div class="col-sm-12 col-lg-6">
                    <div class="form-group">
                        <label for="ave_atrapalhou" class="col-md-8 control-label lb_ave_atrapalhou">Ave atrapalhou a operação de pesca:</label>
                        <div class="col-md-4">
                            <label class="radio-inline" for="ave_atrapalhou">
                                <input type="radio" class="" name="ave_atrapalhou" id="ave_atrapalhou" value="true">Sim
                            </label>
                            <label class="radio-inline" for="ave_atrapalhou">
                                <input type="radio" class="" name="ave_atrapalhou" id="ave_atrapalhou" value="false">Não
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default ave_capt">
            <div class="panel-heading">
                <h4>Captura de Aves</h4>
            </div>
            <div class="panel-body">
                <div class="row captura">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="capt_especie" class="col-md-3 control-label">Espécie:</label>
                            <div class="col-md-9">
                                <select class="select2" id="capt_especie" name="capt_especie">
                                    <option></option>
<!--                                    --><?php //foreach ($aves as $cad_ave): ?>
<!--                                        <option value="--><?php //echo $cad_ave->getAveId() ?><!--">--><?php //echo $cad_ave->getAveNome() ?><!--</option>-->
<!--                                    --><?php //endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 col-md-5">
                        <div class="form-group">
                            <label for="capt_quant" class="col-md-3 control-label">Quantidade:</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control capt_quant" id="" name="" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 text-right">
            <button type="submit" id="btnSub" name="btnSub" class="btn btn-success btn-lg btn_sub">Salvar</button>
        </div>

    </form>
</div>
<br>
<footer class="footer">
    <div class="container">
        <p class="text-muted">
            Projeto Albatroz -
            Base Regional de Santa Catarina -
            Itajaí - SC -
            Endereço: Universidade do Vale do Itajaí (Univali)
            Rua Uruguai, 458, bloco D6 - sala 145 - Centro
            CEP 88302-202 - Telefone: (13) 99753-5620 -
            Responsáveis Técnicos: Rodrigo Sant'Ana | rsantana@projetoalbatroz.org.br e
            André Santoro | asantoro@projetoalbatroz.org.br
        </p>
    </div>
</footer>
</body>
</html>


<script>
$(document).ready(function() {
    
    $("#resp_campo").select2({
        placeholder: "Selecione",
        allowClear: true,
        formatNoMatches: function() {
            return "Nenhum item encontrado"
        }
    });
    
    $("#empresa").select2({
        placeholder: "Selecione",
        allowClear: true,
        formatNoMatches: function() {
            return "Nenhum item encontrado"
        }
    });

    $("#municipio").select2({
        placeholder: "Selecione",
        allowClear: true,
        formatNoMatches: function() {
            return "Nenhum item encontrado"
        }
    });

    $("#uf").select2({
        placeholder: "Selecione",
        allowClear: true,
        formatNoMatches: function() {
            return "Nenhum item encontrado"
        }
    });

    $("#embarcacao").select2({
        placeholder: "Selecione",
        allowClear: true,
        formatNoMatches: function() {
            return "Nenhum item encontrado"
        }
    });

    $("#porto_saida").select2({
        placeholder: "Selecione",
        allowClear: true,
        formatNoMatches: function() {
            return "Nenhum item encontrado"
        }
    });

    $("#petrecho").select2({
        placeholder: "Selecione",
        allowClear: true,
        formatNoMatches: function() {
            return "Nenhum item encontrado"
        }
    });

    $("#capt_especie").select2({
        placeholder: "Selecione",
        allowClear: true,
        formatNoMatches: function() {
            return "Nenhum item encontrado"
        }
    });

});
</script>