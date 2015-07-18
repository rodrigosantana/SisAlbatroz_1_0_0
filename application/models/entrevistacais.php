<?php

/**
 * EntrevistaCais
 *
 * @Table(name="entrevista_cais")
 * @Entity
 */
class EntrevistaCais {

    /**
     * @var integer
     *
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="entrevista_cais_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var $responsavelCampo
     *
     * @ManyToOne(targetEntity="SystemUsers")
     * @JoinColumns({
     *   @JoinColumn(name="responsavel_campo", referencedColumnName="id")
     * })
     */
    private $responsavelCampo;

    /**
     * @var date
     *
     * @Column(name="data", type="date")
     */
    private $data;

    /**
     * @var empresa
     *
     * @ManyToOne(targetEntity="Cad_Empresa")
     * @JoinColumns({
     *   @JoinColumn(name="empresa", referencedColumnName="id_empresa")
     * })
     */
    private $empresa;

    /**
     * @var municipio
     *
     * @ManyToOne(targetEntity="Municipio")
     * @JoinColumns({
     *   @JoinColumn(name="municipio", referencedColumnName="id")
     * })
     */
    private $municipio;

    /**
     * @var embarcacao
     *
     * @ManyToOne(targetEntity="CadEmbarcacao")
     * @JoinColumns({
     *   @JoinColumn(name="embarcacao", referencedColumnName="id_embarcacao")
     * })
     */
    private $embarcacao;

    /**
     * @var porto
     *
     * @ManyToOne(targetEntity="Porto")
     * @JoinColumns({
     *   @JoinColumn(name="porto_saida", referencedColumnName="id")
     * })
     */
    private $portoSaida;

    /**
     * @var date
     *
     * @Column(name="data_saida", type="date")
     */
    private $dataSaida;

    /**
     * @var time
     *
     * @Column(name="hora_saida", type="time")
     */
    private $horaSaida;

    /**
     * @var date
     *
     * @Column(name="data_chegada", type="date")
     */
    private $dataChegada;

    /**
     * @var time
     *
     * @Column(name="hora_chegada", type="time")
     */
    private $horaChegada;

    /**
     * @var integer
     *
     * @Column(name="dias_mar", type="integer")
     */
    private $diasMar;

    /**
     * @var integer
     *
     * @Column(name="dias_pesca", type="integer")
     */
    private $diasPesca;

    /**
     * @var petrecho
     *
     * @ManyToOne(targetEntity="Petrecho", cascade={"all"})
     * @JoinColumns({
     *   @JoinColumn(name="petrecho", referencedColumnName="id")
     * })
     */
    private $petrecho;

    /**
     * @var boolean
     *
     * @Column(name="ave_observado", type="boolean")
     */
    private $aveObservado;

    /**
     * @var boolean
     *
     * @Column(name="ave_atrapalhou", type="boolean")
     */
    private $aveAtrapalhou;

    /**
     * @var $usuarioInsercao
     *
     * @ManyToOne(targetEntity="SystemUsers")
     * @JoinColumns({
     *   @JoinColumn(name="usuario_insercao", referencedColumnName="id")
     * })
     */
    private $usuarioInsercao;

    /**
     * @var $usuarioAlteracao
     *
     * @ManyToOne(targetEntity="SystemUsers")
     * @JoinColumns({
     *   @JoinColumn(name="usuario_alteracao", referencedColumnName="id")
     * })
     */
    private $usuarioAlteracao;

    /**
     * @var string $dataInsercao
     *
     * @Column(name="data_insercao", type="datetime")
     */
    private $dataInsercao;

    /**
     * @var string $dataAlteracao
     *
     * @Column(name="data_alteracao", type="datetime")
     */
    private $dataAlteracao;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     * @OneToMany(targetEntity="EntrevistaCaisAreaPesca", mappedBy="entrevistaCais", cascade={"all"})
     */
    private $areasPesca; 
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     * @OneToMany(targetEntity="EntrevistaCaisCapturaAve", mappedBy="entrevistaCais", cascade={"all"})
     */
    private $capturasAves;     
    
