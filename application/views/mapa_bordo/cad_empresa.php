<div class="container-fluid">
    <?php if (isset($mensagem)): ?>
        <div class="alert alert-success text-center" role="alert"><strong><?php echo $mensagem ?></strong></div>
    <?php endif;?>
    <br>
    <div class="col-sm-12 col-lg-12">
        <h1 class="text-left titulo titulo-cadastro">Cadastro de Empresa</h1>
        <hr>
    </div>
    <!-- Visualizar erros de validação de form do CI    -->
    <?php echo validation_errors();?>
    </br>
    <form class="form-horizontal" role="form" id="form" method="post" action="<?php echo base_url();?>index.php/cad_empresa_ct/salva">
        <input type="hidden" id="id_empresa" name="id_empresa" value="">
        <div class="row">
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="nome" class="col-md-4 control-label">Nome:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo set_value('nome');?>" placeholder="Nome completo da empresa">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="cidade" class="col-md-4 control-label">Cidade:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo set_value('cidade');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="end" class="col-md-4 control-label">Endereço:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo set_value('endereco');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="contato" class="col-md-4 control-label">Contato:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="contato" name="contato" placeholder="Pessoa de contato na empresa" value="<?php echo set_value('contato');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="cargo" class="col-md-4 control-label">Cargo:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Ex: RH, Segurança, Secretária" value="<?php echo set_value('cargo');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="telefone" class="col-md-4 control-label">Telefone:</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="telefone" name="telefone" value="<?php echo set_value('telefone');?>">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">E-mail:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email');?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 text-right">
            <button type="submit" id="btnSub" name="btnSub" class="btn btn-success btn-lg btn_sub" >Submeter</button>
        </div>
    </form>
</div>