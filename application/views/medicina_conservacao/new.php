
<!-- Início do corpo da página -->

<?php if ($mensagem): ?>    
    <div class="col-md-4 col-md-offset-4 alert alert-success alert-dismissible" role="alert" style="margin-top: 20px">
        <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
        <p><strong>Sucesso!</strong><p> 
            Registro salvo com sucesso.
    </div>  
<?php endif; ?>

<div class="row">
    <div class="col-md-12">
        <h2 class="text-left titulo">Medicina da Conservação</h2>
    </div>
</div>

<form class="form-horizontal" role="form" action="<?php echo site_url('medicinaconservacao/salva'); ?>" method="post">
    <input type="hidden" id="id" name="id" value="">

    <div class="panel panel-sisalbatroz">
        <div class="panel-heading"><span><b>Cadastro de viagens</b></span></div>    
        <div class="panel-body">

            <ul class="nav nav-tabs">
                <li class="active"><a href="#dadosgerais" data-toggle="tab">Dados gerais</a></li>                
                <li><a href="#tab_procedencia" data-toggle="tab">Procedência</a></li>
                <li><a href="#biometria" data-toggle="tab">Biometria</a></li>
                <li><a href="#coleta" data-toggle="tab">Coleta de materiais biológicos</a></li>
                <li><a href="#outros" data-toggle="tab">Outras pesquisa</a></li>
            </ul>
            
            <div class="tab-content" style="margin-top: 20px;">
                <div id="dadosgerais" class="tab-pane active">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="etiqueta" class="col-md-3 control-label">Etiqueta</label>
                                <div class="col-md-9 div-help">
                                    <input type="text" class="form-control" id="etiqueta" name="etiqueta" value="" maxlength="50">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="etiqueta_antiga" class="col-md-3 control-label">Etiqueta antiga</label>
                                <div class="col-md-9 div-help">
                                    <input type="text" class="form-control" id="etiqueta_antiga" name="etiqueta_antiga" value="" maxlength="50">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="especie" class="col-md-3 control-label">Espécie</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="especie" name="especie">
                                        <option></option>
                                        <?php foreach ($aves as $ave): ?>
                                            <?php //$selected = (!is_null($contagemPorSolEspecie->getEspecie()) && $contagemPorSolEspecie->getEspecie()->getIdAves() == $ave->getIdAves()) ? 'selected' : ''?>
                                            <option value="<?php echo $ave->getIdAves() ?>" <?php echo $selected?>><?php echo $ave->getNomeCientifico() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="responsavel" class="col-md-3 control-label">Responsável</label>
                                <div class="col-md-9 div-help">
                                    <input type="text" class="form-control" id="responsavel" name="responsavel" value="" maxlength="150">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="data_entrada" class="col-md-3 control-label">Data de entrada</label>
                                <div class="col-md-9 div-help">
                                    <input type="date" class="form-control" id="data_entrada" name="data_entrada" value="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="data_captura" class="col-md-3 control-label">Data de captura</label>
                                <div class="col-md-9 div-help">
                                    <input type="date" class="form-control" id="data_captura" name="data_captura" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="latitude" class="col-md-3 control-label">Local da captura (lat)</label>
                                <div class="col-md-9 div-help">
                                    <input type="number" step="any" class="form-control" id="latitude" name="latitude" value="">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="longitude" class="col-md-3 control-label">Local da captura (long)</label>
                                <div class="col-md-9 div-help">
                                    <input type="number" step="any" class="form-control" id="longitude" name="longitude" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="anilha" class="col-md-3 control-label">Anilha</label>
                                <div class="col-md-9 div-help">
                                    <input type="text" class="form-control" id="anilha" name="anilha" value="" maxlength="50">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="plumagem" class="col-md-3 control-label">Plumagem</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="plumagem" name="plumagem">
                                        <option></option>
                                        <option value="<?php echo Utils::PLUMAGEM_ADULTO?>">Adulto</option>
                                        <option value="<?php echo Utils::PLUMAGEM_ADULTO_EM_MUDA?>">Adulto em muda</option>
                                        <option value="<?php echo Utils::PLUMAGEM_JUVENIL?>">Juvenil</option>
                                        <option value="<?php echo Utils::PLUMAGEM_JUVENIL_EM_MUDA?>">Juvenil em muda</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="procedencia" class="col-md-3 control-label">Procedência</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="procedencia" name="procedencia">
                                        <option></option>
                                        <option value="<?php echo Utils::PROCEDENCIA_CAPTURA_INCIDENTAL?>">Captura incidental</option>
                                        <option value="<?php echo Utils::PROCEDENCIA_ENCALHE?>">Encalhe</option>
                                        <option value="<?php echo Utils::PROCEDENCIA_REABILITACAO?>">Reabilitação</option>
                                        <option value="<?php echo Utils::PROCEDENCIA_OUTROS?>">Outros</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6" style="display: none" id="container_procedencia_outros">
                            <div class="form-group">
                                <label for="procedencia_outros" class="col-md-3 control-label">Procedência outros</label>
                                <div class="col-md-9 div-help">
                                    <input type="text" class="form-control" id="procedencia_outros" name="procedencia_outros" value="" maxlength="150">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
                <div id="tab_procedencia" class="tab-pane">
                    <fieldset><h3 class="text-center titulo">Captura incidental</h3></fieldset>
                    <hr class="hr-sisalbatroz">
                    
                    <div class="form-group">
                        <label for="cruzeiro" class="col-md-3 control-label">Informação proveniente de</label>
                        <div class="col-md-9 div-help">
                            <div class="col-md-2 checkbox"><label><input type="checkbox" id="informacao_captura_cruzeiro" name="informacao_captura" value="cruzeiro">Cruzeiro</label></div>
                            <div class="col-md-3 checkbox"><label><input type="checkbox" id="informacao_captura_externo" name="informacao_captura" value="externo">Dados externos</label></div>
                        </div>
                    </div>
                    
                    <div class="row" id="container_cruzeiro" style="display: none">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cruzeiro" class="col-md-3 control-label">Cruzeiro</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="cruzeiro" name="cruzeiro">
                                        <option></option>
                                        <?php foreach ($cruzeiros as $cruzeiro): ?>
                                            <?php //$selected = (!is_null($contagemPorSolEspecie->getEspecie()) && $contagemPorSolEspecie->getEspecie()->getIdAves() == $ave->getIdAves()) ? 'selected' : ''?>
                                            <option value="<?php echo $cruzeiro->getId() ?>" <?php echo $selected?>><?php echo $cruzeiro->__toString() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lance" class="col-md-3 control-label">Lance</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="lance" name="lance">
                                        <option></option>
                                        <?php foreach ($lances as $lance): ?>
                                            <?php //$selected = (!is_null($contagemPorSolEspecie->getEspecie()) && $contagemPorSolEspecie->getEspecie()->getIdAves() == $ave->getIdAves()) ? 'selected' : ''?>
                                            <option value="<?php echo $lance->getId() ?>" <?php echo $selected?>><?php echo $lance->__toString() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row" id="container_externo" style="display: none">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="observador" class="col-md-3 control-label">Observador</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="observador" name="observador">
                                        <option></option>
                                        <?php foreach ($observadores as $observador): ?>
                                            <?php //$selected = (!is_null($contagemPorSolEspecie->getEspecie()) && $contagemPorSolEspecie->getEspecie()->getIdAves() == $ave->getIdAves()) ? 'selected' : ''?>
                                            <option value="<?php echo $observador->getId() ?>" <?php echo $selected?>><?php echo $observador->__toString() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mestre" class="col-md-3 control-label">Mestre</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="mestre" name="mestre">
                                        <option></option>
                                        <?php foreach ($mestres as $mestre): ?>
                                            <?php //$selected = (!is_null($contagemPorSolEspecie->getEspecie()) && $contagemPorSolEspecie->getEspecie()->getIdAves() == $ave->getIdAves()) ? 'selected' : ''?>
                                            <option value="<?php echo $mestre->getId() ?>" <?php echo $selected?>><?php echo $mestre->__toString() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="embarcacao" class="col-md-3 control-label">Embarcação</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="embarcacao" name="embarcacao">
                                        <option></option>
                                        <?php foreach ($embarcacoes as $embarcacao): ?>
                                            <?php //$selected = (!is_null($contagemPorSolEspecie->getEspecie()) && $contagemPorSolEspecie->getEspecie()->getIdAves() == $ave->getIdAves()) ? 'selected' : ''?>
                                            <option value="<?php echo $embarcacao->getId() ?>" <?php echo $selected?>><?php echo $embarcacao->__toString() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <fieldset><h3 class="text-center titulo">Encalhe/Reabilitação/outros</h3></fieldset>
                    <hr class="hr-sisalbatroz">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="historico" class="col-md-3 control-label">Histórico</label>
                                <div class="col-md-9 div-help">
                                    <textarea class="form-control" id="historico" name="historico"><?php  ?></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="descricao_local_coleta" class="col-md-3 control-label">Descrição do Local de Coleta</label>
                                <div class="col-md-9 div-help">
                                    <textarea class="form-control" id="descricao_local_coleta" name="descricao_local_coleta"><?php  ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
                <div id="biometria" class="tab-pane">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="peso" class="col-md-4 control-label">Peso (gramas)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="peso" name="peso" value="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="comprimento_total" class="col-md-4 control-label">Comprimento total (cm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="comprimento_total" name="comprimento_total" value="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="culmem" class="col-md-4 control-label">Cúlmem (mm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="culmem" name="culmem" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="narina_culmem" class="col-md-4 control-label">Narina ao cúlmem (mm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="narina_culmem" name="narina_culmem" value="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="altura_bico_base" class="col-md-4 control-label">Altura do bico na base (mm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="altura_bico_base" name="altura_bico_base" value="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="altura_minima_bico" class="col-md-4 control-label">Altura mínima do bico (mm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="altura_minima_bico" name="altura_minima_bico" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="altura_bico_unguis" class="col-md-4 control-label">Altura do bico na unguis (mm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="altura_bico_unguis" name="altura_bico_unguis" value="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="largura_bico_base" class="col-md-4 control-label">Largura do bico na base (mm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="largura_bico_base" name="largura_bico_base" value="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="comprimento_cabeca" class="col-md-4 control-label">Comprimento da cabeça (mm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="comprimento_cabeca" name="comprimento_cabeca" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="comprimento_asa" class="col-md-4 control-label">Comprimento da asa (cm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="comprimento_asa" name="comprimento_asa" value="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="comprimento_cauda" class="col-md-4 control-label">Comprimento da cauda (mm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="comprimento_cauda" name="comprimento_cauda" value="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="comprimento_tarso" class="col-md-4 control-label">Comprimento do tarso (mm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="comprimento_tarso" name="comprimento_tarso" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="comprimento_dedo_sem_unha" class="col-md-4 control-label">Comprimento do dedo sem unha (mm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="comprimento_dedo_sem_unha" name="comprimento_dedo_sem_unha" value="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="comprimento_dedo_com_unha" class="col-md-4 control-label">Comprimento do dedo com unha (mm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="" name="comprimento_dedo_com_unha" value="comprimento_dedo_com_unha">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="envergadura" class="col-md-4 control-label">Envergadura (cm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="envergadura" name="envergadura" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="table-responsive">
                        <table class="table table-sisalbatroz">
                            <thead>
                                <tr>
                                    <th class="col-md-3"></th>
                                    <th class="col-md-2">Sim</th>
                                    <th class="col-md-2">Não</th>
                                    <th class="col-md-5"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" class="th-table-checkbox">Muda Asa</th>
                                    <td><input type="checkbox" name="muda_asa" value="true" class="check-sim-nao" <?php //echo $dadoAbiotico->getRegPeso() === true ? 'checked' : ''  ?>></td>
                                    <td><input type="checkbox" name="muda_asa" value="false" class="check-sim-nao" <?php //echo $dadoAbiotico->getRegPeso() === true ? 'checked' : ''  ?>></td>           
                                </tr>          
                                <tr>
                                    <th scope="row" class="th-table-checkbox">Muda Cauda</th>
                                    <td><input type="checkbox" name="muda_cauda" value="true" class="check-sim-nao" <?php //echo $dadoAbiotico->getRegPeso() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="muda_cauda" value="false" class="check-sim-nao" <?php //echo $dadoAbiotico->getRegPeso() === true ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Muda Cabeça</th>
                                    <td><input type="checkbox" name="muda_cabeca" value="true" class="check-sim-nao" <?php //echo $dadoAbiotico->getRegPeso() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="muda_cabeca" value="false" class="check-sim-nao" <?php //echo $dadoAbiotico->getRegPeso() === true ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Muda Dorso</th>
                                    <td><input type="checkbox" name="muda_dorso" value="true" class="check-sim-nao" <?php //echo $dadoAbiotico->getRegPeso() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="muda_dorso" value="false" class="check-sim-nao" <?php //echo $dadoAbiotico->getRegPeso() === true ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Muda Ventre</th>
                                    <td><input type="checkbox" name="muda_ventre" value="true" class="check-sim-nao" <?php //echo $dadoAbiotico->getRegPeso() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="muda_ventre" value="false" class="check-sim-nao" <?php //echo $dadoAbiotico->getRegPeso() === true ? 'checked' : '' ?>></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>             
                    
                </div>
                
                
                
                <div id="coleta" class="tab-pane">
                    <fieldset><h3 class="text-center titulo">Informações gerais</h3></fieldset>
                    <hr class="hr-sisalbatroz">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="data_necropsia" class="col-md-3 control-label">Data de necropsia</label>
                                <div class="col-md-9 div-help">
                                    <input type="date" class="form-control" id="data_necropsia" name="data_necropsia" value="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="local_necropsia" class="col-md-3 control-label">Local de necropsia</label>
                                <div class="col-md-9 div-help">
                                    <textarea class="form-control" id="local_necropsia" name="local_necropsia"><?php  ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="condicao_carcaca" class="col-md-3 control-label">Condição da carcaça</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="condicao_carcaca" name="condicao_carcaca">
                                        <option></option>
                                        <option value="<?php echo Utils::CONDICAO_CARCACA_FRESCA?>">Fresca</option>
                                        <option value="<?php echo Utils::CONDICAO_CARCACA_CONGELADA?>">Congelada</option>
                                        <option value="<?php echo Utils::CONDICAO_CARCACA_INTEIRA?>">Inteira</option>
                                        <option value="<?php echo Utils::CONDICAO_CARCACA_EMPARTES?>">Em Partes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="autolise" class="col-md-3 control-label">Autólise</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="autolise" name="autolise">
                                        <option></option>
                                        <option value="<?php echo Utils::AUTOLISE_LEVE?>">Leve</option>
                                        <option value="<?php echo Utils::AUTOLISE_MODERADA?>">Moderada</option>
                                        <option value="<?php echo Utils::AUTOLISE_SEVERA?>">Severa</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sexagem" class="col-md-3 control-label">Sexagem</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="sexagem" name="sexagem">
                                        <option></option>
                                        <option value="<?php echo Utils::MACHO_CERTEZA?>">Macho / Certeza</option>
                                        <option value="<?php echo Utils::MACHO_INCERTEZA?>">Macho / Incerteza</option>
                                        <option value="<?php echo Utils::FEMEA_CERTEZA?>">Femea / Certeza</option>
                                        <option value="<?php echo Utils::FEMEA_INCERTEZA?>">Femea / Incerteza</option>
                                        <option value="<?php echo Utils::INDETERMINADO?>">Indeterminado</option>                                        
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="empetrolamento" class="col-md-3 control-label">Empetrolamento</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="empetrolamento" name="empetrolamento">
                                        <option></option>
                                        <option value="<?php echo Utils::EMPETROLAMENTO_25?>">25%</option>
                                        <option value="<?php echo Utils::EMPETROLAMENTO_25_75?>">25% - 75%</option>
                                        <option value="<?php echo Utils::EMPETROLAMENTO_75?>">75%</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="condicao_corporal" class="col-md-3 control-label">Condição corporal</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="condicao_corporal" name="condicao_corporal">
                                        <option></option>
                                        <option value="<?php echo Utils::CONDICAO_CORPORAL_OTIMO?>">Ótimo</option>
                                        <option value="<?php echo Utils::CONDICAO_CORPORAL_BOM?>">Bom</option>
                                        <option value="<?php echo Utils::CONDICAO_CORPORAL_MAGRO?>">Magro</option>
                                        <option value="<?php echo Utils::CONDICAO_CORPORAL_CAQUETICO?>">Caquético</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>   
                    
                    <fieldset><h3 class="text-center titulo">Parasitas</h3></fieldset>
                    <hr class="hr-sisalbatroz">
                    
                    <fieldset><h4 class="text-center titulo">Ectoparasitas</h4></fieldset>
                    
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="piolhos" class="col-md-3 control-label">Piolhos</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="piolhos" name="piolhos">
                                        <option></option>
                                        <option value="<?php echo Utils::BAIXA?>">1 Cruz</option>
                                        <option value="<?php echo Utils::MEDIA?>">2 Cruz</option>
                                        <option value="<?php echo Utils::ALTA?>">3 Cruz</option>
                                        <option value="<?php echo Utils::NAO_INFORMADO?>">Não informado</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="carrapatos" class="col-md-3 control-label">Carrapatos</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="carrapatos" name="carrapatos">
                                        <option></option>
                                        <option value="<?php echo Utils::BAIXA?>">1 Cruz</option>
                                        <option value="<?php echo Utils::MEDIA?>">2 Cruz</option>
                                        <option value="<?php echo Utils::ALTA?>">3 Cruz</option>
                                        <option value="<?php echo Utils::NAO_INFORMADO?>">Não informado</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="col-md-3 control-label">Pulgas</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="pulgas" name="pulgas">
                                        <option></option>
                                        <option value="<?php echo Utils::BAIXA?>">1 Cruz</option>
                                        <option value="<?php echo Utils::MEDIA?>">2 Cruz</option>
                                        <option value="<?php echo Utils::ALTA?>">3 Cruz</option>
                                        <option value="<?php echo Utils::NAO_INFORMADO?>">Não informado</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">    
                            <div class="form-group">
                                <label for="lepadomorpha" class="col-md-3 control-label">Lepadomorpha</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="lepadomorpha" name="lepadomorpha">
                                        <option></option>
                                        <option value="<?php echo Utils::BAIXA?>">1 Cruz</option>
                                        <option value="<?php echo Utils::MEDIA?>">2 Cruz</option>
                                        <option value="<?php echo Utils::ALTA?>">3 Cruz</option>
                                        <option value="<?php echo Utils::NAO_INFORMADO?>">Não informado</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="larvas_putrefacao" class="col-md-3 control-label">Larvas de putrefação</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="larvas_putrefacao" name="larvas_putrefacao">
                                        <option></option>
                                        <option value="<?php echo Utils::BAIXA?>">1 Cruz</option>
                                        <option value="<?php echo Utils::MEDIA?>">2 Cruz</option>
                                        <option value="<?php echo Utils::ALTA?>">3 Cruz</option>
                                        <option value="<?php echo Utils::NAO_INFORMADO?>">Não informado</option>
                                    </select>
                                </div>
                            </div>
                        </div>                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="outro_parasita" class="col-md-3 control-label">Outros</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="outro_parasita" name="outro_parasita">
                                        <option></option>
                                        <option value="<?php echo Utils::BAIXA?>">1 Cruz</option>
                                        <option value="<?php echo Utils::MEDIA?>">2 Cruz</option>
                                        <option value="<?php echo Utils::ALTA?>">3 Cruz</option>
                                        <option value="<?php echo Utils::NAO_INFORMADO?>">Não informado</option>
                                    </select>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="outro_parasita_descricao" class="col-md-3 control-label">Outros descrição</label>
                                <div class="col-md-9 div-help">
                                    <input type="text" class="form-control" id="outro_parasita_descricao" name="outro_parasita_descricao" value="" maxlength="150">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <fieldset><h4 class="text-center titulo">Endoparasitas</h4></fieldset>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nematoides" class="col-md-3 control-label">Nematóides</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="nematoides" name="nematoides">
                                        <option></option>
                                        <option value="<?php echo Utils::BAIXA?>">1 Cruz</option>
                                        <option value="<?php echo Utils::MEDIA?>">2 Cruz</option>
                                        <option value="<?php echo Utils::ALTA?>">3 Cruz</option>
                                        <option value="<?php echo Utils::NAO_INFORMADO?>">Não informado</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="acantocefalos" class="col-md-3 control-label">Acantocéfalos</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="acantocefalos" name="acantocefalos">
                                        <option></option>
                                        <option value="<?php echo Utils::BAIXA?>">1 Cruz</option>
                                        <option value="<?php echo Utils::MEDIA?>">2 Cruz</option>
                                        <option value="<?php echo Utils::ALTA?>">3 Cruz</option>
                                        <option value="<?php echo Utils::NAO_INFORMADO?>">Não informado</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cestoides" class="col-md-3 control-label">Cestóides</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="cestoides" name="cestoides">
                                        <option></option>
                                        <option value="<?php echo Utils::BAIXA?>">1 Cruz</option>
                                        <option value="<?php echo Utils::MEDIA?>">2 Cruz</option>
                                        <option value="<?php echo Utils::ALTA?>">3 Cruz</option>
                                        <option value="<?php echo Utils::NAO_INFORMADO?>">Não informado</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="trematoides" class="col-md-3 control-label">Trematóides</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="trematoides" name="trematoides">
                                        <option></option>
                                        <option value="<?php echo Utils::BAIXA?>">1 Cruz</option>
                                        <option value="<?php echo Utils::MEDIA?>">2 Cruz</option>
                                        <option value="<?php echo Utils::ALTA?>">3 Cruz</option>
                                        <option value="<?php echo Utils::NAO_INFORMADO?>">Não informado</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <fieldset><h4 class="text-center titulo">Amostras de tecido</h4></fieldset>
                    
                    
                    
                    
                    <div class="table-responsive">
                        <table class="table table-sisalbatroz">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Não coletado</th>
                                    <th>Não informado</th>
                                    <th>Papel alumínio</th>
                                    <th>Eppendorf</th>
                                    <th>Falcon</th>
                                    <th>Alcool 70%</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" class="th-table-checkbox">Encéfalo</th>
                                    <td><input type="checkbox" name="encefalo[]" value="<?php echo Utils::NAO_COLETADO?>"></td>
                                    <td><input type="checkbox" name="encefalo[]" value="<?php echo Utils::NAO_INFORMADO?>"></td>
                                    <td><input type="checkbox" name="encefalo[]" value="<?php echo Utils::PAPEL_ALUMINIO?>"></td>
                                    <td><input type="checkbox" name="encefalo[]" value="<?php echo Utils::PAPEL_EPPENDORF?>"></td>
                                    <td><input type="checkbox" name="encefalo[]" value="<?php echo Utils::FALCON?>"></td>
                                    <td><input type="checkbox" name="encefalo[]" value="<?php echo Utils::ALCOOL_70?>"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Medula óssea</th>
                                    <td><input type="checkbox" name="medula_ossea[]" value="<?php echo Utils::NAO_COLETADO?>"></td>
                                    <td><input type="checkbox" name="medula_ossea[]" value="<?php echo Utils::NAO_INFORMADO?>"></td>
                                    <td><input type="checkbox" name="medula_ossea[]" value="<?php echo Utils::PAPEL_ALUMINIO?>"></td>
                                    <td><input type="checkbox" name="medula_ossea[]" value="<?php echo Utils::PAPEL_EPPENDORF?>"></td>
                                    <td><input type="checkbox" name="medula_ossea[]" value="<?php echo Utils::FALCON?>"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Músculo</th>
                                    <td><input type="checkbox" name="musculo[]" value="<?php echo Utils::NAO_COLETADO?>"></td>
                                    <td><input type="checkbox" name="musculo[]" value="<?php echo Utils::NAO_INFORMADO?>"></td>
                                    <td><input type="checkbox" name="musculo[]" value="<?php echo Utils::PAPEL_ALUMINIO?>"></td>
                                    <td><input type="checkbox" name="musculo[]" value="<?php echo Utils::PAPEL_EPPENDORF?>"></td>
                                    <td><input type="checkbox" name="musculo[]" value="<?php echo Utils::FALCON?>"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Fígado</th>
                                    <td><input type="checkbox" name="figado[]" value="<?php echo Utils::NAO_COLETADO?>"></td>
                                    <td><input type="checkbox" name="figado[]" value="<?php echo Utils::NAO_INFORMADO?>"></td>
                                    <td><input type="checkbox" name="figado[]" value="<?php echo Utils::PAPEL_ALUMINIO?>"></td>
                                    <td><input type="checkbox" name="figado[]" value="<?php echo Utils::PAPEL_EPPENDORF?>"></td>
                                    <td><input type="checkbox" name="figado[]" value="<?php echo Utils::FALCON?>"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Pulmão</th>
                                    <td><input type="checkbox" name="pulmao[]" value="<?php echo Utils::NAO_COLETADO?>"></td>
                                    <td><input type="checkbox" name="pulmao[]" value="<?php echo Utils::NAO_INFORMADO?>"></td>
                                    <td><input type="checkbox" name="pulmao[]" value="<?php echo Utils::PAPEL_ALUMINIO?>"></td>
                                    <td><input type="checkbox" name="pulmao[]" value="<?php echo Utils::PAPEL_EPPENDORF?>"></td>
                                    <td><input type="checkbox" name="pulmao[]" value="<?php echo Utils::FALCON?>"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Baço</th>
                                    <td><input type="checkbox" name="baco[]" value="<?php echo Utils::NAO_COLETADO?>"></td>
                                    <td><input type="checkbox" name="baco[]" value="<?php echo Utils::NAO_INFORMADO?>"></td>                        
                                    <td><input type="checkbox" name="baco[] value="<?php echo Utils::PAPEL_ALUMINIO?>"></td>
                                    <td><input type="checkbox" name="baco[]" value="<?php echo Utils::PAPEL_EPPENDORF?>"></td>
                                    <td><input type="checkbox" name="baco[]" value="<?php echo Utils::FALCON?>"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Gordura</th>
                                    <td><input type="checkbox" name="gordura[]" value="<?php echo Utils::NAO_COLETADO?>"></td>
                                    <td><input type="checkbox" name="gordura[]" value="<?php echo Utils::NAO_INFORMADO?>"></td>                        
                                    <td><input type="checkbox" name="gordura[]" value="<?php echo Utils::PAPEL_ALUMINIO?>"></td>
                                    <td><input type="checkbox" name="gordura[]" value="<?php echo Utils::PAPEL_EPPENDORF?>"></td>
                                    <td><input type="checkbox" name="gordura[]" value="<?php echo Utils::FALCON?>"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                    
                    <fieldset><h4 class="text-center titulo">Histopatológico - Formol 10%</h4></fieldset>
                    
                    <div class="table-responsive">
                        <table class="table table-sisalbatroz">
                            <thead>
                                <tr>
                                    <th class="col-md-3"></th>
                                    <th class="col-md-2">Sim</th>
                                    <th class="col-md-2">Não</th>
                                    <th class="col-md-5"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" class="th-table-checkbox">Pele</th>
                                    <td><input type="checkbox" name="histopatologico_pele" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_pele" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Língua</th>
                                    <td><input type="checkbox" name="histopatologico_lingua" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_lingua" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Esôfago</th>
                                    <td><input type="checkbox" name="histopatologico_esofago" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_esofago" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Inglúvio</th>
                                    <td><input type="checkbox" name="histopatologico_ingluvio" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_ingluvio" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Tireóide</th>
                                    <td><input type="checkbox" name="histopatologico_tireoide" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_tireoide" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Paratireóide</th>
                                    <td><input type="checkbox" name="histopatologico_paratireoide" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_paratireoide" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Siringe</th>
                                    <td><input type="checkbox" name="histopatologico_siringe" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_siringe" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Traquéia</th>
                                    <td><input type="checkbox" name="histopatologico_traqueia" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_traqueia" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Pulmão</th>
                                    <td><input type="checkbox" name="histopatologico_pulmao" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_pulmao" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Coração</th>
                                    <td><input type="checkbox" name="histopatologico_coracao" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_coracao" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Proventrículo</th>
                                    <td><input type="checkbox" name="histopatologico_proventriculo" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_proventriculo" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Ventrículo</th>
                                    <td><input type="checkbox" name="histopatologico_ventriculo" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_ventriculo" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Figado</th>
                                    <td><input type="checkbox" name="histopatologico_figado" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_figado" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Vesícula biliar</th>
                                    <td><input type="checkbox" name="histopatologico_vesicula_biliar" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_vesicula_biliar" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Baço</th>
                                    <td><input type="checkbox" name="histopatologico_baco" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_baco" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Duodeno</th>
                                    <td><input type="checkbox" name="histopatologico_duodeno" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_duodeno" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Jejuno</th>
                                    <td><input type="checkbox" name="histopatologico_jejuno" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_jejuno" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Ileo/Ceco/Cólon</th>
                                    <td><input type="checkbox" name="histopatologico_ileo_ceco_colon" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_ileo_ceco_colon" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Pâncreas</th>
                                    <td><input type="checkbox" name="histopatologico_pancreas" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_pancreas" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Cloaca</th>
                                    <td><input type="checkbox" name="histopatologico_cloaca" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_cloaca" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Rim</th>
                                    <td><input type="checkbox" name="histopatologico_rim" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_rim" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Adrenais</th>
                                    <td><input type="checkbox" name="histopatologico_adrenais" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_adrenais" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Ureter</th>
                                    <td><input type="checkbox" name="histopatologico_ureter" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_ureter" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Gônada</th>
                                    <td><input type="checkbox" name="histopatologico_gonada" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_gonada" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Bexiga</th>
                                    <td><input type="checkbox" name="histopatologico_bexiga" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_bexiga" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Oviduto</th>
                                    <td><input type="checkbox" name="histopatologico_oviduto" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_oviduto" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox"></label>Bursa</td>
                                    <td><input type="checkbox" name="histopatologico_bursa" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_bursa" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Grandes vasos</th>
                                    <td><input type="checkbox" name="histopatologico_grandes_vasos" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_grandes_vasos" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Saco aéreo</th>
                                    <td><input type="checkbox" name="histopatologico_saco_aereo" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_saco_aereo" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Timo</th>
                                    <td><input type="checkbox" name="histopatologico_timo" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_timo" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Músculo esquelético</th>
                                    <td><input type="checkbox" name="histopatologico_musculo_esqueletico" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_musculo_esqueletico" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Medula óssea</th>
                                    <td><input type="checkbox" name="histopatologico_medula_ossea" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_medula_ossea" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Olho</th>
                                    <td><input type="checkbox" name="histopatologico_olho" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_olho" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Gld. Sal</th>
                                    <td><input type="checkbox" name="histopatologico_gld_sal" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_gld_sal" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Encéfalo</th>
                                    <td><input type="checkbox" name="histopatologico_encefalo" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_encefalo" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Cerebelo</th>
                                    <td><input type="checkbox" name="histopatologico_cerebelo" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_cerebelo" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Osso</th>
                                    <td><input type="checkbox" name="histopatologico_osso" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="histopatologico_osso" value="false" class="check-sim-nao"></td>
                                </tr>          

                            </tbody>
                        </table>
                    </div>
                    
                    
                    
                    
                </div>
                
                
                
                <div id="outros" class="tab-pane">
                    
                    <div class="table-responsive">
                        <table class="table table-sisalbatroz">
                            <thead>
                                <tr>
                                    <th class="col-md-3"></th>
                                    <th class="col-md-2">Sim</th>
                                    <th class="col-md-2">Não</th>
                                    <th class="col-md-5"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" class="th-table-checkbox">Swab Cloaca</th>
                                    <td><input type="checkbox" name="outra_pesquisa_swab_cloaca" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="outra_pesquisa_swab_cloaca" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Swab Coana</th>
                                    <td><input type="checkbox" name="outra_pesquisa_swab_coana" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="outra_pesquisa_swab_coana" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Conteúdo estomacal</th>
                                    <td><input type="checkbox" name="outra_pesquisa_conteudo_estomacal" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="outra_pesquisa_conteudo_estomacal" value="false" class="check-sim-nao"></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Sangue cardíaco</th>
                                    <td><input type="checkbox" name="outra_pesquisa_sangue_cardiaco" value="true" class="check-sim-nao"></td>
                                    <td><input type="checkbox" name="outra_pesquisa_sangue_cardiaco" value="false" class="check-sim-nao"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="form-group">
                                <label for="cruzeiro" class="col-md-2 control-label">Penas</label>
                                <div class="col-md-10 div-help">
                                    <div class="col-md-3 checkbox"><label><input type="checkbox" class="outra-pesquisa-pena" id="outra_pesquisa_pena_corpo" name="outra_pesquisa_pena[]" value="<?php echo Utils::CORPO?>">Corpo</label></div>
                                    <div class="col-md-3 checkbox"><label><input type="checkbox" class="outra-pesquisa-pena" id="outra_pesquisa_pena_asa" name="outra_pesquisa_pena[]" value="<?php echo Utils::ASA?>">Asa</label></div>
                                    <div class="col-md-3 checkbox"><label><input type="checkbox" class="outra-pesquisa-pena" id="outra_pesquisa_pena_nao_coletado" name="outra_pesquisa_pena[]" value="<?php echo Utils::NAO_COLETADO?>">Não coletado</label></div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="outra_pesquisa_outros" class="col-md-2 control-label">Outros</label>
                                <div class="col-md-10 div-help">
                                    <textarea class="form-control" id="outra_pesquisa_outros" name="outra_pesquisa_outros"><?php  ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="outra_pesquisa_observacoes" class="col-md-2 control-label">Observações</label>
                                <div class="col-md-10 div-help">
                                    <textarea class="form-control" id="outra_pesquisa_observacoes" name="outra_pesquisa_observacoes"><?php  ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <div class="col-sm-12 col-md-12" style="margin-bottom: 20px">
        <button type="button" id="btnSub" name="btnSub" class="btn btn-primary btn-lg btn_sub" onclick="return validation('medicinaconservacao', this)">Salvar</button>
        <a href="<?php echo site_url('medicinaconservacao')?>" class="btn btn-default btn-lg btn_sub">Cancelar</a>
    </div>
</form>


<script>
    $(document).ready(function() {
        
        $(".select2").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado";
            }
        });
        
        $('#procedencia').change(function (event, item) {
            if (event.target.value == '<?php echo Utils::PROCEDENCIA_OUTROS?>') {
                $('#container_procedencia_outros').show();
            } else {
                $('#container_procedencia_outros').hide();
            }
            
        });
        
        $("[name='informacao_captura']").click(function (event) {
            $('#container_externo').hide();
            $('#container_cruzeiro').hide();
            
            if (event.target.value == 'cruzeiro' && event.target.checked) {
                $('#informacao_captura_externo').removeAttr('checked');                
                $('#container_cruzeiro').show();
            } else if (event.target.value == 'externo' && event.target.checked) {
                $('#informacao_captura_cruzeiro').removeAttr('checked');                
                $('#container_externo').show();
            }
        });
        
        $(".check-sim-nao").click(function (event) {            
            if (event.target.value == 'true') {
                $("[name='"+event.target.name+"'][value='false']").removeAttr('checked');
            } else if (event.target.value == 'false') {
                $("[name='"+event.target.name+"'][value='true']").removeAttr('checked');
            }
        });
        
        $('.outra-pesquisa-pena').click(function (event) {
            if (event.target.value == '<?php echo Utils::NAO_COLETADO?>') {
                $('#outra_pesquisa_pena_corpo').removeAttr('checked');
                $('#outra_pesquisa_pena_asa').removeAttr('checked');
            } else if (event.target.value == '<?php echo Utils::CORPO?>' || event.target.value == '<?php echo Utils::ASA?>') {
                $('#outra_pesquisa_pena_nao_coletado').removeAttr('checked');
            }
        });
    });
</script>