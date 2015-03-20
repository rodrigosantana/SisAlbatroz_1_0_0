<!-- Definindo o tipo de arquivo que vai ser -->
<!DOCTYPE html PUBLIC>
<!-- Abre o arquivo html e define a linguagem padrão -->
<html lang="pt-br">
<!-- Cabeçalho que não aparece para o usuário -->
<head>
    <!-- Informações sobre o texto e caracteres -->
    <meta http-equiv="Content-type" content="text/hetml; charset=UTF-8">
    <title> Cadastro de Observador </title>
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
<!-- Início do corpo da página -->
<div class="container-fluid">
    <?php if (isset($mensagem)): ?>
    <div class="alert alert-success text-center" role="alert"><strong><?php echo $mensagem ?></strong></div>
<?php endif;?>
<br>
<div class="col-sm-12 col-lg-12">
    <h1 class="text-left titulo">Cadastro de Observador</h1>
    <hr>
</div>
<!-- Visualizar erros de validação de form do CI    -->
<?php echo validation_errors();?>
</br>
<form class="form-horizontal" role="form" id="form" action="<?php echo base_url();?>index.php/cad_observ_ct/salva" method="post">
    <input type="hidden" id="id_observ" name="id_observ" value="">
    <div class="row">
        <div class="col-sm-6 col-lg-4">
            <div class="form-group">
                <label for="nome" class="col-md-4 control-label">Nome:</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo" value="<?php echo set_value('nome');?>">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="form-group">
                <label for="cpf" class="col-md-4 control-label">CPF:</label>
                <div class="col-md-8">
                    <input type="number" class="form-control" id="cpf" name="cpf" placeholder="Apenas dígitos" value="<?php echo set_value('cpf');?>">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="form-group">
                <label for="rg" class="col-md-4 control-label">RG:</label>
                <div class="col-md-8">
                    <input type="number" class="form-control" id="rg" name="rg" placeholder="Apenas dígitos" value="<?php echo set_value('rg');?>">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="form-group">
                <label for="email" class="col-md-4 control-label">E-mail:</label>
                <div class="col-md-8">
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email');?>">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="form-group">
                <label for="tel" class="col-md-4 control-label">Telefone:</label>
                <div class="col-md-8">
                    <input type="number" class="form-control" id="tel" name="tel" value="<?php echo set_value('tel');?>" placeholder="Ex: 4797444182">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="form-group">
                <label for="skype" class="col-md-4 control-label">Skype:</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="skype" name="skype" value="<?php echo set_value('skype');?>">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="form-group">
                <label for="end" class="col-md-4 control-label">Endereço</label>
                <div class="col-md-8">
                    <textarea class="form-control" id="end" rows="2" name="end" placeholder="Limite de 200 caracteres" ><?php echo set_value('end');?></textarea>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="form-group">
                <label for="cidade" class="col-md-4 control-label">Cidade:</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo set_value('cidade');?>">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="form-group">
                <label for="uf" class="col-md-4 control-label">UF:</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="uf" name="uf" value="<?php echo set_value('uf');?>">
                </div>
            </div>
        </div>
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