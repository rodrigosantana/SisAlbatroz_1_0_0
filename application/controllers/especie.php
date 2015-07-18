<?php

class Especie extends MY_Controller {

    private $types;

    public function __construct() {
        $this->modelClassName = 'Especies';
        $this->viewPath = 'especie';
        $this->types = array('Ave'=>'Aves', 'Pescado'=>'Pescado');

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
        $this->load->view($this->viewPath . "/new", array("especie" =>new Especies(), 'types'=>$this->types));
    }

    public function edita() {
        $especie = null;

        if ($this->input->get('id') && is_numeric($this->input->get('id'))) {
            $especie = $this->doctrine->em->find('Especies', $this->input->get('id'));
        }

        var_dump($especie);
        die();

        if (is_null($especie)) {
            show_error('unknown_registry_error_message');
        }

        $this->load->view($this->viewPath . "/new", array("especie" => $especie, 'types'=>$this->types));
    }

    public function salva() {

        if ($this->validation(true) !== false) {
            show_error('generic_error_message');
            return;
        }

        $especie = null;
        $em = $this->doctrine->em;

        if ($this->input->post('id') && is_numeric($this->input->post('id'))) {
            $especie = $this->doctrine->em->find('Especies', $this->input->post('id'));
        }

        if ($this->input->post('tipo') && class_exists($this->input->post('tipo'))) {
            $class = $this->input->post('tipo');
            if (is_null($especie)) {
                $especie = new $class();
            } else if (get_class($especie) !== $class) {
                $em->remove($especie);
                $especie = new $class();
            }

        }

        if (is_null($especie)) {
            show_error('unknown_registry_error_message');
        }

        $especie->setNomeComumBr($this->input->post('nome_br'));
        $especie->setNomeComumEn($this->input->post('nome_en'));
        $especie->setNomeCientifico($this->input->post('nome_cient'));
        $em->persist($especie);
        $em->flush();

        $this->session->set_flashdata(get_class($this) . '_mensagem', 'Espécie salvo com sucesso!');
        redirect($this->viewPath . '/index', 'refresh');
    }

    public function validation($returnError = false) {
        $this->form_validation->set_rules("nome_br", "Nome comum", "trim|required|max_length[100]");
        $this->form_validation->set_rules("nome_en", "Nome comum em inglês", "trim|max_length[100]");
        $this->form_validation->set_rules("nome_cient", "Nome Científico", "trim|required|max_length[100]");
        $this->form_validation->set_rules("tipo", "Tipo", "trim|required|in_array[". implode(',',array_keys($this->types))."]");

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
        $especie = $this->doctrine->em->find("Especies", $this->input->get("id"));

        if (is_null($especie)) {
            show_error('unknown_registry_error_message');
        }

        $this->doctrine->em->remove($especie);
        $this->doctrine->em->flush();
        $this->session->set_flashdata(get_class($this) . '_mensagem', 'Espécie excluído com sucesso.');
		redirect($this->viewPath . '/index');
    }

    protected function telaFiltro() {
        return $this->load->view($this->viewPath . "/filter", array(
            "types" => $this->types,
            'filtro'=>$this->session->userdata('filtros_' . get_class($this))
            ), true);
    }

    public function filter() {
        $filtros = array();

        if ($this->input->post('nome_br') && $this->input->post('nome_br') != '') {
            $filtros['nome_br'] = $this->input->post('nome_br');
        }

        if ($this->input->post('nome_en') && $this->input->post('nome_en') != '') {
            $filtros['nome_en'] = $this->input->post('nome_en');
        }

        if ($this->input->post('nome_cient') && $this->input->post('nome_cient') != '') {
            $filtros['nome_cient'] = $this->input->post('nome_cient');
        }

        if ($this->input->post('tipo') && $this->input->post('tipo') != '') {
            $filtros['tipo'] = $this->input->post('tipo');
        }

        $this->session->set_userdata('filtros_' . get_class($this), $filtros);
        redirect($this->viewPath . '/index');
    }

    public function clearfilter() {
        $this->session->set_userdata('filtros_' . get_class($this), array());
        redirect($this->viewPath . '/index');
    }


     protected function filterQueryBuilder() {
        $filtrosSessao = $this->session->userdata('filtros_' . get_class($this));
        $class = 'Especies';

        if (!empty($filtrosSessao) && isset($filtrosSessao['tipo']) && class_exists($filtrosSessao['tipo'])) {
            $class = $filtrosSessao['tipo'];
        }

        $queryBuilder = $this->doctrine->em->createQueryBuilder();
        $queryBuilder->select("r")->from($class, "r");

        if (!empty($filtrosSessao)) {
            if (isset($filtrosSessao['nome_br'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->like('r.nomeComumBr', '?1'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(1, '%'.$filtrosSessao['nome_br'].'%');
            }

            if (isset($filtrosSessao['nome_en'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->like('r.nomeComumEn', '?2'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(2, '%'.$filtrosSessao['nome_en'].'%');
            }

            if (isset($filtrosSessao['nome_cient'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->like('r.nomeCientifico', '?3'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(3, '%'.$filtrosSessao['nome_cient'].'%');
            }
        }

        $query = $queryBuilder->getQuery();

        return $query;
    }
}
