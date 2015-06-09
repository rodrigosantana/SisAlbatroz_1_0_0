<?php

class ObservadorBordo extends MY_Controller {
    
    private $lances;
    private $boias;    
    
    public function __construct() {        
        $this->modelClassName = 'Cruzeiro';
        $this->viewPath = 'observador_bordo';
        $this->lances = array();
        $this->boias = array();
        
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
            'validaproducaopesqueira'=>'create',
            'exclui'=>'delete',
            );
    }

//--------------------------------------------------------------------------------------------------------------------//
    public function novo() {
        $this->formulario(new Cruzeiro());
    }
    
    public function edita() {
        $objeto = null;

        if ($this->input->get('id') && is_numeric($this->input->get('id'))) {
            $objeto = $this->doctrine->em->find('Cruzeiro', $this->input->get('id'));
        }
        
        if (is_null($objeto)) {
            show_error('unknown_registry_error_message');
        }
        
        $this->formulario($objeto);
    }
    
    protected function formulario($objeto) {
        $observadores = $this->doctrine->em->getRepository("CadObservador")->findBy(
                array(), array('nome' => 'ASC')
        );        
        $embarcacoes = $this->doctrine->em->getRepository("CadEmbarcacao")->findBy(
                array(), array('nome' => 'ASC')
        );
        $mestres = $this->doctrine->em->getRepository("CadMestre")->findBy(
                array(), array('nome' => 'ASC')
        );
        
        $empresas = $this->doctrine->em->getRepository("Cad_Empresa")->findBy(
                array(), array('nome' => 'ASC')
        );
        
        $financiadores = $this->doctrine->em->getRepository("CadFinanciador")->findBy(
                array(), array('nome' => 'ASC')
        );
        
        $especies = $this->doctrine->em->getRepository('Pescado')->findAll();
        
        $iscas = $this->doctrine->em->getRepository("CadIsca")->findBy(
                array(), array('nome' => 'ASC')
        );
        
        $aves = $this->doctrine->em->getRepository("Ave")->findBy(
                array(), array('nomeCientifico' => 'ASC')
        );
        
        $lances = $objeto->getDadosAbioticos()->toArray();
        $listaLances = array();
        
        foreach ($lances as $lance) {
            $listaLances[] = array('id'=>$lance->getId(), 'value'=>$lance->getLance());
        }
        
        $boias = $objeto->getContagemAveBoia()->toArray();
        $listaBoias = array();
        
        foreach ($boias as $boia) {
            $listaBoias[] = array('id'=>$boia->getId(), 'value'=>$boia->getBoiaRadio());
        }

        //echo '<pre>'; var_dump($aves);die;
        
        $this->load->view($this->viewPath . '/new', array(
                'cruzeiro'=>$objeto, 
                'mensagem'=>$this->session->flashdata('save_observador_bordo'),
                'especies'=>$especies,
                'observadores'=>$observadores,
                'embarcacoes'=>$embarcacoes,
                'mestres'=>$mestres,
                'empresas'=>$empresas,
                'financiadores'=>$financiadores,
                'iscas'=>$iscas,
                'aves'=>$aves,
                'lances'=>$lances,
                'boias'=>$boias,
                'listaLances'=>json_encode($listaLances),
                'listaBoias'=>json_encode($listaBoias)
            )
        );
    }

