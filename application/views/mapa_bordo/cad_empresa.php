<div class="container-fluid">
    <?php if (isset($mensagem) && $mensagem === true): ?>
        <div class="col-md-4 col-md-offset-4 alert alert-success alert-dismissible" role="alert" style="margin-top: 20px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            <p><strong>Sucesso!</strong><p> 
                Registro salvo com sucesso.
        </div>  
    <?php endif; ?>

    <div class="row">
        <div class="col-md-12">
            <h2 class="text-left titulo">Cadastro de Empresa</h2>
        </div>
    </div>

    <?php if (validation_errors() != '') : ?>   
        <div class="row">
            <div class="col-md-12">
				<div class="col-md-6 col-md-offset-3 alert alert-danger alert-dismissible" role="alert" style="margin-top: 20px">
					<button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
					<p><strong>Erro!</strong><p> 
						<?php echo validation_errors(); ?>
				</div>                
            </div>
        </div>    
    <?php endif; ?>

    <form class="form-horizontal" role="form" id="form" method="post" action="<?php echo base_url();?>index.php/cad_empresa_ct/salva">
        <input type="hidden" id="id_empresa" name="id_empresa" value="">
		<input type="hidden" id="id_barco" name="id_barco" value="">
		<div class="panel panel-sisalbatroz">
			<div class="panel-heading"></div>    
			<div class="panel-body">

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="nome" class="col-md-4 control-label">Nome:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="nome" name="nome" value="<?php echo set_value('nome');?>" placeholder="Nome completo da empresa">
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="cidade" class="col-md-4 control-label">Cidade:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo set_value('cidade');?>">
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="end" class="col-md-4 control-label">Endereço:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo set_value('endereco');?>">
							</div>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="contato" class="col-md-4 control-label">Contato:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="contato" name="contato" placeholder="Pessoa de contato na empresa" value="<?php echo set_value('contato');?>">
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="cargo" class="col-md-4 control-label">Cargo:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="cargo" name="cargo" placeholder="Ex: RH, Segurança, Secretária" value="<?php echo set_value('cargo');?>">
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="telefone" class="col-md-4 control-label">Telefone:</label>
							<div class="col-md-8">
								<input type="number" class="form-control" id="telefone" name="telefone" value="<?php echo set_value('telefone');?>">
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="email" class="col-md-4 control-label">E-mail:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email');?>">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <div class="col-sm-12 col-md-12" style="margin-bottom: 20px">
            <button type="submit" id="btnSub" name="btnSub"
                    class="btn btn-primary btn-lg btn_sub" >Submeter</button>
        </div>
    </form>
</div>