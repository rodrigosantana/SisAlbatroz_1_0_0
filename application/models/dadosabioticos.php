<?php





/**
 * DadosAbioticos
 *
 * @Table(name="dados_abioticos", indexes={@Index(name="IDX_A0CEBD378856C0F0", columns={"especie_alvo"}), @Index(name="IDX_A0CEBD374F970F73", columns={"tipo_isca"}), @Index(name="IDX_A0CEBD3723C64D0C", columns={"cruzeiro"})})
 * @Entity
 */
class DadosAbioticos
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="dados_abioticos_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @Column(name="lance", type="integer", nullable=false)
     */
    private $lance;

    /**
     * @var integer
     *
     * @Column(name="anzois", type="integer", nullable=true)
     */
    private $anzois;

    /**
     * @var boolean
     *
     * @Column(name="reg_peso", type="boolean", nullable=true)
     */
    private $regPeso;

    /**
     * @var boolean
     *
     * @Column(name="toriline", type="boolean", nullable=true)
     */
    private $toriline;

    /**
     * @var boolean
     *
     * @Column(name="isca_tingida", type="boolean", nullable=true)
     */
    private $iscaTingida;

    /**
     * @var \CadIsca
     *
     * @ManyToOne(targetEntity="CadIsca")
     * @JoinColumns({
     *   @JoinColumn(name="tipo_isca", referencedColumnName="id_isca")
     * })
     */
    private $tipoIsca;

    /**
     * @var \Cruzeiro
     *
     * @ManyToOne(targetEntity="Cruzeiro")
     * @JoinColumns({
     *   @JoinColumn(name="cruzeiro", referencedColumnName="id")
     * })
     */
    private $cruzeiro;



    /**
     * @var \DadosAbioticosLancamento
     *
     * @OneToOne(targetEntity="DadosAbioticosComplementar", cascade={"all"})
     * @JoinColumns({
     *   @JoinColumn(name="dado_lancamento", referencedColumnName="id")
     * })
     */
    private $dadosAbioticosLancamento;
    
    
    /**
     * @var \DadosAbioticosRecolhimento
     *
     * @OneToOne(targetEntity="DadosAbioticosRecolhimento", cascade={"all"})
     * @JoinColumns({
     *   @JoinColumn(name="dado_recolhimento", referencedColumnName="id")
     * })
     */
    private $dadosAbioticosRecolhimento;
    
    public function __construct($lancamento = null, $recolhimento = null) {
        if (!is_null($lancamento)) {
            $this->dadosAbioticosLancamento = $lancamento;
        }
        
        if (!is_null($recolhimento)) {
            $this->dadosAbioticosRecolhimento = $recolhimento;
        }
    }
    
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
     * Set lance
     *
     * @param integer $lance
     * @return DadosAbioticos
     */
    public function setLance($lance)
    {
        $this->lance = $lance;

        return $this;
    }

    /**
     * Get lance
     *
     * @return integer 
     */
    public function getLance()
    {
        return $this->lance;
    }

    /**
     * Set anzois
     *
     * @param integer $anzois
     * @return DadosAbioticos
     */
    public function setAnzois($anzois)
    {
        $this->anzois = $anzois;

        return $this;
    }

    /**
     * Get anzois
     *
     * @return integer 
     */
    public function getAnzois()
    {
        return $this->anzois;
    }

    /**
     * Set regPeso
     *
     * @param boolean $regPeso
     * @return DadosAbioticos
     */
    public function setRegPeso($regPeso)
    {
        $this->regPeso = $regPeso;

        return $this;
    }

    /**
     * Get regPeso
     *
     * @return boolean 
     */
    public function getRegPeso()
    {
        return $this->regPeso;
    }

    /**
     * Set toriline
     *
     * @param boolean $toriline
     * @return DadosAbioticos
     */
    public function setToriline($toriline)
    {
        $this->toriline = $toriline;

        return $this;
    }

    /**
     * Get toriline
     *
     * @return boolean 
     */
    public function getToriline()
    {
        return $this->toriline;
    }

    /**
     * Set iscaTingida
     *
     * @param boolean $iscaTingida
     * @return DadosAbioticos
     */
    public function setIscaTingida($iscaTingida)
    {
        $this->iscaTingida = $iscaTingida;

        return $this;
    }

    /**
     * Get iscaTingida
     *
     * @return boolean 
     */
    public function getIscaTingida()
    {
        return $this->iscaTingida;
    }

    /**
     * Set tipoIsca
     *
     * @param \CadIsca $tipoIsca
     * @return DadosAbioticos
     */
    public function setTipoIsca(\CadIsca $tipoIsca = null)
    {
        $this->tipoIsca = $tipoIsca;

        return $this;
    }

    /**
     * Get tipoIsca
     *
     * @return \CadIsca 
     */
    public function getTipoIsca()
    {
        return $this->tipoIsca;
    }

    /**
     * Set cruzeiro
     *
     * @param \Cruzeiro $cruzeiro
     * @return DadosAbioticos
     */
    public function setCruzeiro(\Cruzeiro $cruzeiro = null)
    {
        $this->cruzeiro = $cruzeiro;

        return $this;
    }

    /**
     * Get cruzeiro
     *
     * @return \Cruzeiro 
     */
    public function getCruzeiro()
    {
        return $this->cruzeiro;
    }
    
    
    public function setDadosAbioticosLancamento(\DadosAbioticosLancamento $dadosAbioticosLancamento = null)
    {
        $this->dadosAbioticosLancamento = $dadosAbioticosLancamento;

        return $this;
    }

    public function getDadosAbioticosLancamento()
    {
        return $this->dadosAbioticosLancamento;
    }
    
    public function setDadosAbioticosRecolhimento(\DadosAbioticosRecolhimento $dadosAbioticosRecolhimento = null)
    {
        $this->dadosAbioticosRecolhimento = $dadosAbioticosRecolhimento;

        return $this;
    }

    public function getDadosAbioticosRecolhimento()
    {
        return $this->dadosAbioticosRecolhimento;
    }
}
