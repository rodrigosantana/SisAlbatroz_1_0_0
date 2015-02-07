<!-- Definindo o tipo de arquivo que vai ser -->
<!DOCTYPE html PUBLIC>
<!-- Abre o arquivo html e define a linguagem padrão -->
<html lang="pt-br">
<!-- Cabeçalho que não aparece para o usuário -->
<head>
    <!-- Informações sobre o texto e caracteres -->
    <meta http-equiv="Content-type" content="text/hetml; charset=UTF-8">
    <title> Mapa de Bordo </title>
    <!-- carregando css, js e outros -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css"/>
    <script src="<?php echo base_url();?>assets/js/jquery-1.11.2.js"></script>
    <script src="<?php echo base_url();?>assets/js/clone_form.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>
</head>
<header id="header" class="masthead">
    <img src="<?php echo base_url();?>assets/img/banner.jpg" alt="banner">
</header>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://www.projetoalbatroz.org.br">
                Projeto Albatroz
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="">Início</a></li>
                <li><a href="">Basilares</a></li>
                <li><a href="">Mapa de Bordo</a></li>
                <li><a href="">Sair</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<!-- Início do corpo da página -->
<div class="container-fluid">
    <?php if (isset($mensagem)): ?>
        <div class="alert alert-success text-center" role="alert"><strong><?php echo $mensagem ?></strong></div>
    <?php endif;?>
    <div class="col-sm-12 col-lg-12">
        <h1 class="text-left titulo">Mapa de Bordo</h1>
    </div>
    <!-- Visualizar erros de validação de form do CI    -->
    <?php echo validation_errors();?>
    <div class="col-sm-12 col-lg-12">
        <h2 class="text-center titulo"> Dados Gerais </h2>
    </div>
    <form class="form-horizontal" role="form" id="form" action="<?php echo base_url();?>index.php/mapa_bordo_ct/salva"
          method="post">
        <input type="hidden" id="id_mb" name="id_mb" value="">
        <div class="row">
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="barco" class="col-md-4 control-label">
                        Barco </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="barco" name="barco" placeholder="Nome da embarcação"
                               value="<?php echo set_value('barco');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="mestre" class="col-md-4 control-label">
                        Mestre</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="mestre" name="mestre" placeholder="Nome do mestre"
                               value="<?php echo set_value('mestre');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="petre">
                        Petrecho</label>
                    <div class="col-md-8">
                        <label class="radio-inline">
                            <input type="radio" name="petre" value="esp_sup"<?php echo set_radio('petre', 'esp_sup');?>>
                            Espinhel de superfície
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="petre" value="esp_fun"<?php echo set_radio('petre', 'esp_fun');?>>
                            Espinhel de fundo
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="data_saida" class="col-md-4 control-label">
                        Data de saída</label>
                    <div class="col-md-8">
                        <input type="date" class="form-control" id="data_saida"
                               name="data_saida">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="data_chegada" class="col-md-4 control-label">
                        Data de chegada</label>
                    <div class="col-md-8">
                        <input type="date" class="form-control" id="data_chegada"
                               name="data_chegada">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="obs" class="col-md-4 control-label">
                        Observações </label>
                    <div class="col-md-8">
                        <textarea class="form-control" id="obs" rows="2" name="obs"
                                  placeholder="Limite de 500 caracteres"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row lancamento" id="lancamento1">
            <h2 class="text-center titulo">Dados do Lançamento</h2>
            <h4 id="reference" class="heading-reference titulo"> Lançamento #1 </h4>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="lance" class="col-md-4 control-label lb_lance">
                        Lance
                    </label>
                    <div class="col-md-8">
                        <input type="number" class="form-control lance"
                               id="lance" name="L1_lance"
                               placeholder="Identificador do lance">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="data_lance"
                           class="col-md-4 control-label lb_data_lance"> Data
                    </label>
                    <div class="col-md-8">
                        <input type="date" class="form-control lance_data"
                               id="lance_data" name="L1_lance_data">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="anzois" class="col-md-4 control-label lb_anzois">
                        Anzois
                    </label>
                    <div class="col-md-8">
                        <input type="number" class="form-control anzois"
                               id="anzois" name="L1_anzois">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="lance_lat"
                           class="col-md-4 control-label lb_lance_lat">
                        Latitude (decimal)
                    </label>
                    <div class="col-md-8">
                        <input type="number" class="form-control lance_lat"
                               id="lance_lat" name="L1_lance_lat" step="any">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="lance_long"
                           class="col-md-4 control-label lb_lance_long">
                        Longitude (decimal)
                    </label>
                    <div class="col-md-8">
                        <input type="number" class="form-control lance_long"
                               id="lance_long" name="L1_lance_long" step="any">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="isca" class="col-md-4 control-label lb_isca">Isca
                    </label>
                    <div class="col-md-8">
                        <label class="checkbox-inline" for="isca_0">
                            <input type="checkbox" class="isca_check"
                                   value="lula" id="isca_0" name="L1_isca[]"> Lula
                        </label>
                        <label class="checkbox-inline" for="isca_1">
                            <input type="checkbox" class="isca_check"
                                   value="cavalinha" id="isca_1" name="L1_isca[]">
                            Cavalinha
                        </label>
                        <label class="checkbox-inline" for="isca_2">
                            <input type="checkbox" class="isca_check"
                                   value="bonito" id="isca_2" name="L1_isca[]">
                            Bonito
                        </label>
                        <label class="checkbox-inline" for="isca_3">
                            <input type="checkbox" class="isca_check"
                                   value="sardinha" id="isca_3" name="L1_isca[]">
                            Sardinha
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="lance_hora_ini"
                           class="col-md-4 control-label lb_hora_ini">
                        Hora início do lance
                    </label>
                    <div class="col-md-8">
                        <input type="time" class="form-control lance_hora_ini"
                               id="lance_hora_ini" name="L1_lance_hora_ini">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="lance_hora_fin"
                           class="col-md-4 control-label lb_hora_fin">
                        Hora final do lance
                    </label>
                    <div class="col-md-8">
                        <input type="time" class="form-control lance_hora_fin"
                               id="lance_hora_fin" name="L1_lance_hora_fin">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="mm_tipo"
                           class="col-md-4 control-label lb_mm_tipo">
                        Medida mitigatória
                    </label>
                    <div class="col-md-8">
                        <label class="checkbox-inline" for="mm_tipo_0">
                            <input type="checkbox" class="mm_check"
                                   value="toriline" id="mm_tipo_0"
                                   name="L1_mm_tipo[]">
                            Toriline
                        </label>
                        <label class="checkbox-inline" for="mm_tipo_1">
                            <input type="checkbox" class="mm_check"
                                   value="larg_noturna" id="mm_tipo_1"
                                   name="L1_mm_tipo[]">
                            Largada noturna
                        </label>
                        <label class="checkbox-inline" for="mm_tipo_2">
                            <input type="checkbox" class="mm_check"
                                   value="reg_peso" id="mm_tipo_2"
                                   name="L1_mm_tipo[]">
                            Regime de peso
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="mm_uso" class="col-md-4 control-label lb_mm_uso">
                        Uso da mm
                    </label>
                    <div class="col-md-8">
                        <label class="radio-inline lb_radio" for="mm_uso-0">
                            <input type="radio" class="mm_uso_radio" name="L1_mm_uso"
                                   id="mm_uso-0" value="total">Total
                        </label>
                        <label class="radio-inline lb_radio" for="mm_uso-1">
                            <input type="radio" class="mm_uso_radio" name="L1_mm_uso"
                                   id="mm_uso-1" value="parcial">Parcial
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="ave_capt"
                           class="col-md-4 control-label lb_ave_capt">
                        Ave capturada
                    </label>
                    <div class="col-md-8">
                        <label class="radio-inline" for="ave_capt_0">
                            <input type="radio" class="ave_capt" name="L1_ave_capt"
                                   id="ave_capt_0" value="s">Sim
                        </label>
                        <label class="radio-inline" for="ave_capt_1">
                            <input type="radio" class="ave_capt" name="L1_ave_capt"
                                   id="ave_capt_0" value="n">Não
                        </label>
                    </div>
                </div>
            </div>
            <input type="hidden" name="count" id="count" value="1" />
            <div class="col-sm-12 col-lg-12">
                <h2 class="text-center titulo">Dados de Captura de Aves</h2>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="form-group">
                    <label for="capt_spp" class="col-md-4 control-label lb_capt_spp">
                        Espécie</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control capt_spp"
                               id="ID1_capt_spp" name="L1_capt_spp[]"
                               placeholder="Nome popular da ave captura">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="form-group">
                    <label for="capt_quant" class="col-md-4 control-label lb_capt_quant">
                        Quantidade</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control capt_quant"
                               id="ID1_capt_quant" name="L1_capt_quant[]">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="form-group">
                    <label for="capt_spp" class="col-md-4 control-label lb_capt_spp">
                        Espécie</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control capt_spp"
                               id="ID1_capt_spp" name="L1_capt_spp[]"
                               placeholder="Nome popular da ave captura">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="form-group">
                    <label for="capt_quant" class="col-md-4 control-label lb_capt_quant">
                        Quantidade</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control capt_quant"
                               id="ID1_capt_quant" name="L1_capt_quant[]">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="form-group">
                    <label for="capt_spp" class="col-md-4 control-label lb_capt_spp">
                        Espécie</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control capt_spp"
                               id="ID1_capt_spp" name="L1_capt_spp[]"
                               placeholder="Nome popular da ave captura">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="form-group">
                    <label for="capt_quant" class="col-md-4 control-label lb_capt_quant">
                        Quantidade</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control capt_quant"
                               id="ID1_capt_quant" name="L1_capt_quant[]">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="form-group">
                    <label for="capt_spp" class="col-md-4 control-label lb_capt_spp">
                        Espécie</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control capt_spp"
                               id="ID1_capt_spp" name="L1_capt_spp[]"
                               placeholder="Nome popular da ave captura">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="form-group">
                    <label for="capt_quant" class="col-md-4 control-label lb_capt_quant">
                        Quantidade</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control capt_quant"
                               id="ID1_capt_quant" name="L1_capt_quant[]">
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-group col-sm-12 col-md-12 text-rigth" role="group" >
            <button type="button" id="btnAdd" name="btnAdd"
                    class="btn btn-info">+ Lance
            </button>
            <button type="button" id="btnDel" name="btnDel"
                    class="btn btn-danger">- Lance
            </button>
        </div>
        <div class="col-sm-12 col-md-12 text-right">
            <button type="submit" id="btnSub" name="btnSub"
                    class="btn btn-success btn-lg btn_sub" >Submeter</button>
        </div>
    </form>
</div>
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
