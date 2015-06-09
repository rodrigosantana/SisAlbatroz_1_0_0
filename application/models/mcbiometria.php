<?php

/**
 * McBiometria
 *
 * @Table(name="mc_biometria")
 * @Entity
 */
class McBiometria {

    /**
     * @OneToOne(targetEntity="MedicinaConservacao", inversedBy="capturaIncidental")
     * @JoinColumn(name="id", referencedColumnName="id")
     * */
    private $id;

    /**
     * @var integer
     * @Column(name="peso", type="integer")
     */
    private $peso;

    /**
     * @var integer
     * @Column(name="comprimento", type="integer")
     */
    private $comprimento;

    /**
     * @var integer
     * @Column(name="culmem", type="integer")
     */
    private $culmem;

    /**
     * @var integer
     * @Column(name="narina_culmem", type="integer")
     */
    private $narinaCulmem;

    /**
     * @var integer
     * @Column(name=""altura_bico_base, type="integer")
     */
    private $alturaBicoBase;

    /**
     * @var integer
     * @Column(name="altura_minima_bico", type="integer")
     */
    private $alturaMinimaBico;

    /**
     * @var integer
     * @Column(name="altura_bico_unguis", type="integer")
     */
    private $alturaBicoUnguis;

    /**
     * @var integer
     * @Column(name="largura_bico_base", type="integer")
     */
    private $larguraBicoBase;

    /**
     * @var integer
     * @Column(name="comprimento_cabeca", type="integer")
     */
    private $comprimentoCabeca;

    /**
     * @var integer
     * @Column(name="comprimento_asa", type="integer")
     */
    private $comprimentoAsa;

    /**
     * @var integer
     * @Column(name="comprimento_cauda", type="integer")
     */
    private $comprimentoCauda;

    /**
     * @var integer
     * @Column(name="comprimento_tarso", type="integer")
     */
    private $comprimentoTarso;

    /**
     * @var integer
     * @Column(name="comprimento_dedo_sem_unha", type="integer")
     */
    private $comprimentoDedoSemUnha;

    /**
     * @var integer
     * @Column(name="comprimento_dedo_com_unha", type="integer")
     */
    private $comprimentoDedoComUnha;

    /**
     * @var integer
     * @Column(name="envergadura", type="integer")
     */
    private $envergadura;

    /**
     * @var boolean
     * @Column(name="muda_asa", type="boolean")
     */
    private $mudaAsa;

    /**
     * @var boolean
     * @Column(name="muda_cauda", type="boolean")
     */
    private $mudaCauda;

    /**
     * @var boolean
     * @Column(name="muda_cabeca", type="boolean")
     */
    private $mudaCabeca;

    /**
     * @var boolean
     * @Column(name="muda_dorso", type="boolean")
     */
    private $mudaDorso;

    /**
     * @var boolean
     * @Column(name="muda_ventre", type="boolean")
     */
    private $mudaVentre;

    public function getId() {
        return $this->id;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function getComprimento() {
        return $this->comprimento;
    }

    public function getCulmem() {
        return $this->culmem;
    }

    public function getNarinaCulmem() {
        return $this->narinaCulmem;
    }

    public function getAlturaBicoBase() {
        return $this->alturaBicoBase;
    }

    public function getAlturaMinimaBico() {
        return $this->alturaMinimaBico;
    }

    public function getAlturaBicoUnguis() {
        return $this->alturaBicoUnguis;
    }

    public function getLarguraBicoBase() {
        return $this->larguraBicoBase;
    }

    public function getComprimentoCabeca() {
        return $this->comprimentoCabeca;
    }

    public function getComprimentoAsa() {
        return $this->comprimentoAsa;
    }

    public function getComprimentoCauda() {
        return $this->comprimentoCauda;
    }

    public function getComprimentoTarso() {
        return $this->comprimentoTarso;
    }

    public function getComprimentoDedoSemUnha() {
        return $this->comprimentoDedoSemUnha;
    }

    public function getComprimentoDedoComUnha() {
        return $this->comprimentoDedoComUnha;
    }

    public function getEnvergadura() {
        return $this->envergadura;
    }

    public function getMudaAsa() {
        return $this->mudaAsa;
    }

    public function getMudaCauda() {
        return $this->mudaCauda;
    }

    public function getMudaCabeca() {
        return $this->mudaCabeca;
    }

    public function getMudaDorso() {
        return $this->mudaDorso;
    }

    public function getMudaVentre() {
        return $this->mudaVentre;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function setComprimento($comprimento) {
        $this->comprimento = $comprimento;
    }

    public function setCulmem($culmem) {
        $this->culmem = $culmem;
    }

    public function setNarinaCulmem($narinaCulmem) {
        $this->narinaCulmem = $narinaCulmem;
    }

    public function setAlturaBicoBase($alturaBicoBase) {
        $this->alturaBicoBase = $alturaBicoBase;
    }

    public function setAlturaMinimaBico($alturaMinimaBico) {
        $this->alturaMinimaBico = $alturaMinimaBico;
    }

    public function setAlturaBicoUnguis($alturaBicoUnguis) {
        $this->alturaBicoUnguis = $alturaBicoUnguis;
    }

    public function setLarguraBicoBase($larguraBicoBase) {
        $this->larguraBicoBase = $larguraBicoBase;
    }

    public function setComprimentoCabeca($comprimentoCabeca) {
        $this->comprimentoCabeca = $comprimentoCabeca;
    }

    public function setComprimentoAsa($comprimentoAsa) {
        $this->comprimentoAsa = $comprimentoAsa;
    }

    public function setComprimentoCauda($comprimentoCauda) {
        $this->comprimentoCauda = $comprimentoCauda;
    }

    public function setComprimentoTarso($comprimentoTarso) {
        $this->comprimentoTarso = $comprimentoTarso;
    }

    public function setComprimentoDedoSemUnha($comprimentoDedoSemUnha) {
        $this->comprimentoDedoSemUnha = $comprimentoDedoSemUnha;
    }

    public function setComprimentoDedoComUnha($comprimentoDedoComUnha) {
        $this->comprimentoDedoComUnha = $comprimentoDedoComUnha;
    }

    public function setEnvergadura($envergadura) {
        $this->envergadura = $envergadura;
    }

    public function setMudaAsa($mudaAsa) {
        $this->mudaAsa = $mudaAsa;
    }

    public function setMudaCauda($mudaCauda) {
        $this->mudaCauda = $mudaCauda;
    }

    public function setMudaCabeca($mudaCabeca) {
        $this->mudaCabeca = $mudaCabeca;
    }

    public function setMudaDorso($mudaDorso) {
        $this->mudaDorso = $mudaDorso;
    }

    public function setMudaVentre($mudaVentre) {
        $this->mudaVentre = $mudaVentre;
    }


}
