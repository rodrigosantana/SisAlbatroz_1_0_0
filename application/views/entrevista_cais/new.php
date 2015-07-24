
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
        <h2 class="text-left titulo">Entrevista Cais</h2>
    </div>
</div>

<form class="form-horizontal" role="form" action="<?php echo site_url('entrevistacaisct/salva'); ?>" method="post">
    <input type="hidden" id="id" name="id" value="<?php echo $entrevista->getId() ?>">

    <div class="panel panel-sisalbatroz">
        <div class="panel-heading"><span><b>Dados Gerais</b></span></div>    
        <div class="panel-body">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#dados_gerais" data-toggle="tab">Dados Gerais</a></li>                
                <li><a href="#dados_petrecho" data-toggle="tab">Dados Específicos do Petrecho</a></li>
                <li><a href="#area_pesca" data-toggle="tab">Áreas de Pesca</a></li>
                <li><a href="#interacao_ave" data-toggle="tab">Interações com as Aves</a></li>
                <li><a href="#captura_ave" data-toggle="tab">Captura de Aves</a></li>

            </ul>

            <div class="tab-content" style="margin-top: 20px;">
                <div id="dados_gerais" class="tab-pane active">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="responsavel_campo" class="col-md-4 control-label">Responsável de campo *</label>
                                <div class="col-md-8 div-help">
                                    <select class="select2" style="width: 100%" id="responsavel_campo" name="responsavel_campo">
                                        <option></option>
                                        <?php foreach ($responsaveis as $responsavel): ?>
                                            <?php $selected = (!is_null($entrevista->getResponsavelCampo()) && $entrevista->getResponsavelCampo()->getId() == $responsavel->getId()) ? 'selected' : '' ?>
                                            <option value="<?php echo $responsavel->getId() ?>" <?php echo $selected ?>><?php echo $responsavel->getName() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="data" class="col-md-4 control-label">Data</label>
                                <div class="col-md-8 div-help">
                                    <input type="date" class="form-control" id="data" name="data" value="<?php echo is_null($entrevista->getData()) ? '' : $entrevista->getData()->format("Y-m-d") ?>">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="empresa" class="col-md-4 control-label">Empresa</label>
                                <div class="col-md-8 div-help">
                                    <select class="select2" style="width: 100%" id="empresa" name="empresa">
                                        <option></option>
                                        <?php foreach ($empresas as $empresa): ?>
                                            <?php $selected = (!is_null($entrevista->getEmpresa()) && $entrevista->getEmpresa()->getIdEmpresa() == $empresa->getIdEmpresa()) ? 'selected' : '' ?>
                                            <option value="<?php echo $empresa->getIdEmpresa() ?>" <?php echo $selected ?>><?php echo $empresa->getNome() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="municipio" class="col-md-4 control-label">Cidade</label>
                                <div class="col-md-8 div-help">
                                    <select class="select2" style="width: 100%" id="municipio" name="municipio">
                                        <option></option>
                                        <?php foreach ($municipios as $municipio): ?>
                                            <?php $selected = (!is_null($entrevista->getMunicipio()) && $entrevista->getMunicipio()->getId() == $municipio->getId()) ? 'selected' : '' ?>
                                            <option value="<?php echo $municipio->getId() ?>" <?php echo $selected ?>><?php echo $municipio->__toString() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="embarcacao" class="col-md-4 control-label">Embarcação *</label>
                                <div class="col-md-8 div-help">
                                    <select class="select2" style="width: 100%" id="embarcacao" name="embarcacao">
                                        <option></option>
                                        <?php foreach ($embarcacoes as $embarcacao): ?>
                                            <?php $selected = (!is_null($entrevista->getEmbarcacao()) && $entrevista->getEmbarcacao()->getIdEmbarcacao() == $embarcacao->getIdEmbarcacao()) ? 'selected' : '' ?>
                                            <option value="<?php echo $embarcacao->getIdEmbarcacao() ?>" <?php echo $selected ?>><?php echo $embarcacao->getNome() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="proto" class="col-md-4 control-label">Porto de saída</label>
                                <div class="col-md-8 div-help">
                                    <select class="select2" style="width: 100%" id="porto_saida" name="porto_saida">
                                        <option></option>
                                        <?php foreach ($portos as $proto): ?>
                                            <?php $selected = (!is_null($entrevista->getPortoSaida()) && $entrevista->getPortoSaida()->getId() == $proto->getId()) ? 'selected' : '' ?>
                                            <option value="<?php echo $proto->getId() ?>" <?php echo $selected ?>><?php echo $proto->getNome() ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="data_saida" class="col-md-4 control-label">Data de saída</label>
                                <div class="col-md-8 div-help">
                                    <input type="date" class="form-control" id="data_saida" name="data_saida" value="<?php echo is_null($entrevista->getDataSaida()) ? '' : $entrevista->getDataSaida()->format("Y-m-d") ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="hora_saida" class="col-md-4 control-label">Hora de saída</label>
                                <div class="col-md-8 div-help">
                                    <input type="time" class="form-control" id="hora_saida" name="hora_saida" value="<?php echo is_null($entrevista->getHoraSaida()) ? '' : $entrevista->getHoraSaida()->format("H:i") ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dias_mar" class="col-md-4 control-label">Dias de mar</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" step="any" class="form-control" id="dias_mar" name="dias_mar" value="<?php echo $entrevista->getDiasMar() ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="data_chegada" class="col-md-4 control-label">Data de chegada</label>
                                <div class="col-md-8 div-help">
                                    <input type="date" class="form-control" id="data_chegada" name="data_chegada" value="<?php echo is_null($entrevista->getDataChegada()) ? '' : $entrevista->getDataChegada()->format("Y-m-d") ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="hora_chegada" class="col-md-4 control-label">Hora de chegada</label>
                                <div class="col-md-8 div-help">
                                    <input type="time" class="form-control" id="hora_chegada" name="hora_chegada" value="<?php echo is_null($entrevista->getHoraChegada()) ? '' : $entrevista->getHoraChegada()->format("H:i") ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dias_pesca" class="col-md-4 control-label">Dias de pesca</label>
                                <div class="col-md-8 div-help">
                                    <input type="number" step="any" class="form-control" id="dias_pesca" name="dias_pesca" value="<?php echo $entrevista->getDiasPesca() ?>">
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            
                <div id="dados_petrecho" class="tab-pane">				

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tipo_petrecho" class="col-md-4 control-label">Tipo de petrecho</label>
                                <div class="col-md-8 div-help">
                                    <select class="select2" style="width: 100%" id="tipo_petrecho" name="tipo_petrecho">
                                        <option></option>
                                        <option value="petrecho_espinhel" <?php echo $entrevista->getPetrecho() instanceof PetrechoEspinhel ? 'selected' : '' ?>>Espinhel</option>
                                        <option value="petrecho_linha_mao" <?php echo $entrevista->getPetrecho() instanceof PetrechoLinhaMao ? 'selected' : '' ?>>Linha de mão</option>
                                        <option value="petrecho_cerco" <?php echo $entrevista->getPetrecho() instanceof PetrechoCerco ? 'selected' : '' ?>>Cerco</option>
                                        <option value="petrecho_emalhe" <?php echo $entrevista->getPetrecho() instanceof PetrechoEmalhe ? 'selected' : '' ?>>Emalhe</option>
                                        <option value="petrecho_arrasto" <?php echo $entrevista->getPetrecho() instanceof PetrechoArrasto ? 'selected' : '' ?>>Arrasto</option>
                                        <option value="petrecho_vara_isca_viva" <?php echo $entrevista->getPetrecho() instanceof PetrechoVaraIscaViva ? 'selected' : '' ?>>Vara e Isca Viva</option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div id="container_petrecho_espinhel" class="petrechos" style="<?php echo $entrevista->getPetrecho() instanceof PetrechoEspinhel ? 'display:block' : 'display:none' ?>">
                                <?php echo $this->load->view("entrevista_cais/petrecho_espinhel", array('petrechoEspinhel' => $entrevista->getPetrecho()), true); ?>
                            </div>
                            <div id="container_petrecho_linha_mao" class="petrechos" style="<?php echo $entrevista->getPetrecho() instanceof PetrechoLinhaMao ? 'display:block' : 'display:none' ?>">
                                <?php echo $this->load->view("entrevista_cais/petrecho_linha_mao", array('petrechoLinhaMao' => $entrevista->getPetrecho()), true); ?>
                            </div>
                            <div id="container_petrecho_cerco" class="petrechos" style="<?php echo $entrevista->getPetrecho() instanceof PetrechoCerco ? 'display:block' : 'display:none' ?>">
                                <?php echo $this->load->view("entrevista_cais/petrecho_cerco", array('petrechoCerco' => $entrevista->getPetrecho()), true); ?>
                            </div>
                            <div id="container_petrecho_emalhe" class="petrechos" style="<?php echo $entrevista->getPetrecho() instanceof PetrechoEmalhe ? 'display:block' : 'display:none' ?>">
                                <?php echo $this->load->view("entrevista_cais/petrecho_emalhe", array('petrechoEmalhe' => $entrevista->getPetrecho()), true); ?>
                            </div>
                            <div id="container_petrecho_arrasto" class="petrechos" style="<?php echo $entrevista->getPetrecho() instanceof PetrechoArrasto ? 'display:block' : 'display:none' ?>">
                                <?php echo $this->load->view("entrevista_cais/petrecho_arrasto", array('petrechoArrasto' => $entrevista->getPetrecho()), true); ?>
                            </div>
                            <div id="container_petrecho_vara_isca_viva" class="petrechos" style="<?php echo $entrevista->getPetrecho() instanceof PetrechoVaraIscaViva ? 'display:block' : 'display:none' ?>">
                                <?php echo $this->load->view("entrevista_cais/petrecho_vara_isca_viva", array('petrechoVaraIscaViva' => $entrevista->getPetrecho()), true); ?>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div id="area_pesca" class="tab-pane">
                    <div id="area_pesca_container" data-prototype="<?php echo htmlspecialchars($this->load->view("entrevista_cais/area_pesca", array('areaPesca' => new EntrevistaCaisAreaPesca(), "indexArea" => '$$numero$$'), true)); ?>">
                        <?php
                        $lista = $entrevista->getAreaspesca()->toArray();

                        foreach ($lista as $key => $value) {
                            echo $this->load->view("entrevista_cais/area_pesca", array('areaPesca' => $value, "indexArea" => $key), true);
                        }
                        ?>
                    </div>

                    <a href="javascrit:;" class="btn btn-success" id="add_area_pesca" style="margin-top: 10px"><i class="glyphicon glyphicon-plus"></i> Adicionar área de pesca</a>

                </div>
            
                <div id="interacao_ave" class="tab-pane">
                    <div class="table-responsive">
                        <table class="table table-sisalbatroz">
                            <thead>
                                <tr>
                                    <th class="col-md-5"></th>
                                    <th class="col-md-2">Sim</th>
                                    <th class="col-md-2">Não</th>
                                    <th class="col-md-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" class="th-table-checkbox">Foi observado aves durante a operação de pesca?</th>
                                    <td><input type="checkbox" name="ave_observado" value="true" class="check-sim-nao" <?php echo $entrevista->getAveObservado() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="ave_observado" value="false" class="check-sim-nao" <?php echo $entrevista->getAveObservado() === false ? 'checked' : '' ?>></td>           
                                </tr>          
                                <tr>
                                    <th scope="row" class="th-table-checkbox">Ave atrapalhou a operação de pesca?</th>
                                    <td><input type="checkbox" name="ave_atrapalhou" value="true" class="check-sim-nao" <?php echo $entrevista->getAveAtrapalhou() === true ? 'checked' : '' ?>></td>
                                    <td><input type="checkbox" name="ave_atrapalhou" value="false" class="check-sim-nao" <?php echo $entrevista->getAveAtrapalhou() === false ? 'checked' : '' ?>></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>				
                </div>
            
                <div id="captura_ave" class="tab-pane">
                    <label class="control-label">Alguma ave foi capturada durante a operação de pesca?</label>

                    <hr class="hr-sisalbatroz">

                    <div id="capturas_aves_container" data-prototype="<?php echo htmlspecialchars($this->load->view("entrevista_cais/captura_ave", array('capturaAve' => new EntrevistaCaisCapturaAve(), 'aves' => $aves, "indexCaptura" => '$$numero$$'), true)); ?>">
                        <?php
                        $lista = $entrevista->getCapturasAves()->toArray();

                        foreach ($lista as $key => $value) {
                            echo $this->load->view("entrevista_cais/captura_ave", array('capturaAve' => $value, 'aves' => $aves, "indexCaptura" => $key), true);
                        }
                        ?>
                    </div>

                    <a href="javascrit:;" class="btn btn-success" id="add_capturas_aves" style="margin-top: 10px"><i class="glyphicon glyphicon-plus"></i> Adicionar espécie</a>
                </div>
            </div>
        </div>
    </div>    

    <div class="col-sm-12 col-md-12" style="margin-bottom: 20px">
        <button type="button" id="btnSub" name="btnSub" class="btn btn-primary btn-lg btn_sub" onclick="return validation('entrevistacaisct', this)">Salvar</button>
        <a href="<?php echo site_url('entrevistacaisct') ?>" class="btn btn-default btn-lg btn_sub">Cancelar</a>
    </div>
