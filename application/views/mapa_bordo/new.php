<!-- Definindo o tipo de arquivo que vai ser -->
<!DOCTYPE html PUBLIC>
<!-- Abre o arquivo html e define a linguagem padrão -->
<html lang="pt-br">
<!-- Cabeçalho que não aparece para o usuário -->
<head>
    <!-- Informações sobre o texto e caracteres -->
    <meta http-equiv="Content-type" content="text/hetml; charset=UTF-8">
    <title> Mapa de Bordo </title>
    <!-- CSS customizado do form -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
    <!-- CSS do bootstrap    -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css"/>
<!--    <!-- CSS do plugin de validação    -->
<!--    <link rel="stylesheet" type="text/css" href="--><?php //echo base_url();?><!--assets/formvalidation/dist/css/formValidation.css"/>-->
    <!-- Biblioteca JQuery     -->
    <script src="<?php echo base_url();?>assets/js/jquery-1.11.2.js"></script>
    <!-- Biblioteca Bootstrap    -->
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>
<!--    <!-- Biblioteca do Plugin de Validação JQuery e classe suporte do Bootstrap    -->
<!--    <script src="--><?php //echo base_url();?><!--assets/formvalidation/dist/js/formValidation.js"></script>-->
<!--    <script src="--><?php //echo base_url();?><!--assets/formvalidation/dist/js/framework/bootstrap.js"></script>-->
<!--    <!-- Biblioteca de linguagem local para as mensagens de validação do form       -->
<!--    <script src="--><?php //echo base_url();?><!--assets/formvalidation/dist/js/language/pt_BR.js"></script>-->

    <!-- JS dos campos dinâmicos do formulário    -->
    <script src="<?php echo base_url();?>assets/js/clone_form.js"></script>
    <!-- JS para vaidação do formulário    -->
<!--    <script src="--><?php //echo base_url();?><!--assets/js/validate.js"></script>-->

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
        <h1 class="text-left titulo">Mapa de Bordo</h1>
    </div>
    <!-- Visualizar erros de validação de form do CI    -->
    <?php echo validation_errors();?>
    <div class="col-sm-12 col-lg-12">
        <h2 class="text-center titulo"> Dados Gerais </h2>
