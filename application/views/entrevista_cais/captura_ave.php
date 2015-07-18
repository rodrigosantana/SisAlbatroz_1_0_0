<?php $numeroCaptura = isset($indexCaptura) ? $indexCaptura : '$$numero$$' ?>

<div class="row capturas_aves">
    <div class="col-md-7 col-sm-8 insertaction">
        <div class="form-group">
            <label for="capturas_aves_<?php echo $numeroCaptura?>_especie" class="col-md-3 control-label">Espécie *</label>
            <div class="col-md-9 div-help">
                <select class="select2" style="width: 100%" id="capturas_aves_<?php echo $numeroCaptura?>_especie" name="capturas_aves[<?php echo $numeroCaptura?>][especie]">
                    <option></option>
                    <?php foreach ($aves as $ave): ?>
                        <?php $selected = (!is_null($capturaAve->getEspecie()) && $capturaAve->getEspecie()->getId() == $ave->getId()) ? 'selected' : ''?>
                        <option value="<?php echo $ave->getId() ?>" <?php echo $selected?>><?php echo $ave->__toString() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 col-sm-3">
        <div class="form-group">
            <label for="capturas_aves_<?php echo $numeroCaptura?>_quantidade" class="col-md-4 control-label">Quantidade</label>
            <div class="col-md-8 div-help">
                <input type="number" class="form-control" id="capturas_aves_<?php echo $numeroCaptura?>_quantidade" name="capturas_aves[<?php echo $numeroCaptura?>][quantidade]" placeholder="Apenas dígitos" value="<?php echo $capturaAve->getQuantidade()?>">
            </div>
        </div>
    </div>
    
    <div class="col-md-1 col-sm-1">
        <a href="javascrit:;" class="btn btn-danger" id="remove-capturas-aves-<?php echo $numeroCaptura?>" style="font-size: 19px;"><i class="glyphicon glyphicon-remove"></i></a>
    </div>
</div>


<script>
    $(document).ready(function (){
        $("#capturas_aves_<?php echo $numeroCaptura?>_especie").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
    });
</script>


