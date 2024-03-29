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
            'visualiza'=>'view'
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

    public function visualiza() {
        $mbGeral = null;

        if ($this->input->get('id') && is_numeric($this->input->get('id'))) {
            $mbGeral = $this->doctrine->em->find('MbGeral', $this->input->get('id'));
        }
        
        if (is_null($mbGeral)) {
            show_error('unknown_registry_error_message');
        }

        $this->formulario($mbGeral, true);
    }
//--------------------------------------------------------------------------------------------------------------------//
    protected function formulario($mbGeral, $isView = false) {

        $embarcacoes = $this->doctrine->em->getRepository("CadEmbarcacao")->findBy(
                array(), array('nome' => 'ASC')
        );
        $mestres = $this->doctrine->em->getRepository("CadMestre")->findBy(
                array(), array('apelido' => 'ASC')
        );
        $aves = $this->doctrine->em->getRepository("Ave")->findBy(
                array(), array('nomeComumBr' => 'ASC')
        );

        $iscas = $this->doctrine->em->getRepository("CadIsca")->findBy(
                array(), array('nome' => 'ASC')
        );

        $medidasMetigatorias = $this->doctrine->em->getRepository("CadMedidaMetigatoria")->findBy(
                array(), array('nome' => 'ASC')
        );

        // Preparando o array do form e populando campos do BD
        $this->load->view("mapa_bordo/new", array(
            "mbGeral" => $mbGeral,
            "embarcacoes" => $embarcacoes,
            "mestres" => $mestres,
            "aves" => $aves,
            "iscas" => $iscas,
            "medidasMetigatorias" => $medidasMetigatorias,
            "mensagem" => $this->session->flashdata('save_mapa_bordo'),
            "isView"=>$isView)
        );
    }

//--------------------------------------------------------------------------------------------------------------------//

    public function salva() {

        if ($this->validation(true) !== false) {
            show_error('generic_error_message');
            return;
        }
        
        $mbGeral = new MbGeral();
        $usuario = $this->doctrine->em->find("SystemUsers", $this->ezrbac->getCurrentUser()->id);
        $isEdita = false;        
        
        if ($this->input->post('id_mb') && is_numeric($this->input->post('id_mb'))) {
            $mbGeral = $this->doctrine->em->find('MbGeral', $this->input->post('id_mb'));
            
            if (is_null($mbGeral)) {
                show_error('unknown_registry_error_message');
            }
            
            $isEdita = true;
        }

        $embarcacao = $this->doctrine->em->find('CadEmbarcacao', $this->input->post('embarcacao'));
        $mestre = $this->doctrine->em->find('CadMestre', $this->input->post('mestre'));

        if (is_null($mbGeral->getEntrevistador())) {
            $mbGeral->setEntrevistador($usuario);
        }
        
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
                    
                    if (!empty($value['ponteira_peso'])) {
                        $mbLance->setPonteiraPeso($value['ponteira_peso']);
                    }

                    if (!empty($value['ponteira_distancia'])) {
                        $mbLance->setPonteiraDistancia($value['ponteira_distancia']);
                    }

                    if (!empty($value['mm_uso'])) {
                        $mbLance->setMmUso($value['mm_uso']);
                    }

                    if (isset($value['ave_capt'])) {
                        $mbLance->setAveCapt(Utils::valorBooleano($value['ave_capt']));
                    }
                    
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
                                $especie = $this->doctrine->em->find('Ave', $valueCp['capt_ssp']);                        

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
        
        $acao = 'salva';
        
        if ($mbGeral->getIdMb() > 0) {
            $acao = 'edita';
            $mbGeral->setDataAlteracao(new DateTime());
            $mbGeral->setUsuarioAlteracao($usuario);
        } else {
            $mbGeral->setDataInsercao(new DateTime());
            $mbGeral->setUsuarioInsercao($usuario);            
        }
        
        
        
        $this->doctrine->em->persist($mbGeral);
        $this->doctrine->em->flush();

        try {
            $userData = $this->session->all_userdata();
            $objeto = new LogSistema();
            $objeto->setDataHora(new DateTime());
            $objeto->setUsuario($usuario);
            $objeto->setController(get_class($this));
            $objeto->setAcao($acao);        
            $objeto->setIp($userData["ip_address"]);
            $dadosRequisicao = $this->input->post();
            $objeto->setDadosRequisicao($dadosRequisicao);
            $objeto->setDadosSalvos($mbGeral->toArray());

            $this->doctrine->em->persist($objeto);
            $this->doctrine->em->flush();
        } catch (Exception $exc) {
            show_error('log_system_error_message');
            return;
        }





        $mensagem = 'Registro salvo com sucesso. (Código: ' . $mbGeral->getIdMb() . ')';
        if ($isEdita) {
            $this->session->set_flashdata(get_class($this) . '_mensagem', $mensagem);
            redirect('mapa_bordo_ct/index');
        } else {
            $this->session->set_flashdata('save_mapa_bordo', $mensagem);
            redirect('mapa_bordo_ct/novo');
        }        
    }

//--------------------------------------------------------------------------------------------------------------------//

    // Validação do form CI
    public function validation($returnError = false) {
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
                $this->form_validation->set_rules('lancamento[' . $key . '][ponteira_peso]', "Ponteira peso", "trim");
                $this->form_validation->set_rules('lancamento[' . $key . '][ponteira_distancia]', "Ponteira distância", "trim");
                $this->form_validation->set_rules('lancamento[' . $key . '][ave_capt]', "Ave capturada", "trim|boolean_validation");

                if (isset($value['capt_especie'])) {
                    $capturas = $value['capt_especie'];

                    foreach ($capturas as $keyCp => $valueCp) {
                        $this->form_validation->set_rules('lancamento[' . $key . '][capt_especie][' . $keyCp . '][capt_ssp]', "Espécie", "trim|in_array[" . Utils::findIds('id', 'Ave') . "]");
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

    // Funções da tela de filtro
    protected function telaFiltro() {
        $filtro = $this->session->userdata('filtros_' . get_class($this));
        
        $entrevistadores = $this->doctrine->em->getRepository("SystemUsers")->findBy(
                array(), array('name' => 'ASC')
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
