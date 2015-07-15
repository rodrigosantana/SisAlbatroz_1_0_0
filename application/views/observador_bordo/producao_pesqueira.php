<?php $numero = isset($indexProducaoPesqueira) ? $indexProducaoPesqueira : '$$numero$$' ?>

<div class="panel panel-interno-sisalbatroz producao-pesqueira">
    <div class="panel-heading">
        <span id="producao_span_lance_<?php echo $numero; ?>"><?php echo is_null($producaoPesqueira->getLance()) ? '' : 'Lance #'. $producaoPesqueira->getLance()->getLance() ?></span>
        <a href="javascript:;" class="pull-right panel-close-button-sisalbatroz" id="remove-producao-pesqueira-<?php echo $numero ?>"><i class="glyphicon glyphicon-remove"></i></a>
        <?php if (is_null($producaoPesqueira->getId())) :?>        
            <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>            
        <?php else :?>
            <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>
        <?php endif;?>
        
    </div>

    <div class="panel-body insertaction" style="<?php echo is_null($producaoPesqueira->getId()) ? '' : 'display:none'?>">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="producao_<?php echo $numero ?>_lance" class="col-md-3 control-label">Lance *</label>
                    <div class="col-md-9 div-help">
                        <select class="select2 lance-observadorbordo" style="width: 100%" id="producao_<?php echo $numero ?>_lance" name="producao[<?php echo $numero ?>][lance]">
                            <option></option>
                            <?php foreach ($lances as $lance): ?>
                                <?php $selectedPp = (!is_null($producaoPesqueira->getLance()) && $producaoPesqueira->getLance()->getId() == $lance->getId()) ? 'selected' : ''?>
                                <option value="<?php echo $lance->getId() ?>" <?php echo $selectedPp?>><?php echo $lance->getLance() ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-6">                
                <div class="form-group">
                    <label for="producao_<?php echo $numero ?>_boia_radio" class="col-md-3 control-label">Boia rádio</label>
                    <div class="col-md-9 div-help">
                        <select class="select2 boia-observadorbordo" style="width: 100%" id="producao_<?php echo $numero ?>_boia_radio" name="producao[<?php echo $numero ?>][boia_radio]">
                            <option></option>
                            <?php foreach ($boias as $boia): ?>
                                <?php $selectedBoiasPp = (!is_null($producaoPesqueira->getBoiaRadio()) && $producaoPesqueira->getBoiaRadio()->getId() == $boia->getId()) ? 'selected' : ''?>
                                <option value="<?php echo $boia->getId() ?>" <?php echo $selectedBoiasPp?>><?php echo $boia->getBoiaRadio() ?></option>
                            <?php endforeach; ?>
                        </select>
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
            'addOne': false,
            'isEdit': <?php echo $producaoPesqueira->getEspecies()->count() > 0 ? 'true' : 'false' ?>
        });

        $("#producao_<?php echo $numero ?>_lance").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
        
        $(".select2-container").removeClass('lance-observadorbordo');
        
        $("#producao_<?php echo $numero ?>_boia_radio").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
        
        $(".select2-container").removeClass('boia-observadorbordo');
        
        <?php if (is_null($producaoPesqueira->getId())) :?>
            adicionarLances($("#producao_<?php echo $numero ?>_lance"));
            adicionarBoias($("#producao_<?php echo $numero ?>_boia_radio"));
        <?php endif;?>
            
        $('#producao_<?php echo $numero ?>_lance').change(function () {
            var data = $('#producao_<?php echo $numero ?>_lance').select2('data');
            var text = '';
            
            if (data) {
                text = 'Lance #' + data.text;
            }
            
            $('#producao_span_lance_<?php echo $numero; ?>').html(text);
        });
    });
</script>