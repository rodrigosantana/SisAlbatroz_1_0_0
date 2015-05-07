<?php $numero = isset($index) ? $index : '$$numero$$' ?>

<div class="panel panel-interno-sisalbatroz dado-abiotico">
    <div class="panel-heading">
        <a href="javascript:;" class="pull-right panel-close-button-sisalbatroz" id="remove-dado-abiotico-<?php echo $numero ?>"><i class="glyphicon glyphicon-remove"></i></a>
        <?php if (is_null($dadoAbiotico->getId())) :?>        
            <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>            
        <?php else :?>
            <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>
        <?php endif;?>
        
    </div>

    <div class="panel-body" style="<?php echo is_null($dadoAbiotico->getId()) ? '' : 'display:none'?>">
        <?php //$dadoAbiotico = new DadosAbioticos()?>
        <div class="row">
            <div class="col-md-6">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="dado_abiotico_<?php echo $numero; ?>_lance" class="col-md-4 control-label lb_lance">Lance *</label>
                            <div class="col-md-8 div-help">
                                <input type="number" class="form-control lance insertaction" id="dado_abiotico_<?php echo $numero; ?>_lance" name="dado_abiotico[<?php echo $numero; ?>][lance]"
                                       placeholder="Identificador do lance" value="<?php echo $dadoAbiotico->getLance() ?>">
                            </div>
                        </div>
                    </div>
                </div>
            
            
                <div class="row ">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="dado_abiotico_<?php echo $numero?>_tipo_isca" class="col-md-4 control-label">Tipo de isca</label>
                            <div class="col-md-8 div-help">
                                <select class="select2" style="width: 100%" id="dado_abiotico_<?php echo $numero?>_tipo_isca" name="dado_abiotico[<?php echo $numero?>][tipo_isca]">
                                    <option></option>
                                    <?php foreach ($iscas as $isca): ?>
                                        <?php $selected = (!is_null($dadoAbiotico->getTipoIsca()) && $dadoAbiotico->getTipoIsca()->getIdIsca() == $isca->getIdIsca()) ? 'selected' : ''?>
                                        <option value="<?php echo $isca->getIdIsca() ?>" <?php echo $selected?>><?php echo $isca->getNome() ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row ">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="dado_abiotico_<?php echo $numero?>_especie" class="col-md-4 control-label">Espécie alvo</label>
                            <div class="col-md-8 div-help">
                                <select class="select2" style="width: 100%" id="dado_abiotico_<?php echo $numero?>_especie" name="dado_abiotico[<?php echo $numero?>][especie]">
                                    <option></option>
                                    <?php foreach ($especies as $especie): ?>
                                        <?php $selected = (!is_null($dadoAbiotico->getEspecieAlvo()) && $dadoAbiotico->getEspecieAlvo()->getId() == $especie->getId()) ? 'selected' : ''?>
                                        <option value="<?php echo $especie->getId() ?>" <?php echo $selected?>><?php echo $especie->getNome() ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row ">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="dado_abiotico_<?php echo $numero ?>_anzois" name="dado_abiotico[<?php echo $numero ?>][anzois]" class="col-md-4 control-label">Anzóis</label>
                            <div class="col-md-8 div-help">
                                <input type="number" class="form-control" id="dado_abiotico_<?php echo $numero ?>_anzois" name="dado_abiotico[<?php echo $numero ?>][anzois]" placeholder="Apenas dígitos" value="<?php echo $dadoAbiotico->getAnzois() ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            <div class="col-md-6">
                
                <div class="row ">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="dado_abiotico_<?php echo $numero; ?>_reg_peso" class="col-md-4 control-label">Reg. peso</label>
                            <div class="col-md-8 div-help">
                                <input type="checkbox" id="dado_abiotico_<?php echo $numero; ?>_reg_peso" name="dado_abiotico[<?php echo $numero; ?>][reg_peso]" 
                                               <?php echo $dadoAbiotico->getRegPeso() === true ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row ">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="dado_abiotico_<?php echo $numero; ?>_toriline" class="col-md-4 control-label">Toriline</label>
                            <div class="col-md-8 div-help">
                                <input type="checkbox" id="dado_abiotico_<?php echo $numero; ?>_toriline" name="dado_abiotico[<?php echo $numero; ?>][toriline]" 
                                               <?php echo $dadoAbiotico->getToriline() === true ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row ">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="dado_abiotico_<?php echo $numero; ?>_isca_tingida" class="col-md-4 control-label">Isca tingida</label>
                            <div class="col-md-8 div-help">
                                <input type="checkbox" id="dado_abiotico_<?php echo $numero; ?>_isca_tingida" name="dado_abiotico[<?php echo $numero; ?>][isca_tingida]" 
                                    <?php echo $dadoAbiotico->getIscaTingida() === true ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
        
        <h3 class="text-center titulo">Dados do lancamento</h3>
        <hr class="hr-sisalbatroz">
        <?php echo $this->load->view('observador_bordo/dado_abiotico_complementar', array('numero'=>$numero, 'nome'=>'lancamento', 'objeto'=>$dadoAbiotico->getDadosAbioticosLancamento()), true)?>
        
        <h3 class="text-center titulo">Dados do recolhimento</h3>
        <hr class="hr-sisalbatroz">
        <?php echo $this->load->view('observador_bordo/dado_abiotico_complementar', array('numero'=>$numero, 'nome'=>'recolhimento', 'objeto'=>$dadoAbiotico->getDadosAbioticosRecolhimento()), true)?>
        
    </div>
</div>

<script>
$(document).ready(function() {
        
        $("#dado_abiotico_<?php echo $numero?>_tipo_isca").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
        
        $("#dado_abiotico_<?php echo $numero?>_especie").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        }); 

});
</script>

