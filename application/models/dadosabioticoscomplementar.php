<?php





/**
 * DadosAbioticosComplementar
 *
 * @Table(name="dados_abioticos_complementar")
 * @Entity
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="tipo", type="smallint")
 * @DiscriminatorMap({1 = "DadosAbioticosLancamento", 2 = "DadosAbioticosRecolhimento"})
 */
class DadosAbioticosComplementar
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="dados_abioticos_complementar_seq", allocationSize=1, initialValue=1)
     */
    protected $id;

    /**
     * @var geometry
     *
     * @Column(name="coordenada_inicio", type="geometry", nullable=true)
     */
    private $coordenadaInicio;

    /**
     * @var geometry
     *
     * @Column(name="coordenada_fim", type="geometry", nullable=true)
     */
    private $coordenadaFim;

    /**
     * @var \DateTime
     *
     * @Column(name="data_inicio", type="datetime", nullable=true)
     */
    private $dataInicio;

    /**
     * @var \DateTime
     *
     * @Column(name="data_fim", type="datetime", nullable=true)
     */
    private $dataFim;

    /**
     * @var integer
     *
     * @Column(name="profundidade_inicio", type="integer", nullable=true)
     */
    private $profundidadeInicio;

    /**
     * @var integer
     *
     * @Column(name="profundidade_fim", type="integer", nullable=true)
     */
    private $profundidadeFim;

    /**
     * @var string
     *
     * @Column(name="rumo_inicio", type="string", length=4, nullable=true)
     */
    private $rumoInicio;

    /**
     * @var string
     *
     * @Column(name="rumo_fim", type="smallint", type="string", length=4, nullable=true)
     */
    private $rumoFim;

    /**
     * @var string
     *
     * @Column(name="direcao_vento_inicio", type="smallint", type="string", length=4, nullable=true)
     */
    private $direcaoVentoInicio;

    /**
     * @var string
     *
     * @Column(name="direcao_vento_fim", type="smallint", type="string", length=4, nullable=true)
     */
    private $direcaoVentoFim;

    /**
     * @var integer
     *
     * @Column(name="velocidade_vento_inicio", type="integer", nullable=true)
     */
    private $velocidadeVentoInicio;

    /**
     * @var integer
     *
     * @Column(name="velocidade_vento_fim", type="integer", nullable=true)
     */
    private $velocidadeVentoFim;

    /**
     * @var integer
     *
     * @Column(name="categoria_mar_inicio", type="smallint", nullable=true)
     */
    private $categoriaMarInicio;

    /**
     * @var integer
     *
     * @Column(name="categoria_mar_fim", type="smallint", nullable=true)
     */
    private $categoriaMarFim;

    /**
     * @var integer
     *
     * @Column(name="temperatura_ar_inicio", type="integer", nullable=true)
     */
    private $temperaturaArInicio;

    /**
     * @var integer
     *
     * @Column(name="temperatura_ar_fim", type="integer", nullable=true)
     */
    private $temperaturaArFim;

    /**
     * @var integer
     *
     * @Column(name="temperatura_sup_mar_inicio", type="integer", nullable=true)
     */
    private $temperaturaSupMarInicio;

    /**
     * @var integer
     *
     * @Column(name="temperatura_sup_mar_fim", type="integer", nullable=true)
     */
    private $temperaturaSupMarFim;

    /**
     * @var integer
     *
     * @Column(name="cobertura_ceu_inicio", type="smallint", nullable=true)
     */
    private $coberturaCeuInicio;

    /**
     * @var integer
     *
     * @Column(name="cobertura_ceu_fim", type="smallint", nullable=true)
     */
    private $coberturaCeuFim;

    /**
     * @var integer
     *
     * @Column(name="pressao_atmosferica_inicio", type="integer", nullable=true)
     */
    private $pressaoAtmosfericaInicio;

    /**
     * @var integer
     *
     * @Column(name="pressao_atmosferica_fim", type="integer", nullable=true)
     */
    private $pressaoAtmosfericaFim;

    



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
     * Set coordenadaInicio
     *
     * @param geometry $coordenadaInicio
     * @return DadosAbioticosComplementar
     */
    public function setCoordenadaInicio($coordenadaInicio)
    {
        $this->coordenadaInicio = $coordenadaInicio;

        return $this;
    }

    /**
     * Get coordenadaInicio
     *
     * @return geometry 
     */
    public function getCoordenadaInicio()
    {
        return $this->coordenadaInicio;
    }

    /**
     * Set coordenadaFim
     *
     * @param geometry $coordenadaFim
     * @return DadosAbioticosComplementar
     */
    public function setCoordenadaFim($coordenadaFim)
    {
        $this->coordenadaFim = $coordenadaFim;

        return $this;
    }

    /**
     * Get coordenadaFim
     *
     * @return geometry 
     */
    public function getCoordenadaFim()
    {
        return $this->coordenadaFim;
    }

    /**
     * Set dataInicio
     *
     * @param \DateTime $dataInicio
     * @return DadosAbioticosComplementar
     */
    public function setDataInicio($dataInicio)
    {
        $this->dataInicio = $dataInicio;

        return $this;
    }

    /**
     * Get dataInicio
     *
     * @return \DateTime 
     */
    public function getDataInicio()
    {
        return $this->dataInicio;
    }

    /**
     * Set dataFim
     *
     * @param \DateTime $dataFim
     * @return DadosAbioticosComplementar
     */
    public function setDataFim($dataFim)
    {
        $this->dataFim = $dataFim;

        return $this;
    }

    /**
     * Get dataFim
     *
     * @return \DateTime 
     */
    public function getDataFim()
    {
        return $this->dataFim;
    }

    /**
     * Set profundidadeInicio
     *
     * @param integer $profundidadeInicio
     * @return DadosAbioticosComplementar
     */
    public function setProfundidadeInicio($profundidadeInicio)
    {
        $this->profundidadeInicio = $profundidadeInicio;

        return $this;
    }

    /**
     * Get profundidadeInicio
     *
     * @return integer 
     */
    public function getProfundidadeInicio()
    {
        return $this->profundidadeInicio;
    }

    /**
     * Set profundidadeFim
     *
     * @param integer $profundidadeFim
     * @return DadosAbioticosComplementar
     */
    public function setProfundidadeFim($profundidadeFim)
    {
        $this->profundidadeFim = $profundidadeFim;

        return $this;
    }

    /**
     * Get profundidadeFim
     *
     * @return integer 
     */
    public function getProfundidadeFim()
    {
        return $this->profundidadeFim;
    }

    /**
     * Set rumoInicio
     *
     * @param string $rumoInicio
     * @return DadosAbioticosComplementar
     */
    public function setRumoInicio($rumoInicio)
    {
        $this->rumoInicio = $rumoInicio;

        return $this;
    }

    /**
     * Get rumoInicio
     *
     * @return string 
     */
    public function getRumoInicio()
    {
        return $this->rumoInicio;
    }

    /**
     * Set rumoFim
     *
     * @param string $rumoFim
     * @return DadosAbioticosComplementar
     */
    public function setRumoFim($rumoFim)
    {
        $this->rumoFim = $rumoFim;

        return $this;
    }

    /**
     * Get rumoFim
     *
     * @return string 
     */
    public function getRumoFim()
    {
        return $this->rumoFim;
    }

    /**
     * Set direcaoVentoInicio
     *
     * @param string $direcaoVentoInicio
     * @return DadosAbioticosComplementar
     */
    public function setDirecaoVentoInicio($direcaoVentoInicio)
    {
        $this->direcaoVentoInicio = $direcaoVentoInicio;

        return $this;
    }

    /**
     * Get direcaoVentoInicio
     *
     * @return string 
     */
    public function getDirecaoVentoInicio()
    {
        return $this->direcaoVentoInicio;
    }

    /**
     * Set direcaoVentoFim
     *
     * @param string $direcaoVentoFim
     * @return DadosAbioticosComplementar
     */
    public function setDirecaoVentoFim($direcaoVentoFim)
    {
        $this->direcaoVentoFim = $direcaoVentoFim;

        return $this;
    }

    /**
     * Get direcaoVentoFim
     *
     * @return string 
     */
    public function getDirecaoVentoFim()
    {
        return $this->direcaoVentoFim;
    }

    /**
     * Set velocidadeVentoInicio
     *
     * @param integer $velocidadeVentoInicio
     * @return DadosAbioticosComplementar
     */
    public function setVelocidadeVentoInicio($velocidadeVentoInicio)
    {
        $this->velocidadeVentoInicio = $velocidadeVentoInicio;

        return $this;
    }

    /**
     * Get velocidadeVentoInicio
     *
     * @return integer 
     */
    public function getVelocidadeVentoInicio()
    {
        return $this->velocidadeVentoInicio;
    }

    /**
     * Set velocidadeVentoFim
     *
     * @param integer $velocidadeVentoFim
     * @return DadosAbioticosComplementar
     */
    public function setVelocidadeVentoFim($velocidadeVentoFim)
    {
        $this->velocidadeVentoFim = $velocidadeVentoFim;

        return $this;
    }

    /**
     * Get velocidadeVentoFim
     *
     * @return integer 
     */
    public function getVelocidadeVentoFim()
    {
        return $this->velocidadeVentoFim;
    }

    /**
     * Set categoriaMarInicio
     *
     * @param integer $categoriaMarInicio
     * @return DadosAbioticosComplementar
     */
    public function setCategoriaMarInicio($categoriaMarInicio)
    {
        $this->categoriaMarInicio = $categoriaMarInicio;

        return $this;
    }

    /**
     * Get categoriaMarInicio
     *
     * @return integer 
     */
    public function getCategoriaMarInicio()
    {
        return $this->categoriaMarInicio;
    }

    /**
     * Set categoriaMarFim
     *
     * @param integer $categoriaMarFim
     * @return DadosAbioticosComplementar
     */
    public function setCategoriaMarFim($categoriaMarFim)
    {
        $this->categoriaMarFim = $categoriaMarFim;

        return $this;
    }

    /**
     * Get categoriaMarFim
     *
     * @return integer 
     */
    public function getCategoriaMarFim()
    {
        return $this->categoriaMarFim;
    }

    /**
     * Set temperaturaArInicio
     *
     * @param integer $temperaturaArInicio
     * @return DadosAbioticosComplementar
     */
    public function setTemperaturaArInicio($temperaturaArInicio)
    {
        $this->temperaturaArInicio = $temperaturaArInicio;

        return $this;
    }

    /**
     * Get temperaturaArInicio
     *
     * @return integer 
     */
    public function getTemperaturaArInicio()
    {
        return $this->temperaturaArInicio;
    }

    /**
     * Set temperaturaArFim
     *
     * @param integer $temperaturaArFim
     * @return DadosAbioticosComplementar
     */
    public function setTemperaturaArFim($temperaturaArFim)
    {
        $this->temperaturaArFim = $temperaturaArFim;

        return $this;
    }

    /**
     * Get temperaturaArFim
     *
     * @return integer 
     */
    public function getTemperaturaArFim()
    {
        return $this->temperaturaArFim;
    }

    /**
     * Set temperaturaSupMarInicio
     *
     * @param integer $temperaturaSupMarInicio
     * @return DadosAbioticosComplementar
     */
    public function setTemperaturaSupMarInicio($temperaturaSupMarInicio)
    {
        $this->temperaturaSupMarInicio = $temperaturaSupMarInicio;

        return $this;
    }

    /**
     * Get temperaturaSupMarInicio
     *
     * @return integer 
     */
    public function getTemperaturaSupMarInicio()
    {
        return $this->temperaturaSupMarInicio;
    }

    /**
     * Set temperaturaSupMarFim
     *
     * @param integer $temperaturaSupMarFim
     * @return DadosAbioticosComplementar
     */
    public function setTemperaturaSupMarFim($temperaturaSupMarFim)
    {
        $this->temperaturaSupMarFim = $temperaturaSupMarFim;

        return $this;
    }

    /**
     * Get temperaturaSupMarFim
     *
     * @return integer 
     */
    public function getTemperaturaSupMarFim()
    {
        return $this->temperaturaSupMarFim;
    }

    /**
     * Set coberturaCeuInicio
     *
     * @param integer $coberturaCeuInicio
     * @return DadosAbioticosComplementar
     */
    public function setCoberturaCeuInicio($coberturaCeuInicio)
    {
        $this->coberturaCeuInicio = $coberturaCeuInicio;

        return $this;
    }

    /**
     * Get coberturaCeuInicio
     *
     * @return integer 
     */
    public function getCoberturaCeuInicio()
    {
        return $this->coberturaCeuInicio;
    }

    /**
     * Set coberturaCeuFim
     *
     * @param integer $coberturaCeuFim
     * @return DadosAbioticosComplementar
     */
    public function setCoberturaCeuFim($coberturaCeuFim)
    {
        $this->coberturaCeuFim = $coberturaCeuFim;

        return $this;
    }

    /**
     * Get coberturaCeuFim
     *
     * @return integer 
     */
    public function getCoberturaCeuFim()
    {
        return $this->coberturaCeuFim;
    }

    /**
     * Set pressaoAtmosfericaInicio
     *
     * @param integer $pressaoAtmosfericaInicio
     * @return DadosAbioticosComplementar
     */
    public function setPressaoAtmosfericaInicio($pressaoAtmosfericaInicio)
    {
        $this->pressaoAtmosfericaInicio = $pressaoAtmosfericaInicio;

        return $this;
    }

    /**
     * Get pressaoAtmosfericaInicio
     *
     * @return integer 
     */
    public function getPressaoAtmosfericaInicio()
    {
        return $this->pressaoAtmosfericaInicio;
    }

    /**
     * Set pressaoAtmosfericaFim
     *
     * @param integer $pressaoAtmosfericaFim
     * @return DadosAbioticosComplementar
     */
    public function setPressaoAtmosfericaFim($pressaoAtmosfericaFim)
    {
        $this->pressaoAtmosfericaFim = $pressaoAtmosfericaFim;

        return $this;
    }

    /**
     * Get pressaoAtmosfericaFim
     *
     * @return integer 
     */
    public function getPressaoAtmosfericaFim()
    {
        return $this->pressaoAtmosfericaFim;
    }
}
