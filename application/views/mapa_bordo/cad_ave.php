<!-- Definindo o tipo de arquivo que vai ser -->
<!DOCTYPE html PUBLIC>
<!-- Abre o arquivo html e define a linguagem padrão -->
<html lang="pt-br">
<!-- Cabeçalho que não aparece para o usuário -->
<head>
    <!-- Informações sobre o texto e caracteres -->
    <meta http-equiv="Content-type" content="text/hetml; charset=UTF-8">
    <title> Cadastro de Aves Marinhas </title>
    <!-- carregando css, js e outros -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css"/>
    <script src="<?php echo base_url();?>assets/js/jquery-1.11.2.js"></script>
    <script src="<?php echo base_url();?>assets/js/clone_form.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>
<!--    <script src="--><?php //echo base_url();?><!--assets/js/validate_ave.js"></script>-->
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
    <h1 class="text-left titulo">Cadastro de Aves Marinhas</h1>
    <hr>
</div>
<?php echo validation_errors();?>
</br>
<form class="form-horizontal" role="form" id="form" action="<?php echo base_url();?>index.php/cad_ave_ct/salva"
      method="post">
    <input type="hidden" id="id_ave" name="id_ave" value="">
    <div class="row">
        <div class="col-sm-6 col-lg-4">
            <div class="form-group">
                <label for="nome" class="col-md-4 control-label">Nome comum:</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="nome_br" name="nome_br" placeholder="Nome popular" value="<?php echo set_value('nome_br');?>">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="form-group">
                <label for="nome_us" class="col-md-4 control-label">Nome comum em  inglês: </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="nome_en" name="nome_en" placeholder="Nome popular em inglês" value="<?php echo set_value('nome_en');?>">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="form-group">
                <label for="spp" class="col-md-4 control-label">Nome Científico:</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="nome_cient" name="nome_cient" placeholder="Atenção a ortografia" value="<?php echo set_value('nome_cient');?>">
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 text-right">
        <button type="submit" id="btnSub" name="btnSub"
                class="btn btn-success btn-lg btn_sub" >Submeter</button>
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