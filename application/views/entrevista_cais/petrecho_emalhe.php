<?php $petrechoEmalhe = $petrechoEmalhe instanceof PetrechoEmalhe ? $petrechoEmalhe : new PetrechoEmalhe() ?>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="col-md-1 control-label">Rede:</label>
            <div class="col-md-8 div-help">
                <div class="col-md-2 checkbox tipo-rede"><label><input type="checkbox" name="petrecho_emalhe[tipo_rede]" value="<?php echo Utils::FUNDO ?>" <?php echo $petrechoEmalhe->getTipoRede() == Utils::FUNDO ? 'checked' : '' ?>>Fundo</label></div>
                <div class="col-md-2 checkbox tipo-rede"><label><input type="checkbox" name="petrecho_emalhe[tipo_rede]" value="<?php echo Utils::BOIADA ?>" <?php echo $petrechoEmalhe->getTipoRede() == Utils::BOIADA ? 'checked' : '' ?>>Boiada</label></div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="petrecho_emalhe_comprimento_pano" class="col-md-6 control-label">Comp. do pano (m)</label>
            <div class="col-md-6 div-help">
                <input type="number" class="form-control" id="petrecho_emalhe_comprimento_pano" name="petrecho_emalhe[comprimento_pano]" placeholder="Apenas dígitos" value="<?php echo $petrechoEmalhe->getComprimentoPano() ?>">
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="petrecho_emalhe_altura_pano" class="col-md-6 control-label">Altura do pano (m)</label>
            <div class="col-md-6 div-help">
                <input type="number" class="form-control" id="petrecho_emalhe_altura_pano" name="petrecho_emalhe[altura_pano]" placeholder="Apenas dígitos" value="<?php echo $petrechoEmalhe->getAlturaPano() ?>">
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="petrecho_emalhe_numero_panos_por_lance" class="col-md-6 control-label">Nº de panos por lance</label>
            <div class="col-md-6 div-help">
                <input type="number" class="form-control" id="petrecho_emalhe_numero_panos_por_lance" name="petrecho_emalhe[numero_panos_por_lance]" placeholder="Apenas dígitos" value="<?php echo $petrechoEmalhe->getNumeroPanosPorLance() ?>">
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="col-md-2 control-label">Regime de trabalho:</label>
            <div class="col-md-8 div-help">
                <div class="col-md-2 checkbox regime-trabalho"><label><input type="checkbox" name="petrecho_emalhe[regime_trabalho]" value="<?php echo Utils::INTEGRAL ?>" <?php echo $petrechoEmalhe->getRegimeTrabalho() == Utils::INTEGRAL ? 'checked' : '' ?>>integral (24h)</label></div>
                <div class="col-md-2 checkbox regime-trabalho"><label><input type="checkbox" name="petrecho_emalhe[regime_trabalho]" value="<?php echo Utils::DIURNO ?>" <?php echo $petrechoEmalhe->getRegimeTrabalho() == Utils::DIURNO ? 'checked' : '' ?>>diurno</label></div>
                <div class="col-md-2 checkbox regime-trabalho"><label><input type="checkbox" name="petrecho_emalhe[regime_trabalho]" value="<?php echo Utils::NOTURNO ?>" <?php echo $petrechoEmalhe->getRegimeTrabalho() == Utils::NOTURNO ? 'checked' : '' ?>>noturno</label></div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="petrecho_cerco_tempo_estimado_lancamento" class="col-md-6 control-label">Tempo estimado do lançamento</label>
            <div class="col-md-6 div-help">
                <input type="time" class="form-control" id="petrecho_cerco_tempo_estimado_lancamento" name="petrecho_emalhe[tempo_estimado_lancamento]" value="<?php echo is_null($petrechoEmalhe->getTempoEstimadoLancamento()) ? '' : $petrechoEmalhe->getTempoEstimadoLancamento()->format("H:i") ?>">
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="petrecho_cerco_tempo_estimado_recolhimento" class="col-md-6 control-label">Tempo estimado do recolhimento</label>
            <div class="col-md-6 div-help">
                <input type="time" class="form-control" id="petrecho_cerco_tempo_estimado_recolhimento" name="petrecho_emalhe[tempo_estimado_recolhimento]" value="<?php echo is_null($petrechoEmalhe->getTempoEstimadoRecolhimento()) ? '' : $petrechoEmalhe->getTempoEstimadoRecolhimento()->format("H:i") ?>">
            </div>
        </div>
    </div>
</div>