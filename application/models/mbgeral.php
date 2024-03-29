<?php

/**
 * MbGeral
 *
 * @Table(name="mb_geral")
 * @Entity
 */
class MbGeral {

    /**
     * @var \DateTime
     *
     * @Column(name="data_saida", type="date", nullable=false)
     */
    private $dataSaida;

    /**
     * @var \DateTime
     *
     * @Column(name="data_chegada", type="date", nullable=false)
     */
    private $dataChegada;

    /**
     * @var string
     *
     * @Column(name="observacao", type="string", length=500, nullable=false)
     */
    private $observacao;

    /**
     * @var integer
     *
     * @Column(name="petrecho", type="smallint", nullable=true)
     */
    private $petrecho;

    /**
     * @var integer
     *
     * @Column(name="id_mb", type="integer")
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="mb_geral_seq", allocationSize=1, initialValue=1)
     */
    private $idMb;

    /**
     * @var \SystemUsers
     *
     * @ManyToOne(targetEntity="SystemUsers")
     * @JoinColumns({
     *   @JoinColumn(name="entrevistador", referencedColumnName="id")
     * })
     */
    private $entrevistador;

    /**
     * @var \CadMestre
     *
     * @ManyToOne(targetEntity="CadMestre")
     * @JoinColumns({
     *   @JoinColumn(name="mestre", referencedColumnName="id_mestre")
     * })
     */
    private $mestre;

    /**
     * @var \CadEmbarcacao
     *
     * @ManyToOne(targetEntity="CadEmbarcacao")
     * @JoinColumns({
     *   @JoinColumn(name="embarcacao", referencedColumnName="id_embarcacao")
     * })
     */
    private $embarcacao;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     * @OneToMany(targetEntity="MbLance", mappedBy="mbGeral", cascade={"all"})
     */
    protected $lances;

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

