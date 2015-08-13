<?php

/**
 * McColetaMaterialBiologico
 *
 * @Table(name="mc_coleta_material_biologico")
 * @Entity
 */
class McColetaMaterialBiologico {

    /**
     * @id
     * @OneToOne(targetEntity="MedConservacao", inversedBy="capturaIncidental")
     * @JoinColumn(name="id", referencedColumnName="id")
     * */
    private $id;

    /**
     * @var date
     * @Column(name="data_necropsia", type="date")
     */
    private $dataNecropsia;

    /**
     * @var string
     * @Column(name="local_necropsia", type="text")
     */
    private $localNecropsia;

    /**
     * @var string
     *
     * @Column(name="condicao_carcaca", type="string", length=50)
     */
    private $condicaoCarcaca;

    /**
     * @var string
     *
     * @Column(name="autolise", type="string", length=50)
     */
    private $autolise;

    /**
     * @var string
     *
     * @Column(name="sexagem", type="string", length=50)
     */
    private $sexagem;

    /**
     * @var string
     *
     * @Column(name="empetrolamento", type="string", length=50)
     */
    private $empetrolamento;

    /**
     * @var string
     *
     * @Column(name="condicao_corporal", type="string", length=50)
     */
    private $condicaoCorporal;

    /**
     * @var string
     *
     * @Column(name="piolho", type="string", length=50)
     */
    private $piolho;

    /**
     * @var string
     *
     * @Column(name="carrapato", type="string", length=50)
     */
    private $carrapato;

    /**
     * @var string
     *
     * @Column(name="pulga", type="string", length=50)
     */
    private $pulga;

    /**
     * @var string
     *
     * @Column(name="lepadomorpha", type="string", length=50)
     */
    private $lepadomorpha;

    /**
     * @var string
     *
     * @Column(name="larvas_putrefacao", type="string", length=50)
     */
    private $larvasPutrefacao;

    /**
     * @var string
     *
     * @Column(name="outros", type="string", length=50)
     */
    private $outros;

    /**
     * @var string
     *
     * @Column(name="outros_descricao", type="string", length=255)
     */
    private $outrosDescricao;

    /**
     * @var string
     *
     * @Column(name="nematoides", type="string", length=50)
     */
    private $nematoides;

    /**
     * @var string
     *
     * @Column(name="acantocefalos", type="string", length=50)
     */
    private $acantocefalos;

    /**
     * @var string
     *
     * @Column(name="cestoides", type="string", length=50)
     */
    private $cestoides;

    /**
     * @var string
     *
     * @Column(name="trematoides", type="string", length=50)
     */
    private $trematoides;

    /**
     * @var array
     *
     * @Column(name="amt_encefalo", type="array")
     */
    private $amtEncefalo;

    /**
     * @var array
     *
     * @Column(name="amt_medula_ossea", type="array")
     */
    private $amtMedulaOssea;

    /**
     * @var array
     *
     * @Column(name="amt_musculo", type="array")
     */
    private $amtMusculo;

    /**
     * @var array
     *
     * @Column(name="amt_figado", type="array")
     */
    private $amtFigado;
    
    /**
     * @var array
     *
     * @Column(name="amt_pulmao", type="array")
     */
    private $amtPulmao;

    /**
     * @var array
     *
     * @Column(name="amt_baco", type="array")
     */
    private $amtBaco;

    /**
     * @var array
     *
     * @Column(name="amt_gordura", type="array")
     */
    private $amtGordura;

    /**
     * @var boolean
     * @Column(name="htp_pele", type="boolean")
     */
    private $htpPele;

    /**
     * @var boolean
     * @Column(name="htp_lingua", type="boolean")
     */
    private $htpLingua;

    /**
     * @var boolean
     * @Column(name="htp_esofago", type="boolean")
     */
    private $htpEsofago;

    /**
     * @var boolean
     * @Column(name="htp_ingluvio", type="boolean")
     */
    private $htpIngluvio;

    /**
     * @var boolean
     * @Column(name="htp_tireoide", type="boolean")
     */
    private $htpTireoide;

    /**
     * @var boolean
     * @Column(name="htp_paratireoide", type="boolean")
     */
    private $htpParatireoide;

