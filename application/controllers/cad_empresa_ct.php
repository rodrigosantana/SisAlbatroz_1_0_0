<?php

class Cad_empresa_ct extends CI_Controller
{
    
    public function __construct() {
        parent::__construct();
        
        $this->output->set_template('sisalbatroz_template');
    }
    
    public function access_map() {
        return array(
            'cadempresa'=>'create',            
            'salva'=>'create',            
            );
    }
    
//    Cadastro de empresas

    public function cadempresa()
    {
        $this->load->view("menu");
        $this->load->view("mapa_bordo/cad_empresa", array("cad_empresa" => new Cad_empresa()));
    }

//--------------------------------------------------------------------------------------------------------------------//

    public function salva()
    {

//      Carrega a biblioteca de validação
        $this->load->library('form_validation');
//      Modifica os delimitadores da msg de erro de <p></p>
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $cad_empresa = new Cad_empresa();
//      Chama mensagem de sucesso de envio
        $mensagem = $this->lang->line("salva_sucesso");

//      Salva variáveis enviados por POST do form
        $cad_empresa->setNome($this->input->post("nome"));
        $cad_empresa->SetCidade($this->input->post("cidade"));
        $cad_empresa->setEnd($this->input->post("endereco"));
        $cad_empresa->setContato($this->input->post("contato"));
        $cad_empresa->setCargo($this->input->post("cargo"));
        $cad_empresa->setTel($this->input->post("telefone"));
        $cad_empresa->setEmail($this->input->post("email"));

//      Array com as variáveis e as regras de validação
        $config = array(
            array(
                'field' => 'nome',
                'label' => 'Nome',
                'rules' => 'required|callback_checkNome|max_length[50]'
            ),
            array(
                'field' => 'cidade',
                'label' => 'Cidade',
                'rules' => 'required|max_length[30]'
            ),
            array(
                'field' => 'endereco',
                'label' => 'Endereço',
                'rules' => 'required|max_length[225]'
            ),
            array(
                'field' => 'contato',
                'label' => 'Contato',
                'rules' => 'max_length[50]'
            ),
            array(
                'field' => 'cargo',
                'label' => 'Cargo',
                'rules' => 'max_length[50]'
            ),
            array(
                'field' => 'tel',
                'label' => 'Telefone',
                'rules' => 'max_length[11]'
            ),
            array(
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'max_length[100]'
            )
        );

//      Valida as variáveis do array
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("menu");
            $this->load->view("mapa_bordo/cad_empresa");
        } else {
            $this->doctrine->em->persist($cad_empresa);
            $this->doctrine->em->flush();
            $this->load->view("menu");
            $this->load->view("mapa_bordo/cad_empresa", array("cad_empresa" => $cad_empresa, "mensagem" => $mensagem));
        }
    }
//--------------------------------------------------------------------------------------------------------------------//

    // Função para checar se a espécie já existe no BD
    public function checkNome($check)
    {

        $checkNome = $this->doctrine->em->getRepository("Cad_empresa")->findOneBy(array("nome" => $check));
        if ($checkNome == null) {
            return TRUE;
        } else {
            $this->form_validation->set_message('checkNome',
                '<strong style="color:#FE0000">Essa empresa já foi cadastrada.</strong>');
            return FALSE;
        }
    }
//--------------------------------------------------------------------------------------------------------------------//

}
