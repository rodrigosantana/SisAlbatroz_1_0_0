<?php

class Sistema_ct extends CI_Controller {

    public function access_map() {
        return array('index'=>'view');
    }
    
    public function index(){        
        $this->load->view("sistema");
    }
}