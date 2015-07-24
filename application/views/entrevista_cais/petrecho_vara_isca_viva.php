<?php $petrechoVaraIscaViva = $petrechoVaraIscaViva instanceof PetrechoVaraIscaViva ? $petrechoVaraIscaViva : new PetrechoVaraIscaViva() ?>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="petrecho_vara_isca_viva_dias_isca" class="col-md-4 control-label">Dias na isca</label>
            <div class="col-md-8 div-help">
                <input type="number" class="form-control" id="petrecho_vara_isca_viva_dias_isca" name="petrecho_vara_isca_viva[dias_isca]" placeholder="Apenas dígitos" value="<?php echo $petrechoVaraIscaViva->getDiasIsca() ?>">
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="petrecho_vara_isca_viva_dias_capeando" class="col-md-4 control-label">Dias capeando</label>
            <div class="col-md-8 div-help">
                <input type="number" class="form-control" id="petrecho_vara_isca_viva_dias_capeando" name="petrecho_vara_isca_viva[dias_capeando]" placeholder="Apenas dígitos" value="<?php echo $petrechoVaraIscaViva->getDiasCapeando() ?>">
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="petrecho_vara_isca_viva_total_lances" class="col-md-4 control-label">Nº total de lances</label>
            <div class="col-md-8 div-help">
                <input type="number" class="form-control" id="petrecho_vara_isca_viva_total_lances" name="petrecho_vara_isca_viva[total_lances]" placeholder="Apenas dígitos" value="<?php echo $petrechoVaraIscaViva->getTotalLances() ?>">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="petrecho_vara_isca_viva_numero_pescadores" class="col-md-4 control-label">Nº de pescadores</label>
            <div class="col-md-8 div-help">
                <input type="number" class="form-control" id="petrecho_vara_isca_viva_numero_pescadores" name="petrecho_vara_isca_viva[numero_pescadores]" placeholder="Apenas dígitos" value="<?php echo $petrechoVaraIscaViva->getNumeroPescadores() ?>">
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="form-group">
            <label class="col-md-4 control-label">Boia</label>
            <div class="col-md-8 div-help">
                <div class="col-md-4 checkbox"><label><input type="checkbox" class="check-sim-nao" name="petrecho_vara_isca_viva[boia]" value="true" <?php echo $petrechoVaraIscaViva->getBoia() === true ? 'checked' : '' ?>>Sim</label></div>
                <div class="col-md-4 checkbox"><label><input type="checkbox" class="check-sim-nao" name="petrecho_vara_isca_viva[boia]" value="false" <?php echo $petrechoVaraIscaViva->getBoia() === false ? 'checked' : '' ?>>Não</label></div>
            </div>
        </div>
    </div>
</div>