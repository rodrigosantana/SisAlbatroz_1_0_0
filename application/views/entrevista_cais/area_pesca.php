<?php $numeroArea = isset($indexArea) ? $indexArea : '$$numero$$' ?>

<div class="row area_pesca">
	<div class="col-md-5">
        <div class="form-group">
            <label for="areas_pesca_<?php echo $numeroArea?>_nome_area" class="col-md-5 control-label">Nome da área *</label>
            <div class="col-md-7 div-help">
                <input type="text" class="form-control insertaction" id="areas_pesca_<?php echo $numeroArea?>_nome_area" name="areas_pesca[<?php echo $numeroArea?>][nome_area]" value="<?php echo $areaPesca->getNome()?>">
            </div>
        </div>
    </div>


    <div class="col-md-3">
        <div class="form-group">
            <label for="areas_pesca_<?php echo $numeroArea?>_profundidade_inicial" class="col-md-7 control-label" style="padding-right: 0px">Profundidade inicial</label>
            <div class="col-md-5 div-help">
                <input type="number" class="form-control" id="areas_pesca_<?php echo $numeroArea?>_profundidade_inicial" name="areas_pesca[<?php echo $numeroArea?>][profundidade_inicial]" placeholder="Apenas dígitos" value="<?php echo $areaPesca->getProfundidadeInicial()?>">
            </div>
        </div>
    </div>
    
    
    <div class="col-md-3">
        <div class="form-group">
            <label for="areas_pesca_<?php echo $numeroArea?>_profundidade_final" class="col-md-7 control-label" style="padding-right: 0px">Profundidade final</label>
            <div class="col-md-5 div-help">
                <input type="number" class="form-control" id="areas_pesca_<?php echo $numeroArea?>_profundidade_final" name="areas_pesca[<?php echo $numeroArea?>][profundidade_final]" placeholder="Apenas dígitos" value="<?php echo $areaPesca->getProfundidadeFinal()?>">
            </div>
        </div>
    </div>
    
    <div class="col-md-1 col-sm-1">
        <a href="javascrit:;" class="btn btn-danger" id="remove-area-pesca-<?php echo $numeroArea?>" style="font-size: 19px;"><i class="glyphicon glyphicon-remove"></i></a>
    </div>
</div>