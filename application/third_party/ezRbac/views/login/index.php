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
    <script src="<?php echo base_url(); ?>assets/js/jquery.blockUI.js" type="text/javascript" ></script>
    <script src="<?php echo base_url(); ?>assets/js/system.js"></script>
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
<!--            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php //echo base_url();?>index.php">Acesso ao Sistema</a></li>
            </ul>-->
        </div><!--/.nav-collapse -->
    </div>
</div>
<body>
<!-- Início do corpo da página -->
<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <img src="<?php echo base_url();?>assets/img/PA_logo.jpg" class="img-responsive center-block logo">
        </div>
        <div class="col-xs-6">
            <img src="<?php echo base_url();?>assets/img/logo.png" class="img-responsive logo" style="margin-top:25%">
        </div>
        <div class="col-xs-6">
            <img src="<?php echo base_url();?>assets/img/apoios.png" class="img-responsive logo">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <a id="btn-modal" class="btn btn-success btn-block btn-lg" role="button" data-toggle="modal" data-target="#loginModal">Acesso ao Sistema</a>
        </div>
    </div>
</div>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Autenticação</h4>
            </div>

            <div class="modal-body">
                <form action="" method="post" class="form-horizontal" id="form_login">
                    
                    
                    <?php if($form_error !== false && !is_array($form_error)): ?>
                    <div class="alert alert-danger col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2" role="alert">
                        <div class="row">
                            <div class="col-md-2 col-sm-2 col-xs-3"><i style="font-size: 30px;" class="glyphicon glyphicon-exclamation-sign"></i></div>
                            <div class="col-md-10 col-sm-8 col-xs-7" id="error_container" style="padding-top: 6px;">
                                <?php echo $form_error?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="form-group">
                        <label class="col-xs-3 control-label">Usuário</label>
                        <div class="col-xs-6 div-help">
                            <input type="text" id="username" name="username" class="form-control" value="<?php echo $this->input->post('username') ?>"/>
                            <input type="hidden" name="action" value="login"/>
                            <?php if($form_error !== false && is_array($form_error) && array_key_exists('username', $form_error)): ?>
                                <span class="help-block"><?php echo $form_error['username']?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-3 control-label">Senha</label>
                        <div class="col-xs-6 div-help">
                            <input type="password" id="password" name="password" class="form-control"/>
                            <?php if($form_error !== false && is_array($form_error) && array_key_exists('password', $form_error)): ?>
                                <span class="help-block"><?php echo $form_error['password']?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group">
                           <div class="col-xs-5 col-xs-offset-3">
                                <button class="btn btn-success" type="submit">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        <?php if ($form_error) :?>
        $('#loginModal').modal('show');
        <?php endif;?>
    
        $('#').formValidation({
            framework: 'bootstrap',
            // Linguagem das mensagens
            locale: 'pt_BR',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                usuario: {
                    validators: {
                        notEmpty: {
                            message: 'O Usuário é obrigatório'
                        }
                    }
                },
                senha: {
                    validators: {
                        notEmpty: {
                            message: 'A Senha é obrigatória'
                        }
                    }
                }
            }
        });
    });
</script>
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
            André Santoro | asantoro@projetoalbatroz.org.br<br>
            Sistema desenvolvido por: Rodrigo Sant'Ana (rsantana@projetoalbatroz.org.br), 
            André Santoro (asantoro@projetoalbatroz.org.br) e Tiago Zis (tiagozis@gmail.com)
        </p>
    </div>
</footer>
</html>
