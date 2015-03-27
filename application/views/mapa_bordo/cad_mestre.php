<div class="container-fluid">
    <?php if (isset($mensagem)): ?>
    <div class="alert alert-success text-center" role="alert"><strong><?php echo $mensagem ?></strong></div>
<?php endif;?>
<br>
<div class="col-sm-12 col-lg-12">
    <h1 class="text-left titulo">Cadastro de Mestre</h1>
    <hr>
</div>
<!-- Visualizar erros de validação de form do CI    -->
<?php echo validation_errors();?>
</br>
<form class="form-horizontal" role="form" id="form" action="<?php echo base_url();?>index.php/cad_mestre_ct/salva"
      method="post">
    <input type="hidden" id="id_mb" name="id_mb" value="">
    <div class="row">
        <div class="col-sm-6 col-lg-4">
            <div class="form-group">
                <label for="mestre" class="col-md-4 control-label">Nome:</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do mestre"
                           value="<?php echo set_value('nome');?>">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="form-group">
                <label for="apelido" class="col-md-4 control-label">Apelido: </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="apelido" name="apelido" placeholder="Caso não tenha, repetir no nome"
                           value="<?php echo set_value('apelido');?>">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="form-group">
                <label for="telefone" class="col-md-4 control-label">Telefone:</label>
                <div class="col-md-8">
                    <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Ex: 4797444182"
                           value="<?php echo set_value('telefone');?>">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="form-group">
                <label for="email" class="col-md-4 control-label">E-mail:</label>
                <div class="col-md-8">
                    <input type="email" class="form-control" id="email" name="email"
                           value="<?php echo set_value('email');?>">
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