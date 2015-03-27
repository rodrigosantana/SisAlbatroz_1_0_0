<?php

class Mapa_bordo_ct extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->output->set_template('sisalbatroz_template');
    }
    
    public function access_map() {
        return array(
            'consulta'=>'view',
            'novo'=>'create',
            'edita'=>'edit',
            'salva'=>'create',
            'validation'=>'create',
            'exclui'=>'delete',
            );
    }
    
    
/**

C ok
R ok
U ok
D TODO

L TODO

*/


//--------------------------------------------------------------------------------------------------------------------//

    public function consulta() {
        $mapas = $this->doctrine->em->getRepository("MbGeral")->findBy(
                array(), array('idMb' => 'ASC'), 10
        );
        $this->load->view("menu");
        $this->load->view("mapa_bordo/consulta", array("mapas" => $mapas, 'mensagem'=>$this->session->flashdata('exclui_mapa_bordo')));
    }

//--------------------------------------------------------------------------------------------------------------------//

    public function novo() {
        // Consulta o BD e traz dados das tabelas
        $this->formulario(new MbGeral());
    }

//--------------------------------------------------------------------------------------------------------------------//

    public function edita() {
        $mbGeral = null;

        if ($this->input->get('id') && is_numeric($this->input->get('id'))) {
            $mbGeral = $this->doctrine->em->find('MbGeral', $this->input->get('id'));
        }
        
        if (is_null($mbGeral)) {
            die('Precisa criar a tela de erro');
            //mostra erro
        }

        $this->formulario($mbGeral);
    }

//--------------------------------------------------------------------------------------------------------------------//
    protected function formulario($mbGeral) {

        $entrevistadores = $this->doctrine->em->getRepository("CadEntrevistador")->findBy(
                array(), array('nome' => 'ASC')
        );
        $embarcacoes = $this->doctrine->em->getRepository("CadEmbarcacao")->findBy(
                array(), array('nome' => 'ASC')
        );
        $mestres = $this->doctrine->em->getRepository("CadMestre")->findBy(
                array(), array('apelido' => 'ASC')
        );
        $aves = $this->doctrine->em->getRepository("CadAves")->findBy(
                array(), array('nomeComumBr' => 'ASC')
        );

        $iscas = $this->doctrine->em->getRepository("CadIsca")->findBy(
                array(), array('nome' => 'ASC')
        );

        $medidasMetigatorias = $this->doctrine->em->getRepository("CadMedidaMetigatoria")->findBy(
                array(), array('nome' => 'ASC')
        );

        
        $this->load->view("mapa_bordo/new", array(
            "mbGeral" => $mbGeral,
            "entrevistadores" => $entrevistadores,
            "embarcacoes" => $embarcacoes,
            "mestres" => $mestres,
            "aves" => $aves,
            "iscas" => $iscas,
            "medidasMetigatorias" => $medidasMetigatorias,
            "mensagem" => $this->session->flashdata('save_mapa_bordo')
                )
        );
    }

