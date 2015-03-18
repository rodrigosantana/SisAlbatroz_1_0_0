<?php
/**
 * @Table(name="mb_lance")
 * @Entity
 */
class Mb_lance {

//--------------------------------------------------------------------------------------------------------------------//

    /**
     *@var integer $id_lance
     *
     *@Column(name="id_lance", type="integer")
     *@Id
     *@GeneratedValue(strategy="SEQUENCE")
     *@SequenceGenerator(sequenceName="mb_lance_seq", allocationSize=1, initialValue=1)
     */
    private $id_lance;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *@var integer $id_mb
     *
     *@Column(name="id_mb", type="integer")
     */
    private $id_mb;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *@var integer $lance
     *
     *@Column(name="lance", type="integer")
     */
    private $lance;
//--------------------------------------------------------------------------------------------------------------------//
//TODO rever tipo de var para data
    /**
     *@var string $data
     *
     *@Column(name="data", type="string", length=50)
     */
    private $data;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *@var string $anzois
     *
     *@Column(name="anzois", type="integer")
     */
    private $anzois;
//--------------------------------------------------------------------------------------------------------------------//
//TODO rever tipo de var para mudar para numerico
    /**
     *@var string $latitude
     *
     *@Column(name="latitude", type="string", length=50)
     */
    private $latitude;
//--------------------------------------------------------------------------------------------------------------------//
//TODO rever o tipo de var para numerico
    /**
     *@var string $longitude
     *
     *@Column(name="longitude", type="string", length=50)
     */
    private $longitude;
//--------------------------------------------------------------------------------------------------------------------//
//TODO mudar tipo de var para timestamp
    /**
     *@var string $hora_inicial
     *
     *@Column(name="hora_inicial", type="string", length=50)
     */
    private $hora_inicial;
//--------------------------------------------------------------------------------------------------------------------//
//TODO mudar tipo de var para timestamp
    /**
     *@var string $hora_final
     *
     *@Column(name="hora_final", type="string", length=50)
     */
    private $hora_final;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *@var string $mm_uso
     *
     *@Column(name="mm_uso", type="string", length=10)
     */
    private $mm_uso;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *@var string $ave_capt
     *
     *@Column(name="ave_capt", type="string", length=1)
     */
    private $ave_capt;
//--------------------------------------------------------------------------------------------------------------------//
//TODO relacionamento entre tabelas
    /**
     *Set id_mb
     *
     *@param string $id_mb
     *@return Mb_lance
     */
    public function setIdMb($id_mb)
    {
        $this->id_mb = $id_mb;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//
    /**
     *Set lance
     *
     *@param string $lance
     *@return Mb_lance
     */
    public function setLance($lance)
    {
        $this->lance = $lance;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set data
     *
     *@param string $data
     *@return Mb_lance
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set anzois
     *
     *@param string $anzois
     *@return Mb_lance
     */
    public function setAnzois($anzois)
    {
        $this->anzois = $anzois;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set latitude
     *
     *@param string $latitude
     *@return Mb_lance
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set longitude
     *
     *@param string $longitude
     *@return Mb_lance
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set hora_inicial
     *
     *@param string $hora_inicial
     *@return Mb_lance
     */
    public function setHoraInicial($hora_inicial)
    {
        $this->hora_inicial = $hora_inicial;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set hora_final
     *
     *@param string $hora_final
     *@return Mb_lance
     */
    public function setHoraFinal($hora_final)
    {
        $this->hora_final = $hora_final;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set mm_uso
     *
     *@param string $mm_uso
     *@return Mb_lance
     */
    public function setMmUso($mm_uso)
    {
        $this->mm_uso = $mm_uso;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set ave_capt
     *
     *@param string $ave_capt
     *@return Mb_lance
     */
    public function setAveCapt($ave_capt)
    {
        $this->ave_capt = $ave_capt;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

}