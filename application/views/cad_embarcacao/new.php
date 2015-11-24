<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-left titulo">Cadastro de Embarcação</h2>
        </div>
    </div>

    <form class="form-horizontal" role="form" id="form" method="post" action="<?php echo base_url(); ?>index.php/cad_embarcacao_ct/salva">
        <input type="hidden" id="id_embarcacao" name="id_embarcacao" value="<?php echo $embarcacao->getIdEmbarcacao()?>">
        <div class="panel panel-sisalbatroz">
            <div class="panel-heading"></div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nome" class="col-md-4 control-label">Nome *</label>
                            <div class="col-md-8 div-help div-help">
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: Marbella I" value="<?php echo $embarcacao->getNome(); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="aut_pesca" class="col-md-4 control-label">Autorização de Pesca *</label>
                            <div class="col-md-8 div-help">
                                <select class="select2" name="aut_pesca" id="aut_pesca">
                                    <option></option>
                                    <?php foreach ($auto_pesca as $autorizPesca): ?>
                                        <?php $selected = (!is_null($embarcacao->getAutorizacaoPesca()) && $embarcacao->getAutorizacaoPesca()->getId() === $autorizPesca->getId()) ? 'selected' : '' ?>
                                        <option value="<?php echo $autorizPesca->getId() ?>" <?php echo $selected ?>><?php echo $autorizPesca->getDescricao() ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="registro" class="col-md-4 control-label">Registro da Marinha *</label>
                            <div class="col-md-8 div-help">
                                <input type="text" class="form-control" id="reg_marinha" name="reg_marinha" value="<?php echo $embarcacao->getRegMarinha(); ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="rgp" class="col-md-4 control-label">Número do RGP *</label>
                            <div class="col-md-8 div-help">
                                <input type="text" class="form-control" id="reg_mpa" name="reg_mpa" value="<?php echo $embarcacao->getRegMpa(); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Comprimento" class="col-md-4 control-label">Comprimento (m)</label>
                            <div class="col-md-8 div-help">
                                <input type="number" step="any" class="form-control" id="comprimento" name="comprimento" placeholder="Ex:18,23" value="<?php echo $embarcacao->getComprimBarco(); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="arq_bruta" class="col-md-4 control-label">Arqueação Bruta</label>
                            <div class="col-md-8 div-help">
                                <input type="number" step="any" class="form-control" id="arq_bruta" name="arq_bruta" placeholder="Não possui unidade" value="<?php echo $embarcacao->getArqueacaoBruta(); ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fabricacao" class="col-md-4 control-label">Ano de Fabricação</label>
                            <div class="col-md-8 div-help">
                                <input type="number" class="form-control" id="ano_fab" name="ano_fab" placeholder="ex: 1990" value="<?php echo $embarcacao->getAnoFabricacao(); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="base" class="col-md-4 control-label">Material do Caso</label>
                            <div class="col-md-8 div-help">
                                <select class="select2" name="mat_casco" id="mat_casco">
                                    <option></option>
                                    <option value ="aço" <?php echo $embarcacao->getMatCasco() == 'Aço' ? 'selected' : '' ?>>Aço</option>
                                    <option value ="fibra_vidro" <?php echo $embarcacao->getMatCasco() == 'Fibra_vidro' ? 'selected' : '' ?>>Fibra de Vidro</option>
                                    <option value ="madeira" <?php echo $embarcacao->getMatCasco() == 'Madeira' ? 'selected' : '' ?>>Madeira</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="propul" class="col-md-4 control-label">Propulsão</label>
                            <div class="col-md-8 div-help">
                                <select class="select2" name="propulsao" id="propulsao">
                                    <option></option>
                                    <option value ="motor" <?php echo $embarcacao->getPropulsao() == 'Motor' ? 'selected' : '' ?>>Motor</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="potenc" class="col-md-4 control-label">Potência do Motor (hp)</label>
                            <div class="col-md-8 div-help">
                                <input type="number" step="any" class="form-control" id="pot_motor" name="pot_motor" value="<?php echo $embarcacao->getPotenciaMotor(); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tripulacao" class="col-md-4 control-label">Tripulação Máxima</label>
                            <div class="col-md-8 div-help">
                                <input type="number" class="form-control" id="tripulacao" name="tripulacao" value="<?php echo $embarcacao->getTripulacao(); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="base" class="col-md-4 control-label">Município</label>
                            <div class="col-md-8 div-help">
                                <select class="select2" name="municipio" id="municipio">
                                    <option></option>
                                    <?php foreach ($municipios as $municipio) :?>
                                    <?php $selected = (!is_null($embarcacao->getMunicipio()) && $embarcacao->getMunicipio()->getId() == $municipio->getId()) ? 'selected' : '' ?>
                                    <option value ="<?php echo $municipio->getId()?>" <?php echo $selected?>><?php echo $municipio->__toString()?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-12 col-md-12" style="margin-bottom: 20px">
            <button type="button" id="btnSub" name="btnSub" class="btn btn-primary btn-lg btn_sub" onclick="return validation('cad_embarcacao_ct', this)">Salvar</button>
            <a href="<?php echo site_url('cad_embarcacao_ct') ?>" class="btn btn-default btn-lg btn_sub">Cancelar</a>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {

        $(".select2").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado"
            }
        });

    });
</script>