</form>




<script>
    $(document).ready(function() {

        $("#responsavel_campo").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado"
            }
        });

        $("#empresa").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado"
            }
        });

        $("#municipio").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado"
            }
        });

        $("#embarcacao").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado"
            }
        });

        $("#porto_saida").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado"
            }
        });

        $("#tipo_petrecho").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado"
            }
        });

        $("#tipo_petrecho").change(function(event) {
            $('.petrechos').hide();

            if (event.target.value) {
                $("#container_" + event.target.value).show();
            }
        });

        var capturasaves = new Prototype.Class({
            'count': <?php echo $entrevista->getCapturasAves()->count() ?>,
            'list': '#capturas_aves_container',
            'addButton': '#add_capturas_aves',
            'removeButton': '#remove-capturas-aves',
            'container': '.capturas_aves',
            'addOne': false,
            'isEdit': <?php echo $entrevista->getCapturasAves()->count() > 0 ? 'true' : 'false' ?>
        });

        var areapesca = new Prototype.Class({
            'count': <?php echo $entrevista->getAreaspesca()->count() ?>,
            'list': '#area_pesca_container',
            'addButton': '#add_area_pesca',
            'removeButton': '#remove-area-pesca',
            'container': '.area_pesca',
            'addOne': false,
            'isEdit': <?php echo $entrevista->getAreaspesca()->count() > 0 ? 'true' : 'false' ?>
        });


        $(".check-sim-nao").click(function (event) {            
            if (event.target.value == 'true') {
                $("[name='"+event.target.name+"'][value='false']").removeAttr('checked');
            } else if (event.target.value == 'false') {
                $("[name='"+event.target.name+"'][value='true']").removeAttr('checked');
            }
        });
        
        $(".tipo-rede").click(function (event) {            
            if (event.target.value == '<?php echo Utils::BOIADA?>') {
                $("[name='"+event.target.name+"'][value='<?php echo Utils::FUNDO?>']").removeAttr('checked');
            } else if (event.target.value == '<?php echo Utils::FUNDO?>') {
                $("[name='"+event.target.name+"'][value='<?php echo Utils::BOIADA?>']").removeAttr('checked');
            }
        });
        
        $(".regime-trabalho").click(function (event) {            
            if (event.target.value == '<?php echo Utils::INTEGRAL?>') {
                $("[name='"+event.target.name+"'][value='<?php echo Utils::DIURNO?>']").removeAttr('checked');
                $("[name='"+event.target.name+"'][value='<?php echo Utils::NOTURNO?>']").removeAttr('checked');
            } else if (event.target.value == '<?php echo Utils::DIURNO?>') {
                $("[name='"+event.target.name+"'][value='<?php echo Utils::INTEGRAL?>']").removeAttr('checked');
                $("[name='"+event.target.name+"'][value='<?php echo Utils::NOTURNO?>']").removeAttr('checked');
            } else if (event.target.value == '<?php echo Utils::NOTURNO?>') {
                $("[name='"+event.target.name+"'][value='<?php echo Utils::INTEGRAL?>']").removeAttr('checked');
                $("[name='"+event.target.name+"'][value='<?php echo Utils::DIURNO?>']").removeAttr('checked');
            }            
        });
        
        $(".tipo-arrasto").click(function (event) {            
            if (event.target.value == '<?php echo Utils::SIMPLES?>') {
                $("[name='"+event.target.name+"'][value='<?php echo Utils::DUPLO?>']").removeAttr('checked');
            } else if (event.target.value == '<?php echo Utils::DUPLO?>') {
                $("[name='"+event.target.name+"'][value='<?php echo Utils::SIMPLES?>']").removeAttr('checked');
            }
        });
    });
</script>