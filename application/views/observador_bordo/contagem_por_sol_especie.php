<?php $numero3 = isset($indexContagemPorSolEspecie) ? $indexContagemPorSolEspecie : '$$numero3$$' ?>

<div class="row contagem-por-sol-especie">
    <div class="col-md-4 col-sm-3 insertaction">
        <div class="form-group">
            <label for="contagem_por_sol_<?php echo $numero; ?>_contagem_psi_<?php echo $numero2; ?>_cps_especie_<?php echo $numero3?>_especie" class="col-md-3 control-label">Espécie</label>
            <div class="col-md-9 div-help">
                <select class="select2" style="width: 100%" id="contagem_por_sol_<?php echo $numero; ?>_contagem_psi_<?php echo $numero2; ?>_cps_especie_<?php echo $numero3?>_especie" name="contagem_por_sol[<?php echo $numero; ?>][contagem_psi][<?php echo $numero2; ?>][cps_especie][<?php echo $numero3?>][especie]">
                    <option></option>
                    <?php foreach ($aves as $ave): ?>
                        <?php $selected = (!is_null($contagemPorSolEspecie->getEspecie()) && $contagemPorSolEspecie->getEspecie()->getId() == $ave->getId()) ? 'selected' : ''?>
                        <option value="<?php echo $ave->getId() ?>" <?php echo $selected?>><?php echo $ave->__toString() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 col-sm-3">
        <div class="form-group">
            <label for="contagem_por_sol_<?php echo $numero; ?>_contagem_psi_<?php echo $numero2; ?>_cps_especie_<?php echo $numero3?>_quantidade" class="col-md-4 control-label">Quantidade</label>
            <div class="col-md-8 div-help">
                <input type="number" class="form-control" id="contagem_por_sol_<?php echo $numero; ?>_contagem_psi_<?php echo $numero2; ?>_cps_especie_<?php echo $numero3?>_quantidade" name="contagem_por_sol[<?php echo $numero; ?>][contagem_psi][<?php echo $numero2; ?>][cps_especie][<?php echo $numero3?>][quantidade]" placeholder="Apenas dígitos" value="<?php echo $contagemPorSolEspecie->getQuantidade()?>">
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-3 container_tipo_individuo" style="<?php echo (!is_null($contagemPorSolEspecie->getEspecie()) && in_array($contagemPorSolEspecie->getEspecie()->getId(), $especiesEspecificas)) ? 'display: block' : 'display: none'?>">
        <div class="form-group">
            <label for="contagem_por_sol_<?php echo $numero; ?>_contagem_psi_<?php echo $numero2; ?>_cps_especie_<?php echo $numero3?>_tipo_individuo" class="col-md-4 control-label">Tipo do indivíduo</label>
            <div class="col-md-8 div-help">
                <select class="select2" style="width: 100%" id="contagem_por_sol_<?php echo $numero; ?>_contagem_psi_<?php echo $numero2; ?>_cps_especie_<?php echo $numero3?>_tipo_individuo" name="contagem_por_sol[<?php echo $numero; ?>][contagem_psi][<?php echo $numero2; ?>][cps_especie][<?php echo $numero3?>][tipo_individuo]">
                    <option></option>
                    <option value="<?php echo Utils::JUVENIL?>" <?php echo $contagemPorSolEspecie->getTipoIndividuo() === Utils::JUVENIL ? 'selected' : ''?>>Juvenil</option>
                    <option value="<?php echo Utils::ADULTO?>" <?php echo $contagemPorSolEspecie->getTipoIndividuo() === Utils::ADULTO ? 'selected' : ''?>>Adulto</option>
                    <option value="<?php echo Utils::INDEFINIDO?>" <?php echo $contagemPorSolEspecie->getTipoIndividuo() === Utils::INDEFINIDO ? 'selected' : ''?>>Indefinido</option>
                </select>
            </div>
        </div>
    </div>
    
    <div class="col-md-1 col-sm-1">
        <a href="javascrit:;" class="btn btn-danger" id="remove-contagem-por-sol-especie-<?php echo $numero ?>-<?php echo $numero2?>-<?php echo $numero3?>" style="font-size: 19px;"><i class="glyphicon glyphicon-remove"></i></a>
    </div>
</div>


<script>
    $(document).ready(function (){
        $("#contagem_por_sol_<?php echo $numero; ?>_contagem_psi_<?php echo $numero2; ?>_cps_especie_<?php echo $numero3?>_especie").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
        
        $("#contagem_por_sol_<?php echo $numero; ?>_contagem_psi_<?php echo $numero2; ?>_cps_especie_<?php echo $numero3?>_tipo_individuo").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
        
        $('#contagem_por_sol_<?php echo $numero; ?>_contagem_psi_<?php echo $numero2; ?>_cps_especie_<?php echo $numero3?>_especie').change(function (event){
            var value = event.target.value;
            $('#contagem_por_sol_<?php echo $numero; ?>_contagem_psi_<?php echo $numero2; ?>_cps_especie_<?php echo $numero3?>_tipo_individuo').closest('.container_tipo_individuo').hide();
            
            for (var i = 0; i < especiesEspecificas.length; i++) {
                if (value == especiesEspecificas[i]) {
                    $('#contagem_por_sol_<?php echo $numero; ?>_contagem_psi_<?php echo $numero2; ?>_cps_especie_<?php echo $numero3?>_tipo_individuo').closest('.container_tipo_individuo').show();
                    break;
                }
            }
        });
        
        
    });
</script>