    /**
     * @var boolean
     * @Column(name="htp_siringe", type="boolean")
     */
    private $htpSiringe;

    /**
     * @var boolean
     * @Column(name="htp_traqueia", type="boolean")
     */
    private $htpTraqueia;

    /**
     * @var boolean
     * @Column(name="htp_pulmao", type="boolean")
     */
    private $htpPulmao;

    /**
     * @var boolean
     * @Column(name="htp_coracao", type="boolean")
     */
    private $htpCoracao;

    /**
     * @var boolean
     * @Column(name="htp_proventriculo", type="boolean")
     */
    private $htpProventriculo;

    /**
     * @var boolean
     * @Column(name="htp_ventriculo", type="boolean")
     */
    private $htpVentriculo;

    /**
     * @var boolean
     * @Column(name="htp_figado", type="boolean")
     */
    private $htpFigado;

    /**
     * @var boolean
     * @Column(name="htp_vesicula_biliar", type="boolean")
     */
    private $htpVesiculaBiliar;

    /**
     * @var boolean
     * @Column(name="htp_baco", type="boolean")
     */
    private $htpBaco;

    /**
     * @var boolean
     * @Column(name="htp_duodeno", type="boolean")
     */
    private $htpDuodeno;

    /**
     * @var boolean
     * @Column(name="htp_jejuno", type="boolean")
     */
    private $htpJejuno;

    /**
     * @var boolean
     * @Column(name="htp_ileo_ceco_colon", type="boolean")
     */
    private $htpIleoCecoColon;

    /**
     * @var boolean
     * @Column(name="htp_pancreas", type="boolean")
     */
    private $htpPancreas;

    /**
     * @var boolean
     * @Column(name="htp_cloaca", type="boolean")
     */
    private $htpCloaca;

    /**
     * @var boolean
     * @Column(name="htp_rim", type="boolean")
     */
    private $htpRim;

    /**
     * @var boolean
     * @Column(name="htp_adrenais", type="boolean")
     */
    private $htpAdrenais;

    /**
     * @var boolean
     * @Column(name="htp_ureter", type="boolean")
     */
    private $htpUreter;

    /**
     * @var boolean
     * @Column(name="htp_gonada", type="boolean")
     */
    private $htpGonada;

    /**
     * @var boolean
     * @Column(name="htp_bexiga", type="boolean")
     */
    private $htpBexiga;

    /**
     * @var boolean
     * @Column(name="htp_oviduto", type="boolean")
     */
    private $htpOviduto;

    /**
     * @var boolean
     * @Column(name="htp_bursa", type="boolean")
     */
    private $htpBursa;

    /**
     * @var boolean
     * @Column(name="htp_grandes_vasos", type="boolean")
     */
    private $htpGrandesVasos;

    /**
     * @var boolean
     * @Column(name="htp_saco_aereo", type="boolean")
     */
    private $htpSacoAereo;

    /**
     * @var boolean
     * @Column(name="htp_timo", type="boolean")
     */
    private $htpTimo;

    /**
     * @var boolean
     * @Column(name="htp_musculo_esqueletico", type="boolean")
     */
    private $htpMusculoEsqueletico;

    /**
     * @var boolean
     * @Column(name="htp_medula_ossea", type="boolean")
     */
    private $htpMedulaOssea;

    /**
     * @var boolean
     * @Column(name="htp_olho", type="boolean")
     */
    private $htpOlho;

    /**
     * @var boolean
     * @Column(name="htp_gld_sal", type="boolean")
     */
    private $htpGldSal;

    /**
     * @var boolean
     * @Column(name="htp_encefalo", type="boolean")
     */
    private $htpEncefalo;

    /**
     * @var boolean
     * @Column(name="htp_cerebelo", type="boolean")
     */
    private $htpCerebelo;

    /**
     * @var boolean
     * @Column(name="htp_osso", type="boolean")
     */
    private $htpOsso;

    public function __construct() {
        $this->amtBaco = array();
        $this->amtEncefalo = array();
        $this->amtFigado = array();
        $this->amtFigado = array();
        $this->amtGordura = array();
        $this->amtMedulaOssea = array();
        $this->amtMusculo = array();
        $this->amtPulmao = array();        
    }
   
