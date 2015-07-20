<form class="form-horizontal" role="form" action="<?php echo site_url('cad_mestre_ct/filter'); ?>" method="post">

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nome" class="col-md-4 control-label">Nome</label>
                <div class="col-md-8 div-help">
                    <input type="text" class="form-control" id="nome" name="nome" maxlength="100" value="<?php echo isset($filtro['nome']) ? $filtro['nome'] : '' ?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="nome_us" class="col-md-4 control-label">Apelido</label>
                <div class="col-md-8 div-help">
                    <input type="text" class="form-control" id="apelido" name="apelido" maxlength="100" value="<?php echo isset($filtro['apelido']) ? $filtro['apelido'] : '' ?>">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="spp" class="col-md-4 control-label">Telefone</label>
                <div class="col-md-8 div-help">
                    <input type="text" class="form-control" id="telefone" name="telefone" maxlength="100" value="<?php echo isset($filtro['telefone']) ? $filtro['telefone'] : '' ?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="spp" class="col-md-4 control-label">E-mail</label>
                <div class="col-md-8 div-help">
                    <input type="text" class="form-control" id="email" name="email" maxlength="100" value="<?php echo isset($filtro['email']) ? $filtro['email'] : '' ?>">
                </div>
            </div>
        </div>


    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo site_url('cad_mestre_ct/clearfilter')?>" class="btn btn-default btn_sub pull-right">Limpar filtro</a>
            <button type="submit" id="btnSub" name="btnSub" class="btn btn-primary btn_sub pull-right" onclick="" style="margin-right: 10px">Filtrar</button>
        </div>
    </div>
</form>
