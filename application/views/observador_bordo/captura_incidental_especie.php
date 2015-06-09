<?php $numero2 = isset($indexCapturaIncidentalEspecie) ? $indexCapturaIncidentalEspecie : '$$numero2$$' ?>

<div class="row captura-incidental-especie">
    <div class="col-md-4">
        <div class="form-group">
            <label for="captura_incidental_<?php echo $numero; ?>_ci_especie_<?php echo $numero2?>_etiqueta" class="col-md-4 control-label">Etiqueta</label>
            <div class="col-md-8 div-help">
                <input type="number" class="form-control" id="captura_incidental_<?php echo $numero; ?>_ci_especie_<?php echo $numero2?>_etiqueta" name="captura_incidental[<?php echo $numero; ?>][ci_especie][<?php echo $numero2?>][etiqueta]" placeholder="Apenas dígitos" value="<?php echo $capturaIncidentalEspecie->getEtiqueta()?>">
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="captura_incidental_<?php echo $numero; ?>_ci_especie_<?php echo $numero2?>_especie" class="col-md-4 control-label">Espécie</label>
            <div class="col-md-8 div-help">
                <select class="select2" style="width: 100%" id="captura_incidental_<?php echo $numero; ?>_ci_especie_<?php echo $numero2?>_especie" name="captura_incidental[<?php echo $numero; ?>][ci_especie][<?php echo $numero2?>][especie]">
                    <option></option>
                    <?php foreach ($aves as $ave): ?>
                        <?php $selected = (!is_null($capturaIncidentalEspecie->getEspecie()) && $capturaIncidentalEspecie->getEspecie()->getId() == $ave->getId()) ? 'selected' : ''?>
                        <option value="<?php echo $ave->getId() ?>" <?php echo $selected?>><?php echo $ave->__toString() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="captura_incidental_<?php echo $numero; ?>_ci_especie_<?php echo $numero2?>_quantidade" class="col-md-4 control-label">Quantidade</label>
            <div class="col-md-8 div-help">
                <input type="number" class="form-control" id="captura_incidental_<?php echo $numero; ?>_ci_especie_<?php echo $numero2?>_quantidade" name="captura_incidental[<?php echo $numero; ?>][ci_especie][<?php echo $numero2?>][quantidade]" placeholder="Apenas dígitos" value="<?php echo $capturaIncidentalEspecie->getQuantidade()?>">
            </div>
        </div>
    </div>
    
    <div class="col-md-1 col-sm-1">
        <a href="javascrit:;" class="btn btn-danger" id="remove-captura-incidental-especie-<?php echo $numero ?>-<?php echo $numero2?>" style="font-size: 19px;"><i class="glyphicon glyphicon-remove"></i></a>
    </div>
</div>

<script>
    $(document).ready(function (){
        $("#captura_incidental_<?php echo $numero; ?>_ci_especie_<?php echo $numero2?>_especie").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
    });
</script>