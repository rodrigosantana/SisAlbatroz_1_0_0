<?php $numeroEp = isset($indexEp) ? $indexEp : '$$numero2$$' ?>
<?php //$mbCaptura = new MbCaptura();?>
<div class="row captura">
    <div class="col-sm-6 col-md-6">
        <div class="form-group">
            <label for="lancamento_<?php echo $numero; ?>_capt_especie_<?php echo $numeroEp?>_capt_spp" class="col-md-3 col-sm-4 control-label lb_capt_spp">Espécie</label>
            <div class="col-md-9 col-sm-8 div-help">
                <select class="select2 insertaction" style="width: 100%" id="lancamento_<?php echo $numero; ?>_capt_especie_<?php echo $numeroEp?>_capt_spp" name="lancamento[<?php echo $numero; ?>][capt_especie][<?php echo $numeroEp?>][capt_ssp]">
                    <option></option>
                    <?php foreach ($aves as $ave): ?>
                        <?php $selected = (!is_null($mbCaptura->getIdAve()) && $mbCaptura->getIdAve()->getId() == $ave->getId()) ? 'selected' : ''?>
                        <option value="<?php echo $ave->getId() ?>" <?php echo $selected?>><?php echo $ave->__toString() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-4 col-md-5">
        <div class="form-group">
            <label for="lancamento_<?php echo $numero; ?>_capt_especie_<?php echo $numeroEp?>_capt_quan" class="col-md-3 col-sm-4 control-label lb_capt_quant">Quantidade</label>
            <div class="col-md-9 col-sm-8 div-help">
                <input type="number" class="form-control capt_quant" id="lancamento_<?php echo $numero; ?>_capt_especie_<?php echo $numeroEp?>_capt_quan" name="lancamento[<?php echo $numero; ?>][capt_especie][<?php echo $numeroEp?>][capt_quan]" value="<?php echo $mbCaptura->getQuantidade()?>">
            </div>
        </div>
    </div>
    <div class="col-md-1 col-sm-1">
        <a href="javascrit:;" class="btn btn-danger" id="remove-captura-<?php echo $numero . '-' . $numeroEp?>" style="font-size: 19px;"><i class="glyphicon glyphicon-remove"></i></a>
    </div>
</div>

<script>
    $(document).ready(function (){
        $("#lancamento_<?php echo $numero; ?>_capt_especie_<?php echo $numeroEp?>_capt_spp").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado"
            }
        });
    });
</script>