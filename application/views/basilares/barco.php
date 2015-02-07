<!-- Definindo o tipo de arquivo que vai ser -->
<!DOCTYPE html PUBLIC>
<!-- Abre o arquivo html e define a linguagem padrão -->
<html lang="pt-br">
<!-- Cabeçalho que não aparece para o usuário -->
<head>
    <!-- Informações sobre o texto e caracteres -->
    <meta http-equiv="Content-type" content="text/hetml; charset=UTF-8">
    <title> Cadastro de Embarcação </title>
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
        <h1 class="text-left titulo titulo-cadastro">Cadastro de Embarcação</h1>
    </div>
    <!-- Visualizar erros de validação de form do CI    -->
    <?php echo validation_errors();?>
    <form class="form-horizontal" role="form" id="form" method="post" action="#">
        <input type="hidden" id="id_barco" name="id_barco" value="">
        <div class="row">
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="nome" class="col-md-4 control-label">
                        Nome: </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: Marbella I"
                               value="<?php echo set_value('nome');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="registro" class="col-md-4 control-label">
                        Registro da Marinha:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="registro" name="registro"
                               value="<?php echo set_value('registro');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="Comprimento" class="col-md-4 control-label">
                        Comprimento:</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="comp" name="comp" placeholder="Metros"
                               value="<?php echo set_value('comp');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="arq_bruta" class="col-md-4 control-label">
                        Arqueação Bruta:</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="arq_bruta" name="arq_bruta">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="fabricacao" class="col-md-4 control-label">
                        Ano de Fabricação:</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="fabricacao" name="fabricacao"
                               placeholder="ex: 1990">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="mat_casco" class="col-md-4 control-label">Material do Casco:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="mat_casco" name="mat_casco">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="tripulacao" class="col-md-4 control-label">Tripulação Máxima:</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="tripulacao" name="tripulacao">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 text-right">
            <button type="submit" id="btnSub" name="btnSub"
                    class="btn btn-success btn-lg btn_sub" >Cadastrar</button>
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
