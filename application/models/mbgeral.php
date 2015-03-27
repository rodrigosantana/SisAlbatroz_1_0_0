<?php



/**
 * MbGeral
 *
 * @Table(name="mb_geral")
 * @Entity
 */
class MbGeral
{
    /**
     * @var \DateTime
     *
     * @Column(name="data_saida", type="date", nullable=false)
     */
    private $dataSaida;

    /**
     * @var \DateTime
     *
     * @Column(name="data_chegada", type="date", nullable=false)
     */
    private $dataChegada;

    /**
     * @var string
     *
     * @Column(name="observacao", type="string", length=500, nullable=false)
     */
    private $observacao;

    /**
     * @var integer
     *
     * @Column(name="petrecho", type="smallint", nullable=true)
     */
    private $petrecho;

    /**
     * @var integer
     *
     * @Column(name="id_mb", type="integer")
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="mb_geral_seq", allocationSize=1, initialValue=1)
     */
    private $idMb;

    /**
     * @var \CadEntrevistador
     *
     * @ManyToOne(targetEntity="CadEntrevistador")
     * @JoinColumns({
     *   @JoinColumn(name="entrevistador", referencedColumnName="id")
     * })
     */
    private $entrevistador;

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
     * @var \Doctrine\Common\Collections\Collection
     * 
     * @OneToMany(targetEntity="MbLance", mappedBy="mbGeral", cascade={"all"})
     */
    protected $lances;

	/**
     * Constructor
     */
    public function __construct()
    {
		$this->lances = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set dataSaida
     *
     * @param \DateTime $dataSaida
     * @return MbGeral
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
     * @return MbGeral
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
     * @return MbGeral
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
     * Set petrecho
     *
     * @param integer $petrecho
     * @return MbGeral
     */
    public function setPetrecho($petrecho)
    {
        $this->petrecho = $petrecho;
    
        return $this;
    }

    /**
     * Get petrecho
     *
     * @return integer 
     */
    public function getPetrecho()
    {
        return $this->petrecho;
    }

    /**
     * Get idMb
     *
     * @return integer 
     */
    public function getIdMb()
    {
        return $this->idMb;
    }

    /**
     * Set entrevistador
     *
     * @param \CadEntrevistador $entrevistador
     * @return MbGeral
     */
    public function setEntrevistador(\CadEntrevistador $entrevistador = null)
    {
        $this->entrevistador = $entrevistador;
    
        return $this;
    }

    /**
     * Get entrevistador
     *
     * @return \CadEntrevistador
     */
    public function getEntrevistador()
    {
        return $this->entrevistador;
    }

    /**
     * Set mestre
     *
     * @param \CadMestre $mestre
     * @return MbGeral
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
     * @return MbGeral
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
     * Add lance
     *
     * @param MbLance $lance
     * @return MbGeral
     */
    public function addLance(MbLance $lance)
    {
        $lance->setMbGeral($this);
        $this->lances[] = $lance;
        return $this;
    }

    /**
     * Get lances
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getLances()
    {
        return $this->lances;
    }
}