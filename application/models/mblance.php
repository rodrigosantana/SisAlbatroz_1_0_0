<?php

/**
 * MbLance
 *
 * @Table(name="mb_lance")
 * @Entity
 */
class MbLance {

    /**
     * @var integer
     *
     * @Column(name="lance", type="integer", nullable=false)
     */
    private $lance;

    /**
     * @var \DateTime
     *
     * @Column(name="data", type="date", nullable=false)
     */
    private $data;

    /**
     * @var integer
     *
     * @Column(name="anzois", type="integer", nullable=false)
     */
    private $anzois;
    
    /**
     * @var coordenada
     *
     * @Column(name="coordenada", type="geometry")
     */
    private $coordenada;

    /**
     * @var string
     *
     * @Column(name="hora_inicial", type="time")
     */
    private $horaInicial;

    /**
     * @var string
     *
     * @Column(name="hora_final", type="time")
     */
    private $horaFinal;

    /**
     * @var string
     *
     * @Column(name="mm_uso", type="string", length=10, nullable=false)
     */
    private $mmUso;

    /**
     * @var integer
     *
     * @Column(name="ponteira_peso", type="integer", nullable=true)
     */
    private $ponteiraPeso;

    /**
     * @var float
     *
     * @Column(name="ponteira_distancia", type="decimal", nullable=true)
     */
    private $ponteiraDistancia;

    /**
     * @var boolean
     *
     * @Column(name="ave_capt", type="boolean",  nullable=false)
     */
    private $aveCapt;

    /**
     * @var integer
     *
     * @Column(name="id_lance", type="integer")
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="mb_lance_seq", allocationSize=1, initialValue=1)
     */
    private $idLance;

