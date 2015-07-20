<?php

class Cad_mestre_ct extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->output->set_template('sisalbatroz_template');
    }
    
    public function access_map() {
        return array(
            'cadmestre'=>'create',            
            'salva'=>'create',            
            );
    }
    
    // Cadastro de mestres

    // Carrega a página inicial com o menu e um array em branco para o BD
    public function cadmestre(){
        // Cad_mestre se refere a classe do model Cad_mestre.php
        $this->load->view("mapa_bordo/cad_mestre", array("cad_mestre"=> new Cad_mestre, "mensagem"=>$this->session->flashdata('salva_cad_mestre')));
    }
//--------------------------------------------------------------------------------------------------------------------//

    public function salva(){
//      Carrega a biblioteca de validação
        $this->load->library('form_validation');
//      Modifica os delimitadores da msg de erro de <p></p>
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
//      Cria um array do form para ser enviado ao BD
        $cad_mestre = new Cad_mestre();
//      Chama mensagem de sucesso de envio
        $mensagem = $this->lang->line("salva_sucesso");

//      Salva variáveis enviados por POST do form
        $cad_mestre->setNome($this->input->post("nome"));
        $cad_mestre->setApel($this->input->post("apelido"));
        $cad_mestre->setTel($this->input->post("telefone"));
        $cad_mestre->setEmail($this->input->post("email"));

//      Regras de validação do form
        $config = array(
            array(
                'field' => 'nome',
                'label' => 'Nome',
                'rules' => 'max_length[50]'
            ),
            array(
                'field' => 'apelido',
                'label' => 'Apelido',
                'rules' => 'required|callback_check|max_length[20]'
            ),
            array(
                'field' => 'telefone',
                'label' => 'Telefone',
                'rules' => 'numeric|max_length[11]'
            ),
            array(
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'valid_email|max_length[100]'
            )
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("mapa_bordo/cad_mestre", array("cad_mestre"=> new Cad_mestre()));
        } else {
            $this->doctrine->em->persist($cad_mestre);
            $this->doctrine->em->flush();
            $this->session->set_flashdata('salva_cad_mestre', true);
            redirect('cad_mestre_ct/cadmestre');
        }
    }
//--------------------------------------------------------------------------------------------------------------------//

    // Função para checar se a espécie já existe no BD
    public function check($check){

        $checkApe = $this->doctrine->em->getRepository("Cad_mestre")->findOneBy(array("apelido" => $check));
        if ($checkApe == null){
            return TRUE;
        } else {
            $this->form_validation->set_message('check',
                '<strong style="color:#FE0000">Este Mestre já foi cadastrado.</strong>');
            return FALSE;
        }
    }


}