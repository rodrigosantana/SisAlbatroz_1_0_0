<!-- Definindo o tipo de arquivo que vai ser -->
<!DOCTYPE html PUBLIC>
<!-- Abre o arquivo html e define a linguagem padrão -->
<html lang="pt-br">
<!-- Cabeçalho que não aparece para o usuário -->
<head>
    <!-- Informações sobre o texto e caracteres -->
    <meta http-equiv="Content-type" content="text/hetml; charset=UTF-8">
    <title> Entrevista de Cais </title>
    <!-- carregando css, js e outros -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css"/>
    <script src="<?php echo base_url();?>assets/js/jquery-1.11.2.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>
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
    <div class="col-sm-12 col-lg-12">
        <h1 class="text-left titulo">Entrevista de Cais</h1>
    </div>
    <!-- Visualizar erros de validação de form do CI    -->
    <?php echo validation_errors();?>
    <div class="col-sm-12 col-lg-12">
        <h2 class="text-center titulo"> Dados Gerais </h2>
    </div>
    <form class="form-horizontal" role="form" id="form" method="post" action="#">
        <input type="hidden" id="id_entre" name="id_entre" value="">
        <div class="row">
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="respo" class="col-md-4 control-label">Responsável de Campo:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="respo" name="respo"
                               value="<?php echo set_value('respo');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="data" class="col-md-4 control-label">Data:</label>
                    <div class="col-md-8">
                        <input type="date" class="form-control" id="data" name="data"
                               value="<?php echo set_value('data');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="empresa" class="col-md-4 control-label">Empresa:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="empresa" name="empresa"
                               value="<?php echo set_value('empresa');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="cidade" class="col-md-4 control-label">Cidade:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="cidade" name="cidade"
                               value="<?php echo set_value('cidade');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="barco" class="col-md-4 control-label">Embarcação:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="barco" name="barco"
                               value="<?php echo set_value('barco');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="porto" class="col-md-4 control-label">Porto de Saída:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="porto" name="porto"
                               value="<?php echo set_value('porto');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="data_saida" class="col-md-4 control-label">Data de Saída:</label>
                    <div class="col-md-8">
                        <input type="date" class="form-control" id="data_saida" name="data_saida"
                               value="<?php echo set_value('data_saida');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="hora_saida" class="col-md-4 control-label">Hora de Saída:</label>
                    <div class="col-md-8">
                        <input type="time" class="form-control" id="hora_saida" name="hora_saida"
                               value="<?php echo set_value('hora_saida');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="data_chegada" class="col-md-4 control-label">Data de Chegada:</label>
                    <div class="col-md-8">
                        <input type="date" class="form-control" id="data_chegada" name="data_chegada"
                               value="<?php echo set_value('data_chegada');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="hora_chegada" class="col-md-4 control-label">Hora de Chegada:</label>
                    <div class="col-md-8">
                        <input type="time" class="form-control" id="hora_chegada" name="hora_chegada"
                               value="<?php echo set_value('hora_chegada');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="dias_mar" class="col-md-4 control-label">Dias de Mar:</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="dias_mar" name="dias_mar"
                               value="<?php echo set_value('dias_mar');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="dias_pesca" class="col-md-4 control-label">Dias de Pesca:</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="dias_pesca" name="dias_pesca"
                               value="<?php echo set_value('dias_pesca');?>">
                    </div>
                </div>
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
