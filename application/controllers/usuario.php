<?php

class Usuario extends MY_Controller {
    
    public function __construct() {
        $this->modelClassName = 'SystemUsers';
        $this->viewPath = 'usuario';
        
        parent::__construct();
    }
    
    public function access_map() {
        return array(
            'index'=>'view',
            'novo'=>'create',
            'edita'=>'edit',
            'salva'=>'create',
            'validation'=>'create',
            'ativa'=>'edit',
            );
    }

    public function novo() {
//        var_dump($this->ezrbac->getCurrentUser());die;
        $this->load->view("usuario/new", array("usuario" =>new SystemUsers(), 'tiposUsuarios'=>$this->doctrine->em->getRepository('UserRole')->findAll()));
    }

    public function edita() {
        $usuario = null;

        if ($this->input->get('id') && is_numeric($this->input->get('id'))) {
            $usuario = $this->doctrine->em->find('SystemUsers', $this->input->get('id'));
        }
        
        if (is_null($usuario)) {
            show_error('unknown_registry_error_message');
        }

        $this->load->view("usuario/new", array("usuario" => $usuario, 'tiposUsuarios'=>$this->doctrine->em->getRepository('UserRole')->findAll()));
    }

    public function salva() {

        if ($this->validation(true) !== false) {
            show_error('generic_error_message');
            return;
        }
        
        $usuario = new SystemUsers();

        if ($this->input->post('id') && is_numeric($this->input->post('id'))) {
            $usuario = $this->doctrine->em->find('SystemUsers', $this->input->post('id'));
        }
        
        if (is_null($usuario)) {
            show_error('unknown_registry_error_message');
        }
        
        $salt = uniqid('', true);
        $usuario->setName($this->input->post('name'));
        $usuario->setEmail($this->input->post('email'));
        $usuario->setUserRole($this->doctrine->em->find('UserRole', $this->input->post('tipo_usuario')));
        
        if ($usuario->getId() == 0 || $usuario->getId() == null || ($usuario->getId() > 0 && $this->input->post("password") != "")) {        
            $usuario->setPassword($this->encrypt->sha1($this->input->post('password') . $salt));
            $usuario->setSalt($salt);
        }
        
        if (is_null($usuario->getId())) {
            $usuario->setStatus(1);
            $usuario->setVerificationStatus(1);
        }
        
        $this->doctrine->em->persist($usuario);
        $this->doctrine->em->flush();

        $this->session->set_flashdata(get_class($this) . '_mensagem', 'Usuário salvo com sucesso!');
        redirect('usuario/index', 'refresh');
    }

    public function validation($returnError = false) {
        $this->form_validation->set_rules("name", "Nome", "trim|required|max_length[255]");
        $this->form_validation->set_rules("email", "Email", "trim|required|valid_email|max_length[254]");
        $this->form_validation->set_rules('tipo_usuario', "Tipo de usuário", "trim|required|in_array[" . Utils::findIds('id', 'UserRole') . "]");
        
        if (!is_numeric($this->input->post("id")) || (is_numeric($this->input->post("id")) && $this->input->post("password") != '')) {
            $this->form_validation->set_rules("password", "Senha", "trim|required|max_length[20]|min_length[6]");
        }
        
        $this->form_validation->run();

        if ($returnError) {
            return $this->form_validation->error_array();
        }

        $return = array();
        $return["erro"] = $this->form_validation->error_array();
        $this->output->_mode = MY_Output::OUTPUT_MODE_NORMAL;
        $this->load->view("jsonresponse", $return);
    }

    public function ativa(){
        $usuario = $this->doctrine->em->find("SystemUsers", $this->input->get("id"));
        
        if (is_null($usuario)) {
            show_error('unknown_registry_error_message');
        }
        
        $usuario->setStatus((int)(!(bool)$usuario->getStatus()));
        $this->doctrine->em->persist($usuario);
        $this->doctrine->em->flush();
        $this->session->set_flashdata(get_class($this) . '_mensagem', 'Status do usuário alterado com sucesso!');
	redirect('usuario/index');
    }
}