    public function __construct() {
        $this->areasPesca = new \Doctrine\Common\Collections\ArrayCollection();
        $this->capturasAves = new \Doctrine\Common\Collections\ArrayCollection();
    } 
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    function getResponsavelCampo() {
        return $this->responsavelCampo;
    }

    function getData() {
        return $this->data;
    }

    function getEmpresa() {
        return $this->empresa;
    }

    function getMunicipio() {
        return $this->municipio;
    }

    function getEmbarcacao() {
        return $this->embarcacao;
    }

    function getPortoSaida() {
        return $this->portoSaida;
    }

    function getDataSaida() {
        return $this->dataSaida;
    }

    function getHoraSaida() {
        return $this->horaSaida;
    }

    function getDataChegada() {
        return $this->dataChegada;
    }

    function getHoraChegada() {
        return $this->horaChegada;
    }

    function getDiasMar() {
        return $this->diasMar;
    }

    function getDiasPesca() {
        return $this->diasPesca;
    }

    function getPetrecho() {
        return $this->petrecho;
    }

    function getAveObservado() {
        return $this->aveObservado;
    }

    function getAveAtrapalhou() {
        return $this->aveAtrapalhou;
    }

    function setResponsavelCampo($responsavelCampo) {
        $this->responsavelCampo = $responsavelCampo;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setEmpresa(Cad_empresa $empresa = null) {
        $this->empresa = $empresa;
    }

    function setMunicipio(Municipio $municipio = null) {
        $this->municipio = $municipio;
    }

    function setEmbarcacao(CadEmbarcacao $embarcacao) {
        $this->embarcacao = $embarcacao;
    }

    function setPortoSaida(Porto $portoSaida = null) {
        $this->portoSaida = $portoSaida;
    }

    function setDataSaida($dataSaida) {
        $this->dataSaida = $dataSaida;
    }

    function setHoraSaida($horaSaida) {
        $this->horaSaida = $horaSaida;
    }

    function setDataChegada($dataChegada) {
        $this->dataChegada = $dataChegada;
    }

    function setHoraChegada($horaChegada) {
        $this->horaChegada = $horaChegada;
    }

    function setDiasMar($diasMar) {
        $this->diasMar = $diasMar;
    }

    function setDiasPesca($diasPesca) {
        $this->diasPesca = $diasPesca;
    }

    function setPetrecho(Petrecho $petrecho = null) {
        $this->petrecho = $petrecho;
    }

    function setAveObservado($aveObservado) {
        $this->aveObservado = $aveObservado;
    }

    function setAveAtrapalhou($aveAtrapalhou) {
        $this->aveAtrapalhou = $aveAtrapalhou;
    }
    
    public function setUsuarioInsercao(SystemUsers $usuario) {
        $this->usuarioInsercao = $usuario;
    }

    public function getUsuarioInsercao() {
        return $this->usuarioInsercao;
    }

    public function setUsuarioAlteracao(SystemUsers $usuario) {
        $this->usuarioAlteracao = $usuario;
    }

    public function getUsuarioAlteracao() {
        return $this->usuarioAlteracao;
    }

    public function setDataInsercao($data) {
        $this->dataInsercao = $data;
    }

    public function getDataInsercao() {
        return $this->dataInsercao;
    }

    public function setDataAlteracao($data) {
        $this->dataAlteracao = $data;
    }

    public function getDataAlteracao() {
        return $this->dataAlteracao;
    }

    public function addAreasPesca(EntrevistaCaisAreaPesca $areaPesca) {
        $areaPesca->setEntrevistaCais($this);
        $this->areasPesca[] = $areaPesca;
        return $this;
    }
    
    public function getAreaspesca() {
        return $this->areasPesca;
    }
    
    public function addCapturasAves(EntrevistaCaisCapturaAve $captura) {
        $captura->setEntrevistaCais($this);
        $this->capturasAves[] = $captura;
        return $this;
    }
    
    public function getCapturasAves() {
        return $this->capturasAves;
    }
}