<!--        Aviso utilizado em conjunto com a validação Jquery alternativa-->
<!--        <h5> Os campos (<span class="glyphicon glyphicon-asterisk"></span>) são obrigatórios! </h5>-->
        <hr>
    </div>
    <form class="form-horizontal" role="form" id="form" action="<?php echo base_url();?>index.php/mapa_bordo_ct/salva" method="post">
        <input type="hidden" id="id_mb" name="id_mb" value="">
        <div class="row">
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="observador" class="col-md-4 control-label">Observador</label>
                    <div class="col-md-8">
                        <select class="form-control" id="observador" name="observador">
                            <option value="">Selecione</option>
                            <?php foreach ($observadores as $cad_observador): ?>
                                <option value="<?php echo $cad_observador->getObservId()?>"><?php echo $cad_observador->getObservNome()?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="embarcacao" class="col-md-4 control-label">Embarcacao</label>
                    <div class="col-md-8">
                        <select class="form-control" id="embarcacao" name="embarcacao">
                            <option value="">Selecione</option>
                            <?php foreach ($embarcacoes as $cad_embarcacao): ?>
                                <option value="<?php echo $cad_embarcacao->getEmbarcacaoId()?>"><?php echo $cad_embarcacao->getEmbarcacaoNome()?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="mestre" class="col-md-4 control-label">Mestre</label>
                    <div class="col-md-8">
                        <select class="form-control" id="mestre" name="mestre">
                            <option value="" >Selecione</option>
                            <?php foreach ($mestres as $cad_mestre): ?>
                                <option value="<?php echo $cad_mestre->getMestreId()?>"><?php echo $cad_mestre->getMestreApel()?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="petre" class="col-md-4 control-label">Petrecho</label>
                    <div class="col-md-8">
                        <label class="radio-inline"><input type="radio" name="petre" id="petre_esp_sup" value="esp_sup">
                            Espinhel de Superfície
                        </label>
                        <label class="radio-inline"><input type="radio" name="petre" id="petre_esp_fun" value="esp_fun">
                            Espinhel de Fundo
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="data_saida" class="col-md-4 control-label">Data de Saída</label>
                    <div class="col-md-8">
                        <input type="date" class="form-control" id="data_saida" name="data_saida"
                               value="">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="data_chegada" class="col-md-4 control-label">Data de Chegada</label>
                    <div class="col-md-8">
                        <input type="date" class="form-control" id="data_chegada" name="data_chegada"
                               value="">
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
        <div class="row lancamento" id="lancamento1">
            <h2 class="text-center titulo">Dados do Lançamento</h2>
            <hr>
            <h4 id="reference" class="heading-reference titulo"> Lançamento #1 </h4>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="lance" class="col-md-4 control-label lb_lance">Lance</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control lance" id="lance" name="lance"
                               placeholder="Identificador do lance" value="">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="data_lance"
                           class="col-md-4 control-label lb_data_lance">Data</label>
                    <div class="col-md-8">
                        <input type="date" class="form-control lance_data" id="lance_data" name="data"
                               value="">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="anzois" class="col-md-4 control-label lb_anzois">Anzois</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control anzois" id="anzois" name="anzois"
                               value="">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="lance_lat" class="col-md-4 control-label lb_lance_lat">Latitude (decimal)</label>
                    <div class="col-md-8">
                        <input type="number" step="any" class="form-control lance_lat" id="lance_lat" name="lat" value="">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="lance_long" class="col-md-4 control-label lb_lance_long">Longitude(decimal)
                    </label>
                    <div class="col-md-8">
                        <input type="number" step="any" class="form-control lance_long" id="lance_long" name="long" value="">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="isca" class="col-md-4 control-label lb_isca">Isca</label>
                    <div class="col-md-8">
                        <label class="checkbox-inline" for="isca_0">
                            <input type="checkbox" class="isca_check" id="isca_0" name="L1_isca[]"
                                   value="lula">Lula
                        </label>
                        <label class="checkbox-inline" for="isca_1">
                            <input type="checkbox" class="isca_check" id="isca_1" name="L1_isca[]"
                                   value="cavalinha">Cavalinha
                        </label>
                        <label class="checkbox-inline" for="isca_2">
                            <input type="checkbox" class="isca_check" id="isca_2" name="L1_isca[]"
                                   value="bonito">Bonito
                        </label>
                        <label class="checkbox-inline" for="isca_3">
                            <input type="checkbox" class="isca_check" id="isca_3" name="L1_isca[]"
                                   value="sardinha">Sardinha
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="lance_hora_ini" class="col-md-4 control-label lb_hora_ini">Hora Início do Lance</label>
                    <div class="col-md-8">
                        <input type="time" class="form-control lance_hora_ini" id="lance_hora_ini" name="hora_ini" value="">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="lance_hora_fin" class="col-md-4 control-label lb_hora_fin">Hora Final do Lance</label>
                    <div class="col-md-8">
                        <input type="time" class="form-control lance_hora_fin" id="lance_hora_fin" name="hora_fin" value="">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="mm_tipo" class="col-md-4 control-label lb_mm_tipo">Medida Mitigatória </label>
                    <div class="col-md-8">
                        <label class="checkbox-inline" for="mm_tipo_0">
                            <input type="checkbox" class="mm_check" id="mm_tipo_0" name="L1_mm_tipo[]"  value="toriline">Toriline
                        </label>
                        <label class="checkbox-inline" for="mm_tipo_1">
                            <input type="checkbox" class="mm_check"  id="mm_tipo_1" name="L1_mm_tipo[]" value="larg_noturna">Largada noturna
                        </label>
                        <label class="checkbox-inline" for="mm_tipo_2">
                            <input type="checkbox" class="mm_check" id="mm_tipo_2" name="L1_mm_tipo[]" value="reg_peso">Regime de peso
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="mm_uso" class="col-md-4 control-label lb_mm_uso">Uso da MM</label>
                    <div class="col-md-8">
                        <label class="radio-inline lb_radio" for="mm_uso-0">
                            <input type="radio" class="mm_uso_radio" name="mm_uso" id="mm_uso-0" value="total">Total
                        </label>
                        <label class="radio-inline lb_radio" for="mm_uso-1">
                            <input type="radio" class="mm_uso_radio" name="mm_uso" id="mm_uso-1" value="parcial">Parcial
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="ave_capt" class="col-md-4 control-label lb_ave_capt">Ave Capturada</label>
                    <div class="col-md-8">
                        <label class="radio-inline" for="ave_capt_0">
                            <input type="radio" class="ave_capt" name="ave_capt" id="ave_capt" value="s">Sim
                        </label>
                        <label class="radio-inline" for="ave_capt_1">
                            <input type="radio" class="ave_capt" name="ave_capt" id="ave_capt" value="n">Não
                        </label>
                    </div>
                </div>
            </div>
            <input type="hidden" name="count" id="count" value="1" />
            <div class="col-sm-12 col-lg-12">
                <h2 class="text-center titulo">Dados de Captura de Aves</h2>
                <hr>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="form-group">
                    <label for="capt_spp" class="col-md-4 control-label lb_capt_spp">Espécie</label>
                    <div class="col-md-8">
                        <select class="form-control capt_spp" id="ID1_capt_spp" name="L1_capt_spp1[]">
                            <option value="">Selecione</option>
                            <?php foreach ($aves as $cad_ave): ?>
                                <option value="<?php echo $cad_ave->getAveId()?>"><?php echo $cad_ave->getAveNome()?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="form-group">
                    <label for="capt_quant" class="col-md-4 control-label lb_capt_quant">Quantidade</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control capt_quant" id="ID1_capt_quant" name="L1_capt_quant1[]"
                               value="">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="form-group">
                    <label for="capt_spp" class="col-md-4 control-label lb_capt_spp">Espécie</label>
                    <div class="col-md-8">
                        <select class="form-control capt_spp" id="ID1_capt_spp" name="L1_capt_spp2[]">
                            <option value="">Selecione</option>
                            <option value="teste2">Teste2</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="form-group">
                    <label for="capt_quant" class="col-md-4 control-label lb_capt_quant">
                        Quantidade</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control capt_quant" id="ID1_capt_quant" name="L1_capt_quant2[]"
                               value="">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="form-group">
                    <label for="capt_spp" class="col-md-4 control-label lb_capt_spp">Espécie</label>
                    <div class="col-md-8">
                        <select class="form-control capt_spp" id="ID1_capt_spp" name="L1_capt_spp3[]">
                            <option value="">Selecione</option>
                            <option value="teste3">Teste3</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="form-group">
                    <label for="capt_quant" class="col-md-4 control-label lb_capt_quant">
                        Quantidade</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control capt_quant" id="ID1_capt_quant" name="L1_capt_quant3[]"
                               value="">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="form-group">
                    <label for="capt_spp" class="col-md-4 control-label lb_capt_spp">Espécie</label>
                    <div class="col-md-8">
                        <select class="form-control capt_spp" id="ID1_capt_spp" name="L1_capt_spp4[]">
                            <option value="">Selecione</option>
                            <option value="teste4">Teste4</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="form-group">
                    <label for="capt_quant" class="col-md-4 control-label lb_capt_quant">
                        Quantidade</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control capt_quant" id="ID1_capt_quant" name="L1_capt_quant4[]"
                               value="">
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-group col-sm-12 col-md-12 text-rigth" role="group" >
            <button type="button" id="btnAdd" name="btnAdd" class="btn btn-info">+ Lance</button>
            <button type="button" id="btnDel" name="btnDel" class="btn btn-danger">- Lance</button>
        </div>
        <div class="col-sm-12 col-md-12 text-right">
            <button type="submit" id="btnSub" name="btnSub" class="btn btn-success btn-lg btn_sub" >Submeter</button>
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