    /**
     * Constructor
     */
    public function __construct() {
        $this->lances = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set dataSaida
     *
     * @param \DateTime $dataSaida
     * @return MbGeral
     */
    public function setDataSaida($dataSaida) {
        $this->dataSaida = $dataSaida;

        return $this;
    }

    /**
     * Get dataSaida
     *
     * @return \DateTime 
     */
    public function getDataSaida() {
        return $this->dataSaida;
    }

    /**
     * Set dataChegada
     *
     * @param \DateTime $dataChegada
     * @return MbGeral
     */
    public function setDataChegada($dataChegada) {
        $this->dataChegada = $dataChegada;

        return $this;
    }

    /**
     * Get dataChegada
     *
     * @return \DateTime 
     */
    public function getDataChegada() {
        return $this->dataChegada;
    }

    /**
     * Set observacao
     *
     * @param string $observacao
     * @return MbGeral
     */
    public function setObservacao($observacao) {
        $this->observacao = $observacao;

        return $this;
    }

    /**
     * Get observacao
     *
     * @return string 
     */
    public function getObservacao() {
        return $this->observacao;
    }

    /**
     * Set petrecho
     *
     * @param integer $petrecho
     * @return MbGeral
     */
    public function setPetrecho($petrecho) {
        $this->petrecho = $petrecho;

        return $this;
    }

    /**
     * Get petrecho
     *
     * @return integer 
     */
    public function getPetrecho() {
        return $this->petrecho;
    }

    /**
     * Get idMb
     *
     * @return integer 
     */
    public function getIdMb() {
        return $this->idMb;
    }

    /**
     * Set entrevistador
     *
     * @param \SystemUsers $entrevistador
     * @return MbGeral
     */
    public function setEntrevistador(\SystemUsers $entrevistador = null) {
        $this->entrevistador = $entrevistador;

        return $this;
    }

    /**
     * Get entrevistador
     *
     * @return \SystemUsers
     */
    public function getEntrevistador() {
        return $this->entrevistador;
    }

    /**
     * Set mestre
     *
     * @param \CadMestre $mestre
     * @return MbGeral
     */
    public function setMestre(\CadMestre $mestre = null) {
        $this->mestre = $mestre;

        return $this;
    }

    /**
     * Get mestre
     *
     * @return \CadMestre 
     */
    public function getMestre() {
        return $this->mestre;
    }

    /**
     * Set embarcacao
     *
     * @param \CadEmbarcacao $embarcacao
     * @return MbGeral
     */
    public function setEmbarcacao(\CadEmbarcacao $embarcacao = null) {
        $this->embarcacao = $embarcacao;

        return $this;
    }

    /**
     * Get embarcacao
     *
     * @return \CadEmbarcacao 
     */
    public function getEmbarcacao() {
        return $this->embarcacao;
    }

    /**
     * Add lance
     *
     * @param MbLance $lance
     * @return MbGeral
     */
    public function addLance(MbLance $lance) {
        $lance->setMbGeral($this);
        $this->lances[] = $lance;
        return $this;
    }

    /**
     * Get lances
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getLances() {
        return $this->lances;
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

    public function getLancesOrdenado() {
        $iterator = $this->lances->getIterator();
        $iterator->uasort(function ($a, $b) {
            return ($a->getLance() < $b->getLance()) ? -1 : 1;
        });
        $collection = new Doctrine\Common\Collections\ArrayCollection(iterator_to_array($iterator));
        return $collection;
    }
    
    public function jsonMap($url = '') {
        $itens = array();
        $urlView = !empty($url) ? ' <a href="'.$url.'?id='.$this->getIdMb().'" href="javascript:;" title="Visualizar" style="font-size: 18px;" target="_blank"><i class="glyphicon glyphicon-eye-open"></i></a>' : '';
        
        foreach ($this->lances as $value) {
            if (!is_null($value->getCoordenada()) && $value->getCoordenada()->longitudeDecimal != "" && $value->getCoordenada()->latitudeDecimal != "") {
                $itens[] = array(
                    'type'=>'Feature',
                    'id'=>'mapa_bordo_'. $this->getIdMb() . '_' . $value->getIdLance(),
                    'geometry'=>array(
                        'type'=>'Point',
                        'coordinates'=> array((double)$value->getCoordenada()->longitudeDecimal, (double)$value->getCoordenada()->latitudeDecimal),                        
                    ),
                    'properties'=>array('content'=>
                            '<h3>Mapa de Bordo'.$urlView.'</h3>'
                            .'<strong>Código:</strong> '. $this->getIdMb() .'<br>'
                            .'<strong>Embarcação:</strong> '. $this->getEmbarcacao()->getNome() .'<br>'
                            .'<strong>Mestre:</strong> '. $this->getMestre()->getNome() .'<br>'
                            .'<strong>Petrecho:</strong> '. Utils::getPetrechoMapaBordo($this->getPetrecho()) .'<br>'
                            .'<strong>Lançamento #'.$value->getLance().':</strong> Latitude: '. $value->getCoordenada()->latitudeDecimal .' Longitude: '.$value->getCoordenada()->longitudeDecimal.'<br>'
                        )
                );    
            }
        }
        
        return $itens;
    }
    
    public function toArray() {
        $data = array (
            'dataSaida'=> ($this->dataSaida == null ? null : $this->dataSaida->format('Y-m-d')),
            'dataChegada'=> ($this->dataChegada == null ? null : $this->dataChegada->format('Y-m-d')),
            'observacao'=> $this->observacao,
            'petrecho'=> $this->petrecho,
            'idMb'=> $this->idMb,
            'entrevistador'=> $this->entrevistador == null ? null : $this->entrevistador->getId(),
            'mestre'=> $this->mestre == null ? null : $this->mestre->getIdMestre(),
            'embarcacao'=> $this->embarcacao == null ? null : $this->embarcacao->getIdEmbarcacao(),            
            'usuarioInsercao'=> $this->usuarioInsercao == null ? '' : $this->usuarioInsercao->getId(),
            'usuarioAlteracao'=> $this->usuarioAlteracao == null ? '' : $this->usuarioAlteracao->getId(),
            'dataInsercao'=> $this->dataInsercao == null ? null : $this->dataInsercao->format('Y-m-d H:i:s'),
            'dataAlteracao'=> $this->dataAlteracao == null ? null : $this->dataAlteracao->format('Y-m-d H:i:s'),
            'lances'=>array()
        );
        
        $lances = $this->lances->toArray();
        
        foreach ($lances as $lance) {
            $data['lances'][] = $lance->toArray();
        }
        
        return $data;
    }
}
