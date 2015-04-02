<!-- Definindo o tipo de arquivo que vai ser -->
<!DOCTYPE html PUBLIC>
<!-- Abre o arquivo html e define a linguagem padrão -->
<html lang="pt-br">
    <!-- Cabeçalho que não aparece para o usuário -->
    <head>
        <!-- Informações sobre o texto e caracteres -->
        <meta http-equiv="Content-type" content="text/hetml; charset=UTF-8">
        <title> Mapa de Bordo </title>
        <!-- CSS customizado do form -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
        <!-- CSS do bootstrap    -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/select2/select2.css"/>
        <link href="<?php echo base_url(); ?>assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!--    <!-- CSS do plugin de validação    -->
        <!--    <link rel="stylesheet" type="text/css" href="--><?php //echo base_url();   ?><!--assets/formvalidation/dist/css/formValidation.css"/>-->
        <!-- Biblioteca JQuery     -->

        <style>
            html {
                position: relative;
                min-height: 100%;
            }
            body {
                /* Margin bottom by footer height */
                margin-bottom: 60px;
            }
            .footer {
                position: absolute;
                bottom: 0;
                width: 100%;
                /* Set the fixed height of the footer here */
                height: 60px;
                background-color: #101010;
                color: #FFF;
            }


            /* Custom page CSS
            -------------------------------------------------- */
            /* Not required for template or sticky footer method. */

            body > .container {
                padding: 20px 15px 0;
            }


            .footer > .container {
                padding-right: 15px;
                padding-left: 15px;
            }

            .select2-choice {
                height: 34px !important;
            }

            .select2-chosen {
                margin-top: 3px;
            }

            .panel-sisalbatroz {
                border-color: #333;
            }

            .panel-sisalbatroz > .panel-heading {
                color: #333;
                background-color: #333;
                border-color: #333;
                height: 35px;
            }

            .hr-sisalbatroz {
                border-top: 1px solid #3D3D3D;
            }

            .panel-interno-sisalbatroz {
                border-color: #3D3D3D;
            }

            .panel-interno-sisalbatroz > .panel-heading {
                color: #3D3D3D;
                background-color: #3D3D3D;
                border-color: #3D3D3D;
                height: 35px;
            }

            .panel-interno-sisalbatroz > .panel-heading > span {
                color: #FFF;
            }

            .panel-close-button-sisalbatroz {
                color: #FFF;
            }

            .panel-close-button-sisalbatroz:hover {
                color: #DADADA;
            }

            .btn-add-sisalbatroz {
                color: #fff;
                background-color: #989998;
                border-color: #989998;
            }
        </style>

        <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.2.js"></script>
        <!-- Biblioteca Bootstrap    -->
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/system.js"></script>
        <script src="<?php echo base_url(); ?>assets/select2/select2.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/addPrototype.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.blockUI.js" type="text/javascript" ></script>
        <script src="<?php echo base_url(); ?>assets/bootbox-master/bootbox.js" type="text/javascript" ></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.maskMoney.min.js" type="text/javascript" ></script>
        

        <!--    <!-- Biblioteca do Plugin de Validação JQuery e classe suporte do Bootstrap    -->
        <!--    <script src="--><?php //echo base_url();   ?><!--assets/formvalidation/dist/js/formValidation.js"></script>-->
        <!--    <script src="--><?php //echo base_url();   ?><!--assets/formvalidation/dist/js/framework/bootstrap.js"></script>-->
        <!--    <!-- Biblioteca de linguagem local para as mensagens de validação do form       -->
        <!--    <script src="--><?php //echo base_url();   ?><!--assets/formvalidation/dist/js/language/pt_BR.js"></script>-->

        <!-- JS dos campos dinâmicos do formulário    -->
        <script src="<?php echo base_url(); ?>assets/js/clone_form.js"></script>
        <!-- JS para vaidação do formulário    -->
    <!--    <script src="--><?php //echo base_url();   ?><!--assets/js/validate.js"></script>-->

        <script>
            var URL = "<?php echo site_url(); ?>";
        </script>
    </head>

    <body>
        <?php echo $this->load->view('menu'); ?>
        <header id="header" class="masthead">
            <img src="<?php echo base_url(); ?>assets/img/banner.jpg" alt="banner">
        </header>
        <div class="container"><?php echo $output; ?></div>


        <footer class="footer">
            <div class="container">
                <p class="text-muted" style="margin-top: 10px;">
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