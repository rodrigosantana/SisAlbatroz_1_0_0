<?php

// Criação da entidade para a tabela de espécies

/**
 * @Entity
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="tipo", type="string")
 * @DiscriminatorMap({"aves" = "Ave", "pescado" = "Pescado"})
 * @Table(name="especie")
 */
class Especies {
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *@var integer $id
     *
     *@Column(name="id", type="integer")
     *@Id
     *@GeneratedValue(strategy="SEQUENCE")
     *@SequenceGenerator(sequenceName="especie_seq", allocationSize=1, initialValue=1)
     */
    private $id;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *@var string $nomeComumBr
     *
     *@Column(name="nome_comum_br", type="string", length=100)
     */
    private $nomeComumBr;
//--------------------------------------------------------------------------------------------------------------------//

    /**
    *@var string $nomeComumEn
    *
    *@Column(name="nome_comum_en", type="string", length=100)
    */
    private $nomeComumEn;
//--------------------------------------------------------------------------------------------------------------------//

    /**
    *@var string $nomeCientifico
    *
    *@Column(name="nome_cientifico", type="string", length=100)
    */
    private $nomeCientifico;
//--------------------------------------------------------------------------------------------------------------------//


    /**
     * Get id
     *
     *@return integer
     */
    public function getId()
    {
        return $this->id;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set nomeComumBr
     *
     *@param string $nomeComumBr
     *@return Especie
     */
    public function setNomeComumBr($nomeComumBr)
    {
        $this->nomeComumBr = $nomeComumBr;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set nomeComumEn
     *
     *@param string $NomeComumEn
     *@return Especie
     */
    public function setNomeComumEn($nomeComumEn)
    {
        $this->nomeComumEn = $nomeComumEn;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set nomeCientifico
     *
     *@param string $nomeCientifico
     *@return Especie
     */
    public function setNomeCientifico($nomeCientifico)
    {
        $this->nomeCientifico = $nomeCientifico;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//


//--------------------------------------------------------------------------------------------------------------------//

    /**
     * Get nomeComumBr
     *
     * @return string
     */
    public function getNomeComumBr(){
        return $this->nomeComumBr;
    }

    /**
     * Get nomeComumEn
     *
     * @return string
     */
    public function getNomeComumEn(){
        return $this->nomeComumEn;
    }

    /**
     * Get nomeCientifico
     *
     * @return string
     */
    public function getNomeCientifico(){
        return $this->nomeCientifico;
    }
//--------------------------------------------------------------------------------------------------------------------//

    public function __toString() {
        return $this->nomeCientifico . ' (' . $this->nomeComumBr . ')';
    }
}
