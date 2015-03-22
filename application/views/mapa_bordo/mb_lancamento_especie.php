<?php $numeroEp = isset($indexEp) ? $indexEp : '$$numero2$$' ?>
<div class="row captura">
    <div class="col-sm-6 col-md-6">
        <div class="form-group">
            <label for="capt_spp" class="col-md-3 control-label lb_capt_spp">Espécie</label>
            <div class="col-md-9">
                <select class="select2" style="width: 100%" id="lancamento_<?php echo $numero; ?>_capt_spp_<?php echo $numeroEp?>" name="lancamento[<?php echo $numero; ?>][capt_ssp][<?php echo $numeroEp?>]">
                    <option></option>
                    <?php foreach ($aves as $cad_ave): ?>
                        <option value="<?php echo $cad_ave->getAveId() ?>"><?php echo $cad_ave->getAveNome() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-5 col-md-5">
        <div class="form-group">
            <label for="capt_quant" class="col-md-3 control-label lb_capt_quant">Quantidade</label>
            <div class="col-md-9">
                <input type="number" class="form-control capt_quant" id="lancamento_<?php echo $numero; ?>_capt_quan_<?php echo $numeroEp?>" name="lancamento[<?php echo $numero; ?>][capt_quan][<?php echo $numeroEp?>]" value="">
            </div>
        </div>
    </div>
    <div class="col-md-1 col-sm-1">
        <a href="javascrit:;" class="btn btn-danger" id="remove-captura-<?php echo $numero . '-' . $numeroEp?>" style="font-size: 19px;"><i class="glyphicon glyphicon-remove"></i></a>
    </div>
</div>

<script>
    $(document).ready(function (){
        $("#lancamento_<?php echo $numero; ?>_capt_spp_<?php echo $numeroEp?>").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado"
            }
        });
    });
</script>