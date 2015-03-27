<?php

class Cad_ave_ct extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->output->set_template('sisalbatroz_template');
    }
    
    public function access_map() {
        return array(
            'cadave'=>'create',
            'salva'=>'create'
            );
    }
    
    // Cadastro de aves marinhas

    // Carrega a página inicial com o menu e um array em branco para o BD
    public function cadave(){
        // Cad_ave se refere a classe do model Cad_ave.php
        $this->load->view("mapa_bordo/cad_ave", array("cad_ave"=>new Cad_ave(), "mensagem"=>$this->session->flashdata('salva_cad_ave')));
        // Debugger
        //$this->output->enable_profiler(true);

    }

//--------------------------------------------------------------------------------------------------------------------//
    // Salva as variáveis, valida o form e envia para o banco.
    public function salva(){
        // Carrega a biblioteca de validação
        $this->load->library('form_validation');
        // Modifica os delimitadores da msg de erro de <p></p>
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        // Prepara um novo form par ser enviado ao banco
        $cad_ave = new Cad_ave();

      //Chama mensagem de sucesso de envio
      $mensagem = $this->lang->line("salva_sucesso");

        //Salva variáveis enviados por POST do form
        $cad_ave ->setNomeBr($this->input->post("nome_br"));
        $cad_ave ->setNomeEn($this->input->post("nome_en"));
        $cad_ave ->setNomeCient($this->input->post("nome_cient"));

        $config = array(
            array(
                'field' => 'nome_br',
                'label' => 'Nome comum',
                'rules' => 'required|max_length[50]'
            ),
            array(
                'field' => 'nome_en',
                'label' => 'Nome comum em inglês',
                'rules' => 'required|max_length[50]'
            ),
            array(
                'field' => 'nome_cient',
                'label' => 'Nome Científico',
                'rules' => 'required|callback_checkNome|max_length[50]'
            )
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("mapa_bordo/cad_ave", array("cad_ave"=>new Cad_ave()));
            $this->load->view("menu");
        } else {
            $this->doctrine->em->persist($cad_ave);
            $this->doctrine->em->flush();
            $this->session->set_flashdata('salva_cad_ave', true);
            redirect('cad_ave_ct/cadave');
        }
    }
//--------------------------------------------------------------------------------------------------------------------//

    // Função para checar se a espécie já existe no BD
    public function checkNome($check){

        $checkNome = $this->doctrine->em->getRepository("Cad_ave")->findOneBy(array("nome_cient" => $check));
        if ($checkNome == null){
            return TRUE;
        } else {
            $this->form_validation->set_message('checkNome',
                '<strong style="color:#FE0000">Essa espécie já foi cadastrada.</strong>');
            return FALSE;
        }
    }


}