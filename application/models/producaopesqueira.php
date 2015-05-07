<?php
/**
 * ProducaoPesqueira
 *
 * @Table(name="producao_pesqueira")
 * @Entity
 */
class ProducaoPesqueira
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="producao_pesqueira_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @Column(name="lance", type="integer", nullable=true)
     */
    private $lance;

    /**
     * @var \DateTime
     *
     * @Column(name="data", type="date", nullable=true)
     */
    private $data;

    /**
     * @var integer
     *
     * @Column(name="boia_radio", type="integer", nullable=true)
     */
    private $boiaRadio;

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
     * @OneToMany(targetEntity="ProducaoPesqueiraEspecie", mappedBy="producaoPesqueira", cascade={"all"})
     */
    protected $especies;    

    public function __construct() {
        $this->especies = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param integer $lance
     * @return ProducaoPesqueira
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
     * Set data
     *
     * @param \DateTime $data
     * @return ProducaoPesqueira
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
     * @param integer $boiaRadio
     * @return ProducaoPesqueira
     */
    public function setBoiaRadio($boiaRadio)
    {
        $this->boiaRadio = $boiaRadio;

        return $this;
    }

    /**
     * Get boiaRadio
     *
     * @return integer 
     */
    public function getBoiaRadio()
    {
        return $this->boiaRadio;
    }

    /**
     * Set cruzeiro
     *
     * @param \Cruzeiro $cruzeiro
     * @return ProducaoPesqueira
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
    
    public function addEspecie(ProducaoPesqueiraEspecie $especie) {
        $especie->setProducaoPesqueira($this);
        $this->especies[] = $especie;
        return $this;
    }
    
    public function getEspecies() {
        return $this->especies;
    }
}
