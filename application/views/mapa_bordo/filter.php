<form class="form-horizontal" role="form" action="<?php echo site_url('mapa_bordo_ct/filter'); ?>" method="post">
    
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="codigo" class="col-md-4 control-label">Código
                        </label>
                        <div class="col-md-8 div-help">
                            <input type="number" step="any" class="form-control lance_long" id="codigo" name="codigo" value="<?php echo isset($filtro['codigo']) ? $filtro['codigo'] : '' ?>">
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="entrevistador" class="col-md-4 control-label">Entrevistador</label>
                        <div class="col-md-8 div-help">
                            <select class="select2" id="entrevistador" name="entrevistador" style="width: 100%">
                                <option></option>
                                <?php foreach ($entrevistadores as $cad_entrevistador): ?>
                                    <?php $selected = (!empty($filtro['entrevistador']) && (int)$filtro['entrevistador'] == $cad_entrevistador->getId()) ? 'selected' : '' ?>
                                    <option value="<?php echo $cad_entrevistador->getId() ?>" <?php echo $selected; ?>><?php echo $cad_entrevistador->getName() ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="row">                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="embarcacao" class="col-md-4 control-label">Embarcação</label>
                        <div class="col-md-8 div-help">
                            <select class="select2" id="embarcacao" name="embarcacao" style="width: 100%">
                                <option></option>
                                <?php foreach ($embarcacoes as $cad_embarcacao): ?>
                                    <?php $selected = (!empty($filtro['embarcacao']) && (int)$filtro['embarcacao'] == $cad_embarcacao->getIdEmbarcacao()) ? 'selected' : '' ?>
                                    <option value="<?php echo $cad_embarcacao->getIdEmbarcacao() ?>" <?php echo $selected; ?>><?php echo $cad_embarcacao->getNome() ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mestre" class="col-md-4 control-label">Mestre</label>
                        <div class="col-md-8 div-help">
                            <select class="select2" id="mestre" name="mestre" style="width: 100%">
                                <option></option>
                                <?php foreach ($mestres as $cad_mestre): ?>
                                    <?php $selected = (!empty($filtro['mestre']) && (int)$filtro['mestre'] == $cad_mestre->getIdMestre()) ? 'selected' : '' ?>
                                    <option value="<?php echo $cad_mestre->getIdMestre() ?>" <?php echo $selected; ?>><?php echo $cad_mestre->getNome() ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="data_saida" class="col-md-4 control-label">Data de Saída</label>
                        <div class="col-md-8 div-help">
                            <input type="date" class="form-control" id="data_saida" name="data_saida"
                                   value="<?php echo isset($filtro['data_saida']) ? $filtro['data_saida'] : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="data_chegada" class="col-md-4 control-label">Data de Chegada</label>
                        <div class="col-md-8 div-help">
                            <input type="date" class="form-control" id="data_chegada" name="data_chegada"
                                   value="<?php echo isset($filtro['data_chegada']) ? $filtro['data_chegada'] : ''  ?>">
                        </div>
                    </div>
                </div>
            </div>
        
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo site_url('mapa_bordo_ct/clearfilter')?>" class="btn btn-default btn_sub pull-right">Limpar filtro</a>
            <button type="submit" id="btnSub" name="btnSub" class="btn btn-primary btn_sub pull-right" onclick="" style="margin-right: 10px">Filtrar</button>            
        </div>
    </div>
</form>




<script>
    $(document).ready(function() {

        $("#entrevistador").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado"
            }
        });

        $("#embarcacao").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado"
            }
        });

        $("#mestre").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado"
            }
        });
    });
</script>