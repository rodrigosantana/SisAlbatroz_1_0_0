<?php

/**
 * MedConservacao
 *
 * @Table(name="medicina_conservacao")
 * @Entity
 */
class MedConservacao {

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
     *   @JoinColumn(name="especie", referencedColumnName="id")
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
     * @var string
     *
     * @Column(name="procedencia_outros", type="string", length=150)
     */
    private $procedenciaOutros;

    /**
     * @var McCapturaIncidental
     * 
     * @OneToOne(targetEntity="McCapturaIncidental", mappedBy="id", cascade={"all"})
     * */
    private $capturaIncidental;

    /**
     * @var McBiometria
     * @OneToOne(targetEntity="McBiometria", mappedBy="id", cascade={"all"})
     * */
    private $biometria;

    /**
     * @var McColetaMaterialBiologico
     * @OneToOne(targetEntity="McColetaMaterialBiologico", mappedBy="id", cascade={"all"})
     * */
    private $coletaMaterialBiologico;

    /**
     * @var McOutrasPesquisas
     * @OneToOne(targetEntity="McOutrasPesquisas", mappedBy="id", cascade={"all"})
     * */
    private $outrasPesquisas;

    /**
     * @var $usuarioInsercao
     *
     * @ManyToOne(targetEntity="SystemUsers")
     * @JoinColumns({
     *   @JoinColumn(name="usuario_insercao", referencedColumnName="id")
     * })
     */
    private $usuarioInsercao;

    /**
     * @var $usuarioAlteracao
     *
     * @ManyToOne(targetEntity="SystemUsers")
     * @JoinColumns({
     *   @JoinColumn(name="usuario_alteracao", referencedColumnName="id")
     * })
     */
    private $usuarioAlteracao;

    /**
     * @var string $dataInsercao
     *
     * @Column(name="data_insercao", type="datetime")
     */
    private $dataInsercao;

    /**
     * @var string $dataAlteracao
     *
     * @Column(name="data_alteracao", type="datetime")
     */
    private $dataAlteracao;

    public function __construct() {
        if (is_null($this->capturaIncidental)) {
            $this->capturaIncidental = new McCapturaIncidental();
            $this->capturaIncidental->setId($this);
        }

        if (is_null($this->biometria)) {
            $this->biometria = new McBiometria();
            $this->biometria->setId($this);
        }

        if (is_null($this->coletaMaterialBiologico)) {
            $this->coletaMaterialBiologico = new McColetaMaterialBiologico();
            $this->coletaMaterialBiologico->setId($this);
        }

        if (is_null($this->outrasPesquisas)) {
            $this->outrasPesquisas = new McOutrasPesquisas();
            $this->outrasPesquisas->setId($this);
        }
    }

    public function getBiometria() {
        return $this->biometria;
    }

    public function getColetaMaterialBiologico() {
        return $this->coletaMaterialBiologico;
    }

    public function getOutrasPesquisas() {
        return $this->outrasPesquisas;
    }

    public function setBiometria(McBiometria $biometria) {
        $this->biometria = $biometria;
        return $this;
    }

    public function setColetaMaterialBiologico(McColetaMaterialBiologico $coletaMaterialBiologico) {
        $this->coletaMaterialBiologico = $coletaMaterialBiologico;
        return $this;
    }

    public function setOutrasPesquisas(McOutrasPesquisas $outrasPesquisas) {
        $this->outrasPesquisas = $outrasPesquisas;
        return $this;
    }

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

    public function getProcedenciaOutros() {
        return $this->procedenciaOutros;
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

    public function setEspecie(Ave $especie = null) {
        $this->especie = $especie;
    }

    public function setResponsavel($responsavel) {
        $this->responsavel = $responsavel;
    }

    public function setDataEntrada(DateTime $dataEntrada = null) {
        $this->dataEntrada = $dataEntrada;
    }

    public function setDataCaptura(DateTime $dataCaptura = null) {
        $this->dataCaptura = $dataCaptura;
    }

    public function setCoordenada($coordenada) {
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

    public function setProcedenciaOutros($procedenciaOutros) {
        $this->procedenciaOutros = $procedenciaOutros;
    }

    public function setCapturaIncidental($capturaIncidental) {
        $this->capturaIncidental = $capturaIncidental;
    }

    public function setUsuarioInsercao(SystemUsers $usuario) {
        $this->usuarioInsercao = $usuario;
    }

    public function getUsuarioInsercao() {
        return $this->usuarioInsercao;
    }

    public function setUsuarioAlteracao(SystemUsers $usuario) {
        $this->usuarioAlteracao = $usuario;
    }

    public function getUsuarioAlteracao() {
        return $this->usuarioAlteracao;
    }

    public function setDataInsercao($data) {
        $this->dataInsercao = $data;
    }

    public function getDataInsercao() {
        return $this->dataInsercao;
    }

    public function setDataAlteracao($data) {
        $this->dataAlteracao = $data;
    }

    public function getDataAlteracao() {
        return $this->dataAlteracao;
    }

}
