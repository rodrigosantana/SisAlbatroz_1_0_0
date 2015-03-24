<?php

class Mapa_bordo_ct extends CI_Controller {

//--------------------------------------------------------------------------------------------------------------------//

    public function consulta(){
        $mapas = $this->doctrine->em->getRepository("Mb_geral")->findBy(
            array(),
            array('id_mb'=>'ASC'),
            10
        );
        $this->load->view("menu");
        $this->load->view("mapa_bordo/consulta", array("mapas"=>$mapas));
    }
//--------------------------------------------------------------------------------------------------------------------//

    public function novo(){
        // Consulta o BD e traz dados das tabelas
        $observadores = $this->doctrine->em->getRepository("CadObservador")->findBy(
            array(),
            array('nome'=>'ASC')
        );
        $embarcacoes = $this->doctrine->em->getRepository("CadEmbarcacao")->findBy(
            array(),
            array('nome'=>'ASC')
        );
        $mestres = $this->doctrine->em->getRepository("CadMestre")->findBy(
            array(),
            array('apelido'=>'ASC')
        );
        $aves = $this->doctrine->em->getRepository("CadAves")->findBy(
            array(),
            array('nomeComumBr'=>'ASC')
        );
        
        $iscas = $this->doctrine->em->getRepository("CadIsca")->findBy(
            array(),
            array('nome'=>'ASC')
        );
        
        $medidasMetigatorias = $this->doctrine->em->getRepository("CadMedidaMetigatoria")->findBy(
            array(),
            array('nome'=>'ASC')
        );

        $this->load->view('menu');
        $this->load->view("mapa_bordo/new", array(
            "mbGeral"=> new MbGeral(),
//            "mb_lance"=> new Mb_lance(),
            "observadores"=> $observadores,
            "embarcacoes"=> $embarcacoes,
            "mestres"=> $mestres,
            "aves"=> $aves,
            "iscas"=>$iscas,
            "medidasMetigatorias"=>$medidasMetigatorias,
            "countLance"=>0
            )
        );
    }
//--------------------------------------------------------------------------------------------------------------------//