    public function getId() {
        return $this->id;
    }

    public function setId(MedConservacao $id) {
        $this->id = $id;
    }
    
    public function getDataNecropsia() {
        return $this->dataNecropsia;
    }

    public function getLocalNecropsia() {
        return $this->localNecropsia;
    }

    public function getCondicaoCarcaca() {
        return $this->condicaoCarcaca;
    }

    public function getAutolise() {
        return $this->autolise;
    }

    public function getSexagem() {
        return $this->sexagem;
    }

    public function getEmpetrolamento() {
        return $this->empetrolamento;
    }

    public function getCondicaoCorporal() {
        return $this->condicaoCorporal;
    }

    public function getPiolho() {
        return $this->piolho;
    }

    public function getCarrapato() {
        return $this->carrapato;
    }

    public function getPulga() {
        return $this->pulga;
    }

    public function getLepadomorpha() {
        return $this->lepadomorpha;
    }

    public function getLarvasPutrefacao() {
        return $this->larvasPutrefacao;
    }

    public function getOutros() {
        return $this->outros;
    }

    public function getOutrosDescricao() {
        return $this->outrosDescricao;
    }

    public function getNematoides() {
        return $this->nematoides;
    }

    public function getAcantocefalos() {
        return $this->acantocefalos;
    }

    public function getCestoides() {
        return $this->cestoides;
    }

    public function getTrematoides() {
        return $this->trematoides;
    }

    public function getAmtEncefalo() {
        if (is_null($this->amtEncefalo)) {
            $this->amtEncefalo = array();
        }
        
        return $this->amtEncefalo;
    }

    public function getAmtMedulaOssea() {
        if (is_null($this->amtMedulaOssea)) {
            $this->amtMedulaOssea = array();
        }
        
        return $this->amtMedulaOssea;
    }

    public function getAmtMusculo() {
        if (is_null($this->amtMusculo)) {
            $this->amtMusculo = array();
        }
        
        return $this->amtMusculo;
    }

    public function getAmtFigado() {
        if (is_null($this->amtFigado)) {
            $this->amtFigado = array();
        }
        
        return $this->amtFigado;
    }
    
    public function getAmtPulmao() {
        if (is_null($this->amtPulmao)) {
            $this->amtPulmao = array();
        }
        
        return $this->amtPulmao;
    }

    public function getAmtBaco() {
        if (is_null($this->amtBaco)) {
            $this->amtBaco = array();
        }
        
        return $this->amtBaco;
    }

    public function getAmtGordura() {
        if (is_null($this->amtGordura)) {
            $this->amtGordura = array();
        }
        
        return $this->amtGordura;
    }

    public function getHtpPele() {
        return $this->htpPele;
    }

    public function getHtpLingua() {
        return $this->htpLingua;
    }

    public function getHtpEsofago() {
        return $this->htpEsofago;
    }

    public function getHtpIngluvio() {
        return $this->htpIngluvio;
    }

    public function getHtpTireoide() {
        return $this->htpTireoide;
    }

    public function getHtpParatireoide() {
        return $this->htpParatireoide;
    }

    public function getHtpSiringe() {
        return $this->htpSiringe;
    }

    public function getHtpTraqueia() {
        return $this->htpTraqueia;
    }

    public function getHtpPulmao() {
        return $this->htpPulmao;
    }

    public function getHtpCoracao() {
        return $this->htpCoracao;
    }

    public function getHtpProventriculo() {
        return $this->htpProventriculo;
    }

    public function getHtpVentriculo() {
        return $this->htpVentriculo;
    }

    public function getHtpFigado() {
        return $this->htpFigado;
    }

    public function getHtpVesiculaBiliar() {
        return $this->htpVesiculaBiliar;
    }

    public function getHtpBaco() {
        return $this->htpBaco;
    }

    public function getHtpDuodeno() {
        return $this->htpDuodeno;
    }

    public function getHtpJejuno() {
        return $this->htpJejuno;
    }

    public function getHtpIleoCecoColon() {
        return $this->htpIleoCecoColon;
    }

    public function getHtpPancreas() {
        return $this->htpPancreas;
    }

