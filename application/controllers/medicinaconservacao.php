<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of medicinaconservacao
 *
 * @author Dev
 */
class MedicinaConservacao extends MY_Controller {

    public function __construct() {
        $this->modelClassName = 'MedConservacao';
        $this->viewPath = 'medicina_conservacao';

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
            'obterlances'=>'create',
            'visualiza'=>'view'
            );
    }

    public function novo() {
        $this->formulario(new MedConservacao());
    }

    public function edita() {
        $objeto = null;

        if ($this->input->get('id') && is_numeric($this->input->get('id'))) {
            $objeto = $this->doctrine->em->find('MedConservacao', $this->input->get('id'));
        }

        if (is_null($objeto)) {
            show_error('unknown_registry_error_message');
        }

        $this->formulario($objeto);
    }
    
    public function visualiza() {
        $objeto = null;

        if ($this->input->get('id') && is_numeric($this->input->get('id'))) {
            $objeto = $this->doctrine->em->find('MedConservacao', $this->input->get('id'));
        }

        if (is_null($objeto)) {
            show_error('unknown_registry_error_message');
        }

        $this->formulario($objeto, true);
    }

   protected function formulario($objeto, $isView = false) {
      $observadores = $this->doctrine->em->getRepository("CadObservador")->findBy(
         array(), array('nome' => 'ASC')
      );

      $embarcacoes = $this->doctrine->em->getRepository("CadEmbarcacao")->findBy(
         array(), array('nome' => 'ASC')
      );

      $mestres = $this->doctrine->em->getRepository("CadMestre")->findBy(
         array(), array('nome' => 'ASC')
      );

      $cruzeiros = $this->doctrine->em->getRepository("Cruzeiro")->findAll();

      $aves = $this->doctrine->em->getRepository("Ave")->findBy(
         array(), array('nomeCientifico' => 'ASC')
      );

        $lances = (
                    !is_null($objeto->getCapturaIncidental()) &&
                    !is_null($objeto->getCapturaIncidental()->getCruzeiro())
                  ) ? $objeto->getCapturaIncidental()->getCruzeiro()->getDadosAbioticos()->toArray() : array();

        $this->load->view($this->viewPath . '/new', array(
            'observadores'=>$observadores,
            'embarcacoes'=>$embarcacoes,
            'mestres'=>$mestres,
            'cruzeiros'=>$cruzeiros,
            'aves'=>$aves,
            'medicinaConservacao'=>$objeto,
            'lances'=>$lances,
            "mensagem" => $this->session->flashdata('save_medicina_conservacao'),
            "isView"=>$isView
        ));
    }

    public function salva() {

        if ($this->validation(true) !== false) {
            show_error('generic_error_message');
            return;
        }

        $medicinaConservacao = new MedConservacao();
        $isEdita = false;
        $em = $this->doctrine->em;

        if ($this->input->post('id') && is_numeric($this->input->post('id'))) {
            $medicinaConservacao = $em->find('MedConservacao', $this->input->post('id'));

            if (is_null($medicinaConservacao)) {
                show_error('unknown_registry_error_message');
            }

            $isEdita = true;
        }

        //--------- Dados gerais ---------------------------------------------//
        $medicinaConservacao->setEtiqueta(($this->input->post('etiqueta') === '' ? null : $this->input->post('etiqueta')));
        $medicinaConservacao->setEtiquetaAntiga(($this->input->post('etiqueta_antiga') === '' ? null : $this->input->post('etiqueta_antiga')));
        $medicinaConservacao->setEspecie(null);

        if ($this->input->post('especie') && is_numeric($this->input->post('especie'))) {
            $especie = $em->find('Ave', $this->input->post('especie'));

            if ($especie) {
                $medicinaConservacao->setEspecie($especie);
            }
        }

        $medicinaConservacao->setResponsavel(($this->input->post('responsavel') === '' ? null : $this->input->post('responsavel')));
        $medicinaConservacao->setDataEntrada(Utils::dataToDateTime($this->input->post('data_entrada')));
        $medicinaConservacao->setDataCaptura(Utils::dataToDateTime($this->input->post('data_captura')));
        $medicinaConservacao->setCoordenada(null);

        if ($this->input->post('latitude') && $this->input->post('latitude') != '' && $this->input->post('longitude') && $this->input->post('longitude') != '') {
            $medicinaConservacao->setCoordenada(new Geometry(null, $this->input->post('latitude'), $this->input->post('longitude')));
        }

        $medicinaConservacao->setAnilha(($this->input->post('anilha') === '' ? null : $this->input->post('anilha')));
        $medicinaConservacao->setPlumagem(Utils::getPlumagem($this->input->post('plumagem')));
        $medicinaConservacao->setProcedencia(Utils::getProcedencia($this->input->post('procedencia')));
        $medicinaConservacao->setProcedenciaOutros(null);

        if ($this->input->post('procedencia') == Utils::PROCEDENCIA_OUTROS) {
            $medicinaConservacao->setProcedenciaOutros(($this->input->post('procedencia_outros') === '' ? null : $this->input->post('procedencia_outros')));
        }
        //--------------------------------------------------------------------//


        //--------- Captura incidental ---------------------------------------//
        $medicinaConservacao->getCapturaIncidental()->setCruzeiro(null);
        $medicinaConservacao->getCapturaIncidental()->setLance(null);
        $medicinaConservacao->getCapturaIncidental()->setInformacao(null);
        $medicinaConservacao->getCapturaIncidental()->setObservador(null);
        $medicinaConservacao->getCapturaIncidental()->setMestre(null);
        $medicinaConservacao->getCapturaIncidental()->setEmbarcacao(null);

        if ($this->input->post('informacao_captura') === 'cruzeiro') {
            $medicinaConservacao->getCapturaIncidental()->setInformacao('cruzeiro');
            if ($this->input->post('cruzeiro') && is_numeric($this->input->post('cruzeiro'))) {
                $cruzeiro = $em->find('Cruzeiro', $this->input->post('cruzeiro'));
                if ($cruzeiro) {
                    $medicinaConservacao->getCapturaIncidental()->setCruzeiro($cruzeiro);

                    if ($this->input->post('cruzeiro') && is_numeric($this->input->post('cruzeiro'))) {
                        $lances = $cruzeiro->getDadosAbioticos()->toArray();
                        $idLance = $this->input->post('lance');

                        foreach ($lances as $value) {
                            if ($value->getId() === (int)$idLance) {
                                $medicinaConservacao->getCapturaIncidental()->setLance($value);
                            }
                        }
                    }
                }
            }
        } else if ($this->input->post('informacao_captura') === 'externo') {
            $medicinaConservacao->getCapturaIncidental()->setInformacao('externo');

            if ($this->input->post('observador') && is_numeric($this->input->post('observador'))) {
                $medicinaConservacao->getCapturaIncidental()->setObservador($em->find('CadObservador', $this->input->post('observador')));
            }

            if ($this->input->post('mestre') && is_numeric($this->input->post('mestre'))) {
                $medicinaConservacao->getCapturaIncidental()->setMestre($em->find('CadMestre', $this->input->post('mestre')));
            }

            if ($this->input->post('embarcacao') && is_numeric($this->input->post('embarcacao'))) {
                $medicinaConservacao->getCapturaIncidental()->setEmbarcacao($em->find('CadEmbarcacao', $this->input->post('embarcacao')));
            }
        }
        $medicinaConservacao->getCapturaIncidental()->setHistorico(($this->input->post('historico') === '' ? null : $this->input->post('historico')));
        $medicinaConservacao->getCapturaIncidental()->setDescricaoLocalColeta(($this->input->post('descricao_local_coleta') === '' ? null : $this->input->post('descricao_local_coleta')));
        //--------------------------------------------------------------------//


        //--------- Biometria ------------------------------------------------//
        $medicinaConservacao->getBiometria()->setPeso((is_numeric($this->input->post('peso')) ? (int)$this->input->post('peso') : null));
        $medicinaConservacao->getBiometria()->setComprimento((is_numeric($this->input->post('comprimento_total')) ? (int)$this->input->post('comprimento_total') : null));
        $medicinaConservacao->getBiometria()->setCulmem((is_numeric($this->input->post('culmem')) ? (int)$this->input->post('culmem') : null));
        $medicinaConservacao->getBiometria()->setNarinaCulmem((is_numeric($this->input->post('narina_culmem')) ? (int)$this->input->post('narina_culmem') : null));
        $medicinaConservacao->getBiometria()->setAlturaBicoBase((is_numeric($this->input->post('altura_bico_base')) ? (int)$this->input->post('altura_bico_base') : null));
        $medicinaConservacao->getBiometria()->setAlturaMinimaBico((is_numeric($this->input->post('altura_minima_bico')) ? (int)$this->input->post('altura_minima_bico') : null));
        $medicinaConservacao->getBiometria()->setAlturaBicoUnguis((is_numeric($this->input->post('altura_bico_unguis')) ? (int)$this->input->post('altura_bico_unguis') : null));
        $medicinaConservacao->getBiometria()->setLarguraBicoBase((is_numeric($this->input->post('largura_bico_base')) ? (int)$this->input->post('largura_bico_base') : null));
        $medicinaConservacao->getBiometria()->setComprimentoCabeca((is_numeric($this->input->post('comprimento_cabeca')) ? (int)$this->input->post('comprimento_cabeca') : null));
        $medicinaConservacao->getBiometria()->setComprimentoAsa((is_numeric($this->input->post('comprimento_asa')) ? (int)$this->input->post('comprimento_asa') : null));
        $medicinaConservacao->getBiometria()->setComprimentoCauda((is_numeric($this->input->post('comprimento_cauda')) ? (int)$this->input->post('comprimento_cauda') : null));
        $medicinaConservacao->getBiometria()->setComprimentoTarso((is_numeric($this->input->post('comprimento_tarso')) ? (int)$this->input->post('comprimento_tarso') : null));
        $medicinaConservacao->getBiometria()->setComprimentoDedoSemUnha((is_numeric($this->input->post('comprimento_dedo_sem_unha')) ? (int)$this->input->post('comprimento_dedo_sem_unha') : null));
        $medicinaConservacao->getBiometria()->setComprimentoDedoComUnha((is_numeric($this->input->post('comprimento_dedo_com_unha')) ? (int)$this->input->post('comprimento_dedo_com_unha') : null));
        $medicinaConservacao->getBiometria()->setEnvergadura((is_numeric($this->input->post('envergadura')) ? (int)$this->input->post('envergadura') : null));
        $medicinaConservacao->getBiometria()->setMudaAsa(Utils::valorBooleano($this->input->post('muda_asa')));
        $medicinaConservacao->getBiometria()->setMudaCauda(Utils::valorBooleano($this->input->post('muda_cauda')));
        $medicinaConservacao->getBiometria()->setMudaCabeca(Utils::valorBooleano($this->input->post('muda_cabeca')));
        $medicinaConservacao->getBiometria()->setMudaDorso(Utils::valorBooleano($this->input->post('muda_dorso')));
        $medicinaConservacao->getBiometria()->setMudaVentre(Utils::valorBooleano($this->input->post('muda_ventre')));
        //--------------------------------------------------------------------//


        //--------- Coleta de materiais biológicos ---------------------------//
        $medicinaConservacao->getColetaMaterialBiologico()->setDataNecropsia(Utils::dataToDateTime($this->input->post('data_necropsia')));
        $medicinaConservacao->getColetaMaterialBiologico()->setLocalNecropsia(($this->input->post('local_necropsia') === '' ? null : $this->input->post('local_necropsia')));

        $medicinaConservacao->getColetaMaterialBiologico()->setCondicaoCarcaca(Utils::getCondicaoCarcaca($this->input->post('condicao_carcaca')));
        $medicinaConservacao->getColetaMaterialBiologico()->setAutolise(Utils::getAutolise($this->input->post('autolise')));
        $medicinaConservacao->getColetaMaterialBiologico()->setSexagem(Utils::getSexagem($this->input->post('sexagem')));
        $medicinaConservacao->getColetaMaterialBiologico()->setEmpetrolamento(Utils::getEmpetrolamento($this->input->post('empetrolamento')));
        $medicinaConservacao->getColetaMaterialBiologico()->setCondicaoCorporal(Utils::getCondicaoCorporal($this->input->post('condicao_corporal')));

        $medicinaConservacao->getColetaMaterialBiologico()->setPiolho(Utils::getCruz($this->input->post('piolhos')));
        $medicinaConservacao->getColetaMaterialBiologico()->setCarrapato(Utils::getCruz($this->input->post('carrapatos')));
        $medicinaConservacao->getColetaMaterialBiologico()->setPulga(Utils::getCruz($this->input->post('pulgas')));
        $medicinaConservacao->getColetaMaterialBiologico()->setLepadomorpha(Utils::getCruz($this->input->post('lepadomorpha')));
        $medicinaConservacao->getColetaMaterialBiologico()->setLarvasPutrefacao(Utils::getCruz($this->input->post('larvas_putrefacao')));
        $medicinaConservacao->getColetaMaterialBiologico()->setOutros(Utils::getCruz($this->input->post('outro_parasita')));
        $medicinaConservacao->getColetaMaterialBiologico()->setOutrosDescricao(($this->input->post('outro_parasita_descricao') === '' ? null : $this->input->post('outro_parasita_descricao')));
        $medicinaConservacao->getColetaMaterialBiologico()->setNematoides(Utils::getCruz($this->input->post('nematoides')));
        $medicinaConservacao->getColetaMaterialBiologico()->setAcantocefalos(Utils::getCruz($this->input->post('acantocefalos')));
        $medicinaConservacao->getColetaMaterialBiologico()->setCestoides(Utils::getCruz($this->input->post('cestoides')));
        $medicinaConservacao->getColetaMaterialBiologico()->setTrematoides(Utils::getCruz($this->input->post('trematoides')));

        $medicinaConservacao->getColetaMaterialBiologico()->setAmtEncefalo(Utils::getAmostrasTecido($this->input->post('encefalo')));
        $medicinaConservacao->getColetaMaterialBiologico()->setAmtMedulaOssea(Utils::getAmostrasTecido($this->input->post('medula_ossea')));
        $medicinaConservacao->getColetaMaterialBiologico()->setAmtMusculo(Utils::getAmostrasTecido($this->input->post('musculo')));
        $medicinaConservacao->getColetaMaterialBiologico()->setAmtFigado(Utils::getAmostrasTecido($this->input->post('figado')));
        $medicinaConservacao->getColetaMaterialBiologico()->setAmtPulmao(Utils::getAmostrasTecido($this->input->post('pulmao')));
        $medicinaConservacao->getColetaMaterialBiologico()->setAmtBaco(Utils::getAmostrasTecido($this->input->post('baco')));
        $medicinaConservacao->getColetaMaterialBiologico()->setAmtGordura(Utils::getAmostrasTecido($this->input->post('gordura')));

        $medicinaConservacao->getColetaMaterialBiologico()->setHtpPele(Utils::valorBooleano($this->input->post('htp_pele')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpLingua(Utils::valorBooleano($this->input->post('htp_lingua')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpEsofago(Utils::valorBooleano($this->input->post('htp_esofago')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpIngluvio(Utils::valorBooleano($this->input->post('htp_ingluvio')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpTireoide(Utils::valorBooleano($this->input->post('htp_tireoide')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpParatireoide(Utils::valorBooleano($this->input->post('htp_paratireoide')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpSiringe(Utils::valorBooleano($this->input->post('htp_siringe')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpTraqueia(Utils::valorBooleano($this->input->post('htp_traqueia')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpPulmao(Utils::valorBooleano($this->input->post('htp_pulmao')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpCoracao(Utils::valorBooleano($this->input->post('htp_coracao')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpProventriculo(Utils::valorBooleano($this->input->post('htp_proventriculo')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpVentriculo(Utils::valorBooleano($this->input->post('htp_ventriculo')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpFigado(Utils::valorBooleano($this->input->post('htp_figado')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpVesiculaBiliar(Utils::valorBooleano($this->input->post('htp_vesicula_biliar')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpBaco(Utils::valorBooleano($this->input->post('htp_baco')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpDuodeno(Utils::valorBooleano($this->input->post('htp_duodeno')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpJejuno(Utils::valorBooleano($this->input->post('htp_jejuno')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpIleoCecoColon(Utils::valorBooleano($this->input->post('htp_ileo_ceco_colon')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpPancreas(Utils::valorBooleano($this->input->post('htp_pancreas')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpCloaca(Utils::valorBooleano($this->input->post('htp_cloaca')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpRim(Utils::valorBooleano($this->input->post('htp_rim')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpAdrenais(Utils::valorBooleano($this->input->post('htp_adrenais')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpUreter(Utils::valorBooleano($this->input->post('htp_ureter')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpGonada(Utils::valorBooleano($this->input->post('htp_gonada')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpBexiga(Utils::valorBooleano($this->input->post('htp_bexiga')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpOviduto(Utils::valorBooleano($this->input->post('htp_oviduto')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpBursa(Utils::valorBooleano($this->input->post('htp_bursa')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpGrandesVasos(Utils::valorBooleano($this->input->post('htp_grandes_vasos')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpSacoAereo(Utils::valorBooleano($this->input->post('htp_saco_aereo')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpTimo(Utils::valorBooleano($this->input->post('htp_timo')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpMusculoEsqueletico(Utils::valorBooleano($this->input->post('htp_musculo_esqueletico')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpMedulaOssea(Utils::valorBooleano($this->input->post('htp_medula_ossea')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpOlho(Utils::valorBooleano($this->input->post('htp_olho')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpGldSal(Utils::valorBooleano($this->input->post('htp_gld_sal')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpEncefalo(Utils::valorBooleano($this->input->post('htp_encefalo')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpCerebelo(Utils::valorBooleano($this->input->post('htp_cerebelo')));
        $medicinaConservacao->getColetaMaterialBiologico()->setHtpOsso(Utils::valorBooleano($this->input->post('htp_osso')));
        //--------------------------------------------------------------------//


        //--------- Outras pesquisas -----------------------------------------//
        $medicinaConservacao->getOutrasPesquisas()->setSwabCloaca(Utils::valorBooleano($this->input->post('outra_pesquisa_swab_cloaca')));
        $medicinaConservacao->getOutrasPesquisas()->setSwabCoana(Utils::valorBooleano($this->input->post('outra_pesquisa_swab_coana')));
        $medicinaConservacao->getOutrasPesquisas()->setConteudoEstomacal(Utils::valorBooleano($this->input->post('outra_pesquisa_conteudo_estomacal')));
        $medicinaConservacao->getOutrasPesquisas()->setSangueCardiaco(Utils::valorBooleano($this->input->post('outra_pesquisa_sangue_cardiaco')));
        $medicinaConservacao->getOutrasPesquisas()->setPenas(Utils::getPena($this->input->post('outra_pesquisa_pena')));
        $medicinaConservacao->getOutrasPesquisas()->setOutros(($this->input->post('outra_pesquisa_outros') === '' ? null : $this->input->post('outra_pesquisa_outros')));
        $medicinaConservacao->getOutrasPesquisas()->setObservacoes(($this->input->post('outra_pesquisa_observacoes') === '' ? null : $this->input->post('outra_pesquisa_observacoes')));
        //--------------------------------------------------------------------//

        $usuario = $em->find("SystemUsers", $this->ezrbac->getCurrentUser()->id);
        $acao = 'salva';
        
        if ($medicinaConservacao->getId() > 0) {
            $acao = 'edita';
            $medicinaConservacao->setDataAlteracao(new DateTime());
            $medicinaConservacao->setUsuarioAlteracao($usuario);
        } else {
            $medicinaConservacao->setDataInsercao(new DateTime());
            $medicinaConservacao->setUsuarioInsercao($usuario);
        }

        $em->persist($medicinaConservacao);
        $em->flush();

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
            $objeto->setDadosSalvos($medicinaConservacao->toArray());

            $this->doctrine->em->persist($objeto);
            $this->doctrine->em->flush();
        } catch (Exception $exc) {
            show_error('log_system_error_message');
            return;
        }
        
        $mensagem = 'Registro salvo com sucesso. (Código: ' . $medicinaConservacao->getId() . ')';
        if ($isEdita) {
            $this->session->set_flashdata(get_class($this) . '_mensagem', $mensagem);
            redirect(strtolower(get_class($this)) . '/index');
        } else {
            $this->session->set_flashdata('save_medicina_conservacao', $mensagem);
            redirect(strtolower(get_class($this)) . '/novo');
        }
    }


    public function validation($returnError = false)
    {
        $this->form_validation->set_rules('etiqueta', "Etiqueta", "trim|required|max_length[100]");
        $this->form_validation->set_rules('etiqueta_antiga', "Etiqueta antiga", "trim|max_length[100]");
        $this->form_validation->set_rules('especie', "Espécie", "trim|required|in_array[" . Utils::findIds('id', 'Ave') . "]");
        $this->form_validation->set_rules('responsavel', "Responsável", "trim|max_length[255]");
        $this->form_validation->set_rules('data_entrada', "Data de entrada", "trim|date_validation");
        $this->form_validation->set_rules('data_captura', "Data de captura", "trim|date_validation");

        if ($this->input->post('longitude') && $this->input->post('longitude') != '' && $this->input->post('latitude') && $this->input->post('latitude') == '') {
            $this->form_validation->set_rules('latitude', "Latitude", "trim|required|valida_latitude");
        } else {
            $this->form_validation->set_rules('latitude', "Latitude", "trim|valida_latitude");
        }

        if ($this->input->post('latitude') && $this->input->post('latitude') != '' && $this->input->post('longitude') && $this->input->post('longitude') == '') {
            $this->form_validation->set_rules('longitude', "Longitude", "trim|required|valida_longitude");
        } else {
            $this->form_validation->set_rules('longitude', "Longitude", "trim|valida_longitude");
        }

        $this->form_validation->set_rules('anilha', "Anilha", "trim|max_length[100]");
        $this->form_validation->set_rules('plumagem', "Plumagem", "trim|in_array[".  implode(',', Utils::getPlumagem())."]");
        $this->form_validation->set_rules('procedencia', "Procedência", "trim|in_array[".  implode(',', Utils::getProcedencia())."]");
        $this->form_validation->set_rules('procedencia_outros', "procedencia_outros", "trim|max_length[150]");

        //dados gerais
//        etiqueta
//        etiqueta_antiga
//        especie
//        responsavel
//        data_entrada
//        data_captura
//        latitude
//        longitude
//        anilha
//        plumagem
//        procedencia
//        procedencia_outros


        if ($this->input->post('informacao_captura') === 'cruzeiro') {
            if ($this->input->post('cruzeiro') && is_numeric($this->input->post('cruzeiro'))) {
                $this->form_validation->set_rules('cruzeiro', "Cruzeiro", "trim|in_array[" . Utils::findIds('id', 'Cruzeiro') . "]");
                $cruzeiro = $this->doctrine->em->find('Cruzeiro', $this->input->post('cruzeiro'));

                if ($cruzeiro) {
                    $ids = array();
                    $lances = $cruzeiro->getDadosAbioticos()->toArray();

                    foreach ($lances as $value) {
                        $ids[] = $value->getId();
                    }

                    $this->form_validation->set_rules('lance', "Lance", "trim|in_array[" . implode(',', $ids) . "]");
                }
            }
        } else if ($this->input->post('informacao_captura') === 'externo') {
            $this->form_validation->set_rules('observador', "Observador", "trim|in_array[" . Utils::findIds('idObserv', 'CadObservador') . "]");
            $this->form_validation->set_rules('mestre', "Mestre", "trim|in_array[" . Utils::findIds('idMestre', 'CadMestre') . "]");
            $this->form_validation->set_rules('embarcacao', "Embarcação", "trim|in_array[" . Utils::findIds('idEmbarcacao', 'CadEmbarcacao') . "]");
        }

        $this->form_validation->set_rules('historico', "Histórico", "trim");
        $this->form_validation->set_rules('descricao_local_coleta', "Descrição do Local de Coleta", "trim");

        //captura
//        informacao_captura
//        cruzeiro
//        lance
//        observador
//        mestre
//        embarcacao
//        historico
//        descricao_local_coleta


        $this->form_validation->set_rules('peso', "Peso", "trim|integer");
        $this->form_validation->set_rules('comprimento_total', "Comprimento total", "trim|integer");
        $this->form_validation->set_rules('culmem', "Cúlmem", "trim|integer");
        $this->form_validation->set_rules('narina_culmem', "Narina ao cúlmem", "trim|integer");
        $this->form_validation->set_rules('altura_bico_base', "Altura do bico na base", "trim|integer");
        $this->form_validation->set_rules('altura_minima_bico', "Altura mínima do bico", "trim|integer");
        $this->form_validation->set_rules('altura_bico_unguis', "Altura do bico na unguis", "trim|integer");
        $this->form_validation->set_rules('largura_bico_base', "Largura do bico na base", "trim|integer");
        $this->form_validation->set_rules('comprimento_cabeca', "Comprimento da cabeça", "trim|integer");
        $this->form_validation->set_rules('comprimento_asa', "Comprimento da asa", "trim|integer");
        $this->form_validation->set_rules('comprimento_cauda', "Comprimento da cauda", "trim|integer");
        $this->form_validation->set_rules('comprimento_tarso', "Comprimento do tarso", "trim|integer");
        $this->form_validation->set_rules('comprimento_dedo_sem_unha', "Comprimento do dedo sem unha", "trim|integer");
        $this->form_validation->set_rules('comprimento_dedo_com_unha', "Comprimento do dedo com unha", "trim|integer");
        $this->form_validation->set_rules('envergadura', "Envergadura", "trim|integer");

        $this->form_validation->set_rules('muda_asa', 'Muda Asa', 'trim|boolean_validation');
        $this->form_validation->set_rules('muda_cauda', 'Muda Cauda', 'trim|boolean_validation');
        $this->form_validation->set_rules('muda_cabeca', 'Muda Cabeça', 'trim|boolean_validation');
        $this->form_validation->set_rules('muda_dorso', 'Muda Dorso', 'trim|boolean_validation');
        $this->form_validation->set_rules('muda_ventre', 'Muda Ventre', 'trim|boolean_validation');


        //biometria
//        peso
//        comprimento_total
//        culmem
//        narina_culmem
//        altura_bico_base
//        altura_minima_bico
//        altura_bico_unguis
//        largura_bico_base
//        comprimento_cabeca
//        comprimento_asa
//        comprimento_cauda
//        comprimento_tarso
//        comprimento_dedo_sem_unha
//        comprimento_dedo_com_unha
//        envergadura
            //boolean
//        muda_asa
//        muda_cauda
//        muda_cabeca
//        muda_dorso
//        muda_ventre



        $this->form_validation->set_rules('data_necropsia', "Data da necropsia", "trim|date_validation");
        $this->form_validation->set_rules('local_necropsia', "Local da necropsia", "trim");
        $this->form_validation->set_rules('condicao_carcaca', 'Condição da carcaça', 'trim|in_array[' . implode(',', Utils::getCondicaoCarcaca()) . ']');
        $this->form_validation->set_rules('autolise', 'Autólise', 'trim|in_array[' . implode(',', Utils::getAutolise()) . ']');
        $this->form_validation->set_rules('sexagem', 'Sexagem', 'trim|in_array[' . implode(',', Utils::getSexagem()) . ']');
        $this->form_validation->set_rules('empetrolamento', 'Empetrolamento', 'trim|in_array[' . implode(',', Utils::getEmpetrolamento()) . ']');
        $this->form_validation->set_rules('condicao_corporal', 'Condição corporal', 'trim|in_array[' . implode(',', Utils::getCondicaoCorporal()) . ']');
        $this->form_validation->set_rules('piolhos', 'Piolhos', 'trim|in_array[' . implode(',', Utils::getCruz()) . ']');
        $this->form_validation->set_rules('carrapatos', 'Carrapatos', 'trim|in_array[' . implode(',', Utils::getCruz()) . ']');
        $this->form_validation->set_rules('pulgas', 'Pulgas', 'trim|in_array[' . implode(',', Utils::getCruz()) . ']');
        $this->form_validation->set_rules('lepadomorpha', 'Lepadomorpha', 'trim|in_array[' . implode(',', Utils::getCruz()) . ']');
        $this->form_validation->set_rules('larvas_putrefacao', 'Larvas de putrefação', 'trim|in_array[' . implode(',', Utils::getCruz()) . ']');
        $this->form_validation->set_rules('outro_parasita', 'Outros', 'trim|in_array[' . implode(',', Utils::getCruz()) . ']');
        $this->form_validation->set_rules('outro_parasita_descricao', 'Outros descrição', 'trim');
        $this->form_validation->set_rules('nematoides', 'Nematóides', 'trim|in_array[' . implode(',', Utils::getCruz()) . ']');
        $this->form_validation->set_rules('acantocefalos', 'Acantocéfalos', 'trim|in_array[' . implode(',', Utils::getCruz()) . ']');
        $this->form_validation->set_rules('cestoides', 'Cestóides', 'trim|in_array[' . implode(',', Utils::getCruz()) . ']');
        $this->form_validation->set_rules('trematoides', 'Trematóides', 'trim|in_array[' . implode(',', Utils::getCruz()) . ']');
        $this->form_validation->set_rules('encefalo', 'Encéfalo', 'in_array[' . implode(',', Utils::getAmostrasTecido()) . ']');
        $this->form_validation->set_rules('medula_ossea', 'Medula óssea', 'in_array[' . implode(',', Utils::getAmostrasTecido()) . ']');
        $this->form_validation->set_rules('musculo', 'Músculo', 'in_array[' . implode(',', Utils::getAmostrasTecido()) . ']');
        $this->form_validation->set_rules('figado', 'Fígado', 'in_array[' . implode(',', Utils::getAmostrasTecido()) . ']');
        $this->form_validation->set_rules('pulmao', 'Pulmão', 'in_array[' . implode(',', Utils::getAmostrasTecido()) . ']');
        $this->form_validation->set_rules('baco', 'Baço', 'in_array[' . implode(',', Utils::getAmostrasTecido()) . ']');
        $this->form_validation->set_rules('gordura', 'Gordura', 'in_array[' . implode(',', Utils::getAmostrasTecido()) . ']');



        //coleta material biologico
//        data_necropsia
//        local_necropsia
//        condicao_carcaca
//        autolise
//        sexagem
//        empetrolamento
//        condicao_corporal
//        piolhos
//        carrapatos
//        pulgas
//        lepadomorpha
//        larvas_putrefacao
//        outro_parasita
//        outro_parasita_descricao
//        nematoides
//        acantocefalos
//        cestoides
//        trematoides
            //multiplo array
//        encefalo
//        medula_ossea
//        musculo
//        figado
//        pulmao
//        baco
//        gordura
            //boolean
        $this->form_validation->set_rules('htp_pele', 'Pele', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_lingua', 'Língua', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_esofago', 'Esôfago', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_ingluvio', 'Inglúvio', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_tireoide', 'Tireóide', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_paratireoide', 'Paratireóide', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_siringe', 'Siringe', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_traqueia', 'Traquéia', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_pulmao', 'Pulmão', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_coracao', 'Coração', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_proventriculo', 'Proventrículo', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_ventriculo', 'Ventrículo', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_figado', 'Figado', 'trim|boolean_validation');


//        htp_pele
//        htp_lingua
//        htp_esofago
//        htp_ingluvio
//        htp_tireoide
//        htp_paratireoide
//        htp_siringe
//        htp_traqueia
//        htp_pulmao
//        htp_coracao
//        htp_proventriculo
//        htp_ventriculo
//        htp_figado


        $this->form_validation->set_rules('htp_vesicula_biliar', 'Vesícula biliar', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_baco', 'Baço', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_duodeno', 'Duodeno', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_jejuno', 'Jejuno', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_ileo_ceco_colon', 'Ileo/Ceco/Cólon', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_pancreas', 'Pâncreas', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_cloaca', 'Cloaca', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_rim', 'Rim', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_adrenais', 'Adrenais', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_ureter', 'Ureter', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_gonada', 'Gônada', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_bexiga', 'Bexiga', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_oviduto', 'Oviduto', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_bursa', 'Bursa', 'trim|boolean_validation');

//        htp_vesicula_biliar
//        htp_baco
//        htp_duodeno
//        htp_jejuno
//        htp_ileo_ceco_colon
//        htp_pancreas
//        htp_cloaca
//        htp_rim
//        htp_adrenais
//        htp_ureter
//        htp_gonada
//        htp_bexiga
//        htp_oviduto
//        htp_bursa


        $this->form_validation->set_rules('htp_grandes_vasos', 'Grandes vasos', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_saco_aereo', 'Saco aéreo', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_timo', 'Timo', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_musculo_esqueletico', 'Músculo esquelético', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_medula_ossea', 'Medula óssea', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_olho', 'Olho', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_gld_sal', 'Gld. Sal', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_encefalo', 'Encéfalo', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_cerebelo', 'Cerebelo', 'trim|boolean_validation');
        $this->form_validation->set_rules('htp_osso', 'Osso', 'trim|boolean_validation');


//        htp_grandes_vasos
//        htp_saco_aereo
//        htp_timo
//        htp_musculo_esqueletico
//        htp_medula_ossea
//        htp_olho
//        htp_gld_sal
//        htp_encefalo
//        htp_cerebelo
//        htp_osso


        $this->form_validation->set_rules('outra_pesquisa_swab_cloaca', 'Swab Cloaca', 'trim|boolean_validation');
        $this->form_validation->set_rules('outra_pesquisa_swab_coana', 'Swab Coana', 'trim|boolean_validation');
        $this->form_validation->set_rules('outra_pesquisa_conteudo_estomacal', 'Conteúdo estomacal', 'trim|boolean_validation');
        $this->form_validation->set_rules('outra_pesquisa_sangue_cardiaco', 'Sangue cardíaco', 'trim|boolean_validation');
        $this->form_validation->set_rules('outra_pesquisa_pena', 'Penas', 'in_array[' . implode(',', Utils::getPena()) . ']');
        $this->form_validation->set_rules('outra_pesquisa_outros', 'Outros', 'trim');
        $this->form_validation->set_rules('outra_pesquisa_observacoes', 'Observações', 'trim');

        //outras pesquisas
            //boolean
//        outra_pesquisa_swab_cloaca
//        outra_pesquisa_swab_coana
//        outra_pesquisa_conteudo_estomacal
//        outra_pesquisa_sangue_cardiaco
            //multiplo
//        outra_pesquisa_pena
//        outra_pesquisa_outros
//        outra_pesquisa_observacoes

        $this->form_validation->run();

        if ($returnError) {
            return $this->form_validation->error_array();
        }

        $return = array();
        $return["erro"] = $this->form_validation->error_array();
        $this->output->_mode = MY_Output::OUTPUT_MODE_NORMAL;
        $this->load->view("jsonresponse", $return);
    }

    protected function telaFiltro() {
        $filtro = $this->session->userdata('filtros_' . get_class($this));

        $aves = $this->doctrine->em->getRepository("Ave")->findBy(
                array(), array('nomeCientifico' => 'ASC')
        );

        return $this->load->view($this->viewPath . "/filter", array(
            "aves"=>$aves,
            "filtro"=>$filtro
                ), true
        );
    }

    public function filter() {
        $filtros = array();

        if ($this->input->post('codigo') && is_numeric($this->input->post('codigo'))) {
            $filtros['codigo'] = $this->input->post('codigo');
        }

        if ($this->input->post('etiqueta') && $this->input->post('etiqueta') != '') {
            $filtros['etiqueta'] = $this->input->post('etiqueta');
        }

        if ($this->input->post('etiqueta_antiga') && $this->input->post('etiqueta_antiga') != '') {
            $filtros['etiqueta_antiga'] = $this->input->post('etiqueta_antiga');
        }

        if ($this->input->post('especie') && is_numeric($this->input->post('especie'))) {
            $filtros['especie'] = $this->input->post('especie');
        }

        if ($this->input->post('responsavel') && $this->input->post('responsavel') != '') {
            $filtros['responsavel'] = $this->input->post('responsavel');
        }

        if ($this->input->post('data_entrada') && !is_null(Utils::dateToDatabaseDate($this->input->post('data_entrada')))) {
            $filtros['data_entrada'] = Utils::dateToDatabaseDate($this->input->post('data_entrada'));
        }

        if ($this->input->post('data_captura') && !is_null(Utils::dateToDatabaseDate($this->input->post('data_captura')))) {
            $filtros['data_captura'] = Utils::dateToDatabaseDate($this->input->post('data_captura'));
        }

        $this->session->set_userdata('filtros_' . get_class($this), $filtros);
        redirect(strtolower(get_class($this)) . '/index');
    }

    public function exclui(){
        $objeto = $this->doctrine->em->find("MedConservacao", $this->input->get("id"));

        if (is_null($objeto)) {
            show_error('unknown_registry_error_message');
        }

        $this->doctrine->em->remove($objeto);
        $this->doctrine->em->flush();
        $this->session->set_flashdata(get_class($this) . '_mensagem', 'Registro excluído com sucesso.');
		redirect(strtolower(get_class($this)) . '/index');
    }

    public function obterlances() {
        $ret = array();
        if ($this->input->post('cruzeiro') && is_numeric($this->input->post('cruzeiro'))) {
            $cruzeiro = $this->doctrine->em->find('Cruzeiro', $this->input->post('cruzeiro'));

            if ($cruzeiro) {
                $lances = $cruzeiro->getDadosAbioticos()->toArray();
                foreach ($lances as $value) {
                    $ret[] = $value->__toJson();
                }
            }
        }

        $return = array();
        $return["data"] = $ret;
        $this->output->_mode = MY_Output::OUTPUT_MODE_NORMAL;
        $this->load->view("jsonresponse", $return);
    }

    public function clearfilter() {
        $this->session->set_userdata('filtros_' . get_class($this), array());
        redirect(strtolower(get_class($this)) . '/index');
    }

    protected function filterQueryBuilder() {
        $queryBuilder = $this->doctrine->em->createQueryBuilder();
        $queryBuilder->select("r")->from("MedConservacao", "r");
        $filtrosSessao = $this->session->userdata('filtros_' . get_class($this));


        if (!empty($filtrosSessao)) {
            if (isset($filtrosSessao['codigo'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->eq('r.id', '?1'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(1, $filtrosSessao['codigo']);
            }

            if (isset($filtrosSessao['etiqueta'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->eq('r.etiqueta', '?2'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(2, $filtrosSessao['etiqueta']);
            }

            if (isset($filtrosSessao['etiqueta_antiga'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->eq('r.etiquetaAntiga', '?3'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(3, $filtrosSessao['etiqueta_antiga']);
            }

            if (isset($filtrosSessao['especie'])) {
                $queryBuilder->join("r.especie", "e");
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->eq('e.id', '?4'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(4, $filtrosSessao['especie']);
            }

            if (isset($filtrosSessao['responsavel'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->eq('r.responsavel', '?5'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(5, $filtrosSessao['responsavel']);
            }

            if (isset($filtrosSessao['data_entrada'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->eq('r.dataEntrada', '?6'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(6, $filtrosSessao['data_entrada']);
            }

            if (isset($filtrosSessao['data_captura'])) {
                $wherex = $queryBuilder->expr()->orx();
                $wherex->add($queryBuilder->expr()->eq('r.dataCaptura', '?7'));
                $queryBuilder->andWhere($wherex);
                $queryBuilder->setParameter(7, $filtrosSessao['data_captura']);
            }
        }

        $query = $queryBuilder->getQuery();

        return $query;
    }
}
