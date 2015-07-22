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
            <h2 class="text-left titulo">Cadastro de Observador</h2>
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
<form class="form-horizontal" role="form" id="form" action="<?php echo base_url();?>index.php/cad_observ_ct/salva" method="post">
    <input type="hidden" id="idObserv" name="idObserv" value="<?php echo $observador->getIdObserv()?>">
		<div class="panel panel-sisalbatroz">
			<div class="panel-heading"></div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="nome" class="col-md-4 control-label">Nome *</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo" value="<?php echo set_value('nome');?>">
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="cpf" class="col-md-4 control-label">CPF *</label>
							<div class="col-md-8">
								<input type="number" class="form-control" id="cpf" name="cpf" placeholder="Apenas dígitos" value="<?php echo set_value('cpf');?>">
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="rg" class="col-md-4 control-label">RG *</label>
							<div class="col-md-8">
								<input type="number" class="form-control" id="rg" name="rg" placeholder="Apenas dígitos" value="<?php echo set_value('rg');?>">
							</div>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="email" class="col-md-4 control-label">E-mail *</label>
							<div class="col-md-8">
								<input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email');?>">
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="tel" class="col-md-4 control-label">Telefone *</label>
							<div class="col-md-8">
								<input type="number" class="form-control" id="tel" name="tel" value="<?php echo set_value('tel');?>" placeholder="Ex: 4797444182">
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="skype" class="col-md-4 control-label">Skype </label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="skype" name="skype" value="<?php echo set_value('skype');?>">
							</div>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="end" class="col-md-4 control-label">Endereço *</label>
							<div class="col-md-8">
								<textarea class="form-control" id="end" rows="2" name="end" placeholder="Limite de 200 caracteres" ><?php echo set_value('end');?></textarea>
							</div>
						</div>
					</div>

					<div class="col-md-4">
                  <div class="form-group">
                      <label for="base" class="col-md-4 control-label">Município:</label>
                      <div class="col-md-8">
                          <select class="select2" name="municipio" id="municipio">
                              <option></option>
                              <?php foreach ($municipios as $municipio) :?>
                                 <option value ="<?php echo $municipio->getId()?>"> <?php echo $municipio->__toString()?> </option>
                              <?php endforeach;?>

                           </select>
                      </div>
                  </div>
               </div>
				</div>
			</div>

		</div>
	</div>
    <div class="col-sm-12 col-md-12" style="margin-bottom: 20px">
		<button type="submit" id="btnSub" name="btnSub"
				class="btn btn-primary btn-lg btn_sub" >Salvar</button>
	</div>
</form>

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
