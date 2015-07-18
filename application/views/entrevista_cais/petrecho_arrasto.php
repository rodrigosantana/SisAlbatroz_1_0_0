<?php $petrechoArrasto = $petrechoArrasto instanceof PetrechoArrasto ? $petrechoArrasto : new PetrechoArrasto() ?>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="col-md-3 control-label">Tipo de arrasto:</label>
            <div class="col-md-8 div-help">
                <div class="col-md-2 checkbox tipo-arrasto"><label><input type="checkbox" name="petrecho_arrasto[tipo_arrasto]" value="<?php echo Utils::SIMPLES ?>" <?php echo $petrechoArrasto->getTipoArrasto() == Utils::SIMPLES ? 'checked' : '' ?>>Simples</label></div>
                <div class="col-md-2 checkbox tipo-arrasto"><label><input type="checkbox" name="petrecho_arrasto[tipo_arrasto]" value="<?php echo Utils::DUPLO ?>" <?php echo $petrechoArrasto->getTipoArrasto() == Utils::DUPLO ? 'checked' : '' ?>>Duplo</label></div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="petrecho_arrasto_numero_arrastos_dia" class="col-md-6 control-label">Nº de arrastos por dia</label>
            <div class="col-md-6 div-help">
                <input type="number" class="form-control" id="petrecho_arrasto_numero_arrastos_dia" name="petrecho_arrasto[numero_arrastos_dia]" placeholder="Apenas dígitos" value="<?php echo $petrechoArrasto->getNumeroArrastosDia() ?>">
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="petrecho_arrasto_tempo_medio_arrasto" class="col-md-6 control-label">Tempo médio de cada arrasto (h)</label>
            <div class="col-md-6 div-help">
                <input type="time" class="form-control" id="petrecho_arrasto_tempo_medio_arrasto" name="petrecho_arrasto[tempo_medio_arrasto]" value="<?php echo is_null($petrechoArrasto->getTempoMedioArrasto()) ? '' : $petrechoArrasto->getTempoMedioArrasto()->format("H:i") ?>">
            </div>
        </div>
    </div>	
</div>