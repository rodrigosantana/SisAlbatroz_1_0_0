<?php





/**
 * ContagemPorSol
 *
 * @Table(name="cr_contagem_por_sol")
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
     * @Column(name="data", type="date", nullable=false)
     */
    private $data;

    /**
     * @var \DateTime
     *
     * @Column(name="hora_por_sol", type="time", nullable=true)
     */
    private $horaPorSol;
    
    /**
     * @var geometry
     *
     * @Column(name="coordenada", type="geometry", nullable=true)
     */
    private $coordenada;

    /**
     * @var \DadosAbioticos
     *
     * @ManyToOne(targetEntity="DadosAbioticos")
     * @JoinColumns({
     *   @JoinColumn(name="lance", referencedColumnName="id")
     * })
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
     * @OneToMany(targetEntity="ContagemPorSolIndice", mappedBy="contagemPorSol", cascade={"all"})
     */
    private $contagemPorSolIndice;
    
    public function __construct() {
        $this->contagemPorSolIndice = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set data
     *
     * @param \DateTime $data
     * @return ContagemPorSol
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime 
     */
    public function getData()
    {
        return $this->data;
    }
    
    /**
     * Set hora
     *
     * @param \DateTime $horaPorSol
     * @return ContagemPorSol
     */
    public function setHoraPorSol($horaPorSol)
    {
        $this->horaPorSol = $horaPorSol;

        return $this;
    }

    /**
     * Get horaPorSol
     *
     * @return \DateTime 
     */
    public function getHoraPorSol()
    {
        return $this->horaPorSol;
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
     * @param DadosAbioticos $lance
     * @return ContagemPorSol
     */
    public function setLance(DadosAbioticos $lance = null)
    {
        $this->lance = $lance;

        return $this;
    }

    /**
     * Get lance
     *
     * @return DadosAbioticos 
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
    
    public function addContagemPorSolIndice(ContagemPorSolIndice $contagemPorSolIndice) {
        $contagemPorSolIndice->setContagemPorSol($this);
        $this->contagemPorSolIndice[] = $contagemPorSolIndice;
        return $this;
    }
    
    public function getContagemPorSolIndice() {
        return $this->contagemPorSolIndice;
    }
    
    public function toArray() {
        $data = array(
            'id' => $this->id,
            'data' => $this->data == null ? null : $this->data->format('Y-m-d'),
            'horaPorSol' => $this->horaPorSol == null ? '' : $this->horaPorSol->format('H:i:s'),
            'coordenada' => $this->coordenada == null ? null : array('latitude'=>$this->coordenada->latitudeDecimal, 'longitude'=>$this->coordenada->longitudeDecimal),
            'lance' => $this->lance == null ? null : $this->lance->getId(),
            'toriline' => $this->toriline,
            'iscaTingida' => $this->iscaTingida,
            'observacao' => $this->observacao,
            'indice' => $this->indice,
            'hora' => $this->hora == null ? null : $this->hora->format('H:i:s'),
            'total' => $this->total,
            'cruzeiro' => $this->cruzeiro->getId(),
            'contagemPorSolIndice' => array()
        );
        
        $contagensIndice = $this->contagemPorSolIndice->toArray();
        $lista = array();
        
        foreach ($contagensIndice as $value) {
            $lista[] = $value->toArray();
        }
        
        $data['contagemPorSolIndice'] = $lista;
        
        return $data;
    }
}