//--------------------------------------------------------------------------------------------------------------------//

    public function salva() {

        if ($this->validation(true) !== false) {
            show_error('generic_error_message');
            return;
        }
        
        $cruzeiro = new Cruzeiro();
        $lances = array();
        $boias = array();
        $isEdita = false;
        
        if ($this->input->post('id') && is_numeric($this->input->post('id'))) {
            $cruzeiro = $this->doctrine->em->find('Cruzeiro', $this->input->post('id'));
            
            if (is_null($cruzeiro)) {
                show_error('unknown_registry_error_message');
            }
            
            $isEdita = true;
        }
                
        $cruzeiro->setObservador($this->doctrine->em->find('CadObservador', $this->input->post('observador')));
        $cruzeiro->setEmbarcacao($this->doctrine->em->find('CadEmbarcacao', $this->input->post('embarcacao')));
        $cruzeiro->setMestre();
        $cruzeiro->setEmpresa();
        $cruzeiro->setFinanciador();
        $cruzeiro->setDataSaida(Utils::dataToDateTime($this->input->post('data_saida')));
        $cruzeiro->setDataChegada(Utils::dataToDateTime($this->input->post('data_chegada')));
        $cruzeiro->setObservacao(null);
        
        if (is_numeric($this->input->post('mestre'))) {
            $cruzeiro->setMestre($this->doctrine->em->find('CadMestre', $this->input->post('mestre')));
        }
        
        if (is_numeric($this->input->post('empresa'))) {
            $cruzeiro->setEmpresa($this->doctrine->em->find('Cad_empresa', $this->input->post('empresa')));
        }
        
        if (is_numeric($this->input->post('financiador'))) {
            $cruzeiro->setFinanciador($this->doctrine->em->find('CadFinanciador', $this->input->post('financiador')));
        }

        if ($this->input->post('observacao') && $this->input->post('observacao') !== '') {
            $cruzeiro->setObservacao($this->input->post('observacao'));            
        }
        
        $listaDadosAbioticos = $cruzeiro->getDadosAbioticos()->toArray();
        $cruzeiro->getDadosAbioticos()->clear();
        
        foreach ($listaDadosAbioticos as $valor) {
            $this->doctrine->em->remove($valor);
        }
        
        $dadosAbioticos = $this->input->post('dado_abiotico') === false ? array() : $this->input->post('dado_abiotico');
        
        if ($dadosAbioticos) {
            foreach ($dadosAbioticos as $key => $value) {
                if (isset($value['lance']) && is_numeric($value['lance'])) {
                    $dadoAbiotico = new DadosAbioticos();
                    $dadoAbiotico->setLance((int)$value['lance']);
                    
                    if (isset($value['tipo_isca']) && is_numeric($value['tipo_isca'])) {
                        $tipoIsca = $this->doctrine->em->find('CadIsca', $value['tipo_isca']);
                        $dadoAbiotico->setTipoIsca($tipoIsca);
                    }

                    if (isset($value['anzois']) && is_numeric($value['anzois'])) {
                        $dadoAbiotico->setAnzois((int)$value['anzois']);
                    }

                    if (isset($value['reg_peso'])) {
                        $dadoAbiotico->setRegPeso(Utils::valorBooleano($value['reg_peso']));
                    }

                    if (isset($value['toriline'])) {
                        $dadoAbiotico->setToriline(Utils::valorBooleano($value['toriline']));
                    }

                    if (isset($value['isca_tingida'])) {
                        $dadoAbiotico->setIscaTingida(Utils::valorBooleano($value['isca_tingida']));
                    }

                    $array = array('lancamento', 'recolhimento');

                    foreach ($array as $v) {

                        $valueInicio = $value[$v]['inicio'];
                        $valueFim = $value[$v]['fim'];

                        if ($v == 'lancamento') {
                            $object = new DadosAbioticosLancamento();
                        } else {
                            $object = new DadosAbioticosRecolhimento();
                        }

                        if (!empty($valueInicio['lat']) && !empty($valueInicio['lng'])) {
                            $object->setCoordenadaInicio(new Geometry(null, $valueInicio['lat'], $valueInicio['lng']));
                        }

                        if (!empty($valueFim['lat']) && !empty($valueFim['lng'])) {
                            $object->setCoordenadaFim(new Geometry(null, $valueFim['lat'], $valueFim['lng']));
                        }
                        
                        $object->setDataInicio(Utils::dateAndTimeToDateTime($valueInicio['data'], $valueInicio['hora']));
                        $object->setDataFim(Utils::dateAndTimeToDateTime($valueFim['data'], $valueFim['hora']));

                        if (!empty($valueInicio['profundidade'])) {
                            $object->setProfundidadeInicio((int)$valueInicio['profundidade']);
                        }

                        if (!empty($valueFim['profundidade'])) {
                            $object->setProfundidadeFim((int)$valueFim['profundidade']);
                        }

                        if (!empty($valueInicio['rumo'])) {
                            $object->setRumoInicio($valueInicio['rumo']);
                        }

                        if (!empty($valueFim['rumo'])) {
                            $object->setRumoFim($valueFim['rumo']);
                        }

                        if (!empty($valueInicio['direcao_vento'])) {
                            $object->setDirecaoVentoInicio($valueInicio['direcao_vento']);
                        }

                        if (!empty($valueFim['direcao_vento'])) {
                            $object->setDirecaoVentoFim($valueFim['direcao_vento']);
                        }

                        if (!empty($valueInicio['velocidade_vento'])) {
                            $object->setVelocidadeVentoInicio((int)$valueInicio['velocidade_vento']);
                        }

                        if (!empty($valueFim['velocidade_vento'])) {
                            $object->setVelocidadeVentoFim((int)$valueFim['velocidade_vento']);
                        }                    

                        if (!empty($valueInicio['categoria_mar'])) {
                            $object->setCategoriaMarInicio((int)$valueInicio['categoria_mar']);
                        }

                        if (!empty($valueFim['categoria_mar'])) {
                            $object->setCategoriaMarFim((int)$valueFim['categoria_mar']);
                        }

                        if (!empty($valueInicio['temperatura_ar'])) {
                            $object->setTemperaturaArInicio((int)$valueInicio['temperatura_ar']);
                        }

                        if (!empty($valueFim['temperatura_ar'])) {
                            $object->setTemperaturaArFim((int)$valueFim['temperatura_ar']);
                        }                    

                        if (!empty($valueInicio['temperatura_sup_mar'])) {
                            $object->setTemperaturaSupMarInicio((int)$valueInicio['temperatura_sup_mar']);
                        }

                        if (!empty($valueFim['temperatura_sup_mar'])) {
                            $object->setTemperaturaSupMarFim((int)$valueFim['temperatura_sup_mar']);
                        }                    

                        if (!empty($valueInicio['cobertura_ceu'])) {
                            $object->setCoberturaCeuInicio((int)$valueInicio['cobertura_ceu']);
                        }

                        if (!empty($valueFim['cobertura_ceu'])) {
                            $object->setCoberturaCeuFim((int)$valueFim['cobertura_ceu']);
                        }

                        if (!empty($valueInicio['pressao_atmosferica'])) {
                            $object->setPressaoAtmosfericaInicio((int)$valueInicio['pressao_atmosferica']);
                        }

                        if (!empty($valueFim['pressao_atmosferica'])) {
                            $object->setPressaoAtmosfericaFim((int)$valueFim['pressao_atmosferica']);
                        }

                        if ($v == 'lancamento') {
                            $dadoAbiotico->setDadosAbioticosLancamento($object);
                        } else {
                            $dadoAbiotico->setDadosAbioticosRecolhimento($object);
                        }

                    }

                    $lances[$value['id']] = $dadoAbiotico;
                    $cruzeiro->addDadoAbiotico($dadoAbiotico);
                }
            }
        }
        
        $listaContagemPorSol = $cruzeiro->getContagemPorSol()->toArray();
        $cruzeiro->getContagemPorSol()->clear();
        
        foreach ($listaContagemPorSol as $valor) {
            $this->doctrine->em->remove($valor);
        }
        
        $contagensPorSol = $this->input->post('contagem_por_sol') === false ? array() : $this->input->post('contagem_por_sol');
        
        if ($contagensPorSol) {
            foreach ($contagensPorSol as $value) {
                if (isset($value['data'])) {                    
                    $contagemPorSol = new ContagemPorSol();
                    
                    $contagemPorSol->setData(Utils::dataToDateTime($value['data']));
                    $contagemPorSol->setHoraPorSol(Utils::timeToDateTime($value['hora']));

                    if (!empty($value['lat']) && !empty($value['lng'])) {
                        $contagemPorSol->setCoordenada(new Geometry(null, $value['lat'], $value['lng']));
                    }
                    
                    if (isset($value['lance']) && array_key_exists($value['lance'], $lances)) {
                        $contagemPorSol->setLance($lances[$value['lance']]);
                    }
                    
                    if (isset($value['toriline'])) {
                        $contagemPorSol->setToriline(Utils::valorBooleano($value['toriline']));
                    }
                    
                    if (isset($value['isca_tingida'])) {
                        $contagemPorSol->setIscaTingida(Utils::valorBooleano($value['isca_tingida']));
                    }                    
                    
                    if (isset($value['observacao']) && !empty($value['observacao'])) {
                        $contagemPorSol->setObservacao($value['observacao']);
                    }
                    
                    if (isset($value['contagem_psi'])) {
                        $contagensPsi = $value['contagem_psi'];
                        
                        foreach ($contagensPsi as $keyPsi => $contagemPsi) {
                            if (isset($value['indice']) && is_numeric($value['indice'])) {
                                $contagemPorSolIndice = new ContagemPorSolIndice();                            
                            
                                $contagemPorSolIndice->setIndice((int)$value['indice']);
                                
                                if (isset($value['contagem_hora']) && !empty($value['contagem_hora'])) {
                                    $contagemPorSolIndice->setHora(Utils::timeToDateTime($value['contagem_hora']));
                                }

                                if (isset($value['total']) && is_numeric($value['total'])) {
                                    $contagemPorSolIndice->setTotal((int)$value['total']);
                                }
                                
                                if (isset($contagemPsi['cps_especie'])) {
                                    $especies = $contagemPsi['cps_especie'];

                                    foreach ($especies as $keyEp => $especie) {

                                        if (isset($especie['especie']) && is_numeric($especie['especie'])) {
                                            $ep = $this->doctrine->em->find('Ave', $especie['especie']);                        

                                            $contagemPorSolEspecie = new ContagemPorSolEspecie();
                                            $contagemPorSolEspecie->setEspecie($ep);                                

                                            if (is_numeric($especie['quantidade'])) {
                                                $contagemPorSolEspecie->setQuantidade((int)$especie['quantidade']);
                                            }

                                            $contagemPorSolIndice->addContagemPorSolEspecie($contagemPorSolEspecie);
                                        }
                                    }
                                }
                                
                                $contagemPorSol->addContagemPorSolIndice($contagemPorSolIndice);
                            }
                        }
                    }
                    
                    $cruzeiro->addContagemPorSol($contagemPorSol);
                }
            }
        }    
        
        $listaContagemAveBoia = $cruzeiro->getContagemAveBoia()->toArray();
        $cruzeiro->getContagemAveBoia()->clear();
        
        foreach ($listaContagemAveBoia as $valor) {
            $this->doctrine->em->remove($valor);
        }
        
        $contagensAveBoia = $this->input->post('contagem_ave_boia') === false ? array() : $this->input->post('contagem_ave_boia');
        
        foreach ($contagensAveBoia as $key => $value) {
            if (isset($value['lance']) && array_key_exists($value['lance'], $lances)) {
                $contagemAveBoia = new ContagemAveBoia();
                $contagemAveBoia->setLance($lances[$value['lance']]);
                
                if (is_numeric($value['boia_radio'])) {
                    $contagemAveBoia->setBoiaRadio((int)$value['boia_radio']);
                }
                
                $contagemAveBoia->setDataHora(Utils::dateAndTimeToDateTime($value['data'], $value['hora']));

                if (!empty($value['temperatura_agua'])) {
                    $contagemAveBoia->setTemperaturaAgua((double)$value['temperatura_agua']);
                }
                
                if (!empty($value['profundidade'])) {
                    $contagemAveBoia->setProfundidade((int)$value['profundidade']);
                }
                
                if (!empty($value['pressao_atmosferica'])) {
                    $contagemAveBoia->setPressaoAtmosferica((double)$value['pressao_atmosferica']);
                }
                
                if (!empty($value['lat']) && !empty($value['lng'])) {
                    $contagemAveBoia->setCoordenada(new Geometry(null, $value['lat'], $value['lng']));
                }
                
                if (isset($value['cab_especie'])) {
                    $especies = $value['cab_especie'];

                    foreach ($especies as $keyEp => $especie) {

                        if (isset($especie['especie']) && is_numeric($especie['especie'])) {
                            $ep = $this->doctrine->em->find('Ave', $especie['especie']);                        

                            $contagemAveBoiaEspecie = new ContagemAveBoiaEspecie();
                            $contagemAveBoiaEspecie->setEspecie($ep);

                            if (is_numeric($especie['quantidade'])) {
                                $contagemAveBoiaEspecie->setQuantidade((int)$especie['quantidade']);
                            }

                            $contagemAveBoia->addContagemAveEspecieBoia($contagemAveBoiaEspecie);
                        }
                    }
                }
                
                $boias[$value['id']] = $contagemAveBoia;
                $cruzeiro->addContagemAveBoia($contagemAveBoia);
            }
        }
        
        
        $listaCapturaIncidental = $cruzeiro->getCapturaIncidental()->toArray();
        $cruzeiro->getCapturaIncidental()->clear();
        
        foreach ($listaCapturaIncidental as $valor) {
            $this->doctrine->em->remove($valor);
        }
        
        $capturasIncidentais = $this->input->post('captura_incidental') === false ? array() : $this->input->post('captura_incidental');
        
        if ($capturasIncidentais) {
            foreach ($capturasIncidentais as $value) {
                if (isset($value['lance']) && array_key_exists($value['lance'], $lances)) {
                    $capturaIncidental = new CapturaIncidental();
                    $capturaIncidental->setLance($lances[$value['lance']]);
                    
                    $capturaIncidental->setData(Utils::dataToDateTime($value['data']));
                    
                    if (isset($value['boia_radio']) && isset($boias[$value['boia_radio']])) {
                        $capturaIncidental->setBoiaRadio($boias[$value['boia_radio']]);
                    }
                    
                    if (!empty($value['lat']) && !empty($value['lng'])) {
                        $capturaIncidental->setCoordenada(new Geometry(null, $value['lat'], $value['lng']));
                    }
                    
                    if (isset($value['ci_especie'])) {
                        $especies = $value['ci_especie'];

                        foreach ($especies as $keyEp => $especie) {
                            if (isset($especie['especie']) && is_numeric($especie['especie'])) {
                                $capturaIncidentalEspecie = new CapturaIncidentalEspecie();
                                
                                $ep = $this->doctrine->em->find('Ave', $especie['especie']);                        
                                $capturaIncidentalEspecie->setEspecie($ep);
                                
                                if (isset($especie['etiqueta']) && is_numeric($especie['etiqueta'])) {
                                    $capturaIncidentalEspecie->setEtiqueta((int)$especie['etiqueta']);
                                }                                
                             
                                if (isset($especie['quantidade']) && is_numeric($especie['quantidade'])) {
                                    $capturaIncidentalEspecie->setQuantidade((int)$especie['quantidade']);
                                }
                                
                                $capturaIncidental->addCapturaIncidentalEspecie($capturaIncidentalEspecie);
                            }
                        }
                    }
                    
                    $cruzeiro->addCapturaIncidental($capturaIncidental);
                }   
            }
        }

        
        $listaProducoesPesqueiras = $cruzeiro->getProducoesPesqueiras()->toArray();
        $cruzeiro->getProducoesPesqueiras()->clear();
        
        foreach ($listaProducoesPesqueiras as $valor) {
            $this->doctrine->em->remove($valor);
        }

        $producoes = $this->input->post('producao') === false ? array() : $this->input->post('producao');
        
        if ($producoes) {
            foreach ($producoes as $key => $value) {
                if (isset($value['lance']) && array_key_exists($value['lance'], $lances)) {
                    $producao = new ProducaoPesqueira();
                    
                    $producao->setLance($lances[$value['lance']]);
                    $producao->setData(Utils::dataToDateTime($value['data']));
                    
                    if (isset($value['boia_radio']) && isset($boias[$value['boia_radio']])) {
                        $producao->setBoiaRadio($boias[$value['boia_radio']]);
                    }
                    
                    if (isset($value['pp_especie'])) {
                        $especies = $value['pp_especie'];

                        foreach ($especies as $keyEp => $especie) {
                            
                            if (isset($especie['especie']) && is_numeric($especie['especie'])) {
                                $ep = $this->doctrine->em->find('Pescado', $especie['especie']);                        

                                $producaoPesqueiraEspecie = new ProducaoPesqueiraEspecie();
                                $producaoPesqueiraEspecie->setEspecie($ep);
                                

                                if (is_numeric($especie['quantidade'])) {
                                    $producaoPesqueiraEspecie->setQuantidade((int)$especie['quantidade']);
                                }
                                
                                if (!empty($especie['predacao'])) {
                                    $producaoPesqueiraEspecie->setPredacao($especie['predacao']);
                                }
                                
                                $producao->addEspecie($producaoPesqueiraEspecie);
                            }
                        }
                    }

                    $cruzeiro->addProducaoPesqueira($producao);
                }
            }
        }
        
        $usuario = $this->doctrine->em->find("SystemUsers", $this->ezrbac->getCurrentUser()->id);
        
        if ($cruzeiro->getId() > 0) {
            $cruzeiro->setDataAlteracao(new DateTime());
            $cruzeiro->setUsuarioAlteracao($usuario);
        } else {
            $cruzeiro->setDataInsercao(new DateTime());
            $cruzeiro->setUsuarioInsercao($usuario);            
        }
        
        $this->doctrine->em->persist($cruzeiro);
        $this->doctrine->em->flush();
        
        $mensagem = 'Registro salvo com sucesso. (Código: ' . $cruzeiro->getId() . ')';        
        if ($isEdita) {
            $this->session->set_flashdata(get_class($this) . '_mensagem', $mensagem);
            redirect('observadorbordo/index');
        } else {
            $this->session->set_flashdata('save_observador_bordo', $mensagem);
            redirect('observadorbordo/novo');
        }        
    }

