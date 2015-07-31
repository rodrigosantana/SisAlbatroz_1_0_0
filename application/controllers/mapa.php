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
            
            foreach ($data as $value) {
                if ($value == 'mapa_bordo') {
                    $url = $this->ezrbac->hasAccess(Utils::VIEW, 'mapa_bordo_ct') ? site_url('mapa_bordo_ct/visualiza') : '';
                    $retorno[] = array('type'=>'mapa_bordo', 'data'=>$this->getGeoJsonData('MbGeral', $url));                    
                } else if ($value == 'observador_bordo') {                    
                    $url = $this->ezrbac->hasAccess(Utils::VIEW, 'observadorbordo') ? site_url('observadorbordo/visualiza') : '';
                    $retorno[] = array('type'=>'observador_bordo', 'data'=>$this->getGeoJsonData('Cruzeiro', $url));
                }
            }
        }
        
        $return = array();
        $return["data"] = $retorno;
        $this->output->_mode = MY_Output::OUTPUT_MODE_NORMAL;
        $this->load->view("jsonresponse", $return);
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
