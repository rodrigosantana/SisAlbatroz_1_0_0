<?php

/**
 * PetrechoCerco
 *
 * @Table(name="ec_petrecho_cerco")
 * @Entity
 */
class PetrechoCerco extends Petrecho {

    /**
     * @var integer
     *
     * @Column(name="comprimento_rede", type="integer")
     */
    private $comprimentoRede;

    /**
     * @var integer
     *
     * @Column(name="altura_rede", type="integer")
     */
    private $alturaRede;

    /**
     * @var integer
     *
     * @Column(name="numero_cercos_totais", type="integer")
     */
    private $numeroCercosTotais;

    /**
     * @var time
     *
     * @Column(name="tempo_estimado_cercamento", type="time")
     */
    private $tempoEstimadoCercamento;

    /**
     * @var time
     *
     * @Column(name="tempo_estimado_recolhimento", type="time")
     */
    private $tempoEstimadoRecolhimento;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    function getComprimentoRede() {
        return $this->comprimentoRede;
    }

    function getAlturaRede() {
        return $this->alturaRede;
    }

    function getNumeroCercosTotais() {
        return $this->numeroCercosTotais;
    }

    function getTempoEstimadoCercamento() {
        return $this->tempoEstimadoCercamento;
    }

    function getTempoEstimadoRecolhimento() {
        return $this->tempoEstimadoRecolhimento;
    }

    function setComprimentoRede($comprimentoRede) {
        $this->comprimentoRede = $comprimentoRede;
    }

    function setAlturaRede($alturaRede) {
        $this->alturaRede = $alturaRede;
    }

    function setNumeroCercosTotais($numeroCercosTotais) {
        $this->numeroCercosTotais = $numeroCercosTotais;
    }

    function setTempoEstimadoCercamento($tempoEstimadoCercamento) {
        $this->tempoEstimadoCercamento = $tempoEstimadoCercamento;
    }

    function setTempoEstimadoRecolhimento($tempoEstimadoRecolhimento) {
        $this->tempoEstimadoRecolhimento = $tempoEstimadoRecolhimento;
    }

    public function toArray() {
        $data = array(
            'id' => parent::getId(),
            'comprimentoRede' => $this->comprimentoRede,
            'alturaRede' => $this->alturaRede,
            'numeroCercosTotais' => $this->numeroCercosTotais,            
            'tempoEstimadoCercamento' => $this->tempoEstimadoCercamento == null ? null : $this->tempoEstimadoCercamento->format('H:i:s'),
            'tempoEstimadoRecolhimento' => $this->tempoEstimadoRecolhimento == null ? null : $this->tempoEstimadoRecolhimento->format('H:i:s'),
        );
        
        return $data;
    }
}
