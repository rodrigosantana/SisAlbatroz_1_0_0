<!-- Início do corpo da página -->

<?php if (!empty($mensagem)): ?>
    <div class="col-md-4 col-md-offset-4 alert alert-success alert-dismissible" role="alert" style="margin-top: 20px">
        <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
        <p><strong>Sucesso!</strong><p>
            <?php echo $mensagem ?>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-12">
        <h2 class="text-left titulo">Medicina da Conservação</h2>
    </div>
</div>

<form class="form-horizontal" role="form" action="<?php echo site_url('medicinaconservacao/salva'); ?>" method="post">
    <input type="hidden" id="id" name="id" value="<?php echo $medicinaConservacao->getId() ?>">

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
                                <label for="etiqueta" class="col-md-3 control-label">Etiqueta *</label>
                                <div class="col-md-9 div-help">
                                    <input type="text" class="form-control" id="etiqueta" name="etiqueta" value="<?php echo $medicinaConservacao->getEtiqueta() ?>" maxlength="50">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="etiqueta_antiga" class="col-md-3 control-label">Etiqueta antiga</label>
                                <div class="col-md-9 div-help">
                                    <input type="text" class="form-control" id="etiqueta_antiga" name="etiqueta_antiga" value="<?php echo $medicinaConservacao->getEtiquetaAntiga() ?>" maxlength="50">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="especie" class="col-md-3 control-label">Espécie *</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="especie" name="especie">
                                        <option></option>
                                        <?php foreach ($aves as $ave): ?>
                                            <?php $selected = (!is_null($medicinaConservacao->getEspecie()) && $medicinaConservacao->getEspecie()->getId() == $ave->getId()) ? 'selected' : '' ?>
                                            <option value="<?php echo $ave->getId() ?>" <?php echo $selected ?>><?php echo $ave->__toString() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="responsavel" class="col-md-3 control-label">Responsável</label>
                                <div class="col-md-9 div-help">
                                    <input type="text" class="form-control" id="responsavel" name="responsavel" value="<?php echo $medicinaConservacao->getResponsavel() ?>" maxlength="150">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="data_entrada" class="col-md-3 control-label">Data de entrada</label>
                                <div class="col-md-9 div-help">
                                    <input type="date" class="form-control" id="data_entrada" name="data_entrada" value="<?php echo is_null($medicinaConservacao->getDataEntrada()) ? '' : $medicinaConservacao->getDataEntrada()->format("Y-m-d") ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="data_captura" class="col-md-3 control-label">Data de captura</label>
                                <div class="col-md-9 div-help">
                                    <input type="date" class="form-control" id="data_captura" name="data_captura" value="<?php echo is_null($medicinaConservacao->getDataCaptura()) ? '' : $medicinaConservacao->getDataCaptura()->format("Y-m-d") ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="latitude" class="col-md-3 control-label">Local da captura (lat)</label>
                                <div class="col-md-9 div-help">
                                    <input type="number" step="any" class="form-control" id="latitude" name="latitude" value="<?php echo is_null($medicinaConservacao->getCoordenada()) ? '' : $medicinaConservacao->getCoordenada()->latitudeDecimal ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="longitude" class="col-md-3 control-label">Local da captura (long)</label>
                                <div class="col-md-9 div-help">
                                    <input type="number" step="any" class="form-control" id="longitude" name="longitude" value="<?php echo is_null($medicinaConservacao->getCoordenada()) ? '' : $medicinaConservacao->getCoordenada()->longitudeDecimal ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="anilha" class="col-md-3 control-label">Anilha</label>
                                <div class="col-md-9 div-help">
                                    <input type="text" class="form-control" id="anilha" name="anilha" value="<?php echo $medicinaConservacao->getAnilha() ?>" maxlength="50">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="plumagem" class="col-md-3 control-label">Plumagem</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="plumagem" name="plumagem">
                                        <option></option>
                                        <option value="<?php echo Utils::PLUMAGEM_ADULTO ?>" <?php echo $medicinaConservacao->getPlumagem() === Utils::PLUMAGEM_ADULTO ? 'selected' : '' ?>>Adulto</option>
                                        <option value="<?php echo Utils::PLUMAGEM_ADULTO_EM_MUDA ?>" <?php echo $medicinaConservacao->getPlumagem() === Utils::PLUMAGEM_ADULTO_EM_MUDA ? 'selected' : '' ?>>Adulto em muda</option>
                                        <option value="<?php echo Utils::PLUMAGEM_JUVENIL ?>" <?php echo $medicinaConservacao->getPlumagem() === Utils::PLUMAGEM_JUVENIL ? 'selected' : '' ?>>Juvenil</option>
                                        <option value="<?php echo Utils::PLUMAGEM_JUVENIL_EM_MUDA ?>" <?php echo $medicinaConservacao->getPlumagem() === Utils::PLUMAGEM_JUVENIL_EM_MUDA ? 'selected' : '' ?>>Juvenil em muda</option>
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
                                        <option value="<?php echo Utils::PROCEDENCIA_CAPTURA_INCIDENTAL ?>" <?php echo $medicinaConservacao->getProcedencia() === Utils::PROCEDENCIA_CAPTURA_INCIDENTAL ? 'selected' : '' ?>>Captura incidental</option>
                                        <option value="<?php echo Utils::PROCEDENCIA_ENCALHE ?>" <?php echo $medicinaConservacao->getProcedencia() === Utils::PROCEDENCIA_ENCALHE ? 'selected' : '' ?>>Encalhe</option>
                                        <option value="<?php echo Utils::PROCEDENCIA_REABILITACAO ?>" <?php echo $medicinaConservacao->getProcedencia() === Utils::PROCEDENCIA_REABILITACAO ? 'selected' : '' ?>>Reabilitação</option>
                                        <option value="<?php echo Utils::PROCEDENCIA_OUTROS ?>" <?php echo $medicinaConservacao->getProcedencia() === Utils::PROCEDENCIA_OUTROS ? 'selected' : '' ?>>Outros</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" style="<?php echo $medicinaConservacao->getProcedencia() === Utils::PROCEDENCIA_OUTROS ? 'display: block' : 'display: none' ?>" id="container_procedencia_outros">
                            <div class="form-group">
                                <label for="procedencia_outros" class="col-md-3 control-label">Procedência outros</label>
                                <div class="col-md-9 div-help">
                                    <input type="text" class="form-control" id="procedencia_outros" name="procedencia_outros" value="<?php echo $medicinaConservacao->getProcedenciaOutros() ?>" maxlength="150">
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
                            <div class="col-md-2 checkbox"><label><input type="checkbox" id="informacao_captura_cruzeiro" name="informacao_captura" value="cruzeiro" <?php echo $medicinaConservacao->getCapturaIncidental()->getInformacao() == 'cruzeiro' ? 'checked' : '' ?>>Cruzeiro</label></div>
                            <div class="col-md-3 checkbox"><label><input type="checkbox" id="informacao_captura_externo" name="informacao_captura" value="externo" <?php echo $medicinaConservacao->getCapturaIncidental()->getInformacao() == 'externo' ? 'checked' : '' ?>>Dados externos</label></div>
                        </div>
                    </div>

                    <div class="row" id="container_cruzeiro" style="<?php echo $medicinaConservacao->getCapturaIncidental()->getInformacao() == 'cruzeiro' ? 'display: block' : 'display: none' ?>">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cruzeiro" class="col-md-3 control-label">Cruzeiro</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="cruzeiro" name="cruzeiro">
                                        <option></option>
                                        <?php foreach ($cruzeiros as $cruzeiro): ?>
                                            <?php $selected = (!is_null($medicinaConservacao->getCapturaIncidental()->getCruzeiro()) && $medicinaConservacao->getCapturaIncidental()->getCruzeiro()->getId() == $cruzeiro->getId()) ? 'selected' : '' ?>
                                            <option value="<?php echo $cruzeiro->getId() ?>" <?php echo $selected ?>><?php echo $cruzeiro->__toString() ?></option>
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
                                            <?php $selected = (!is_null($medicinaConservacao->getCapturaIncidental()->getLance()) && $medicinaConservacao->getCapturaIncidental()->getLance()->getId() == $lance->getId()) ? 'selected' : '' ?>
                                            <option value="<?php echo $lance->getId() ?>" <?php echo $selected ?>><?php echo $lance->__toString() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row" id="container_externo" style="<?php echo $medicinaConservacao->getCapturaIncidental()->getInformacao() == 'externo' ? 'display: block' : 'display: none' ?>">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="observador" class="col-md-3 control-label">Observador</label>
                                <div class="col-md-9 div-help">
                                    <select class="select2" style="width: 100%" id="observador" name="observador">
                                        <option></option>
                                        <?php foreach ($observadores as $observador): ?>
                                            <?php $selected = (!is_null($medicinaConservacao->getCapturaIncidental()->getObservador()) && $medicinaConservacao->getCapturaIncidental()->getObservador()->getIdObserv() == $observador->getIdObserv()) ? 'selected' : '' ?>
                                            <option value="<?php echo $observador->getIdObserv() ?>" <?php echo $selected ?>><?php echo $observador->getNome() ?></option>
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
                                            <?php $selected = (!is_null($medicinaConservacao->getCapturaIncidental()->getMestre()) && $medicinaConservacao->getCapturaIncidental()->getMestre()->getIdMestre() == $mestre->getIdMestre()) ? 'selected' : '' ?>
                                            <option value="<?php echo $mestre->getIdMestre() ?>" <?php echo $selected ?>><?php echo $mestre->getNome() ?></option>
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
                                            <?php $selected = (!is_null($medicinaConservacao->getCapturaIncidental()->getEmbarcacao()) && $medicinaConservacao->getCapturaIncidental()->getEmbarcacao()->getIdEmbarcacao() == $embarcacao->getIdEmbarcacao()) ? 'selected' : '' ?>
                                            <option value="<?php echo $embarcacao->getIdEmbarcacao() ?>" <?php echo $selected ?>><?php echo $embarcacao->getNome() ?></option>
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
                                    <textarea class="form-control" id="historico" name="historico"><?php echo $medicinaConservacao->getCapturaIncidental()->getHistorico() ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="descricao_local_coleta" class="col-md-3 control-label">Descrição do Local de Coleta</label>
                                <div class="col-md-9 div-help">
                                    <textarea class="form-control" id="descricao_local_coleta" name="descricao_local_coleta"><?php echo $medicinaConservacao->getCapturaIncidental()->getDescricaoLocalColeta() ?></textarea>
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
                                    <input type="number" class="form-control" id="peso" name="peso" value="<?php echo $medicinaConservacao->getBiometria()->getPeso() ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="comprimento_total" class="col-md-4 control-label">Comprimento total (cm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="comprimento_total" name="comprimento_total" value="<?php echo $medicinaConservacao->getBiometria()->getComprimento() ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="culmem" class="col-md-4 control-label">Cúlmem (mm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="culmem" name="culmem" value="<?php echo $medicinaConservacao->getBiometria()->getCulmem() ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="narina_culmem" class="col-md-4 control-label">Narina ao cúlmem (mm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="narina_culmem" name="narina_culmem" value="<?php echo $medicinaConservacao->getBiometria()->getNarinaCulmem() ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="altura_bico_base" class="col-md-4 control-label">Altura do bico na base (mm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="altura_bico_base" name="altura_bico_base" value="<?php echo $medicinaConservacao->getBiometria()->getAlturaBicoBase() ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="altura_minima_bico" class="col-md-4 control-label">Altura mínima do bico (mm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="altura_minima_bico" name="altura_minima_bico" value="<?php echo $medicinaConservacao->getBiometria()->getAlturaMinimaBico() ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="altura_bico_unguis" class="col-md-4 control-label">Altura do bico na unguis (mm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="altura_bico_unguis" name="altura_bico_unguis" value="<?php echo $medicinaConservacao->getBiometria()->getAlturaBicoUnguis() ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="largura_bico_base" class="col-md-4 control-label">Largura do bico na base (mm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="largura_bico_base" name="largura_bico_base" value="<?php echo $medicinaConservacao->getBiometria()->getLarguraBicoBase() ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="comprimento_cabeca" class="col-md-4 control-label">Comprimento da cabeça (mm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="comprimento_cabeca" name="comprimento_cabeca" value="<?php echo $medicinaConservacao->getBiometria()->getComprimentoCabeca() ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="comprimento_asa" class="col-md-4 control-label">Comprimento da asa (cm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="comprimento_asa" name="comprimento_asa" value="<?php echo $medicinaConservacao->getBiometria()->getComprimentoAsa() ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="comprimento_cauda" class="col-md-4 control-label">Comprimento da cauda (mm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="comprimento_cauda" name="comprimento_cauda" value="<?php echo $medicinaConservacao->getBiometria()->getComprimentoCauda() ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="comprimento_tarso" class="col-md-4 control-label">Comprimento do tarso (mm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="comprimento_tarso" name="comprimento_tarso" value="<?php echo $medicinaConservacao->getBiometria()->getComprimentoTarso() ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="comprimento_dedo_sem_unha" class="col-md-4 control-label">Comprimento do dedo sem unha (mm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="comprimento_dedo_sem_unha" name="comprimento_dedo_sem_unha" value="<?php echo $medicinaConservacao->getBiometria()->getComprimentoDedoSemUnha() ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="comprimento_dedo_com_unha" class="col-md-4 control-label">Comprimento do dedo com unha (mm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="comprimento_dedo_com_unha" name="comprimento_dedo_com_unha" value="<?php echo $medicinaConservacao->getBiometria()->getComprimentoDedoComUnha() ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="envergadura" class="col-md-4 control-label">Envergadura (cm)</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" class="form-control" id="envergadura" name="envergadura" value="<?php echo $medicinaConservacao->getBiometria()->getEnvergadura() ?>">
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
                                    <td><input type="checkbox" name="muda_asa" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getBiometria()->getMudaAsa() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="muda_asa" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getBiometria()->getMudaAsa() === false ? 'checked' : '' ?>></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="th-table-checkbox">Muda Cauda</th>
                                    <td><input type="checkbox" name="muda_cauda" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getBiometria()->getMudaCauda() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="muda_cauda" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getBiometria()->getMudaCauda() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Muda Cabeça</th>
                                    <td><input type="checkbox" name="muda_cabeca" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getBiometria()->getMudaCabeca() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="muda_cabeca" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getBiometria()->getMudaCabeca() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Muda Dorso</th>
                                    <td><input type="checkbox" name="muda_dorso" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getBiometria()->getMudaDorso() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="muda_dorso" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getBiometria()->getMudaDorso() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Muda Ventre</th>
                                    <td><input type="checkbox" name="muda_ventre" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getBiometria()->getMudaVentre() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="muda_ventre" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getBiometria()->getMudaVentre() === false ? 'checked' : '' ?>></td>
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
                                <label for="data_necropsia" class="col-md-3 control-label">Data da necropsia</label>
                                <div class="col-md-9 div-help">
                                    <input type="date" class="form-control" id="data_necropsia" name="data_necropsia" value="<?php echo is_null($medicinaConservacao->getColetaMaterialBiologico()->getDataNecropsia()) ? '' : $medicinaConservacao->getColetaMaterialBiologico()->getDataNecropsia()->format("Y-m-d") ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="local_necropsia" class="col-md-3 control-label">Local da necropsia</label>
                                <div class="col-md-9 div-help">
                                    <textarea class="form-control" id="local_necropsia" name="local_necropsia"><?php echo $medicinaConservacao->getColetaMaterialBiologico()->getLocalNecropsia() ?></textarea>
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
                                        <option value="<?php echo Utils::CONDICAO_CARCACA_FRESCA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getCondicaoCarcaca() === Utils::CONDICAO_CARCACA_FRESCA ? 'selected' : '' ?>>Fresca</option>
                                        <option value="<?php echo Utils::CONDICAO_CARCACA_CONGELADA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getCondicaoCarcaca() === Utils::CONDICAO_CARCACA_CONGELADA ? 'selected' : '' ?>>Congelada</option>
                                        <option value="<?php echo Utils::CONDICAO_CARCACA_INTEIRA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getCondicaoCarcaca() === Utils::CONDICAO_CARCACA_INTEIRA ? 'selected' : '' ?>>Inteira</option>
                                        <option value="<?php echo Utils::CONDICAO_CARCACA_EMPARTES ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getCondicaoCarcaca() === Utils::CONDICAO_CARCACA_EMPARTES ? 'selected' : '' ?>>Em Partes</option>
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
                                        <option value="<?php echo Utils::AUTOLISE_LEVE ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getAutolise() === Utils::AUTOLISE_LEVE ? 'selected' : '' ?>>Leve</option>
                                        <option value="<?php echo Utils::AUTOLISE_MODERADA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getAutolise() === Utils::AUTOLISE_MODERADA ? 'selected' : '' ?>>Moderada</option>
                                        <option value="<?php echo Utils::AUTOLISE_SEVERA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getAutolise() === Utils::AUTOLISE_SEVERA ? 'selected' : '' ?>>Severa</option>
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
                                        <option value="<?php echo Utils::MACHO_CERTEZA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getSexagem() === Utils::MACHO_CERTEZA ? 'selected' : '' ?>>Macho / Certeza</option>
                                        <option value="<?php echo Utils::MACHO_INCERTEZA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getSexagem() === Utils::MACHO_INCERTEZA ? 'selected' : '' ?>>Macho / Incerteza</option>
                                        <option value="<?php echo Utils::FEMEA_CERTEZA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getSexagem() === Utils::FEMEA_CERTEZA ? 'selected' : '' ?>>Femea / Certeza</option>
                                        <option value="<?php echo Utils::FEMEA_INCERTEZA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getSexagem() === Utils::FEMEA_INCERTEZA ? 'selected' : '' ?>>Femea / Incerteza</option>
                                        <option value="<?php echo Utils::INDETERMINADO ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getSexagem() === Utils::INDETERMINADO ? 'selected' : '' ?>>Indeterminado</option>
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
                                        <option value="<?php echo Utils::EMPETROLAMENTO_25 ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getEmpetrolamento() === Utils::EMPETROLAMENTO_25 ? 'selected' : '' ?>>25%</option>
                                        <option value="<?php echo Utils::EMPETROLAMENTO_25_75 ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getEmpetrolamento() === Utils::EMPETROLAMENTO_25_75 ? 'selected' : '' ?>>25% - 75%</option>
                                        <option value="<?php echo Utils::EMPETROLAMENTO_75 ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getEmpetrolamento() === Utils::EMPETROLAMENTO_75 ? 'selected' : '' ?>>75%</option>
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
                                        <option value="<?php echo Utils::CONDICAO_CORPORAL_OTIMO ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getCondicaoCorporal() === Utils::CONDICAO_CORPORAL_OTIMO ? 'selected' : '' ?>>Ótimo</option>
                                        <option value="<?php echo Utils::CONDICAO_CORPORAL_BOM ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getCondicaoCorporal() === Utils::CONDICAO_CORPORAL_BOM ? 'selected' : '' ?>>Bom</option>
                                        <option value="<?php echo Utils::CONDICAO_CORPORAL_MAGRO ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getCondicaoCorporal() === Utils::CONDICAO_CORPORAL_MAGRO ? 'selected' : '' ?>>Magro</option>
                                        <option value="<?php echo Utils::CONDICAO_CORPORAL_CAQUETICO ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getCondicaoCorporal() === Utils::CONDICAO_CORPORAL_CAQUETICO ? 'selected' : '' ?>>Caquético</option>
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
                                        <option value="<?php echo Utils::BAIXA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getPiolho() === Utils::BAIXA ? 'selected' : '' ?>>+</option>
                                        <option value="<?php echo Utils::MEDIA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getPiolho() === Utils::MEDIA ? 'selected' : '' ?>>++</option>
                                        <option value="<?php echo Utils::ALTA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getPiolho() === Utils::ALTA ? 'selected' : '' ?>>+++</option>
                                        <option value="<?php echo Utils::NAO_INFORMADO ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getPiolho() === Utils::NAO_INFORMADO ? 'selected' : '' ?>>Não informado</option>
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
                                        <option value="<?php echo Utils::BAIXA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getCarrapato() === Utils::BAIXA ? 'selected' : '' ?>>+</option>
                                        <option value="<?php echo Utils::MEDIA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getCarrapato() === Utils::MEDIA ? 'selected' : '' ?>>++</option>
                                        <option value="<?php echo Utils::ALTA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getCarrapato() === Utils::ALTA ? 'selected' : '' ?>>+++</option>
                                        <option value="<?php echo Utils::NAO_INFORMADO ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getCarrapato() === Utils::NAO_INFORMADO ? 'selected' : '' ?>>Não informado</option>
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
                                        <option value="<?php echo Utils::BAIXA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getPulga() === Utils::BAIXA ? 'selected' : '' ?>>+</option>
                                        <option value="<?php echo Utils::MEDIA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getPulga() === Utils::MEDIA ? 'selected' : '' ?>>++</option>
                                        <option value="<?php echo Utils::ALTA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getPulga() === Utils::ALTA ? 'selected' : '' ?>>+++</option>
                                        <option value="<?php echo Utils::NAO_INFORMADO ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getPulga() === Utils::NAO_INFORMADO ? 'selected' : '' ?>>Não informado</option>
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
                                        <option value="<?php echo Utils::BAIXA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getLepadomorpha() === Utils::BAIXA ? 'selected' : '' ?>>+</option>
                                        <option value="<?php echo Utils::MEDIA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getLepadomorpha() === Utils::MEDIA ? 'selected' : '' ?>>++</option>
                                        <option value="<?php echo Utils::ALTA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getLepadomorpha() === Utils::ALTA ? 'selected' : '' ?>>+++</option>
                                        <option value="<?php echo Utils::NAO_INFORMADO ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getLepadomorpha() === Utils::NAO_INFORMADO ? 'selected' : '' ?>>Não informado</option>
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
                                        <option value="<?php echo Utils::BAIXA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getLarvasPutrefacao() === Utils::BAIXA ? 'selected' : '' ?>>+</option>
                                        <option value="<?php echo Utils::MEDIA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getLarvasPutrefacao() === Utils::MEDIA ? 'selected' : '' ?>>++</option>
                                        <option value="<?php echo Utils::ALTA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getLarvasPutrefacao() === Utils::ALTA ? 'selected' : '' ?>>+++</option>
                                        <option value="<?php echo Utils::NAO_INFORMADO ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getLarvasPutrefacao() === Utils::NAO_INFORMADO ? 'selected' : '' ?>>Não informado</option>
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
                                        <option value="<?php echo Utils::BAIXA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getOutros() === Utils::BAIXA ? 'selected' : '' ?>>+</option>
                                        <option value="<?php echo Utils::MEDIA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getOutros() === Utils::MEDIA ? 'selected' : '' ?>>++</option>
                                        <option value="<?php echo Utils::ALTA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getOutros() === Utils::ALTA ? 'selected' : '' ?>>+++</option>
                                        <option value="<?php echo Utils::NAO_INFORMADO ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getOutros() === Utils::NAO_INFORMADO ? 'selected' : '' ?>>Não informado</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="outro_parasita_descricao" class="col-md-3 control-label">Outros</label>
                                <div class="col-md-9 div-help">
                                    <input type="text" class="form-control" id="outro_parasita_descricao" name="outro_parasita_descricao" value="<?php echo $medicinaConservacao->getColetaMaterialBiologico()->getOutrosDescricao() ?>" maxlength="150">
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
                                        <option value="<?php echo Utils::BAIXA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getNematoides() === Utils::BAIXA ? 'selected' : '' ?>>+</option>
                                        <option value="<?php echo Utils::MEDIA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getNematoides() === Utils::MEDIA ? 'selected' : '' ?>>++</option>
                                        <option value="<?php echo Utils::ALTA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getNematoides() === Utils::ALTA ? 'selected' : '' ?>>+++</option>
                                        <option value="<?php echo Utils::NAO_INFORMADO ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getNematoides() === Utils::NAO_INFORMADO ? 'selected' : '' ?>>Não informado</option>
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
                                        <option value="<?php echo Utils::BAIXA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getAcantocefalos() === Utils::BAIXA ? 'selected' : '' ?>>+</option>
                                        <option value="<?php echo Utils::MEDIA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getAcantocefalos() === Utils::MEDIA ? 'selected' : '' ?>>++</option>
                                        <option value="<?php echo Utils::ALTA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getAcantocefalos() === Utils::ALTA ? 'selected' : '' ?>>+++</option>
                                        <option value="<?php echo Utils::NAO_INFORMADO ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getAcantocefalos() === Utils::NAO_INFORMADO ? 'selected' : '' ?>>Não informado</option>
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
                                        <option value="<?php echo Utils::BAIXA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getCestoides() === Utils::BAIXA ? 'selected' : '' ?>>+</option>
                                        <option value="<?php echo Utils::MEDIA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getCestoides() === Utils::MEDIA ? 'selected' : '' ?>>++</option>
                                        <option value="<?php echo Utils::ALTA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getCestoides() === Utils::ALTA ? 'selected' : '' ?>>+++</option>
                                        <option value="<?php echo Utils::NAO_INFORMADO ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getCestoides() === Utils::NAO_INFORMADO ? 'selected' : '' ?>>Não informado</option>
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
                                        <option value="<?php echo Utils::BAIXA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getTrematoides() === Utils::BAIXA ? 'selected' : '' ?>>+</option>
                                        <option value="<?php echo Utils::MEDIA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getTrematoides() === Utils::MEDIA ? 'selected' : '' ?>>++</option>
                                        <option value="<?php echo Utils::ALTA ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getTrematoides() === Utils::ALTA ? 'selected' : '' ?>>+++</option>
                                        <option value="<?php echo Utils::NAO_INFORMADO ?>" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getTrematoides() === Utils::NAO_INFORMADO ? 'selected' : '' ?>>Não informado</option>
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
                                    <td><input type="checkbox" name="encefalo[]" value="<?php echo Utils::NAO_COLETADO ?>" <?php echo in_array(Utils::NAO_COLETADO, $medicinaConservacao->getColetaMaterialBiologico()->getAmtEncefalo()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="encefalo[]" value="<?php echo Utils::NAO_INFORMADO ?>" <?php echo in_array(Utils::NAO_INFORMADO, $medicinaConservacao->getColetaMaterialBiologico()->getAmtEncefalo()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="encefalo[]" value="<?php echo Utils::PAPEL_ALUMINIO ?>" <?php echo in_array(Utils::PAPEL_ALUMINIO, $medicinaConservacao->getColetaMaterialBiologico()->getAmtEncefalo()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="encefalo[]" value="<?php echo Utils::PAPEL_EPPENDORF ?>" <?php echo in_array(Utils::PAPEL_EPPENDORF, $medicinaConservacao->getColetaMaterialBiologico()->getAmtEncefalo()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="encefalo[]" value="<?php echo Utils::FALCON ?>" <?php echo in_array(Utils::FALCON, $medicinaConservacao->getColetaMaterialBiologico()->getAmtEncefalo()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="encefalo[]" value="<?php echo Utils::ALCOOL_70 ?>" <?php echo in_array(Utils::ALCOOL_70, $medicinaConservacao->getColetaMaterialBiologico()->getAmtEncefalo()) ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Medula óssea</th>
                                    <td><input type="checkbox" name="medula_ossea[]" value="<?php echo Utils::NAO_COLETADO ?>" <?php echo in_array(Utils::NAO_COLETADO, $medicinaConservacao->getColetaMaterialBiologico()->getAmtMedulaOssea()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="medula_ossea[]" value="<?php echo Utils::NAO_INFORMADO ?>" <?php echo in_array(Utils::NAO_INFORMADO, $medicinaConservacao->getColetaMaterialBiologico()->getAmtMedulaOssea()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="medula_ossea[]" value="<?php echo Utils::PAPEL_ALUMINIO ?>" <?php echo in_array(Utils::PAPEL_ALUMINIO, $medicinaConservacao->getColetaMaterialBiologico()->getAmtMedulaOssea()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="medula_ossea[]" value="<?php echo Utils::PAPEL_EPPENDORF ?>" <?php echo in_array(Utils::PAPEL_EPPENDORF, $medicinaConservacao->getColetaMaterialBiologico()->getAmtMedulaOssea()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="medula_ossea[]" value="<?php echo Utils::FALCON ?>" <?php echo in_array(Utils::FALCON, $medicinaConservacao->getColetaMaterialBiologico()->getAmtMedulaOssea()) ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Músculo</th>
                                    <td><input type="checkbox" name="musculo[]" value="<?php echo Utils::NAO_COLETADO ?>" <?php echo in_array(Utils::NAO_COLETADO, $medicinaConservacao->getColetaMaterialBiologico()->getAmtMusculo()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="musculo[]" value="<?php echo Utils::NAO_INFORMADO ?>" <?php echo in_array(Utils::NAO_INFORMADO, $medicinaConservacao->getColetaMaterialBiologico()->getAmtMusculo()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="musculo[]" value="<?php echo Utils::PAPEL_ALUMINIO ?>" <?php echo in_array(Utils::PAPEL_ALUMINIO, $medicinaConservacao->getColetaMaterialBiologico()->getAmtMusculo()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="musculo[]" value="<?php echo Utils::PAPEL_EPPENDORF ?>" <?php echo in_array(Utils::PAPEL_EPPENDORF, $medicinaConservacao->getColetaMaterialBiologico()->getAmtMusculo()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="musculo[]" value="<?php echo Utils::FALCON ?>" <?php echo in_array(Utils::FALCON, $medicinaConservacao->getColetaMaterialBiologico()->getAmtMusculo()) ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Fígado</th>
                                    <td><input type="checkbox" name="figado[]" value="<?php echo Utils::NAO_COLETADO ?>" <?php echo in_array(Utils::NAO_COLETADO, $medicinaConservacao->getColetaMaterialBiologico()->getAmtFigado()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="figado[]" value="<?php echo Utils::NAO_INFORMADO ?>" <?php echo in_array(Utils::NAO_INFORMADO, $medicinaConservacao->getColetaMaterialBiologico()->getAmtFigado()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="figado[]" value="<?php echo Utils::PAPEL_ALUMINIO ?>" <?php echo in_array(Utils::PAPEL_ALUMINIO, $medicinaConservacao->getColetaMaterialBiologico()->getAmtFigado()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="figado[]" value="<?php echo Utils::PAPEL_EPPENDORF ?>" <?php echo in_array(Utils::PAPEL_EPPENDORF, $medicinaConservacao->getColetaMaterialBiologico()->getAmtFigado()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="figado[]" value="<?php echo Utils::FALCON ?>" <?php echo in_array(Utils::FALCON, $medicinaConservacao->getColetaMaterialBiologico()->getAmtFigado()) ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Pulmão</th>
                                    <td><input type="checkbox" name="pulmao[]" value="<?php echo Utils::NAO_COLETADO ?>" <?php echo in_array(Utils::NAO_COLETADO, $medicinaConservacao->getColetaMaterialBiologico()->getAmtPulmao()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="pulmao[]" value="<?php echo Utils::NAO_INFORMADO ?>" <?php echo in_array(Utils::NAO_INFORMADO, $medicinaConservacao->getColetaMaterialBiologico()->getAmtPulmao()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="pulmao[]" value="<?php echo Utils::PAPEL_ALUMINIO ?>" <?php echo in_array(Utils::PAPEL_ALUMINIO, $medicinaConservacao->getColetaMaterialBiologico()->getAmtPulmao()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="pulmao[]" value="<?php echo Utils::PAPEL_EPPENDORF ?>" <?php echo in_array(Utils::PAPEL_EPPENDORF, $medicinaConservacao->getColetaMaterialBiologico()->getAmtPulmao()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="pulmao[]" value="<?php echo Utils::FALCON ?>" <?php echo in_array(Utils::FALCON, $medicinaConservacao->getColetaMaterialBiologico()->getAmtPulmao()) ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Baço</th>
                                    <td><input type="checkbox" name="baco[]" value="<?php echo Utils::NAO_COLETADO ?>" <?php echo in_array(Utils::NAO_COLETADO, $medicinaConservacao->getColetaMaterialBiologico()->getAmtBaco()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="baco[]" value="<?php echo Utils::NAO_INFORMADO ?>" <?php echo in_array(Utils::NAO_INFORMADO, $medicinaConservacao->getColetaMaterialBiologico()->getAmtBaco()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="baco[]" value="<?php echo Utils::PAPEL_ALUMINIO ?>" <?php echo in_array(Utils::PAPEL_ALUMINIO, $medicinaConservacao->getColetaMaterialBiologico()->getAmtBaco()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="baco[]" value="<?php echo Utils::PAPEL_EPPENDORF ?>" <?php echo in_array(Utils::PAPEL_EPPENDORF, $medicinaConservacao->getColetaMaterialBiologico()->getAmtBaco()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="baco[]" value="<?php echo Utils::FALCON ?>" <?php echo in_array(Utils::FALCON, $medicinaConservacao->getColetaMaterialBiologico()->getAmtBaco()) ? 'checked' : '' ?>></td>
                                </tr>

                                <tr><th scope="row" class="th-table-checkbox">Gordura</th>
                                    <td><input type="checkbox" name="gordura[]" value="<?php echo Utils::NAO_COLETADO ?>" <?php echo in_array(Utils::NAO_COLETADO, $medicinaConservacao->getColetaMaterialBiologico()->getAmtGordura()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="gordura[]" value="<?php echo Utils::NAO_INFORMADO ?>" <?php echo in_array(Utils::NAO_INFORMADO, $medicinaConservacao->getColetaMaterialBiologico()->getAmtGordura()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="gordura[]" value="<?php echo Utils::PAPEL_ALUMINIO ?>" <?php echo in_array(Utils::PAPEL_ALUMINIO, $medicinaConservacao->getColetaMaterialBiologico()->getAmtGordura()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="gordura[]" value="<?php echo Utils::PAPEL_EPPENDORF ?>" <?php echo in_array(Utils::PAPEL_EPPENDORF, $medicinaConservacao->getColetaMaterialBiologico()->getAmtGordura()) ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="gordura[]" value="<?php echo Utils::FALCON ?>" <?php echo in_array(Utils::FALCON, $medicinaConservacao->getColetaMaterialBiologico()->getAmtGordura()) ? 'checked' : '' ?>></td>
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
                                    <td><input type="checkbox" name="htp_pele" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpPele() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_pele" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpPele() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Língua</th>
                                    <td><input type="checkbox" name="htp_lingua" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpLingua() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_lingua" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpLingua() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Esôfago</th>
                                    <td><input type="checkbox" name="htp_esofago" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpEsofago() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_esofago" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpEsofago() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Inglúvio</th>
                                    <td><input type="checkbox" name="htp_ingluvio" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpIngluvio() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_ingluvio" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpIngluvio() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Tireóide</th>
                                    <td><input type="checkbox" name="htp_tireoide" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpTireoide() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_tireoide" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpTireoide() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Paratireóide</th>
                                    <td><input type="checkbox" name="htp_paratireoide" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpParatireoide() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_paratireoide" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpParatireoide() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Siringe</th>
                                    <td><input type="checkbox" name="htp_siringe" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpSiringe() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_siringe" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpSiringe() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Traquéia</th>
                                    <td><input type="checkbox" name="htp_traqueia" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpTraqueia() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_traqueia" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpTraqueia() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Pulmão</th>
                                    <td><input type="checkbox" name="htp_pulmao" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpPulmao() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_pulmao" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpPulmao() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Coração</th>
                                    <td><input type="checkbox" name="htp_coracao" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpCoracao() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_coracao" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpCoracao() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Proventrículo</th>
                                    <td><input type="checkbox" name="htp_proventriculo" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpProventriculo() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_proventriculo" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpProventriculo() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Ventrículo</th>
                                    <td><input type="checkbox" name="htp_ventriculo" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpVentriculo() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_ventriculo" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpVentriculo() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Figado</th>
                                    <td><input type="checkbox" name="htp_figado" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpFigado() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_figado" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpFigado() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Vesícula biliar</th>
                                    <td><input type="checkbox" name="htp_vesicula_biliar" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpVesiculaBiliar() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_vesicula_biliar" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpVesiculaBiliar() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Baço</th>
                                    <td><input type="checkbox" name="htp_baco" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpBaco() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_baco" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpBaco() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Duodeno</th>
                                    <td><input type="checkbox" name="htp_duodeno" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpDuodeno() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_duodeno" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpDuodeno() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Jejuno</th>
                                    <td><input type="checkbox" name="htp_jejuno" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpJejuno() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_jejuno" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpJejuno() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Ileo/Ceco/Cólon</th>
                                    <td><input type="checkbox" name="htp_ileo_ceco_colon" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpIleoCecoColon() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_ileo_ceco_colon" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpIleoCecoColon() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Pâncreas</th>
                                    <td><input type="checkbox" name="htp_pancreas" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpPancreas() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_pancreas" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpPancreas() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Cloaca</th>
                                    <td><input type="checkbox" name="htp_cloaca" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpCloaca() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_cloaca" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpCloaca() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Rim</th>
                                    <td><input type="checkbox" name="htp_rim" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpRim() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_rim" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpRim() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Adrenais</th>
                                    <td><input type="checkbox" name="htp_adrenais" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpAdrenais() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_adrenais" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpAdrenais() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Ureter</th>
                                    <td><input type="checkbox" name="htp_ureter" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpUreter() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_ureter" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpUreter() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Gônada</th>
                                    <td><input type="checkbox" name="htp_gonada" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpGonada() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_gonada" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpGonada() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Bexiga</th>
                                    <td><input type="checkbox" name="htp_bexiga" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpBexiga() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_bexiga" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpBexiga() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Oviduto</th>
                                    <td><input type="checkbox" name="htp_oviduto" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpOviduto() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_oviduto" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpOviduto() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox"></label>Bursa</td>
                                    <td><input type="checkbox" name="htp_bursa" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpBursa() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_bursa" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpBursa() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Grandes vasos</th>
                                    <td><input type="checkbox" name="htp_grandes_vasos" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpGrandesVasos() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_grandes_vasos" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpGrandesVasos() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Saco aéreo</th>
                                    <td><input type="checkbox" name="htp_saco_aereo" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpSacoAereo() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_saco_aereo" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpSacoAereo() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Timo</th>
                                    <td><input type="checkbox" name="htp_timo" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpTimo() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_timo" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpTimo() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Músculo esquelético</th>
                                    <td><input type="checkbox" name="htp_musculo_esqueletico" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpMusculoEsqueletico() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_musculo_esqueletico" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpMusculoEsqueletico() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Medula óssea</th>
                                    <td><input type="checkbox" name="htp_medula_ossea" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpMedulaOssea() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_medula_ossea" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpMedulaOssea() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Olho</th>
                                    <td><input type="checkbox" name="htp_olho" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpOlho() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_olho" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpOlho() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Gld. Sal</th>
                                    <td><input type="checkbox" name="htp_gld_sal" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpGldSal() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_gld_sal" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpGldSal() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Encéfalo</th>
                                    <td><input type="checkbox" name="htp_encefalo" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpEncefalo() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_encefalo" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpEncefalo() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Cerebelo</th>
                                    <td><input type="checkbox" name="htp_cerebelo" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpCerebelo() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_cerebelo" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpCerebelo() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Osso</th>
                                    <td><input type="checkbox" name="htp_osso" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpOsso() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="htp_osso" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getColetaMaterialBiologico()->getHtpOsso() === false ? 'checked' : '' ?>></td>
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
                                    <td><input type="checkbox" name="outra_pesquisa_swab_cloaca" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getOutrasPesquisas()->getSwabCloaca() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="outra_pesquisa_swab_cloaca" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getOutrasPesquisas()->getSwabCloaca() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Swab Coana</th>
                                    <td><input type="checkbox" name="outra_pesquisa_swab_coana" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getOutrasPesquisas()->getSwabCoana() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="outra_pesquisa_swab_coana" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getOutrasPesquisas()->getSwabCoana() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Conteúdo estomacal</th>
                                    <td><input type="checkbox" name="outra_pesquisa_conteudo_estomacal" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getOutrasPesquisas()->getConteudoEstomacal() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="outra_pesquisa_conteudo_estomacal" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getOutrasPesquisas()->getConteudoEstomacal() === false ? 'checked' : '' ?>></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="th-table-checkbox">Sangue cardíaco</th>
                                    <td><input type="checkbox" name="outra_pesquisa_sangue_cardiaco" value="true" class="check-sim-nao" <?php echo $medicinaConservacao->getOutrasPesquisas()->getSangueCardiaco() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="outra_pesquisa_sangue_cardiaco" value="false" class="check-sim-nao" <?php echo $medicinaConservacao->getOutrasPesquisas()->getSangueCardiaco() === false ? 'checked' : '' ?>></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>



                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="cruzeiro" class="col-md-2 control-label">Penas</label>
                                <div class="col-md-10 div-help">
                                    <div class="col-md-3 checkbox"><label><input type="checkbox" class="outra-pesquisa-pena" id="outra_pesquisa_pena_corpo" name="outra_pesquisa_pena[]" value="<?php echo Utils::CORPO ?>" <?php echo in_array(Utils::CORPO, $medicinaConservacao->getOutrasPesquisas()->getPenas()) ? 'checked' : '' ?>>Corpo</label></div>
                                    <div class="col-md-3 checkbox"><label><input type="checkbox" class="outra-pesquisa-pena" id="outra_pesquisa_pena_asa" name="outra_pesquisa_pena[]" value="<?php echo Utils::ASA ?>" <?php echo in_array(Utils::ASA, $medicinaConservacao->getOutrasPesquisas()->getPenas()) ? 'checked' : '' ?>>Asa</label></div>
                                    <div class="col-md-3 checkbox"><label><input type="checkbox" class="outra-pesquisa-pena" id="outra_pesquisa_pena_nao_coletado" name="outra_pesquisa_pena[]" value="<?php echo Utils::NAO_COLETADO ?>" <?php echo in_array(Utils::NAO_COLETADO, $medicinaConservacao->getOutrasPesquisas()->getPenas()) ? 'checked' : '' ?>>Não coletado</label></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="outra_pesquisa_outros" class="col-md-2 control-label">Outros</label>
                                <div class="col-md-10 div-help">
                                    <textarea class="form-control" id="outra_pesquisa_outros" name="outra_pesquisa_outros"><?php echo $medicinaConservacao->getOutrasPesquisas()->getOutros() ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="outra_pesquisa_observacoes" class="col-md-2 control-label">Observações</label>
                                <div class="col-md-10 div-help">
                                    <textarea class="form-control" id="outra_pesquisa_observacoes" name="outra_pesquisa_observacoes"><?php echo $medicinaConservacao->getOutrasPesquisas()->getObservacoes() ?></textarea>
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
        <a href="<?php echo site_url('medicinaconservacao') ?>" class="btn btn-default btn-lg btn_sub">Cancelar</a>
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

        $('#procedencia').change(function(event, item) {
            if (event.target.value == '<?php echo Utils::PROCEDENCIA_OUTROS ?>') {
                $('#container_procedencia_outros').show();
            } else {
                $('#container_procedencia_outros').hide();
            }

        });

        $("[name='informacao_captura']").click(function(event) {
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

        $(".check-sim-nao").click(function(event) {
            if (event.target.value == 'true') {
                $("[name='" + event.target.name + "'][value='false']").removeAttr('checked');
            } else if (event.target.value == 'false') {
                $("[name='" + event.target.name + "'][value='true']").removeAttr('checked');
            }
        });

        $('.outra-pesquisa-pena').click(function(event) {
            if (event.target.value == '<?php echo Utils::NAO_COLETADO ?>') {
                $('#outra_pesquisa_pena_corpo').removeAttr('checked');
                $('#outra_pesquisa_pena_asa').removeAttr('checked');
            } else if (event.target.value == '<?php echo Utils::CORPO ?>' || event.target.value == '<?php echo Utils::ASA ?>') {
                $('#outra_pesquisa_pena_nao_coletado').removeAttr('checked');
            }
        });

        $('#cruzeiro').change(function() {
            $('#lance').select2('val', '');
            $('#lance').html('<option></option>');
            var cruzeiro = $('#cruzeiro').val();
            if (cruzeiro) {
                blockWindow();
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: '<?php echo site_url('medicinaconservacao/obterlances'); ?>',
                    dataType: "json",
                    data: {cruzeiro: cruzeiro},
                    success: function(res) {
                        unblockWindow();
                        var html = '<option></option>';
                        if (res.data) {
                            var lista = res.data;
                            for(var i = 0; i < lista.length; i++) {
                                var elemento = lista[i];
                                html += '<option value="'+elemento.id+'">'+elemento.name+'</option>';
                            }
                        }

                        $('#lance').html(html);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        unblockWindow();
                        alert('Erro ao obter os lances.');
                    },
                    async: true
                });
            }
        });

    });
</script>