    public function getHtpCloaca() {
        return $this->htpCloaca;
    }

    public function getHtpRim() {
        return $this->htpRim;
    }

    public function getHtpAdrenais() {
        return $this->htpAdrenais;
    }

    public function getHtpUreter() {
        return $this->htpUreter;
    }

    public function getHtpGonada() {
        return $this->htpGonada;
    }

    public function getHtpBexiga() {
        return $this->htpBexiga;
    }

    public function getHtpOviduto() {
        return $this->htpOviduto;
    }

    public function getHtpBursa() {
        return $this->htpBursa;
    }

    public function getHtpGrandesVasos() {
        return $this->htpGrandesVasos;
    }

    public function getHtpSacoAereo() {
        return $this->htpSacoAereo;
    }

    public function getHtpTimo() {
        return $this->htpTimo;
    }

    public function getHtpMusculoEsqueletico() {
        return $this->htpMusculoEsqueletico;
    }

    public function getHtpMedulaOssea() {
        return $this->htpMedulaOssea;
    }

    public function getHtpOlho() {
        return $this->htpOlho;
    }

    public function getHtpGldSal() {
        return $this->htpGldSal;
    }

    public function getHtpEncefalo() {
        return $this->htpEncefalo;
    }

    public function getHtpCerebelo() {
        return $this->htpCerebelo;
    }

    public function getHtpOsso() {
        return $this->htpOsso;
    }

    public function setDataNecropsia($dataNecropsia = null) {
        $this->dataNecropsia = $dataNecropsia;
    }

    public function setLocalNecropsia($localNecropsia) {
        $this->localNecropsia = $localNecropsia;
    }

    public function setCondicaoCarcaca($condicaoCarcaca) {
        $this->condicaoCarcaca = $condicaoCarcaca;
    }

    public function setAutolise($autolise) {
        $this->autolise = $autolise;
    }

    public function setSexagem($sexagem) {
        $this->sexagem = $sexagem;
    }

    public function setEmpetrolamento($empetrolamento) {
        $this->empetrolamento = $empetrolamento;
    }

    public function setCondicaoCorporal($condicaoCorporal) {
        $this->condicaoCorporal = $condicaoCorporal;
    }

    public function setPiolho($piolho) {
        $this->piolho = $piolho;
    }

    public function setCarrapato($carrapato) {
        $this->carrapato = $carrapato;
    }

    public function setPulga($pulga) {
        $this->pulga = $pulga;
    }

    public function setLepadomorpha($lepadomorpha) {
        $this->lepadomorpha = $lepadomorpha;
    }

    public function setLarvasPutrefacao($larvasPutrefacao) {
        $this->larvasPutrefacao = $larvasPutrefacao;
    }

    public function setOutros($outros) {
        $this->outros = $outros;
    }

    public function setOutrosDescricao($outrosDescricao) {
        $this->outrosDescricao = $outrosDescricao;
    }

    public function setNematoides($nematoides) {
        $this->nematoides = $nematoides;
    }

    public function setAcantocefalos($acantocefalos) {
        $this->acantocefalos = $acantocefalos;
    }

    public function setCestoides($cestoides) {
        $this->cestoides = $cestoides;
    }

    public function setTrematoides($trematoides) {
        $this->trematoides = $trematoides;
    }

    public function setAmtEncefalo($amtEncefalo) {
        if (is_null($amtEncefalo)) {
            $this->amtEncefalo = array();
        }
        
        $this->amtEncefalo = $amtEncefalo;
    }

    public function setAmtMedulaOssea($amtMedulaOssea) {
        if (is_null($amtMedulaOssea)) {
            $this->amtMedulaOssea = array();
        }
        
        $this->amtMedulaOssea = $amtMedulaOssea;
    }

    public function setAmtMusculo($amtMusculo) {
        if (is_null($amtMusculo)) {
            $this->amtMusculo = array();
        }
        
        $this->amtMusculo = $amtMusculo;
    }
    
    public function setAmtFigado($amtFigado) {
        if (is_null($amtFigado)) {
            $this->amtFigado = array();
        }
        
        $this->amtFigado = $amtFigado;
    }

