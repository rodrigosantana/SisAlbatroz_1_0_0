
<?php if ($mensagem): ?>    
    <div class="row">
        <div class="col-md-4 col-md-offset-4 alert alert-success alert-dismissible" role="alert" style="margin-top: 20px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            <p><strong>Sucesso!</strong><p> 
            <?php echo $mensagem?>    
        </div>
    </div>
<?php endif; ?>

<h2>Medicina da conservação</h2>

<div class="panel panel-sisalbatroz">
    <div class="panel-heading" style="height: 55px">
        <?php if ($this->ezrbac->hasAccess(Utils::CREATE, 'medicinaconservacao')) :?>
        <a href="<?php echo site_url('medicinaconservacao/novo') ?>" class="btn btn-add-sisalbatroz pull-right"><i class="glyphicon glyphicon-plus"></i> Adicionar</a>        
        <?php endif;?>
        <a class="btn btn-add-sisalbatroz pull-right" role="button" data-toggle="modal" data-target="#filtroModal" style="margin-right: 10px"><i class="glyphicon glyphicon-search"></i> Filtrar</a>
        
    </div>    
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Código</th>
                        <th class="text-center">Etiqueta</th>
                        <th class="text-center">Etiqueta Antiga</th>
                        <th class="text-center col-md-2">Espécie</th>
                        <th class="text-center">Responsável</th>
                        <th class="text-center">Data de Entrada</th>
                        <th class="text-center">Data de Captura</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $lista = $parameters['data']; ?>
                    <?php foreach ($lista as $objeto): ?>
                        <tr>
                            <td><?php echo $objeto->getId();?></td>
                            <td><?php echo $objeto->getEtiqueta();?></td>
                            <td><?php echo $objeto->getEtiquetaAntiga();?></td>
                            <td><?php echo is_null($objeto->getEspecie()) ? '' : $objeto->getEspecie()->__toString();?></td>
                            <td><?php echo $objeto->getResponsavel();?></td>
                            <td><?php echo is_null($objeto->getDataEntrada()) ? '' : $objeto->getDataEntrada()->format('d/m/y');?></td>
                            <td><?php echo is_null($objeto->getDataCaptura()) ? '' : $objeto->getDataCaptura()->format('d/m/y');?></td>
                            <td>
                            <div class="btn-group" role="group" aria-label="...">
                                <?php if ($this->ezrbac->hasAccess(Utils::EDIT, 'medicinaconservacao')) :?>
                                <a href="<?php echo site_url('medicinaconservacao/edita') . '?id=' . $objeto->getId() ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
                                <?php endif;?>

                                <?php if ($this->ezrbac->hasAccess(Utils::DELETE, 'medicinaconservacao')) :?>
                                <a  onclick="exclui(<?php echo $objeto->getId() ?>)" href="javascript:;" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Excluir</a>
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
                <h4 class="modal-title">Filtro de Medicina da Conservação</h4>
            </div>

            <div class="modal-body">
                <?php echo $telaFiltro?>
            </div>
        </div>
    </div>
</div>




<script>
<?php if ($this->ezrbac->hasAccess(Utils::DELETE, 'medicinaconservacao')) :?>
function exclui(id) {
    bootbox.confirm("Tem certeza que deseja excluir o registro?", function(result) {
        if (result) {
            document.location.href = '<?php echo site_url('medicinaconservacao/exclui') . '?id='?>' + id;
        }
    }); 
}
<?php endif;?>
</script>