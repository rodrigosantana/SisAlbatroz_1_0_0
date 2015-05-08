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
     * @var string
     *
     * @Column(name="boia_radio", type="string", length=255, nullable=true)
     */
    private $boiaRadio;

    /**
     * @var geometry
     *
     * @Column(name="coordenada", type="geometry", nullable=true)
     */
    private $coordenada;

    /**
     * @var integer
     *
     * @Column(name="etiqueta", type="integer", nullable=true)
     */
    private $etiqueta;

    /**
     * @var integer
     *
     * @Column(name="quantidade", type="integer", nullable=true)
     */
    private $quantidade;

    /**
     * @var \CadAves
     *
     * @ManyToOne(targetEntity="CadAves")
     * @JoinColumns({
     *   @JoinColumn(name="especie", referencedColumnName="id_aves")
     * })
     */
    private $especie;

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
     * @return CapturaIncidental
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
     * @param string $boiaRadio
     * @return CapturaIncidental
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
     * Set etiqueta
     *
     * @param integer $etiqueta
     * @return CapturaIncidental
     */
    public function setEtiqueta($etiqueta)
    {
        $this->etiqueta = $etiqueta;

        return $this;
    }

    /**
     * Get etiqueta
     *
     * @return integer 
     */
    public function getEtiqueta()
    {
        return $this->etiqueta;
    }

    /**
     * Set quantidade
     *
     * @param integer $quantidade
     * @return CapturaIncidental
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    /**
     * Get quantidade
     *
     * @return integer 
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * Set especie
     *
     * @param \CadAves $especie
     * @return CapturaIncidental
     */
    public function setEspecie(\CadAves $especie = null)
    {
        $this->especie = $especie;

        return $this;
    }

    /**
     * Get especie
     *
     * @return \CadAves 
     */
    public function getEspecie()
    {
        return $this->especie;
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
}
