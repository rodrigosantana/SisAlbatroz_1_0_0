<form class="form-horizontal" role="form" action="<?php echo site_url('medicinaconservacao/filter'); ?>" method="post">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="codigo" class="col-md-3 control-label">Código
                </label>
                <div class="col-md-9 div-help">
                    <input type="number" step="any" class="form-control lance_long" id="codigo" name="codigo" value="<?php echo isset($filtro['codigo']) ? $filtro['codigo'] : '' ?>">
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="etiqueta" class="col-md-3 control-label">Etiqueta</label>
                <div class="col-md-9 div-help">
                    <input type="text" class="form-control" id="etiqueta" name="etiqueta" value="<?php echo isset($filtro['etiqueta']) ? $filtro['etiqueta'] : '' ?>" maxlength="50">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="etiqueta_antiga" class="col-md-3 control-label">Etiqueta antiga</label>
                <div class="col-md-9 div-help">
                    <input type="text" class="form-control" id="etiqueta_antiga" name="etiqueta_antiga" value="<?php echo isset($filtro['etiqueta_antiga']) ? $filtro['etiqueta_antiga'] : '' ?>" maxlength="50">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="especie" class="col-md-3 control-label">Espécie</label>
                <div class="col-md-9 div-help">
                    <select class="select2" style="width: 100%" id="especie" name="especie">
                        <option></option>
                        <?php foreach ($aves as $ave): ?>
                            <?php $selected = (!empty($filtro['especie']) && (int)$filtro['especie'] == $ave->getId()) ? 'selected' : ''?>
                            <option value="<?php echo $ave->getId() ?>" <?php echo $selected?>><?php echo $ave->__toString() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="responsavel" class="col-md-3 control-label">Responsável</label>
                <div class="col-md-9 div-help">
                    <input type="text" class="form-control" id="responsavel" name="responsavel" value="<?php echo isset($filtro['responsavel']) ? $filtro['responsavel'] : '' ?>" maxlength="150">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="data_entrada" class="col-md-3 control-label">Data de entrada</label>
                <div class="col-md-9 div-help">
                    <input type="date" class="form-control" id="data_entrada" name="data_entrada" value="<?php echo isset($filtro['data_entrada']) ? $filtro['data_entrada'] : '' ?>">
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="data_captura" class="col-md-3 control-label">Data de captura</label>
                <div class="col-md-9 div-help">
                    <input type="date" class="form-control" id="data_captura" name="data_captura" value="<?php echo isset($filtro['data_captura']) ? $filtro['data_captura'] : '' ?>">
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo site_url('medicinaconservacao/clearfilter')?>" class="btn btn-default btn_sub pull-right">Limpar filtro</a>
            <button type="submit" id="btnSub" name="btnSub" class="btn btn-primary btn_sub pull-right" onclick="" style="margin-right: 10px">Filtrar</button>            
        </div>
    </div>
</form>




<script>
    $(document).ready(function() {

        $("#especie").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado"
            }
        });
    });
</script>