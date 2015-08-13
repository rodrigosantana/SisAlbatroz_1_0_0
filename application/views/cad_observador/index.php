
<?php if ($mensagem): ?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 alert alert-success alert-dismissible" role="alert" style="margin-top: 20px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            <p><strong>Sucesso!</strong><p>
            <?php echo $mensagem?>
        </div>
    </div>
<?php endif; ?>

<h2>Observadores de Bordo</h2>

<div class="panel panel-sisalbatroz">
    <div class="panel-heading" style="height: 55px">
        <?php if ($this->ezrbac->hasAccess(Utils::VIEW, 'cad_observ_ct')) :?>
        <a href="<?php echo site_url('cad_observ_ct/novo') ?>" class="btn btn-add-sisalbatroz pull-right"><i class="glyphicon glyphicon-plus"></i> Adicionar</a>
        <?php endif;?>
        <a class="btn btn-add-sisalbatroz pull-right" role="button" data-toggle="modal" data-target="#filtroModal" style="margin-right: 10px"><i class="glyphicon glyphicon-search"></i> Filtrar</a>
    </div>

    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Nome</th>
                        <th class="text-center">E-mail</th>
                        <th class="text-center">Telefone</th>
                        <th class="text-center">Skype</th>
                        <th class="text-center">Município</th>

                        <th class="text-center">Ações	</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $lista = $parameters['data']; ?>
                    <?php foreach ($lista as $observador): ?>
                        <tr>
                            <td class="text-center"> <?php echo $observador->getNome() ?> </td>
                            <td class="text-center"> <?php echo $observador->getEmail() ?> </td>
                            <td class="text-center"> <?php echo $observador->getTelefone() ?> </td>
                            <td class="text-center"> <?php echo $observador->getSkype() ?> </td>
                            <td class="text-center"> <?php echo $observador->getMunicipio() ?> </td>

                            <td class="text-center">

                                <div class="btn-group" role="group" aria-label="...">
                                    <?php if ($this->ezrbac->hasAccess(Utils::EDIT, 'cad_observ_ct')) :?>
                                    <a href="<?php echo site_url('cad_observ_ct/edita') . '?idObserv=' . $observador->getIdObserv() ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
                                    <?php endif;?>
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
             <h4 class="modal-title">Filtro de Observadores</h4>
         </div>

         <div class="modal-body">
             <?php echo $telaFiltro?>
         </div>
      </div>
   </div>
</div>
