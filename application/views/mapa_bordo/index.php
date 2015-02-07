<!-- Definindo o tipo de arquivo que vai ser -->
<!DOCTYPE html PUBLIC>
<!-- Abre o arquivo html e define a linguagem padrão -->
<html lang="pt-br">
<!-- Cabeçalho que não aparece para o usuário -->
<head>
    <!-- Informações sobre o texto e caracteres -->
    <meta http-equiv="Content-type" content="text/hetml; charset=UTF-8">
    <title> Mapa de Bordo </title>
    <!-- carregando css, js e outros -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css"/>
    <script src="<?php echo base_url();?>assets/js/jquery-1.11.2.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>
</head>
<header id="header" class="masthead">
    <img src="<?php echo base_url();?>assets/img/banner.jpg" alt="banner">
</header>
<body>
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
                <li class="active"><a href="">Início</a></li>
                <li class="dropdown">
                    <a href="" data-toggle="dropdown" class="dropdown-toggle">Basilares <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Espécies</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Embarcações</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Mestres</a></li>
                    </ul>
                </li>
                <li><a href="">Mapa de Bordo</a></li>
                <li><a href="">Sair</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Código</th>
        <th>barco</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($mapas as $mapa_bordo): ?>
        <tr>
            <td> <?php echo $mapa_bordo->getId_mb()?> </td>
            <td> <?php echo $mapa_bordo->getBarco()?> </td>
            <td>
                <div class="btn-group" role="group" aria-label="...">
                    <a href="<?php echo base_url(); ?>index.php/marcact/exclui?id_mb=<?php echo $mapa_bordo->getId_mb()?>" class="btn btn-default">Excluir</a>
                </div>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>


<footer class="footer">
    <div class="container">
        <p class="text-muted">
            Projeto Albatroz -
            Base Regional de Santa Catarina -
            Itajaí - SC -
            Endereço: Universidade do Vale do Itajaí (Univali)
            Rua Uruguai, 458, bloco D6 - sala 145 - Centro
            CEP 88302-202 -
            Telefone: (13) 99753-5620 -
            Email: rsantana@projetoalbatroz.org.br
        </p>
    </div>
</footer>
</body>
</html>
