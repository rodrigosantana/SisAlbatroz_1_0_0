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
            <h2 class="text-left titulo">Cadastro de Embarcação</h2>
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

    <form class="form-horizontal" role="form" id="form" method="post"
          action="<?php echo base_url();?>index.php/cad_embarcacao_ct/salva">
        <input type="hidden" id="id_barco" name="id_barco" value="">
		<div class="panel panel-sisalbatroz">
            <div class="panel-heading"></div>    
            <div class="panel-body">

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="nome" class="col-md-4 control-label">Nome: </label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="nome" name="nome" placeholder="Ex: Marbella I" value="<?php echo set_value('nome');?>">
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="aut_pesca" class="col-md-4 control-label"> Autorização de Pesca:</label>
							<div class="col-md-8">
								<select class="select2" name="aut_pesca" id="aut_pesca">
									<option></option>
									<?php foreach ($auto_pesca as $autorizPesca): ?>
										<?php $selected = (set_value('aut_pesca') === $autorizPesca->getModalidade()) ? 'selected' : ''?>
										<option value="<?php echo $autorizPesca->getModalidade()?>" <?php echo $selected ?>><?php echo $autorizPesca->getDescricao()?></option>
									<?php endforeach;?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="registro" class="col-md-4 control-label">
								Registro da Marinha:</label>
							<div class="col-md-8">
								<input type="number" class="form-control" id="reg_marinha" name="reg_marinha" value="<?php echo set_value('reg_marinha');?>">
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="rgp" class="col-md-4 control-label">
								Número do RGP:</label>
							<div class="col-md-8">
								<input type="number" class="form-control" id="reg_mpa" name="reg_mpa" value="<?php echo set_value('reg_mpa');?>">
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="Comprimento" class="col-md-4 control-label">Comprimento (m):</label>
							<div class="col-md-8">
								<input type="number" class="form-control" id="comprimento" name="comprimento" placeholder="Ex:18,23" value="<?php echo set_value('comprimento');?>">
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="arq_bruta" class="col-md-4 control-label">
								Arqueação Bruta:</label>
							<div class="col-md-8">
								<input type="number" class="form-control" id="arq_bruta" name="arq_bruta" placeholder="Não possui unidade" value="<?php echo set_value('arq_bruta');?>">
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="fabricacao" class="col-md-4 control-label">
								Ano de Fabricação:</label>
							<div class="col-md-8">
								<input type="number" class="form-control" id="ano_fab" name="ano_fab" placeholder="ex: 1990" value="<?php echo set_value('ano_fab');?>">
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="base" class="col-md-4 control-label"> Material do Caso:</label>
							<div class="col-md-8">
								<select class="select2" name="mat_casco" id="mat_casco">
									<option></option>
									<option value ="aço"<?php echo set_select('mat_casco','aço');?>>Aço</option>
									<option value ="fibra_vidro"<?php echo set_select('mat_casco','fibr_vidro');?>>Fibra de Vidro</option>
									<option value ="madeira"<?php echo set_select('mat_casco','madeira');?>>Madeira</option>
								 </select>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="propul" class="col-md-4 control-label">Propulsão:</label>
							<div class="col-md-8">
								<select class="select2" name="propulsao" id="propulsao">
									<option></option>
									<option value ="motor"<?php echo set_select('propulsao','motor');?>>Motor</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="potenc" class="col-md-4 control-label">Potência do Motor (hp):</label>
							<div class="col-md-8">
								<input type="number" class="form-control" id="pot_motor" name="pot_motor" value="<?php echo set_value('pot_motor');?>">
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="tripulacao" class="col-md-4 control-label">Tripulação Máxima:</label>
							<div class="col-md-8">
								<input type="number" class="form-control" id="tripulacao" name="tripulacao" value="<?php echo set_value('tripulacao');?>">
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="base" class="col-md-4 control-label">Município:</label>
							<div class="col-md-8">
								<select class="select2" name="municipio" id="municipio">
									<option></option>
									<option value ="Itajai" <?php echo set_select('municipio','Itajai');?>>Itajaí</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="base" class="col-md-4 control-label">UF:</label>
							<div class="col-md-8">
								<select class="select2" name="uf" id="uf">
									<option></option>
									<option value ="SC" <?php echo set_select('uf','SC');?>>SC     </option>
								</select>
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
</div>

<script>
    $(document).ready(function() {

        $("#aut_pesca").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado"
            }
        });

		$("#mat_casco").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado"
            }
        });

		$("#propulsao").select2({
            placeholder: "Selecione",
            allowClear: true,
            formatNoMatches: function() {
                return "Nenhum item encontrado"
            }
        });

		$("#uf").select2({
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
        

    });
</script>