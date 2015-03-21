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
    </br>
    <form class="form-horizontal" role="form" id="form" method="post"
          action="<?php echo base_url();?>index.php/cad_embarcacao_ct/salva">
        <input type="hidden" id="id_barco" name="id_barco" value="">
        <div class="row">
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="nome" class="col-md-4 control-label">Nome: </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: Marbella I" value="<?php echo set_value('nome');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="aut_pesca" class="col-md-4 control-label"> Autorização de Pesca:</label>
                    <div class="col-md-8">
                        <select class="form-control base" name="aut_pesca" id="aut_pesca">
                            <option value ="">Selecione     </option>
                            <?php foreach ($auto_pesca as $autorizPesca): ?>
                                <option value="<?php echo $autorizPesca->getModalidade()?>"><?php echo $autorizPesca->getDescricao()?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="registro" class="col-md-4 control-label">
                        Registro da Marinha:</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="reg_marinha" name="reg_marinha" value="<?php echo set_value('reg_marinha');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="rgp" class="col-md-4 control-label">
                        Número do RGP:</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="reg_mpa" name="reg_mpa" value="<?php echo set_value('reg_mpa');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="Comprimento" class="col-md-4 control-label">Comprimento (m):</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="comprimento" name="comprimento" placeholder="Ex:18,23" value="<?php echo set_value('comprimento');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="arq_bruta" class="col-md-4 control-label">
                        Arqueação Bruta:</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="arq_bruta" name="arq_bruta" placeholder="Não possui unidade" value="<?php echo set_value('arq_bruta');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="fabricacao" class="col-md-4 control-label">
                        Ano de Fabricação:</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="ano_fab" name="ano_fab" placeholder="ex: 1990" value="<?php echo set_value('ano_fab');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="base" class="col-md-4 control-label"> Material do Caso:</label>
                    <div class="col-md-8">
                        <select class="form-control base" name="mat_casco" id="mat_casco">
                            <option value =""           >Selecione     </option>
                            <option value ="aço"<?php echo set_select('mat_casco','aço');?>>Aço</option>
                            <option value ="fibra_vidro"<?php echo set_select('mat_casco','fibr_vidro');?>>Fibra de Vidro</option>
                            <option value ="madeira"<?php echo set_select('mat_casco','madeira');?>>Madeira</option>
                         </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="propul" class="col-md-4 control-label">Propulsão:</label>
                    <div class="col-md-8">
                        <select class="form-control base" name="propulsao" id="propulsao">
                            <option value =""           >Selecione     </option>
                            <option value ="motor"<?php echo set_select('propulsao','motor');?>>Motor</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="potenc" class="col-md-4 control-label">Potência do Motor (hp):</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="pot_motor" name="pot_motor" value="<?php echo set_value('pot_motor');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="tripulacao" class="col-md-4 control-label">Tripulação Máxima:</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="tripulacao" name="tripulacao" value="<?php echo set_value('tripulacao');?>">
                    </div>
                </div>
            </div>
<!--            Todo select do basilar a partir do RGP -->
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="base" class="col-md-4 control-label">Município:</label>
                    <div class="col-md-8">
                        <select class="form-control base" name="municipio" id="municipio">
                            <option value =""           >Selecione     </option>
                            <option value ="Itajai">Itajaí</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="base" class="col-md-4 control-label">UF:</label>
                    <div class="col-md-8">
                        <select class="form-control base" name="uf" id="uf">
                            <option value =""           >Selecione     </option>
                            <option value ="SC"           >SC     </option>
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
