<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of medicinaconservacao
 *
 * @author Dev
 */
class MedicinaConservacao extends MY_Controller {
    
    public function __construct() {        
        $this->modelClassName = 'Cruzeiro';
        $this->viewPath = 'medicina_conservacao';
        
        parent::__construct();
    }
    
    public function access_map() {
        return array(
            'index'=>'view',
            'filter'=>'view',
            'clearfilter'=>'view',
            'novo'=>'create',
            'edita'=>'edit',
            'salva'=>'create',
            'validation'=>'create',
            'exclui'=>'delete',
            );
    }
    
    public function novo() {
        $this->formulario(null);
    }
    
    protected function formulario($objeto) {
        $this->load->view($this->viewPath . '/new', array('mensagem'=>''));
    }
}
