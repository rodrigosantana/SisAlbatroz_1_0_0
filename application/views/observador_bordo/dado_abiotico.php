<?php $numero = isset($index) ? $index : '$$numero$$' ?>

<div class="panel panel-interno-sisalbatroz dado-abiotico">
    <div class="panel-heading">
        <span id="span_lance_<?php echo $numero; ?>"><?php echo is_null($dadoAbiotico->getLance()) ? '' : 'Lance #'. $dadoAbiotico->getLance() ?></span>
        <a href="javascript:;" class="pull-right panel-close-button-sisalbatroz" id="remove-dado-abiotico-<?php echo $numero ?>"><i class="glyphicon glyphicon-remove"></i></a>
        <?php if (is_null($dadoAbiotico->getId())) :?>        
            <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>            
        <?php else :?>
            <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>
        <?php endif;?>
        
    </div>

    <div class="panel-body insertaction" style="<?php echo is_null($dadoAbiotico->getId()) ? '' : 'display:none'?>">
        <?php //$dadoAbiotico = new DadosAbioticos()?>
        <input type="hidden" id="dado_abiotico_<?php echo $numero; ?>_id" name="dado_abiotico[<?php echo $numero; ?>][id]" value="<?php echo is_null($dadoAbiotico->getId()) ? 'lance_' . $numero : $dadoAbiotico->getId()?>">
        <div class="row">
            
            <div class="col-md-6">
                <h4 class="text-center titulo">Dados do lance</h4>
                <hr class="hr-sisalbatroz">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="dado_abiotico_<?php echo $numero; ?>_lance" class="col-md-4 control-label lb_lance">Lance *</label>
                            <div class="col-md-8 div-help">
                                <input type="number" class="form-control lance" id="dado_abiotico_<?php echo $numero; ?>_lance" name="dado_abiotico[<?php echo $numero; ?>][lance]"
                                       placeholder="" value="<?php echo $dadoAbiotico->getLance() ?>">
                            </div>
                        </div>
                    </div>
                </div>
            
            
                <div class="row ">
                    
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-md-4 control-label lb_isca">Tipo de isca</label>
                            <div class="col-md-8 div-help">
                                <?php foreach ($iscas as $isca): ?>
                                    <label class="checkbox-inline" for="dado_abiotico_<?php echo $numero; ?>_iscas_<?php echo $isca->getIdIsca() ?>">
                                        <input type="checkbox" class="isca_check" id="dado_abiotico_<?php echo $numero; ?>_iscas_<?php echo $isca->getIdIsca() ?>" name="dado_abiotico[<?php echo $numero; ?>][iscas][]"
                                               value="<?php echo $isca->getIdIsca() ?>" <?php echo Utils::ischecked($dadoAbiotico->getIscas()->toArray(), $isca->getIdIsca(), 'getIdIsca') ?>><?php echo $isca->getNome() ?>
                                    </label>
                                <?php endforeach; ?>
                                <imput type="hidden" name="lancamento[<?php echo $numero; ?>][isca]"></imput>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row ">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="dado_abiotico_<?php echo $numero ?>_anzois" class="col-md-4 control-label">Anzóis</label>
                            <div class="col-md-8 div-help">
                                <input type="number" class="form-control" id="dado_abiotico_<?php echo $numero ?>_anzois" name="dado_abiotico[<?php echo $numero ?>][anzois]" placeholder="Apenas dígitos" value="<?php echo $dadoAbiotico->getAnzois() ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            <div class="col-md-6">
                <h4 class="text-center titulo">Medidas Mitigadoras</h4>
                <hr class="hr-sisalbatroz">
                
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
                                <th scope="row" class="th-table-checkbox">Reg. peso</th>
                                <td><input type="checkbox" name="dado_abiotico[<?php echo $numero; ?>][reg_peso]" value="true" class="check-sim-nao" <?php echo $dadoAbiotico->getRegPeso() === true ? 'checked' : '' ?>></td>
                                <td><input type="checkbox" name="dado_abiotico[<?php echo $numero; ?>][reg_peso]" value="false" class="check-sim-nao" <?php echo $dadoAbiotico->getRegPeso() === false ? 'checked' : '' ?>></td>           
                            </tr>
                            <tr>
                                <th scope="row" class="th-table-checkbox">Toriline</th>
                                <td><input type="checkbox" name="dado_abiotico[<?php echo $numero; ?>][toriline]" value="true" class="check-sim-nao" <?php echo $dadoAbiotico->getToriline() === true ? 'checked' : '' ?>></td>
                                <td><input type="checkbox" name="dado_abiotico[<?php echo $numero; ?>][toriline]" value="false" class="check-sim-nao" <?php echo $dadoAbiotico->getToriline() === false ? 'checked' : '' ?>></td>           
                            </tr>
                            <tr>
                                <th scope="row" class="th-table-checkbox">Isca tingida</th>
                                <td><input type="checkbox" name="dado_abiotico[<?php echo $numero; ?>][isca_tingida]" value="true" class="check-sim-nao" <?php echo $dadoAbiotico->getIscaTingida() === true ? 'checked' : '' ?>></td>
                                <td><input type="checkbox" name="dado_abiotico[<?php echo $numero; ?>][isca_tingida]" value="false" class="check-sim-nao" <?php echo $dadoAbiotico->getIscaTingida() === false ? 'checked' : '' ?>></td>
                            </tr>
                        </tbody>
                    </table>
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
    
    $("#dado_abiotico_<?php echo $numero; ?>_lance").change(function () {
        var idValue = '';
        
        $('#span_lance_<?php echo $numero; ?>').html('Lance #' + $('#dado_abiotico_<?php echo $numero; ?>_lance').val());
        
        if (!$('#dado_abiotico_<?php echo $numero; ?>_id').val() && $("#dado_abiotico_<?php echo $numero; ?>_lance").val()) {
            idValue = 'lance_' . $("#dado_abiotico_<?php echo $numero; ?>_lance").val();
        } else {
            idValue = $('#dado_abiotico_<?php echo $numero; ?>_id').val();
        }
        alterarLance($("#dado_abiotico_<?php echo $numero; ?>_lance").val(), idValue);
    }); 
    
    $('#remove-dado-abiotico-<?php echo $numero ?>').click(function () {
        alterarLance(null, $('#dado_abiotico_<?php echo $numero; ?>_id').val());
        $('#remove-dado-abiotico-<?php echo $numero ?>').closest('.dado-abiotico').first().remove();        
    });
});
</script>


