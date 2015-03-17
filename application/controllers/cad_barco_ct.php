<?php
class Cad_barco_ct extends CI_Controller {

//    Cadastro de embarcações
    public function cadbarco(){
        // Carrega o BD de modalidades de pesca
        $auto_pesca = $this->doctrine->em->getRepository("AutorizPesca")->findAll();
        $this->load->view("menu");
        $this->load->view("mapa_bordo/cad_barco", array(
            "cad_barco" => new Cad_barco(),
            "auto_pesca" => $auto_pesca
            )
        );
    }

    public function salva(){
//      Carrega a biblioteca de validação
        $this->load->library('form_validation');
//      Modifica os delimitadores da msg de erro de <p></p>
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        // Carrega o BD de modalidades de pesca
        $auto_pesca = $this->doctrine->em->getRepository("AutorizPesca")->findAll();

        $cad_barco = new Cad_barco();
//      Chama mensagem de sucesso de envio
        $mensagem = $this->lang->line("salva_sucesso");

//      Salva variáveis enviados por POST do form
      $cad_barco->setNome($this->input->post("nome"));
      $cad_barco->setAutoPesca($this->input->post("aut_pesca"));
      $cad_barco->setRegMarinha($this->input->post("reg_marinha"));
      $cad_barco->setRegMpa($this->input->post("reg_mpa"));
      $cad_barco->setCompBarco($this->input->post("comp_barco"));
      $cad_barco->setArqBruta($this->input->post("arq_bruta"));
      $cad_barco->setAnoFab($this->input->post("ano_fab"));
      $cad_barco->setMatCasco($this->input->post("mat_casco"));
      $cad_barco->setPropulsao($this->input->post("propulsao"));
      $cad_barco->setPotMotor($this->input->post("pot_motor"));
      $cad_barco->setTripulacao($this->input->post("tripulacao"));
      $cad_barco->setMunicipio($this->input->post("municipio"));
      $cad_barco->setUf($this->input->post("uf"));

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
                'field' => 'comp_barco',
                'label' => 'Comprimento',
                'rules' => 'required|numeric|max_length[2]'
            ),
            array(
                'field' => 'arq_bruta',
                'label' => 'Arqueação Bruta',
                'rules' => 'required|numeric|max_length[2]'
            ),
            array(
                'field' => 'ano_fab',
                'label' => 'Ano de Fabricação',
                'rules' => 'required|numeric|max_length[4]'
            ),
            array(
                'field' => 'mat_casco',
                'label' => 'Material do Casco',
                'rules' => 'max_length[10]'
            ),
            array(
                'field' => 'propulsao',
                'label' => 'Propulsão',
                'rules' => 'max_length[10]'
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
                'rules' => 'required|max_length[20]'
            ),
            array(
                'field' => 'uf',
                'label' => 'UF',
                'rules' => 'required|max_length[3]'
            )
        );

//      Valida as variáveis do array
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("menu");
            $this->load->view("mapa_bordo/cad_barco", array(
                "cad_barco"=>$cad_barco,
                "auto_pesca" => $auto_pesca
                )
            );
        } else {
            $this->doctrine->em->persist($cad_barco);
            $this->doctrine->em->flush();
            $this->load->view("menu");
            $this->load->view("mapa_bordo/cad_barco", array(
                "cad_barco"=>$cad_barco,
                "auto_pesca" => $auto_pesca,
                "mensagem"=>$mensagem
                )
            );
        }

    }
//--------------------------------------------------------------------------------------------------------------------//

    // Função para checar se a espécie já existe no BD
    public function checkRegMpa($check)
    {

        $checkNome = $this->doctrine->em->getRepository("Cad_barco")->findOneBy(array("reg_mpa" => $check));
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