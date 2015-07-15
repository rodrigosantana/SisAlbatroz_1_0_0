<div class="row">
    
    <div class="col-md-6">
        <?php //$objeto = new DadosAbioticosComplementar()?>
        <div class="row ">
            <div class="col-md-12" style="text-align: center; margin-bottom: 10px;">
                <label class="control-label" style="font-weight: bold; font-size: x-large;">Início</label>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_lat" class="col-md-4 control-label">Latitude (decimal)</label>
                    <div class="col-md-8 div-help">
                        <input type="number" step="any" class="form-control" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_lat" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][inicio][lat]" value="<?php echo is_null($objeto->getCoordenadaInicio()) ? '' : $objeto->getCoordenadaInicio()->latitudeDecimal ?>">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_lng" class="col-md-4 control-label">Longitude (decimal)
                    </label>
                    <div class="col-md-8 div-help">
                        <input type="number" step="any" class="form-control" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_lng" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][inicio][lng]" value="<?php echo is_null($objeto->getCoordenadaInicio()) ? '' : $objeto->getCoordenadaInicio()->longitudeDecimal ?>">
                    </div>
                </div>
            </div>
        </div>
        
        
        
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_data" class="col-md-4 control-label">Data</label>
                    <div class="col-md-8 div-help">
                        <input type="date" class="form-control" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_data" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][inicio][data]"
                               value="<?php echo is_null($objeto->getDataInicio()) ? '' : $objeto->getDataInicio()->format("Y-m-d") ?>">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_hora" class="col-md-4 control-label">Hora</label>
                    <div class="col-md-8 div-help">
                        <input type="time" class="form-control" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_hora" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][inicio][hora]" value="<?php echo is_null($objeto->getDataInicio()) ? '' : $objeto->getDataInicio()->format("H:i") ?>">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_profundidade" class="col-md-4 control-label lb_lance">Profundidade</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_profundidade" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][inicio][profundidade]" value="<?php echo $objeto->getProfundidadeInicio() ?>">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_rumo" class="col-md-4 control-label">Rumo</label>
                    <div class="col-md-8 div-help">
                        <select class="select2" style="width: 100%" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_rumo" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][inicio][rumo]">
                            <option></option>
                            <option value="N" <?php echo $objeto->getRumoInicio() === 'N' ? 'selected' : ''?>>N</option>
                            <option value="NNE" <?php echo $objeto->getRumoInicio() === 'NNE' ? 'selected' : ''?>>NNE</option>
                            <option value="NE" <?php echo $objeto->getRumoInicio() === 'NE' ? 'selected' : ''?>>NE</option>
                            <option value="ENE" <?php echo $objeto->getRumoInicio() === 'ENE' ? 'selected' : ''?>>ENE</option>
                            <option value="E" <?php echo $objeto->getRumoInicio() === 'E' ? 'selected' : ''?>>E</option>
                            <option value="ESE" <?php echo $objeto->getRumoInicio() === 'ESE' ? 'selected' : ''?>>ESE</option>
                            <option value="SE" <?php echo $objeto->getRumoInicio() === 'SE' ? 'selected' : ''?>>SE</option>
                            <option value="SSE" <?php echo $objeto->getRumoInicio() === 'SSE' ? 'selected' : ''?>>SSE</option>
                            <option value="S" <?php echo $objeto->getRumoInicio() === 'S' ? 'selected' : ''?>>S</option>
                            <option value="SSO" <?php echo $objeto->getRumoInicio() === 'SSO' ? 'selected' : ''?>>SSO</option>
                            <option value="SO" <?php echo $objeto->getRumoInicio() === 'SO' ? 'selected' : ''?>>SO</option>
                            <option value="OSO" <?php echo $objeto->getRumoInicio() === 'OSO' ? 'selected' : ''?>>OSO</option>
                            <option value="O" <?php echo $objeto->getRumoInicio() === 'O' ? 'selected' : ''?>>O</option>
                            <option value="ONO" <?php echo $objeto->getRumoInicio() === 'ONO' ? 'selected' : ''?>>ONO</option>
                            <option value="NO" <?php echo $objeto->getRumoInicio() === 'NO' ? 'selected' : ''?>>NO</option>
                            <option value="NNO" <?php echo $objeto->getRumoInicio() === 'NNO' ? 'selected' : ''?>>NNO</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_direcao_vento" class="col-md-4 control-label">Direção do vento</label>
                    <div class="col-md-8 div-help">
                        <select class="select2" style="width: 100%" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_direcao_vento" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][inicio][direcao_vento]">
                            <option></option>
                            <option value="N" <?php echo $objeto->getDirecaoVentoInicio() === 'N' ? 'selected' : ''?>>N</option>
                            <option value="NNE" <?php echo $objeto->getDirecaoVentoInicio() === 'NNE' ? 'selected' : ''?>>NNE</option>
                            <option value="NE" <?php echo $objeto->getDirecaoVentoInicio() === 'NE' ? 'selected' : ''?>>NE</option>
                            <option value="ENE" <?php echo $objeto->getDirecaoVentoInicio() === 'ENE' ? 'selected' : ''?>>ENE</option>
                            <option value="E" <?php echo $objeto->getDirecaoVentoInicio() === 'E' ? 'selected' : ''?>>E</option>
                            <option value="ESE" <?php echo $objeto->getDirecaoVentoInicio() === 'ESE' ? 'selected' : ''?>>ESE</option>
                            <option value="SE" <?php echo $objeto->getDirecaoVentoInicio() === 'SE' ? 'selected' : ''?>>SE</option>
                            <option value="SSE" <?php echo $objeto->getDirecaoVentoInicio() === 'SSE' ? 'selected' : ''?>>SSE</option>
                            <option value="S" <?php echo $objeto->getDirecaoVentoInicio() === 'S' ? 'selected' : ''?>>S</option>
                            <option value="SSO" <?php echo $objeto->getDirecaoVentoInicio() === 'SSO' ? 'selected' : ''?>>SSO</option>
                            <option value="SO" <?php echo $objeto->getDirecaoVentoInicio() === 'SO' ? 'selected' : ''?>>SO</option>
                            <option value="OSO" <?php echo $objeto->getDirecaoVentoInicio() === 'OSO' ? 'selected' : ''?>>OSO</option>
                            <option value="O" <?php echo $objeto->getDirecaoVentoInicio() === 'O' ? 'selected' : ''?>>O</option>
                            <option value="ONO" <?php echo $objeto->getDirecaoVentoInicio() === 'ONO' ? 'selected' : ''?>>ONO</option>
                            <option value="NO" <?php echo $objeto->getDirecaoVentoInicio() === 'NO' ? 'selected' : ''?>>NO</option>
                            <option value="NNO" <?php echo $objeto->getDirecaoVentoInicio() === 'NNO' ? 'selected' : ''?>>NNO</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_velocidade_vento" class="col-md-4 control-label lb_lance">Velocidade do vento (nós)</label>
                    <div class="col-md-8 div-help">
                        <select class="select2" style="width: 100%" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_velocidade_vento" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][inicio][velocidade_vento]">
                            <option></option>
                            <option value="1" <?php echo $objeto->getVelocidadeVentoInicio() === 1 ? 'selected' : ''?>>1</option>
                            <option value="2" <?php echo $objeto->getVelocidadeVentoInicio() === 2 ? 'selected' : ''?>>2</option>
                            <option value="3" <?php echo $objeto->getVelocidadeVentoInicio() === 3 ? 'selected' : ''?>>3</option>
                            <option value="4" <?php echo $objeto->getVelocidadeVentoInicio() === 4 ? 'selected' : ''?>>4</option>
                            <option value="5" <?php echo $objeto->getVelocidadeVentoInicio() === 5 ? 'selected' : ''?>>5</option>
                            <option value="6" <?php echo $objeto->getVelocidadeVentoInicio() === 6 ? 'selected' : ''?>>6</option>
                            <option value="7" <?php echo $objeto->getVelocidadeVentoInicio() === 7 ? 'selected' : ''?>>7</option>
                            <option value="8" <?php echo $objeto->getVelocidadeVentoInicio() === 8 ? 'selected' : ''?>>8</option>
                            <option value="9" <?php echo $objeto->getVelocidadeVentoInicio() === 9 ? 'selected' : ''?>>9</option>
                            <option value="10" <?php echo $objeto->getVelocidadeVentoInicio() === 10 ? 'selected' : ''?>>10</option>
                            <option value="11" <?php echo $objeto->getVelocidadeVentoInicio() === 11 ? 'selected' : ''?>>11</option>
                            <option value="12" <?php echo $objeto->getVelocidadeVentoInicio() === 12 ? 'selected' : ''?>>12</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_categoria_mar" class="col-md-4 control-label">Categoria do mar</label>
                    <div class="col-md-8 div-help">
                        <select class="select2" style="width: 100%" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_categoria_mar" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][inicio][categoria_mar]">
                            <option></option>
                            <option value="1" <?php echo $objeto->getCategoriaMarInicio() === 1 ? 'selected' : ''?>>1</option>
                            <option value="2" <?php echo $objeto->getCategoriaMarInicio() === 2 ? 'selected' : ''?>>2</option>
                            <option value="3" <?php echo $objeto->getCategoriaMarInicio() === 3 ? 'selected' : ''?>>3</option>
                            <option value="4" <?php echo $objeto->getCategoriaMarInicio() === 4 ? 'selected' : ''?>>4</option>
                            <option value="5" <?php echo $objeto->getCategoriaMarInicio() === 5 ? 'selected' : ''?>>5</option>
                            <option value="6" <?php echo $objeto->getCategoriaMarInicio() === 6 ? 'selected' : ''?>>6</option>
                            <option value="7" <?php echo $objeto->getCategoriaMarInicio() === 7 ? 'selected' : ''?>>7</option>
                            <option value="8" <?php echo $objeto->getCategoriaMarInicio() === 8 ? 'selected' : ''?>>8</option>
                            <option value="9" <?php echo $objeto->getCategoriaMarInicio() === 9 ? 'selected' : ''?>>9</option>
                            <option value="10" <?php echo $objeto->getCategoriaMarInicio() === 10 ? 'selected' : ''?>>10</option>
                            <option value="11" <?php echo $objeto->getCategoriaMarInicio() === 11 ? 'selected' : ''?>>11</option>
                            <option value="12" <?php echo $objeto->getCategoriaMarInicio() === 12 ? 'selected' : ''?>>12</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_temperatura_ar" class="col-md-4 control-label lb_lance">Temperatura do ar (°C)</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_temperatura_ar" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][inicio][temperatura_ar]" value="<?php echo $objeto->getTemperaturaArInicio() ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_temperatura_sup_mar" class="col-md-4 control-label lb_lance">Temperatura sup. mar (°C)</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_temperatura_sup_mar" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][inicio][temperatura_sup_mar]" value="<?php echo $objeto->getTemperaturaSupMarInicio() ?>">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_cobertura_ceu" class="col-md-4 control-label">Cobertura do céu</label>
                    <div class="col-md-8 div-help">
                        <select class="select2" style="width: 100%" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_cobertura_ceu" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][inicio][cobertura_ceu]">
                            <option></option>
                            <option value="1" <?php echo $objeto->getCoberturaCeuInicio() === 1 ? 'selected' : ''?>>1 - Céu totalmente limpo</option>
                            <option value="2" <?php echo $objeto->getCoberturaCeuInicio() === 2 ? 'selected' : ''?>>2</option>
                            <option value="3" <?php echo $objeto->getCoberturaCeuInicio() === 3 ? 'selected' : ''?>>3</option>
                            <option value="4" <?php echo $objeto->getCoberturaCeuInicio() === 4 ? 'selected' : ''?>>4</option>
                            <option value="5" <?php echo $objeto->getCoberturaCeuInicio() === 5 ? 'selected' : ''?>>5</option>
                            <option value="6" <?php echo $objeto->getCoberturaCeuInicio() === 6 ? 'selected' : ''?>>6</option>
                            <option value="7" <?php echo $objeto->getCoberturaCeuInicio() === 7 ? 'selected' : ''?>>7</option>
                            <option value="8" <?php echo $objeto->getCoberturaCeuInicio() === 8 ? 'selected' : ''?>>8 - Céu totalmente encoberto</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_pressao_atmosferica" class="col-md-4 control-label lb_lance">Pressão atmosférica</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_pressao_atmosferica" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][inicio][pressao_atmosferica]" value="<?php echo $objeto->getPressaoAtmosfericaInicio() ?>">
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    <div class="col-md-6">
        <div class="row ">
            <div class="col-md-12" style="text-align: center; margin-bottom: 10px;">
                <label class="control-label" style="font-weight: bold; font-size: x-large;">Fim</label>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_lat" class="col-md-4 control-label">Latitude (decimal)</label>
                    <div class="col-md-8 div-help">
                        <input type="number" step="any" class="form-control" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_lat" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][fim][lat]" value="<?php echo is_null($objeto->getCoordenadaFim()) ? '' : $objeto->getCoordenadaFim()->latitudeDecimal ?>">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_lng" class="col-md-4 control-label">Longitude (decimal)
                    </label>
                    <div class="col-md-8 div-help">
                        <input type="number" step="any" class="form-control" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_lng" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][fim][lng]" value="<?php echo is_null($objeto->getCoordenadaFim()) ? '' : $objeto->getCoordenadaFim()->longitudeDecimal ?>">
                    </div>
                </div>
            </div>
        </div>
        
        
        
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_data" class="col-md-4 control-label">Data</label>
                    <div class="col-md-8 div-help">
                        <input type="date" class="form-control" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_data" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][fim][data]"
                               value="<?php echo is_null($objeto->getDataFim()) ? '' : $objeto->getDataFim()->format("Y-m-d") ?>">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_hora" class="col-md-4 control-label">Hora</label>
                    <div class="col-md-8 div-help">
                        <input type="time" class="form-control" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_hora" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][fim][hora]" value="<?php echo is_null($objeto->getDataFim()) ? '' : $objeto->getDataFim()->format("H:i") ?>">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_profundidade" class="col-md-4 control-label lb_lance">Profundidade</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_profundidade" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][fim][profundidade]" value="<?php echo $objeto->getProfundidadeFim() ?>">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_rumo" class="col-md-4 control-label">Rumo</label>
                    <div class="col-md-8 div-help">
                        <select class="select2" style="width: 100%" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_rumo" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][fim][rumo]">
                            <option></option>
                            <option value="N" <?php echo $objeto->getRumoFim() === 'N' ? 'selected' : ''?>>N</option>
                            <option value="NNE" <?php echo $objeto->getRumoFim() === 'NNE' ? 'selected' : ''?>>NNE</option>
                            <option value="NE" <?php echo $objeto->getRumoFim() === 'NE' ? 'selected' : ''?>>NE</option>
                            <option value="ENE" <?php echo $objeto->getRumoFim() === 'ENE' ? 'selected' : ''?>>ENE</option>
                            <option value="E" <?php echo $objeto->getRumoFim() === 'E' ? 'selected' : ''?>>E</option>
                            <option value="ESE" <?php echo $objeto->getRumoFim() === 'ESE' ? 'selected' : ''?>>ESE</option>
                            <option value="SE" <?php echo $objeto->getRumoFim() === 'SE' ? 'selected' : ''?>>SE</option>
                            <option value="SSE" <?php echo $objeto->getRumoFim() === 'SSE' ? 'selected' : ''?>>SSE</option>
                            <option value="S" <?php echo $objeto->getRumoFim() === 'S' ? 'selected' : ''?>>S</option>
                            <option value="SSO" <?php echo $objeto->getRumoFim() === 'SSO' ? 'selected' : ''?>>SSO</option>
                            <option value="SO" <?php echo $objeto->getRumoFim() === 'SO' ? 'selected' : ''?>>SO</option>
                            <option value="OSO" <?php echo $objeto->getRumoFim() === 'OSO' ? 'selected' : ''?>>OSO</option>
                            <option value="O" <?php echo $objeto->getRumoFim() === 'O' ? 'selected' : ''?>>O</option>
                            <option value="ONO" <?php echo $objeto->getRumoFim() === 'ONO' ? 'selected' : ''?>>ONO</option>
                            <option value="NO" <?php echo $objeto->getRumoFim() === 'NO' ? 'selected' : ''?>>NO</option>
                            <option value="NNO" <?php echo $objeto->getRumoFim() === 'NNO' ? 'selected' : ''?>>NNO</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_direcao_vento" class="col-md-4 control-label">Direção do vento</label>
                    <div class="col-md-8 div-help">
                        <select class="select2" style="width: 100%" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_direcao_vento" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][fim][direcao_vento]">
                            <option></option>
                            <option value="N" <?php echo $objeto->getDirecaoVentoFim() === 'N' ? 'selected' : ''?>>N</option>
                            <option value="NNE" <?php echo $objeto->getDirecaoVentoFim() === 'NNE' ? 'selected' : ''?>>NNE</option>
                            <option value="NE" <?php echo $objeto->getDirecaoVentoFim() === 'NE' ? 'selected' : ''?>>NE</option>
                            <option value="ENE" <?php echo $objeto->getDirecaoVentoFim() === 'ENE' ? 'selected' : ''?>>ENE</option>
                            <option value="E" <?php echo $objeto->getDirecaoVentoFim() === 'E' ? 'selected' : ''?>>E</option>
                            <option value="ESE" <?php echo $objeto->getDirecaoVentoFim() === 'ESE' ? 'selected' : ''?>>ESE</option>
                            <option value="SE" <?php echo $objeto->getDirecaoVentoFim() === 'SE' ? 'selected' : ''?>>SE</option>
                            <option value="SSE" <?php echo $objeto->getDirecaoVentoFim() === 'SSE' ? 'selected' : ''?>>SSE</option>
                            <option value="S" <?php echo $objeto->getDirecaoVentoFim() === 'S' ? 'selected' : ''?>>S</option>
                            <option value="SSO" <?php echo $objeto->getDirecaoVentoFim() === 'SSO' ? 'selected' : ''?>>SSO</option>
                            <option value="SO" <?php echo $objeto->getDirecaoVentoFim() === 'SO' ? 'selected' : ''?>>SO</option>
                            <option value="OSO" <?php echo $objeto->getDirecaoVentoFim() === 'OSO' ? 'selected' : ''?>>OSO</option>
                            <option value="O" <?php echo $objeto->getDirecaoVentoFim() === 'O' ? 'selected' : ''?>>O</option>
                            <option value="ONO" <?php echo $objeto->getDirecaoVentoFim() === 'ONO' ? 'selected' : ''?>>ONO</option>
                            <option value="NO" <?php echo $objeto->getDirecaoVentoFim() === 'NO' ? 'selected' : ''?>>NO</option>
                            <option value="NNO" <?php echo $objeto->getDirecaoVentoFim() === 'NNO' ? 'selected' : ''?>>NNO</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_velocidade_vento" class="col-md-4 control-label lb_lance">Velocidade do vento (nós)</label>
                    <div class="col-md-8 div-help">
                        <select class="select2" style="width: 100%" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_velocidade_vento" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][fim][velocidade_vento]">
                            <option></option>
                            <option value="1" <?php echo $objeto->getVelocidadeVentoFim() === 1 ? 'selected' : ''?>>1</option>
                            <option value="2" <?php echo $objeto->getVelocidadeVentoFim() === 2 ? 'selected' : ''?>>2</option>
                            <option value="3" <?php echo $objeto->getVelocidadeVentoFim() === 3 ? 'selected' : ''?>>3</option>
                            <option value="4" <?php echo $objeto->getVelocidadeVentoFim() === 4 ? 'selected' : ''?>>4</option>
                            <option value="5" <?php echo $objeto->getVelocidadeVentoFim() === 5 ? 'selected' : ''?>>5</option>
                            <option value="6" <?php echo $objeto->getVelocidadeVentoFim() === 6 ? 'selected' : ''?>>6</option>
                            <option value="7" <?php echo $objeto->getVelocidadeVentoFim() === 7 ? 'selected' : ''?>>7</option>
                            <option value="8" <?php echo $objeto->getVelocidadeVentoFim() === 8 ? 'selected' : ''?>>8</option>
                            <option value="9" <?php echo $objeto->getVelocidadeVentoFim() === 9 ? 'selected' : ''?>>9</option>
                            <option value="10" <?php echo $objeto->getVelocidadeVentoFim() === 10 ? 'selected' : ''?>>10</option>
                            <option value="11" <?php echo $objeto->getVelocidadeVentoFim() === 11 ? 'selected' : ''?>>11</option>
                            <option value="12" <?php echo $objeto->getVelocidadeVentoFim() === 12 ? 'selected' : ''?>>12</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_categoria_mar" class="col-md-4 control-label">Categoria do mar</label>
                    <div class="col-md-8 div-help">
                        <select class="select2" style="width: 100%" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_categoria_mar" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][fim][categoria_mar]">
                            <option></option>
                            <option value="1" <?php echo $objeto->getCategoriaMarFim() === 1 ? 'selected' : ''?>>1</option>
                            <option value="2" <?php echo $objeto->getCategoriaMarFim() === 2 ? 'selected' : ''?>>2</option>
                            <option value="3" <?php echo $objeto->getCategoriaMarFim() === 3 ? 'selected' : ''?>>3</option>
                            <option value="4" <?php echo $objeto->getCategoriaMarFim() === 4 ? 'selected' : ''?>>4</option>
                            <option value="5" <?php echo $objeto->getCategoriaMarFim() === 5 ? 'selected' : ''?>>5</option>
                            <option value="6" <?php echo $objeto->getCategoriaMarFim() === 6 ? 'selected' : ''?>>6</option>
                            <option value="7" <?php echo $objeto->getCategoriaMarFim() === 7 ? 'selected' : ''?>>7</option>
                            <option value="8" <?php echo $objeto->getCategoriaMarFim() === 8 ? 'selected' : ''?>>8</option>
                            <option value="9" <?php echo $objeto->getCategoriaMarFim() === 9 ? 'selected' : ''?>>9</option>
                            <option value="10" <?php echo $objeto->getCategoriaMarFim() === 10 ? 'selected' : ''?>>10</option>
                            <option value="11" <?php echo $objeto->getCategoriaMarFim() === 11 ? 'selected' : ''?>>11</option>
                            <option value="12" <?php echo $objeto->getCategoriaMarFim() === 12 ? 'selected' : ''?>>12</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_temperatura_ar" class="col-md-4 control-label lb_lance">Temperatura do ar (°C)</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_temperatura_ar" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][fim][temperatura_ar]" value="<?php echo $objeto->getTemperaturaArFim() ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_temperatura_sup_mar" class="col-md-4 control-label lb_lance">Temperatura sup. mar (°C)</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_temperatura_sup_mar" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][fim][temperatura_sup_mar]" value="<?php echo $objeto->getTemperaturaSupMarFim() ?>">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_cobertura_ceu" class="col-md-4 control-label">Cobertura do céu</label>
                    <div class="col-md-8 div-help">
                        <select class="select2" style="width: 100%" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_cobertura_ceu" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][fim][cobertura_ceu]">
                            <option></option>
                            <option value="1" <?php echo $objeto->getCoberturaCeuFim() === 1 ? 'selected' : ''?>>1 - Céu totalmente limpo</option>
                            <option value="2" <?php echo $objeto->getCoberturaCeuFim() === 2 ? 'selected' : ''?>>2</option>
                            <option value="3" <?php echo $objeto->getCoberturaCeuFim() === 3 ? 'selected' : ''?>>3</option>
                            <option value="4" <?php echo $objeto->getCoberturaCeuFim() === 4 ? 'selected' : ''?>>4</option>
                            <option value="5" <?php echo $objeto->getCoberturaCeuFim() === 5 ? 'selected' : ''?>>5</option>
                            <option value="6" <?php echo $objeto->getCoberturaCeuFim() === 6 ? 'selected' : ''?>>6</option>
                            <option value="7" <?php echo $objeto->getCoberturaCeuFim() === 7 ? 'selected' : ''?>>7</option>
                            <option value="8" <?php echo $objeto->getCoberturaCeuFim() === 8 ? 'selected' : ''?>>8 - Céu totalmente encoberto</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row ">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_pressao_atmosferica" class="col-md-4 control-label lb_lance">Pressão atmosférica</label>
                    <div class="col-md-8 div-help">
                        <input type="number" class="form-control" id="dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_pressao_atmosferica" name="dado_abiotico[<?php echo $numero; ?>][<?php echo $nome; ?>][fim][pressao_atmosferica]" value="<?php echo $objeto->getPressaoAtmosfericaFim() ?>">
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
</div>


<script>
    $(document).ready(function() {
        
        $("#dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_cobertura_ceu").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
        
        $("#dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_categoria_mar").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        }); 
        
        $("#dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_direcao_vento").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
        
        $("#dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_rumo").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
        
        
        $("#dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_cobertura_ceu").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
        
        $("#dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_categoria_mar").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        }); 
        
        $("#dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_direcao_vento").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
        
        $("#dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_rumo").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
        
        $("#dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_inicio_velocidade_vento").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
        
        
        $("#dado_abiotico_<?php echo $numero; ?>_<?php echo $nome; ?>_fim_velocidade_vento").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
    });

</script>











