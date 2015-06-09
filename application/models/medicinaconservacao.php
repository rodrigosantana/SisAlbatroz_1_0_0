<?php

/**
 * MedicinaConservacao
 *
 * @Table(name="medicina_conservacao")
 * @Entity
 */
class MedicinaConservacao {

    /**
     * @var integer
     *
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="medicina_conservacao_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @Column(name="etiqueta", type="string", length=100)
     */
    private $etiqueta;

    /**
     * @var string
     *
     * @Column(name="etiqueta_antiga", type="string", length=100)
     */
    private $etiquetaAntiga;

    /**
     * @var \Ave
     *
     * @ManyToOne(targetEntity="Ave")
     * @JoinColumns({
     *   @JoinColumn(name="especie", referencedColumnName="id_aves")
     * })
     */
    private $especie;

    /**
     * @var string
     *
     * @Column(name="responsavel", type="string", length=255)
     */
    private $responsavel;

    /**
     * @var /DateTime
     *
     * @Column(name="data_entrada", type="date")
     */
    private $dataEntrada;

    /**
     * @var /DateTime
     *
     * @Column(name="data_captura", type="date")
     */
    private $dataCaptura;

    /**
     * @var coordenada
     *
     * @Column(name="coordenada", type="geometry")
     */
    private $coordenada;

    /**
     * @var string
     *
     * @Column(name="anilha", type="string", length=100)
     */
    private $anilha;

    /**
     * @var string
     *
     * @Column(name="plumagem", type="string", length=50)
     */
    private $plumagem;

    /**
     * @var string
     *
     * @Column(name="procedencia", type="string", length=50)
     */
    private $procedencia;

    /**
     * @OneToOne(targetEntity="McCapturaIncidental", mappedBy="id")
     * */
    private $capturaIncidental;

    public function getId() {
        return $this->id;
    }

    public function getEtiqueta() {
        return $this->etiqueta;
    }

    public function getEtiquetaAntiga() {
        return $this->etiquetaAntiga;
    }

    public function getEspecie() {
        return $this->especie;
    }

    public function getResponsavel() {
        return $this->responsavel;
    }

    public function getDataEntrada() {
        return $this->dataEntrada;
    }

    public function getDataCaptura() {
        return $this->dataCaptura;
    }

    public function getCoordenada() {
        return $this->coordenada;
    }

    public function getAnilha() {
        return $this->anilha;
    }

    public function getPlumagem() {
        return $this->plumagem;
    }

    public function getProcedencia() {
        return $this->procedencia;
    }

    public function getCapturaIncidental() {
        return $this->capturaIncidental;
    }

    public function setEtiqueta($etiqueta) {
        $this->etiqueta = $etiqueta;
    }

    public function setEtiquetaAntiga($etiquetaAntiga) {
        $this->etiquetaAntiga = $etiquetaAntiga;
    }

    public function setEspecie(\Ave $especie) {
        $this->especie = $especie;
    }

    public function setResponsavel($responsavel) {
        $this->responsavel = $responsavel;
    }

    public function setDataEntrada($dataEntrada) {
        $this->dataEntrada = $dataEntrada;
    }

    public function setDataCaptura($dataCaptura) {
        $this->dataCaptura = $dataCaptura;
    }

    public function setCoordenada(coordenada $coordenada) {
        $this->coordenada = $coordenada;
    }

    public function setAnilha($anilha) {
        $this->anilha = $anilha;
    }

    public function setPlumagem($plumagem) {
        $this->plumagem = $plumagem;
    }

    public function setProcedencia($procedencia) {
        $this->procedencia = $procedencia;
    }

    public function setCapturaIncidental($capturaIncidental) {
        $this->capturaIncidental = $capturaIncidental;
    }
}
