<?php

class EntrevistaCaisCt extends MY_Controller {
    
    public function __construct() {
        $this->modelClassName = 'EntrevistaCais';
        $this->viewPath = 'entrevista_cais';

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

    public function novo() {
        $this->formulario(new EntrevistaCais());
    }

    public function edita() {
        $entrevistaCais = null;

        if ($this->input->get('id') && is_numeric($this->input->get('id'))) {
            $entrevistaCais = $this->doctrine->em->find('EntrevistaCais', $this->input->get('id'));
        }
        
        if (is_null($entrevistaCais)) {
            show_error('unknown_registry_error_message');
        }

        $this->formulario($entrevistaCais);
    }
    
    public function visualiza() {
        $entrevistaCais = null;

        if ($this->input->get('id') && is_numeric($this->input->get('id'))) {
            $entrevistaCais = $this->doctrine->em->find('EntrevistaCais', $this->input->get('id'));
        }
        
        if (is_null($entrevistaCais)) {
            show_error('unknown_registry_error_message');
        }

        $this->formulario($entrevistaCais, true);
    }

    protected function formulario($entrevistaCais, $isView = false) {

        $embarcacoes = $this->doctrine->em->getRepository("CadEmbarcacao")->findBy(
                array(), array('nome' => 'ASC')
        );
        $empresas = $this->doctrine->em->getRepository("Cad_Empresa")->findBy(
                array(), array('nome' => 'ASC')
        );
        $aves = $this->doctrine->em->getRepository("Ave")->findBy(
                array(), array('nomeComumBr' => 'ASC')
        );        
        $municipios = $this->doctrine->em->getRepository("Municipio")->findBy(
                array(), array('nome' => 'ASC')
        );        
        $portos = $this->doctrine->em->getRepository("Porto")->findBy(
                array(), array('nome' => 'ASC')
        );        
        $responsaveis = $this->doctrine->em->getRepository("SystemUsers")->findBy(
                array(), array('name' => 'ASC')
        );
        
        $this->load->view("entrevista_cais/new", array(
            "entrevista" => $entrevistaCais,
            "embarcacoes" => $embarcacoes,            
            "aves" => $aves,
            "empresas"=>$empresas,
            "municipios"=>$municipios,
            "portos"=>$portos,
            "responsaveis"=>$responsaveis,
            "mensagem" => $this->session->flashdata('save_entrevista_cais'),
            "isView"=>$isView)            
        );
    }

    public function salva() {

        if ($this->validation(true) !== false) {
            show_error('generic_error_message');
            return;
        }
        
        $em = $this->doctrine->em;
        $isEdita = false;
        $entrevista = new EntrevistaCais();
        
        if ($this->input->post('id') && is_numeric($this->input->post('id'))) {
            $entrevista = $em->find('EntrevistaCais', $this->input->post('id'));
            
            if (is_null($entrevista)) {
                show_error('unknown_registry_error_message');
            }
            
            $isEdita = true;
        }
        
        $entrevista->setResponsavelCampo($em->find('SystemUsers', $this->input->post('responsavel_campo')));
        $entrevista->setData(Utils::dataToDateTime($this->input->post('data')));
        
        if ($this->input->post('empresa') && is_numeric($this->input->post('empresa'))) {
            $entrevista->setEmpresa($em->find('Cad_Empresa', $this->input->post('empresa')));
        }
        
        if ($this->input->post('municipio') && is_numeric($this->input->post('municipio'))) {
            $entrevista->setMunicipio($em->find('Municipio', $this->input->post('municipio')));
        }
        
        $entrevista->setEmbarcacao($em->find('CadEmbarcacao', $this->input->post('embarcacao')));
        
        if ($this->input->post('porto_saida') && is_numeric($this->input->post('porto_saida'))) {
            $entrevista->setPortoSaida($em->find('Porto', $this->input->post('porto_saida')));
        }
        
        $entrevista->setDataSaida(Utils::dataToDateTime($this->input->post('data_saida')));
        $entrevista->setHoraSaida(Utils::timeToDateTime($this->input->post('hora_saida')));
        $entrevista->setDataChegada(Utils::dataToDateTime($this->input->post('data_chegada')));
        $entrevista->setHoraChegada(Utils::timeToDateTime($this->input->post('hora_chegada')));
	
        if ($this->input->post('dias_mar') && is_numeric($this->input->post('dias_mar'))) {
            $entrevista->setDiasMar((int)$this->input->post('dias_mar'));
        }
        
        if ($this->input->post('dias_pesca') && is_numeric($this->input->post('dias_pesca'))) {
            $entrevista->setDiasPesca((int)$this->input->post('dias_pesca'));
        }
        
        $tipoPetrecho = $this->input->post('tipo_petrecho');
        $petrecho = null;
        
        if ($tipoPetrecho) {
            if ($tipoPetrecho == "petrecho_espinhel") {                
                if ($this->input->post('petrecho_espinhel')) {
                    $dados = $this->input->post('petrecho_espinhel');
                    $petrecho = new PetrechoEspinhel();
                    
                    if (isset($dados['numero_anzois']) && is_numeric($dados['numero_anzois'])) {
                        $petrecho->setNumeroAnzois((int)$dados['numero_anzois']);
                    }
                    
                    if (isset($dados['numero_lances']) && is_numeric($dados['numero_lances'])) {
                        $petrecho->setNumeroLances((int)$dados['numero_lances']);
                    }
                    
                    if (isset($dados['numero_espinheis']) && is_numeric($dados['numero_espinheis'])) {
                        $petrecho->setNumeroEspinheis((int)$dados['numero_espinheis']);
                    }
                    
                    if (isset($dados['light_stick'])) {
                        $petrecho->setLightStick(Utils::valorBooleano($dados['light_stick']));
                    }
                    
                    if (isset($dados['toriline'])) {
                        $petrecho->setToriline(Utils::valorBooleano($dados['toriline']));
                    }
                    
                    if (isset($dados['hora_lancamento_inicio'])) {
                        $petrecho->setHoraLancamentoInicio(Utils::timeToDateTime($dados['hora_lancamento_inicio']));
                    }
                    if (isset($dados['hora_lancamento_fim'])) {
                        $petrecho->setHoraLancamentoFim(Utils::timeToDateTime($dados['hora_lancamento_fim']));
                    }
                    
                    if (isset($dados['hora_recolhimento_inicio'])) {
                        $petrecho->setHoraRecolhimentoInicio(Utils::timeToDateTime($dados['hora_recolhimento_inicio']));
                    }
                    
                    if (isset($dados['hora_recolhimento_fim'])) {
                        $petrecho->setHoraRecolhimentoFim(Utils::timeToDateTime($dados['hora_recolhimento_fim']));
                    }
                }
            } else if ($tipoPetrecho == "petrecho_linha_mao") {
                if ($this->input->post('petrecho_linha_mao')) {
                    $dados = $this->input->post('petrecho_linha_mao');
                    $petrecho = new PetrechoLinhaMao();
                    
                    if (isset($dados['numero_linhas']) && is_numeric($dados['numero_linhas'])) {
                        $petrecho->setNumeroLinhas((int)$dados['numero_linhas']);
                    }
                    
                    if (isset($dados['numero_anzois_por_linha']) && is_numeric($dados['numero_anzois_por_linha'])) {
                        $petrecho->setNumeroAnzoisPorLinha((int)$dados['numero_anzois_por_linha']);
                    }
                    
                    if (isset($dados['numero_lances_por_dia']) && is_numeric($dados['numero_lances_por_dia'])) {
                        $petrecho->setNumeroLancesPorDia((int)$dados['numero_lances_por_dia']);
                    }
                    
                    if (isset($dados['hora_inicial'])) {
                        $petrecho->setHoraInicial(Utils::timeToDateTime($dados['hora_inicial']));
                    }
                    
                    if (isset($dados['hora_final'])) {
                        $petrecho->setHoraFinal(Utils::timeToDateTime($dados['hora_final']));
                    }
                    
                    if (isset($dados['tipo_petrecho_utilizado']) && is_array($dados['tipo_petrecho_utilizado']) && !empty($dados['tipo_petrecho_utilizado'])) {
                        $petrecho->setTipoPetrechoUtilizado($dados['tipo_petrecho_utilizado']);
                    }
                    
                    if (isset($dados['outros']) && !empty($dados['outros'])) {
                        $petrecho->setOutros($dados['outros']);
                    }
                }
            } else if ($tipoPetrecho == "petrecho_cerco") {
                if ($this->input->post('petrecho_cerco')) {
                    $dados = $this->input->post('petrecho_cerco');
                    $petrecho = new PetrechoCerco();
                    
                    if (isset($dados['comprimento_rede']) && is_numeric($dados['comprimento_rede'])) {
                        $petrecho->setComprimentoRede((int)$dados['comprimento_rede']);
                    }
                    
                    if (isset($dados['altura_rede']) && is_numeric($dados['altura_rede'])) {
                        $petrecho->setAlturaRede((int)$dados['altura_rede']);
                    }
                    
                    if (isset($dados['numero_cercos_totais']) && is_numeric($dados['numero_cercos_totais'])) {
                        $petrecho->setNumeroCercosTotais((int)$dados['numero_cercos_totais']);
                    }
                    
                    if (isset($dados['tempo_estimado_cercamento'])) {
                        $petrecho->setTempoEstimadoCercamento(Utils::timeToDateTime($dados['tempo_estimado_cercamento']));
                    }
                    
                    if (isset($dados['tempo_estimado_recolhimento'])) {
                        $petrecho->setTempoEstimadoRecolhimento(Utils::timeToDateTime($dados['tempo_estimado_recolhimento']));
                    }
                }
            } else if ($tipoPetrecho == "petrecho_emalhe") {
                if ($this->input->post('petrecho_emalhe')) {
                    $dados = $this->input->post('petrecho_emalhe');
                    $petrecho = new PetrechoEmalhe();
                
                    if (isset($dados['tipo_rede'])) {
                        $petrecho->setTipoRede($dados['tipo_rede']);
                    }

                    if (isset($dados['comprimento_pano']) && is_numeric($dados['comprimento_pano'])) {
                        $petrecho->setComprimentoPano((int)$dados['comprimento_pano']);
                    }

                    if (isset($dados['altura_pano']) && is_numeric($dados['altura_pano'])) {
                        $petrecho->setAlturaPano((int)$dados['altura_pano']);
                    }

                    if (isset($dados['numero_panos_por_lance']) && is_numeric($dados['numero_panos_por_lance'])) {
                        $petrecho->setNumeroPanosPorLance((int)$dados['numero_panos_por_lance']);
                    }

                    if (isset($dados['regime_trabalho'])) {
                        $petrecho->setRegimeTrabalho($dados['regime_trabalho']);
                    }

                    if (isset($dados['tempo_estimado_lancamento'])) {
                        $petrecho->setTempoEstimadoLancamento(Utils::timeToDateTime($dados['tempo_estimado_lancamento']));
                    }

                    if (isset($dados['tempo_estimado_recolhimento'])) {
                        $petrecho->setTempoEstimadoRecolhimento(Utils::timeToDateTime($dados['tempo_estimado_recolhimento']));
                    }
                }
                
            } else if ($tipoPetrecho == "petrecho_arrasto") {
                if ($this->input->post('petrecho_arrasto')) {
                    $dados = $this->input->post('petrecho_arrasto');
                    $petrecho = new PetrechoArrasto();
                    
                    if (isset($dados['tipo_arrasto'])) {
                        $petrecho->setTipoArrasto($dados['tipo_arrasto']);
                    }
                    
                    if (isset($dados['numero_arrastos_dia']) && is_numeric($dados['numero_arrastos_dia'])) {
                        $petrecho->setNumeroArrastosDia((int)$dados['numero_arrastos_dia']);
                    }
                    
                    if (isset($dados['tempo_medio_arrasto'])) {
                        $petrecho->setTempoMedioArrasto(Utils::timeToDateTime($dados['tempo_medio_arrasto']));
                    }
                }
            } else if ($tipoPetrecho == "petrecho_vara_isca_viva") {
                if ($this->input->post('petrecho_vara_isca_viva')) {
                    $dados = $this->input->post('petrecho_vara_isca_viva');
                    $petrecho = new PetrechoVaraIscaViva();
                    
                    if (isset($dados['dias_isca']) && is_numeric($dados['dias_isca'])) {
                        $petrecho->setDiasIsca((int)$dados['dias_isca']);
                    }
                    
                    if (isset($dados['dias_capeando']) && is_numeric($dados['dias_capeando'])) {
                        $petrecho->setDiasCapeando((int)$dados['dias_capeando']);
                    }
                    
                    if (isset($dados['total_lances']) && is_numeric($dados['total_lances'])) {
                        $petrecho->setTotalLances((int)$dados['total_lances']);
                    }
                    
                    if (isset($dados['numero_pescadores']) && is_numeric($dados['numero_pescadores'])) {
                        $petrecho->setNumeroPescadores((int)$dados['numero_pescadores']);
                    }
                    
                    if (isset($dados['boia'])) {
                        $petrecho->setBoia(Utils::valorBooleano($dados['boia']));
                    }
                }
            }
        }
        
        if (!is_null($entrevista->getPetrecho())) {
            $em->remove($entrevista->getPetrecho());
            $entrevista->setPetrecho(null);
        }
        
        $entrevista->setPetrecho($petrecho);
	
        if ($this->input->post('ave_observado')) {
            $entrevista->setAveObservado(Utils::valorBooleano($this->input->post('ave_observado')));
        }
        
        if ($this->input->post('ave_atrapalhou')) {
            $entrevista->setAveAtrapalhou(Utils::valorBooleano($this->input->post('ave_atrapalhou')));
        }
     
        $listaAreas = $entrevista->getAreaspesca()->toArray();
        $entrevista->getAreaspesca()->clear();
        
        foreach ($listaAreas as $valor) {
            $em->remove($valor);
        }
        
        if ($this->input->post('areas_pesca')) {
            $areas = $this->input->post('areas_pesca');
            
            foreach ($areas as $area) {
                if (isset($area['nome_area'])) {
                    $areaPesca = new EntrevistaCaisAreaPesca();
                    $areaPesca->setNome($area['nome_area']);
                    
                    if (isset($area['profundidade_inicial']) && is_numeric($area['profundidade_inicial'])) {
                        $areaPesca->setProfundidadeInicial((int)$area['profundidade_inicial']);
                    }
                    
                    if (isset($area['profundidade_final']) && is_numeric($area['profundidade_final'])) {
                        $areaPesca->setProfundidadeFinal((int)$area['profundidade_final']);
                    }
                    
                    $entrevista->addAreasPesca($areaPesca);
                }
            }
        }
	
        $listaCapturas = $entrevista->getCapturasAves()->toArray();
        $entrevista->getCapturasAves()->clear();
        
        foreach ($listaCapturas as $valor) {
            $em->remove($valor);
        }
        
        if ($this->input->post('capturas_aves')) {
            $capturas = $this->input->post('capturas_aves');
            
            foreach ($capturas as $captura) {
                if (isset($captura['especie']) && is_numeric($captura['especie'])) {
                    $capturaAve = new EntrevistaCaisCapturaAve();
                    $capturaAve->setEspecie($em->find('Ave', $captura['especie']));
                    
                    if (isset($captura['quantidade']) && is_numeric($captura['quantidade'])) {
                        $capturaAve->setQuantidade((int)$captura['quantidade']);
                    }
                    
                    $entrevista->addCapturasAves($capturaAve);
                }
            }
        }
        
        $usuario = $em->find("SystemUsers", $this->ezrbac->getCurrentUser()->id);
        
        if ($entrevista->getId() > 0) {
            $entrevista->setDataAlteracao(new DateTime());
            $entrevista->setUsuarioAlteracao($usuario);
        } else {
            $entrevista->setDataInsercao(new DateTime());
            $entrevista->setUsuarioInsercao($usuario);            
        }
        
        $em->persist($entrevista);
        $em->flush();

        
        $mensagem = 'Registro salvo com sucesso. (Código: ' . $entrevista->getId() . ')';
        if ($isEdita) {
            $this->session->set_flashdata(get_class($this) . '_mensagem', $mensagem);
            redirect('entrevistacaisct/index');
        } else {
            $this->session->set_flashdata('save_entrevista_cais', $mensagem);
            redirect('entrevistacaisct/novo');
        }        
    }

//--------------------------------------------------------------------------------------------------------------------//

    // Validação do form CI
    public function validation($returnError = false) {
        
        $this->form_validation->set_rules("responsavel_campo", "Responsável de campo", "trim|required|in_array[" . Utils::findIds('id', 'SystemUsers') . "]");        
        $this->form_validation->set_rules("data", "Data", "trim|date_validation");
        $this->form_validation->set_rules("empresa", "Empresa", "trim|in_array[" . Utils::findIds('id_empresa', 'Cad_Empresa') . "]");        
        $this->form_validation->set_rules("municipio", "Cidade", "trim|in_array[" . Utils::findIds('id', 'Municipio') . "]");        
        $this->form_validation->set_rules("embarcacao", "Embarcação", "trim|required|in_array[" . Utils::findIds('idEmbarcacao', 'CadEmbarcacao') . "]");        
        $this->form_validation->set_rules("porto_saida", "Porto de saída", "trim|in_array[" . Utils::findIds('id', 'Porto') . "]");
        $this->form_validation->set_rules("data_saida", "Data de saída", "trim|date_validation");
        $this->form_validation->set_rules('hora_saida', "Hora de saída", "trim|time_validation");
        $this->form_validation->set_rules("data_chegada", "Data de chegada", "trim|date_validation");
        $this->form_validation->set_rules('hora_chegada', "Hora de chegada", "trim|time_validation");
        $this->form_validation->set_rules('dias_mar', "Dias no mar", "trim|integer");        
        $this->form_validation->set_rules('dias_pesca', "Dias de pesca", "trim|integer");
        
        $tipoPetrecho = $this->input->post('tipo_petrecho');
        
        if ($tipoPetrecho) {
            if ($tipoPetrecho == "petrecho_espinhel") {
                $this->form_validation->set_rules('[petrecho_espinhel][numero_espinheis]', "Nº de espinhéis", "trim|integer");                
                $this->form_validation->set_rules('[petrecho_espinhel][numero_anzois]', "Nº de anzóis por espinhel", "trim|integer");                
                $this->form_validation->set_rules('[petrecho_espinhel][numero_lances]', "Nº de lances por dia", "trim|integer");
                $this->form_validation->set_rules('[petrecho_espinhel][light_stick]', "Light-stick", "trim|boolean_validation");
                $this->form_validation->set_rules('[petrecho_espinhel][toriline]', "Toriline", "trim|boolean_validation");
                $this->form_validation->set_rules('[petrecho_espinhel][hora_lancamento_inicio]', "Hora do lançamento início", "trim|time_validation");
                $this->form_validation->set_rules('[petrecho_espinhel][hora_lancamento_fim]', "Hora do lançamento final", "trim|time_validation");
                $this->form_validation->set_rules('[petrecho_espinhel][hora_recolhimento_inicio]', "Hora do recolhimento inicio", "trim|time_validation");
                $this->form_validation->set_rules('[petrecho_espinhel][hora_recolhimento_fim]', "Hora do recolhimento final", "trim|time_validation");
            } else if ($tipoPetrecho == "petrecho_linha_mao") {
                $this->form_validation->set_rules('[petrecho_linha_mao][numero_linhas]', "Nº de linhas", "trim|integer");
                $this->form_validation->set_rules('[petrecho_linha_mao][numero_anzois_por_linha]', "Nº de anzóis por linha", "trim|integer");
                $this->form_validation->set_rules('[petrecho_linha_mao][numero_lances_por_dia]', "Nº de lances por dia", "trim|integer");                    
                $this->form_validation->set_rules('[petrecho_linha_mao][hora_inicial]', "Hora inicial", "trim|time_validation");
                $this->form_validation->set_rules('[petrecho_linha_mao][hora_final]', "Hora final", "trim|time_validation");                   
                $this->form_validation->set_rules('[petrecho_linha_mao][tipo_petrecho_utilizado]', "Tipo de petrecho utilizado", 'trim|in_array[' . implode(',', Utils::getTipoPetrecho()) . ']');
                $this->form_validation->set_rules('[petrecho_linha_mao][outros]', "Outros", "trim");
            } else if ($tipoPetrecho == "petrecho_cerco") {
                $this->form_validation->set_rules('[petrecho_cerco][comprimento_rede]', "Comp. da rede (m)", "trim|integer");
                $this->form_validation->set_rules('[petrecho_cerco][altura_rede]', "Altura da rede (m)", "trim|integer");
                $this->form_validation->set_rules('[petrecho_cerco][numero_cercos_totais]', "Nº de cercos totais", "trim|integer");
                $this->form_validation->set_rules('[petrecho_cerco][tempo_estimado_cercamento]', "Tempo estimado de cercamento", "trim|time_validation");
                $this->form_validation->set_rules('[petrecho_cerco][tempo_estimado_recolhimento]', "Tempo estimado de recolhimento", "trim|time_validation");                
            } else if ($tipoPetrecho == "petrecho_emalhe") {
                $this->form_validation->set_rules('[petrecho_emalhe][tipo_rede]', "Rede", 'trim|in_array[' . implode(',', Utils::getTipoRede()) . ']');                
                $this->form_validation->set_rules('[petrecho_emalhe][comprimento_pano]', "Comp. do pano (m)", "trim|integer");
                $this->form_validation->set_rules('[petrecho_emalhe][altura_pano]', "Altura do pano (m)", "trim|integer");
                $this->form_validation->set_rules('[petrecho_emalhe][numero_panos_por_lance]', "Nº de panos por lance", "trim|integer");                
                $this->form_validation->set_rules('[petrecho_emalhe][regime_trabalho]', "Regime de trabalho", 'trim|in_array[' . implode(',', Utils::getRegimeTrabalho()) . ']');
                $this->form_validation->set_rules('[petrecho_emalhe][tempo_estimado_lancamento]', "Tempo estimado de lançamento", "trim|time_validation");
                $this->form_validation->set_rules('[petrecho_emalhe][tempo_estimado_recolhimento]', "Tempo estimado de recolhimento", "trim|time_validation"); 
            } else if ($tipoPetrecho == "petrecho_arrasto") {
                $this->form_validation->set_rules('[petrecho_arrasto][tipo_arrasto]', "Tipo de arrasto", 'trim|in_array[' . implode(',', Utils::getTipoArrasto()) . ']');
                $this->form_validation->set_rules('[petrecho_arrasto][numero_arrastos_dia]', "Nº de arrastos por dia", "trim|integer");
                $this->form_validation->set_rules('[petrecho_arrasto][tempo_medio_arrasto]', "Tempo médio de cada arrasto (h)", "trim|time_validation");
            } else if ($tipoPetrecho == "petrecho_vara_isca_viva") {
                $this->form_validation->set_rules('[petrecho_vara_isca_viva][dias_isca]', "Dias na isca", "trim|integer");
                $this->form_validation->set_rules('[petrecho_vara_isca_viva][dias_capeando]', "Dias capeando", "trim|integer");
                $this->form_validation->set_rules('[petrecho_vara_isca_viva][total_lances]', "Nº total de lances", "trim|integer");
                $this->form_validation->set_rules('[petrecho_vara_isca_viva][numero_pescadores]', "Nº de pescadores", "trim|integer");
                $this->form_validation->set_rules('[petrecho_vara_isca_viva][boia]', "Bóia", "trim|boolean_validation");
            }
            
            
        }
        
        $this->form_validation->set_rules('ave_observado', "Foi observado aves durante a operação de pesca", "trim|boolean_validation");
        $this->form_validation->set_rules('ave_atrapalhou', "Ave atrapalhou a operação de pesca", "trim|boolean_validation");
        
        if ($this->input->post('areas_pesca')) {
            $areas = $this->input->post('areas_pesca');
            
            foreach ($areas as $key => $area) {            
                $this->form_validation->set_rules('areas_pesca['.$key.'][nome_area]', "Nome da área", "trim|required");
                $this->form_validation->set_rules('areas_pesca['.$key.'][profundidade_inicial]', "Profundidade inicial", "trim|integer");
                $this->form_validation->set_rules('areas_pesca['.$key.'][profundidade_final]', "Profundidade final", "trim|integer");
            }
        }
	
        
        if ($this->input->post('capturas_aves')) {
            $capturas = $this->input->post('capturas_aves');
            
            foreach ($capturas as $key => $captura) {
                $this->form_validation->set_rules("capturas_aves[".$key."][especie]", "Espécie", "trim|required|in_array[" . Utils::findIds('id', 'Ave') . "]");        
                $this->form_validation->set_rules('capturas_aves['.$key.'][quantidade]', "Quantidade", "trim|integer");
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

    public function exclui(){
        $entrevista = $this->doctrine->em->find("EntrevistaCais", $this->input->get("id"));
        
        if (is_null($entrevista)) {
            show_error('unknown_registry_error_message');
        }
        
        $this->doctrine->em->remove($entrevista);
        $this->doctrine->em->flush();
        $this->session->set_flashdata(get_class($this) . '_mensagem', 'Registro excluído com sucesso.');
        redirect('entrevistacaisct/index');
    }

    // Funções da tela de filtro
    protected function telaFiltro() {
        $filtro = $this->session->userdata('filtros_' . get_class($this));
        
        $responsaveis = $this->doctrine->em->getRepository("SystemUsers")->findBy(
                array(), array('name' => 'ASC')
        );
        $embarcacoes = $this->doctrine->em->getRepository("CadEmbarcacao")->findBy(
                array(), array('nome' => 'ASC')
        );
        
        $portos = $this->doctrine->em->getRepository("Porto")->findBy(
                array(), array('nome' => 'ASC')
        );
        
        return $this->load->view("entrevista_cais/filter", array(
            "responsaveis" => $responsaveis,
            "embarcacoes" => $embarcacoes,
            "portos"=>$portos,  
            "filtro"=>$filtro
                ), true
        );
    }
    
    public function filter() {
        $filtros = array();
        
        if ($this->input->post('codigo') && is_numeric($this->input->post('codigo'))) {            
            $filtros['codigo'] = $this->input->post('codigo');
        }

        if ($this->input->post('responsavel_campo') && is_numeric($this->input->post('responsavel_campo'))) {
            $filtros['responsavel_campo'] = $this->input->post('responsavel_campo');
        }

        if ($this->input->post('embarcacao') && is_numeric($this->input->post('embarcacao'))) {
            $filtros['embarcacao'] = $this->input->post('embarcacao');
        }

        if ($this->input->post('porto_saida') && is_numeric($this->input->post('porto_saida'))) {
            $filtros['porto_saida'] = $this->input->post('porto_saida');
        }
        
        if ($this->input->post('data') && !is_null(Utils::dateToDatabaseDate($this->input->post('data')))) {
            $filtros['data'] = Utils::dateToDatabaseDate($this->input->post('data'));
        }
        
        if ($this->input->post('data_saida') && !is_null(Utils::dateToDatabaseDate($this->input->post('data_saida')))) {
            $filtros['data_saida'] = Utils::dateToDatabaseDate($this->input->post('data_saida'));
        }

        if ($this->input->post('data_chegada') && !is_null(Utils::dateToDatabaseDate($this->input->post('data_chegada')))) {
            $filtros['data_chegada'] = Utils::dateToDatabaseDate($this->input->post('data_chegada'));
        }
        
        $this->session->set_userdata('filtros_' . get_class($this), $filtros);
        redirect('entrevistacaisct/index');
    }
    
    public function clearfilter() {
        $this->session->set_userdata('filtros_' . get_class($this), array());
        redirect('entrevistacaisct/index');
    }
    
    protected function filterQueryBuilder() {
        $queryBuilder = $this->doctrine->em->createQueryBuilder();
        $queryBuilder->select("r")->from("EntrevistaCais", "r");
        $filtrosSessao = $this->session->userdata('filtros_' . get_class($this));
        
        if (!empty($filtrosSessao)) {
            if (isset($filtrosSessao['codigo'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->eq('r.id', '?1'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(1, $filtrosSessao['codigo']);
            }

            if (isset($filtrosSessao['responsavel_campo'])) {
                $queryBuilder->join("r.responsavelCampo", "rc");
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->eq('rc.id', '?2'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(2, $filtrosSessao['responsavel_campo']);
            }

            if (isset($filtrosSessao['embarcacao'])) {
                $queryBuilder->join("r.embarcacao", "eb");
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->eq('eb.idEmbarcacao', '?3'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(3, $filtrosSessao['embarcacao']);
            }

            if (isset($filtrosSessao['porto_saida'])) {
                $queryBuilder->join("r.portoSaida", "p");
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->eq('p.id', '?4'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(4, $filtrosSessao['porto_saida']);
            }

            if (isset($filtrosSessao['data'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->eq('r.data', '?5'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(5, $filtrosSessao['data']);
            }
            
            if (isset($filtrosSessao['data_saida'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->eq('r.dataSaida', '?6'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(6, $filtrosSessao['data_saida']);
            }

            if (isset($filtrosSessao['data_chegada'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->eq('r.dataChegada', '?7'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(7, $filtrosSessao['data_chegada']);
            }
        }
        
        $query = $queryBuilder->getQuery();
            
        return $query;
    }

}
