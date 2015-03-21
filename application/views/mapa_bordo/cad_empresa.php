<!-- Definindo o tipo de arquivo que vai ser -->
<!DOCTYPE html PUBLIC>
<!-- Abre o arquivo html e define a linguagem padrão -->
<html lang="pt-br">
<!-- Cabeçalho que não aparece para o usuário -->
<head>
    <!-- Informações sobre o texto e caracteres -->
    <meta http-equiv="Content-type" content="text/hetml; charset=UTF-8">
    <title> Cadastro de Empresa </title>
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
    <br>
    <div class="col-sm-12 col-lg-12">
        <h1 class="text-left titulo titulo-cadastro">Cadastro de Empresa</h1>
        <hr>
    </div>
    <!-- Visualizar erros de validação de form do CI    -->
    <?php echo validation_errors();?>
    </br>
    <form class="form-horizontal" role="form" id="form" method="post" action="<?php echo base_url();?>index.php/cad_empresa_ct/salva">
        <input type="hidden" id="id_empresa" name="id_empresa" value="">
        <div class="row">
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="nome" class="col-md-4 control-label">Nome:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo set_value('nome');?>" placeholder="Nome completo da empresa">
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
                    <label for="end" class="col-md-4 control-label">Endereço:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo set_value('endereco');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="contato" class="col-md-4 control-label">Contato:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="contato" name="contato" placeholder="Pessoa de contato na empresa" value="<?php echo set_value('contato');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="cargo" class="col-md-4 control-label">Cargo:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Ex: RH, Segurança, Secretária" value="<?php echo set_value('cargo');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="telefone" class="col-md-4 control-label">Telefone:</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="telefone" name="telefone" value="<?php echo set_value('telefone');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">E-mail:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email');?>">
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
            Projeto Albatroz - Base Regional de Santa Catarina - Itajaí - SC -
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
