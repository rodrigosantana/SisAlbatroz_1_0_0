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
        <a href="<?php echo site_url('usuario/novo')?>" class="btn btn-add-sisalbatroz pull-right"><i class="glyphicon glyphicon-plus"></i> Adicionar</a>
    </div>    
    <div class="panel-body">
        <div class="table-responsive">


            <table class="table table-striped table-condensed table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Ativo</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $lista = $parameters['data']; ?>
                    <?php foreach ($lista as $usuario): ?>
                        <tr>
                            <td class="text-center"> <?php echo $usuario->getName() ?> </td>
                            <td class="text-center"> <?php echo $usuario->getEmail() ?> </td>
                            <td class="text-center"> <?php echo $usuario->getStatus() > 0 ? 'Ativo' : 'Inativo' ?> </td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="...">
                                    <a href="<?php echo site_url('usuario/edita') . '?id=' . $usuario->getId() ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
                                    <a href="<?php echo site_url('usuario/ativa') . '?id=' . $usuario->getId() ?>" class="btn <?php echo $usuario->getStatus() > 0 ? 'btn-danger' : 'btn-success' ?>"><i class="glyphicon <?php echo $usuario->getStatus() > 0 ? 'glyphicon-remove' : 'glyphicon-ok' ?>"></i> <?php echo $usuario->getStatus() > 0 ? 'Desativar' : 'Ativar' ?></a>
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


