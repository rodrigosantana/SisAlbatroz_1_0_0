<?php

/**
 * Cruzeiro
 *
 * @Table(name="cruzeiro")
 * @Entity
 */
class Cruzeiro
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="cruzeiro_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @Column(name="data_saida", type="date", nullable=true)
     */
    private $dataSaida;

    /**
     * @var \DateTime
     *
     * @Column(name="data_chegada", type="date", nullable=true)
     */
    private $dataChegada;

    /**
     * @var string
     *
     * @Column(name="observacao", type="text", nullable=true)
     */
    private $observacao;

    /**
     * @var \CadFinanciador
     *
     * @ManyToOne(targetEntity="CadFinanciador")
     * @JoinColumns({
     *   @JoinColumn(name="financiador", referencedColumnName="id")
     * })
     */
    private $financiador;

    /**
     * @var \Cad_empresa
     *
     * @ManyToOne(targetEntity="Cad_empresa")
     * @JoinColumns({
     *   @JoinColumn(name="empresa", referencedColumnName="id_empresa")
     * })
     */
    private $empresa;

    /**
     * @var \CadMestre
     *
     * @ManyToOne(targetEntity="CadMestre")
     * @JoinColumns({
     *   @JoinColumn(name="mestre", referencedColumnName="id_mestre")
     * })
     */
    private $mestre;

    /**
     * @var \CadEmbarcacao
     *
     * @ManyToOne(targetEntity="CadEmbarcacao")
     * @JoinColumns({
     *   @JoinColumn(name="embarcacao", referencedColumnName="id_embarcacao")
     * })
     */
    private $embarcacao;

    /**
     * @var \CadObservador
     *
     * @ManyToOne(targetEntity="CadObservador")
     * @JoinColumns({
     *   @JoinColumn(name="observador", referencedColumnName="id_observ")
     * })
     */
    private $observador;


    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     * @OneToMany(targetEntity="ProducaoPesqueira", mappedBy="cruzeiro", cascade={"all"})
     */
    private $producoesPesqueiras;    

    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     * @OneToMany(targetEntity="DadosAbioticos", mappedBy="cruzeiro", cascade={"all"})
     */
    private $dadosAbioticos;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     * @OneToMany(targetEntity="ContagemPorSol", mappedBy="cruzeiro", cascade={"all"})
     */
    private $contagemPorSol;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     * @OneToMany(targetEntity="CapturaIncidental", mappedBy="cruzeiro", cascade={"all"})
     */
    private $capturaIncidental;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     * @OneToMany(targetEntity="ContagemAveBoia", mappedBy="cruzeiro", cascade={"all"})
     */
    private $contagemAveBoia;
    
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
    
    public function __construct() {
        $this->producoesPesqueiras = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dadosAbioticos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contagemPorSol = new \Doctrine\Common\Collections\ArrayCollection();
        $this->capturaIncidental = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contagemAveBoia = new \Doctrine\Common\Collections\ArrayCollection();
    }    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dataSaida
     *
     * @param \DateTime $dataSaida
     * @return Cruzeiro
     */
    public function setDataSaida($dataSaida)
    {
        $this->dataSaida = $dataSaida;

        return $this;
    }

    /**
     * Get dataSaida
     *
     * @return \DateTime 
     */
    public function getDataSaida()
    {
        return $this->dataSaida;
    }

    /**
     * Set dataChegada
     *
     * @param \DateTime $dataChegada
     * @return Cruzeiro
     */
    public function setDataChegada($dataChegada)
    {
        $this->dataChegada = $dataChegada;

        return $this;
    }

    /**
     * Get dataChegada
     *
     * @return \DateTime 
     */
    public function getDataChegada()
    {
        return $this->dataChegada;
    }

    /**
     * Set observacao
     *
     * @param string $observacao
     * @return Cruzeiro
     */
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;

        return $this;
    }

    /**
     * Get observacao
     *
     * @return string 
     */
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * Set financiador
     *
     * @param \CadFinanciador $financiador
     * @return Cruzeiro
     */
    public function setFinanciador(\CadFinanciador $financiador = null)
    {
        $this->financiador = $financiador;

        return $this;
    }

    /**
     * Get financiador
     *
     * @return \CadFinanciador 
     */
    public function getFinanciador()
    {
        return $this->financiador;
    }

    /**
     * Set empresa
     *
     * @param \Cad_empresa $empresa
     * @return Cruzeiro
     */
    public function setEmpresa(\Cad_empresa $empresa = null)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return \Cad_empresa 
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set mestre
     *
     * @param \CadMestre $mestre
     * @return Cruzeiro
     */
    public function setMestre(\CadMestre $mestre = null)
    {
        $this->mestre = $mestre;

        return $this;
    }

    /**
     * Get mestre
     *
     * @return \CadMestre 
     */
    public function getMestre()
    {
        return $this->mestre;
    }

    /**
     * Set embarcacao
     *
     * @param \CadEmbarcacao $embarcacao
     * @return Cruzeiro
     */
    public function setEmbarcacao(\CadEmbarcacao $embarcacao = null)
    {
        $this->embarcacao = $embarcacao;

        return $this;
    }

    /**
     * Get embarcacao
     *
     * @return \CadEmbarcacao 
     */
    public function getEmbarcacao()
    {
        return $this->embarcacao;
    }

    /**
     * Set observador
     *
     * @param \CadObservador $observador
     * @return Cruzeiro
     */
    public function setObservador(\CadObservador $observador = null)
    {
        $this->observador = $observador;

        return $this;
    }

    /**
     * Get observador
     *
     * @return \CadObservador 
     */
    public function getObservador()
    {
        return $this->observador;
    }
    
    public function addProducaoPesqueira(ProducaoPesqueira $producaoPesqueira) {
        $producaoPesqueira->setCruzeiro($this);
        $this->producoesPesqueiras[] = $producaoPesqueira;
        return $this;
    }
    
    public function getProducoesPesqueiras() {
        return $this->producoesPesqueiras;
    }
    
    
    public function addDadoAbiotico(DadosAbioticos $dadoAbiotico) {
        $dadoAbiotico->setCruzeiro($this);
        $this->dadosAbioticos[] = $dadoAbiotico;
        return $this;
    }
    
    public function getDadosAbioticos() {
        return $this->dadosAbioticos;
    }
    
    public function addContagemPorSol(ContagemPorSol $contagemPorSol) {
        $contagemPorSol->setCruzeiro($this);
        $this->contagemPorSol[] = $contagemPorSol;
        return $this;
    }
    
    public function getContagemPorSol() {
        return $this->contagemPorSol;
    }
    
    public function addCapturaIncidental(CapturaIncidental $capturaIncidental) {
        $capturaIncidental->setCruzeiro($this);
        $this->capturaIncidental[] = $capturaIncidental;
        return $this;
    }
    
    public function getCapturaIncidental() {
        return $this->capturaIncidental;
    }
    
    public function addContagemAveBoia(ContagemAveBoia $contagemAveBoia) {
        $contagemAveBoia->setCruzeiro($this);
        $this->contagemAveBoia[] = $contagemAveBoia;
        return $this;
    }
    
    public function getContagemAveBoia() {
        return $this->contagemAveBoia;
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
    
    public function __toString() {
        return $this->embarcacao->getNome() . " (" . $this->observador->getNome() . ")";
    }
}