    public function setAmtPulmao($amtPulmao) {
        if (is_null($amtPulmao)) {
            $this->amtPulmao = array();
        }
        
        $this->amtPulmao = $amtPulmao;
    }

    public function setAmtBaco($amtBaco) {
        if (is_null($amtBaco)) {
            $this->amtBaco = array();
        }
        
        $this->amtBaco = $amtBaco;
    }

    public function setAmtGordura($amtGordura) {
        if (is_null($amtGordura)) {
            $this->amtGordura = array();
        }
        
        $this->amtGordura = $amtGordura;
    }

    public function setHtpPele($htpPele) {
        $this->htpPele = $htpPele;
    }

    public function setHtpLingua($htpLingua) {
        $this->htpLingua = $htpLingua;
    }

    public function setHtpEsofago($htpEsofago) {
        $this->htpEsofago = $htpEsofago;
    }

    public function setHtpIngluvio($htpIngluvio) {
        $this->htpIngluvio = $htpIngluvio;
    }

    public function setHtpTireoide($htpTireoide) {
        $this->htpTireoide = $htpTireoide;
    }

    public function setHtpParatireoide($htpParatireoide) {
        $this->htpParatireoide = $htpParatireoide;
    }

    public function setHtpSiringe($htpSiringe) {
        $this->htpSiringe = $htpSiringe;
    }

    public function setHtpTraqueia($htpTraqueia) {
        $this->htpTraqueia = $htpTraqueia;
    }

    public function setHtpPulmao($htpPulmao) {
        $this->htpPulmao = $htpPulmao;
    }

    public function setHtpCoracao($htpCoracao) {
        $this->htpCoracao = $htpCoracao;
    }

    public function setHtpProventriculo($htpProventriculo) {
        $this->htpProventriculo = $htpProventriculo;
    }

    public function setHtpVentriculo($htpVentriculo) {
        $this->htpVentriculo = $htpVentriculo;
    }

    public function setHtpFigado($htpFigado) {
        $this->htpFigado = $htpFigado;
    }

    public function setHtpVesiculaBiliar($htpVesiculaBiliar) {
        $this->htpVesiculaBiliar = $htpVesiculaBiliar;
    }

    public function setHtpBaco($htpBaco) {
        $this->htpBaco = $htpBaco;
    }

    public function setHtpDuodeno($htpDuodeno) {
        $this->htpDuodeno = $htpDuodeno;
    }

    public function setHtpJejuno($htpJejuno) {
        $this->htpJejuno = $htpJejuno;
    }

    public function setHtpIleoCecoColon($htpIleoCecoColon) {
        $this->htpIleoCecoColon = $htpIleoCecoColon;
    }

    public function setHtpPancreas($htpPancreas) {
        $this->htpPancreas = $htpPancreas;
    }

    public function setHtpCloaca($htpCloaca) {
        $this->htpCloaca = $htpCloaca;
    }

    public function setHtpRim($htpRim) {
        $this->htpRim = $htpRim;
    }

    public function setHtpAdrenais($htpAdrenais) {
        $this->htpAdrenais = $htpAdrenais;
    }

    public function setHtpUreter($htpUreter) {
        $this->htpUreter = $htpUreter;
    }

    public function setHtpGonada($htpGonada) {
        $this->htpGonada = $htpGonada;
    }

    public function setHtpBexiga($htpBexiga) {
        $this->htpBexiga = $htpBexiga;
    }

    public function setHtpOviduto($htpOviduto) {
        $this->htpOviduto = $htpOviduto;
    }

    public function setHtpBursa($htpBursa) {
        $this->htpBursa = $htpBursa;
    }

    public function setHtpGrandesVasos($htpGrandesVasos) {
        $this->htpGrandesVasos = $htpGrandesVasos;
    }

    public function setHtpSacoAereo($htpSacoAereo) {
        $this->htpSacoAereo = $htpSacoAereo;
    }

    public function setHtpTimo($htpTimo) {
        $this->htpTimo = $htpTimo;
    }

    public function setHtpMusculoEsqueletico($htpMusculoEsqueletico) {
        $this->htpMusculoEsqueletico = $htpMusculoEsqueletico;
    }

