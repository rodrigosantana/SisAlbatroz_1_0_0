
<?php if ($mensagem): ?>    
    <div class="row">
        <div class="col-md-4 col-md-offset-4 alert alert-success alert-dismissible" role="alert" style="margin-top: 20px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
            <p><strong>Sucesso!</strong><p> 
            <?php echo $mensagem?>    
        </div>
    </div>
<?php endif; ?>

<h2>Espécies</h2>

<div class="panel panel-sisalbatroz">
    <div class="panel-heading" style="height: 55px">
        <?php if ($this->ezrbac->hasAccess(Utils::CREATE, 'especie')) :?>
        <a href="<?php echo site_url('especie/novo') ?>" class="btn btn-add-sisalbatroz pull-right"><i class="glyphicon glyphicon-plus"></i> Adicionar</a>        
        <?php endif;?>
        <a class="btn btn-add-sisalbatroz pull-right" role="button" data-toggle="modal" data-target="#filtroModal" style="margin-right: 10px"><i class="glyphicon glyphicon-search"></i> Filtrar</a>
        
    </div>    
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Nome comum</th>
                        <th class="text-center">Nome comum em inglês</th>
                        <th class="text-center">Nome Científico</th>
                        <th class="text-center">Tipo</th>
                        
                        <th class="text-center">Ações	</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $lista = $parameters['data']; ?>
                    <?php foreach ($lista as $especie): ?>
                        <tr>
                            <?php //$especie = new Especies()?>
                            
                            <td class="text-center"> <?php echo $especie->getNomeComumBr() ?> </td>
                            <td class="text-center"> <?php echo $especie->getNomeComumEn() ?> </td>
                            <td class="text-center"> <?php echo $especie->getNomeCientifico() ?> </td>
                            <td class="text-center"> <?php echo get_class($especie) ?> </td>
                            
                            <td class="text-center">

                                <div class="btn-group" role="group" aria-label="...">
                                    <?php if ($this->ezrbac->hasAccess(Utils::EDIT, 'especie')) :?>
                                    <a href="<?php echo site_url('especie/edita') . '?id=' . $especie->getId() ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
                                    <?php endif;?>
                                        
                                    <?php if ($this->ezrbac->hasAccess(Utils::DELETE, 'especie')) :?>
                                    <a  onclick="exclui(<?php echo $especie->getId() ?>)" href="javascript:;" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Excluir</a>
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
                <h4 class="modal-title">Filtro de Mapa de Bordo</h4>
            </div>

            <div class="modal-body">
                <?php echo $telaFiltro?>
            </div>
        </div>
    </div>
</div>



<?php if ($this->ezrbac->hasAccess(Utils::DELETE, 'especie')) :?>
<script>
function exclui(id) {
    bootbox.confirm("Tem certeza que deseja excluir o registro?", function(result) {
        if (result) {
            document.location.href = '<?php echo site_url('especie/exclui') . '?id='?>' + id;
        }
    }); 
}
</script>
<?php endif;?>