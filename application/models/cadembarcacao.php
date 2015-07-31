<?php



/**
 * CadEmbarcacao
 *
 * @Table(name="cad_embarcacao")
 * @Entity
 */
class CadEmbarcacao
{
    /**
     * @var string
     *
     * @Column(name="nome", type="string", length=150, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @Column(name="autorizacao_pesca", type="string", length=150, nullable=false)
     */
    private $autorizacaoPesca;

    /**
     * @var string
     *
     * @Column(name="reg_marinha", type="string", length=30, nullable=false)
     */
    private $regMarinha;

    /**
     * @var string
     *
     * @Column(name="reg_mpa", type="string", length=30, nullable=false)
     */
    private $regMpa;

    /**
     * @var float
     *
     * @Column(name="comprim_barco", type="decimal", nullable=true)
     */
    private $comprimBarco;

    /**
     * @var float
     *
     * @Column(name="arqueacao_bruta", type="decimal", nullable=true)
     */
    private $arqueacaoBruta;

    /**
     * @var integer
     *
     * @Column(name="ano_fabricacao", type="integer", nullable=true)
     */
    private $anoFabricacao;

    /**
     * @var string
     *
     * @Column(name="mat_casco", type="string", length=50, nullable=true)
     */
    private $matCasco;

    /**
     * @var string
     *
     * @Column(name="propulsao", type="string", length=50, nullable=true)
     */
    private $propulsao;

    /**
     * @var float
     *
     * @Column(name="potencia_motor", type="decimal", nullable=true)
     */
    private $potenciaMotor;

    /**
     * @var integer
     *
     * @Column(name="tripulacao", type="integer", nullable=true)
     */
    private $tripulacao;

    /**
     * @var Municipio
     *
     * @ManyToOne(targetEntity="Municipio")
     * @JoinColumns({
     *   @JoinColumn(name="municipio", referencedColumnName="id")
     * })
     */
    private $municipio;

    /**
     * @var integer
     *
     * @Column(name="id_embarcacao", type="integer")
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="cad_embarcacao_seq", allocationSize=1, initialValue=1)
     */
    private $idEmbarcacao;



    /**
     * Set nome
     *
     * @param string $nome
     * @return CadEmbarcacao
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    
        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set autorizacaoPesca
     *
     * @param string $autorizacaoPesca
     * @return CadEmbarcacao
     */
    public function setAutorizacaoPesca($autorizacaoPesca)
    {
        $this->autorizacaoPesca = $autorizacaoPesca;
    
        return $this;
    }

    /**
     * Get autorizacaoPesca
     *
     * @return string 
     */
    public function getAutorizacaoPesca()
    {
        return $this->autorizacaoPesca;
    }

    /**
     * Set regMarinha
     *
     * @param string $regMarinha
     * @return CadEmbarcacao
     */
    public function setRegMarinha($regMarinha)
    {
        $this->regMarinha = $regMarinha;
    
        return $this;
    }

    /**
     * Get regMarinha
     *
     * @return string 
     */
    public function getRegMarinha()
    {
        return $this->regMarinha;
    }

    /**
     * Set regMpa
     *
     * @param string $regMpa
     * @return CadEmbarcacao
     */
    public function setRegMpa($regMpa)
    {
        $this->regMpa = $regMpa;
    
        return $this;
    }

    /**
     * Get regMpa
     *
     * @return string 
     */
    public function getRegMpa()
    {
        return $this->regMpa;
    }

    /**
     * Set comprimBarco
     *
     * @param float $comprimBarco
     * @return CadEmbarcacao
     */
    public function setComprimBarco($comprimBarco)
    {
        $this->comprimBarco = $comprimBarco;
    
        return $this;
    }

    /**
     * Get comprimBarco
     *
     * @return float 
     */
    public function getComprimBarco()
    {
        return $this->comprimBarco;
    }

    /**
     * Set arqueacaoBruta
     *
     * @param float $arqueacaoBruta
     * @return CadEmbarcacao
     */
    public function setArqueacaoBruta($arqueacaoBruta)
    {
        $this->arqueacaoBruta = $arqueacaoBruta;
    
        return $this;
    }

    /**
     * Get arqueacaoBruta
     *
     * @return float 
     */
    public function getArqueacaoBruta()
    {
        return $this->arqueacaoBruta;
    }

    /**
     * Set anoFabricacao
     *
     * @param integer $anoFabricacao
     * @return CadEmbarcacao
     */
    public function setAnoFabricacao($anoFabricacao)
    {
        $this->anoFabricacao = $anoFabricacao;
    
        return $this;
    }

    /**
     * Get anoFabricacao
     *
     * @return integer 
     */
    public function getAnoFabricacao()
    {
        return $this->anoFabricacao;
    }

    /**
     * Set matCasco
     *
     * @param string $matCasco
     * @return CadEmbarcacao
     */
    public function setMatCasco($matCasco)
    {
        $this->matCasco = $matCasco;
    
        return $this;
    }

    /**
     * Get matCasco
     *
     * @return string 
     */
    public function getMatCasco()
    {
        return $this->matCasco;
    }

    /**
     * Set propulsao
     *
     * @param string $propulsao
     * @return CadEmbarcacao
     */
    public function setPropulsao($propulsao)
    {
        $this->propulsao = $propulsao;
    
        return $this;
    }

    /**
     * Get propulsao
     *
     * @return string 
     */
    public function getPropulsao()
    {
        return $this->propulsao;
    }

    /**
     * Set potenciaMotor
     *
     * @param float $potenciaMotor
     * @return CadEmbarcacao
     */
    public function setPotenciaMotor($potenciaMotor)
    {
        $this->potenciaMotor = $potenciaMotor;
    
        return $this;
    }

    /**
     * Get potenciaMotor
     *
     * @return float 
     */
    public function getPotenciaMotor()
    {
        return $this->potenciaMotor;
    }

    /**
     * Set tripulacao
     *
     * @param integer $tripulacao
     * @return CadEmbarcacao
     */
    public function setTripulacao($tripulacao)
    {
        $this->tripulacao = $tripulacao;
    
        return $this;
    }

    /**
     * Get tripulacao
     *
     * @return integer 
     */
    public function getTripulacao()
    {
        return $this->tripulacao;
    }

    /**
     * Set Municipio
     *
     * @param Municipio $municipio
     * @return CadEmbarcacao
     */
    public function setMunicipio(Municipio $municipio = null)
    {
        $this->municipio = $municipio;
    
        return $this;
    }

    /**
     * Get Municipio
     *
     * @return string 
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Get idEmbarcacao
     *
     * @return integer 
     */
    public function getIdEmbarcacao()
    {
        return $this->idEmbarcacao;
    }
}