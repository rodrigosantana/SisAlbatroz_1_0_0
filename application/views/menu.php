<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://www.projetoalbatroz.org.br">Projeto Albatroz</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo site_url();?>">Início</a></li>

                <li class="dropdown">
                    <a href="" data-toggle="dropdown" class="dropdown-toggle">Basilares <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                        <?php if ($this->ezrbac->hasAccess(Utils::VIEW, 'especie')) :?>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('especie');?>">Espécies</a></li>
                        <?php endif;?>

                        <?php if ($this->ezrbac->hasAccess(Utils::CREATE, 'cad_embarcacao_ct')) :?>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('cad_embarcacao_ct/cadembarcacao');?>">Embarcações</a></li>
                        <?php endif;?>

                        <?php if ($this->ezrbac->hasAccess(Utils::CREATE, 'cad_mestre_ct')) :?>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('cad_mestre_ct');?>">Mestres</a></li>
                        <?php endif;?>

                        <?php if ($this->ezrbac->hasAccess(Utils::CREATE, 'cad_empresa_ct')) :?>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('cad_empresa_ct/cadempresa');?>">Empresas</a></li>
                        <?php endif;?>

                        <?php if ($this->ezrbac->hasAccess(Utils::CREATE, 'cad_observ_ct')) :?>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('cad_observ_ct/cadobserv');?>">Observadores</a></li>
                        <?php endif;?>

                        <?php if ($this->ezrbac->hasAccess(Utils::CREATE, 'usuario')) :?>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('usuario');?>">Usuário</a></li>
                        <?php endif;?>

                        <?php if ($this->ezrbac->hasAccess(Utils::CREATE, 'tipousuario')) :?>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('tipousuario');?>">Tipo de Usuário</a></li>
                        <?php endif;?>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="" data-toggle="dropdown" class="dropdown-toggle">Mapa de Bordo <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                        <?php if ($this->ezrbac->hasAccess(Utils::VIEW, 'mapa_bordo_ct')) :?>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('mapa_bordo_ct');?>">Consulta</a></li>
                        <?php endif;?>

                        <?php if ($this->ezrbac->hasAccess(Utils::CREATE, 'mapa_bordo_ct')) :?>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('mapa_bordo_ct/novo');?>">Cadastro</a></li>
                        <?php endif;?>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="" data-toggle="dropdown" class="dropdown-toggle">Observador de Bordo <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                        <?php if ($this->ezrbac->hasAccess(Utils::VIEW, 'observadorbordo')) :?>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('observadorbordo');?>">Consulta</a></li>
                        <?php endif;?>

                        <?php if ($this->ezrbac->hasAccess(Utils::CREATE, 'observadorbordo')) :?>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('observadorbordo/novo');?>">Cadastro</a></li>
                        <?php endif;?>
                    </ul>
                </li>


                <li class="dropdown">
                    <a href="" data-toggle="dropdown" class="dropdown-toggle">Medicina da Conservação<b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                        <?php if ($this->ezrbac->hasAccess(Utils::VIEW, 'medicinaconservacao')) :?>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('medicinaconservacao');?>">Consulta</a></li>
                        <?php endif;?>

                        <?php if ($this->ezrbac->hasAccess(Utils::CREATE, 'medicinaconservacao')) :?>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('medicinaconservacao/novo');?>">Cadastro</a></li>
                        <?php endif;?>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li><a href="<?php echo site_url('sistema_ct/index/rbac/logout');?>">Sair</a></li>
            </ul>
        </div><!--/.nav-collapse -->



    </div>
</div>