//--------------------------------------------------------------------------------------------------------------------//

    public function salva() {

        if ($this->validation(true) !== false) {
            //mostra mensagem de erro
            //$this->load->view("layout/jsonresponse", array("erroNaoEsperado" => true));
            return;
        }
        
        $mbGeral = new MbGeral();

        if ($this->input->post('id_mb') && is_numeric($this->input->post('id_mb'))) {
            $mbGeral = $this->doctrine->em->find('MbGeral', $this->input->post('id_mb'));
        }

        $entrevistador = null;
        
        if ($this->input->post('entrevistador') && is_numeric($this->input->post('entrevistador'))) {
            $entrevistador = $this->doctrine->em->find('CadEntrevistador', $this->input->post('entrevistador'));
        }
        
        $embarcacao = $this->doctrine->em->find('CadEmbarcacao', $this->input->post('embarcacao'));
        $mestre = $this->doctrine->em->find('CadMestre', $this->input->post('mestre'));

        $mbGeral->setEntrevistador($entrevistador);
        $mbGeral->setEmbarcacao($embarcacao);
        $mbGeral->setMestre($mestre);
        $mbGeral->setPetrecho((int) $this->input->post('petrecho'));
        $mbGeral->setDataSaida(Utils::dataToDateTime($this->input->post('data_saida')));
        $mbGeral->setDataChegada(Utils::dataToDateTime($this->input->post('data_chegada')));
        
        $mbGeral->setObservacao(null);
        if ($this->input->post('obs') !== '') {
            $mbGeral->setObservacao($this->input->post('obs'));
        }

        $listaLancamentos = $mbGeral->getLances()->toArray();
        $mbGeral->getLances()->clear();
        
        foreach ($listaLancamentos as $valor) {
            $this->doctrine->em->remove($valor);
        }

        $lancamentos = $this->input->post('lancamento');

        if ($lancamentos) {
            foreach ($lancamentos as $key => $value) {
                $mbLance = new MbLance();
                if (isset($value['lance']) && is_numeric($value['lance'])) {
                    $mbLance->setLance((int)$value['lance']);
                    $mbLance->setData(Utils::dataToDateTime($value['data']));
                    
                    if (is_numeric($value['anzois'])) {
                        $mbLance->setAnzois((int)$value['anzois']);
                    }
                    
                    if (!empty($value['lat'])) {
                        $mbLance->setLatitude($value['lat']);
                    }
                    
                    if (!empty($value['lng'])) {
                        $mbLance->setLongitude($value['lng']);
                    }
                    
                    if (!empty($value['hora_ini'])) {
                        $mbLance->setHoraInicial($value['hora_ini']);
                    }
                    
                    if (!empty($value['hora_fin'])) {
                        $mbLance->setHoraFinal($value['hora_fin']);
                    }
                    
                    if (!empty($value['mm_uso'])) {
                        $mbLance->setMmUso($value['mm_uso']);
                    }
                    
                    $mbLance->setAveCapt(Utils::valorBooleano($value['ave_capt']));
                    $mbLance->getIdMm()->clear();
                    $mbLance->getIdIsca()->clear();

                    if (isset($value['mm'])) {
                        $mms = $value['mm'];

                        foreach ($mms as $mm) {
                            $object = $this->doctrine->em->find('CadMedidaMetigatoria', $mm);
                            $mbLance->addIdMm($object);
                        }
                    }
                    
                    if (isset($value['isca'])) {
                        $iscas = $value['isca'];

                        foreach ($iscas as $isca) {
                            $object = $this->doctrine->em->find('CadIsca', $isca);
                            $mbLance->addIdIsca($object);
                        }
                    }                    

                    if (isset($value['capt_especie'])) {
                        $capturas = $value['capt_especie'];

                        foreach ($capturas as $keyCp => $valueCp) {
                            if (isset($valueCp['capt_ssp']) && !empty($valueCp['capt_ssp'])) {                        
                                $especie = $this->doctrine->em->find('CadAves', $valueCp['capt_ssp']);                        

                                $mbCaptura = new MbCaptura();
                                $mbCaptura->setIdAve($especie);

                                if (is_numeric($valueCp['capt_quan'])) {
                                    $mbCaptura->setQuantidade((int) $valueCp['capt_quan']);
                                }

                                $mbLance->addCaptura($mbCaptura);
                            }
                        }
                    }

                    $mbGeral->addLance($mbLance);
                }
            }
        }
        
        $this->doctrine->em->persist($mbGeral);
        $this->doctrine->em->flush();

        $this->session->set_flashdata('save_mapa_bordo', true);
        redirect('mapa_bordo_ct/novo');
    }

