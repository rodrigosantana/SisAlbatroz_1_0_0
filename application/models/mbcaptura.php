<?php



/**
 * MbCaptura
 *
 * @Table(name="mb_captura")
 * @Entity
 */
class MbCaptura
{
    /**
     * @var 
     *
     * @ManyToOne(targetEntity="Acme\DemoBundle\Entity\CadAves")
     * @JoinColumns({
     *   @JoinColumn(name="id_ave", referencedColumnName="id_aves")
     * })
     */
    private $idAve;

    /**
     * @var integer
     *
     * @Column(name="quantidade", type="integer", nullable=false)
     */
    private $quantidade;

    /**
     * @var integer
     *
     * @Column(name="id_capt", type="integer")
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="mb_captura_id_capt_seq", allocationSize=1, initialValue=1)
     */
    private $idCapt;

    /**
     * @var \MbLance
     *
     * @ManyToOne(targetEntity="MbLance")
     * @JoinColumns({
     *   @JoinColumn(name="id_lance", referencedColumnName="id_lance")
     * })
     */
    private $idLance;



    /**
     * Set idAve
     *
     * @param  $idAve
     * @return MbCaptura
     */
    public function setIdAve( $idAve = null)
    {
        $this->idAve = $idAve;
    
        return $this;
    }

    /**
     * Get idAve
     *
     * @return  
     */
    public function getIdAve()
    {
        return $this->idAve;
    }

    /**
     * Set quantidade
     *
     * @param integer $quantidade
     * @return MbCaptura
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
     * Get idCapt
     *
     * @return integer 
     */
    public function getIdCapt()
    {
        return $this->idCapt;
    }

    /**
     * Set idLance
     *
     * @param \MbLance $idLance
     * @return MbCaptura
     */
    public function setIdLance(\MbLance $idLance = null)
    {
        $this->idLance = $idLance;
    
        return $this;
    }

    /**
     * Get idLance
     *
     * @return \MbLance 
     */
    public function getIdLance()
    {
        return $this->idLance;
    }
}