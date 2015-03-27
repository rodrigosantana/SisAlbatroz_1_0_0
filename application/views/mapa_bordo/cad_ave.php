<div class="container-fluid">
    <?php if (isset($mensagem) && $mensagem === true): ?>
        <div class="col-md-4 col-md-offset-4 alert alert-success alert-dismissible" role="alert" style="margin-top: 20px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            <p><strong>Sucesso!</strong><p> 
                Registro salvo com sucesso.
        </div>  
    <?php endif; ?>

    <div class="row">
        <div class="col-md-12">
            <h2 class="text-left titulo">Cadastro de Aves Marinhas</h2>
        </div>
    </div>

    <?php if (validation_errors() != '') : ?>   
        <div class="row">
            <div class="col-md-12">
                <?php echo validation_errors(); ?>
            </div>
        </div>    
    <?php endif; ?>


    <form class="form-horizontal" role="form" id="form" action="<?php echo base_url(); ?>index.php/cad_ave_ct/salva"
          method="post">
        <input type="hidden" id="id_ave" name="id_ave" value="">
        <div class="panel panel-sisalbatroz">
            <div class="panel-heading"></div>    
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nome" class="col-md-4 control-label">Nome comum:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="nome_br" name="nome_br" placeholder="Nome popular" value="<?php echo set_value('nome_br'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nome_us" class="col-md-4 control-label">Nome comum em  inglês: </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="nome_en" name="nome_en" placeholder="Nome popular em inglês" value="<?php echo set_value('nome_en'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="spp" class="col-md-4 control-label">Nome Científico:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="nome_cient" name="nome_cient" placeholder="Atenção a ortografia" value="<?php echo set_value('nome_cient'); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12" style="margin-bottom: 20px">
            <button type="submit" id="btnSub" name="btnSub"
                    class="btn btn-primary btn-lg btn_sub" >Submeter</button>
        </div>
    </form>
</div>