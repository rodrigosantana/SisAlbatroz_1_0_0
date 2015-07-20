
<?php if ($mensagem): ?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 alert alert-success alert-dismissible" role="alert" style="margin-top: 20px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            <p><strong>Sucesso!</strong><p>
            <?php echo $mensagem?>
        </div>
    </div>
<?php endif; ?>

<h2>Empresas de Pesca</h2>

<div class="panel panel-sisalbatroz">
    <div class="panel-heading" style="height: 55px">
        <?php if ($this->ezrbac->hasAccess(Utils::CREATE, 'especie')) :?>
        <a href="<?php echo site_url('cad_empresa_ct/novo') ?>" class="btn btn-add-sisalbatroz pull-right"><i class="glyphicon glyphicon-plus"></i> Adicionar</a>
        <?php endif;?>
        <a class="btn btn-add-sisalbatroz pull-right" role="button" data-toggle="modal" data-target="#filtroModal" style="margin-right: 10px"><i class="glyphicon glyphicon-search"></i> Filtrar</a>
    </div>

    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Municipio</th>
                        <th class="text-center">Contato</th>
                        <th class="text-center">Cargo</th>
                        <th class="text-center">Telefone</th>
                        <th class="text-center">E-mail</th>

                        <th class="text-center">Ações	</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $lista = $parameters['data']; ?>
                    <?php foreach ($lista as $empresa): ?>
                        <tr>

                            <td class="text-center"> <?php echo $empresa->getNome() ?> </td>
                            <td class="text-center"> <?php echo $empresa->getMunicipio() ?> </td>
                            <td class="text-center"> <?php echo $empresa->getContato() ?> </td>
                            <td class="text-center"> <?php echo $empresa->getCargo() ?> </td>
                            <td class="text-center"> <?php echo $empresa->getTel() ?> </td>
                            <td class="text-center"> <?php echo $empresa->getEmail() ?> </td>

                            <td class="text-center">

                                <div class="btn-group" role="group" aria-label="...">
                                    <?php if ($this->ezrbac->hasAccess(Utils::EDIT, 'cad_empresa_ct')) :?>
                                    <a href="<?php echo site_url('cad_empresa_ct/edita') . '?id=' . $empresa->getIdEmpresa() ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
                                    <?php endif;?>
                                    <!--  Botão de Excluir deletado para impedir que seja entrada e cause problema no sistema-->
                                    <!-- <?php if ($this->ezrbac->hasAccess(Utils::DELETE, 'cad_empresa_ct')) :?>
                                    <a  onclick="exclui(<?php echo $empresa->getIdEmpresa() ?>)" href="javascript:;" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Excluir</a>
                                    <?php endif;?> -->
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php geraPaginador($parameters[$modelClassName . "_paginador"], site_url($controllerClassName . '/index'), !empty($parameters[$modelClassName . "_filtros"]))?>
</div>


<div class="modal fade " id="filtroModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog" style="width: 750px">
      <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
             <h4 class="modal-title">Filtro de Empresa</h4>
         </div>

         <div class="modal-body">
             <?php echo $telaFiltro?>
         </div>
      </div>
   </div>
</div>

<!-- Botão de Excluir removido para impedir erro no banco de dados-->
<!-- <?php if ($this->ezrbac->hasAccess(Utils::DELETE, 'cad_empresa_ct')) :?>
<script>
function exclui(id) {
    bootbox.confirm("Tem certeza que deseja excluir o registro?", function(result) {
        if (result) {
            document.location.href = '<?php echo site_url('cad_empresa_ct/exclui') . '?id='?>' + id;
        }
    });
}
</script>
<?php endif;?> -->
