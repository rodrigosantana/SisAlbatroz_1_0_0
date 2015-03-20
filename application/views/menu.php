<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://www.projetoalbatroz.org.br">
                Projeto Albatroz
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo base_url();?>sistema.php">Início</a></li>
                <li class="dropdown">
                    <a href="" data-toggle="dropdown" class="dropdown-toggle">Basilares <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>index.php/cad_ave_ct/cadave">Espécies</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>index.php/cad_barco_ct/cadbarco">Embarcações</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>index.php/cad_mestre_ct/cadmestre">Mestres</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>index.php/cad_empresa_ct/cadempresa">Empresas</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>index.php/cad_observ_ct/cadobserv">Observadores</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="" data-toggle="dropdown" class="dropdown-toggle">Mapa de Bordo <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>index.php/mapa_bordo_ct/consulta">Consulta</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>index.php/mapa_bordo_ct/novo">Cadastro</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo base_url();?>index.php">Sair</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>