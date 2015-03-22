<?php $numero = isset($index) ? $index : '$$numero$$' ?>
<div class="panel panel-default lancamento">
    <!-- Default panel contents -->
    <div class="panel-heading">
        Lançamento #<?php echo $numero ?>
        <a href="javascript:;" class="pull-right" id="remove-lance-<?php echo $numero?>"><i class="glyphicon glyphicon-remove"></i></a>
    </div>
    
    <div class="panel-body">
        <div class="row">
            <h4 id="reference" class="heading-reference titulo">  </h4>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="lance" class="col-md-4 control-label lb_lance">Lance</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control lance" id="lancamento_<?php echo $numero; ?>_lance" name="lancamento[<?php echo $numero; ?>][lance]"
                               placeholder="Identificador do lance" value="">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="data_lance"
                           class="col-md-4 control-label lb_data_lance">Data</label>
                    <div class="col-md-8">
                        <input type="date" class="form-control lance_data" id="lancamento_<?php echo $numero; ?>_data" name="lancamento[<?php echo $numero; ?>][data]"
                               value="">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="anzois" class="col-md-4 control-label lb_anzois">Anzois</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control anzois" id="lancamento_<?php echo $numero; ?>_anzois" name="lancamento[<?php echo $numero; ?>][anzois]"
                               value="">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="lance_lat" class="col-md-4 control-label lb_lance_lat">Latitude (decimal)</label>
                    <div class="col-md-8">
                        <input type="number" step="any" class="form-control lance_lat" id="lancamento_<?php echo $numero; ?>_lat" name="lancamento[<?php echo $numero; ?>][lat]" value="">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="lance_long" class="col-md-4 control-label lb_lance_long">Longitude(decimal)
                    </label>
                    <div class="col-md-8">
                        <input type="number" step="any" class="form-control lance_long" id="lancamento_<?php echo $numero; ?>_lng" name="long" value="lancamento[<?php echo $numero; ?>][lng]">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="isca" class="col-md-4 control-label lb_isca">Isca</label>
                    <div class="col-md-8">
                        <label class="checkbox-inline" for="isca_0">
                            <input type="checkbox" class="isca_check" id="lancamento_<?php echo $numero; ?>_isca_0" name="lancamento[<?php echo $numero; ?>][isca][]"
                                   value="lula">Lula
                        </label>
                        <label class="checkbox-inline" for="isca_1">
                            <input type="checkbox" class="isca_check" id="lancamento_<?php echo $numero; ?>_isca_1" name="lancamento[<?php echo $numero; ?>][isca][]"
                                   value="cavalinha">Cavalinha
                        </label>
                        <label class="checkbox-inline" for="isca_2">
                            <input type="checkbox" class="isca_check" id="lancamento_<?php echo $numero; ?>_isca_2" name="lancamento[<?php echo $numero; ?>][isca][]"
                                   value="bonito">Bonito
                        </label>
                        <label class="checkbox-inline" for="isca_3">
                            <input type="checkbox" class="isca_check" id="lancamento_<?php echo $numero; ?>_isca_3" name="lancamento[<?php echo $numero; ?>][isca][]"
                                   value="sardinha">Sardinha
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="lance_hora_ini" class="col-md-4 control-label lb_hora_ini">Hora Início do Lance</label>
                    <div class="col-md-8">
                        <input type="time" class="form-control lance_hora_ini" id="lancamento_<?php echo $numero; ?>_hora_ini" name="lancamento[<?php echo $numero; ?>][hora_ini]" value="">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="lance_hora_fin" class="col-md-4 control-label lb_hora_fin">Hora Final do Lance</label>
                    <div class="col-md-8">
                        <input type="time" class="form-control lance_hora_fin" id="lancamento_<?php echo $numero; ?>_hora_fim" name="lancamento[<?php echo $numero; ?>][hora_fin]" value="">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="mm_tipo" class="col-md-4 control-label lb_mm_tipo">Medida Mitigatória </label>
                    <div class="col-md-8">
                        <label class="checkbox-inline" for="mm_tipo_0">
                            <input type="checkbox" class="mm_check" id="lancamento_<?php echo $numero; ?>_mm_tipo_0" name="lancamento[<?php echo $numero; ?>][mm_tipo][]"  value="toriline">Toriline
                        </label>
                        <label class="checkbox-inline" for="mm_tipo_1">
                            <input type="checkbox" class="mm_check"  id="lancamento_<?php echo $numero; ?>_mm_tipo_1" name="lancamento[<?php echo $numero; ?>][mm_tipo][]" value="larg_noturna">Largada noturna
                        </label>
                        <label class="checkbox-inline" for="mm_tipo_2">
                            <input type="checkbox" class="mm_check" id="lancamento_<?php echo $numero; ?>_mm_tipo_2" name="lancamento[<?php echo $numero; ?>][mm_tipo][]" value="reg_peso">Regime de peso
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="mm_uso" class="col-md-4 control-label lb_mm_uso">Uso da MM</label>
                    <div class="col-md-8">
                        <label class="radio-inline lb_radio" for="mm_uso-0">
                            <input type="radio" class="mm_uso_radio" name="lancamento[<?php echo $numero; ?>][mm_uso]" id="lancamento_<?php echo $numero; ?>_mm_uso-0" value="total">Total
                        </label>
                        <label class="radio-inline lb_radio" for="mm_uso-1">
                            <input type="radio" class="mm_uso_radio" name="lancamento[<?php echo $numero; ?>][mm_uso]" id="lancamento_<?php echo $numero; ?>_mm_uso-1" value="parcial">Parcial
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="ave_capt" class="col-md-4 control-label lb_ave_capt">Ave Capturada</label>
                    <div class="col-md-8">
                        <label class="radio-inline" for="ave_capt_0">
                            <input type="radio" class="ave_capt" name="lancamento[<?php echo $numero; ?>][ave_capt]" id="lancamento_<?php echo $numero; ?>_ave_capt_1" value="true">Sim
                        </label>
                        <label class="radio-inline" for="ave_capt_1">
                            <input type="radio" class="ave_capt" name="lancamento[<?php echo $numero; ?>][ave_capt]" id="lancamento_<?php echo $numero; ?>_ave_capt_2" value="false">Não
                        </label>
                    </div>
                </div>
            </div>
        </div>
        
        <h2 class="text-center titulo">Dados de Captura de Aves</h2>
        <hr>
        
        <div id="captura_container_<?php echo $numero?>" data-prototype="<?php echo htmlspecialchars($this->load->view("mapa_bordo/mb_lancamento_especie", array("objecto" => null, "numero"=>$numero), true)); ?>">
        </div>
        
        <a href="javascrit:;" class="btn btn-success" id="add_captura_<?php echo $numero?>"><i class="glyphicon glyphicon-plus"></i> Adicionar camptura</a>
        
    </div>
</div>

<script>
$(document).ready(function() {
    var capturas<?php echo $numero?> = new Prototype.Class({
        'count': <?php echo $countCaptura ?>,
        'list': '#captura_container_<?php echo $numero?>',
        'addButton': '#add_captura_<?php echo $numero?>',
        'removeButton': '#remove-captura-<?php echo $numero?>',
        'container': '.captura',
        'addOne': <?php echo $countCaptura > 0 ? 'false' : 'true' ?>,
        'isEdit': <?php echo $countCaptura > 0 ? 'true' : 'false' ?>
    });
    
});
</script>