<?php

class TipoUsuario extends MY_Controller {
    
    public function __construct() {
        $this->modelClassName = 'UserRole';
        $this->viewPath = 'tipousuario';
        
        parent::__construct();
    }
    
    public function access_map() {
        return array(
            'index'=>'view',
            'novo'=>'create',
            'edita'=>'edit',
            'salva'=>'create',
            'validation'=>'create',
            'exclui'=>'delete',
            );
    }

    public function novo() {
        $controllers = array();
        $accessMap = array();
        //echo $this->ezrbac->hasAccess('novo', 'tipousuario');die;
        
        $list = $this->ezrbac->getControllers();        
        $listAccess  =$this->ezrbac->getAccessMap();
        
        
        foreach ($list as $value) {
            $controllers[strtolower($value)] = $value;
        }
        
        foreach ($listAccess as $key => $value) {            
            $accessMap[pow(2,$key)] = $value;
        }
        
        $this->load->view("tipousuario/new", array("tipoUsuario" =>new UserRole(), 'controllers'=>$controllers, 'accessmap'=>$accessMap, 'listControllerAccess' => array()));
    }

    public function edita() {
        
        $tipoUsuario = null;

        if ($this->input->get('id') && is_numeric($this->input->get('id'))) {
            $tipoUsuario = $this->doctrine->em->find('UserRole', $this->input->get('id'));
        }
        
        if (is_null($tipoUsuario)) {
            show_error('unknown_registry_error_message');
        }
        
        $controllers = array();
        $accessMap = array();
        $list = $this->ezrbac->getControllers();        
        $listAccess  =$this->ezrbac->getAccessMap();
        
        $listControllerAccess = array();
        
        
        foreach ($list as $value) {
            $controllers[strtolower($value)] = $value;
            
            $this->accessmap->initialize($value, $tipoUsuario->getId());
            $access = $this->accessmap->get_access_str();
            $access_str = strrev($this->accessmap->validate(decbin($access)));
            $listControllerAccess[strtolower($value)] = str_split($access_str);
        }
        
        foreach ($listAccess as $key => $value) {
            $newKey = pow(2,$key);
            $accessMap[$newKey] = $value;
            
            foreach ($listControllerAccess as $keyAccess => $arr) {
                $arr['access_' . $newKey] = $arr[$key];
                unset($arr[$key]);
                $listControllerAccess[$keyAccess] = $arr;                
            }
        }
        
        $this->load->view("tipousuario/new", array("tipoUsuario" =>$tipoUsuario, 'controllers'=>$controllers, 'accessmap'=>$accessMap, 'listControllerAccess' => $listControllerAccess));
    }

    public function salva() {

        if ($this->validation(true) !== false) {
            show_error('generic_error_message');
            return;
        }
        
        $tipoUsuario = new UserRole();

        if ($this->input->post('id') && is_numeric($this->input->post('id'))) {
            $tipoUsuario = $this->doctrine->em->find('UserRole', $this->input->post('id'));
        }        
        
        if (is_null($tipoUsuario)) {
            show_error('unknown_registry_error_message');
        }
        
        $tipoUsuario->setRoleName($this->input->post('name'));
        $tipoUsuario->setDefaultAccess('11111');
        
        $list = $this->ezrbac->getControllers();
        $listaAccessMap = $tipoUsuario->getUserAccessMap()->toArray();
        
        foreach ($list as $value) {
            if ($this->input->post(strtolower($value))) {
                $array = $this->input->post(strtolower($value));
                $permission = array_sum($array);
            } else {
                $permission = 0;
            }
            
            $find = false;
            
            foreach ($listaAccessMap as $accesMap) {
                if ($accesMap->getController() == $value) {
                    $accesMap->setPermission($permission);
                    $find = true; break;
                }
            }

            if (!$find) {
                $userAccessMap = new UserAccessMap();
                $userAccessMap->setController($value);
                $userAccessMap->setPermission($permission);
                $tipoUsuario->addUserAccessMap($userAccessMap);
            }
        }
        
        $this->doctrine->em->persist($tipoUsuario);
        $this->doctrine->em->flush();

        $this->session->set_flashdata(get_class($this) . '_mensagem', 'Tipo de usuário salvo com sucesso!');
        redirect('tipousuario/index', 'refresh');
    }

    public function validation($returnError = false) {
        $this->form_validation->set_rules("name", "Nome", "trim|required|max_length[50]");
        $this->form_validation->run();

        if ($returnError) {
            return $this->form_validation->error_array();
        }

        $return = array();
        $return["erro"] = $this->form_validation->error_array();
        $this->output->_mode = MY_Output::OUTPUT_MODE_NORMAL;
        $this->load->view("jsonresponse", $return);
    }
    
    public function exclui(){
        $objeto = $this->doctrine->em->find("UserRole", $this->input->get("id"));
        
        if (is_null($objeto)) {
            show_error('unknown_registry_error_message');
        }             
        
        $this->doctrine->em->remove($objeto);
        $this->doctrine->em->flush();
        $this->session->set_flashdata(get_class($this) . '_mensagem', 'Registro excluído com sucesso.');
		redirect('tipousuario/index');
    }
}
