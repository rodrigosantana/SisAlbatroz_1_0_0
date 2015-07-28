<!-- Definindo o tipo de arquivo que vai ser -->
<!DOCTYPE html PUBLIC>
<!-- Abre o arquivo html e define a linguagem padrão -->
<html lang="pt-br">
    <!-- Cabeçalho que não aparece para o usuário -->
    <head>
        <!-- Informações sobre o texto e caracteres -->
        <meta http-equiv="Content-type" content="text/hetml; charset=UTF-8">
        <title> SisAlbatroz </title>
        <!-- CSS customizado do form -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
        <!-- CSS do bootstrap    -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/select2/select2.css"/>
        <link href="<?php echo base_url(); ?>assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/openlayers/css/ol.css" type="text/css">
        <style>
            html {
                position: relative;
                min-height: 100%;
            }
            body {
                /* Margin bottom by footer height */
                margin-bottom: 100px;
            }
            .footer {
                position: absolute;
                bottom: 0;
                width: 100%;
                /* Set the fixed height of the footer here */
                min-height: 80px;
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
                border-color: #006633;
            }

            .panel-sisalbatroz > .panel-heading {
                color: #006633;
                background-color: #006633;
                border-color: #006633;
                height: 35px;
            }

            .hr-sisalbatroz {
                border-top: 1px solid #006633;
            }

            .panel-interno-sisalbatroz {
                border-color: #006633;
            }

            .panel-interno-sisalbatroz > .panel-heading {
                color: #006633;
                background-color: #006633;
                border-color: #006633;
                height: 35px;
            }

            .panel-interno-sisalbatroz > .panel-heading > span {
                color: #FFF;
            }

            .panel-sisalbatroz > .panel-heading > span {
                color: #FFF;
                font-size: 16px;
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

            .row-observador-bordo {
                margin-top: 10px;
            }

            .clickable {
                cursor: pointer;
                margin-right: 10px;
            }

            .th-table-checkbox {
                font-size: 14px;
            }

            .table-sisalbatroz td {
                border:none !important;
            }

            .table-sisalbatroz th {
                border:none !important;
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
        <script src="<?php echo base_url(); ?>assets/js/fieldmanagement.js" type="text/javascript" ></script>
        <script src="<?php echo base_url();?>assets/openlayers/build/ol.js"></script>
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
                    André Santoro | asantoro@projetoalbatroz.org.br<br>
                    Sistema desenvolvido por: Rodrigo Sant'Ana (rsantana@projetoalbatroz.org.br),
                    André Santoro (asantoro@projetoalbatroz.org.br) e Tiago Zis (tiagozis@gmail.com)
                </p>
            </div>
        </footer>
    </body>
    <script>
        $(document).ready(function() {
            $('.panel-heading span.clickable').on("click", function (e) {
                if ($(this).hasClass('panel-collapsed')) {
                    // expand the panel
                    $(this).closest('.panel').find('.panel-body').slideDown();
                    $(this).removeClass('panel-collapsed');
                    $(this).find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
                }
                else {
                    // collapse the panel
                    $(this).closest('.panel').find('.panel-body').slideUp();
                    $(this).addClass('panel-collapsed');
                    $(this).find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
                }
            });
        });
    </script>
</html>
