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
    <h2 class="text-center titulo"> Cadastro de Mestre </h2>
    <hr>
</div>
<form class="form-horizontal" role="form" id="form" action="<?php echo base_url();?>index.php/cad_mestre_ct/salvamestre"
      method="post">
    <input type="hidden" id="id_mb" name="id_mb" value="">
    <div class="row">
        <div class="col-sm-6 col-lg-4">
            <div class="form-group">
                <label for="mestre" class="col-md-4 control-label">
                    Mestre </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="mestre" name="mestre" placeholder="Nome da mestre"
                           value="<?php echo set_value('mestre');?>">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="form-group">
                <label for="apelido" class="col-md-4 control-label">
                    Apelido</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="apelido" name="apelido" placeholder="Apelido"
                           value="<?php echo set_value('apelido');?>">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="form-group">
                <label for="mestre" class="col-md-4 control-label">
                    Telefone</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="telefone"
                           value="<?php echo set_value('telefone');?>">
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
</body>