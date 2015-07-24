<?php

/**
 * PetrechoEspinhel
 *
 * @Table(name="ec_petrecho_espinhel")
 * @Entity
 */
class PetrechoEspinhel extends Petrecho
{
    
    /**
     * @var integer
     *
     * @Column(name="numero_espinheis", type="integer")
     */
    private $numeroEspinheis;
    
    /**
     * @var integer
     *
     * @Column(name="numero_anzois", type="integer")
     */
    private $numeroAnzois;
    
    /**
     * @var integer
     *
     * @Column(name="numero_lances", type="integer")
     */
    private $numeroLances;
    
    /**
     * @var boolean
     *
     * @Column(name="light_stick", type="boolean")
     */
    private $lightStick;
    
    /**
     * @var boolean
     *
     * @Column(name="toriline", type="boolean")
     */
    private $toriline;
    
    /**
     * @var time
     *
     * @Column(name="hora_lancamento_inicio", type="time")
     */
    private $horaLancamentoInicio;
    
    /**
     * @var time
     *
     * @Column(name="hora_lancamento_fim", type="time")
     */
    private $horaLancamentoFim;
    
    /**
     * @var time
     *
     * @Column(name="hora_recolhimento_inicio", type="time")
     */
    private $horaRecolhimentoInicio;
    
    /**
     * @var time
     *
     * @Column(name="hora_recolhimento_fim", type="time")
     */
    private $horaRecolhimentoFim;
    
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    function getNumeroEspinheis() {
        return $this->numeroEspinheis;
    }

    function getNumeroAnzois() {
        return $this->numeroAnzois;
    }

    function getNumeroLances() {
        return $this->numeroLances;
    }

    function getLightStick() {
        return $this->lightStick;
    }

    function getToriline() {
        return $this->toriline;
    }

    function getHoraLancamentoInicio() {
        return $this->horaLancamentoInicio;
    }

    function getHoraLancamentoFim() {
        return $this->horaLancamentoFim;
    }

    function getHoraRecolhimentoInicio() {
        return $this->horaRecolhimentoInicio;
    }

    function getHoraRecolhimentoFim() {
        return $this->horaRecolhimentoFim;
    }

    function setNumeroEspinheis($numeroEspinheis) {
        $this->numeroEspinheis = $numeroEspinheis;
    }

    function setNumeroAnzois($numeroAnzois) {
        $this->numeroAnzois = $numeroAnzois;
    }

    function setNumeroLances($numeroLances) {
        $this->numeroLances = $numeroLances;
    }

    function setLightStick($lightStick) {
        $this->lightStick = $lightStick;
    }

    function setToriline($toriline) {
        $this->toriline = $toriline;
    }

    function setHoraLancamentoInicio($horaLancamentoInicio) {
        $this->horaLancamentoInicio = $horaLancamentoInicio;
    }

    function setHoraLancamentoFim($horaLancamentoFim) {
        $this->horaLancamentoFim = $horaLancamentoFim;
    }

    function setHoraRecolhimentoInicio($horaRecolhimentoInicio) {
        $this->horaRecolhimentoInicio = $horaRecolhimentoInicio;
    }

    function setHoraRecolhimentoFim($horaRecolhimentoFim) {
        $this->horaRecolhimentoFim = $horaRecolhimentoFim;
    }


}