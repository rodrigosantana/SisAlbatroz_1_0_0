<?php $numero = isset($indexContagemAveBoia) ? $indexContagemAveBoia : '$$numero$$' ?>

<div class="panel panel-interno-sisalbatroz contagem-ave-boia">
    <div class="panel-heading">
        <span id="contagem_ave_boia_span_lance_<?php echo $numero; ?>"><?php echo is_null($contagemAveBoia->getLance()) ? '' : 'Lance #'. $contagemAveBoia->getLance()->getLance() ?></span>
        <a href="javascript:;" class="pull-right panel-close-button-sisalbatroz" id="remove-contagem-ave-boia-<?php echo $numero ?>"><i class="glyphicon glyphicon-remove"></i></a>
        <?php if (is_null($contagemAveBoia->getId())) :?>
            <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
        <?php else :?>
            <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>
        <?php endif;?>

    </div>

    <div class="panel-body insertaction" style="<?php echo is_null($contagemAveBoia->getId()) ? '' : 'display:none'?>">
        <input type="hidden" id="contagem_ave_boia_<?php echo $numero; ?>_id" name="contagem_ave_boia[<?php echo $numero; ?>][id]" value="<?php echo is_null($contagemAveBoia->getId()) ? 'boia_' . $numero : $contagemAveBoia->getId()?>">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="contagem_ave_boia_<?php echo $numero ?>_lance" class="col-md-4 control-label">Lance *</label>
                    <div class="col-md-8 div-help">
                        <select class="select2 lance-observadorbordo" style="width: 100%" id="contagem_ave_boia_<?php echo $numero ?>_lance" name="contagem_ave_boia[<?php echo $numero ?>][lance]">
                            <option></option>
                            <?php foreach ($lances as $lance): ?>
                                <?php $selectedCab = (!is_null($contagemAveBoia->getLance()) && $contagemAveBoia->getLance()->getId() == $lance->getId()) ? 'selected' : ''?>
                                <option value="<?php echo $lance->getId() ?>" <?php echo $selectedCab?>><?php echo $lance->getLance() ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="contagem_ave_boia_<?php echo $numero ?>_boia_radio" class="col-md-4 control-label">Boia rádio</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control" id="contagem_ave_boia_<?php echo $numero ?>_boia_radio" name="contagem_ave_boia[<?php echo $numero ?>][boia_radio]" placeholder="Apenas dígitos" value="<?php echo $contagemAveBoia->getBoiaRadio() ?>">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="contagem_ave_boia_<?php echo $numero ?>_data" class="col-md-4 control-label">Data</label>
                    <div class="col-md-8 div-help">
                        <input type="date" class="form-control" id="contagem_ave_boia_<?php echo $numero ?>_data" name="contagem_ave_boia[<?php echo $numero ?>][data]" value="<?php echo is_null($contagemAveBoia->getDataHora()) ? '' : $contagemAveBoia->getDataHora()->format("Y-m-d") ?>">
                    </div>
                </div>
            </div>
        </div>


        <div class="row ">

            <div class="col-md-4">
                <div class="form-group">
                    <label for="contagem_ave_boia_<?php echo $numero; ?>_hora" class="col-md-4 control-label">Hora</label>
                    <div class="col-md-8 div-help">
                        <input type="time" class="form-control" id="contagem_ave_boia_<?php echo $numero; ?>_hora" name="contagem_ave_boia[<?php echo $numero; ?>][hora]" value="<?php echo is_null($contagemAveBoia->getDataHora()) ? '' : $contagemAveBoia->getDataHora()->format("H:i") ?>">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="contagem_ave_boia_<?php echo $numero; ?>_temperatura_agua" class="col-md-4 control-label lb_lance">Temperatura da água (°C)</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control" id="contagem_ave_boia_<?php echo $numero; ?>_temperatura_agua" name="contagem_ave_boia[<?php echo $numero; ?>][temperatura_agua]" value="<?php echo $contagemAveBoia->getTemperaturaAgua() ?>">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="contagem_ave_boia_<?php echo $numero; ?>_profundidade" class="col-md-4 control-label lb_lance">Profundidade (metros)</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control" id="contagem_ave_boia_<?php echo $numero; ?>_profundidade" name="contagem_ave_boia[<?php echo $numero; ?>][profundidade]" value="<?php echo $contagemAveBoia->getProfundidade() ?>">
                    </div>
                </div>
            </div>

        </div>

        <div class="row ">

            <div class="col-md-4">
                <div class="form-group">
                    <label for="contagem_ave_boia_<?php echo $numero; ?>_pressao_atmosferica" class="col-md-4 control-label lb_lance">Pressão atmosférica (hPa)</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control" id="contagem_ave_boia_<?php echo $numero; ?>_pressao_atmosferica" name="contagem_ave_boia[<?php echo $numero; ?>][pressao_atmosferica]" value="<?php echo $contagemAveBoia->getPressaoAtmosferica() ?>">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="contagem_ave_boia_<?php echo $numero; ?>_lat" class="col-md-4 control-label">Latitude (decimal)</label>
                    <div class="col-md-8 div-help">
                        <input type="number" step="any" class="form-control" id="contagem_ave_boia_<?php echo $numero; ?>_lat" name="contagem_ave_boia[<?php echo $numero; ?>][lat]" value="<?php echo is_null($contagemAveBoia->getCoordenada()) ? '' : $contagemAveBoia->getCoordenada()->latitudeDecimal ?>">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="contagem_ave_boia_<?php echo $numero; ?>_lat" class="col-md-4 control-label">Longitude (decimal)</label>
                    <div class="col-md-8 div-help">
                        <input type="number" step="any" class="form-control" id="contagem_ave_boia_<?php echo $numero; ?>_lat" name="contagem_ave_boia[<?php echo $numero; ?>][lng]" value="<?php echo is_null($contagemAveBoia->getCoordenada()) ? '' : $contagemAveBoia->getCoordenada()->longitudeDecimal ?>">
                    </div>
                </div>
            </div>
        </div>

        <h3 class="text-center titulo">Espécies</h3>
        <hr class="hr-sisalbatroz">

        <div id="contagem_ave_boia_especie_container_<?php echo $numero ?>" data-prototype="<?php echo htmlspecialchars($this->load->view("observador_bordo/contagem_ave_boia_especie", array('contagemAveBoiaEspecie' => new ContagemAveBoiaEspecie(), "numero" => $numero, 'especies' => $especies), true)); ?>">
            <?php
            $lista = $contagemAveBoia->getContagemAveBoiaEspecie();

            foreach ($lista as $key => $value) {
                echo $this->load->view("observador_bordo/contagem_ave_boia_especie", array('contagemAveBoiaEspecie' => $value, 'indexContagemAveBoiaEspecie' => $key, "numero" => $numero, 'especies' => $especies), true);
            }
            ?>
        </div>

        <a href="javascrit:;" class="btn btn-success" id="add_contagem_ave_boia_especie_<?php echo $numero ?>" style="margin-top: 10px"><i class="glyphicon glyphicon-plus"></i> Adicionar espécie</a>
    </div>
