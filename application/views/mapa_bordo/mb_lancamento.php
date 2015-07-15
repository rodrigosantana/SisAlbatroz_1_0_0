<?php $numero = isset($index) ? $index : '$$numero$$' ?>
<div class="panel panel-interno-sisalbatroz lancamento">
    <!-- Default panel contents -->
    <?php // $mbLance = new MbLance()?>
    <div class="panel-heading">
        <span>Lançamento #<?php echo $numero ?></span>
        <a href="javascript:;" class="pull-right panel-close-button-sisalbatroz" id="remove-lance-<?php echo $numero ?>"><i class="glyphicon glyphicon-remove"></i></a>
        <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="lancamento_<?php echo $numero; ?>_lance" class="col-md-4 control-label lb_lance">Lance *</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control lance insertaction" id="lancamento_<?php echo $numero; ?>_lance" name="lancamento[<?php echo $numero; ?>][lance]"
                               placeholder="Identificador do lance" value="<?php echo $mbLance->getLance() ?>">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="lancamento_<?php echo $numero; ?>_data"
                           class="col-md-4 control-label lb_data_lance">Data</label>
                    <div class="col-md-8 div-help">
                        <input type="date" class="form-control lance_data" id="lancamento_<?php echo $numero; ?>_data" name="lancamento[<?php echo $numero; ?>][data]"
                               value="<?php echo is_null($mbLance->getData()) ? '' : $mbLance->getData()->format("Y-m-d") ?>">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="lancamento_<?php echo $numero; ?>_anzois" class="col-md-4 control-label lb_anzois">Anzois</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control anzois" id="lancamento_<?php echo $numero; ?>_anzois" name="lancamento[<?php echo $numero; ?>][anzois]"
                               value="<?php echo $mbLance->getAnzois() ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="lancamento_<?php echo $numero; ?>_lat" class="col-md-4 control-label lb_lance_lat">Latitude (grau decimal)</label>
                    <div class="col-md-8 div-help">
                        <input type="number" step="any" class="form-control lance_lat" id="lancamento_<?php echo $numero; ?>_lat" name="lancamento[<?php echo $numero; ?>][lat]" value="<?php echo is_null($mbLance->getCoordenada()) ? '' : $mbLance->getCoordenada()->latitudeDecimal ?>">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="lancamento_<?php echo $numero; ?>_lng" class="col-md-4 control-label lb_lance_long">Longitude (grau decimal)
                    </label>
                    <div class="col-md-8 div-help">
                        <input type="number" step="any" class="form-control lance_long" id="lancamento_<?php echo $numero; ?>_lng" name="lancamento[<?php echo $numero; ?>][lng]" value="<?php echo is_null($mbLance->getCoordenada()) ? '' : $mbLance->getCoordenada()->longitudeDecimal ?>">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label class="col-md-4 control-label lb_isca">Isca</label>
                    <div class="col-md-8 div-help">
                        <?php foreach ($iscas as $isca): ?>
                            <label class="checkbox-inline" for="lancamento_<?php echo $numero; ?>_isca_<?php echo $isca->getIdIsca() ?>">
                                <input type="checkbox" class="isca_check" id="lancamento_<?php echo $numero; ?>_isca_<?php echo $isca->getIdIsca() ?>" name="lancamento[<?php echo $numero; ?>][isca][]"
                                       value="<?php echo $isca->getIdIsca() ?>" <?php echo Utils::ischecked($mbLance->getIdIsca()->toArray(), $isca->getIdIsca(), 'getIdIsca') ?>><?php echo $isca->getNome() ?>
                            </label>
                        <?php endforeach; ?>
                        <imput type="hidden" name="lancamento[<?php echo $numero; ?>][isca]"></imput>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="lancamento_<?php echo $numero; ?>_hora_ini" class="col-md-4 control-label lb_hora_ini">Hora Início do Lance</label>
                    <div class="col-md-8 div-help">
                        <input type="time" class="form-control lance_hora_ini" id="lancamento_<?php echo $numero; ?>_hora_ini" name="lancamento[<?php echo $numero; ?>][hora_ini]" value="<?php echo is_null($mbLance->getHoraInicial()) ? '' : $mbLance->getHoraInicial()->format("H:i") ?>">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="lancamento_<?php echo $numero; ?>_hora_fim" class="col-md-4 control-label lb_hora_fin">Hora Final do Lance</label>
                    <div class="col-md-8 div-help">
                        <input type="time" class="form-control lance_hora_fin" id="lancamento_<?php echo $numero; ?>_hora_fim" name="lancamento[<?php echo $numero; ?>][hora_fin]" value="<?php echo is_null($mbLance->getHoraFinal()) ? '' : $mbLance->getHoraFinal()->format("H:i") ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="col-md-3 control-label lb_mm_tipo">Medida Mitigatória </label>
                    <div class="col-md-9 div-help">

                        <?php foreach ($medidasMetigatorias as $mm): ?>

                            <label class="checkbox-inline" for="lancamento_<?php echo $numero; ?>_mm_<?php echo $mm->getIdMedidaMetigatoria() ?>">
                                <input type="checkbox" class="isca_check" id="lancamento_<?php echo $numero; ?>_mm_<?php echo $mm->getIdMedidaMetigatoria() ?>" name="lancamento[<?php echo $numero; ?>][mm][]"
                                       value="<?php echo $mm->getIdMedidaMetigatoria() ?>" <?php echo Utils::ischecked($mbLance->getIdMm()->toArray(), $mm->getIdMedidaMetigatoria(), 'getIdMedidaMetigatoria') ?>><?php echo $mm->getNome() ?>
                            </label>
                        <?php endforeach; ?>
                        <imput type="hidden" name="lancamento[<?php echo $numero; ?>][mm]"></imput>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="col-md-4 control-label lb_mm_uso">Uso da MM</label>
                    <div class="col-md-8 div-help">
                        <label class="radio-inline lb_radio" for="lancamento_<?php echo $numero; ?>_mm_uso_1">
                            <input type="radio" class="mm_uso_radio" name="lancamento[<?php echo $numero; ?>][mm_uso]" id="lancamento_<?php echo $numero; ?>_mm_uso_1" <?php echo $mbLance->getMmUso() == Utils::MM_USO_TOTAL ? 'checked' : '' ?> value="<?php echo Utils::MM_USO_TOTAL ?>">Total
                        </label>
                        <label class="radio-inline lb_radio" for="lancamento_<?php echo $numero; ?>_mm_uso_2">
                            <input type="radio" class="mm_uso_radio" name="lancamento[<?php echo $numero; ?>][mm_uso]" id="lancamento_<?php echo $numero; ?>_mm_uso_2" <?php echo $mbLance->getMmUso() == Utils::MM_USO_PARCIAL ? 'checked' : '' ?> value="<?php echo Utils::MM_USO_PARCIAL ?>">Parcial
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="lancamento_<?php echo $numero; ?>_ponteira_peso" class="col-md-4 control-label lb_anzois">Ponteira peso (g)</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control" id="lancamento_<?php echo $numero; ?>_ponteira_peso" name="lancamento[<?php echo $numero; ?>][ponteira_peso]"
                               value="<?php echo $mbLance->getPonteiraPeso() ?>">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="lancamento_<?php echo $numero; ?>_ponteira_distancia" class="col-md-4 control-label lb_anzois">Ponteira dist. (m)</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control" id="lancamento_<?php echo $numero; ?>_ponteira_distancia" name="lancamento[<?php echo $numero; ?>][ponteira_distancia]"
                               value="<?php echo $mbLance->getPonteiraDistancia() ?>">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="ave_capt" class="col-md-4 control-label lb_ave_capt">Ave Capturada*</label>
                    <div class="col-md-8 div-help">
                        <label class="radio-inline" for="lancamento_<?php echo $numero; ?>_ave_capt_1">
                            <input type="radio" class="ave_capt" name="lancamento[<?php echo $numero; ?>][ave_capt]" id="lancamento_<?php echo $numero; ?>_ave_capt_1" value="true" <?php echo $mbLance->getAveCapt() === true ? 'checked' : '' ?>>Sim
                        </label>
                        <label class="radio-inline" for="lancamento_<?php echo $numero; ?>_ave_capt_2">
                            <input type="radio" class="ave_capt" name="lancamento[<?php echo $numero; ?>][ave_capt]" id="lancamento_<?php echo $numero; ?>_ave_capt_2" value="false" <?php echo $mbLance->getAveCapt() === false ? 'checked' : '' ?>>Não
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

        </div>


        <h3 class="text-center titulo">Dados de Captura de Aves</h3>
        <hr class="hr-sisalbatroz">

        <div id="captura_container_<?php echo $numero ?>" data-prototype="<?php echo htmlspecialchars($this->load->view("mapa_bordo/mb_lancamento_especie", array('mbCaptura' => new MbCaptura(), "numero" => $numero, 'aves' => $aves, 'indexEp'=>'$$numero2$$'), true)); ?>">
            <?php
            $lista = $mbLance->getCapturas();

            foreach ($lista as $key => $value) {
                echo $this->load->view("mapa_bordo/mb_lancamento_especie", array('mbCaptura' => $value, 'indexEp' => $key, "numero" => $numero, 'aves' => $aves), true);
            }
            ?>
        </div>

        <a href="javascrit:;" class="btn btn-success" id="add_captura_<?php echo $numero ?>" style="margin-top: 10px"><i class="glyphicon glyphicon-plus"></i> Adicionar captura</a>

    </div>
</div>

<script>
    $(document).ready(function() {
        var capturas<?php echo $numero ?> = new Prototype.Class({
            'count': <?php echo $mbLance->getCapturas()->count() ?>,
            'list': '#captura_container_<?php echo $numero ?>',
            'addButton': '#add_captura_<?php echo $numero ?>',
            'removeButton': '#remove-captura-<?php echo $numero ?>',
            'container': '.captura',
            'addOne': <?php echo $mbLance->getCapturas()->count() > 0 ? 'false' : 'true' ?>,
            'isEdit': <?php echo $mbLance->getCapturas()->count() > 0 ? 'true' : 'false' ?>
        });

    });
</script>