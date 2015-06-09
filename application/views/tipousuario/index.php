<?php if (isset($mensagem) && !empty($mensagem)): ?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 alert alert-success alert-dismissible" role="alert" style="margin-top: 20px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            <p><strong>Sucesso!</strong><p> 
                <?php echo $mensagem ?>
        </div>  
    </div>
<?php endif; ?>

<h2>Usuários</h2>

<div class="panel panel-sisalbatroz">
    <div class="panel-heading" style="height: 55px">
        <a href="<?php echo site_url('tipousuario/novo')?>" class="btn btn-add-sisalbatroz pull-right"><i class="glyphicon glyphicon-plus"></i> Adicionar</a>
    </div>    
    <div class="panel-body">
        <div class="table-responsive">


            <table class="table table-striped table-condensed table-hover">
                <thead>
                    <tr>
                        <th class="col-md-1"></th>
                        <th class="col-md-9">Nome</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $lista = $parameters['data']; ?>
                    <?php foreach ($lista as $objeto): ?>
                        <tr>
                            <td> </td>
                            <td> <?php echo $objeto->getRoleName() ?> </td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="...">
                                    <a href="<?php echo site_url('tipousuario/edita') . '?id=' . $objeto->getId() ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
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

<script>
function exclui(id) {
    bootbox.confirm("Tem certeza que deseja excluir o registro?", function(result) {
        if (result) {
            document.location.href = '<?php echo site_url('tipousuario/exclui') . '?id='?>' + id;
        }
    }); 
}
</script>
