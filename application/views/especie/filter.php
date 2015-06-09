<form class="form-horizontal" role="form" action="<?php echo site_url('especie/filter'); ?>" method="post">
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nome" class="col-md-4 control-label">Nome comum</label>
                <div class="col-md-8 div-help">
                    <input type="text" class="form-control" id="nome_br" name="nome_br" maxlength="100" value="<?php echo isset($filtro['nome_br']) ? $filtro['nome_br'] : '' ?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="nome_us" class="col-md-4 control-label">Nome comum em inglês</label>
                <div class="col-md-8 div-help">
                    <input type="text" class="form-control" id="nome_en" name="nome_en" maxlength="100" value="<?php echo isset($filtro['nome_en']) ? $filtro['nome_en'] : '' ?>">
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="spp" class="col-md-4 control-label">Nome Científico</label>
                <div class="col-md-8 div-help">
                    <input type="text" class="form-control" id="nome_cient" name="nome_cient" maxlength="100" value="<?php echo isset($filtro['nome_cient']) ? $filtro['nome_cient'] : '' ?>">
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="tipo" class="col-md-4 control-label">Tipo</label>
                <div class="col-md-8 div-help">
                    <select class="select2" id="tipo" name="tipo" style="width: 100%">
                        <option></option>
                        <?php foreach ($types as $key => $type): ?>
                            <?php $selected = (isset($filtro['tipo']) && $filtro['tipo'] == $key ) ? 'selected' : '' ?>
                            <option value="<?php echo $key ?>" <?php echo $selected; ?>><?php echo $type ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
        
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo site_url('especie/clearfilter')?>" class="btn btn-default btn_sub pull-right">Limpar filtro</a>
            <button type="submit" id="btnSub" name="btnSub" class="btn btn-primary btn_sub pull-right" onclick="" style="margin-right: 10px">Filtrar</button>            
        </div>
    </div>
</form>




<script>
    $(document).ready(function() {

        $("#tipo").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado"
            }
        });
    });
</script>