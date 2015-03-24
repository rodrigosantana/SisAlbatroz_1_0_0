<?php
/**
 * @Table(name="mb_geral")
 * @Entity
 */
class Mb_geral {

//--------------------------------------------------------------------------------------------------------------------//

    /**
    *@var integer $id_mb
    *
    *@Column(name="id_mb", type="integer")
    *@Id
    *@GeneratedValue(strategy="SEQUENCE")
    *@SequenceGenerator(sequenceName="mb_geral_seq", allocationSize=1, initialValue=1)
    */
    private $id_mb;
//-------------------------------------------------------------------------------------------------------------------//

    /**
    *@var integer $observadpr
    *
	* @ManyToOne(targetEntity="Cad_observador")
    * @JoinColumns({
    *   @JoinColumn(name="observador", referencedColumnName="id_observ")
    * })
    */
    private $observador;
//-------------------------------------------------------------------------------------------------------------------//

    /**
    *@var $embarcacao
    *
	* @ManyToOne(targetEntity="Cad_embarcacao")
    * @JoinColumns({
    *   @JoinColumn(name="embarcacao", referencedColumnName="id_embarcacao")
    * })
    */
    private $embarcacao;
//-------------------------------------------------------------------------------------------------------------------//

    /**
    *@var integer $mestre
    *
	* @ManyToOne(targetEntity="Cad_mestre")
    * @JoinColumns({
    *   @JoinColumn(name="mestre", referencedColumnName="id_mestre")
    * })
    */
    private $mestre;
//-------------------------------------------------------------------------------------------------------------------//

    /**
    *@var smallint $petrecho
    *
    *@Column(name="petrecho", type="smallint")
    */
    private $petrecho;
//-------------------------------------------------------------------------------------------------------------------//
//TODO rever o tipo de var para ser data
    /**
    *@var string $data_saida
    *
    *@Column(name="data_saida", type="string", length=50)
    */
    private $data_saida;
//-------------------------------------------------------------------------------------------------------------------//
//TODO mudar tipo de var para data
    /**
    *@var string $data_chegada
    *
    *@Column(name="data_chegada", type="string", length=50)
    */
    private $data_chegada;
//-------------------------------------------------------------------------------------------------------------------//

    /**
    *@var string $observacao
    *
    *@Column(name="observacao", type="string", length=50)
    */
    private $observacao;
//-------------------------------------------------------------------------------------------------------------------//

	/**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * 
     * @OneToMany(targetEntity="Mb_lance", mappedBy="mbGeral", cascade={"all"})
     */
    private $lances;

	public function __construct()
    {
        $this->lances = new \Doctrine\Common\Collections\ArrayCollection();
	}


    /**
    *Set observador
    *
    *@param string $observador
    *@return Mb_geral
    */
    public function setObservador($observador)
    {
        $this->observador = $observador;
        return $this;
    }//-------------------------------------------------------------------------------------------------------------------//

    /**
    *Set embarcacao
    *
    *@param string $embarcacao
    *@return Mb_geral
    */
    public function setEmbarcacao($embarcacao)
    {
        $this->embarcacao = $embarcacao;
        return $this;
    }
//-------------------------------------------------------------------------------------------------------------------//

    /**
    *Set mestre
    *
    *@param string $mestre
    *@return Mb_geral
    */
    public function setMestre($mestre)
    {
        $this->mestre = $mestre;
        return $this;
    }
//-------------------------------------------------------------------------------------------------------------------//

    /**
    *Set petrecho
    *
    *@param smallint $petrecho
    *@return Mb_geral
    */
    public function setPetrecho($petrecho)
    {
        $this->petrecho = $petrecho;
        return $this;
    }
    
    public function getPetrecho()
    {
        return $this->petrecho;
    }
//-------------------------------------------------------------------------------------------------------------------//

    /**
    *Set data_saida
    *
    *@param string $data_saida
    *@return Mb_geral
    */
    public function setDataSaida($data_saida)
    {
        $this->data_saida = $data_saida;
        return $this;
    }
//-------------------------------------------------------------------------------------------------------------------//

    /**
    *Set data_chegada
    *
    *@param string $data_chegada
    *@return Mb_geral
    */
    public function setDataChegada($data_chegada)
    {
        $this->data_chegada = $data_chegada;
        return $this;
    }
//-------------------------------------------------------------------------------------------------------------------//

    /**
    *Set observacao
    *
    *@param string $obs
    *@return Mb_geral
    */
    public function setObs($observacao)
    {
        $this->observacao = $observacao;
        return $this;
    }
//-------------------------------------------------------------------------------------------------------------------//

    /**
     * Get Id_mb
     *
     * @return string
     */
    public function getIdMb(){
        return $this->id_mb;
    }
//-------------------------------------------------------------------------------------------------------------------//

    /**
     * Get observador
     *
     * @return string
     */
    public function getObserv(){
        return $this->observador;
    }
//-------------------------------------------------------------------------------------------------------------------//

    /**
     * Get embarcacao
     *
     * @return string
     */
    public function getEmbarcacao(){
        return $this->embarcacao;
    }
//-------------------------------------------------------------------------------------------------------------------//

    /**
     * Get mestre
     *
     * @return string
     */
    public function getMestre(){
        return $this->mestre;
    }
//-------------------------------------------------------------------------------------------------------------------//

    /**
     * Get data_saida
     *
     * @return string
     */
    public function getDataSaida(){
        return $this->data_saida;
    }
//-------------------------------------------------------------------------------------------------------------------//

    /**
     * Get data_chegada
     *
     * @return string
     */
    public function getDataChegada(){
        return $this->data_chegada;
    }
//--------------------------------------------------------------------------------------------------------------------//

	/**
     * Add lance
     *
     * @param Mb_lance $lance
     * @return Mb_geral
     */
    public function addLance(Mb_lance $lance)
    {
        $lance->setMbGeral($this);
        $this->lances[] = $lance;
        return $this;
    }

    /**
     * Get lances
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getLances()
    {
        return $this->lances;
    }

}


