<?php

/**
 * PetrechoRedePano
 *
 * @Table(name="petrecho_rede_pano")
 * @Entity
 */
class PetrechoRedePano extends Petrecho {

    /**
     * @var string
     *
     * @Column(name="tipo_rede", type="string", length=20)
     */
    private $tipoRede;

    /**
     * @var integer
     *
     * @Column(name="comprimento_pano", type="integer")
     */
    private $comprimentoPano;

    /**
     * @var integer
     *
     * @Column(name="altura_pano", type="integer")
     */
    private $alturaPano;

    /**
     * @var integer
     *
     * @Column(name="numero_panos_por_lance", type="integer")
     */
    private $numeroPanosPorLance;

    /**
     * @var string
     *
     * @Column(name="regime_trabalho", type="string", length=20)
     */
    private $regimeTrabalho;

    /**
     * @var time
     *
     * @Column(name="tempo_estimado_lancamento", type="time")
     */
    private $tempoEstimadoLancamento;

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

    function getTipoRede() {
        return $this->tipoRede;
    }

    function getComprimentoPano() {
        return $this->comprimentoPano;
    }

    function getAlturaPano() {
        return $this->alturaPano;
    }

    function getNumeroPanosPorLance() {
        return $this->numeroPanosPorLance;
    }

    function getRegimeTrabalho() {
        return $this->regimeTrabalho;
    }

    function getTempoEstimadoLancamento() {
        return $this->tempoEstimadoLancamento;
    }

    function getTempoEstimadoRecolhimento() {
        return $this->tempoEstimadoRecolhimento;
    }

    function setTipoRede($tipoRede) {
        $this->tipoRede = $tipoRede;
    }

    function setComprimentoPano($comprimentoPano) {
        $this->comprimentoPano = $comprimentoPano;
    }

    function setAlturaPano($alturaPano) {
        $this->alturaPano = $alturaPano;
    }

    function setNumeroPanosPorLance($numeroPanosPorLance) {
        $this->numeroPanosPorLance = $numeroPanosPorLance;
    }

    function setRegimeTrabalho($regimeTrabalho) {
        $this->regimeTrabalho = $regimeTrabalho;
    }

    function setTempoEstimadoLancamento($tempoEstimadoLancamento) {
        $this->tempoEstimadoLancamento = $tempoEstimadoLancamento;
    }

    function setTempoEstimadoRecolhimento($tempoEstimadoRecolhimento) {
        $this->tempoEstimadoRecolhimento = $tempoEstimadoRecolhimento;
    }


}
