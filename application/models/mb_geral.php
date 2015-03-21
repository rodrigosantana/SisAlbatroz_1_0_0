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
    *@Column(name="observador", type="string", length=50)
    */
    private $observador;
//-------------------------------------------------------------------------------------------------------------------//

    /**
    *@var $embarcacao
    *
    *@Column(name="embarcacao", type="string", length=50)
    *
    */
    private $embarcacao;
//-------------------------------------------------------------------------------------------------------------------//

    /**
    *@var integer $mestre
    *
    *@Column(name="mestre", type="integer")
    */
    private $mestre;
//-------------------------------------------------------------------------------------------------------------------//

    /**
    *@var string $petrecho
    *
    *@Column(name="petrecho", type="string", length=50)
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
    *@param string $petrecho
    *@return Mb_geral
    */
    public function setPetrecho($petrecho)
    {
        $this->petrecho = $petrecho;
        return $this;
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

}


