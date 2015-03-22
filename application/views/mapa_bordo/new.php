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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/select2/select2.css"/>
<!--    <!-- CSS do plugin de validação    -->
<!--    <link rel="stylesheet" type="text/css" href="--><?php //echo base_url();?><!--assets/formvalidation/dist/css/formValidation.css"/>-->
    <!-- Biblioteca JQuery     -->
    
    <style>
        .select2-choice {
            height: 34px !important;
        }
        
        .select2-chosen {
            margin-top: 3px;
        }
    </style>
    
    <script src="<?php echo base_url();?>assets/js/jquery-1.11.2.js"></script>
    <!-- Biblioteca Bootstrap    -->
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/select2/select2.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/addPrototype.js"></script>
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
                        <select class="select2" id="observador" name="observador" style="width: 100%">
                            <option></option>
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
                        <select class="select2" id="embarcacao" name="embarcacao" style="width: 100%">
                            <option></option>
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
                        <select class="select2" id="mestre" name="mestre" style="width: 100%">
                            <option></option>
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
        
        
        <fieldset><h2 class="text-center titulo">Dados do Lançamento</h2></fieldset>
        <hr>
        <div id="lance_container" data-prototype="<?php echo htmlspecialchars($this->load->view("mapa_bordo/mb_lancamento", array("objecto" => new Mb_lance(), "countCaptura"=>0), true)); ?>">
        </div>
        
        <a href="javascrit:;" class="btn btn-success" id="add_lance"><i class="glyphicon glyphicon-plus"></i> Adicionar lançamento</a>
        <hr>
        
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


<script>
$(document).ready(function() {
    
    $("#observador").select2({
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
    
    $("#mestre").select2({
        placeholder: "Selecione",
        allowClear: true,
        formatNoMatches: function() {
            return "Nenhum item encontrado"
        }
    });
    
    var lances = new Prototype.Class({
        'count': <?php echo $countLance ?>,
        'list': '#lance_container',
        'addButton': '#add_lance',
        'removeButton': '#remove-lance',
        'container': '.lancamento',
        'addOne': <?php echo $countLance > 0 ? 'false' : 'true' ?>,
        'isEdit': <?php echo $countLance > 0 ? 'true' : 'false' ?>
    });
    
});
</script>