<?php

class Cad_embarcacao_ct extends MY_Controller {

    public function __construct() {        
        $this->modelClassName = 'CadEmbarcacao';
        $this->viewPath = 'cad_embarcacao';
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

   public function novo(){

      // Basilar de municípios
      $municipios = $this->doctrine->em->getRepository('Municipio')->findAll();
      $auto_pesca = $this->doctrine->em->getRepository("AutorizPesca")->findAll();
      
      $this->load->view($this->viewPath . '/new', array(
            "auto_pesca" => $auto_pesca,
            'municipios' => $municipios,
            'embarcacao' => new CadEmbarcacao()
      ));

    }
//--------------------------------------------------------------------------------------------------------------------//

   public function edita() {
      $embarcacao = null;
      
      if($this->input->get('id') && is_numeric($this->input->get('id'))) {
         $embarcacao = $this->doctrine->em->find('CadEmbarcacao', $this->input->get('id'));
      }

      if (is_null($embarcacao)) {
         show_error('unknown_registry_error_message');
      }

      $municipios = $this->doctrine->em->getRepository('Municipio')->findAll();
      $auto_pesca = $this->doctrine->em->getRepository("AutorizPesca")->findAll();
      
      $this->load->view($this->viewPath . '/new', array(
            "auto_pesca" => $auto_pesca,
            'municipios' => $municipios,
            'embarcacao' => $embarcacao
      ));
 }

//--------------------------------------------------------------------------------------------------------------------//

    // Salva as variáveis, valida o form e envia para o banco.
    public function salva(){
      if($this->validation(true) !== false) {
        show_error('generic_error_message');
        return;
      }

      $cad_embarcacao = new CadEmbarcacao();
      $em = $this->doctrine->em;

      if($this->input->post('id_embarcacao') && is_numeric($this->input->post('id_embarcacao'))) {
        $cad_embarcacao = $em->find('CadEmbarcacao', $this->input->post('id_embarcacao'));
      }

      if(is_null($cad_embarcacao)) {
         show_error('unknown_registry_error_message');
      }
      
      $cad_embarcacao->setNome($this->input->post("nome"));
      $cad_embarcacao->setAutorizacaoPesca($em->find('AutorizPesca',$this->input->post("aut_pesca")));
      $cad_embarcacao->setRegMarinha($this->input->post("reg_marinha"));
      $cad_embarcacao->setRegMpa($this->input->post("reg_mpa"));      
      
      $cad_embarcacao->setComprimBarco(null);
      $cad_embarcacao->setArqueacaoBruta(null);
      $cad_embarcacao->setAnoFabricacao(null);
      $cad_embarcacao->setMatCasco(null);
      $cad_embarcacao->setPropulsao(null);
      $cad_embarcacao->setPotenciaMotor(null);
      $cad_embarcacao->setTripulacao(null);
      $cad_embarcacao->setMunicipio(null);      
      
      if ($this->input->post("comprimento") && is_numeric($this->input->post("comprimento"))) {
          $cad_embarcacao->setComprimBarco((double)$this->input->post("comprimento"));
      }
      
      if ($this->input->post("arq_bruta") && is_numeric($this->input->post("arq_bruta"))) {
          $cad_embarcacao->setArqueacaoBruta((double)$this->input->post("arq_bruta"));
      }
      
      if ($this->input->post("ano_fab") && is_numeric($this->input->post("ano_fab"))) {
          $cad_embarcacao->setAnoFabricacao((integer)$this->input->post("ano_fab"));
      }
      
      if ($this->input->post("mat_casco") && $this->input->post("mat_casco") != "") {
          $cad_embarcacao->setMatCasco($this->input->post("mat_casco"));
      }
      
      if ($this->input->post("propulsao") && $this->input->post("propulsao") != "") {
          $cad_embarcacao->setPropulsao($this->input->post("propulsao"));
      }
      
      if ($this->input->post("pot_motor") && is_numeric($this->input->post("pot_motor"))) {
          $cad_embarcacao->setPotenciaMotor((double)$this->input->post("pot_motor"));
      }
      
      if ($this->input->post("tripulacao") && is_numeric($this->input->post("tripulacao"))) {
          $cad_embarcacao->setTripulacao((integer)$this->input->post("tripulacao"));
      }

      if ($this->input->post("municipio") && is_numeric($this->input->post("municipio"))) {
         $cad_embarcacao->setMunicipio($this->doctrine->em->find('Municipio', $this->input->post("municipio")));
      }

      $em->persist($cad_embarcacao);
      $em->flush();

      $this->session->set_flashdata(get_class($this) . '_mensagem', 'Embarcação salva com sucesso!');
      redirect(get_class($this), 'refresh');
   }
//--------------------------------------------------------------------------------------------------------------------//

   public function validation($returnError = false){
      $this->form_validation->set_rules('nome', 'Nome', 'trim|required|max_length[150]');
      $this->form_validation->set_rules('aut_pesca', 'Autorização de Pesca', "trim|required|in_array[" . Utils::findIds('id_auto_pesca', 'AutorizPesca') . "]");
      $this->form_validation->set_rules('reg_marinha', 'Registro da Marinha', 'trim|required');
      $this->form_validation->set_rules('reg_mpa', 'Número do RGP', 'trim|required');
      $this->form_validation->set_rules('comprimento', 'Comprimento ', 'trim');
      $this->form_validation->set_rules('arq_bruta', 'Arqueação Bruta', 'trim');
      $this->form_validation->set_rules('ano_fab', 'Ano de Fabricação', 'trim|integer');
      $this->form_validation->set_rules('mat_casco', 'Material do Caso', 'trim|in_array[aço,fibra_vidro,madeira]');
      $this->form_validation->set_rules('propulsao', 'Propulsão', 'trim|in_array[motor]');
      $this->form_validation->set_rules('pot_motor', 'Potência do Motor', 'trim');
      $this->form_validation->set_rules('tripulacao', 'Tripulação Máxima', 'trim|integer');
      $this->form_validation->set_rules('municipio', 'Município', "trim|in_array[" . Utils::findIds('id', 'Municipio') . "]");
      
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

    // Função para checar se a espécie já existe no BD
    public function checkCpf($check){

        $checkCpf = $this->doctrine->em->getRepository("CadObservador")->findOneBy(array("cpf" => $check));
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
      $auto_pesca = $this->doctrine->em->getRepository("AutorizPesca")->findAll();

      return $this->load->view($this->viewPath . '/filter', array(
         'auto_pesca' => $auto_pesca,
         'filtro' => $this->session->userdata('filtros_' . get_class($this))
      ), true);
   }
//--------------------------------------------------------------------------------------------------------------------//

   public function filter() {
      $filtros = array();

      if ($this->input->post('nome') && $this->input->post('nome') != '') {
         $filtros['nome'] = $this->input->post('nome');
      }

      if ($this->input->post('aut_pesca') && is_numeric($this->input->post('aut_pesca'))) {
         $filtros['aut_pesca'] = $this->input->post('aut_pesca');
      }

      if ($this->input->post('reg_marinha') && $this->input->post('reg_marinha') != '') {
         $filtros['reg_marinha'] = $this->input->post('reg_marinha');
      }

      if ($this->input->post('reg_mpa') && $this->input->post('reg_mpa') != '') {
         $filtros['reg_mpa'] = $this->input->post('reg_mpa');
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
      $class = 'CadEmbarcacao';

      $queryBuilder = $this->doctrine->em->createQueryBuilder();
      $queryBuilder->select("r")->from($class, "r");

      if (!empty($filtrosSessao)) {
         if (isset($filtrosSessao['nome'])) {
             $wherex = $queryBuilder->expr()->orx();
             $wherex->add($queryBuilder->expr()->like('r.nome', '?1'));
             $queryBuilder->andWhere($wherex);
             $queryBuilder->setParameter(1, '%'.$filtrosSessao['nome'].'%');
         }
         
         if (isset($filtrosSessao['aut_pesca'])) {
            $queryBuilder->join("r.autorizacaoPesca", "et");
            $wherex = $queryBuilder->expr()->orx();
            $wherex->add($queryBuilder->expr()->eq('et.id_auto_pesca', '?2'));
            $queryBuilder->andWhere($wherex);
            $queryBuilder->setParameter(2, $filtrosSessao['aut_pesca']);
         }
         
         if (isset($filtrosSessao['reg_marinha'])) {
             $wherex = $queryBuilder->expr()->orx();
             $wherex->add($queryBuilder->expr()->like('r.regMarinha', '?3'));
             $queryBuilder->andWhere($wherex);
             $queryBuilder->setParameter(3, '%'.$filtrosSessao['reg_marinha'].'%');
         }
         if (isset($filtrosSessao['reg_mpa'])) {
             $wherex = $queryBuilder->expr()->orx();
             $wherex->add($queryBuilder->expr()->like('r.regMpa', '?4'));
             $queryBuilder->andWhere($wherex);
             $queryBuilder->setParameter(4, '%'.$filtrosSessao['reg_mpa'].'%');
         }
         
      }

      $query = $queryBuilder->getQuery();
      return $query;

   }




//--------------------------------------------------------------------------------------------------------------------//
}
