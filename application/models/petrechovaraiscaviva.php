<?php

/**
 * PetrechoVaraIscaViva
 *
 * @Table(name="ec_petrecho_vara_isca_viva")
 * @Entity
 */
class PetrechoVaraIscaViva extends Petrecho
{
    
    /**
     * @var integer
     *
     * @Column(name="dias_isca", type="integer")
     */
    private $diasIsca;
    
    /**
     * @var integer
     *
     * @Column(name="dias_capeando", type="integer")
     */
    private $diasCapeando;
    
    /**
     * @var integer
     *
     * @Column(name="total_lances", type="integer")
     */
    private $totalLances;

    /**
     * @var integer
     *
     * @Column(name="numero_pescadores", type="integer")
     */
    private $numeroPescadores;
    
    /**
     * @var boolean
     *
     * @Column(name="boia", type="boolean")
     */
    private $boia;
    
    public function getDiasIsca() {
        return $this->diasIsca;
    }

    public function getDiasCapeando() {
        return $this->diasCapeando;
    }

    public function getTotalLances() {
        return $this->totalLances;
    }

    public function getNumeroPescadores() {
        return $this->numeroPescadores;
    }

    public function getBoia() {
        return $this->boia;
    }

    public function setDiasIsca($diasIsca) {
        $this->diasIsca = $diasIsca;
        return $this;
    }

    public function setDiasCapeando($diasCapeando) {
        $this->diasCapeando = $diasCapeando;
        return $this;
    }

    public function setTotalLances($totalLances) {
        $this->totalLances = $totalLances;
        return $this;
    }

    public function setNumeroPescadores($numeroPescadores) {
        $this->numeroPescadores = $numeroPescadores;
        return $this;
    }

    public function setBoia($boia) {
        $this->boia = $boia;
        return $this;
    }

    public function toArray() {
        $data = array(
            'id' => parent::getId(),
            'diasIsca' => $this->diasIsca,            
            'diasCapeando' => $this->diasCapeando,
            'totalLances' => $this->totalLances,
            'numeroPescadores' => $this->numeroPescadores,
            'boia' => $this->boia
        );
        
        return $data;
    }
}