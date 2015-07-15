<?php $numero = isset($indexContagemPorSol) ? $indexContagemPorSol : '$$numero$$' ?>

<div class="panel panel-interno-sisalbatroz contagem-por-sol">
    <div class="panel-heading">
        <span id="contagem_por_sol_span_lance_<?php echo $numero; ?>"><?php echo is_null($contagemPorSol->getLance()) ? '' : 'Lance #'. $contagemPorSol->getLance()->getLance() ?></span>
        
        <a href="javascript:;" class="pull-right panel-close-button-sisalbatroz" id="remove-contagem-por-sol-<?php echo $numero ?>"><i class="glyphicon glyphicon-remove"></i></a>
        <?php if (is_null($contagemPorSol->getId())) :?>        
            <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>            
        <?php else :?>
            <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>
        <?php endif;?>
        
    </div>

    <div class="panel-body insertaction" style="<?php echo is_null($contagemPorSol->getId()) ? '' : 'display:none'?>">
        <div class="row">
            <div class="col-md-6">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="contagem_por_sol_<?php echo $numero; ?>_data" class="col-md-4 control-label">Data *</label>
                            <div class="col-md-8 div-help">
                                <input type="date" class="form-control" id="contagem_por_sol_<?php echo $numero; ?>_data" name="contagem_por_sol[<?php echo $numero; ?>][data]"
                                       value="<?php echo is_null($contagemPorSol->getData()) ? '' : $contagemPorSol->getData()->format("Y-m-d") ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="contagem_por_sol_<?php echo $numero; ?>_hora" class="col-md-4 control-label">Horário do por-do-sol</label>
                            <div class="col-md-8 div-help">
                                <input type="time" class="form-control" id="contagem_por_sol_<?php echo $numero; ?>_hora" name="contagem_por_sol[<?php echo $numero; ?>][hora]" value="<?php echo is_null($contagemPorSol->getHoraPorSol()) ? '' : $contagemPorSol->getHoraPorSol()->format("H:i") ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="contagem_por_sol_<?php echo $numero; ?>_lat" class="col-md-4 control-label">Latitude (decimal)</label>
                            <div class="col-md-8 div-help">
                                <input type="number" step="any" class="form-control" id="contagem_por_sol_<?php echo $numero; ?>_lat" name="contagem_por_sol[<?php echo $numero; ?>][lat]" value="<?php echo is_null($contagemPorSol->getCoordenada()) ? '' : $contagemPorSol->getCoordenada()->latitudeDecimal ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="contagem_por_sol_<?php echo $numero; ?>_lng" class="col-md-4 control-label">Longitude (decimal)</label>
                            <div class="col-md-8 div-help">
                                <input type="number" step="any" class="form-control" id="contagem_por_sol_<?php echo $numero; ?>_lng" name="contagem_por_sol[<?php echo $numero; ?>][lng]" value="<?php echo is_null($contagemPorSol->getCoordenada()) ? '' : $contagemPorSol->getCoordenada()->longitudeDecimal ?>">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row ">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="contagem_por_sol_<?php echo $numero; ?>_lance" class="col-md-4 control-label lb_lance">Lance</label>
                            <div class="col-md-8 div-help">
                                <select class="select2 lance-observadorbordo" style="width: 100%" id="contagem_por_sol_<?php echo $numero; ?>_lance" name="contagem_por_sol[<?php echo $numero; ?>][lance]">
                                    <option></option>
                                    <?php foreach ($lances as $lance): ?>
                                        <?php $selectedCps = (!is_null($contagemPorSol->getLance()) && $contagemPorSol->getLance()->getId() == $lance->getId()) ? 'selected' : ''?>
                                        <option value="<?php echo $lance->getId() ?>" <?php echo $selectedCps?>><?php echo $lance->getLance() ?></option>
                                    <?php endforeach; ?>
                                </select>
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
                                <th scope="row" class="th-table-checkbox">Toriline</th>
                                <td><input type="checkbox" name="contagem_por_sol[<?php echo $numero; ?>][toriline]" value="true" class="check-sim-nao" <?php echo $contagemPorSol->getToriline() === true ? 'checked' : '' ?>></td>
                                <td><input type="checkbox" name="contagem_por_sol[<?php echo $numero; ?>][toriline]" value="false" class="check-sim-nao" <?php echo $contagemPorSol->getToriline() === false ? 'checked' : '' ?>></td>           
                            </tr>          
                            <tr>
                                <th scope="row" class="th-table-checkbox">Isca tingida</th>
                                <td><input type="checkbox" name="contagem_por_sol[<?php echo $numero; ?>][isca_tingida]" value="true" class="check-sim-nao" <?php echo $contagemPorSol->getIscaTingida() === true ? 'checked' : '' ?>></td>
                                <td><input type="checkbox" name="contagem_por_sol[<?php echo $numero; ?>][isca_tingida]" value="false" class="check-sim-nao" <?php echo $contagemPorSol->getIscaTingida() === false ? 'checked' : '' ?>></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <hr class="hr-sisalbatroz">
                
                <div class="row ">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="contagem_por_sol_<?php echo $numero; ?>_observacao" class="col-md-4 control-label">Observações</label>
                            <div class="col-md-8 div-help">
                                <textarea class="form-control" id="contagem_por_sol_<?php echo $numero; ?>_observacao" name="contagem_por_sol[<?php echo $numero; ?>][observacao]"><?php echo $contagemPorSol->getObservacao() ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <h3 class="text-center titulo">Contagens</h3>
        <hr class="hr-sisalbatroz">

        <div id="contagem_por_sol_indice_container_<?php echo $numero ?>" data-prototype="<?php echo htmlspecialchars($this->load->view("observador_bordo/contagem_por_sol_indice", array('indexContagemPorSolIndice'=>'$$numero2$$', 'contagemPorSolIndice' => new ContagemPorSolIndice(), "numero" => $numero, 'especies' => $especies), true)); ?>">
            <?php
            $lista = $contagemPorSol->getContagemPorSolIndice();
            
            foreach ($lista as $key => $value) {
                echo $this->load->view("observador_bordo/contagem_por_sol_indice", array('contagemPorSolIndice' => $value, 'indexContagemPorSolIndice' => $key, "numero" => $numero, 'especies' => $especies), true);
            }
            ?>
        </div>
        
        <a href="javascrit:;" class="btn btn-success" id="add_contagem_por_sol_indice_<?php echo $numero ?>" style="margin-top: 10px"><i class="glyphicon glyphicon-plus"></i> Adicionar índice</a>
    </div>
