<?php

class Mapa extends MY_Controller {

    public function __construct() {        
        $this->viewPath = 'mapa';        

        parent::__construct();
    }
    
    public function access_map() {
        return array(
            'index'=>'view',
            'getdata'=>'view'
            );

    }
    
    public function index() {
        
//        
//        $conn = $this->doctrine->em->getConnection();
//                    $sql = "SELECT
//                                '{'||
//                                '\"type\":\"Feature\",'||
//                                '\"id\":'||mb_lance.mb_geral||','||
//
//                                '\"geometry\":'||ST_AsGeoJSON(mb_lance.coordenada)||','||
//                                '\"properties\":{\"content\":\"<h3>Mapa de Bordo change_url</h3><strong>Código:</strong> '||mb_lance.mb_geral||'<br><strong>Embarcação:</strong> '||cad_embarcacao.nome||'<br><strong>Mestre:</strong> '||cad_mestre.nome||'<br><strong>Petrecho:</strong> '||(case  when mb_geral.petrecho = 1 then 'Espinhel de Superfície' when mb_geral.petrecho = 2 then 'Espinhel de Fundo' end )||'<br><strong>Lançamento #'||mb_lance.lance||':</strong> Latitude: '||st_y(mb_lance.coordenada)||' Longitude: '||st_x(mb_lance.coordenada)||'<br><strong>Aves capturadas:</strong><br>'||(select(array_to_string(array(SELECT especie.nome_cientifico || ' ('|| especie.nome_comum_br ||')' FROM mb_captura LEFT JOIN especie on especie.id = mb_captura.id_ave WHERE mb_captura.id_lance = mb_lance.id_lance AND mb_captura.id_ave IS NOT NULL), '<br>')))||'\"},'||
//                                
//                                '}' AS json
//
//
//                            FROM
//                                    mb_lance	     
//                            LEFT JOIN mb_geral on mb_geral.id_mb = mb_lance.mb_geral
//                            LEFT JOIN cad_embarcacao on cad_embarcacao.id_embarcacao = mb_geral.embarcacao
//                            LEFT JOIN cad_mestre ON cad_mestre.id_mestre = mb_geral.mestre
//                            WHERE mb_lance.coordenada IS NOT NULL AND (SELECT count(*) FROM mb_captura WHERE mb_captura.id_lance = mb_lance.id_lance) > 0";
//                    
//                    
//                    
//                         
//                                        
//                    
//                    
//                    
//                    
//                    
//                    
//                    
//                    
//                    
//                    
//                    
//                    
//                    
//                    
//                    
//                    
//                    
//                    
//                    
//                    
//                    
//                    
//
//                    
//                    $stmt = $conn->executeQuery($sql);
//                    
//                    $stmt->execute();
//        
//                    while ( $row = $stmt->fetch(\PDO::FETCH_ASSOC) ) {
//                        $s = html_escape($row["json"]);
//                        echo '"' . $s . '"<br><br><br>';
//                        
//                        var_dump(json_decode('"' . $s . '"', true ));die;
////                        var_dump(json_decode('"' . $s . '"', true ));die;
//                    }
//        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

//        $list = $this->doctrine->em->getRepository('MbGeral')->findAll();
//        $retorno = array(
//            'type'=>'FeatureCollection',
//            'crs'=> array(
//                'type'=>'name',
//                'properties'=> array('name'=>'EPSG:4326')      
//            ),
//            'features'=>array()
//        );
//        
//        //'properties'=> array('name'=>'EPSG:4326')
//        
//        foreach ($list as $value) {
//            $retorno['features'] = array_merge($retorno['features'], $value->jsonMap());
//        }
//        array('points'=>  json_encode($retorno))
        
        
        $this->load->view($this->viewPath . '/index.php');
    }
    
