<?php

/**
 * @Table(name="mb_captura")
 * @Entity
 */
Class Mb_captura {

//--------------------------------------------------------------------------------------------------------------------//

    /**
     * @var integer $id_capt
     *
     * @Column(name="id_capt", type="integer")
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="mb_captura_seq", allocationSize=1, initialValue=1)
     */
    private $id_capt;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * @var integer $id_lance
     *
     * @Column(name="id_lance", type="integer")
     */
    private $id_lance;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * @var integer $aves
     *
     * @Column(name="aves", type="integer")
     */
    private $aves;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * @var integer $quant
     *
     * @Column(name="quantidade", type="integer")
     */
    private $quant;
//--------------------------------------------------------------------------------------------------------------------//

	/**
     * @var Mb_lance
     *
     * @ManyToOne(targetEntity="Mb_lance")
     * 
     * @JoinColumns({
     *   @JoinColumn(name="id_lance", referencedColumnName="id_lance")
     * })
     *
     */
    private $mbLance;

    /**
     * @Set aves
     *
     * @param integer $aves
     * $return Mb_captura
     */
    public function setAves($aves){
        $this->aves = $aves;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * @Set quantidade
     *
     * @param integer $quant
     * $return Mb_captura
     */
    public function setQuant($quant){
        $this->quant = $quant;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

	/**
     * Set mbLance
     *
     * @param Mb_lance $mbLance
     * @return Mb_captura
     */
    public function setMbLance(Mb_lance $mbLance = null)
    {
        $this->mbLance = $mbLance;
        return $this;
    }

    /**
     * Get mbLance
     *
     * @return Mb_lance 
     */
    public function getMbLance()
    {
        return $this->mbLance;
    }
}