    /**
     * @var \MbGeral
     *
     * @ManyToOne(targetEntity="MbGeral")
     * @JoinColumns({
     *   @JoinColumn(name="mb_geral", referencedColumnName="id_mb")
     * })
     */
    private $mbGeral;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="CadMedidaMetigatoria", orphanRemoval=false)
     * @JoinTable(name="mb_mitigatoria",
     *   joinColumns={
     *     @JoinColumn(name="id_lance", referencedColumnName="id_lance")
     *   },
     *   inverseJoinColumns={
     *     @JoinColumn(name="id_mm", referencedColumnName="id_medida_metigatoria")
     *   }
     * )
     */
    private $idMm;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="CadIsca", orphanRemoval=false)
     * @JoinTable(name="mb_isca",
     *   joinColumns={
     *     @JoinColumn(name="id_lance", referencedColumnName="id_lance")
     *   },
     *   inverseJoinColumns={
     *     @JoinColumn(name="id_isca", referencedColumnName="id_isca")
     *   }
     * )
     */
    private $idIsca;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     * @OneToMany(targetEntity="MbCaptura", mappedBy="idLance", cascade={"all"})
     */
    protected $capturas;

    /**
     * Constructor
     */
    public function __construct() {
        $this->idMm = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idIsca = new \Doctrine\Common\Collections\ArrayCollection();
        $this->capturas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set lance
     *
     * @param integer $lance
     * @return MbLance
     */
    public function setLance($lance) {
        $this->lance = $lance;

        return $this;
    }

    /**
     * Get lance
     *
     * @return integer 
     */
    public function getLance() {
        return $this->lance;
    }

    /**
     * Set data
     *
     * @param \DateTime $data
     * @return MbLance
     */
    public function setData($data) {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime 
     */
    public function getData() {
        return $this->data;
    }

    /**
     * Set anzois
     *
     * @param integer $anzois
     * @return MbLance
     */
    public function setAnzois($anzois) {
        $this->anzois = $anzois;

        return $this;
    }

    /**
     * Get anzois
     *
     * @return integer 
     */
    public function getAnzois() {
        return $this->anzois;
    }

    /**
     * Set coordenada
     *
     * @param geometry $coordenada
     * @return MbLance
     */
    public function setCoordenada($coordenada) {
        $this->coordenada = $coordenada;

        return $this;
    }

    /**
     * Get coordenada
     *
     * @return geometry 
     */
    public function getCoordenada() {
        return $this->coordenada;
    }

    /**
     * Set horaInicial
     *
     * @param time $horaInicial
     * @return MbLance
     */
    public function setHoraInicial($horaInicial) {
        $this->horaInicial = $horaInicial;

        return $this;
    }

    /**
     * Get horaInicial
     *
     * @return time 
     */
    public function getHoraInicial() {
        return $this->horaInicial;
    }

    /**
     * Set horaFinal
     *
     * @param time $horaFinal
     * @return MbLance
     */
    public function setHoraFinal($horaFinal) {
        $this->horaFinal = $horaFinal;

        return $this;
    }

    /**
     * Get horaFinal
     *
     * @return time 
     */
    public function getHoraFinal() {
        return $this->horaFinal;
    }

    /**
     * Set mmUso
     *
     * @param string $mmUso
     * @return MbLance
     */
    public function setMmUso($mmUso) {
        $this->mmUso = $mmUso;

        return $this;
    }

    /**
     * Get mmUso
     *
     * @return string 
     */
    public function getMmUso() {
        return $this->mmUso;
    }

    /**
     * Set ponteiraPeso
     *
     * @param integer $ponteiraPeso
     * @return MbLance
     */
    public function setPonteiraPeso($ponteiraPeso) {
        $this->ponteiraPeso = $ponteiraPeso;

        return $this;
    }

    /**
     * Get ponteiraPeso
     *
     * @return integer
     */
    public function getPonteiraPeso() {
        return $this->ponteiraPeso;
    }

    /**
     * Set ponteiraDistancia
     *
     * @param float $ponteiraDistancia
     * @return MbLance
     */
    public function setPonteiraDistancia($ponteiraDistancia) {
        $this->ponteiraDistancia = $ponteiraDistancia;

        return $this;
    }

    /**
     * Get ponteiraDistancia
     *
     * @return float
     */
    public function getPonteiraDistancia() {
        return $this->ponteiraDistancia;
    }

    /**
     * Set aveCapt
     *
     * @param boolean $aveCapt
     * @return MbLance
     */
    public function setAveCapt($aveCapt) {
        $this->aveCapt = $aveCapt;

        return $this;
    }

    /**
     * Get aveCapt
     *
     * @return boolean 
     */
    public function getAveCapt() {
        return $this->aveCapt;
    }

    /**
     * Get idLance
     *
     * @return integer 
     */
    public function getIdLance() {
        return $this->idLance;
    }

    /**
     * Set mbGeral
     *
     * @param \MbGeral $mbGeral
     * @return MbLance
     */
    public function setMbGeral(\MbGeral $mbGeral = null) {
        $this->mbGeral = $mbGeral;

        return $this;
    }

    /**
     * Get mbGeral
     *
     * @return \MbGeral 
     */
    public function getMbGeral() {
        return $this->mbGeral;
    }

    /**
     * Add idMm
     *
     * @param \CadMedidaMetigatoria $idMm
     * @return MbLance
     */
    public function addIdMm(\CadMedidaMetigatoria $idMm) {
        $this->idMm[] = $idMm;

        return $this;
    }

    /**
     * Remove idMm
     *
     * @param \CadMedidaMetigatoria $idMm
     */
    public function removeIdMm(\CadMedidaMetigatoria $idMm) {
        $this->idMm->removeElement($idMm);
    }

    /**
     * Get idMm
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdMm() {
        return $this->idMm;
    }

    /**
     * Add idIsca
     *
     * @param \CadIsca $idIsca
     * @return MbLance
     */
    public function addIdIsca(\CadIsca $idIsca) {
        $this->idIsca[] = $idIsca;

        return $this;
    }

    /**
     * Remove idIsca
     *
     * @param \CadIsca $idIsca
     */
    public function removeIdIsca(\CadIsca $idIsca) {
        $this->idIsca->removeElement($idIsca);
    }

    /**
     * Get idIsca
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdIsca() {
        return $this->idIsca;
    }

    /**
     * Add captura
     *
     * @param MbCaptura $captura
     * @return MbLance
     */
    public function addCaptura(MbCaptura $captura) {
        $captura->setIdLance($this);
        $this->capturas[] = $captura;
        return $this;
    }

    /**
     * Get capturas
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCapturas() {
        return $this->capturas;
    }

    public function toArray() {
        $data = array(
            'lance' =>  $this->lance,
            'data' => $this->data == null ? null : $this->data->format('Y-m-d'),
            'anzois' => $this->anzois,
            'coordenada' => $this->coordenada == null ? null : array('latitude'=>$this->coordenada->latitudeDecimal, 'longitude'=>$this->coordenada->longitudeDecimal),
            'horaInicial' => $this->horaInicial == null ? null : $this->horaInicial->format('H:i:s'),
            'horaFinal' => $this->horaFinal == null ? null : $this->horaFinal->format('H:i:s'),
            'mmUso' => $this->mmUso,
            'ponteiraPeso' => $this->ponteiraPeso,
            'ponteiraDistancia' => $this->ponteiraDistancia,
            'aveCapt' => $this->aveCapt,
            'idLance' => $this->idLance,
            'mbGeral' => $this->mbGeral->getIdMb(),
            'idMm'=>array(),
            'idIsca'=>array(),
            'capturas'=>array()
        );

        if ($this->idMm) {
            $lista = $this->idMm->toArray();
            $listaMm = array();
            
            foreach ($lista as $value) {
                $listaMm[] = $value->getIdMedidaMetigatoria();
            }
            
            $data['idMm'] = $listaMm;
        }
        
        if ($this->idIsca) {
            $lista = $this->idIsca->toArray();
            $listaIsca = array();
            
            foreach ($lista as $value) {
                $listaIsca[] = $value->getIdIsca();
            }
            
            $data['idIsca'] = $listaIsca;
        }
    
        $capturas = $this->capturas->toArray();
        $lista = array();
        
        foreach ($capturas as $captura) {
            $lista[] = $captura->toArray();
        }
        
        $data['capturas'] = $lista;
        
        return $data;
    }
}
