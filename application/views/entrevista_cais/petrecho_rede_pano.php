<?php $petrechoRedePano = $petrechoRedePano instanceof PetrechoRedePano ? $petrechoRedePano : new PetrechoRedePano() ?>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="col-md-1 control-label">Rede:</label>
            <div class="col-md-8 div-help">
                <div class="col-md-2 checkbox tipo-rede"><label><input type="checkbox" name="petrecho_rede_pano[tipo_rede]" value="<?php echo Utils::FUNDO ?>" <?php echo $petrechoRedePano->getTipoRede() == Utils::FUNDO ? 'checked' : '' ?>>Fundo</label></div>
                <div class="col-md-2 checkbox tipo-rede"><label><input type="checkbox" name="petrecho_rede_pano[tipo_rede]" value="<?php echo Utils::BOIADA ?>" <?php echo $petrechoRedePano->getTipoRede() == Utils::BOIADA ? 'checked' : '' ?>>Boiada</label></div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="petrecho_rede_pano_comprimento_pano" class="col-md-6 control-label">Comp. do pano (m)</label>
            <div class="col-md-6 div-help">
                <input type="number" class="form-control" id="petrecho_rede_pano_comprimento_pano" name="petrecho_rede_pano[comprimento_pano]" placeholder="Apenas dígitos" value="<?php echo $petrechoRedePano->getComprimentoPano() ?>">
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="petrecho_rede_pano_altura_pano" class="col-md-6 control-label">Altura do pano (m)</label>
            <div class="col-md-6 div-help">
                <input type="number" class="form-control" id="petrecho_rede_pano_altura_pano" name="petrecho_rede_pano[altura_pano]" placeholder="Apenas dígitos" value="<?php echo $petrechoRedePano->getAlturaPano() ?>">
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="petrecho_rede_pano_numero_panos_por_lance" class="col-md-6 control-label">Nº de panos por lance</label>
            <div class="col-md-6 div-help">
                <input type="number" class="form-control" id="petrecho_rede_pano_numero_panos_por_lance" name="petrecho_rede_pano[numero_panos_por_lance]" placeholder="Apenas dígitos" value="<?php echo $petrechoRedePano->getNumeroPanosPorLance() ?>">
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="col-md-2 control-label">Regime de trabalho:</label>
            <div class="col-md-8 div-help">
                <div class="col-md-2 checkbox regime-trabalho"><label><input type="checkbox" name="petrecho_rede_pano[regime_trabalho]" value="<?php echo Utils::INTEGRAL ?>" <?php echo $petrechoRedePano->getRegimeTrabalho() == Utils::INTEGRAL ? 'checked' : '' ?>>integral (24h)</label></div>
                <div class="col-md-2 checkbox regime-trabalho"><label><input type="checkbox" name="petrecho_rede_pano[regime_trabalho]" value="<?php echo Utils::DIURNO ?>" <?php echo $petrechoRedePano->getRegimeTrabalho() == Utils::DIURNO ? 'checked' : '' ?>>diurno</label></div>
                <div class="col-md-2 checkbox regime-trabalho"><label><input type="checkbox" name="petrecho_rede_pano[regime_trabalho]" value="<?php echo Utils::NOTURNO ?>" <?php echo $petrechoRedePano->getRegimeTrabalho() == Utils::NOTURNO ? 'checked' : '' ?>>noturno</label></div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="petrecho_rede_tempo_estimado_lancamento" class="col-md-6 control-label">Tempo estimado do lançamento</label>
            <div class="col-md-6 div-help">
                <input type="time" class="form-control" id="petrecho_rede_tempo_estimado_lancamento" name="petrecho_rede_pano[tempo_estimado_lancamento]" value="<?php echo is_null($petrechoRedePano->getTempoEstimadoLancamento()) ? '' : $petrechoRedePano->getTempoEstimadoLancamento()->format("H:i") ?>">
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="petrecho_rede_tempo_estimado_recolhimento" class="col-md-6 control-label">Tempo estimado do recolhimento</label>
            <div class="col-md-6 div-help">
                <input type="time" class="form-control" id="petrecho_rede_tempo_estimado_recolhimento" name="petrecho_rede_pano[tempo_estimado_recolhimento]" value="<?php echo is_null($petrechoRedePano->getTempoEstimadoRecolhimento()) ? '' : $petrechoRedePano->getTempoEstimadoRecolhimento()->format("H:i") ?>">
            </div>
        </div>
    </div>
</div>