<?php
/**
 * Created by PhpStorm.
 * User: Santoro
 * Date: 27/01/2015
 * Time: 07:52
 */

class Cad_empresa_ct extends CI_Controller {
//    Cadastro de empresas
    public function cadempresa(){
        $this->load->view("menu");
        $this->load->view("mapa_bordo/cad_empresa", array("cad_empresa" => new Cad_empresa()));
    }

    public function salva(){
//      Carrega a biblioteca de validação
        $this->load->library('form_validation');
//      Modifica os delimitadores da msg de erro de <p></p>
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
// TODO Descrever melhor essa variável Cria um novo array do cadastro de embarcação com todas as variáveis
        $cad_empresa = new Cad_empresa();
//      Chama mensagem de sucesso de envio
        $mensagem = $this->lang->line("salva_sucesso");

//        TODO adicionar vars POST
//      Salva variáveis enviados por POST do form
//      $cad_barco->setNome($this->input->post("nome"));
//      $cad_barco->setAuto($this->input->post("aut_pesca"));
//      $cad_barco->setReg($this->input->post("registro"));
//      $cad_barco->setRGP($this->input->post("rgp"));
//      $cad_barco->setComp($this->input->post("comp"));
//      $cad_barco->setArq($this->input->post("arq_bruta"));
//      $cad_barco->setFab($this->input->post("fabricacao"));
//      $cad_barco->setMat($this->input->post("material"));
//      $cad_barco->setTrip($this->input->post("nome"));
//      $cad_barco->setUf($this->input->post("nome"));

//      Array com as variáveis e as regras de validação
        $config = array(
            array(
                'field' => 'nome',
                'label' => 'Nome',
                'rules' => 'required'
            ),
            array(
                'field' => 'cnpj',
                'label' => 'CNPJ',
                'rules' => ''
            ),
            array(
                'field' => 'cidade',
                'label' => 'Cidade',
                'rules' => 'required'
            ),
            array(
                'field' => 'end',
                'label' => 'Endereço',
                'rules' => 'required'
            ),
            array(
                'field' => 'contato',
                'label' => 'Contato',
                'rules' => ''
            ),
            array(
                'field' => 'cargo',
                'label' => 'Cargo',
                'rules' => ''
            ),
            array(
                'field' => 'tel',
                'label' => 'Telefone',
                'rules' => ''
            ),
            array(
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => ''
            )
        );

//      Valida as variáveis do array
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("mapa_bordo/cad_empresa");
        } else {
            $this->doctrine->em->persist($cad_empresa);
            $this->doctrine->em->flush();
            $this->load->view("mapa_bordo/cad_empresa", array("cad_empresa"=>$cad_empresa, "mensagem"=>$mensagem));
        }

    }

}