<?php

class Cad_observ_ct extends CI_Controller {

    // Cadastro de observadores de bordo

    // Carrega a página inicial com o menu e um array em branco para o BD
    public function cadobserv(){
        $this->load->view('menu');
        // Cad_ave se refere a classe do model Cad_ave.php
        $this->load->view("mapa_bordo/cad_observ", array("cad_observ"=>new Cad_observador()));
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
        $cad_observ = new Cad_observador();

        //Chama mensagem de sucesso de envio
        $mensagem = $this->lang->line("salva_sucesso");

        //Salva variáveis enviados por POST do form
        $cad_observ ->setNome($this->input->post("nome"));
        $cad_observ ->setCpf($this->input->post("cpf"));
        $cad_observ ->setRg($this->input->post("rg"));
        $cad_observ ->setEmail($this->input->post("email"));
        $cad_observ ->setTel($this->input->post("tel"));
        $cad_observ ->setSkype($this->input->post("skype"));
        $cad_observ ->setEnd($this->input->post("end"));
        $cad_observ ->setCidade($this->input->post("cidade"));
        $cad_observ ->setUf($this->input->post("uf"));

        $config = array(
            array(
                'field' => 'nome',
                'label' => 'Nome',
                'rules' => 'required|max_length[50]'
            ),
            array(
                'field' => 'cpf',
                'label' => 'CPF',
                'rules' => 'required|integer|max_length[11]|callback_checkCpf'
            ),
            array(
                'field' => 'rg',
                'label' => 'RG',
                'rules' => 'required|integer|max_length[11]'
            ),
            array(
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'required|valid_email|max_length[100]'
            ),
            array(
                'field' => 'tel',
                'label' => 'telefone',
                'rules' => 'required|integer|max_length[50]'
            ),
            array(
                'field' => 'skype',
                'label' => 'Skype',
                'rules' => 'max_length[50]'
            ),
            array(
                'field' => 'end',
                'label' => 'Endereço',
                'rules' => 'required|max_length[200]'
            ),
            array(
                'field' => 'cidade',
                'label' => 'Cidade',
                'rules' => 'required|max_length[50]'
            ),
            array(
                'field' => 'uf',
                'label' => 'UF',
                'rules' => 'required|max_length[2]'
            ),
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("menu");
            $this->load->view("mapa_bordo/cad_observ", array("cad_observ"=>$cad_observ));
        } else {
            $this->doctrine->em->persist($cad_observ);
            $this->doctrine->em->flush();
            $this->load->view("menu");
            $this->load->view("mapa_bordo/cad_observ", array("cad_observ"=> new cad_observ, "mensagem"=>$mensagem));
        }
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


}