<?php



/**
 * CadAves
 *
 * @Table(name="cad_aves")
 * @Entity
 */
class CadAves
{
    /**
     * @var string
     *
     * @Column(name="nome_comum_br", type="string", length=50, nullable=false)
     */
    private $nomeComumBr;

    /**
     * @var string
     *
     * @Column(name="nome_cientifico", type="string", length=50, nullable=false)
     */
    private $nomeCientifico;

    /**
     * @var string
     *
     * @Column(name="nome_comum_en", type="string", length=50, nullable=false)
     */
    private $nomeComumEn;

    /**
     * @var integer
     *
     * @Column(name="id_aves", type="integer")
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="cad_aves_id_aves_seq", allocationSize=1, initialValue=1)
     */
    private $idAves;



    /**
     * Set nomeComumBr
     *
     * @param string $nomeComumBr
     * @return CadAves
     */
    public function setNomeComumBr($nomeComumBr)
    {
        $this->nomeComumBr = $nomeComumBr;
    
        return $this;
    }

    /**
     * Get nomeComumBr
     *
     * @return string 
     */
    public function getNomeComumBr()
    {
        return $this->nomeComumBr;
    }

    /**
     * Set nomeCientifico
     *
     * @param string $nomeCientifico
     * @return CadAves
     */
    public function setNomeCientifico($nomeCientifico)
    {
        $this->nomeCientifico = $nomeCientifico;
    
        return $this;
    }

    /**
     * Get nomeCientifico
     *
     * @return string 
     */
    public function getNomeCientifico()
    {
        return $this->nomeCientifico;
    }

    /**
     * Set nomeComumEn
     *
     * @param string $nomeComumEn
     * @return CadAves
     */
    public function setNomeComumEn($nomeComumEn)
    {
        $this->nomeComumEn = $nomeComumEn;
    
        return $this;
    }

    /**
     * Get nomeComumEn
     *
     * @return string 
     */
    public function getNomeComumEn()
    {
        return $this->nomeComumEn;
    }

    /**
     * Get idAves
     *
     * @return integer 
     */
    public function getIdAves()
    {
        return $this->idAves;
    }
}