<?php
/**
 * CapturaIncidental
 *
 * @Table(name="captura_incidental")
 * @Entity
 */
class CapturaIncidental
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="captura_incidental_seq", allocationSize=1, initialValue=1)
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
     * @var \DateTime
     *
     * @Column(name="data", type="date", nullable=true)
     */
    private $data;

    /**
     * @var \ContagemAveBoia
     *
     * @ManyToOne(targetEntity="ContagemAveBoia")
     * @JoinColumns({
     *   @JoinColumn(name="boia_radio", referencedColumnName="id")
     * })
     */
    private $boiaRadio;

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
     * @OneToMany(targetEntity="CapturaIncidentalEspecie", mappedBy="capturaIncidental", cascade={"all"})
     */
    private $capturaIncidentalEspecie;
    
    public function __construct() {
        $this->capturaIncidentalEspecie = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return CapturaIncidental
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
     * Set data
     *
     * @param \DateTime $data
     * @return CapturaIncidental
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
     * Set boiaRadio
     *
     * @param ContagemAveBoia $boiaRadio
     * @return ProducaoPesqueira
     */
    public function setBoiaRadio(ContagemAveBoia $boiaRadio = null)
    {
        $this->boiaRadio = $boiaRadio;

        return $this;
    }

    /**
     * Get boiaRadio
     *
     * @return ContagemAveBoia 
     */
    public function getBoiaRadio()
    {
        return $this->boiaRadio;
    }

    /**
     * Set coordenada
     *
     * @param geometry $coordenada
     * @return CapturaIncidental
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
     * @return CapturaIncidental
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
    
    public function addCapturaIncidentalEspecie(CapturaIncidentalEspecie $capturaIncidentalEspecie) {
        $capturaIncidentalEspecie->setCapturaIncidental($this);
        $this->capturaIncidentalEspecie[] = $capturaIncidentalEspecie;
        return $this;
    }
    
    public function getCapturaIncidentalEspecie() {
        return $this->capturaIncidentalEspecie;
    }
}
