<!-- Definindo o tipo de arquivo que vai ser -->
<!DOCTYPE html PUBLIC>
<!-- Abre o arquivo html e define a linguagem padrão -->
<html lang="pt-br">
<!-- Cabeçalho que não aparece para o usuário -->
<head>
    <!-- Informações sobre o texto e caracteres -->
    <meta http-equiv="Content-type" content="text/hetml; charset=UTF-8">
    <title> SisAlbatroz  </title>
    <!-- CSS customizado do form -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
    <!-- CSS do bootstrap    -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css"/>
    <!-- CSS do plugin de validação    -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/formvalidation/dist/css/formValidation.css"/>
    <!-- Biblioteca JQuery     -->
    <script src="<?php echo base_url();?>assets/js/jquery-1.11.2.js"></script>
    <!-- Biblioteca Bootstrap    -->
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>
    <!-- Biblioteca do Plugin de Validação e classe suporte do Bootstrap    -->
    <script src="<?php echo base_url();?>assets/formvalidation/dist/js/formValidation.js"></script>
    <script src="<?php echo base_url();?>assets/formvalidation/dist/js/framework/bootstrap.js"></script>
    <!-- Biblioteca de linguagem local para as mensagens de validação do form       -->
    <script src="<?php echo base_url();?>assets/formvalidation/dist/js/language/pt_BR.js"></script>
<header id="header" class="masthead">
    <img src="<?php echo base_url();?>assets/img/banner.jpg" alt="banner">
</header>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://www.projetoalbatroz.org.br">
                Projeto Albatroz
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav pull-right">
                <li class="active"><a href="<?php echo site_url('sistema_ct/index/rbac/logout');?>">Sair</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-3 col-md-3">
                <a href="<?php echo site_url('mapa_bordo_ct');?>" class="thumbnail logo">
                    <img src="<?php echo base_url();?>assets/img/PA_logo_mb.jpg" alt="Mapa de Bordo">
                </a>
            </div>
            <div class="col-xs-3 col-md-3">
                <a href="#" class="thumbnail logo">
                    <img src="<?php echo base_url();?>assets/img/PA_logo_ec.jpg" alt="Entrevista de Cais">
                </a>
            </div>
            <div class="col-xs-3 col-md-3">
                <a href="<?php echo site_url('observadorbordo');?>" class="thumbnail logo">
                    <img src="<?php echo base_url();?>assets/img/PA_logo_ob.jpg" alt="Observador de Bordo">
                </a>
            </div>
            <div class="col-xs-3 col-md-3">
                <a href="#" class="thumbnail logo">
                    <img src="<?php echo base_url();?>assets/img/PA_logo_mc.jpg" alt="Medicina da Conservação">
                </a>
            </div>
        </div>
    </div>
</body>
</br></br>
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
</html>
