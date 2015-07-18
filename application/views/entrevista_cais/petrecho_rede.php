<?php $petrechoRede = $petrechoRede instanceof PetrechoRede ? $petrechoRede : new PetrechoRede() ?>

<div class="row">
	<div class="col-md-4">
        <div class="form-group">
            <label for="petrecho_rede_comprimento_rede" class="col-md-6 control-label">Comp. da rede (m)</label>
            <div class="col-md-6 div-help">
                <input type="number" class="form-control" id="petrecho_rede_comprimento_rede" name="petrecho_rede[comprimento_rede]" placeholder="Apenas dígitos" value="<?php echo $petrechoRede->getComprimentoRede()?>">
            </div>
        </div>
    </div>
	
	<div class="col-md-4">
        <div class="form-group">
            <label for="petrecho_rede_altura_rede" class="col-md-6 control-label">Altura da rede (m)</label>
            <div class="col-md-6 div-help">
                <input type="number" class="form-control" id="petrecho_rede_altura_rede" name="petrecho_rede[altura_rede]" placeholder="Apenas dígitos" value="<?php echo $petrechoRede->getAlturaRede()?>">
            </div>
        </div>
    </div>
	
	<div class="col-md-4">
        <div class="form-group">
            <label for="petrecho_rede_numero_cercos_totais" class="col-md-6 control-label">Nº de cercos totais</label>
            <div class="col-md-6 div-help">
                <input type="number" class="form-control" id="petrecho_rede_numero_cercos_totais" name="petrecho_rede[numero_cercos_totais]" placeholder="Apenas dígitos" value="<?php echo $petrechoRede->getNumeroCercosTotais()?>">
            </div>
        </div>
    </div>
</div>


<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="petrecho_rede_tempo_estimado_cercamento" class="col-md-6 control-label">Tempo estimado do cercamento</label>
			<div class="col-md-6 div-help">
				<input type="time" class="form-control" id="petrecho_rede_tempo_estimado_cercamento" name="petrecho_rede[tempo_estimado_cercamento]" value="<?php echo is_null($petrechoRede->getTempoEstimadoCercamento()) ? '' : $petrechoRede->getTempoEstimadoCercamento()->format("H:i") ?>">
			</div>
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="form-group">
			<label for="petrecho_rede_tempo_estimado_recolhimento" class="col-md-6 control-label">Tempo estimado do recolhimento</label>
			<div class="col-md-6 div-help">
				<input type="time" class="form-control" id="petrecho_rede_tempo_estimado_recolhimento" name="petrecho_rede[tempo_estimado_recolhimento]" value="<?php echo is_null($petrechoRede->getTempoEstimadoRecolhimento()) ? '' : $petrechoRede->getTempoEstimadoRecolhimento()->format("H:i") ?>">
			</div>
		</div>
	</div>
</div>
