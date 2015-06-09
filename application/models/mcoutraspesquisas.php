<?php

/**
 * McOutrasPesquisas
 *
 * @Table(name="mc_outras_pesquisas")
 * @Entity
 */
class McOutrasPesquisas {

    /**
     * @OneToOne(targetEntity="MedicinaConservacao", inversedBy="capturaIncidental")
     * @JoinColumn(name="id", referencedColumnName="id")
     * */
    private $id;

    /**
     * @var boolean
     * @Column(name="swab_cloaca", type="boolean")
     */
    private $swabCloaca;

    /**
     * @var boolean
     * @Column(name="swab_coana", type="boolean")
     */
    private $swabCoana;

    /**
     * @var boolean
     * @Column(name="conteudo_estomacal", type="boolean")
     */
    private $conteudoEstomacal;

    /**
     * @var boolean
     * @Column(name="sangue_cardiaco", type="boolean")
     */
    private $sangueCardiaco;

    /**
     * @var array
     * @Column(name="penas", type="array")
     */
    private $penas;

    /**
     * @var boolean
     * @Column(name="outros", type="text")
     */
    private $outros;

    /**
     * @var boolean
     * @Column(name="observacoes", type="text")
     */
    private $observacoes;

    public function getId() {
        return $this->id;
    }
    
    public function getSwabCloaca() {
        return $this->swabCloaca;
    }

    public function getSwabCoana() {
        return $this->swabCoana;
    }

    public function getConteudoEstomacal() {
        return $this->conteudoEstomacal;
    }

    public function getSangueCardiaco() {
        return $this->sangueCardiaco;
    }

    public function getPenas() {
        return $this->penas;
    }

    public function getOutros() {
        return $this->outros;
    }

    public function getObservacoes() {
        return $this->observacoes;
    }

    public function setSwabCloaca($swabCloaca) {
        $this->swabCloaca = $swabCloaca;
    }

    public function setSwabCoana($swabCoana) {
        $this->swabCoana = $swabCoana;
    }

    public function setConteudoEstomacal($conteudoEstomacal) {
        $this->conteudoEstomacal = $conteudoEstomacal;
    }

    public function setSangueCardiaco($sangueCardiaco) {
        $this->sangueCardiaco = $sangueCardiaco;
    }

    public function setPenas($penas) {
        $this->penas = $penas;
    }

    public function setOutros($outros) {
        $this->outros = $outros;
    }

    public function setObservacoes($observacoes) {
        $this->observacoes = $observacoes;
    }


}
