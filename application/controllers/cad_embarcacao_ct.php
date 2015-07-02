<?php
class Cad_embarcacao_ct extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->output->set_template('sisalbatroz_template');
    }
    
    public function access_map() {
        return array(
            'cadembarcacao'=>'create',            
            'salva'=>'create',            
            );
    }
    
    
//    Cadastro de embarcações
    public function cadembarcacao(){
        // Carrega o BD de modalidades de pesca
        $auto_pesca = $this->doctrine->em->getRepository("AutorizPesca")->findAll();
        $municipios = $this->doctrine->em->getRepository('Municipio')->findAll();
        
	$this->load->view("mapa_bordo/cad_embarcacao", array(
            "cad_embarcacao" => new Cad_embarcacao(),
            "auto_pesca" => $auto_pesca,
            "mensagem"=>$this->session->flashdata('salva_embarcacao_ave'),
            "municipios"=>$municipios)
        );
    }
//--------------------------------------------------------------------------------------------------------------------//

    public function salva(){
//      Carrega a biblioteca de validação
        $this->load->library('form_validation');
//      Modifica os delimitadores da msg de erro de <p></p>
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        // Carrega o BD de modalidades de pesca
        $auto_pesca = $this->doctrine->em->getRepository("AutorizPesca")->findAll();

        $cad_embarcacao = new Cad_embarcacao();
//      Chama mensagem de sucesso de envio
        $mensagem = $this->lang->line("salva_sucesso");

//      Salva variáveis enviados por POST do form
      $cad_embarcacao->setNome($this->input->post("nome"));
      $cad_embarcacao->setAutoPesca($this->input->post("aut_pesca"));
      $cad_embarcacao->setRegMarinha($this->input->post("reg_marinha"));
      $cad_embarcacao->setRegMpa($this->input->post("reg_mpa"));
      $cad_embarcacao->setComprimento($this->input->post("comprimento"));
      $cad_embarcacao->setArqBruta($this->input->post("arq_bruta"));
      $cad_embarcacao->setAnoFab($this->input->post("ano_fab"));
      $cad_embarcacao->setMatCasco($this->input->post("mat_casco"));
      $cad_embarcacao->setPropulsao($this->input->post("propulsao"));
      $cad_embarcacao->setPotMotor($this->input->post("pot_motor"));
      $cad_embarcacao->setTripulacao($this->input->post("tripulacao"));
      
      if ($this->input->post("municipio") && is_numeric($this->input->post("municipio"))) {
          $cad_embarcacao->setMunicipio($this->doctrine->em->find('Municipio', $this->input->post("municipio")));
      }

//      Array com as variáveis e as regras de validação
        $config = array(
            array(
                'field' => 'nome',
                'label' => 'Nome',
                'rules' => 'required|max_length[50]'
            ),
            array(
                'field' => 'aut_pesca',
                'label' => 'Autorização de Pesca',
                'rules' => 'required|max_length[150]'
            ),
            array(
                'field' => 'reg_marinha',
                'label' => 'Registro da Marinha',
                'rules' => 'required|max_length[30]'
            ),
            array(
                'field' => 'reg_mpa',
                'label' => 'Número do RGP',
                'rules' => 'required|callback_checkRegMpa|max_length[30]'
            ),
            array(
                'field' => 'comprimento',
                'label' => 'Comprimento',
                'rules' => 'required|numeric|max_length[5]'
            ),
            array(
                'field' => 'arq_bruta',
                'label' => 'Arqueação Bruta',
                'rules' => 'required|numeric|max_length[5]'
            ),
            array(
                'field' => 'ano_fab',
                'label' => 'Ano de Fabricação',
                'rules' => 'required|numeric|max_length[4]'
            ),
            array(
                'field' => 'mat_casco',
                'label' => 'Material do Casco',
                'rules' => 'max_length[50]'
            ),
            array(
                'field' => 'propulsao',
                'label' => 'Propulsão',
                'rules' => 'max_length[50]'
            ),
            array(
                'field' => 'pot_motor',
                'label' => 'Potência do Motor',
                'rules' => 'numeric|max_length[5]'
            ),
            array(
                'field' => 'tripulacao',
                'label' => 'Tripulação Máxima',
                'rules' => 'numeric|max_length[2]'
            ),
            array(
                'field' => 'municipio',
                'label' => 'Município',
                'rules' => 'required|in_array[' . Utils::findIds( 'id', 'Municipio') . ']'
            )
        );

//      Valida as variáveis do array
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("mapa_bordo/cad_embarcacao", array(
                "cad_embarcacao"=>$cad_embarcacao,
                "auto_pesca" => $auto_pesca,
                "municipios"=>$this->doctrine->em->getRepository('Municipio')->findAll()
                )
            );
        } else {
            $this->doctrine->em->persist($cad_embarcacao);
            $this->doctrine->em->flush();
            $this->session->set_flashdata('salva_cad_embarcacao', true);
            redirect('cad_embarcacao_ct/cadembarcacao');
        }

    }
//--------------------------------------------------------------------------------------------------------------------//

    // Função para checar se a espécie já existe no BD
    public function checkRegMpa($check)
    {

        $checkNome = $this->doctrine->em->getRepository("Cad_embarcacao")->findOneBy(array("reg_mpa" => $check));
        if ($checkNome == null) {
            return TRUE;
        } else {
            $this->form_validation->set_message('checkRegMpa',
                '<strong style="color:#FE0000">Essa embarcação já foi cadastrada.</strong>');
            return FALSE;
        }
    }
//--------------------------------------------------------------------------------------------------------------------//




}