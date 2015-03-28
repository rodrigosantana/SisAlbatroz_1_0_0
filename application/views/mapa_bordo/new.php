
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
        <h2 class="text-left titulo">Mapa de Bordo</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h3 class="text-center titulo"> Dados Gerais </h3>
    </div>
</div>



<form class="form-horizontal" role="form" action="<?php echo site_url('mapa_bordo_ct/salva'); ?>" method="post">
    <input type="hidden" id="id_mb" name="id_mb" value="<?php echo $mbGeral->getIdMb() ?>">

    <div class="panel panel-sisalbatroz">
        <div class="panel-heading"></div>    
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="entrevistador" class="col-md-4 control-label">Entrevistador</label>
                        <div class="col-md-8 div-help">
                            <select class="select2" id="entrevistador" name="entrevistador" style="width: 100%">
                                <option></option>
                                <?php foreach ($entrevistadores as $cad_entrevistador): ?>
                                    <?php $selected = (!is_null($mbGeral->getEntrevistador()) && $mbGeral->getEntrevistador()->getId() == $cad_entrevistador->getId()) ? 'selected' : '' ?>
                                    <option value="<?php echo $cad_entrevistador->getId() ?>" <?php echo $selected; ?>><?php echo $cad_entrevistador->getNome() ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="embarcacao" class="col-md-4 control-label">Embarcação *</label>
                        <div class="col-md-8 div-help">
                            <select class="select2" id="embarcacao" name="embarcacao" style="width: 100%">
                                <option></option>
                                <?php foreach ($embarcacoes as $cad_embarcacao): ?>
                                    <?php $selected = (!is_null($mbGeral->getEmbarcacao()) && $mbGeral->getEmbarcacao()->getIdEmbarcacao() == $cad_embarcacao->getIdEmbarcacao()) ? 'selected' : '' ?>
                                    <option value="<?php echo $cad_embarcacao->getIdEmbarcacao() ?>" <?php echo $selected; ?>><?php echo $cad_embarcacao->getNome() ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="mestre" class="col-md-4 control-label">Mestre *</label>
                        <div class="col-md-8 div-help">
                            <select class="select2" id="mestre" name="mestre" style="width: 100%">
                                <option></option>
                                <?php foreach ($mestres as $cad_mestre): ?>
                                    <?php $selected = (!is_null($mbGeral->getMestre()) && $mbGeral->getMestre()->getIdMestre() == $cad_mestre->getIdMestre()) ? 'selected' : '' ?>
                                    <option value="<?php echo $cad_mestre->getIdMestre() ?>" <?php echo $selected; ?>><?php echo $cad_mestre->getApelido() ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="petre" class="col-md-4 control-label">Petrecho *</label>
                        <div class="col-md-8 div-help">
                            <label class="radio-inline"><input type="radio" name="petrecho" id="petre_esp_sup" <?php echo ($mbGeral->getPetrecho() == Utils::ESPINHEL_SUPERFICIE) ? 'checked' : '' ?> value="<?php echo Utils::ESPINHEL_SUPERFICIE ?>">
                                Espinhel de Superfície
                            </label>
                            <label class="radio-inline"><input type="radio" name="petrecho" id="petre_esp_fun" <?php echo ($mbGeral->getPetrecho() == Utils::ESPINHEL_FUNDO) ? 'checked' : '' ?> value="<?php echo Utils::ESPINHEL_FUNDO ?>">
                                Espinhel de Fundo
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="data_saida" class="col-md-4 control-label">Data de Saída</label>
                        <div class="col-md-8 div-help">
                            <input type="date" class="form-control" id="data_saida" name="data_saida"
                                   value="<?php echo is_null($mbGeral->getDataSaida()) ? '' : $mbGeral->getDataSaida()->format("Y-m-d") ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="data_chegada" class="col-md-4 control-label">Data de Chegada</label>
                        <div class="col-md-8 div-help">
                            <input type="date" class="form-control" id="data_chegada" name="data_chegada"
                                   value="<?php echo is_null($mbGeral->getDataChegada()) ? '' : $mbGeral->getDataChegada()->format("Y-m-d") ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="obs" class="col-md-2 control-label">Observações</label>
                        <div class="col-md-10 div-help">
                            <textarea rows="5" class="form-control" id="obs" rows="2" name="obs" placeholder="Limite de 500 caracteres" maxlength="500"><?php echo $mbGeral->getObservacao() ?></textarea>
                        </div>
                    </div>
                </div>
            </div>


            <fieldset><h3 class="text-center titulo">Dados do Lançamento</h3></fieldset>
            <hr class="hr-sisalbatroz">
            <div id="lance_container" data-prototype="<?php echo htmlspecialchars($this->load->view("mapa_bordo/mb_lancamento", array("mbLance" => new MbLance(), 'iscas' => $iscas, 'medidasMetigatorias' => $medidasMetigatorias, 'aves' => $aves), true)); ?>">
                <?php
                $lista = $mbGeral->getLances();

                foreach ($lista as $key => $value) {
                    echo $this->load->view("mapa_bordo/mb_lancamento", array("mbLance" => $value, "index" => $key, 'iscas' => $iscas, 'medidasMetigatorias' => $medidasMetigatorias, 'aves' => $aves), true);
                }
                ?>
            </div>

            <a href="javascrit:;" class="btn btn-success" id="add_lance"><i class="glyphicon glyphicon-plus"></i> Adicionar lançamento</a>
        </div>
    </div>

    <div class="col-sm-12 col-md-12" style="margin-bottom: 20px">
        <button type="button" id="btnSub" name="btnSub" class="btn btn-primary btn-lg btn_sub" onclick="return validation('mapa_bordo_ct', this)">Submeter</button>
    </div>
</form>




<script>
    $(document).ready(function() {

        $("#entrevistador").select2({
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

        $("#mestre").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado"
            }
        });

        var lances = new Prototype.Class({
            'count': <?php echo $mbGeral->getLances()->count() ?>,
            'list': '#lance_container',
            'addButton': '#add_lance',
            'removeButton': '#remove-lance',
            'container': '.lancamento',
            'addOne': <?php echo $mbGeral->getLances()->count() > 0 ? 'false' : 'true' ?>,
            'isEdit': <?php echo $mbGeral->getLances()->count() > 0 ? 'true' : 'false' ?>
        });

    });
</script>