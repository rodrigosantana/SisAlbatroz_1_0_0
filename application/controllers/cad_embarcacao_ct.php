<?php

class Cad_embarcacao_ct extends CI_Controller {

    public function __construct() {
      $this->modelClassName = 'CadObservador';
      $this->ViewPath = 'cad_observador';

        parent::__construct();
        $this->output->set_template('sisalbatroz_template');
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

   public function novo(){

      // Basilar de municípios
      $municipios = $this->doctrine->em->getRepository('Municipio')->findAll();

      $this->load->view($this->ViewPath . '/new', array(
         'municipios' => $municipios,
         'observador' => new CadObservador()
      ));

    }
//--------------------------------------------------------------------------------------------------------------------//

   public function edita() {
      $observador = null;

      if($this->input->get('idObserv') && is_numeric($this->input->get('idObserv'))) {
         $observador = $this->doctrine->em->find('CadObservador', $this->input->get('idObserv'));
      }

      if (is_null($observador)) {
         show_error('unknown_registry_error_message');
      }

      $this->load->view($this->ViewPath . '/new', array('observador' => $observador));
 }

//--------------------------------------------------------------------------------------------------------------------//

    // Salva as variáveis, valida o form e envia para o banco.
    public function salva(){

      if($this->validation(true) !== false) {
        show_error('generic_error_message');
        return;
      }

      $observador = null;
      $em = $this->doctrine->em;

      if($this->input->post('idObserv') && is_numeric($this->input->post('idObserv'))) {
        $observador = $this->doctrine->em->find('CadObservador', $this->input->post('idObserv'));
      }

      if(is_null($observador)) {
         show_error('unknown_registry_error_message');
      }

      //Salva variáveis enviados por POST do form
      $cad_observador ->setNome($this->input->post("nome"));
      $cad_observador ->setCpf($this->input->post("cpf"));
      $cad_observador ->setRg($this->input->post("rg"));
      $cad_observador ->setEmail($this->input->post("email"));
      $cad_observador ->setTel($this->input->post("tel"));
      $cad_observador ->setSkype($this->input->post("skype"));
      $cad_observador ->setEnd($this->input->post("end"));

      if ($this->input->post("municipio") && is_numeric($this->input->post("municipio"))) {
         $cad_observador->setMunicipio($this->doctrine->em->find('Municipio', $this->input->post("municipio")));
      }

      $em->persist($observador);
      $em->flush();

      $this->session->set_flashdata(get_class($this) . '_mensagem', 'Observador salvo com sucesso!');
      redirect($this->ViewPath . '/index', 'refresh');
   }
//--------------------------------------------------------------------------------------------------------------------//

   public function validation($returnError = false){
      $this->form_validation->set_rules('nome', 'Nome', 'trim|required|max_length[150]');
      $this->form_validation->set_rules('cpf', 'CPF', 'trim|required|integer|max_length[11]|callback_checkCpf');
      $this->form_validation->set_rules('rg', 'RG', 'trim|required|integer|max_length[10]');
      $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|max_length[100]');
      $this->form_validation->set_rules('tel', 'Telefone', 'trim|required|integer|max_length[15]');
      $this->form_validation->set_rules('skype', 'Skype', 'trim|max_length[50]');
      $this->form_validation->set_rules('end', 'Endereço', 'trim|required|max_length[200]');
      $this->form_validation->set_rules("municipio", "Município", "trim|in_array[' . Utils::findIds( 'id', 'Municipio') . ']");

      $this->form_validation->run();

      if($returnError) {
         return $this->form_validation->error_array();
      }

      $return = array();
      $return['erro'] = $this->form_validation->error_array();
      $this->output->_mode = MY_Output::OUTPUT_MODE_NORMAL;
      $this->load->view('jsonresponse', $return);
   }
//--------------------------------------------------------------------------------------------------------------------//

   public function exclui(){
      $observador = $this->doctrine->em->find(CadObservador, $find->input->get('idObserv'));

      if(is_null($observador)) {
         show_error('unknown_registry_error_message');
      }

      $this->doctrine->em->remove($observador);
      $this->doctrine->em->flush();
      $this->session->set_flashdata(get_cladd($this) . '_mensagem', 'Observador excluído com sucesso.');
      redirect($this->ViewPath . '/index');
   }
//--------------------------------------------------------------------------------------------------------------------//

    // Função para checar se a espécie já existe no BD
    public function checkCpf($check){

        $checkCpf = $this->doctrine->em->getRepository("Cad_observador")->findOneBy(array("cpf" => $check));
        if ($checkCpf == null){
            return TRUE;
        } else {
            $this->form_validation->set_message('checkCpf',
                '<strong style="color:#FE0000">Esse obsevador já foi cadastrado.</strong>');
            return FALSE;
        }
    }
//--------------------------------------------------------------------------------------------------------------------//

   protected function telaFiltro() {
      $municipios = $this->doctrine->em->getRepository('Municipio')->findAll();

      return $this->load->view($this->ViewPath . '/filte', array(
         'municipios' => $municipios,
         'filtro' => $this->session->userdata('filtros_' . get_class($this))
      ), true);
   }
//--------------------------------------------------------------------------------------------------------------------//

   public function filter() {
      $filtros = array();

      if ($this->input->post('nome') && $this->input->post('nome') != '') {
         $filtros['nome'] = $this->input->post('nome');
      }

      if ($this->input->post('cpf') && $this->input->post('cpf') != '') {
         $filtros['cpf'] = $this->input->post('cpf');
      }

      if ($this->input->post('rg') && $this->input->post('rg') != '') {
         $filtros['rg'] = $this->input->post('rg');
      }

      if ($this->input->post('email') && $this->input->post('email') != '') {
         $filtros['email'] = $this->input->post('email');
      }

      if ($this->input->post('tel') && $this->input->post('tel') != '') {
         $filtros['tel'] = $this->input->post('tel');
      }

      if ($this->input->post('skype') && $this->input->post('skype') != '') {
         $filtros['skype'] = $this->input->post('skype');
      }

      if ($this->input->post('end') && $this->input->post('end') != '') {
         $filtros['end'] = $this->input->post('end');
      }

      if ($this->input->post('municipio') && is_numeric($this->input->post('municipio'))) {
         $filtros['municipio'] = $this->input->post('municipio');
      }

      $this->session->user_userdata('filtros_' . get_class($this), array());
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
      $class = 'CadObservador';

      $queryBuilder = $this->doctrine->em->createQueryBuilder();
      $queryBuilder->select("r")->from($class, "r");

      if (!empty($filtrosSessao)) {
         if (isset($filtrosSessao['nome'])) {
             $wherex = $queryBuilder->expr()->orx();
             $wherex->add($queryBuilder->expr()->like('r.nome', '?1'));
             $queryBuilder->andWhere($wherex);
             $queryBuilder->setParameter(1, '%'.$filtrosSessao['nome'].'%');
         }
         if (isset($filtrosSessao['cpf'])) {
             $wherex = $queryBuilder->expr()->orx();
             $wherex->add($queryBuilder->expr()->like('r.cpf', '?2'));
             $queryBuilder->andWhere($wherex);
             $queryBuilder->setParameter(2, '%'.$filtrosSessao['cpf'].'%');
         }
         if (isset($filtrosSessao['rg'])) {
             $wherex = $queryBuilder->expr()->orx();
             $wherex->add($queryBuilder->expr()->like('r.rg', '?3'));
             $queryBuilder->andWhere($wherex);
             $queryBuilder->setParameter(3, '%'.$filtrosSessao['rg'].'%');
         }
         if (isset($filtrosSessao['tel'])) {
             $wherex = $queryBuilder->expr()->orx();
             $wherex->add($queryBuilder->expr()->like('r.tel', '?4'));
             $queryBuilder->andWhere($wherex);
             $queryBuilder->setParameter(4, '%'.$filtrosSessao['tel'].'%');
         }
         if (isset($filtrosSessao['skype'])) {
             $wherex = $queryBuilder->expr()->orx();
             $wherex->add($queryBuilder->expr()->like('r.skype', '?5'));
             $queryBuilder->andWhere($wherex);
             $queryBuilder->setParameter(5, '%'.$filtrosSessao['skype'].'%');
         }
         if (isset($filtrosSessao['email'])) {
             $wherex = $queryBuilder->expr()->orx();
             $wherex->add($queryBuilder->expr()->like('r.email', '?6'));
             $queryBuilder->andWhere($wherex);
             $queryBuilder->setParameter(6, '%'.$filtrosSessao['email'].'%');
         }
         if (isset($filtrosSessao['end'])) {
             $wherex = $queryBuilder->expr()->orx();
             $wherex->add($queryBuilder->expr()->like('r.end', '?7'));
             $queryBuilder->andWhere($wherex);
             $queryBuilder->setParameter(7, '%'.$filtrosSessao['end'].'%');
         }
         if (isset($filtrosSessao['municipio'])) {
            $queryBuilder->join("r.municipio", "et");
            $wherex = $queryBuilder->expr()->orx();
            $wherex->add($queryBuilder->expr()->eq('et.id', '?8'));
            $queryBuilder->andWhere($wherex);
            $queryBuilder->setParameter(8, $filtrosSessao['municipio']);
         }
      }

      $query = $queryBuilder->getQuery();
      return $query;

   }




//--------------------------------------------------------------------------------------------------------------------//
}
