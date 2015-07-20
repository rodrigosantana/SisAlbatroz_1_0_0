<form class="form-horizontal" role="form" action="<?php echo site_url('cad_empresa_ct/filter'); ?>" method="post">

   <div class="row">
      <div class="col-md-6">
         <div class="form-group">
             <label for="nome" class="col-md-4 control-label">Nome</label>
             <div class="col-md-8 div-help">
                 <input type="text" class="form-control" id="nome" name="nome" maxlength="100" value="<?php echo isset($filtro['nome']) ? $filtro['nome'] : '' ?>">
             </div>
         </div>
      </div>

      <div class="col-md-6">
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

   <div class="row">
      <div class="col-md-6">
          <div class="form-group">
             <label for="nome_us" class="col-md-4 control-label">Contato</label>
             <div class="col-md-8 div-help">
                  <input type="text" class="form-control" id="contato" name="contato" maxlength="100" value="<?php echo isset($filtro['contato']) ? $filtro['contato'] : '' ?>">
             </div>
          </div>
      </div>

      <div class="col-md-6">
          <div class="form-group">
              <label for="nome_us" class="col-md-4 control-label">Cargo</label>
              <div class="col-md-8 div-help">
                  <input type="text" class="form-control" id="cargo" name="cargo" maxlength="100" value="<?php echo isset($filtro['cargo']) ? $filtro['cargo'] : '' ?>">
              </div>
          </div>
      </div>
   </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="spp" class="col-md-4 control-label">Telefone</label>
                <div class="col-md-8 div-help">
                    <input type="text" class="form-control" id="telefone" name="telefone" maxlength="100" value="<?php echo isset($filtro['telefone']) ? $filtro['telefone'] : '' ?>">
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="spp" class="col-md-4 control-label">E-mail</label>
                <div class="col-md-8 div-help">
                    <input type="text" class="form-control" id="email" name="email" maxlength="100" value="<?php echo isset($filtro['email']) ? $filtro['email'] : '' ?>">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo site_url('cad_empresa_ct/clearfilter')?>" class="btn btn-default btn_sub pull-right">Limpar filtro</a>
            <button type="submit" id="btnSub" name="btnSub" class="btn btn-primary btn_sub pull-right" onclick="" style="margin-right: 10px">Filtrar</button>
        </div>
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
