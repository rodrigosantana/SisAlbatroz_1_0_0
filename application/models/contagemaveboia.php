<?php

/**
 * ContagemAveBoia
 *
 * @Table(name="cr_contagem_ave_boia")
 * @Entity
 */
class ContagemAveBoia
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="contagem_ave_boia_seq", allocationSize=1, initialValue=1)
     */
    private $id;

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
     * @var string
     *
     * @Column(name="boia_radio", type="string", length=255, nullable=true)
     */
    private $boiaRadio;

    /**
     * @var \DateTime
     *
     * @Column(name="data_hora", type="datetime", nullable=true)
     */
    private $dataHora;

    /**
     * @var decimal
     *
     * @Column(name="temperatura_agua", type="decimal", nullable=true)
     */
    private $temperaturaAgua;

    /**
     * @var integer
     *
     * @Column(name="profundidade", type="integer", nullable=true)
     */
    private $profundidade;

    /**
     * @var decimal
     *
     * @Column(name="pressao_atmosferica", type="decimal", nullable=true)
     */
    private $pressaoAtmosferica;

    /**
     * @var geometry
     *
     * @Column(name="coordenada", type="geometry", nullable=true)
     */
    private $coordenada;

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
     * @OneToMany(targetEntity="ContagemAveBoiaEspecie", mappedBy="contagemAveBoia", cascade={"all"})
     */
    private $contagemAveBoiaEspecie;
    
    public function __construct() {
        $this->contagemAveBoiaEspecie = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set lance
     *
     * @param DadosAbioticos $lance
     * @return ContagemAveBoia
     */
    public function setLance(DadosAbioticos $lance =null)
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
     * Set boiaRadio
     *
     * @param string $boiaRadio
     * @return ContagemAveBoia
     */
    public function setBoiaRadio($boiaRadio)
    {
        $this->boiaRadio = $boiaRadio;

        return $this;
    }

    /**
     * Get boiaRadio
     *
     * @return string 
     */
    public function getBoiaRadio()
    {
        return $this->boiaRadio;
    }

    /**
     * Set dataHora
     *
     * @param \DateTime $dataHora
     * @return ContagemAveBoia
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
     * Set temperaturaAgua
     *
     * @param decimal $temperaturaAgua
     * @return ContagemAveBoia
     */
    public function setTemperaturaAgua($temperaturaAgua)
    {
        $this->temperaturaAgua = $temperaturaAgua;

        return $this;
    }

    /**
     * Get temperaturaAgua
     *
     * @return decimal 
     */
    public function getTemperaturaAgua()
    {
        return $this->temperaturaAgua;
    }

    /**
     * Set profundidade
     *
     * @param integer $profundidade
     * @return ContagemAveBoia
     */
    public function setProfundidade($profundidade)
    {
        $this->profundidade = $profundidade;

        return $this;
    }

    /**
     * Get profundidade
     *
     * @return integer 
     */
    public function getProfundidade()
    {
        return $this->profundidade;
    }

    /**
     * Set pressaoAtmosferica
     *
     * @param decimal $pressaoAtmosferica
     * @return ContagemAveBoia
     */
    public function setPressaoAtmosferica($pressaoAtmosferica)
    {
        $this->pressaoAtmosferica = $pressaoAtmosferica;

        return $this;
    }

    /**
     * Get pressaoAtmosferica
     *
     * @return decimal 
     */
    public function getPressaoAtmosferica()
    {
        return $this->pressaoAtmosferica;
    }

    /**
     * Set coordenada
     *
     * @param geometry $coordenada
     * @return ContagemAveBoia
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
     * Set cruzeiro
     *
     * @param \Cruzeiro $cruzeiro
     * @return ContagemAveBoia
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
    
    public function addContagemAveEspecieBoia(ContagemAveBoiaEspecie $contagemAveBoiaEspecie) {
        $contagemAveBoiaEspecie->setContagemAveBoia($this);
        $this->contagemAveBoiaEspecie[] = $contagemAveBoiaEspecie;
        return $this;
    }
    
    public function getContagemAveBoiaEspecie() {
        return $this->contagemAveBoiaEspecie;
    }
    
    public function toArray() {
        $data = array(
            'id' => $this->id,
            'lance' => $this->lance == null ? null : $this->lance->getId(),
            'boiaRadio' => $this->boiaRadio,
            'dataHora' => $this->dataHora == null ? null : $this->dataHora->format('Y-m-d H:i:s'),
            'temperaturaAgua' => $this->temperaturaAgua,
            'profundidade' => $this->profundidade,
            'pressaoAtmosferica' => $this->pressaoAtmosferica,
            'coordenada' => $this->coordenada == null ? null : array('latitude'=>$this->coordenada->latitudeDecimal, 'longitude'=>$this->coordenada->longitudeDecimal),
            'cruzeiro' => $this->cruzeiro->getId(),
            'contagemAveBoiaEspecie' => array()
        );
        
        $especies = $this->contagemAveBoiaEspecie->toArray();
        $lista = array();
        
        foreach ($especies as $value) {
            $lista[] = $value->toArray();
        }
        
        $data['contagemAveBoiaEspecie'] = $lista;
        
        return $data;
    }
}
