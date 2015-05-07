
<!-- Início do corpo da página -->

<?php if ($mensagem): ?>    
    <div class="col-md-4 col-md-offset-4 alert alert-success alert-dismissible" role="alert" style="margin-top: 20px">
        <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
        <p><strong>Sucesso!</strong><p> 
            Registro salvo com sucesso.
    </div>  
<?php endif; ?>

<div class="row">
    <div class="col-md-12">
        <h2 class="text-left titulo">Monitoramento a Bordo</h2>
    </div>
</div>

<form class="form-horizontal" role="form" action="<?php echo site_url('observadorbordo/salva'); ?>" method="post">
    <input type="hidden" id="id" name="id" value="<?php //echo $objeto->getId() ?>">

    <div class="panel panel-sisalbatroz">
        <div class="panel-heading"><span><b>Cadastro de viagens</b></span></div>    
        <div class="panel-body">
            <div id="field_manager_container" data-prototype="<?php echo htmlspecialchars($this->load->view("observador_bordo/producao_pesqueira", array(), true)); ?>">
            <div>
        </div>
    </div>

    <div class="col-sm-12 col-md-12" style="margin-bottom: 20px">
<!--        <button type="button" id="btnSub" name="btnSub" class="btn btn-primary btn-lg btn_sub" onclick="return validation('observadorbordo', this)">Salvar</button>
        <a href="<?php //echo site_url('observadorbordo')?>" class="btn btn-default btn-lg btn_sub">Cancelar</a>-->
    </div>
</form>




<script>
    $(document).ready(function() {
        var producaoField = new FieldManagement.Class({
            tableList: [
                {header:'Lance', field_id:'producao_lance'},
                {header:'Data', field_id:'producao_data'},
                {header:'Boia', field_id:'producao_boia'}
            ],
            urlValidation: URL + '/observadorbordo/validaproducaopesqueira'
        });
        

    });
</script>