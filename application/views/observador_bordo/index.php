
<?php if ($mensagem): ?>    
    <div class="row">
        <div class="col-md-4 col-md-offset-4 alert alert-success alert-dismissible" role="alert" style="margin-top: 20px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            <p><strong>Sucesso!</strong><p> 
            <?php echo $mensagem?>    
        </div>
    </div>
<?php endif; ?>

<h2>Observador de Bordo</h2>

<div class="panel panel-sisalbatroz">
    <div class="panel-heading" style="height: 55px">
        <a href="<?php echo site_url('observadorbordo/novo') ?>" class="btn btn-add-sisalbatroz pull-right"><i class="glyphicon glyphicon-plus"></i> Adicionar</a>        
        <a class="btn btn-add-sisalbatroz pull-right" role="button" data-toggle="modal" data-target="#filtroModal" style="margin-right: 10px"><i class="glyphicon glyphicon-search"></i> Filtrar</a>
        
    </div>    
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Código</th>
                        <th class="text-center">Observador</th>
                        <th class="text-center">Embarcação</th>
                        <th class="text-center">Nome do Mestre</th>
                        <th class="text-center">Data de Saída</th>
                        <th class="text-center">Data de Retorno</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $lista = $parameters['data']; ?>
                    <?php foreach ($lista as $objeto): ?>
                        <tr>
                            <td class="text-center"> <?php echo $objeto->getId() ?> </td>
                            <td class="text-center"> <?php echo is_null($objeto->getObservador()) ? '' : $objeto->getObservador()->getNome() ?> </td>
                            <td class="text-center"> <?php echo $objeto->getEmbarcacao()->getNome() ?> </td>
                            <td class="text-center"> <?php echo $objeto->getMestre()->getNome() ?> </td>
                            <td class="text-center"> <?php echo is_null($objeto->getDataSaida()) ? '' : $objeto->getDataSaida()->format("d/m/Y") ?> </td>
                            <td class="text-center"> <?php echo is_null($objeto->getDataChegada()) ? '' : $objeto->getDataChegada()->format("d/m/Y") ?> </td>
                            <td class="text-center">

                                <div class="btn-group" role="group" aria-label="...">
                                    <a href="<?php echo site_url('observadorbordo/edita') . '?id=' . $objeto->getId() ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
                                    <a  onclick="exclui(<?php echo $objeto->getId() ?>)" href="javascript:;" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Excluir</a>
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
                <h4 class="modal-title">Filtro de Monitoramento a Bordo</h4>
            </div>

            <div class="modal-body">
                <?php echo $telaFiltro?>
            </div>
        </div>
    </div>
</div>




<script>
function exclui(id) {
    bootbox.confirm("Tem certeza que deseja excluir o registro?", function(result) {
        if (result) {
            document.location.href = '<?php echo site_url('observadorbordo/exclui') . '?id='?>' + id;
        }
    }); 
}
</script>