<?php
/**
 * Created by PhpStorm.
 * User: Santoro
 * Date: 27/01/2015
 * Time: 07:52
 */

class Cad_barco_ct extends CI_Controller {
//    Cadastro de embarcações
    public function cadbarco(){
        $this->load->view("menu");
        $this->load->view("mapa_bordo/cad_barco", array("cad_barco" => new Cad_barco()));
    }

    public function salva(){
//      Carrega a biblioteca de validação
        $this->load->library('form_validation');
//      Modifica os delimitadores da msg de erro de <p></p>
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
// TODO Descrever melhor essa variável Cria um novo array do cadastro de embarcação com todas as variáveis
        $cad_barco = new Cad_barco();
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
                'field' => 'aut_pesca',
                'label' => 'Autorização de Pesca',
                'rules' => 'required'
            ),
            array(
                'field' => 'registro',
                'label' => 'Registro da Marinha',
                'rules' => 'required'
            ),
            array(
                'field' => 'rgp',
                'label' => 'Número do RGP',
                'rules' => 'required'
            ),
            array(
                'field' => 'comp',
                'label' => 'Comprimento',
                'rules' => 'required|numeric'
            ),
            array(
                'field' => 'arq_bruta',
                'label' => 'Arqueação Bruta',
                'rules' => 'required|numeric'
            ),
            array(
                'field' => 'fabricacao',
                'label' => 'Ano de Fabricação',
                'rules' => 'required|numeric'
            ),
            array(
                'field' => 'material',
                'label' => 'Material do Casco',
                'rules' => 'required'
            ),
            array(
                'field' => 'propul',
                'label' => 'Propulsão',
                'rules' => ''
            ),
            array(
                'field' => 'potenc',
                'label' => 'Potência do Motor',
                'rules' => 'numeric'
            ),
            array(
                'field' => 'tripulacao',
                'label' => 'Tripulação Máxima',
                'rules' => 'numeric'
            ),
            array(
                'field' => 'uf',
                'label' => 'UF - Município',
                'rules' => 'required'
            )
        );

//      Valida as variáveis do array
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("mapa_bordo/cad_barco");
        } else {
            $this->doctrine->em->persist($cad_barco);
            $this->doctrine->em->flush();
            $this->load->view("mapa_bordo/cad_barco", array("cad_barco"=>$cad_barco, "mensagem"=>$mensagem));
        }

    }

}