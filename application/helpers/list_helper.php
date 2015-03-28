<?php

/**
 * Monta o paginador nas telas de listagem.
 * 
 * @param array $paginador Lista de valores necessários para montar o paginador.
 * @param string $url URL para acessar as páginas.
 * @param boolean $filtroAtivo Informa que o filtro foi utilizado para mostrar a mensagem ao lado do paginador.
 * 
 * @return string Retorna o HTML do paginador.
 */
function geraPaginador($paginador, $url, $filtroAtivo = false) {
    $html = '';

    $html .= '<div class="row" style="margin-right: 0px; margin-left: 0px;">';
//    $html .= '<div class="col-md-5 col-sm-12">';
//    $html .= '<div class="dataTables_info" id="sample_1_info">';
//    $html .= i18n('mostrando') . ' ' . $paginador['qtd_registro_inicial'] . ' à ' . $paginador['qtd_registro_final'] . ' de ' . $paginador['total_registro'] . ' ' . i18n("registros") . '. ';
//
//    if ($filtroAtivo) {
//        $html .= '<small>' . i18n("filtro_ativo_clique") . ' <a href="'.$url.'" onclick="limpaFiltro(\'' . $url . '\')"> ' . i18n("aqui") . ' </a> ' . i18n("para_limpar") . '.</small>';
//    }
//
//    $html .= '</div>';
//    $html .= '</div>';
    $html .= '<div class="col-md-12">';
    $html .= '<div class="dataTables_paginate paging_bootstrap pull-right">';
    $html .= '<ul class="pagination" style="visibility: visible;">';

    if ($paginador['total_pagina'] > 5) {
        $html .= '<li class="next"><a style="font-size: 20px;" href="'.$url.'?page=1" title="Primeira página"><i class="fa fa-chevron-left"></i></a></li>';
    }

    if ($paginador['anterior'] == null) {
        $html .= '<li class="prev disabled"><a style="font-size: 20px;" href="#" title="Anterior"><i class="fa fa-angle-double-left"></i></a></li>';
    } else {
        $html .= '<li class="prev"><a style="font-size: 20px;" href="'.$url.'?page='.$paginador['anterior'].'" title="Anterior"><i class="fa fa-angle-double-left"></i></a></li>';
    }

    if (($paginador['pagina_atual'] - 1) < 1) {
        $html .= '<li class="prev disabled"><a style="font-size: 20px;" href="#" title="Página anterior"><i class="fa fa-angle-left"></i></a></li>';
    } else {
        $html .= '<li class="prev"><a style="font-size: 20px;" href="'.$url.'?page='.($paginador['pagina_atual'] - 1).'" title="Página anterior"><i class="fa fa-angle-left"></i></a></li>';
    }

    if ($paginador['qtd_paginador_inicial'] > 0) {
        for ($i = $paginador['qtd_paginador_inicial']; $i <= $paginador['qtd_paginador_final']; $i++) {
            if ($paginador['pagina_atual'] == $i) {
                $html .= '<li class="active"><a href="'.$url.'">' . $i . '</a></li>';
                continue;
            }
            $html .= '<li><a href="'.$url.'?page='.$i.'">' . $i . '</a></li>';
        }
    }

    if (($paginador['pagina_atual'] + 1) > $paginador['total_pagina']) {
        $html .= '<li class="next disabled"><a style="font-size: 20px;" href="#" title="Próxima página"><i class="fa fa-angle-right"></i></a></li>';
    } else {
        $html .= '<li class="next"><a style="font-size: 20px;" href="'.$url.'?page='.($paginador['pagina_atual'] + 1).'" title="Próxima página"><i class="fa fa-angle-right"></i></a></li>';
    }

    if ($paginador['proximo'] == null) {
        $html .= '<li class="next disabled"><a style="font-size: 20px;" href="'.$url.'" title="Próximo"><i class="fa fa-angle-double-right"></i></a></li>';
    } else {
        $html .= '<li class="next"><a style="font-size: 20px;" href="'.$url.'?page='.$paginador['proximo'].'" title="Próximo"><i class="fa fa-angle-double-right"></i></a></li>';
    }

    if ($paginador['total_pagina'] > 5) {
        $html .= '<li class="next"><a style="font-size: 20px;" href="'.$url.'?page='.$paginador['total_pagina'].'" title="Última"><i class="fa fa-chevron-right"></i></a></li>';
    }

    $html .= '</ul>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';

    echo $html;
}
