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
            <h2 class="text-left titulo">Cadastro de Espécie</h2>
        </div>
    </div>

    <form class="form-horizontal" role="form" id="form" action="<?php echo site_url('especie/salva'); ?>" method="post">
        <input type="hidden" id="id" name="id" value="<?php echo $especie->getId()?>">

        <div class="panel panel-sisalbatroz">
            <div class="panel-heading"></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nome" class="col-md-4 control-label">Nome comum *</label>
                            <div class="col-md-8 div-help">
                                <input type="text" class="form-control" id="nome_br" name="nome_br" maxlength="100" placeholder="Nome popular *" value="<?php echo $especie->getNomeComumBr(); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nome_us" class="col-md-4 control-label">Nome comum em inglês</label>
                            <div class="col-md-8 div-help">
                                <input type="text" class="form-control" id="nome_en" name="nome_en" maxlength="100" placeholder="Nome popular em inglês" value="<?php echo $especie->getNomeComumEn(); ?>">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="spp" class="col-md-4 control-label">Nome Científico *</label>
                            <div class="col-md-8 div-help">
                                <input type="text" class="form-control" id="nome_cient" name="nome_cient" maxlength="100" placeholder="Atenção a ortografia" value="<?php echo $especie->getNomeCientifico(); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tipo" class="col-md-4 control-label">Tipo *</label>
                            <div class="col-md-8 div-help">
                                <select class="select2" id="tipo" name="tipo" style="width: 100%">
                                    <option></option>
                                    <?php foreach ($types as $key => $type): ?>
                                        <?php $selected = (get_class($especie) == $key ) ? 'selected' : '' ?>
                                        <option value="<?php echo $key ?>" <?php echo $selected; ?>><?php echo $type ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="col-sm-12 col-md-12" style="margin-bottom: 20px">
            <button type="button" id="btnSub" name="btnSub" class="btn btn-primary btn-lg btn_sub" onclick="return validation('especie', this)">Salvar</button>
            <a href="<?php echo site_url('especie')?>" class="btn btn-default btn-lg btn_sub">Cancelar</a>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $("#tipo").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
    });
</script>