    public function salva(){
//      Carrega a biblioteca de validação
        $this->load->library('form_validation');
//      Modifica os delimitadores da msg de erro de <p></p>
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $observadores = $this->doctrine->em->getRepository("cad_observador")->findBy(
            array(),
            array('nome'=>'ASC')
        );
        $embarcacoes = $this->doctrine->em->getRepository("cad_embarcacao")->findBy(
            array(),
            array('nome'=>'ASC')
        );
        $mestres = $this->doctrine->em->getRepository("cad_mestre")->findBy(
            array(),
            array('apelido'=>'ASC')
        );
        $aves = $this->doctrine->em->getRepository("cad_ave")->findBy(
            array(),
            array('nome_br'=>'ASC')
        );

        $mb_geral = new Mb_geral();
        $mb_lance = new Mb_lance();

//      Chama mensagem de sucesso de envio
        $mensagem = $this->lang->line("salva_sucesso");

//      Salva variáveis enviados por POST do form
        $mb_geral->setObservador($this->input->post("observador"));
        $mb_geral->setEmbarcacao($this->input->post("embarcacao"));
        $mb_geral->setMestre($this->input->post("mestre"));
        $mb_geral->setPetrecho($this->input->post("petre"));
        $mb_geral->setDataSaida($this->input->post("data_saida"));
        $mb_geral->setDataChegada($this->input->post("data_chegada"));
        $mb_geral->setObs($this->input->post("obs"));

        $mb_lance->setLance($this->input->post("lance"));
        $mb_lance->setData($this->input->post("data"));
        $mb_lance->setAnzois($this->input->post("anzois"));
        $mb_lance->setLatitude($this->input->post("lat"));
        $mb_lance->setLongitude($this->input->post("long"));
        $mb_lance->setHoraInicial($this->input->post("hora_ini"));
        $mb_lance->setHoraFinal($this->input->post("hora_fin"));
        $mb_lance->setMmUso($this->input->post("mm_uso"));
        $mb_lance->setAveCapt($this->input->post("ave_capt"));

//        Regras de validação do form
         $config = array(
             array(
                 'field' => 'embarcacao',
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
             ),
//             array(
//                 'field' => 'L1_lance',
//                 'label' => 'L#1 Lance',
//                 'rules' => 'required|numeric'
//             ),
//             array(
//                 'field' => 'L1_lance_data',
//                 'label' => 'L#1 Data',
//                 'rules' => 'required'
//             ),
//             array(
//                 'field' => 'L1_anzois',
//                 'label' => 'L#1 Anzois',
//                 'rules' => 'required|numeric'
//             ),
//             array(
//                 'field' => 'L1_lance_lat',
//                 'label' => 'L#1 Latitude',
//                 'rules' => 'required'
//             ),
//             array(
//                 'field' => 'L1_lance_long',
//                 'label' => 'L#1 Longitude',
//                 'rules' => 'required'
//             ),
//             array(
//                 'field' => 'L1_isca[]',
//                 'label' => 'L#1 Isca',
//                 'rules' => 'required'
//             ),
//             array(
//                 'field' => 'L1_lance_hora_ini',
//                 'label' => 'L#1 Hora Início do Lance',
//                 'rules' => 'required'
//             ),
//             array(
//                 'field' => 'L1_lance_hora_fin',
//                 'label' => 'L#1 Hora Final do Lance',
//                 'rules' => 'required'
//             ),
//             array(
//                 'field' => 'L1_mm_tipo[]',
//                 'label' => 'L#1 Medida Mitigatória',
//                 'rules' => 'required'
//             ),
//             array(
//                 'field' => 'L1_mm_uso',
//                 'label' => 'L#1 Uso da MM',
//                 'rules' => 'required'
//             ),
//             array(
//                 'field' => 'L1_ave_capt',
//                 'label' => 'L#1 Ave Capturada',
//                 'rules' => 'required'
//             )
         );
 //      Validação de acordo com as regras definidas acima
         $this->form_validation->set_rules($config);

// //      Validação condicional de espécie e quant quando ave capturada = sim
//         if ($this->input->post('L1_ave_capt') == 's'){
//             $config2 = array(
//                 array(
//                     'field' => 'L1_capt_spp1[]',
//                     'label' => 'L#1 Espécie',
//                     'rules' => 'required'
//                 ),
//                 array(
//                     'field' => 'L1_capt_quant1[]',
//                     'label' => 'L#1 Quantidade',
//                     'rules' => 'required'
//                 )
//             );
//             $this->form_validation->set_rules($config2);
//         }else {
//             $config3 = array(
//                 array(
//                     'field' => 'L1_capt_spp[]',
//                     'label' => 'L#1 Espécie',
//                     'rules' => ''
//                 ),
//                 array(
//                     'field' => 'L1_capt_quant[]',
//                     'label' => 'L#1 Quantidade',
//                     'rules' => ''
//                 )
//             );
//             $this->form_validation->set_rules($config3);
//         };

//      Efetiva a validação e retorna os resultados
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("menu");
            $this->load->view("mapa_bordo/new", array(
                "mapa_bordo"=> new Mb_geral(),
                "mb_lance"=> new Mb_lance(),
                "observadores"=> $observadores,
                "embarcacoes"=> $embarcacoes,
                "mestres"=> $mestres,
                "aves"=> $aves
                )
            );
        } else {
            $this->doctrine->em->persist($mb_geral);
            $this->doctrine->em->flush();
            $this->load->view("menu");
            $this->load->view("mapa_bordo/new", array(
                "mapa_bordo"=> new Mb_geral(),
                "mb_lance"=> new Mb_lance(),
                "observadores"=> $observadores,
                "embarcacoes"=> $embarcacoes,
                "mestres"=> $mestres,
                "aves"=> $aves,
                "mensagem"=>$mensagem
                )
            );
        }
    }
