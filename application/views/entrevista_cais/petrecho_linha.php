<?php $petrechoLinha = $petrechoLinha instanceof PetrechoLinha ? $petrechoLinha : new PetrechoLinha() ?>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="petrecho_linha_numero_linhas" class="col-md-4 control-label">Nº de linhas</label>
            <div class="col-md-8 div-help">
                <input type="number" class="form-control" id="petrecho_linha_numero_linhas" name="petrecho_linha[numero_linhas]" placeholder="Apenas dígitos" value="<?php echo $petrechoLinha->getNumeroLinhas() ?>">
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="petrecho_linha_numero_anzois_por_linha" class="col-md-4 control-label">Nº de anzois por linha</label>
            <div class="col-md-8 div-help">
                <input type="number" class="form-control" id="petrecho_linha_numero_anzois_por_linha" name="petrecho_linha[numero_anzois_por_linha]" placeholder="Apenas dígitos" value="<?php echo $petrechoLinha->getNumeroAnzoisPorLinha() ?>">
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="petrecho_linha_numero_lances_por_dia" class="col-md-4 control-label">Nº de lances por dia</label>
            <div class="col-md-8 div-help">
                <input type="number" class="form-control" id="petrecho_linha_numero_lances_por_dia" name="petrecho_linha[numero_lances_por_dia]" placeholder="Apenas dígitos" value="<?php echo $petrechoLinha->getNumeroLancesPorDia() ?>">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="col-md-6 control-label">Regime de trabalho:</label>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="petrecho_linha_hora_inicial" class="col-md-4 control-label">Hora inicial</label>
            <div class="col-md-8 div-help">
                <input type="time" class="form-control" id="petrecho_linha_hora_inicial" name="petrecho_linha[hora_inicial]" value="<?php echo is_null($petrechoLinha->getHoraInicial()) ? '' : $petrechoLinha->getHoraInicial()->format("H:i") ?>">
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="petrecho_linha_hora_final" class="col-md-4 control-label">Hora final</label>
            <div class="col-md-8 div-help">
                <input type="time" class="form-control" id="petrecho_linha_hora_final" name="petrecho_linha[hora_final]" value="<?php echo is_null($petrechoLinha->getHoraFinal()) ? '' : $petrechoLinha->getHoraFinal()->format("H:i") ?>">
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="col-md-4 control-label">Tipo de petrechos utilizados para a viagem:</label>
            <div class="col-md-8 div-help">
                <div class="col-md-2 checkbox"><label><input type="checkbox" name="petrecho_linha[tipo_petrecho_utilizado][]" value="<?php echo Utils::PARGUEIRA ?>" <?php echo in_array(Utils::PARGUEIRA, $petrechoLinha->getTipoPetrechoUtilizado())? 'checked' : '' ?>>Pargueira</label></div>
                <div class="col-md-3 checkbox"><label><input type="checkbox" name="petrecho_linha[tipo_petrecho_utilizado][]" value="<?php echo Utils::LINHA_DE_MAO ?>" <?php echo in_array(Utils::LINHA_DE_MAO, $petrechoLinha->getTipoPetrechoUtilizado()) ? 'checked' : '' ?>>Linha de mão</label></div>
                <div class="col-md-2 checkbox"><label><input type="checkbox" name="petrecho_linha[tipo_petrecho_utilizado][]" value="<?php echo Utils::ESPINHEL ?>" <?php echo in_array(Utils::ESPINHEL, $petrechoLinha->getTipoPetrechoUtilizado()) ? 'checked' : '' ?>>Espinhel</label></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="petrecho_linha_outros" class="col-md-1 control-label">Outros</label>
            <div class="col-md-11 div-help">
                <textarea class="form-control" id="petrecho_linha_outros" name="petrecho_linha[outros]"><?php echo $petrechoLinha->getOutros() ?></textarea>
            </div>
        </div>
    </div>
</div>