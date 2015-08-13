<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-left titulo">Cadastro de Mestre</h2>
        </div>
    </div>
    <form class="form-horizontal" role="form" id="form" action="<?php echo base_url(); ?>index.php/cad_mestre_ct/salva" method="post">
        <input type="hidden" id="idMestre" name="idMestre" value="<?php echo $mestre->getIdMestre() ?>">

        <div class="panel panel-sisalbatroz">
            <div class="panel-heading"></div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mestre" class="col-md-3 control-label">Nome *</label>
                            <div class="col-md-9 div-help">
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do mestre" value="<?php echo $mestre->getNome(); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="apelido" class="col-md-3 control-label">Apelido</label>
                            <div class="col-md-9 div-help">
                                <input type="text" class="form-control" id="apelido" name="apelido" placeholder="Caso não tenha, repetir no nome" value="<?php echo $mestre->getApelido(); ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telefone" class="col-md-3 control-label">Telefone</label>
                            <div class="col-md-9 div-help">
                                <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Ex: 4797444182" value="<?php echo $mestre->getTelefone(); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">E-mail</label>
                            <div class="col-md-9 div-help">
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $mestre->getEmail(); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12" style="margin-bottom: 20px">
            <button type="button" id="btnSub" name="btnSub" class="btn btn-primary btn-lg btn_sub" onclick="return validation('cad_mestre_ct', this)">Salvar</button>
            <a href="<?php echo site_url('cad_mestre_ct') ?>" class="btn btn-default btn-lg btn_sub">Cancelar</a>
        </div>
    </form>

</div>