//--------------------------------------------------------------------------------------------------------------------//

    
    public function validation() {
        echo '<pre>';var_dump($this->input->post());die;
        
        $this->form_validation->set_rules("observador", "Observador", "trim|required|in_array[" . Utils::findIds('idObserv', 'CadObservador') . "]");
        $this->form_validation->set_rules("embarcacao", "Embarcação", "trim|required|in_array[" . Utils::findIds('idEmbarcacao', 'CadEmbarcacao') . "]");
        $this->form_validation->set_rules("mestre", "Mestre", "trim|required|in_array[" . Utils::findIds('idMestre', 'CadMestre') . "]");
        $this->form_validation->set_rules("petrecho", "Petrecho", "trim|required|in_array[" . Utils::ESPINHEL_SUPERFICIE . "," . Utils::ESPINHEL_FUNDO . "]");
        
        $this->form_validation->set_rules("data_saida", "Data de saída", "trim|required|date_validation");        
        $this->form_validation->set_rules("data_chegada", "Data de chegada", "trim|required|date_validation");
        $this->form_validation->set_rules("obs", "Observações", "trim");
        
        $lancamentos = $this->input->post('lancamento');
        
        if ($lancamentos) {
            foreach ($lancamentos as $key => $value) {
                $this->form_validation->set_rules('lancamento['.$key.'][lance]', "Lance", "trim|required|integer");
                
                $this->form_validation->set_rules('lancamento['.$key.'][data]', "Data", "trim|required|date_validation");
                $this->form_validation->set_rules('lancamento['.$key.'][anzois]', "Anzois", "trim|required|integer");
                $this->form_validation->set_rules('lancamento['.$key.'][lat]', "Latitude", "trim|required|integer");
                $this->form_validation->set_rules('lancamento['.$key.'][lng]', "Longitude", "trim|required|integer");
                $this->form_validation->set_rules('lancamento['.$key.'][isca]', "Isca", "trim|required|in_array[" . Utils::findIds('idIsca', 'CadIsca') . "]");                
                $this->form_validation->set_rules('lancamento['.$key.'][hora_ini]', "Hora inicío do lance", "trim|required");
                $this->form_validation->set_rules('lancamento['.$key.'][hora_fin]', "Hora final do lance", "trim|required");
                $this->form_validation->set_rules('lancamento['.$key.'][mm]', "Medida metigatória", "trim|required|in_array[" . Utils::findIds('idMedidaMetigatoria', 'CadMedidaMetigatoria') . "]");
                $this->form_validation->set_rules('lancamento['.$key.'][mm_uso]', "Uso da MM", "trim|required|in_array[" . Utils::MM_USO_PARCIAL . "," . Utils::MM_USO_TOTAL . "]");
                $this->form_validation->set_rules('lancamento['.$key.'][ave_capt]', "Ave capturada", "trim|required|boolean_validation");
                
                $capturas = $value['capt_especie'];
                
                foreach ($capturas as $keyCp => $valueCp) {
                    $this->form_validation->set_rules('lancamento['.$key.'][capt_especie]['.$keyCp.'][capt_ssp]', "Espécie", "trim|required|in_array[" . Utils::findIds('idAves', 'CadAves') . "]");
                    $this->form_validation->set_rules('lancamento['.$key.'][capt_especie]['.$keyCp.'][capt_quan]', "Espécie", "trim|required|integer");
                }
            }
        }
        
        
    }
    
    
    
    
    
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

//    public function exclui(){
//        $mapa_bordo = $this->doctrine->em->find("Mapa_bordo", $this->input->get("id_mb"));
//        $this->doctrine->em->remove($mapa_bordo);
//        $this->doctrine->em->flush();
//        $this->index("Mapa de Bordo excluído com sucesso!");
//    }


}