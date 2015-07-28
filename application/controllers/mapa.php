<?php

class Mapa extends MY_Controller {

    public function __construct() {        
        $this->viewPath = 'mapa';        

        parent::__construct();
    }
    
    public function access_map() {
        return array(
            'index'=>'view',
            );

    }
    
    public function index() {

        $list = $this->doctrine->em->getRepository('MbGeral')->findAll();
        $retorno = array(
            'type'=>'FeatureCollection',
            'crs'=> array(
                'type'=>'name',
                'properties'=> array('name'=>'EPSG:4326')      
            ),
            'features'=>array()
        );
        
        //'properties'=> array('name'=>'EPSG:4326')
        
        foreach ($list as $value) {
            $retorno['features'] = array_merge($retorno['features'], $value->jsonMap());
        }
        
        $this->load->view($this->viewPath . '/index.php', array('points'=>  json_encode($retorno)));
    }
}
