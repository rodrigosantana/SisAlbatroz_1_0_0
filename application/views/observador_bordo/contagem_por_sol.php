<?php $numero = isset($indexContagemPorSol) ? $indexContagemPorSol : '$$numero$$' ?>

<div class="panel panel-interno-sisalbatroz contagem-por-sol">
    <div class="panel-heading">
        <a href="javascript:;" class="pull-right panel-close-button-sisalbatroz" id="remove-contagem-por-sol-<?php echo $numero ?>"><i class="glyphicon glyphicon-remove"></i></a>
        <?php if (is_null($contagemPorSol->getId())) :?>        
            <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>            
        <?php else :?>
            <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>
        <?php endif;?>
        
    </div>

    <div class="panel-body" style="<?php echo is_null($contagemPorSol->getId()) ? '' : 'display:none'?>">
        <div class="row">
            <div class="col-md-6">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="contagem_por_sol_<?php echo $numero; ?>_data" class="col-md-4 control-label">Data *</label>
                            <div class="col-md-8 div-help">
                                <input type="date" class="form-control" id="contagem_por_sol_<?php echo $numero; ?>_data" name="contagem_por_sol[<?php echo $numero; ?>][data]"
                                       value="<?php echo is_null($contagemPorSol->getDataHora()) ? '' : $contagemPorSol->getDataHora()->format("Y-m-d") ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="contagem_por_sol_<?php echo $numero; ?>_hora" class="col-md-4 control-label">Horário do por-do-sol *</label>
                            <div class="col-md-8 div-help">
                                <input type="time" class="form-control" id="contagem_por_sol_<?php echo $numero; ?>_hora" name="contagem_por_sol[<?php echo $numero; ?>][hora]" value="<?php echo is_null($contagemPorSol->getDataHora()) ? '' : $contagemPorSol->getDataHora()->format("H:i") ?>">
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
                            <label for="contagem_por_sol_<?php echo $numero; ?>_lance" class="col-md-4 control-label lb_lance">Lance *</label>
                            <div class="col-md-8 div-help">
                                <input type="number" class="form-control lance" id="contagem_por_sol_<?php echo $numero; ?>_lance" name="contagem_por_sol[<?php echo $numero; ?>][lance]"
                                       placeholder="Identificador do lance" value="<?php echo $contagemPorSol->getLance() ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <h4 class="text-center titulo">Medidas Mitigadoras</h4>
                <hr class="hr-sisalbatroz">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="contagem_por_sol_<?php echo $numero; ?>_toriline" class="col-md-4 control-label">Toriline</label>
                            <div class="col-md-8 div-help">
                                <input type="checkbox" id="contagem_por_sol_<?php echo $numero; ?>_toriline" name="contagem_por_sol[<?php echo $numero; ?>][toriline]" 
                                               <?php echo $contagemPorSol->getToriline() === true ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row ">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="contagem_por_sol_<?php echo $numero; ?>_isca_tingida" class="col-md-4 control-label">Isca tingida</label>
                            <div class="col-md-8 div-help">
                                <input type="checkbox" id="contagem_por_sol_<?php echo $numero; ?>_isca_tingida" name="contagem_por_sol[<?php echo $numero; ?>][isca_tingida]" 
                                    <?php echo $contagemPorSol->getIscaTingida() === true ? 'checked' : '' ?>>
                            </div>
                        </div>
                    </div>
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

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="contagem_por_sol_<?php echo $numero; ?>_indice" class="col-md-4 control-label lb_lance">Índice da contagem</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control lance" id="contagem_por_sol_<?php echo $numero; ?>_indice" name="contagem_por_sol[<?php echo $numero; ?>][indice]"
                               placeholder="Identificador do lance" value="<?php echo $contagemPorSol->getIndice() ?>">
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="contagem_por_sol_<?php echo $numero; ?>_contagem_hora" class="col-md-4 control-label">Hora</label>
                    <div class="col-md-8 div-help">
                        <input type="time" class="form-control" id="contagem_por_sol_<?php echo $numero; ?>_contagem_hora" name="contagem_por_sol[<?php echo $numero; ?>][contagem_hora]" value="<?php echo is_null($contagemPorSol->getHora()) ? '' : $contagemPorSol->getHora()->format("H:i") ?>">
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="contagem_por_sol_<?php echo $numero; ?>_total" class="col-md-4 control-label lb_lance">Total</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control lance" id="contagem_por_sol_<?php echo $numero; ?>_total" name="contagem_por_sol[<?php echo $numero; ?>][total]"
                               placeholder="Identificador do lance" value="<?php echo $contagemPorSol->getTotal() ?>">
                    </div>
                </div>
            </div>
            
        </div>
        <hr class="hr-sisalbatroz">
        <div id="contagem_por_sol_especie_container_<?php echo $numero ?>" data-prototype="<?php echo htmlspecialchars($this->load->view("observador_bordo/contagem_por_sol_especie", array('contagemPorSolEspecie' => new ContagemPorSolEspecie(), "numero" => $numero, 'especies' => $especies), true)); ?>">
            <?php
            $lista = $contagemPorSol->getContagemPorSolEspecie();
            
            foreach ($lista as $key => $value) {
                echo $this->load->view("observador_bordo/contagem_por_sol_especie", array('contagemPorSolEspecie' => $value, 'indexContagemPorSolEspecie' => $key, "numero" => $numero, 'especies' => $especies), true);
            }
            ?>
        </div>
        
        <a href="javascrit:;" class="btn btn-success" id="add_contagem_por_sol_especie_<?php echo $numero ?>" style="margin-top: 10px"><i class="glyphicon glyphicon-plus"></i> Adicionar espécie</a>
    </div>
</div>

<script>
    $(document).ready(function() {
        var contagemPorSolEspecie<?php echo $numero ?> = new Prototype.Class({
            'count': <?php echo $contagemPorSol->getContagemPorSolEspecie()->count() ?>,
            'list': '#contagem_por_sol_especie_container_<?php echo $numero ?>',
            'addButton': '#add_contagem_por_sol_especie_<?php echo $numero ?>',
            'removeButton': '#remove-contagem-por-sol-especie-<?php echo $numero ?>',
            'container': '.contagem-por-sol-especie',
            'addOne': <?php echo $contagemPorSol->getContagemPorSolEspecie()->count() > 0 ? 'false' : 'true' ?>,
            'isEdit': <?php echo $contagemPorSol->getContagemPorSolEspecie()->count() > 0 ? 'true' : 'false' ?>
        });

    });
</script>