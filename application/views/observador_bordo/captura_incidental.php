<?php $numero = isset($indexCapturaIncidental) ? $indexCapturaIncidental : '$$numero$$' ?>

<div class="panel panel-interno-sisalbatroz captura-incidental">
    <div class="panel-heading">
        <a href="javascript:;" class="pull-right panel-close-button-sisalbatroz" id="remove-captura-incidental-<?php echo $numero ?>"><i class="glyphicon glyphicon-remove"></i></a>
        <?php if (is_null($capturaIncidental->getId())) :?>        
            <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>            
        <?php else :?>
            <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>
        <?php endif;?>
        
    </div>

    <div class="panel-body" style="<?php echo is_null($capturaIncidental->getId()) ? '' : 'display:none'?>">

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="captura_incidental_<?php echo $numero ?>_lance" class="col-md-4 control-label">Lance</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control" id="captura_incidental_<?php echo $numero ?>_lance" name="captura_incidental[<?php echo $numero ?>][lance]" placeholder="Apenas dígitos" value="<?php echo $capturaIncidental->getLance() ?>">
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
                        <input type="number" class="form-control" id="captura_incidental_<?php echo $numero ?>_boia_radio" name="captura_incidental[<?php echo $numero ?>][boia_radio]" placeholder="Apenas dígitos" value="<?php echo $capturaIncidental->getBoiaRadio() ?>">
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
        
        <div class="row ">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="captura_incidental_<?php echo $numero; ?>_etiqueta" class="col-md-4 control-label">Etiqueta</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control" id="captura_incidental_<?php echo $numero; ?>_etiqueta" name="captura_incidental[<?php echo $numero; ?>][etiqueta]" placeholder="Apenas dígitos" value="<?php echo $capturaIncidental->getEtiqueta()?>">
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="captura_incidental_<?php echo $numero; ?>_especie" class="col-md-4 control-label">Espécie</label>
                    <div class="col-md-8 div-help">
                        <select class="select2" style="width: 100%" id="captura_incidental_<?php echo $numero; ?>_especie" name="captura_incidental[<?php echo $numero; ?>][especie]">
                            <option></option>
                            <?php foreach ($aves as $ave): ?>
                                <?php $selected = (!is_null($capturaIncidental->getEspecie()) && $capturaIncidental->getEspecie()->getIdAves() == $ave->getIdAves()) ? 'selected' : ''?>
                                <option value="<?php echo $ave->getIdAves() ?>" <?php echo $selected?>><?php echo $ave->getNomeCientifico() ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="captura_incidental_<?php echo $numero; ?>_quantidade" class="col-md-4 control-label">Quantidade</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control" id="captura_incidental_<?php echo $numero; ?>_quantidade" name="captura_incidental[<?php echo $numero; ?>][quantidade]" placeholder="Apenas dígitos" value="<?php echo $capturaIncidental->getQuantidade()?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function (){
        $("#captura_incidental_<?php echo $numero; ?>_especie").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
    });
</script>