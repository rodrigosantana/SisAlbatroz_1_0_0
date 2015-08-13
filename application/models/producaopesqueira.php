<?php
/**
 * ProducaoPesqueira
 *
 * @Table(name="cr_producao_pesqueira")
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
     * @var \DadosAbioticos
     *
     * @ManyToOne(targetEntity="DadosAbioticos")
     * @JoinColumns({
     *   @JoinColumn(name="lance", referencedColumnName="id")
     * })
     */
    private $lance;

    
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
     * @param DadosAbioticos $lance
     * @return ProducaoPesqueira
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
    
    public function toArray() {
        $data = array(
            'id' => $this->id,
            'lance' => $this->lance == null ? null : $this->lance->getId(),
            'boiaRadio' => $this->boiaRadio == null ? null : $this->boiaRadio->getId(),
            'cruzeiro' => $this->cruzeiro == null ? null : $this->cruzeiro->getId(),
            'especies' => array()
        );
    
        $especies = $this->especies->toArray();
        $lista = array();
        
        foreach ($especies as $value) {
            $lista[] = $value->toArray();
        }
        
        $data['especies'] = $lista;
        
        return $data;
    }
}
