<?php

class Sistema_ct extends CI_Controller {

    public function access_map() {
        return array('index'=>'view');
    }
    
    public function index(){      
        
        //Código para importação dos ids dos municípios
        
//        $conn = $this->doctrine->em->getConnection();
//        $stm = $conn->query('SELECT id, nome FROM municipio');
//        $municipios = array();
//        
//        while ($row = $stm->fetch()) {
//            $municipios[strtolower($row['nome'])] = $row['id'];
//        }
//        
//        
//        $stm = $conn->query('SELECT id_embarcacao, muni_t FROM cad_embarcacao');
//        $conn2 = $this->doctrine->em->getConnection();
//        
//        while ($row = $stm->fetch()) {
//            $municipio = strtolower($row['muni_t']);
//            
//            if (isset($municipios[$municipio])) {
//                $conn2->executeUpdate('UPDATE cad_embarcacao SET municipio = '.$municipios[$municipio].' WHERE id = ?', array($row['id_embarcacao'], 1));
//            }
//        }
//        die('Fim');
        
        $this->load->view("sistema");
    }
}