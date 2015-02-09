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
<!-- Início do corpo da página -->
<div class="container-fluid">
    <?php if (isset($mensagem)): ?>
        <div class="alert alert-success text-center" role="alert"><strong><?php echo $mensagem ?></strong></div>
    <?php endif;?>
    <br>
    <div class="col-sm-12 col-lg-12">
        <h1 class="text-left titulo">Cadastro de Embarcação</h1>
        <hr>
    </div>
    <!-- Visualizar erros de validação de form do CI    -->
    <?php echo validation_errors();?>
    <form class="form-horizontal" role="form" id="form" method="post"
          action="<?php echo base_url();?>index.php/cad_barco_ct/salva">
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
            <!--            Todo select do basilar de petrechos -->
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="aut_pesca" class="col-md-4 control-label"> Autorização de Pesca:</label>
                    <div class="col-md-8">
                        <select class="form-control base" name="aut_pesca" id="aut_pesca">
                            <option value =""           >Selecione     </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="registro" class="col-md-4 control-label">
                        Registro da Marinha:</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="registro" name="registro"
                               value="<?php echo set_value('registro');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="rgp" class="col-md-4 control-label">
                        Número do RGP:</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="rgp" name="rgp"
                               value="<?php echo set_value('rgp');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="Comprimento" class="col-md-4 control-label">Comprimento (m):</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="comp" name="comp" placeholder="Ex:18,23"
                               value="<?php echo set_value('comp');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="arq_bruta" class="col-md-4 control-label">
                        Arqueação Bruta:</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="arq_bruta" name="arq_bruta"
                            placeholder="Não possui unidade" value="<?php echo set_value('arq_bruta');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="fabricacao" class="col-md-4 control-label">
                        Ano de Fabricação:</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="fabricacao" name="fabricacao"
                               placeholder="ex: 1990" value="<?php echo set_value('fabricacao');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="base" class="col-md-4 control-label"> Material do Caso:</label>
                    <div class="col-md-8">
                        <select class="form-control base" name="material" id="material">
                            <option value =""           >Selecione     </option>
                            <option value ="aço"<?php echo set_select('material','aço');?>        >Aço</option>
                            <option value ="fibra_vidro"<?php echo set_select('material','fibra_vidro');?>
                                >Fibra de Vidro</option>
                            <option value ="madeira"<?php echo set_select('material','madeira');?>>Madeira</option>
                         </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="propul" class="col-md-4 control-label">Propulsão:</label>
                    <div class="col-md-8">
                        <select class="form-control base" name="propul" id="propul">
                            <option value =""           >Selecione     </option>
                            <option value ="motor"<?php echo set_select('propul','motor');?>>Motor</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="potenc" class="col-md-4 control-label">Potência do Motor (hp):</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="potenc" name="potenc"
                            value="<?php echo set_value('potenc');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="tripulacao" class="col-md-4 control-label">Tripulação Máxima:</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="tripulacao" name="tripulacao"
                            value="<?php echo set_value('tripulacao');?>">
                    </div>
                </div>
            </div>
<!--            Todo select do basilar a partir do RGP -->
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="base" class="col-md-4 control-label"> UF - Município:</label>
                    <div class="col-md-8">
                        <select class="form-control base" name="uf" id="uf">
                            <option value =""           >Selecione     </option>
                        </select>
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
</html>