//--------------------------------------------------------------------------------------------------------------------//


    public function validation($returnError = false) {
        $this->form_validation->set_rules('observador', "Observador", "trim|required|in_array[" . Utils::findIds('idObserv', 'CadObservador') . "]");
        $this->form_validation->set_rules('embarcacao', "Embarcação", "trim|required|in_array[" . Utils::findIds('idEmbarcacao', 'CadEmbarcacao') . "]");        
        $this->form_validation->set_rules('mestre', "Nome do mestre", "trim|in_array[" . Utils::findIds('idMestre', 'CadMestre') . "]");        
        $this->form_validation->set_rules('empresa', "Empresa", "trim|in_array[" . Utils::findIds('id_empresa', 'Cad_empresa') . "]");
        $this->form_validation->set_rules('financiador', "Financiador", "trim|in_array[" . Utils::findIds('id', 'CadFinanciador') . "]");
        $this->form_validation->set_rules('data_saida', "Data de saída", "trim|date_validation");
        $this->form_validation->set_rules('data_chegada', "Data de retorno", "trim|date_validation");
        $this->form_validation->set_rules('observacao', "Observações", "trim");
        
        $this->dadosAbioticosValidation();        
        $this->contagemPorSolValidation();
        $this->contagemAveBoiaValidation();
        $this->capturasAcidentaisValidation();        
        $this->producaoPesqueiraValidation();
                
        $this->form_validation->run();

        if ($returnError) {
            return $this->form_validation->error_array();
        }

        $return = array();
        $return["erro"] = $this->form_validation->error_array();
        $this->output->_mode = MY_Output::OUTPUT_MODE_NORMAL;
        $this->load->view("jsonresponse", $return);
    }
    
    
    
    
    
    protected function dadosAbioticosValidation() {
        $dadosAbioticos = $this->input->post('dado_abiotico');
        
        if ($dadosAbioticos === false) {
            return;
        }
        
        foreach ($dadosAbioticos as $key => $dadoAbiotico) {
            $this->lances[] = $dadoAbiotico['id'];
            $this->form_validation->set_rules('dado_abiotico[' . $key . '][lance]', "Lance", "trim|required|integer");
            $this->form_validation->set_rules('dado_abiotico[' . $key . '][tipo_isca]', "Tipo de isca", "trim|in_array[" . Utils::findIds('idIsca', 'CadIsca') . "]");
            $this->form_validation->set_rules('dado_abiotico[' . $key . '][anzois]', "Anzóis", "trim|integer");
            $this->form_validation->set_rules('dado_abiotico[' . $key . '][reg_peso]', "Reg. peso", "trim|boolean_validation");
            $this->form_validation->set_rules('dado_abiotico[' . $key . '][toriline]', "Toriline", "trim|boolean_validation");
            $this->form_validation->set_rules('dado_abiotico[' . $key . '][isca_tingida]', "Isca tingida", "trim|boolean_validation");
            
            /*
             * Para não repetir as linhas de código de validação para lancamento 
             * e recolhimento utilizou as chaves do array.
             */
            $array = array('lancamento', 'recolhimento');
            
            foreach ($array as $v) {
                $nameInicio = 'dado_abiotico['.$key.']['.$v.'][inicio]';
                $nameFim = 'dado_abiotico['.$key.']['.$v.'][fim]';
                $valueInicio = $dadoAbiotico[$v]['inicio'];
                $valueFim = $dadoAbiotico[$v]['fim'];
                
                //Validando os dados de ínicio de lançamento e recolhimento ---------------------------------------------------------------------------------------------
                if (isset($valueInicio['lng']) && !empty($valueInicio['lng']) && isset($valueInicio['lat']) && empty($valueInicio['lat'])) {
                    $this->form_validation->set_rules($nameInicio.'[lat]', "Latitude", "trim|required|valida_latitude");
                } else {
                    $this->form_validation->set_rules($nameInicio.'[lat]', "Latitude", "trim|valida_latitude");
                }
                
                if (isset($valueInicio['lat']) && !empty($valueInicio['lat']) && isset($valueInicio['lng']) && empty($valueInicio['lng'])) {
                    $this->form_validation->set_rules($nameInicio.'[lng]', "Longitude", "trim|required|valida_longitude");
                } else {
                    $this->form_validation->set_rules($nameInicio.'[lng]', "Longitude", "trim|valida_longitude");
                }
                
                $this->form_validation->set_rules($nameInicio.'[data]', "Data", "trim|date_validation");
                $this->form_validation->set_rules($nameInicio.'[hora]', "Hora", "trim|time_validation");
                
                $this->form_validation->set_rules($nameInicio.'[profundidade]', "Profundidade", "trim|integer");
                
                $this->form_validation->set_rules($nameInicio.'[rumo]', "Rumo", "trim|in_array[" . implode(',', Utils::indRumo()) . "]");
                $this->form_validation->set_rules($nameInicio.'[direcao_vento]', "Direção do vento", "trim|in_array[" . implode(',', Utils::indDirecaoVento()) . "]");
                $this->form_validation->set_rules($nameInicio.'[velocidade_vento]', "Velocidade do vento (nós)", "trim|integer");
                
                $this->form_validation->set_rules($nameInicio.'[categoria_mar]', "Categoria do mar", "trim|in_array[1,2,3,4,5,6,7,8,9,10,11,12]");
                
                $this->form_validation->set_rules($nameInicio.'[temperatura_ar]', "Temperatura do ar (°C)", "trim|integer");
                $this->form_validation->set_rules($nameInicio.'[temperatura_sup_mar]', "Temperatura sup. mar (°C)", "trim|integer");
                
                $this->form_validation->set_rules($nameInicio.'[cobertura_ceu]', "Cobertura do céu", "trim|in_array[1,2,3,4,5,6,7,8]");

                $this->form_validation->set_rules($nameInicio.'[pressao_atmosferica]', "Pressão atmosférica", "trim|integer");
                //-----------------------------------------------------------------------------------------------------------------------------------------------------------
                
                
                //Validando os dados de término de lançamento e recolhimento ---------------------------------------------------------------------------------------------
                if (isset($valueFim['lng']) && !empty($valueFim['lng']) && isset($valueFim['lat']) && empty($valueFim['lat'])) {
                    $this->form_validation->set_rules($nameFim.'[lat]', "Latitude", "trim|required|valida_latitude");
                } else {
                    $this->form_validation->set_rules($nameFim.'[lat]', "Latitude", "trim|valida_latitude");
                }
                
                if (isset($valueFim['lat']) && !empty($valueFim['lat']) && isset($valueFim['lng']) && empty($valueFim['lng'])) {
                    $this->form_validation->set_rules($nameFim.'[lng]', "Longitude", "trim|required|valida_longitude");
                } else {
                    $this->form_validation->set_rules($nameFim.'[lng]', "Longitude", "trim|valida_longitude");
                }
                
                $this->form_validation->set_rules($nameFim.'[data]', "Data", "trim|date_validation");
                $this->form_validation->set_rules($nameFim.'[hora]', "Hora", "trim|time_validation");
                
                $this->form_validation->set_rules($nameFim.'[profundidade]', "Profundidade", "trim|integer");
                
                $this->form_validation->set_rules($nameFim.'[rumo]', "Rumo", "trim|in_array[" . implode(',', Utils::indRumo()) . "]");
                $this->form_validation->set_rules($nameFim.'[direcao_vento]', "Direção do vento", "trim|in_array[" . implode(',', Utils::indDirecaoVento()) . "]");
                $this->form_validation->set_rules($nameFim.'[velocidade_vento]', "Velocidade do vento (nós)", "trim|integer");
                
                $this->form_validation->set_rules($nameFim.'[categoria_mar]', "Categoria do mar", "trim|in_array[1,2,3,4,5,6,7,8,9,10,11,12]");
                
                $this->form_validation->set_rules($nameFim.'[temperatura_ar]', "Temperatura do ar (°C)", "trim|integer");
                $this->form_validation->set_rules($nameFim.'[temperatura_sup_mar]', "Temperatura sup. mar (°C)", "trim|integer");
                
                $this->form_validation->set_rules($nameFim.'[cobertura_ceu]', "Cobertura do céu", "trim|in_array[1,2,3,4,5,6,7,8]");

                $this->form_validation->set_rules($nameFim.'[pressao_atmosferica]', "Pressão atmosférica", "trim|integer");
                //-----------------------------------------------------------------------------------------------------------------------------------------------------------
                
            }
            
        }
    }


    protected function contagemPorSolValidation() {
        $contagensPorSol = $this->input->post('contagem_por_sol');
        
        if ($contagensPorSol === false) {
            return;
        }
        
        foreach ($contagensPorSol as $key => $contagemPorSol) {
            $this->form_validation->set_rules('contagem_por_sol[' . $key . '][data]', "Data", "trim|required|date_validation");
            $this->form_validation->set_rules('contagem_por_sol[' . $key . '][hora]', "Horário do por-do-sol", "trim|time_validation");
            
            if (isset($contagemPorSol['lng']) && !empty($contagemPorSol['lng']) && isset($contagemPorSol['lat']) && empty($contagemPorSol['lat'])) {
                $this->form_validation->set_rules('contagem_por_sol[' . $key . '][lat]', "Latitude", "trim|required|valida_latitude");
            } else {
                $this->form_validation->set_rules('contagem_por_sol[' . $key . '][lat]', "Latitude", "trim|valida_latitude");
            }
                
            if (isset($contagemPorSol['lat']) && !empty($contagemPorSol['lat']) && isset($contagemPorSol['lng']) && empty($contagemPorSol['lng'])) {
                $this->form_validation->set_rules('contagem_por_sol[' . $key . '][lng]', "Longitude", "trim|required|valida_longitude");
            } else {
                $this->form_validation->set_rules('contagem_por_sol[' . $key . '][lng]', "Longitude", "trim|valida_longitude");
            }
                
            $this->form_validation->set_rules('contagem_por_sol[' . $key . '][lance]', "Lance", "trim|callback_lace_validation[" . implode(',', $this->lances) . "]");
                   
            $this->form_validation->set_rules('contagem_por_sol[' . $key . '][toriline]', "Toriline", "trim|boolean_validation");
            $this->form_validation->set_rules('contagem_por_sol[' . $key . '][isca_tingida]', "Isca tingida", "trim|boolean_validation");
            
            $this->form_validation->set_rules('contagem_por_sol[' . $key . '][observacao]', "Observações", "trim");
            
            
            if (isset($contagemPorSol['contagem_psi'])) {
                $contagensPsi = $contagemPorSol['contagem_psi'];
                
                foreach ($contagensPsi as $keyPsi => $contagemPsi) {
                    $this->form_validation->set_rules('contagem_por_sol[' . $key . '][contagem_psi][' . $keyPsi . '][indice]', "Índice da contagem", "trim|required|integer");
                    $this->form_validation->set_rules('contagem_por_sol[' . $key . '][contagem_psi][' . $keyPsi . '][contagem_hora]', "Hora", "trim|time_validation");
                    $this->form_validation->set_rules('contagem_por_sol[' . $key . '][contagem_psi][' . $keyPsi . '][total]', "Total", "trim|integer");
                    
                    if (isset($contagemPsi['cps_especie'])) {
                        $especies = $contagemPsi['cps_especie'];

                        foreach ($especies as $keyEp => $especie) {
                            $this->form_validation->set_rules('contagem_por_sol[' . $key . '][contagem_psi][' . $keyPsi . '][cps_especie][' . $keyEp . '][especie]', "Espécie", "trim|required|in_array[" . Utils::findIds('id', 'Ave') . "]");
                            $this->form_validation->set_rules('contagem_por_sol[' . $key . '][contagem_psi][' . $keyPsi . '][cps_especie][' . $keyEp . '][quantidade]', "Quantidade", "trim|integer");
                        }
                    }
                }
            }
        }
    }


    protected function capturasAcidentaisValidation() {
        $capturasIncidentais = $this->input->post('captura_incidental');
        
        if ($capturasIncidentais === false) {
            return;
        }
        
        foreach ($capturasIncidentais as $key => $capturaIncidental) {
            $this->form_validation->set_rules('captura_incidental[' . $key . '][lance]', "Lance", "trim|required|callback_lace_validation[" . implode(',', $this->lances) . "]");
            $this->form_validation->set_rules('captura_incidental[' . $key . '][data]', "Data", "trim|date_validation");

            $this->form_validation->set_rules('captura_incidental[' . $key . '][boia_radio]', "Boia rádio", "trim|callback_boia_validation[" . implode(',', $this->boias) . "]");
            
            if (isset($capturaIncidental['lng']) && !empty($capturaIncidental['lng']) && isset($capturaIncidental['lat']) && empty($capturaIncidental['lat'])) {
                $this->form_validation->set_rules('captura_incidental[' . $key . '][lat]', "Latitude", "trim|required|valida_latitude");
            } else {
                $this->form_validation->set_rules('captura_incidental[' . $key . '][lat]', "Latitude", "trim|valida_latitude");
            }
                
            if (isset($capturaIncidental['lat']) && !empty($capturaIncidental['lat']) && isset($capturaIncidental['lng']) && empty($capturaIncidental['lng'])) {
                $this->form_validation->set_rules('captura_incidental[' . $key . '][lng]', "Longitude", "trim|required|valida_longitude");
            } else {
                $this->form_validation->set_rules('captura_incidental[' . $key . '][lng]', "Longitude", "trim|valida_longitude");
            }
            
            if (isset($capturaIncidental['ci_especie'])) {
                $especies = $capturaIncidental['ci_especie'];

                foreach ($especies as $keyEp => $especie) {
                    $this->form_validation->set_rules('captura_incidental[' . $key . '][ci_especie][' . $keyEp . '][etiqueta]', "Etiqueta", "trim|integer");
                    $this->form_validation->set_rules('captura_incidental[' . $key . '][ci_especie][' . $keyEp . '][especie]', "Espécie", "trim|required|in_array[" . Utils::findIds('id', 'Ave') . "]");
                    $this->form_validation->set_rules('captura_incidental[' . $key . '][ci_especie][' . $keyEp . '][quantidade]', "Quantidade", "trim|integer");
                }
            }
            
        }
    }

    
    protected function contagemAveBoiaValidation() {
        $contagensAveBoia = $this->input->post('contagem_ave_boia');
        
        if ($contagensAveBoia === false) {
            return;
        }        
        
        foreach ($contagensAveBoia as $key => $contagemAveBoia) {
            $this->boias[] = $contagemAveBoia['id'];
            $this->form_validation->set_rules('contagem_ave_boia[' . $key . '][lance]', "Lance", "trim|required|callback_lace_validation[" . implode(',', $this->lances) . "]");
            $this->form_validation->set_rules('contagem_ave_boia[' . $key . '][boia_radio]', "Boia rádio", "trim|integer");
            
            
            if (!empty($contagemAveBoia['hora']) && empty($contagemAveBoia['data'])) {
                $this->form_validation->set_rules('contagem_ave_boia[' . $key . '][data]', "Data", "trim|required|date_validation");
            } else {
                $this->form_validation->set_rules('contagem_ave_boia[' . $key . '][data]', "Data", "trim|date_validation");
            }
            
            if (!empty($contagemAveBoia['data']) && empty($contagemAveBoia['hora'])) {
                $this->form_validation->set_rules('contagem_ave_boia[' . $key . '][hora]', "Hora", "trim|required|time_validation");
            } else {
                $this->form_validation->set_rules('contagem_ave_boia[' . $key . '][hora]', "Hora", "trim|time_validation");
            }
            
            $this->form_validation->set_rules('contagem_ave_boia[' . $key . '][temperatura_agua]', "Temperatura da água (°C)", "trim|decimal");
            $this->form_validation->set_rules('contagem_ave_boia[' . $key . '][profundidade]', "Profundidade (metros)", "trim|integer");
            $this->form_validation->set_rules('contagem_ave_boia[' . $key . '][pressao_atmosferica]', "Pressão atmosférica", "trim|decimal");
            
            
            if (isset($contagemAveBoia['lng']) && !empty($contagemAveBoia['lng']) && isset($contagemAveBoia['lat']) && empty($contagemAveBoia['lat'])) {
                $this->form_validation->set_rules('contagem_ave_boia[' . $key . '][lat]', "Latitude", "trim|required|valida_latitude");
            } else {
                $this->form_validation->set_rules('contagem_ave_boia[' . $key . '][lat]', "Latitude", "trim|valida_latitude");
            }
                
            if (isset($contagemAveBoia['lat']) && !empty($contagemAveBoia['lat']) && isset($contagemAveBoia['lng']) && empty($contagemAveBoia['lng'])) {
                $this->form_validation->set_rules('contagem_ave_boia[' . $key . '][lng]', "Longitude", "trim|required|valida_longitude");
            } else {
                $this->form_validation->set_rules('contagem_ave_boia[' . $key . '][lng]', "Longitude", "trim|valida_longitude");
            }
            
            if (isset($contagemAveBoia['cab_especie'])) {
                $especies = $contagemAveBoia['cab_especie'];

                foreach ($especies as $keyEp => $especie) {
                    $this->form_validation->set_rules('contagem_ave_boia[' . $key . '][cab_especie][' . $keyEp . '][especie]', "Espécie", "trim|required|in_array[" . Utils::findIds('id', 'Ave') . "]");
                    $this->form_validation->set_rules('contagem_ave_boia[' . $key . '][cab_especie][' . $keyEp . '][quantidade]', "Quantidade", "trim|integer");
                }
            }
        }
    }

    
    protected function producaoPesqueiraValidation() {
        $producoes = $this->input->post('producao');
        
        if ($producoes === false) {
            return;
        }
        
        foreach ($producoes as $key => $producao) {
            $this->form_validation->set_rules('producao[' . $key . '][lance]', "Lance", "trim|required|callback_lace_validation[" . implode(',', $this->lances) . "]");
            $this->form_validation->set_rules('producao[' . $key . '][data]', "Data", "trim|date_validation");
            $this->form_validation->set_rules('producao[' . $key . '][boia_radio]', "Boia rádio", "trim|callback_boia_validation[" . implode(',', $this->boias) . "]");
            
            if (isset($producao['pp_especie'])) {
                $especies = $producao['pp_especie'];

                foreach ($especies as $keyEp => $especie) {
                    $this->form_validation->set_rules('producao[' . $key . '][pp_especie][' . $keyEp . '][especie]', "Espécie", "trim|required|in_array[" . Utils::findIds('id', 'Pescado') . "]");
                    $this->form_validation->set_rules('producao[' . $key . '][pp_especie][' . $keyEp . '][quantidade]', "Quantidade", "trim|integer");
                    $this->form_validation->set_rules('producao[' . $key . '][pp_especie][' . $keyEp . '][predacao]', "Predação", "trim|max_length[255]");
                }
            } 
        }
    }
