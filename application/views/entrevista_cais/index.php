
<?php if ($mensagem): ?>    
    <div class="row">
        <div class="col-md-4 col-md-offset-4 alert alert-success alert-dismissible" role="alert" style="margin-top: 20px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            <p><strong>Sucesso!</strong><p> 
            <?php echo $mensagem?>    
        </div>
    </div>
<?php endif; ?>

<h2>Entrevistas de Cais</h2>

<div class="panel panel-sisalbatroz">
    <div class="panel-heading" style="height: 55px">
        <?php if ($this->ezrbac->hasAccess(Utils::CREATE, 'entrevistacaisct')) :?>
        <a href="<?php echo site_url('entrevistacaisct/novo') ?>" class="btn btn-add-sisalbatroz pull-right"><i class="glyphicon glyphicon-plus"></i> Adicionar</a>        
        <?php endif;?>
        <a class="btn btn-add-sisalbatroz pull-right" role="button" data-toggle="modal" data-target="#filtroModal" style="margin-right: 10px"><i class="glyphicon glyphicon-search"></i> Filtrar</a>
        
    </div>    
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Código</th>
                        <th class="text-center">Responsável de campo</th>
                        <th class="text-center">Data</th>
                        <th class="text-center">Embarcação</th>
                        <th class="text-center">Porto de saída</th>
                        <th class="text-center">Data de Saída</th>
                        <th class="text-center">Data de Chegada</th>
                        <th class="text-center">Ações	</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $lista = $parameters['data']; ?>
                    <?php foreach ($lista as $entrevista): ?>
                        <tr>
                            <td class="text-center"> <?php echo $entrevista->getId() ?> </td>
                            <td class="text-center"> <?php echo is_null($entrevista->getResponsavelCampo()) ? '' : $entrevista->getResponsavelCampo()->getName() ?> </td>
                            <td class="text-center"> <?php echo is_null($entrevista->getData()) ? '' : $entrevista->getData()->format("d/m/Y") ?> </td>
                            <td class="text-center"> <?php echo $entrevista->getEmbarcacao()->getNome() ?> </td>
                            <td class="text-center"> <?php echo is_null($entrevista->getPortoSaida()) ? '' : $entrevista->getPortoSaida()->getNome() ?> </td>
                            <td class="text-center"> <?php echo is_null($entrevista->getDataSaida()) ? '' : $entrevista->getDataSaida()->format("d/m/Y") ?> </td>
                            <td class="text-center"> <?php echo is_null($entrevista->getDataChegada()) ? '' : $entrevista->getDataChegada()->format("d/m/Y") ?> </td>
                            <td class="text-center">

                                <div class="btn-group" role="group" aria-label="...">
                                    <?php if ($this->ezrbac->hasAccess(Utils::EDIT, 'entrevistacaisct')) :?>
                                        <a href="<?php echo site_url('entrevistacaisct/edita') . '?id=' . $entrevista->getId() ?>" class="btn btn-primary" title="Editar" style="font-size: 18px;"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <?php endif;?>
                                        
                                    <?php if ($this->ezrbac->hasAccess(Utils::VIEW, 'entrevistacaisct')) :?>
                                        <a href="<?php echo site_url('entrevistacaisct/visualiza') . '?id=' . $entrevista->getId() ?>" href="javascript:;" class="btn btn-primary" title="Visualizar" style="font-size: 18px;"><i class="glyphicon glyphicon-eye-open"></i></a>
                                    <?php endif;?>
                                    
                                    <?php if ($this->ezrbac->hasAccess(Utils::DELETE, 'entrevistacaisct')) :?>
                                        <a  onclick="exclui(<?php echo $entrevista->getId() ?>)" href="javascript:;" class="btn btn-danger" title="Excluir" style="font-size: 18px;"><i class="glyphicon glyphicon-trash"></i></a>
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
                <h4 class="modal-title">Filtro de Entrevista de Cais</h4>
            </div>

            <div class="modal-body">
                <?php echo $telaFiltro?>
            </div>
        </div>
    </div>
</div>



<?php if ($this->ezrbac->hasAccess(Utils::DELETE, 'entrevistacaisct')) :?>
<script>
function exclui(id) {
    bootbox.confirm("Tem certeza que deseja excluir o registro?", function(result) {
        if (result) {
            document.location.href = '<?php echo site_url('entrevistacaisct/exclui') . '?id='?>' + id;
        }
    }); 
}
</script>
<?php endif;?>