<?php
/**
 * @Table(name="mb_geral")
 * @Entity
 */
class Mapa_bordo {

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
    *@var integer $barco
    *
    *@Column(name="barco", type="integer")
    */
    private $barco;
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

    /**
    *@var string $data_saida
    *
    *@Column(name="data_saida", type="date", length=50)
    */
    private $data_saida;
//-------------------------------------------------------------------------------------------------------------------//

    /**
    *@var string $data_chegada
    *
    *@Column(name="data_chegada", type="date", length=50)
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
    *Set barco
    *
    *@param string $barco
    *@return Mapa_bordo
    */
    public function setBarco($barco)
    {
        $this->barco = $barco;
        return $this;
    }
//-------------------------------------------------------------------------------------------------------------------//

    /**
    *Set mestre
    *
    *@param string $mestre
    *@return Mapa_bordo
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
    *@return Mapa_bordo
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
    *@return Mapa_bordo
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
    *@return Mapa_bordo
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
    *@param string $observacao
    *@return Mapa_bordo
    */
    public function setObserv($observacao)
    {
        $this->observacao = $observacao;
        return $this;
    }
//-------------------------------------------------------------------------------------------------------------------//

}