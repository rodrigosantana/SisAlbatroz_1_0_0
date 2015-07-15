<?php $numero = isset($indexCapturaIncidental) ? $indexCapturaIncidental : '$$numero$$' ?>

<div class="panel panel-interno-sisalbatroz captura-incidental">
    <div class="panel-heading">
        <span id="captura_incidental_span_lance_<?php echo $numero; ?>"><?php echo is_null($capturaIncidental->getLance()) ? '' : 'Lance #'. $capturaIncidental->getLance()->getLance() ?></span>
        <a href="javascript:;" class="pull-right panel-close-button-sisalbatroz" id="remove-captura-incidental-<?php echo $numero ?>"><i class="glyphicon glyphicon-remove"></i></a>
        <?php if (is_null($capturaIncidental->getId())) :?>        
            <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>            
        <?php else :?>
            <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>
        <?php endif;?>
        
    </div>

    <div class="panel-body insertaction" style="<?php echo is_null($capturaIncidental->getId()) ? '' : 'display:none'?>">

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="captura_incidental_<?php echo $numero ?>_lance" class="col-md-4 control-label">Lance *</label>
                    <div class="col-md-8 div-help">
                        <select class="select2 lance-observadorbordo" style="width: 100%" id="captura_incidental_<?php echo $numero ?>_lance" name="captura_incidental[<?php echo $numero ?>][lance]">
                            <option></option>
                            <?php foreach ($lances as $lance): ?>
                                <?php $selectedCi = (!is_null($capturaIncidental->getLance()) && $capturaIncidental->getLance()->getId() == $lance->getId()) ? 'selected' : ''?>
                                <option value="<?php echo $lance->getId() ?>" <?php echo $selectedCi?>><?php echo $lance->getLance() ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="captura_incidental_<?php echo $numero ?>_data" class="col-md-4 control-label">Data</label>
                    <div class="col-md-8 div-help">
                        <input type="date" class="form-control" id="captura_incidental_<?php echo $numero ?>_data" name="captura_incidental[<?php echo $numero ?>][data]" value="<?php echo is_null($capturaIncidental->getData()) ? '' : $capturaIncidental->getData()->format("Y-m-d") ?>">
                    </div>
                </div>
            </div>

            <div class="col-md-4">                                
                <div class="form-group">
                    <label for="captura_incidental_<?php echo $numero ?>_boia_radio" class="col-md-4 control-label">Boia rádio</label>
                    <div class="col-md-8 div-help">
                        <select class="select2 boia-observadorbordo" style="width: 100%" id="captura_incidental_<?php echo $numero ?>_boia_radio" name="captura_incidental[<?php echo $numero ?>][boia_radio]">
                            <option></option>
                            <?php foreach ($boias as $boia): ?>
                                <?php $selectedBoiasCi = (!is_null($capturaIncidental->getBoiaRadio()) && $capturaIncidental->getBoiaRadio()->getId() == $boia->getId()) ? 'selected' : ''?>
                                <option value="<?php echo $boia->getId() ?>" <?php echo $selectedBoiasCi?>><?php echo $boia->getBoiaRadio() ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>                
            </div>
        </div>
        
        
        <div class="row ">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="captura_incidental_<?php echo $numero; ?>_lat" class="col-md-4 control-label">Latitude (decimal)</label>
                    <div class="col-md-8 div-help">
                        <input type="number" step="any" class="form-control" id="captura_incidental_<?php echo $numero; ?>_lat" name="captura_incidental[<?php echo $numero; ?>][lat]" value="<?php echo is_null($capturaIncidental->getCoordenada()) ? '' : $capturaIncidental->getCoordenada()->latitudeDecimal ?>">
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="captura_incidental_<?php echo $numero; ?>_lat" class="col-md-4 control-label">Longitude (decimal)</label>
                    <div class="col-md-8 div-help">
                        <input type="number" step="any" class="form-control" id="captura_incidental_<?php echo $numero; ?>_lat" name="captura_incidental[<?php echo $numero; ?>][lng]" value="<?php echo is_null($capturaIncidental->getCoordenada()) ? '' : $capturaIncidental->getCoordenada()->latitudeDecimal ?>">
                    </div>
                </div>
            </div>
        </div>
        
        
        <h3 class="text-center titulo">Espécies</h3>
        <hr class="hr-sisalbatroz">

        <div id="captura_incidental_especie_container_<?php echo $numero ?>" data-prototype="<?php echo htmlspecialchars($this->load->view("observador_bordo/captura_incidental_especie", array('capturaIncidentalEspecie' => new CapturaIncidentalEspecie(), "numero" => $numero, 'aves' => $aves), true)); ?>">
            <?php
            $lista = $capturaIncidental->getCapturaIncidentalEspecie();
            
            foreach ($lista as $key => $value) {
                echo $this->load->view("observador_bordo/captura_incidental_especie", array('capturaIncidentalEspecie' => $value, 'indexCapturaIncidentalEspecie' => $key, "numero" => $numero, 'aves' => $aves), true);
            }
            ?>
        </div>
        
        <a href="javascrit:;" class="btn btn-success" id="add_captura_incidental_especie_<?php echo $numero ?>" style="margin-top: 10px"><i class="glyphicon glyphicon-plus"></i> Adicionar espécie</a>
        
        
    </div>
</div>

<script>
    $(document).ready(function (){
        var capturaIncidentalEspecie<?php echo $numero ?> = new Prototype.Class({
            'count': <?php echo $capturaIncidental->getCapturaIncidentalEspecie()->count() ?>,
            'list': '#captura_incidental_especie_container_<?php echo $numero ?>',
            'addButton': '#add_captura_incidental_especie_<?php echo $numero ?>',
            'removeButton': '#remove-captura-incidental-especie-<?php echo $numero ?>',
            'container': '.captura-incidental-especie',
            'addOne': false,
            'isEdit': <?php echo $capturaIncidental->getCapturaIncidentalEspecie()->count() > 0 ? 'true' : 'false' ?>
        });
        
        $("#captura_incidental_<?php echo $numero ?>_lance").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
        
        $(".select2-container").removeClass('lance-observadorbordo');
        
        $("#captura_incidental_<?php echo $numero ?>_boia_radio").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
        
        $(".select2-container").removeClass('boia-observadorbordo');
        
        <?php if (is_null($capturaIncidental->getId())) :?>
            adicionarLances($("#captura_incidental_<?php echo $numero ?>_lance"));
            adicionarBoias($("#captura_incidental_<?php echo $numero ?>_boia_radio"));
        <?php endif;?>
            
        $('#captura_incidental_<?php echo $numero ?>_lance').change(function () {
            var data = $('#captura_incidental_<?php echo $numero ?>_lance').select2('data');
            var text = '';
            
            if (data) {
                text = 'Lance #' + data.text;
            }
            
            $('#captura_incidental_span_lance_<?php echo $numero; ?>').html(text);
        });
    });
</script>