<?php

/**
 * PetrechoArrasto
 *
 * @Table(name="ec_petrecho_arrasto")
 * @Entity
 */
class PetrechoArrasto extends Petrecho {

    /**
     * @var string
     *
     * @Column(name="tipo_arrasto", type="string", length=20)
     */
    private $tipoArrasto;

    /**
     * @var integer
     *
     * @Column(name="numero_arrastos_dia", type="integer")
     */
    private $numeroArrastosDia;

    /**
     * @var time
     *
     * @Column(name="tempo_medio_arrasto", type="time")
     */
    private $tempoMedioArrasto;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    function getTipoArrasto() {
        return $this->tipoArrasto;
    }

    function getNumeroArrastosDia() {
        return $this->numeroArrastosDia;
    }

    function getTempoMedioArrasto() {
        return $this->tempoMedioArrasto;
    }

    function setTipoArrasto($tipoArrasto) {
        $this->tipoArrasto = $tipoArrasto;
    }

    function setNumeroArrastosDia($numeroArrastosDia) {
        $this->numeroArrastosDia = $numeroArrastosDia;
    }

    function setTempoMedioArrasto($tempoMedioArrasto) {
        $this->tempoMedioArrasto = $tempoMedioArrasto;
    }

    public function toArray() {
        $data = array(
            'id' => parent::getId(),
            'tipoArrasto' => $this->tipoArrasto,
            'numeroArrastosDia' => $this->numeroArrastosDia,
            'tempoMedioArrasto' => $this->tempoMedioArrasto,
        );
        
        return $data;
    }
}
