<?php
/**
 * McCapturaIncidental
 *
 * @Table(name="mc_captura_incidental")
 * @Entity
 */
class McCapturaIncidental
{
    /**
     * @OneToOne(targetEntity="MedicinaConservacao", inversedBy="capturaIncidental")
     * @JoinColumn(name="id", referencedColumnName="id")
     **/
    private $id;

	/**
     * @var string
     *
     * @Column(name="informacao", type="string", length=20)
     */
    private $informacao;
	
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
     * @var \DadosAbioticos
     *
     * @ManyToOne(targetEntity="DadosAbioticos")
     * @JoinColumns({
     *   @JoinColumn(name="lance", referencedColumnName="id")
     * })
     */
    private $lance;
    
	/**
     * @var \CadObservador
     *
     * @ManyToOne(targetEntity="CadObservador")
     * @JoinColumns({
     *   @JoinColumn(name="observador", referencedColumnName="id_observ")
     * })
     */
    private $observador;
	
	/**
     * @var \CadMestre
     *
     * @ManyToOne(targetEntity="CadMestre")
     * @JoinColumns({
     *   @JoinColumn(name="mestre", referencedColumnName="id_mestre")
     * })
     */
    private $mestre;

    /**
     * @var \CadEmbarcacao
     *
     * @ManyToOne(targetEntity="CadEmbarcacao")
     * @JoinColumns({
     *   @JoinColumn(name="embarcacao", referencedColumnName="id_embarcacao")
     * })
     */
    private $embarcacao;
	
	/**
     * @var text
     *
     * @Column(name="historico", type="text")
     */
    private $historico;
	
	/**
     * @var text
     *
     * @Column(name="descricao_local_coleta", type="text")
     */
    private $descricaoLocalColeta;
	
	
    public function getId()
    {
        return $this->id;
    }
    
    public function getInformacao() {
        return $this->informacao;
    }

    public function getCruzeiro() {
        return $this->cruzeiro;
    }

    public function getLance() {
        return $this->lance;
    }

    public function getObservador() {
        return $this->observador;
    }

    public function getMestre() {
        return $this->mestre;
    }

    public function getEmbarcacao() {
        return $this->embarcacao;
    }

    public function getHistorico() {
        return $this->historico;
    }

    public function getDescricaoLocalColeta() {
        return $this->descricaoLocalColeta;
    }

    public function setInformacao($informacao) {
        $this->informacao = $informacao;
    }

    public function setCruzeiro(\Cruzeiro $cruzeiro) {
        $this->cruzeiro = $cruzeiro;
    }

    public function setLance(\DadosAbioticos $lance) {
        $this->lance = $lance;
    }

    public function setObservador(\CadObservador $observador) {
        $this->observador = $observador;
    }

    public function setMestre(\CadMestre $mestre) {
        $this->mestre = $mestre;
    }

    public function setEmbarcacao(\CadEmbarcacao $embarcacao) {
        $this->embarcacao = $embarcacao;
    }

    public function setHistorico(text $historico) {
        $this->historico = $historico;
    }

    public function setDescricaoLocalColeta(text $descricaoLocalColeta) {
        $this->descricaoLocalColeta = $descricaoLocalColeta;
    }


}