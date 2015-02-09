<?php
// Todo Adaptar e arrumar

class Cad_ave_ct extends CI_Controller {
    // Cadastro de mestres
    public function cadave(){
        $data['menu']=$this->load->view('menu');
        $this->load->view("mapa_bordo/cad_ave", $data);
    }

    public function salva(){
//      Carrega a biblioteca de validação
        $this->load->library('form_validation');
//      Modifica os delimitadores da msg de erro de <p></p>
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $cad_ave = new Cad_ave();
//      Chama mensagem de sucesso de envio
        $mensagem = $this->lang->line("salva_sucesso");

//      Salva variáveis enviados por POST do form
//        $cad_mestre->setMestre($this->input->post("mestre"));
//        $cad_mestre->setMestre($this->input->post("mestre"));
//        $cad_mestre->setMestre($this->input->post("mestre"));
//        $cad_mestre->setMestre($this->input->post("mestre"));

        $config = array(
            array(
                'field' => 'nome',
                'label' => 'Nome',
                'rules' => 'required'
            ),
            array(
                'field' => 'nome_us',
                'label' => 'Nome em Inglês',
                'rules' => 'required'
            ),
            array(
                'field' => 'spp',
                'label' => 'Nome Científico',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("mapa_bordo/cad_ave");
        } else {
            $this->doctrine->em->persist($cad_ave);
            $this->doctrine->em->flush();
            $this->load->view("mapa_bordo/cad_ave", array("cad_ave"=>$cad_ave, "mensagem"=>$mensagem));
        }
    }
}