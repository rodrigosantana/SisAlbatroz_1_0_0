<?php

class Mapa_bordo_ct extends MY_Controller {
    
    public function __construct() {
        $this->modelClassName = 'MbGeral';
        $this->viewPath = 'mapa_bordo';
        
        parent::__construct();
    }
    
    public function access_map() {
        return array(
            'index'=>'view',
            'filter'=>'view',
            'clearfilter'=>'view',
            'novo'=>'create',
            'edita'=>'edit',
            'salva'=>'create',
            'validation'=>'create',
            'exclui'=>'delete',
            );
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
            show_error('unknown_registry_error_message');
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
            show_error('generic_error_message');
            return;
        }
        
        $mbGeral = new MbGeral();
        $isEdita = false;
        
        if ($this->input->post('id_mb') && is_numeric($this->input->post('id_mb'))) {
            $mbGeral = $this->doctrine->em->find('MbGeral', $this->input->post('id_mb'));
            
            if (is_null($mbGeral)) {
                show_error('unknown_registry_error_message');
            }
            
            $isEdita = true;
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
                    
                    if (!empty($value['lat']) && !empty($value['lng'])) {
                        $mbLance->setCoordenada(new Geometry(null, $value['lat'], $value['lng']));
                    }
                    
                    if (!empty($value['hora_ini'])) {
                        $mbLance->setHoraInicial(Utils::timeToDateTime($value['hora_ini']));
                    }
                    
                    if (!empty($value['hora_fin'])) {
                        $mbLance->setHoraFinal(Utils::timeToDateTime($value['hora_fin']));
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
        
        $usuario = $this->doctrine->em->find("Users", $this->ezrbac->getCurrentUser()->id);
        
        if ($mbGeral->getIdMb() > 0) {
            $mbGeral->setDataAlteracao(new DateTime());
            $mbGeral->setUsuarioAlteracao($usuario);
        } else {
            $mbGeral->setDataInsercao(new DateTime());
            $mbGeral->setUsuarioInsercao($usuario);            
        }
        
        $this->doctrine->em->persist($mbGeral);
        $this->doctrine->em->flush();

        
        
        if ($isEdita) {
            $this->session->set_flashdata(get_class($this) . '_mensagem', 'Registro salvo com sucesso.');
            redirect('mapa_bordo_ct/index');
        } else {
            $this->session->set_flashdata('save_mapa_bordo', true);
            redirect('mapa_bordo_ct/novo');
        }        
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
                
                if (isset($value['lng']) && !empty($value['lng']) && isset($value['lat']) && empty($value['lat'])) {
                    $this->form_validation->set_rules('lancamento[' . $key . '][lat]', "Latitude", "trim|required|valida_latitude");
                } else {
                    $this->form_validation->set_rules('lancamento[' . $key . '][lat]', "Latitude", "trim|valida_latitude");
                }
                
                if (isset($value['lat']) && !empty($value['lat']) && isset($value['lng']) && empty($value['lng'])) {
                    $this->form_validation->set_rules('lancamento[' . $key . '][lng]', "Longitude", "trim|required|valida_longitude");
                } else {
                    $this->form_validation->set_rules('lancamento[' . $key . '][lng]', "Longitude", "trim|valida_longitude");
                }
                
                
                
                $this->form_validation->set_rules('lancamento[' . $key . '][isca]', "Isca", "trim|in_array[" . Utils::findIds('idIsca', 'CadIsca') . "]");
                $this->form_validation->set_rules('lancamento[' . $key . '][hora_ini]', "Hora inicío do lance", "trim|time_validation");
                $this->form_validation->set_rules('lancamento[' . $key . '][hora_fin]', "Hora final do lance", "trim|time_validation");
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
        $this->output->_mode = MY_Output::OUTPUT_MODE_NORMAL;
        $this->load->view("jsonresponse", $return);
    }

//--------------------------------------------------------------------------------------------------------------------//

    public function exclui(){
        $mapa_bordo = $this->doctrine->em->find("MbGeral", $this->input->get("id"));
        
        if (is_null($mapa_bordo)) {
            show_error('unknown_registry_error_message');
        }
        
        $this->doctrine->em->remove($mapa_bordo);
        $this->doctrine->em->flush();
        $this->session->set_flashdata(get_class($this) . '_mensagem', 'Registro excluído com sucesso.');
		redirect('mapa_bordo_ct/index');
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

    
    protected function telaFiltro() {
        $filtro = $this->session->userdata('filtros_' . get_class($this));
        
        $entrevistadores = $this->doctrine->em->getRepository("CadEntrevistador")->findBy(
                array(), array('nome' => 'ASC')
        );
        $embarcacoes = $this->doctrine->em->getRepository("CadEmbarcacao")->findBy(
                array(), array('nome' => 'ASC')
        );
        $mestres = $this->doctrine->em->getRepository("CadMestre")->findBy(
                array(), array('apelido' => 'ASC')
        );
        
        return $this->load->view("mapa_bordo/filter", array(
            "entrevistadores" => $entrevistadores,
            "embarcacoes" => $embarcacoes,
            "mestres" => $mestres,            
            "filtro"=>$filtro
                ), true
        );
    }
    
    public function filter() {
        $filtros = array();
        
        if ($this->input->post('codigo') && is_numeric($this->input->post('codigo'))) {            
            $filtros['codigo'] = $this->input->post('codigo');
        }

        if ($this->input->post('entrevistador') && is_numeric($this->input->post('entrevistador'))) {
            $filtros['entrevistador'] = $this->input->post('entrevistador');
        }

        if ($this->input->post('embarcacao') && is_numeric($this->input->post('embarcacao'))) {
            $filtros['embarcacao'] = $this->input->post('embarcacao');
        }

        if ($this->input->post('mestre') && is_numeric($this->input->post('mestre'))) {
            $filtros['mestre'] = $this->input->post('mestre');
        }
        
        if ($this->input->post('data_saida') && !is_null(Utils::dateToDatabaseDate($this->input->post('data_saida')))) {
            $filtros['data_saida'] = Utils::dateToDatabaseDate($this->input->post('data_saida'));
        }

        if ($this->input->post('data_chegada') && !is_null(Utils::dateToDatabaseDate($this->input->post('data_chegada')))) {
            $filtros['data_chegada'] = Utils::dateToDatabaseDate($this->input->post('data_chegada'));
        }
        
        $this->session->set_userdata('filtros_' . get_class($this), $filtros);
        redirect('mapa_bordo_ct/index');
    }
    
    public function clearfilter() {
        $this->session->set_userdata('filtros_' . get_class($this), array());
        redirect('mapa_bordo_ct/index');
    }
    
    protected function filterQueryBuilder() {
        $queryBuilder = $this->doctrine->em->createQueryBuilder();
        $queryBuilder->select("r")->from("MbGeral", "r");
        $filtrosSessao = $this->session->userdata('filtros_' . get_class($this));
        $filtros = array();        
        $where = array();
        $joins = array();
        
        
        if (!empty($filtrosSessao)) {
            if (isset($filtrosSessao['codigo'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->eq('r.idMb', '?1'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(1, $filtrosSessao['codigo']);
            }

            if (isset($filtrosSessao['entrevistador'])) {
                $queryBuilder->join("r.entrevistador", "et");
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->eq('et.id', '?2'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(2, $filtrosSessao['entrevistador']);
            }

            if (isset($filtrosSessao['embarcacao'])) {
                $queryBuilder->join("r.embarcacao", "eb");
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->eq('eb.idEmbarcacao', '?3'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(3, $filtrosSessao['embarcacao']);
            }

            if (isset($filtrosSessao['mestre'])) {
                $queryBuilder->join("r.mestre", "m");
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->eq('m.idMestre', '?4'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(4, $filtrosSessao['mestre']);
            }

            if (isset($filtrosSessao['data_saida'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->eq('r.dataSaida', '?5'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(5, $filtrosSessao['data_saida']);
            }

            if (isset($filtrosSessao['data_chegada'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->eq('r.dataChegada', '?6'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(6, $filtrosSessao['data_chegada']);
            }
        }
        
        $query = $queryBuilder->getQuery();
            
        return $query;
    }
}
