<form class="form-horizontal" role="form" action="<?php echo site_url('entrevistacaisct/filter'); ?>" method="post">
    
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="data" class="col-md-4 control-label">Data</label>
                        <div class="col-md-8 div-help">
                            <input type="date" class="form-control" id="data" name="data"
                                   value="<?php echo isset($filtro['data']) ? $filtro['data'] : '' ?>">
                        </div>
                    </div>
                </div>
            </div>
    
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
                        <label for="responsavel_campo" class="col-md-4 control-label">Responsável de campo</label>
                        <div class="col-md-8 div-help">
                            <select class="select2" id="responsavel_campo" name="responsavel_campo" style="width: 100%">
                                <option></option>
                                <?php foreach ($responsaveis as $responsavel): ?>
                                    <?php $selected = (!empty($filtro['responsavel_campo']) && (int)$filtro['responsavel_campo'] == $responsavel->getId()) ? 'selected' : '' ?>
                                    <option value="<?php echo $responsavel->getId() ?>" <?php echo $selected; ?>><?php echo $responsavel->getName() ?></option>
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
                        <label for="porto_saida" class="col-md-4 control-label">Porto de saída</label>
                        <div class="col-md-8 div-help">
                            <select class="select2" id="porto_saida" name="porto_saida" style="width: 100%">
                                <option></option>
                                <?php foreach ($portos as $porto): ?>
                                    <?php $selected = (!empty($filtro['porto_saida']) && (int)$filtro['porto_saida'] == $porto->getId()) ? 'selected' : '' ?>
                                    <option value="<?php echo $porto->getId() ?>" <?php echo $selected; ?>><?php echo $porto->getNome() ?></option>
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
            <a href="<?php echo site_url('entrevistacaisct/clearfilter')?>" class="btn btn-default btn_sub pull-right">Limpar filtro</a>
            <button type="submit" id="btnSub" name="btnSub" class="btn btn-primary btn_sub pull-right" onclick="" style="margin-right: 10px">Filtrar</button>            
        </div>
    </div>
</form>




<script>
    $(document).ready(function() {

        $("#responsavel_campo").select2({
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

        $("#porto_saida").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado"
            }
        });
    });
</script>