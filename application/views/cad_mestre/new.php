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
            <h2 class="text-left titulo">Cadastro de Mestre</h2>
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

<form class="form-horizontal" role="form" id="form" action="<?php echo base_url();?>index.php/cad_mestre_ct/salva" method="post">
    <input type="hidden" id="id" name="id" value="<?php echo $mestre->getIdMestre()?>">

	<div class="panel panel-sisalbatroz">
            <div class="panel-heading"></div>
            <div class="panel-body">

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="mestre" class="col-md-3 control-label">Nome</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do mestre" value="<?php echo set_value('nome');?>">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="apelido" class="col-md-3 control-label">Apelido *</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="apelido" name="apelido" placeholder="Caso não tenha, repetir no nome" value="<?php echo set_value('apelido');?>">
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="telefone" class="col-md-3 control-label">Telefone</label>
						<div class="col-md-9">
							<input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Ex: 4797444182" value="<?php echo set_value('telefone');?>">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="email" class="col-md-3 control-label">E-mail</label>
						<div class="col-md-9">
							<input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email');?>">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
   <div class="col-sm-12 col-md-12" style="margin-bottom: 20px">
      <button type="submit" id="btnSub" name="btnSub" class="btn btn-primary btn-lg btn_sub" >Salvar</button>
   </div>
</form>

</div>
