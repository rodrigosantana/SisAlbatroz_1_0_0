<?php $numero2 = isset($indexProducaoPesqueiraEspecie) ? $indexProducaoPesqueiraEspecie : '$$numero2$$' ?>

<div class="row producao-pesqueira-especie">
    <div class="col-md-4 col-sm-4 insertaction">
        <div class="form-group">
            <label for="producao_<?php echo $numero?>_pp_especie_<?php echo $numero2?>_especie" class="col-md-4 control-label">Espécie</label>
            <div class="col-md-8 div-help">
                <select class="select2" style="width: 100%" id="producao_<?php echo $numero?>_pp_especie_<?php echo $numero2?>_especie" name="producao[<?php echo $numero?>][pp_especie][<?php echo $numero2?>][especie]">
                    <option></option>
                    <?php foreach ($especies as $especie): ?>
                        <?php $selected = (!is_null($producaoPesqueiraEspecie->getEspecie()) && $producaoPesqueiraEspecie->getEspecie()->getId() == $especie->getId()) ? 'selected' : ''?>
                        <option value="<?php echo $especie->getId() ?>" <?php echo $selected?>><?php echo $especie->__toString() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 col-sm-3">
        <div class="form-group">
            <label for="producao_<?php echo $numero?>_pp_especie_<?php echo $numero2?>_quantidade" class="col-md-4 control-label">Quantidade</label>
            <div class="col-md-8 div-help">
                <input type="number" class="form-control" id="producao_<?php echo $numero?>_pp_especie_<?php echo $numero2?>_quantidade" name="producao[<?php echo $numero?>][pp_especie][<?php echo $numero2?>][quantidade]" placeholder="Apenas dígitos" value="<?php echo $producaoPesqueiraEspecie->getQuantidade()?>">
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-3">
        <div class="form-group">
            <label for="producao_<?php echo $numero?>_pp_especie_<?php echo $numero2?>_predacao" class="col-md-4 control-label">Predação</label>
            <div class="col-md-8 div-help">
                <select class="select2" style="width: 100%" id="producao_<?php echo $numero?>_pp_especie_<?php echo $numero2?>_predacao" name="producao[<?php echo $numero?>][pp_especie][<?php echo $numero2?>][predacao]">
                    <option></option>
                    <option value="<?php echo Utils::ORCA?>" <?php echo $producaoPesqueiraEspecie->getPredacao() === Utils::ORCA ? 'selected' : ''?>>Orca</option>
                    <option value="<?php echo Utils::TUBARAO?>" <?php echo $producaoPesqueiraEspecie->getPredacao() === Utils::TUBARAO ? 'selected' : ''?>>Tubarão</option>
                    <option value="<?php echo Utils::AVES?>" <?php echo $producaoPesqueiraEspecie->getPredacao() === Utils::AVES ? 'selected' : ''?>>Aves</option>
                </select>
            </div>
        </div>
    </div>
    
    <div class="col-md-1 col-sm-1">
        <a href="javascrit:;" class="btn btn-danger" id="remove-producao-pesqueira-especie-<?php echo $numero . '-' . $numero2?>" style="font-size: 19px;"><i class="glyphicon glyphicon-remove"></i></a>
    </div>
</div>


<script>
    $(document).ready(function (){
        $("#producao_<?php echo $numero?>_pp_especie_<?php echo $numero2?>_especie").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
        
        $("#producao_<?php echo $numero?>_pp_especie_<?php echo $numero2?>_predacao").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
    });
</script>