    public function setHtpMedulaOssea($htpMedulaOssea) {
        $this->htpMedulaOssea = $htpMedulaOssea;
    }

    public function setHtpOlho($htpOlho) {
        $this->htpOlho = $htpOlho;
    }

    public function setHtpGldSal($htpGldSal) {
        $this->htpGldSal = $htpGldSal;
    }

    public function setHtpEncefalo($htpEncefalo) {
        $this->htpEncefalo = $htpEncefalo;
    }

    public function setHtpCerebelo($htpCerebelo) {
        $this->htpCerebelo = $htpCerebelo;
    }

    public function setHtpOsso($htpOsso) {
        $this->htpOsso = $htpOsso;
    }

    public function toArray() {
        $data = array(
            'dataNecropsia' => $this->dataNecropsia == null ? null : $this->dataNecropsia->format('Y-m-d'),
            'localNecropsia' => $this->localNecropsia,
            'condicaoCarcaca' => $this->condicaoCarcaca,
            'autolise' => $this->autolise,
            'sexagem' => $this->sexagem,
            'empetrolamento' => $this->empetrolamento,
            'condicaoCorporal' => $this->condicaoCorporal,
            'piolho' => $this->piolho,
            'carrapato' => $this->carrapato,
            'pulga' => $this->pulga,
            'lepadomorpha' => $this->lepadomorpha,
            'larvasPutrefacao' => $this->larvasPutrefacao,
            'outros' => $this->outros,
            'outrosDescricao' => $this->outrosDescricao,
            'nematoides' => $this->nematoides,
            'acantocefalos' => $this->acantocefalos,
            'cestoides' => $this->cestoides,
            'trematoides' => $this->trematoides,
            'amtEncefalo' => $this->amtEncefalo,
            'amtMedulaOssea' => $this->amtMedulaOssea,
            'amtMusculo' => $this->amtMusculo,
            'amtFigado' => $this->amtFigado,
            'amtPulmao' => $this->amtPulmao,
            'amtBaco' => $this->amtBaco,
            'amtGordura' => $this->amtGordura,
            'htpPele' => $this->htpPele,
            'htpLingua' => $this->htpLingua,
            'htpEsofago' => $this->htpEsofago,
            'htpIngluvio' => $this->htpIngluvio,
            'htpTireoide' => $this->htpTireoide,
            'htpParatireoide' => $this->htpParatireoide,
            'htpSiringe' => $this->htpSiringe,
            'htpTraqueia' => $this->htpTraqueia,
            'htpPulmao' => $this->htpPulmao,
            'htpCoracao' => $this->htpCoracao,
            'htpProventriculo' => $this->htpProventriculo,
            'htpVentriculo' => $this->htpVentriculo,
            'htpFigado' => $this->htpFigado,
            'htpVesiculaBiliar' => $this->htpVesiculaBiliar,
            'htpBaco' => $this->htpBaco,
            'htpDuodeno' => $this->htpDuodeno,
            'htpJejuno' => $this->htpJejuno,
            'htpIleoCecoColon' => $this->htpIleoCecoColon,
            'htpPancreas' => $this->htpPancreas,
            'htpCloaca' => $this->htpCloaca,
            'htpRim' => $this->htpRim,
            'htpAdrenais' => $this->htpAdrenais,
            'htpUreter' => $this->htpUreter,
            'htpGonada' => $this->htpGonada,
            'htpBexiga' => $this->htpBexiga,
            'htpOviduto' => $this->htpOviduto,
            'htpBursa' => $this->htpBursa,
            'htpGrandesVasos' => $this->htpGrandesVasos,
            'htpSacoAereo' => $this->htpSacoAereo,
            'htpTimo' => $this->htpTimo,
            'htpMusculoEsqueletico' => $this->htpMusculoEsqueletico,
            'htpMedulaOssea' => $this->htpMedulaOssea,
            'htpOlho' => $this->htpOlho,
            'htpGldSal' => $this->htpGldSal,
            'htpEncefalo' => $this->htpEncefalo,
            'htpCerebelo' => $this->htpCerebelo,
            'htpOsso' => $this->htpOsso
        );
        
        return $data;
    }
}
