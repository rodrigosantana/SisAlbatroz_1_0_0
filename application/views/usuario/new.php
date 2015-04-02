<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-left titulo">Cadastro de Usuário</h2>
        </div>
    </div>



    <form class="form-horizontal" role="form" action="<?php echo site_url('usuario/salva'); ?>" method="post">
        <input type="hidden" id="id" name="id" value="<?php echo $usuario->getId()?>">

        <div class="panel panel-sisalbatroz">
            <div class="panel-heading"></div>    
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mestre" class="col-md-3 control-label">Nome *</label>
                            <div class="col-md-9 div-help">
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $usuario->getName() ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="apelido" class="col-md-3 control-label">Email *</label>
                            <div class="col-md-9 div-help">
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $usuario->getEmail(); ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telefone" class="col-md-3 control-label">Senha <?php if ($usuario->getId() == null) :?>*<?php endif;?></label>
                            <div class="col-md-9 div-help">
                                <input type="password" class="form-control" id="password" name="password" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12" style="margin-bottom: 20px">
            <button type="button" id="btnSub" name="btnSub" class="btn btn-primary btn-lg btn_sub" onclick="return validation('usuario', this)">Salvar</button>
            <a href="<?php echo site_url('usuario')?>" class="btn btn-default btn-lg btn_sub">Cancelar</a>
        </div>
    </form>
</div>