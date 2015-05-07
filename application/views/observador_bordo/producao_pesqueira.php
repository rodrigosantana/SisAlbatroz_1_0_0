<?php $numero = isset($indexProducaoPesqueira) ? $indexProducaoPesqueira : '$$numero$$' ?>

<div class="panel panel-interno-sisalbatroz producao-pesqueira">
    <div class="panel-heading">
<!--        <span>Lançamento #<?php echo $numero ?></span>-->
        <a href="javascript:;" class="pull-right panel-close-button-sisalbatroz" id="remove-producao-pesqueira-<?php echo $numero ?>"><i class="glyphicon glyphicon-remove"></i></a>
        <?php if (is_null($producaoPesqueira->getId())) :?>        
            <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>            
        <?php else :?>
            <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>
        <?php endif;?>
        
    </div>

    <div class="panel-body" style="<?php echo is_null($producaoPesqueira->getId()) ? '' : 'display:none'?>">

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="producao_<?php echo $numero ?>_lance" name="producao[<?php echo $numero ?>][lance]" class="col-md-4 control-label">Lance</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control insertaction" id="producao_<?php echo $numero ?>_lance" name="producao[<?php echo $numero ?>][lance]" placeholder="Apenas dígitos" value="<?php echo $producaoPesqueira->getLance() ?>">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="producao_<?php echo $numero ?>_data" name="producao[<?php echo $numero ?>][data]" class="col-md-4 control-label">Data</label>
                    <div class="col-md-8 div-help">
                        <input type="date" class="form-control" id="producao_<?php echo $numero ?>_data" name="producao[<?php echo $numero ?>][data]" value="<?php echo is_null($producaoPesqueira->getData()) ? '' : $producaoPesqueira->getData()->format("Y-m-d") ?>">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="producao_<?php echo $numero ?>_boia_radio" name="producao[<?php echo $numero ?>][boia_radio]" class="col-md-4 control-label">Boia rádio</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control" id="producao_<?php echo $numero ?>_boia_radio" name="producao[<?php echo $numero ?>][boia_radio]" placeholder="Apenas dígitos" value="<?php echo $producaoPesqueira->getBoiaRadio() ?>">
                    </div>
                </div>
            </div>
        </div>

        <h3 class="text-center titulo">Dados das Espécies</h3>
        <hr class="hr-sisalbatroz">

        <div id="producao_pesqueira_especie_container_<?php echo $numero ?>" data-prototype="<?php echo htmlspecialchars($this->load->view("observador_bordo/producao_pesqueira_especie", array('producaoPesqueiraEspecie' => new ProducaoPesqueiraEspecie(), "numero" => $numero, 'especies' => $especies), true)); ?>">
            <?php
            $lista = $producaoPesqueira->getEspecies();

            foreach ($lista as $key => $value) {
                echo $this->load->view("observador_bordo/producao_pesqueira_especie", array('producaoPesqueiraEspecie' => $value, 'indexProducaoPesqueiraEspecie' => $key, "numero" => $numero, 'especies' => $especies), true);
            }
            ?>
        </div>

        <a href="javascrit:;" class="btn btn-success" id="add_producao_pesqueira_especie_<?php echo $numero ?>" style="margin-top: 10px"><i class="glyphicon glyphicon-plus"></i> Adicionar espécie</a>
    </div>
</div>

<script>
    $(document).ready(function() {
        var producaoPesqueiraEspecie<?php echo $numero ?> = new Prototype.Class({
            'count': <?php echo $producaoPesqueira->getEspecies()->count() ?>,
            'list': '#producao_pesqueira_especie_container_<?php echo $numero ?>',
            'addButton': '#add_producao_pesqueira_especie_<?php echo $numero ?>',
            'removeButton': '#remove-producao-pesqueira-especie-<?php echo $numero ?>',
            'container': '.producao-pesqueira-especie',
            'addOne': <?php echo $producaoPesqueira->getEspecies()->count() > 0 ? 'false' : 'true' ?>,
            'isEdit': <?php echo $producaoPesqueira->getEspecies()->count() > 0 ? 'true' : 'false' ?>
        });

    });
</script>