    public function getdata() {
        $retorno = array();
        
        if ($this->input->post('data')) {
            $data = explode(',', $this->input->post('data'));
            $conn = $this->doctrine->em->getConnection();
            
            foreach ($data as $value) {
                if ($value == 'mapa_bordo') {
                    
                    $url = $this->ezrbac->hasAccess(Utils::VIEW, 'mapa_bordo_ct') ? site_url('mapa_bordo_ct/visualiza') : '';
                    
                    $sql = "SELECT '{\"type\":\"Feature\",\"id\":\"mapa_bordo_'||mb_lance.mb_geral||'_'||mb_lance.id_lance||'\",\"geometry\":'||ST_AsGeoJSON(mb_lance.coordenada)||',\"properties\":{\"content\":\"'||
                                '<h3>Mapa de Bordo  <a href=''$url?id='||mb_lance.mb_geral||''' title=''Visualizar'' style=''font-size: 18px;'' target=''_blank''><i class=''glyphicon glyphicon-eye-open''></i></a></h3>'||
                                '<strong>Código:</strong> '||mb_lance.mb_geral||'<br>'||
                                '<strong>Embarcação:</strong> '||cad_embarcacao.nome||'<br>'||
                                '<strong>Mestre:</strong> '||cad_mestre.nome||'<br>'||
                                '<strong>Petrecho:</strong> '||(case  when mb_geral.petrecho = 1 then 'Espinhel de Superfície' when mb_geral.petrecho = 2 then 'Espinhel de Fundo' end )||'<br>'||
                                '<strong>Lançamento #'||mb_lance.lance||':</strong> Latitude: '||st_y(mb_lance.coordenada)||' Longitude: '||st_x(mb_lance.coordenada)||'<br>'||
                                '\"}}' 
                                 AS json
                            FROM
                                    mb_lance	     
                            LEFT JOIN mb_geral on mb_geral.id_mb = mb_lance.mb_geral
                            LEFT JOIN cad_embarcacao on cad_embarcacao.id_embarcacao = mb_geral.embarcacao
                            LEFT JOIN cad_mestre ON cad_mestre.id_mestre = mb_geral.mestre
                            WHERE mb_lance.coordenada IS NOT NULL AND (SELECT count(*) FROM mb_captura WHERE mb_captura.id_lance = mb_lance.id_lance) = 0";
                    
                    
                    $stmt = $conn->executeQuery($sql);                    
                    $stmt->execute();                    
                    $retorno = $this->getDataFromSQL($stmt, $value);
                    
                } else if ($value == 'mapa_bordo_captura') {                   
                    
                    $url = $this->ezrbac->hasAccess(Utils::VIEW, 'mapa_bordo_ct') ? site_url('mapa_bordo_ct/visualiza') : '';
                    
                    $sql = "SELECT '{\"type\":\"Feature\",\"id\":\"mapa_bordo_captura'||mb_lance.mb_geral||'_'||mb_lance.id_lance||'\",\"geometry\":'||ST_AsGeoJSON(mb_lance.coordenada)||',\"properties\":{\"content\":\"'||
                                '<h3>Mapa de Bordo - Captura <a href=''$url?id='||mb_lance.mb_geral||''' title=''Visualizar'' style=''font-size: 18px;'' target=''_blank''><i class=''glyphicon glyphicon-eye-open''></i></a></h3>'||
                                '<strong>Código:</strong> '||mb_lance.mb_geral||'<br>'||
                                '<strong>Embarcação:</strong> '||cad_embarcacao.nome||'<br>'||
                                '<strong>Mestre:</strong> '||cad_mestre.nome||'<br>'||
                                '<strong>Petrecho:</strong> '||(case  when mb_geral.petrecho = 1 then 'Espinhel de Superfície' when mb_geral.petrecho = 2 then 'Espinhel de Fundo' end )||'<br>'||
                                '<strong>Lançamento #'||mb_lance.lance||':</strong> Latitude: '||st_y(mb_lance.coordenada)||' Longitude: '||st_x(mb_lance.coordenada)||'<br>'||
                                '<strong>Aves capturadas:</strong><br>'||
                                (
                                    select(array_to_string(array(
                                        SELECT 
                                            '<smal style=''font-size: 13px;''><i>'||especie.nome_cientifico|| '</i>' || ' ('|| especie.nome_comum_br ||')</smal>' 
                                        FROM 
                                            mb_captura 
                                        LEFT JOIN 
                                            especie on especie.id = mb_captura.id_ave
                                        WHERE 
                                            mb_captura.id_lance = mb_lance.id_lance 
                                        AND 
                                        mb_captura.id_ave IS NOT NULL

                                    ), '<br>'))
                                )
                                ||'\"}}' 
                                 AS json
                            FROM
                                    mb_lance	     
                            LEFT JOIN mb_geral on mb_geral.id_mb = mb_lance.mb_geral
                            LEFT JOIN cad_embarcacao on cad_embarcacao.id_embarcacao = mb_geral.embarcacao
                            LEFT JOIN cad_mestre ON cad_mestre.id_mestre = mb_geral.mestre
                            WHERE mb_lance.coordenada IS NOT NULL AND (SELECT count(*) FROM mb_captura WHERE mb_captura.id_lance = mb_lance.id_lance) > 0";
                    
                    
                    $stmt = $conn->executeQuery($sql);                    
                    $stmt->execute();                    
                    $retorno = $this->getDataFromSQL($stmt, $value);
                    
                    
                    //$retorno[] = array('type'=>'mapa_bordo', 'data'=>$this->getGeoJsonData('MbGeral', $url));                    
                } else if ($value == 'observador_bordo') {            
                    $url = $this->ezrbac->hasAccess(Utils::VIEW, 'observadorbordo') ? site_url('observadorbordo/visualiza') : '';
                    
                    $sql = "SELECT
                                '{\"type\":\"Feature\",\"id\":\"observador_bordo_'||dados_abioticos.cruzeiro||'_'||dados_abioticos.id||'\",\"geometry\":'||ST_AsGeoJSON(dados_abioticos_complementar.coordenada_inicio)||',\"properties\":{\"content\":\"'||
                                '<h3>Observador de Bordo  <a href=''$url?id='||dados_abioticos.cruzeiro||''' title=''Visualizar'' style=''font-size: 18px;'' target=''_blank''><i class=''glyphicon glyphicon-eye-open''></i></a></h3>'||
                                '<strong>Código:</strong> '||dados_abioticos.cruzeiro||'<br>'||
                                '<strong>Observador:</strong> '||cad_observador.nome||'<br>'||
                                '<strong>Embarcação:</strong> '||cad_embarcacao.nome||'<br>'||
                                '<strong>Lançamento #'||dados_abioticos.lance||':</strong> Latitude: '||st_y(dados_abioticos_complementar.coordenada_inicio)||' Longitude: '||st_x(dados_abioticos_complementar.coordenada_inicio)||'<br>'||
                                '\"}}' 
                                 AS json

                        FROM dados_abioticos
                        LEFT JOIN cruzeiro ON cruzeiro.id = dados_abioticos.cruzeiro 
                        LEFT JOIN cad_embarcacao ON cad_embarcacao.id_embarcacao = cruzeiro.embarcacao
                        LEFT JOIN cad_observador ON cad_observador.id_observ = cruzeiro.observador
                        LEFT JOIN dados_abioticos_complementar ON dados_abioticos_complementar.id = dados_abioticos.dado_lancamento
                        WHERE dados_abioticos_complementar.coordenada_inicio IS NOT null";
                    
                    $stmt = $conn->executeQuery($sql);                    
                    $stmt->execute();                    
                    $retorno = $this->getDataFromSQL($stmt, $value);
                    
//                    $retorno[] = array('type'=>'observador_bordo', 'data'=>$this->getGeoJsonData('Cruzeiro', $url));
                } else if ($value == 'observador_bordo_captura') {
                    $url = $this->ezrbac->hasAccess(Utils::VIEW, 'observadorbordo') ? site_url('observadorbordo/visualiza') : '';
                    
                    $sql = "SELECT
                            '{\"type\":\"Feature\",\"id\":\"observador_bordo_captura_'||captura_incidental.cruzeiro||'_'||captura_incidental.id||'\",\"geometry\":'||ST_AsGeoJSON(captura_incidental.coordenada)||',\"properties\":{\"content\":\"'||
                            '<h3>Observador de Bordo - Captura  <a href=''$url?id='||captura_incidental.cruzeiro||''' title=''Visualizar'' style=''font-size: 18px;'' target=''_blank''><i class=''glyphicon glyphicon-eye-open''></i></a></h3>'||
                            '<strong>Código:</strong> '||captura_incidental.cruzeiro||'<br>'||
                            '<strong>Observador:</strong> '||cad_observador.nome||'<br>'||
                            '<strong>Embarcação:</strong> '||cad_embarcacao.nome||'<br>'||
                            '<strong>Lançamento #'||dados_abioticos.lance||':</strong> Latitude: '||st_y(captura_incidental.coordenada)||' Longitude: '||st_x(captura_incidental.coordenada)||'<br>'||
                            
                            (
                                select(array_to_string(array(
                                    SELECT 
                                        '<smal style=''font-size: 13px;''><i>'||especie.nome_cientifico|| '</i>' || ' ('|| especie.nome_comum_br ||')</smal>' 
                                    FROM 
                                        captura_incidental_especie 
                                    LEFT JOIN 
                                        especie on especie.id = captura_incidental_especie.especie
                                    WHERE 
                                        captura_incidental_especie.captura_incidental = captura_incidental.id 
                                    AND 
                                    captura_incidental_especie.especie IS NOT NULL

                                ), '<br>'))
                            )

                            ||'\"}}' 
                             AS json

                    FROM captura_incidental
                    LEFT JOIN cruzeiro ON cruzeiro.id = captura_incidental.cruzeiro 
                    LEFT JOIN cad_embarcacao ON cad_embarcacao.id_embarcacao = cruzeiro.embarcacao
                    LEFT JOIN cad_observador ON cad_observador.id_observ = cruzeiro.observador
                    LEFT JOIN dados_abioticos ON dados_abioticos.id = captura_incidental.lance
                    WHERE captura_incidental.coordenada IS NOT null";
                    
                    $stmt = $conn->executeQuery($sql);                    
                    $stmt->execute();                    
                    $retorno = $this->getDataFromSQL($stmt, $value);
                }
                
            }
        }
        
        $return = array();
        $return["data"] = $retorno;
        $this->output->_mode = MY_Output::OUTPUT_MODE_NORMAL;
        $this->load->view("jsonresponse", $return);
        
    }
    
    
    private function getDataFromSQL($stmt, $type) {
        $data = '{"type":"FeatureCollection","crs":{"type":"name","properties":{"name":"EPSG:4326"}},"features":[';
        $v = "";
        while ( $row = $stmt->fetch(\PDO::FETCH_ASSOC) ) {
            $data .= $v.$row['json'];
            $v = ",";
        }
        $data .= ']}';

        $retorno = array();
        $retorno[] = array('type'=>$type, 'data'=>$data);
        return $retorno;        
    }
    
    private function getGeoJsonData($class, $url) {
        $list = $this->doctrine->em->getRepository($class)->findAll();
        $retorno = array(
            'type'=>'FeatureCollection',
            'crs'=> array(
                'type'=>'name',
                'properties'=> array('name'=>'EPSG:4326')      
            ),
            'features'=>array()
        );

        foreach ($list as $value) {
            $retorno['features'] = array_merge($retorno['features'], $value->jsonMap($url));
        }
        
        return $retorno;
    }
}