</div>

<script>
    $(document).ready(function() {
        var contagemPorSolIndice<?php echo $numero ?> = new Prototype.Class({
            'count': <?php echo $contagemPorSol->getContagemPorSolIndice()->count() ?>,
            'list': '#contagem_por_sol_indice_container_<?php echo $numero ?>',
            'addButton': '#add_contagem_por_sol_indice_<?php echo $numero ?>',
            'removeButton': '#remove-contagem-por-sol-indice-<?php echo $numero ?>',
            'container': '.contagem-por-sol-indice',
            'addOne': false,
            'isEdit': <?php echo $contagemPorSol->getContagemPorSolIndice()->count() > 0 ? 'true' : 'false' ?>
        });

        $("#contagem_por_sol_<?php echo $numero; ?>_lance").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
        
        $(".select2-container").removeClass('lance-observadorbordo');
        
        <?php if (is_null($contagemPorSol->getId())) :?>
            adicionarLances($("#contagem_por_sol_<?php echo $numero; ?>_lance"));
        <?php endif;?>
            
        $('#contagem_por_sol_<?php echo $numero; ?>_lance').change(function () {
            var data = $('#contagem_por_sol_<?php echo $numero; ?>_lance').select2('data');
            var text = '';
            
            if (data) {
                text = 'Lance #' + data.text;
            }
            
            $('#contagem_por_sol_span_lance_<?php echo $numero; ?>').html(text);
        });
    });
</script>