</div>

<script>
    $(document).ready(function () {
        var contagemAveBoiaEspecie<?php echo $numero ?> = new Prototype.Class({
            'count': <?php echo $contagemAveBoia->getContagemAveBoiaEspecie()->count() ?>,
            'list': '#contagem_ave_boia_especie_container_<?php echo $numero ?>',
            'addButton': '#add_contagem_ave_boia_especie_<?php echo $numero ?>',
            'removeButton': '#remove-contagem-ave-boia-especie-<?php echo $numero ?>',
            'container': '.contagem-ave-boia-especie',
            'addOne': false,
            'isEdit': <?php echo $contagemAveBoia->getContagemAveBoiaEspecie()->count() > 0 ? 'true' : 'false' ?>
        });

        $("#contagem_ave_boia_<?php echo $numero ?>_lance").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });

        <?php if (is_null($contagemAveBoia->getId())) :?>
            adicionarLances($("#contagem_ave_boia_<?php echo $numero ?>_lance"));
        <?php endif;?>

        $(".select2-container").removeClass('lance-observadorbordo');

        $("#contagem_ave_boia_<?php echo $numero ?>_boia_radio").change(function () {
            var idValue = '';

            if (!$('#contagem_ave_boia_<?php echo $numero; ?>_id').val() && $("#contagem_ave_boia_<?php echo $numero ?>_boia_radio").val()) {
                idValue = 'boia_' . $("#contagem_ave_boia_<?php echo $numero ?>_boia_radio").val();
            } else {
                idValue = $('#contagem_ave_boia_<?php echo $numero; ?>_id').val();
            }
            alterarBoia($("#contagem_ave_boia_<?php echo $numero ?>_boia_radio").val(), idValue);
        });

        $('#remove-contagem-ave-boia-<?php echo $numero ?>').click(function () {
            alterarBoia(null, $('#contagem_ave_boia_<?php echo $numero; ?>_id').val());
        });

        $('#contagem_ave_boia_<?php echo $numero ?>_lance').change(function () {
            var data = $('#contagem_ave_boia_<?php echo $numero ?>_lance').select2('data');
            var text = '';

            if (data) {
                text = 'Lance #' + data.text;
            }

            $('#contagem_ave_boia_span_lance_<?php echo $numero; ?>').html(text);
        });
    });
</script>
