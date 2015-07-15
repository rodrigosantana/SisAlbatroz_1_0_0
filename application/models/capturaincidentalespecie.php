<?php
/**
 * CapturaIncidentalEspecie
 *
 * @Table(name="captura_incidental_especie")
 * @Entity
 */
class CapturaIncidentalEspecie
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="captura_incidental_especie_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @Column(name="etiqueta", type="integer", nullable=true)
     */
    private $etiqueta;
    
    /**
     * @var \Ave
     *
     * @ManyToOne(targetEntity="Ave")
     * @JoinColumns({
     *   @JoinColumn(name="especie", referencedColumnName="id")
     * })
     */
    private $especie;

    /**
     * @var \CapturaIncidental
     *
     * @ManyToOne(targetEntity="CapturaIncidental")
     * @JoinColumns({
     *   @JoinColumn(name="captura_incidental", referencedColumnName="id")
     * })
     */
    private $capturaIncidental;
    
    
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
     * Set especie
     *
     * @param \Ave $especie
     * @return CapturaIncidentalEspecie
     */
    public function setEspecie(\Ave $especie = null)
    {
        $this->especie = $especie;

        return $this;
    }

    /**
     * Get especie
     *
     * @return \Ave 
     */
    public function getEspecie()
    {
        return $this->especie;
    }
    
    /**
     * Set capturaIncidental
     *
     * @param \CapturaIncidental $capturaIncidental
     * @return CapturaIncidentalEspecie
     */
    public function setCapturaIncidental(\CapturaIncidental $capturaIncidental = null)
    {
        $this->capturaIncidental = $capturaIncidental;

        return $this;
    }

    /**
     * Get capturaIncidental
     *
     * @return \CapturaIncidental
     */
    public function getCapturaIncidental()
    {
        return $this->capturaIncidental;
    }
}
