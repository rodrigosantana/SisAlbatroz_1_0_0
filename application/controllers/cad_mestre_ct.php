<?php

class Cad_mestre_ct extends MY_Controller {


    public function __construct() {
      // Nome do model
        $this->modelClassName = 'CadMestre';
        //
        $this->viewPath = 'mestre';

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
        $this->load->view($this->viewPath . "/new", array("mestre" =>new CadMestre()));
    }
//--------------------------------------------------------------------------------------------------------------------//

    public function edita() {
        $mestre = null;

        if ($this->input->get('idMestre') && is_numeric($this->input->get('idMestre'))) {
            $mestre = $this->doctrine->em->find('CadMestre', $this->input->get('idMestre'));
        }

        
      //   if (is_null($mestre)) {
      //       show_error('unknown_registry_error_message');
      //   }

        $this->load->view($this->viewPath . "/new", array("mestre" => $mestre));
    }
//--------------------------------------------------------------------------------------------------------------------//

    public function salva() {

        if ($this->validation(true) !== false) {
            show_error('generic_error_message');
            return;
        }

        $mestre = null;
        $em = $this->doctrine->em;

        if ($this->input->post('id') && is_numeric($this->input->post('id'))) {
            $mestre = $this->doctrine->em->find('CadMestre', $this->input->post('id'));
        }

        if (is_null($mestre)) {
            show_error('unknown_registry_error_message');
        }

        $mestre->setNome($this->input->post('nome'));
        $mestre->setApelido($this->input->post('apelido'));
        $mestre->setTelefone($this->input->post('telefone'));
        $mestre->setEmail($this->input->post('email'));
        $em->persist($mestre);
        $em->flush();

        $this->session->set_flashdata(get_class($this) . '_mensagem', 'Mestre salvo com sucesso!');
        redirect($this->viewPath . '/index', 'refresh');
    }
//--------------------------------------------------------------------------------------------------------------------//

    public function validation($returnError = false) {
        $this->form_validation->set_rules("nome", "Nome", "trim|required|max_length[100]");
        $this->form_validation->set_rules("apelido", "Apelido", "trim|max_length[100]");
        $this->form_validation->set_rules("telefone", "Telefone", "trim|max_length[11]");
        $this->form_validation->set_rules("email", "E-mail", "trim|valid_email");

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

   // public function exclui(){
   //      $mestre = $this->doctrine->em->find("CadMestre", $this->input->get("id"));
   //
   //      if (is_null($mestre)) {
   //          show_error('unknown_registry_error_message');
   //      }
   //
   //      $this->doctrine->em->remove($mestre);
   //      $this->doctrine->em->flush();
   //      $this->session->set_flashdata(get_class($this) . '_mensagem', 'Mestre excluído com sucesso.');
	// 	redirect($this->viewPath . '/index');
   // }
//--------------------------------------------------------------------------------------------------------------------//
    protected function telaFiltro() {
        return $this->load->view($this->viewPath . "/filter", array(
            'filtro'=>$this->session->userdata('filtros_' . get_class($this))
            ), true);
    }
//--------------------------------------------------------------------------------------------------------------------//

    public function filter() {
      $filtros = array();

      if ($this->input->post('nome') && $this->input->post('nome') != '') {
         $filtros['nome'] = $this->input->post('nome');
      }

      if ($this->input->post('apelido') && $this->input->post('apelido') != '') {
         $filtros['apelido'] = $this->input->post('apelido');
      }

      if ($this->input->post('telefone') && $this->input->post('telefone') != '') {
         $filtros['telefone'] = $this->input->post('telefone');
      }

      if ($this->input->post('email') && $this->input->post('email') != '') {
         $filtros['email'] = $this->input->post('email');
      }

      $this->session->set_userdata('filtros_' . get_class($this), $filtros);
      redirect($this->viewPath . '/index');
    }
//--------------------------------------------------------------------------------------------------------------------//

    public function clearfilter() {
        $this->session->set_userdata('filtros_' . get_class($this), array());
        redirect($this->viewPath . '/index');
    }
//--------------------------------------------------------------------------------------------------------------------//

     protected function filterQueryBuilder() {
        $filtrosSessao = $this->session->userdata('filtros_' . get_class($this));
        $class = 'CadMestre';

        $queryBuilder = $this->doctrine->em->createQueryBuilder();
        $queryBuilder->select("r")->from($class, "r");

        if (!empty($filtrosSessao)) {
            if (isset($filtrosSessao['nome'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->like('r.nome', '?1'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(1, '%'.$filtrosSessao['nome'].'%');
            }

            if (isset($filtrosSessao['apelido'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->like('r.apelido', '?2'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(2, '%'.$filtrosSessao['apelido'].'%');
            }

            if (isset($filtrosSessao['telefone'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->like('r.telefone', '?3'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(3, '%'.$filtrosSessao['telefone'].'%');
            }
            if (isset($filtrosSessao['email'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->like('r.email', '?4'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(4, '%'.$filtrosSessao['email'].'%');
            }
        }

        $query = $queryBuilder->getQuery();

        return $query;
    }
}
