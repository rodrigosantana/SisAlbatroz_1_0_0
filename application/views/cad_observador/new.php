<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-left titulo">Cadastro de Observador</h2>
        </div>
    </div>

    <form class="form-horizontal" role="form" id="form" action="<?php echo base_url(); ?>index.php/cad_observ_ct/salva" method="post">
        <input type="hidden" id="idObserv" name="idObserv" value="<?php echo $observador->getIdObserv() ?>">
        <div class="panel panel-sisalbatroz">
            <div class="panel-heading"></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nome" class="col-md-4 control-label">Nome *</label>
                            <div class="col-md-8 div-help">
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo" value="<?php echo $observador->getNome(); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cpf" class="col-md-4 control-label">CPF *</label>
                            <div class="col-md-8 div-help">
                                <input type="number" class="form-control" id="cpf" name="cpf" placeholder="Apenas dígitos" value="<?php echo $observador->getCpf(); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="rg" class="col-md-4 control-label">RG *</label>
                            <div class="col-md-8 div-help">
                                <input type="number" class="form-control" id="rg" name="rg" placeholder="Apenas dígitos" value="<?php echo $observador->getRg(); ?>">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-mail *</label>
                            <div class="col-md-8 div-help">
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $observador->getEmail(); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tel" class="col-md-4 control-label">Telefone *</label>
                            <div class="col-md-8 div-help">
                                <input type="number" class="form-control" id="tel" name="tel" value="<?php echo $observador->getTelefone(); ?>" placeholder="Ex: 4797444182">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="skype" class="col-md-4 control-label">Skype </label>
                            <div class="col-md-8 div-help">
                                <input type="text" class="form-control" id="skype" name="skype" value="<?php echo $observador->getSkype(); ?>">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="end" class="col-md-4 control-label">Endereço *</label>
                            <div class="col-md-8 div-help">
                                <textarea class="form-control" id="end" rows="2" name="end" placeholder="Limite de 200 caracteres" ><?php echo $observador->getEndereco(); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="base" class="col-md-4 control-label">Município:</label>
                            <div class="col-md-8 div-help">
                                <select class="select2" name="municipio" id="municipio">
                                    <option></option>
                                    <?php foreach ($municipios as $municipio) : ?>
                                        <?php $selected = (!is_null($observador->getMunicipio()) && $observador->getMunicipio()->getId() == $municipio->getId()) ? 'selected' : '' ?>
                                        <option value ="<?php echo $municipio->getId() ?>" <?php echo $selected ?>> <?php echo $municipio->__toString() ?> </option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-12 col-md-12" style="margin-bottom: 20px">
            <button type="button" id="btnSub" name="btnSub" class="btn btn-primary btn-lg btn_sub" onclick="return validation('cad_observ_ct', this)">Salvar</button>
            <a href="<?php echo site_url('cad_observ_ct') ?>" class="btn btn-default btn-lg btn_sub">Cancelar</a>
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
