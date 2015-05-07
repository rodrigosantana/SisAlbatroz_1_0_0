<?php





/**
 * ContagemPorSol
 *
 * @Table(name="contagem_por_sol")
 * @Entity
 */
class ContagemPorSol
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="contagem_por_sol_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @Column(name="data_hora", type="datetime", nullable=true)
     */
    private $dataHora;

    /**
     * @var geometry
     *
     * @Column(name="coordenada", type="geometry", nullable=true)
     */
    private $coordenada;

    /**
     * @var integer
     *
     * @Column(name="lance", type="integer", nullable=true)
     */
    private $lance;

    /**
     * @var boolean
     *
     * @Column(name="toriline", type="boolean", nullable=true)
     */
    private $toriline;

    /**
     * @var boolean
     *
     * @Column(name="isca_tingida", type="boolean", nullable=true)
     */
    private $iscaTingida;

    /**
     * @var string
     *
     * @Column(name="observacao", type="text", nullable=true)
     */
    private $observacao;

    /**
     * @var integer
     *
     * @Column(name="indice", type="integer", nullable=true)
     */
    private $indice;

    /**
     * @var \DateTime
     *
     * @Column(name="hora", type="time", nullable=true)
     */
    private $hora;

    /**
     * @var integer
     *
     * @Column(name="total", type="integer", nullable=true)
     */
    private $total;

    /**
     * @var \Cruzeiro
     *
     * @ManyToOne(targetEntity="Cruzeiro")
     * @JoinColumns({
     *   @JoinColumn(name="cruzeiro", referencedColumnName="id")
     * })
     */
    private $cruzeiro;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     * @OneToMany(targetEntity="ContagemPorSolEspecie", mappedBy="contagemPs", cascade={"all"})
     */
    private $contagemPorSolEspecie;
    
    public function __construct() {
        $this->contagemPorSolEspecie = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set dataHora
     *
     * @param \DateTime $dataHora
     * @return ContagemPorSol
     */
    public function setDataHora($dataHora)
    {
        $this->dataHora = $dataHora;

        return $this;
    }

    /**
     * Get dataHora
     *
     * @return \DateTime 
     */
    public function getDataHora()
    {
        return $this->dataHora;
    }

    /**
     * Set coordenada
     *
     * @param geometry $coordenada
     * @return ContagemPorSol
     */
    public function setCoordenada($coordenada)
    {
        $this->coordenada = $coordenada;

        return $this;
    }

    /**
     * Get coordenada
     *
     * @return geometry 
     */
    public function getCoordenada()
    {
        return $this->coordenada;
    }

    /**
     * Set lance
     *
     * @param integer $lance
     * @return ContagemPorSol
     */
    public function setLance($lance)
    {
        $this->lance = $lance;

        return $this;
    }

    /**
     * Get lance
     *
     * @return integer 
     */
    public function getLance()
    {
        return $this->lance;
    }

    /**
     * Set toriline
     *
     * @param boolean $toriline
     * @return ContagemPorSol
     */
    public function setToriline($toriline)
    {
        $this->toriline = $toriline;

        return $this;
    }

    /**
     * Get toriline
     *
     * @return boolean 
     */
    public function getToriline()
    {
        return $this->toriline;
    }

    /**
     * Set iscaTingida
     *
     * @param boolean $iscaTingida
     * @return ContagemPorSol
     */
    public function setIscaTingida($iscaTingida)
    {
        $this->iscaTingida = $iscaTingida;

        return $this;
    }

    /**
     * Get iscaTingida
     *
     * @return boolean 
     */
    public function getIscaTingida()
    {
        return $this->iscaTingida;
    }

    /**
     * Set observacao
     *
     * @param string $observacao
     * @return ContagemPorSol
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
     * Set indice
     *
     * @param integer $indice
     * @return ContagemPorSol
     */
    public function setIndice($indice)
    {
        $this->indice = $indice;

        return $this;
    }

    /**
     * Get indice
     *
     * @return integer 
     */
    public function getIndice()
    {
        return $this->indice;
    }

    /**
     * Set hora
     *
     * @param \DateTime $hora
     * @return ContagemPorSol
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime 
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set total
     *
     * @param integer $total
     * @return ContagemPorSol
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return integer 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set cruzeiro
     *
     * @param \Cruzeiro $cruzeiro
     * @return ContagemPorSol
     */
    public function setCruzeiro(\Cruzeiro $cruzeiro = null)
    {
        $this->cruzeiro = $cruzeiro;

        return $this;
    }

    /**
     * Get cruzeiro
     *
     * @return \Cruzeiro 
     */
    public function getCruzeiro()
    {
        return $this->cruzeiro;
    }
    
    public function addContagemPorSolEspecie(ContagemPorSolEspecie $contagemPorSolEspecie) {
        $contagemPorSolEspecie->setContagemPs($this);
        $this->contagemPorSolEspecie[] = $contagemPorSolEspecie;
        return $this;
    }
    
    public function getContagemPorSolEspecie() {
        return $this->contagemPorSolEspecie;
    }
}
