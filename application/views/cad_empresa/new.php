<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-left titulo">Cadastro de Empresa</h2>
        </div>
    </div>

    <form class="form-horizontal" role="form" id="form" method="post" action="<?php echo base_url(); ?>index.php/cad_empresa_ct/salva">
        <input type="hidden" id="id_empresa" name="id_empresa" value="<?php echo $empresa->getIdEmpresa() ?>">
        <div class="panel panel-sisalbatroz">
            <div class="panel-heading"></div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nome" class="col-md-4 control-label">Nome*</label>
                            <div class="col-md-8 div-help">
                                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $empresa->getNome(); ?>" placeholder="Nome completo da empresa">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="base" class="col-md-4 control-label">Município*</label>
                            <div class="col-md-8 div-help">
                                <select class="select2" name="municipio" id="municipio">
                                    <option></option>
                                    <?php foreach ($municipios as $municipio) : ?>
                                        <?php $selected = (!is_null($empresa->getMunicipio()) && $empresa->getMunicipio()->getId() == $municipio->getId()) ? 'selected' : '' ?>
                                        <option value ="<?php echo $municipio->getId() ?>" <?php echo $selected ?> > <?php echo $municipio->__toString() ?> </option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="end" class="col-md-4 control-label">Endereço</label>
                            <div class="col-md-8 div-help">
                                <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $empresa->getEnd(); ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="contato" class="col-md-4 control-label">Contato</label>
                            <div class="col-md-8 div-help">
                                <input type="text" class="form-control" id="contato" name="contato" placeholder="Pessoa de contato na empresa" value="<?php echo $empresa->getContato(); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cargo" class="col-md-4 control-label">Cargo</label>
                            <div class="col-md-8 div-help">
                                <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Ex: RH, Segurança, Secretária" value="<?php echo $empresa->getCargo(); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="telefone" class="col-md-4 control-label">Telefone</label>
                            <div class="col-md-8 div-help">
                                <input type="text" maxlength="11" class="form-control" id="telefone" name="telefone" value="<?php echo $empresa->getTel(); ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-mail</label>
                            <div class="col-md-8 div-help">
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $empresa->getEmail(); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12" style="margin-bottom: 20px">
            <button type="button" id="btnSub" name="btnSub" class="btn btn-primary btn-lg btn_sub" onclick="return validation('cad_empresa_ct', this)">Salvar</button>
            <a href="<?php echo site_url('cad_empresa_ct') ?>" class="btn btn-default btn-lg btn_sub">Cancelar</a>
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
