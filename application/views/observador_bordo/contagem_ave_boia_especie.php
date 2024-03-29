<?php $numero2 = isset($indexContagemAveBoiaEspecie) ? $indexContagemAveBoiaEspecie : '$$numero2$$' ?>

<div class="row contagem-ave-boia-especie">
    <div class="col-md-7 col-sm-8 insertaction">
        <div class="form-group">
            <label for="contagem_ave_boia_<?php echo $numero?>_cab_especie_<?php echo $numero2?>_especie" class="col-md-3 control-label">Espécie</label>
            <div class="col-md-9 div-help">
                <select class="select2" style="width: 100%" id="contagem_ave_boia_<?php echo $numero?>_cab_especie_<?php echo $numero2?>_especie" name="contagem_ave_boia[<?php echo $numero?>][cab_especie][<?php echo $numero2?>][especie]">
                    <option></option>
                    <?php foreach ($aves as $ave): ?>
                        <?php $selected = (!is_null($contagemAveBoiaEspecie->getEspecie()) && $contagemAveBoiaEspecie->getEspecie()->getId() == $ave->getId()) ? 'selected' : ''?>
                        <option value="<?php echo $ave->getId() ?>" <?php echo $selected?>><?php echo $ave->__toString() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 col-sm-3">
        <div class="form-group">
            <label for="contagem_ave_boia_<?php echo $numero?>_cab_especie_<?php echo $numero2?>_quantidade" class="col-md-4 control-label">Quantidade</label>
            <div class="col-md-8 div-help">
                <input type="number" class="form-control" id="contagem_ave_boia_<?php echo $numero?>_cab_especie_<?php echo $numero2?>_quantidade" name="contagem_ave_boia[<?php echo $numero?>][cab_especie][<?php echo $numero2?>][quantidade]" placeholder="Apenas dígitos" value="<?php echo $contagemAveBoiaEspecie->getQuantidade()?>">
            </div>
        </div>
    </div>
    
    <div class="col-md-1 col-sm-1">
        <a href="javascrit:;" class="btn btn-danger" id="remove-contagem-ave-boia-especie-<?php echo $numero . '-' . $numero2?>" style="font-size: 19px;"><i class="glyphicon glyphicon-remove"></i></a>
    </div>
</div>


<script>
    $(document).ready(function (){
        $("#contagem_ave_boia_<?php echo $numero?>_cab_especie_<?php echo $numero2?>_especie").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
    });
</script>