//--------------------------------------------------------------------------------------------------------------------//


    public function validation($returnError = false) {
        $this->form_validation->set_rules("entrevistador", "Entrevistador", "trim|in_array[" . Utils::findIds('id', 'CadEntrevistador') . "]");
        $this->form_validation->set_rules("embarcacao", "Embarcação", "trim|required|in_array[" . Utils::findIds('idEmbarcacao', 'CadEmbarcacao') . "]");
        $this->form_validation->set_rules("mestre", "Mestre", "trim|required|in_array[" . Utils::findIds('idMestre', 'CadMestre') . "]");
        $this->form_validation->set_rules("petrecho", "Petrecho", "trim|required|in_array[" . Utils::ESPINHEL_SUPERFICIE . "," . Utils::ESPINHEL_FUNDO . "]");

        $this->form_validation->set_rules("data_saida", "Data de saída", "trim|date_validation");
        $this->form_validation->set_rules("data_chegada", "Data de chegada", "trim|date_validation");
        $this->form_validation->set_rules("obs", "Observações", "trim|max_length[500]");

        $lancamentos = $this->input->post('lancamento');

        if ($lancamentos) {
            foreach ($lancamentos as $key => $value) {
                $this->form_validation->set_rules('lancamento[' . $key . '][lance]', "Lance", "trim|required|integer");
                $this->form_validation->set_rules('lancamento[' . $key . '][data]', "Data", "trim|date_validation");
                $this->form_validation->set_rules('lancamento[' . $key . '][anzois]', "Anzois", "trim|integer");
                $this->form_validation->set_rules('lancamento[' . $key . '][lat]', "Latitude", "trim|decimal");
                $this->form_validation->set_rules('lancamento[' . $key . '][lng]', "Longitude", "trim|decimal");
                $this->form_validation->set_rules('lancamento[' . $key . '][isca]', "Isca", "trim|in_array[" . Utils::findIds('idIsca', 'CadIsca') . "]");
                $this->form_validation->set_rules('lancamento[' . $key . '][hora_ini]', "Hora inicío do lance", "trim");
                $this->form_validation->set_rules('lancamento[' . $key . '][hora_fin]', "Hora final do lance", "trim");
                $this->form_validation->set_rules('lancamento[' . $key . '][mm]', "Medida metigatória", "trim|in_array[" . Utils::findIds('idMedidaMetigatoria', 'CadMedidaMetigatoria') . "]");
                $this->form_validation->set_rules('lancamento[' . $key . '][mm_uso]', "Uso da MM", "trim|in_array[" . Utils::MM_USO_PARCIAL . "," . Utils::MM_USO_TOTAL . "]");
                $this->form_validation->set_rules('lancamento[' . $key . '][ave_capt]', "Ave capturada", "trim|boolean_validation");

                if (isset($value['capt_especie'])) {
                    $capturas = $value['capt_especie'];

                    foreach ($capturas as $keyCp => $valueCp) {
                        $this->form_validation->set_rules('lancamento[' . $key . '][capt_especie][' . $keyCp . '][capt_ssp]', "Espécie", "trim|in_array[" . Utils::findIds('idAves', 'CadAves') . "]");
                        $this->form_validation->set_rules('lancamento[' . $key . '][capt_especie][' . $keyCp . '][capt_quan]', "Espécie", "trim|integer");
                    }
                }                
            }
        }

        $this->form_validation->run();

        if ($returnError) {
            return $this->form_validation->error_array();
        }

        $return = array();
        $return["erro"] = $this->form_validation->error_array();
        $this->load->view("jsonresponse", $return);
    }

//--------------------------------------------------------------------------------------------------------------------//

    public function exclui(){
        $mapa_bordo = $this->doctrine->em->find("MbGeral", $this->input->get("id"));
        $this->doctrine->em->remove($mapa_bordo);
        $this->doctrine->em->flush();
        $this->session->set_flashdata('exclui_mapa_bordo', true);
		redirect('mapa_bordo_ct/consulta');
    }
//--------------------------------------------------------------------------------------------------------------------//


//    // Função para checar se a espécie já existe no BD
//    public function checkNome($check){
//
//        $checkNome = $this->doctrine->em->getRepository("Cad_ave")->findOneBy(array("nome_cient" => $check));
//        if ($checkNome == null){
//            return TRUE;
//        } else {
//            $this->form_validation->set_message('checkNome',
//                '<strong style="color:#FE0000">Essa espécie já foi cadastrada.</strong>');
//            return FALSE;
//        }
//    }
//--------------------------------------------------------------------------------------------------------------------//

}
