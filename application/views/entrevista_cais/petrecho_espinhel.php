<?php $petrechoEspinhel = $petrechoEspinhel instanceof PetrechoEspinhel ? $petrechoEspinhel : new PetrechoEspinhel() ?>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="petrecho_espinhel_numero_espinheis" class="col-md-4 control-label">Nº de espinhéis</label>
            <div class="col-md-8 div-help">
                <input type="number" class="form-control" id="petrecho_espinhel_numero_espinheis" name="petrecho_espinhel[numero_espinheis]" placeholder="Apenas dígitos" value="<?php echo $petrechoEspinhel->getNumeroEspinheis() ?>">
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="petrecho_espinhel_numero_anzois" class="col-md-4 control-label">Nº de anzóis por espinhel</label>
            <div class="col-md-8 div-help">
                <input type="number" class="form-control" id="petrecho_espinhel_numero_anzois" name="petrecho_espinhel[numero_anzois]" placeholder="Apenas dígitos" value="<?php echo $petrechoEspinhel->getNumeroAnzois() ?>">
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="petrecho_espinhel_numero_lances" class="col-md-4 control-label">Nº de lances por dia</label>
            <div class="col-md-8 div-help">
                <input type="number" class="form-control" id="petrecho_espinhel_numero_lances" name="petrecho_espinhel[numero_lances]" placeholder="Apenas dígitos" value="<?php echo $petrechoEspinhel->getNumeroLances() ?>">
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-sisalbatroz">
                <thead>
                    <tr>
                        <th class="col-md-3"></th>
                        <th class="col-md-2">Sim</th>
                        <th class="col-md-2">Não</th>
                        <th class="col-md-5"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="th-table-checkbox">Light-stick</th>
                        <td><input type="checkbox" name="petrecho_espinhel[light_stick]" value="true" class="check-sim-nao" <?php echo $petrechoEspinhel->getLightStick() === true ? 'checked' : '' ?>></td>
                        <td><input type="checkbox" name="petrecho_espinhel[light_stick]" value="false" class="check-sim-nao" <?php echo $petrechoEspinhel->getLightStick() === false ? 'checked' : '' ?>></td>           
                    </tr>          
                    <tr>
                        <th scope="row" class="th-table-checkbox">Toriline</th>
                        <td><input type="checkbox" name="petrecho_espinhel[toriline]" value="true" class="check-sim-nao" <?php echo $petrechoEspinhel->getToriline() === true ? 'checked' : '' ?>></td>
                        <td><input type="checkbox" name="petrecho_espinhel[toriline]" value="false" class="check-sim-nao" <?php echo $petrechoEspinhel->getToriline() === false ? 'checked' : '' ?>></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="petrecho_espinhel_numero_anzois" class="col-md-2 control-label">Hora de lançamento</label>
            <div class="col-md-10">         
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="petrecho_espinhel_hora_lancamento_inicio" class="col-md-3 control-label">Início (h)</label>
                            <div class="col-md-9 div-help">
                                <input type="time" class="form-control" id="petrecho_espinhel_hora_lancamento_inicio" name="petrecho_espinhel[hora_lancamento_inicio]" value="<?php echo is_null($petrechoEspinhel->getHoraLancamentoInicio()) ? '' : $petrechoEspinhel->getHoraLancamentoInicio()->format("H:i") ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="petrecho_espinhel_hora_lancamento_fim" class="col-md-3 control-label">Final (h)</label>
                            <div class="col-md-9 div-help">
                                <input type="time" class="form-control" id="petrecho_espinhel_hora_lancamento_fim" name="petrecho_espinhel[hora_lancamento_fim]" value="<?php echo is_null($petrechoEspinhel->getHoraLancamentoFim()) ? '' : $petrechoEspinhel->getHoraLancamentoFim()->format("H:i") ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="petrecho_espinhel_numero_anzois" class="col-md-2 control-label">Hora de recolhimento</label>
            <div class="col-md-10">         
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="petrecho_espinhel_hora_recolhimento_inicio" class="col-md-3 control-label">Início (h)</label>
                            <div class="col-md-9 div-help">
                                <input type="time" class="form-control" id="petrecho_espinhel_hora_recolhimento_inicio" name="petrecho_espinhel[hora_recolhimento_inicio]" value="<?php echo is_null($petrechoEspinhel->getHoraRecolhimentoInicio()) ? '' : $petrechoEspinhel->getHoraRecolhimentoInicio()->format("H:i") ?>">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="petrecho_espinhel_hora_recolhimento_fim" class="col-md-3 control-label">Final (h)</label>
                            <div class="col-md-9 div-help">
                                <input type="time" class="form-control" id="petrecho_espinhel_hora_recolhimento_fim" name="petrecho_espinhel[hora_recolhimento_fim]" value="<?php echo is_null($petrechoEspinhel->getHoraRecolhimentoFim()) ? '' : $petrechoEspinhel->getHoraRecolhimentoFim()->format("H:i") ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>