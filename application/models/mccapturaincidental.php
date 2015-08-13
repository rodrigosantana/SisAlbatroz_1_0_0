<?php

/**
 * McCapturaIncidental
 *
 * @Table(name="mc_captura_incidental")
 * @Entity
 */
class McCapturaIncidental {

    /**
     * @ID
     * @OneToOne(targetEntity="MedConservacao", inversedBy="capturaIncidental")
     * @JoinColumn(name="mc_id", referencedColumnName="id")
     * */
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

    public function getId() {
        return $this->id;
    }
    
    public function setId(MedConservacao $id) {
        $this->id = $id;
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

    public function setCruzeiro(\Cruzeiro $cruzeiro = null) {
        $this->cruzeiro = $cruzeiro;
    }

    public function setLance(\DadosAbioticos $lance = null) {
        $this->lance = $lance;
    }

    public function setObservador(\CadObservador $observador = null) {
        $this->observador = $observador;
    }

    public function setMestre(\CadMestre $mestre = null) {
        $this->mestre = $mestre;
    }

    public function setEmbarcacao(\CadEmbarcacao $embarcacao = null) {
        $this->embarcacao = $embarcacao;
    }

    public function setHistorico($historico) {
        $this->historico = $historico;
    }

    public function setDescricaoLocalColeta($descricaoLocalColeta) {
        $this->descricaoLocalColeta = $descricaoLocalColeta;
    }

    public function toArray() {
        $data = array(
            'informacao' => $this->informacao,
            'cruzeiro' => $this->cruzeiro == null ? null : $this->cruzeiro->getId(),
            'lance' => $this->lance == null ? null : $this->lance->getId(),
            'observador' => $this->observador == null ? null : $this->observador->getIdObserv(),
            'mestre' => $this->mestre == null ? null : $this->mestre->getIdMestre(),
            'embarcacao' => $this->embarcacao == null ? null : $this->embarcacao->getIdEmbarcacao(),
            'historico' => $this->historico,
            'descricaoLocalColeta' => $this->descricaoLocalColeta
        );
        
        return $data;
    }
}
