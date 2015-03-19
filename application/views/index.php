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
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo base_url();?>index.php">Acesso ao Sistema</a></li>
            </ul>
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
            <a class="btn btn-success btn-block btn-lg" role="button" data-toggle="modal" data-target="#loginModal">Acesso ao Sistema</a>
        </div>
    </div>
</div>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Acesso ao Sistema</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
                <form id="loginForm" method="post" class="form-horizontal" action="<?php echo base_url();?>index.php/mapa_bordo_ct/novo">
                    <div class="form-group">
                        <label class="col-xs-3 control-label">Usuário</label>
                        <div class="col-xs-5">
                            <input type="text" class="form-control" name="usuario" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-3 control-label">Senha</label>
                        <div class="col-xs-5">
                            <input type="password" class="form-control" name="senha" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
                            <button type="submit" class="btn btn-default">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
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
            André Santoro | asantoro@projetoalbatroz.org.br
        </p>
    </div>
</footer>
