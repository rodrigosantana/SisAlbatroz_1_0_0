<?php

/**
 * PetrechoLinhaMao
 *
 * @Table(name="ec_petrecho_linha_mao")
 * @Entity
 */
class PetrechoLinhaMao extends Petrecho {

    /**
     * @var integer
     *
     * @Column(name="numero_linhas", type="integer")
     */
    private $numeroLinhas;

    /**
     * @var integer
     *
     * @Column(name="numero_anzois_por_linha", type="integer")
     */
    private $numeroAnzoisPorLinha;

    /**
     * @var integer
     *
     * @Column(name="numero_lances_por_dia", type="integer")
     */
    private $numeroLancesPorDia;

    /**
     * @var time
     *
     * @Column(name="hora_inicial", type="time")
     */
    private $horaInicial;

    /**
     * @var time
     *
     * @Column(name="hora_final", type="time")
     */
    private $horaFinal;

    /**
     * @var array
     *
     * @Column(name="tipo_petrecho_utilizado", type="array")
     */
    private $tipoPetrechoUtilizado;

    /**
     * @var text
     *
     * @Column(name="outros", type="text")
     */
    private $outros;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    function getNumeroLinhas() {
        return $this->numeroLinhas;
    }

    function getNumeroAnzoisPorLinha() {
        return $this->numeroAnzoisPorLinha;
    }

    function getNumeroLancesPorDia() {
        return $this->numeroLancesPorDia;
    }

    function getHoraInicial() {
        return $this->horaInicial;
    }

    function getHoraFinal() {
        return $this->horaFinal;
    }

    function getTipoPetrechoUtilizado() {
        return is_null($this->tipoPetrechoUtilizado) ? array() : $this->tipoPetrechoUtilizado;
    }

    function getOutros() {
        return $this->outros;
    }

    function setNumeroLinhas($numeroLinhas) {
        $this->numeroLinhas = $numeroLinhas;
    }

    function setNumeroAnzoisPorLinha($numeroAnzoisPorLinha) {
        $this->numeroAnzoisPorLinha = $numeroAnzoisPorLinha;
    }

    function setNumeroLancesPorDia($numeroLancesPorDia) {
        $this->numeroLancesPorDia = $numeroLancesPorDia;
    }

    function setHoraInicial($horaInicial) {
        $this->horaInicial = $horaInicial;
    }

    function setHoraFinal($horaFinal) {
        $this->horaFinal = $horaFinal;
    }

    function setTipoPetrechoUtilizado($tipoPetrechoUtilizado) {
        $this->tipoPetrechoUtilizado = $tipoPetrechoUtilizado;
    }

    function setOutros($outros) {
        $this->outros = $outros;
    }


}
