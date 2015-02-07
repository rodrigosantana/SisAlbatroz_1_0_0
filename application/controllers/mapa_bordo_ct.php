<?php
/**
 * Created by PhpStorm.
 * User: Santoro
 * Date: 27/01/2015
 * Time: 07:52
 */

class Mapa_bordo_ct extends CI_Controller {

    public function index(){
        $mapas = $this->doctrine->em->getRepository("Mapa_bordo")->findAll();

        $this->load->view("mapa_bordo/index", array("mapas"=>$mapas));
    }

    // Gera nova entrada vazia para ser enviado ao BD
    public function novo(){
        #$this->load->view("mapa_bordo/new", array("mapa_bordo"=> new Mapa_bordo()));
        $data['menu']=$this->load->view('menu');
        $this->load->view("mapa_bordo/new", $data);
    }

    public function salva(){
//      Carrega a biblioteca de validação
        $this->load->library('form_validation');
//      Modifica os delimitadores da msg de erro de <p></p>
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $mapa_bordo = new Mapa_bordo();
//      Chama mensagem de sucesso de envio
        $mensagem = $this->lang->line("salva_sucesso");

//      Salva variáveis enviados por POST do form
        $mapa_bordo->setBarco($this->input->post("barco"));

        $config = array(
            array(
                'field' => 'barco',
                'label' => 'Embarcação',
                'rules' => 'required'
            ),
            array(
                'field' => 'mestre',
                'label' => 'Mestre',
                'rules' => 'required'
            ),
            array(
                'field' => 'petre',
                'label' => 'Petrecho',
                'rules' => 'required'
            ),
            array(
                'field' => 'data_saida',
                'label' => 'Data de Saída',
                'rules' => 'required'
            ),
            array(
                'field' => 'data_chegada',
                'label' => 'Data de Chegada',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config);


        if ($this->form_validation->run() == FALSE) {
            $this->load->view("mapa_bordo/new");
        } else {
            $this->doctrine->em->persist($mapa_bordo);
            $this->doctrine->em->flush();
            $this->load->view("mapa_bordo/new", array("mapa_bordo"=>$mapa_bordo, "mensagem"=>$mensagem));
        }

    }

    public function exclui(){
        $mapa_bordo = $this->doctrine->em->find("Mapa_bordo", $this->input->get("id_mb"));
        $this->doctrine->em->remove($mapa_bordo);
        $this->doctrine->em->flush();
        $this->index("Mapa de Bordo excluído com sucesso!");
    }


}