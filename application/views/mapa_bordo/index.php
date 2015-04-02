
<?php if ($mensagem): ?>    
    <div class="row">
        <div class="col-md-4 col-md-offset-4 alert alert-success alert-dismissible" role="alert" style="margin-top: 20px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            <p><strong>Sucesso!</strong><p> 
                Registro excluído com sucesso.
        </div>
    </div>
<?php endif; ?>

<h2>Mapas de Bordo</h2>

<div class="panel panel-sisalbatroz">
    <div class="panel-heading" style="height: 55px">
        <a href="<?php echo site_url('mapa_bordo_ct/novo') ?>" class="btn btn-add-sisalbatroz pull-right"><i class="glyphicon glyphicon-plus"></i> Adicionar</a>
    </div>    
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Código</th>
                        <th class="text-center">Entrevistador</th>
                        <th class="text-center">Embarcação</th>
                        <th class="text-center">Mestre</th>
                        <th class="text-center">Data de Saída</th>
                        <th class="text-center">Data de Chegada</th>
                        <th class="text-center">Ações	</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $lista = $parameters['data']; ?>
                    <?php foreach ($lista as $mapa_bordo): ?>
                        <tr>
                            <td class="text-center"> <?php echo $mapa_bordo->getIdMb() ?> </td>
                            <td class="text-center"> <?php echo is_null($mapa_bordo->getEntrevistador()) ? '' : $mapa_bordo->getEntrevistador()->getNome() ?> </td>
                            <td class="text-center"> <?php echo $mapa_bordo->getEmbarcacao()->getNome() ?> </td>
                            <td class="text-center"> <?php echo $mapa_bordo->getMestre()->getNome() ?> </td>
                            <td class="text-center"> <?php echo is_null($mapa_bordo->getDataSaida()) ? '' : $mapa_bordo->getDataSaida()->format("d/m/Y") ?> </td>
                            <td class="text-center"> <?php echo is_null($mapa_bordo->getDataChegada()) ? '' : $mapa_bordo->getDataChegada()->format("d/m/Y") ?> </td>
                            <td class="text-center">

                                <div class="btn-group" role="group" aria-label="...">
                                    <a href="<?php echo site_url('mapa_bordo_ct/edita') . '?id=' . $mapa_bordo->getIdMb() ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
                                    <a  onclick="exclui(<?php echo $mapa_bordo->getIdMb() ?>)" href="javascript:;" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Excluir</a>
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

<script>
function exclui(id) {
    bootbox.confirm("Tem certeza que deseja excluir o registro?", function(result) {
        if (result) {
            document.location.href = '<?php echo site_url('mapa_bordo_ct/exclui') . '?id='?>' + id;
        }
    }); 
}
</script>