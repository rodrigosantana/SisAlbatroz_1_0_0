<?php

class Cad_mestre_ct extends CI_Controller {
    // Cadastro de mestres
    public function cadmestre(){
        $data['menu']=$this->load->view('menu');
        $this->load->view("mapa_bordo/cad_mestre", $data);
    }

    public function salvamestre(){
//      Carrega a biblioteca de validação
        $this->load->library('form_validation');
//      Modifica os delimitadores da msg de erro de <p></p>
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $cad_mestre = new Cad_mestre();
//      Chama mensagem de sucesso de envio
        $mensagem = $this->lang->line("salva_sucesso");

//      Salva variáveis enviados por POST do form
        $cad_mestre->setMestre($this->input->post("mestre"));

        $config = array(
            array(
                'field' => 'mestre',
                'label' => 'Mestre',
                'rules' => 'required'
            ),
            array(
                'field' => 'telefone',
                'label' => 'Telefone',
                'rules' => 'numeric'
            )
        );

        $this->form_validation->set_rules($config);


        if ($this->form_validation->run() == FALSE) {
            $this->load->view("mapa_bordo/cad-mestre");
        } else {
            $this->doctrine->em->persist($mapa_bordo);
            $this->doctrine->em->flush();
            $this->load->view("mapa_bordo/cad-mestre", array("mapa_bordo"=>$mapa_bordo, "mensagem"=>$mensagem));
        }
    }
}