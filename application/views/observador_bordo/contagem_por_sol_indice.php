<?php $numero2 = isset($indexContagemPorSolIndice) ? $indexContagemPorSolIndice : '$$numero2$$' ?>
<div class="panel panel-interno-sisalbatroz contagem-por-sol-indice">
    <div class="panel-heading">
        <a href="javascript:;" class="pull-right panel-close-button-sisalbatroz" id="remove-contagem-por-sol-indice-<?php echo $numero ?>-<?php echo $numero2 ?>"><i class="glyphicon glyphicon-remove"></i></a>
        <?php if (is_null($contagemPorSolIndice->getId())) :?>        
            <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>            
        <?php else :?>
            <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>
        <?php endif;?>
        
    </div>

    <div class="panel-body insertaction" style="<?php echo is_null($contagemPorSolIndice->getId()) ? '' : 'display:none'?>">
    
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="contagem_por_sol_<?php echo $numero; ?>_contagem_psi_<?php echo $numero2; ?>_indice" class="col-md-4 control-label lb_lance">Índice da contagem</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control lance" id="contagem_por_sol_<?php echo $numero; ?>_contagem_psi_<?php echo $numero2; ?>_indice" name="contagem_por_sol[<?php echo $numero; ?>][contagem_psi][<?php echo $numero2; ?>][indice]"
                               placeholder="" value="<?php echo $contagemPorSolIndice->getIndice() ?>">
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="contagem_por_sol_<?php echo $numero; ?>_contagem_psi_<?php echo $numero2; ?>_contagem_hora" class="col-md-4 control-label">Hora</label>
                    <div class="col-md-8 div-help">
                        <input type="time" class="form-control" id="contagem_por_sol_<?php echo $numero; ?>_contagem_psi_<?php echo $numero2; ?>_contagem_hora" name="contagem_por_sol[<?php echo $numero; ?>][contagem_psi][<?php echo $numero2; ?>][contagem_hora]" value="<?php echo is_null($contagemPorSolIndice->getHora()) ? '' : $contagemPorSolIndice->getHora()->format("H:i") ?>">
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="contagem_por_sol_<?php echo $numero; ?>_contagem_psi_<?php echo $numero2; ?>_total" class="col-md-4 control-label lb_lance">Total</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control lance" id="contagem_por_sol_<?php echo $numero; ?>_contagem_psi_<?php echo $numero2; ?>_total" name="contagem_por_sol[<?php echo $numero; ?>][contagem_psi][<?php echo $numero2; ?>][total]"
                               placeholder="" value="<?php echo $contagemPorSolIndice->getTotal() ?>">
                    </div>
                </div>
            </div>
            
        </div>
        <hr class="hr-sisalbatroz">
        <div id="contagem_por_sol_especie_container_<?php echo $numero ?>_<?php echo $numero2 ?>" data-prototype="<?php echo htmlspecialchars($this->load->view("observador_bordo/contagem_por_sol_especie", array('indexContagemPorSolEspecie'=>'$$numero3$$', 'contagemPorSolEspecie' => new ContagemPorSolEspecie(), "numero" => $numero, "numero2" => $numero2, 'especies' => $especies), true)); ?>">
            <?php
            $lista = $contagemPorSolIndice->getContagemPorSolEspecie()->toArray();
            
            foreach ($lista as $key => $value) {
                echo $this->load->view("observador_bordo/contagem_por_sol_especie", array('contagemPorSolEspecie' => $value, 'indexContagemPorSolEspecie' => $key, "numero" => $numero, "numero2" => $numero2, 'especies' => $especies), true);
            }
            ?>
        </div>
        
        <a href="javascrit:;" class="btn btn-success" id="add_contagem_por_sol_especie_<?php echo $numero ?>_<?php echo $numero2 ?>" style="margin-top: 10px"><i class="glyphicon glyphicon-plus"></i> Adicionar espécie</a>
    </div>
</div>

<script>
    $(document).ready(function() {
        var contagemPorSolEspecie<?php echo $numero ?>_<?php echo $numero2 ?> = new Prototype.Class({
            'count': <?php echo $contagemPorSolIndice->getContagemPorSolEspecie()->count() ?>,
            'list': '#contagem_por_sol_especie_container_<?php echo $numero ?>_<?php echo $numero2 ?>',
            'addButton': '#add_contagem_por_sol_especie_<?php echo $numero ?>_<?php echo $numero2 ?>',
            'removeButton': '#remove-contagem-por-sol-especie-<?php echo $numero ?>-<?php echo $numero2 ?>',
            'container': '.contagem-por-sol-especie',
            'addOne': false,
            'isEdit': <?php echo $contagemPorSolIndice->getContagemPorSolEspecie()->count() > 0 ? 'true' : 'false' ?>
        });
    });
</script>