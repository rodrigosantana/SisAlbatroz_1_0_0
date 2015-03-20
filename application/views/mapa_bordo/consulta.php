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
    <div class="container">
        <div class="table-responsive">
            <h2>Mapas de Bordo</h2>
            <p>Listagem dos últimos 10 Mapas de Bordo digitados</p>
            <table class="table table-striped table-condensed table-hover">
        <thead>
        <tr>
            <th class="text-center">Código</th>
            <th class="text-center">Observador</th>
            <th class="text-center">Barco</th>
            <th class="text-center">Mestre</th>
            <th class="text-center">Data de Saída</th>
            <th class="text-center">Data de Chegada</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($mapas as $mapa_bordo): ?>
            <tr>
                <td class="text-center"> <?php echo $mapa_bordo->getIdMb()?> </td>
                <td class="text-center"> <?php echo $mapa_bordo->getObserv()?> </td>
                <td class="text-center"> <?php echo $mapa_bordo->getBarco()?> </td>
                <td class="text-center"> <?php echo $mapa_bordo->getMestre()?> </td>
                <td class="text-center"> <?php echo $mapa_bordo->getDataSaida()?> </td>
                <td class="text-center"> <?php echo $mapa_bordo->getDataChegada()?> </td>
                <td class="text-center">
                    <div class="btn-group" role="group" aria-label="...">
                        <a href="<?php echo base_url(); ?>index.php/marcact/edita?id_mb=<?php echo $mapa_bordo->getIdMb()?>" class="btn btn-default">Editar</a>
                    </div>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
        </div>
    </div>
</body>
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
