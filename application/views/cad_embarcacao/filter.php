<form class="form-horizontal" role="form" action="<?php echo site_url('cad_embarcacao_ct/filter'); ?>" method="post">

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nome" class="col-md-4 control-label">Nome</label>
                <div class="col-md-8 div-help div-help">
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo isset($filtro['nome']) ? $filtro['nome'] : '' ?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="aut_pesca" class="col-md-4 control-label">Autorização de Pesca</label>
                <div class="col-md-8 div-help">
                    <select class="select2" name="aut_pesca" id="aut_pesca">
                        <option></option>
                        <?php foreach ($auto_pesca as $autorizPesca): ?>
                            <?php $selected = (!empty($filtro['aut_pesca']) && (int)$filtro['aut_pesca'] == $autorizPesca->getId()) ? 'selected' : '' ?>
                            <option value="<?php echo $autorizPesca->getId() ?>" <?php echo $selected ?>><?php echo $autorizPesca->getDescricao() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="registro" class="col-md-4 control-label">Registro da Marinha</label>
                <div class="col-md-8 div-help">
                    <input type="number" class="form-control" id="reg_marinha" name="reg_marinha" value="<?php echo isset($filtro['reg_marinha']) ? $filtro['reg_marinha'] : '' ?>">
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="rgp" class="col-md-4 control-label">Número do RGP</label>
                <div class="col-md-8 div-help">
                    <input type="number" class="form-control" id="reg_mpa" name="reg_mpa" value="<?php echo isset($filtro['reg_mpa']) ? $filtro['reg_mpa'] : '' ?>">
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo site_url('cad_embarcacao_ct/clearfilter')?>" class="btn btn-default btn_sub pull-right">Limpar filtro</a>
            <button type="submit" id="btnSub" name="btnSub" class="btn btn-primary btn_sub pull-right" onclick="" style="margin-right: 10px">Filtrar</button>            
        </div>
    </div>
</form>
<script>
    $(document).ready(function() {

        $(".select2").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado"
            }
        });

    });
</script>
