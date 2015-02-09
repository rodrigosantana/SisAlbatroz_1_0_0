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
//            array(
//                'field' => 'petre',
//                'label' => 'Petrecho',
//                'rules' => 'required'
//            ),
//            array(
//                'field' => 'data_saida',
//                'label' => 'Data de Saída',
//                'rules' => 'required'
//            ),
//            array(
//                'field' => 'data_chegada',
//                'label' => 'Data de Chegada',
//                'rules' => 'required'
//            )
            array(
                'field' => 'L1_lance',
                'label' => 'L#1 Lance',
                'rules' => 'required|numeric'
            ),
            array(
                'field' => 'L1_lance_data',
                'label' => 'L#1 Data',
                'rules' => 'required'
            ),
            array(
                'field' => 'L1_anzois',
                'label' => 'L#1 Anzois',
                'rules' => 'required|numeric'
            ),
            array(
                'field' => 'L1_lance_lat',
                'label' => 'L#1 Latitude',
                'rules' => 'required'
            ),
            array(
                'field' => 'L1_lance_long',
                'label' => 'L#1 Longitude',
                'rules' => 'required'
            ),
            array(
                'field' => 'L1_isca[]',
                'label' => 'L#1 Isca',
                'rules' => 'required'
            ),
            array(
                'field' => 'L1_lance_hora_ini',
                'label' => 'L#1 Hora Início do Lance',
                'rules' => 'required'
            ),
            array(
                'field' => 'L1_lance_hora_fin',
                'label' => 'L#1 Hora Final do Lance',
                'rules' => 'required'
            ),
            array(
                'field' => 'L1_mm_tipo[]',
                'label' => 'L#1 Medida Mitigatória',
                'rules' => 'required'
            ),
            array(
                'field' => 'L1_mm_uso',
                'label' => 'L#1 Uso da MM',
                'rules' => 'required'
            ),
            array(
                'field' => 'L1_ave_capt',
                'label' => 'L#1 Ave Capturada',
                'rules' => 'required'
            ),
        );
//      Roda a validação de acordo com as regras do array
        $this->form_validation->set_rules($config);

//      todo validar para no mínimo 1 espécie, não sendo necessário para as 4
//      Validação condicional de espécie quando ave capturada = sim
        if ($this->input->post('L1_ave_capt') == 's'){
            $this->form_validation->set_rules('L1_capt_spp[]', 'L#1 Espécie', 'required');
        }else {
            $this->form_validation->set_rules('L1_capt_spp[]', 'L#1 Espécie', '');
        };
//      Validação condicional de quantida quando houver alguma espécie selecionada
//        if ($this->input->post('L1_capt_spp[]') != ''){
//            $this->form_validation->set_rules('L1_capt_quant[]', 'L#1 Quantidade', 'required');
//        }else {
//            $this->form_validation->set_rules('L1_capt_quant[]', 'L#1 Quantidade', '');
//        };



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