//--------------------------------------------------------------------------------------------------------------------//

    public function exclui(){
        $objeto = $this->doctrine->em->find("Cruzeiro", $this->input->get("id"));
        
        if (is_null($objeto)) {
            show_error('unknown_registry_error_message');
        }             
        
        $this->doctrine->em->remove($objeto);
        $this->doctrine->em->flush();
        $this->session->set_flashdata(get_class($this) . '_mensagem', 'Registro excluído com sucesso.');
		redirect('observadorbordo/index');
    }
    
//--------------------------------------------------------------------------------------------------------------------//

    
    
//--------------------------------------------------------------------------------------------------------------------//    
    protected function telaFiltro() {
        $filtro = $this->session->userdata('filtros_' . get_class($this));
        
        $observadores = $this->doctrine->em->getRepository("CadObservador")->findBy(
                array(), array('nome' => 'ASC')
        );
        $embarcacoes = $this->doctrine->em->getRepository("CadEmbarcacao")->findBy(
                array(), array('nome' => 'ASC')
        );
        $mestres = $this->doctrine->em->getRepository("CadMestre")->findBy(
                array(), array('apelido' => 'ASC')
        );
        
        return $this->load->view("observador_bordo/filter", array(
            "observadores" => $observadores,
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

        if ($this->input->post('observador') && is_numeric($this->input->post('observador'))) {
            $filtros['observador'] = $this->input->post('observador');
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
        redirect('observadorbordo/index');
    }
    
    public function clearfilter() {
        $this->session->set_userdata('filtros_' . get_class($this), array());
        redirect('observadorbordo/index');
    }
    
    protected function filterQueryBuilder() {
        $queryBuilder = $this->doctrine->em->createQueryBuilder();
        $queryBuilder->select("r")->from("Cruzeiro", "r");
        $filtrosSessao = $this->session->userdata('filtros_' . get_class($this));
        
        if (!empty($filtrosSessao)) {
            if (isset($filtrosSessao['codigo'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->eq('r.id', '?1'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(1, $filtrosSessao['codigo']);
            }

            if (isset($filtrosSessao['observador'])) {
                $queryBuilder->join("r.observador", "et");
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->eq('et.idObserv', '?2'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(2, $filtrosSessao['observador']);
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
    
    
    public function lance_validation($str, $list) {
        if (empty($str)) {
            return true;
        }
        
        $array = explode(',', $list);
        
        if (in_array($str, $array)) {
            return true;
        }
        
        $this->form_validation->set_message('lance_validation', 'O valor informado não existe.');
        return false;
    }
    
    public function boia_validation($str, $list) {
        
        if (empty($str)) {
            return true;
        }
        
        $array = explode(',', $list);
        
        if (in_array($str, $array)) {
            return true;
        }
        
        $this->form_validation->set_message('boia_validation', 'O valor informado não existe.');
        return false;
    }
}
