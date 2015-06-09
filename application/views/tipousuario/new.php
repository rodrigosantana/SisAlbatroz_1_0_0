

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-left titulo">Cadastro de Tipo de Usuário</h2>
        </div>
    </div>



    <form class="form-horizontal" role="form" action="<?php echo site_url('tipousuario/salva'); ?>" method="post">
        <input type="hidden" id="id" name="id" value="<?php echo $tipoUsuario->getId() ?>">

        <div class="panel panel-sisalbatroz">
            <div class="panel-heading"></div>    
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mestre" class="col-md-3 control-label">Nome *</label>
                            <div class="col-md-9 div-help">
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $tipoUsuario->getRoleName() ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center titulo">Regras de acesso</h4>
                        <hr class="hr-sisalbatroz">

                        <div class="row">
                            <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12">    
                                <div class="table-responsive">
                                    <table class="table table-sisalbatroz">
                                        <thead>
                                            <tr>
                                                <th >Controller</th>
                                                <?php foreach ($accessmap as $access) :?>
                                                <th ><?php echo $access?></th>
                                                <?php endforeach;?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($controllers as $key => $controller): ?>                                    
                                            <tr>
                                                <?php $controllerAccess = isset($listControllerAccess[$key]) ? $listControllerAccess[$key] : array()?>
                                                <th scope="row" class="th-table-checkbox"><?php echo $controller?></th>
                                                <?php foreach ($accessmap as $keyAccess => $access) :?>
                                                <td><input type="checkbox" id="<?php echo $key?>" name="<?php echo $key?>[]" value="<?php echo $keyAccess;?>" <?php echo (isset($controllerAccess['access_' . $keyAccess]) && $controllerAccess['access_' . $keyAccess] === '1') ? 'checked' : ''?>></td>
                                                <?php endforeach;?>
                                            </tr>          

                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-sm-12 col-md-12" style="margin-bottom: 20px">
            <button type="button" id="btnSub" name="btnSub" class="btn btn-primary btn-lg btn_sub" onclick="return validation('tipousuario', this)">Salvar</button>
            <a href="<?php echo site_url('tipousuario') ?>" class="btn btn-default btn-lg btn_sub">Cancelar</a>
        </div>
    </form>
</div>