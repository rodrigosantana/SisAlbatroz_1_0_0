<?php

class Cad_empresa_ct extends MY_Controller {

    public function __construct() {
        $this->modelClassName = 'Cad_empresa';
        $this->viewPath = 'cad_empresa';
        parent::__construct();
    }

    public function access_map() {
        return array(
            'index' => 'view',
            'filter' => 'view',
            'clearfilter' => 'view',
            'novo' => 'create',
            'edita' => 'edit',
            'salva' => 'create',
            'validation' => 'create',
            'exclui' => 'delete'
        );
    }

//--------------------------------------------------------------------------------------------------------------------//
    public function novo() {

        $municipios = $this->doctrine->em->getRepository('Municipio')->findAll();

        $this->load->view($this->viewPath . "/new", array(
            "municipios" => $municipios,
            "empresa" => new Cad_empresa()));
    }

//--------------------------------------------------------------------------------------------------------------------//

    public function edita() {
        $empresa = null;

        if ($this->input->get('id_empresa') && is_numeric($this->input->get('id_empresa'))) {
            $empresa = $this->doctrine->em->find('Cad_empresa', $this->input->get('id_empresa'));
        }

        if (is_null($empresa)) {
            show_error('unknown_registry_error_message');
        }

        $this->load->view($this->viewPath . "/new", array("empresa" => $empresa));
    }

//--------------------------------------------------------------------------------------------------------------------//

    public function salva() {

        if ($this->validation(true) !== false) {
            show_error('generic_error_message');
            return;
        }

        $empresa = new Cad_empresa();
        $em = $this->doctrine->em;

        if ($this->input->post('id') && is_numeric($this->input->post('id'))) {
            $empresa = $this->doctrine->em->find('Cad_empresa', $this->input->post('id'));
        }

        if (is_null($empresa)) {
            show_error('unknown_registry_error_message');
        }

        $empresa->setNome($this->input->post('nome'));
        $empresa->setContato(null);
        $empresa->setEnd(null);
        $empresa->setCargo(null);
        $empresa->setTel(null);
        $empresa->setEmail(null);
        
        if ($this->input->post('contato') && $this->input->post('contato') !== "") {
            $empresa->setContato($this->input->post('contato'));
        }
        if ($this->input->post('endereco') && $this->input->post('endereco') !== "") {
            $empresa->setEnd($this->input->post('endereco'));
        }
        if ($this->input->post('cargo') && $this->input->post('cargo') !== "") {
            $empresa->setCargo($this->input->post('cargo'));
        }
        if ($this->input->post('telefone') && $this->input->post('telefone') !== "") {
            $empresa->setTel($this->input->post('telefone'));
        }
        if ($this->input->post('email') && $this->input->post('email') !== "") {
            $empresa->setEmail($this->input->post('email'));
        }

        if ($this->input->post("municipio") && is_numeric($this->input->post("municipio"))) {
            $empresa->setMunicipio($this->doctrine->em->find('Municipio', $this->input->post("municipio")));
        } else {
            $empresa->setMunicipio(null);
        }

        $em->persist($empresa);
        $em->flush();

        $this->session->set_flashdata(get_class($this) . '_mensagem', 'Empresa salva com sucesso!');
        redirect(strtolower(get_class($this)) . '/index', 'refresh');
    }

//--------------------------------------------------------------------------------------------------------------------//

    public function validation($returnError = false) {
        $this->form_validation->set_rules("nome", "Nome", "trim|required|max_length[150]");
        $this->form_validation->set_rules("contato", "Contato", "trim|max_length[100]");
        $this->form_validation->set_rules("endereco", "Endereço", "trim|max_length[255]");
        $this->form_validation->set_rules("cargo", "Cargo", "trim|max_length[100]");
        $this->form_validation->set_rules("telefone", "Telefone", "trim|max_length[11]");
        $this->form_validation->set_rules("email", "E-mail", "trim|valid_email");
        $this->form_validation->set_rules("municipio", "Município", "trim|in_array[" . Utils::findIds( 'id', 'Municipio') . "]");

        $this->form_validation->run();

        if ($returnError) {
            return $this->form_validation->error_array();
        }

        $return = array();
        $return["erro"] = $this->form_validation->error_array();
        $this->output->_mode = MY_Output::OUTPUT_MODE_NORMAL;
        $this->load->view("jsonresponse", $return);
    }

//--------------------------------------------------------------------------------------------------------------------//

    protected function telaFiltro() {
        $municipios = $this->doctrine->em->getRepository("Municipio")->findAll();

        return $this->load->view($this->viewPath . "/filter", array(
                    "municipios" => $municipios,
                    'filtro' => $this->session->userdata('filtros_' . get_class($this))
                        ), true);
    }

//--------------------------------------------------------------------------------------------------------------------//

    public function filter() {
        $filtros = array();

        if ($this->input->post('nome') && $this->input->post('nome') != '') {
            $filtros['nome'] = $this->input->post('nome');
        }

        if ($this->input->post('municipio') && is_numeric($this->input->post('municipio'))) {
            $filtros['municipio'] = $this->input->post('municipio');
        }

        if ($this->input->post('contato') && $this->input->post('contato') != '') {
            $filtros['contato'] = $this->input->post('contato');
        }

        if ($this->input->post('cargo') && $this->input->post('cargo') != '') {
            $filtros['cargo'] = $this->input->post('cargo');
        }

        if ($this->input->post('telefone') && $this->input->post('telefone') != '') {
            $filtros['telefone'] = $this->input->post('telefone');
        }

        if ($this->input->post('email') && $this->input->post('email') != '') {
            $filtros['email'] = $this->input->post('email');
        }

        $this->session->set_userdata('filtros_' . get_class($this), $filtros);
        redirect(strtolower(get_class($this)) . '/index');
    }

//--------------------------------------------------------------------------------------------------------------------//

    public function clearfilter() {
        $this->session->set_userdata('filtros_' . get_class($this), array());
        redirect(strtolower(get_class($this)) . '/index');
    }

    //--------------------------------------------------------------------------------------------------------------------//

    protected function filterQueryBuilder() {
        $filtrosSessao = $this->session->userdata('filtros_' . get_class($this));
        $class = 'Cad_empresa';

        $queryBuilder = $this->doctrine->em->createQueryBuilder();
        $queryBuilder->select("r")->from($class, "r");

        if (!empty($filtrosSessao)) {
            if (isset($filtrosSessao['nome'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->like('r.nome', '?1'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(1, '%' . $filtrosSessao['nome'] . '%');
            }

            if (isset($filtrosSessao['municipio'])) {
                $queryBuilder->join("r.municipio", "et");
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->eq('et.id', '?2'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(2, $filtrosSessao['municipio']);
            }

            if (isset($filtrosSessao['cargo'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->like('r.cargo', '?3'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(3, '%' . $filtrosSessao['cargo'] . '%');
            }

            if (isset($filtrosSessao['telefone'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->like('r.tel', '?4'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(4, '%' . $filtrosSessao['telefone'] . '%');
            }
            if (isset($filtrosSessao['email'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->like('r.email', '?5'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(5, '%' . $filtrosSessao['email'] . '%');
            }
            
            if (isset($filtrosSessao['contato'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->like('r.contato', '?6'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(6, '%' . $filtrosSessao['contato'] . '%');
            }
        }

        $query = $queryBuilder->getQuery();

        return $query;
    }

}
