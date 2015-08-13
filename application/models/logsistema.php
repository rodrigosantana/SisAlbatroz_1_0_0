<?php
/**
 * @Table(name="log_sistema")
 * @Entity
 */
class LogSistema
{    
    /**
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="log_sistema_seq", allocationSize=1, initialValue=1)
     */
    private $id;
    
    /**
     * @descricao(usuario)
     * @var Usuario
     *
     * @ManyToOne(targetEntity="SystemUsers")
     * @JoinColumns({
     *   @JoinColumn(name="usuario", referencedColumnName="id")
     * })
     */
    private $usuario;
    
    /**
     * @descricao(data_do_log)
     * @var datetime $dataHora
     *
     * @Column(name="data_hora", type="datetime")
     */
    private $dataHora;
    
    /**
     * @var string $controller
     *
     * @Column(name="controller", type="string", length=100)
     */
    private $controller;
    
    
    /**
     * @var string $acao
     *
     * @Column(name="acao", type="string", length=100)
     */
    private $acao;
    
    
    /**
     * @var string $ip
     *
     * @Column(name="ip", type="string", length=100)
     */
    private $ip;
    
    
    /**
     * @var string $info
     *
     * @Column(name="info", type="string", length=255)
     */
    private $info;
    
    /**
     * @var string $descricao
     *
     * @Column(name="descricao", type="text")
     */
    private $descricao;
    
    /**
     * @var array
     *
     * @Column(name="dados_requisicao", type="array")
     */
    private $dadosRequisicao;
    
    /**
     * @var array
     *
     * @Column(name="dados_salvos", type="array")
     */
    private $dadosSalvos;
    
    /**
     * Set controller
     *
     * @param string $controller
     * @return LogAcesso
     */
    public function setController($controller)
    {
        $this->controller = $controller;
        return $this;
    }
    
    /**
     * Get controller
     *
     * @return string 
     */
    public function getController()
    {
        return $this->controller;
    }
    
    
    /**
     * Set acao
     *
     * @param string $acao
     * @return LogAcesso
     */
    public function setAcao($acao)
    {
        $this->acao = $acao;
        return $this;
    }
    
    /**
     * Get acao
     *
     * @return string 
     */
    public function getAcao()
    {
        return $this->acao;
    }
      
    /**
     * Set ip
     *
     * @param string $ip
     * @return LogAcesso
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
        return $this;
    }
    
    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }
    
    /**
     * Set info
     *
     * @param string $info
     * @return LogAcesso
     */
    public function setInfo($info)
    {
        $this->info = $info;
        return $this;
    }
    
    /**
     * Get info
     *
     * @return string 
     */
    public function getInfo()
    {
        return $this->info;
    }
    
    /**
     * Set descricao
     *
     * @param text $descricao
     * @return LogAcesso
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * Get descricao
     *
     * @return text 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }
       
    /**
     * Set dataHora
     *
     * @param datetime $dataHora
     * @return LogAcesso
     */
    public function setDataHora($dataHora)
    {
        $this->dataHora = $dataHora;
        return $this;
    }

    /**
     * Get dataHora
     *
     * @return datetime 
     */
    public function getDataHora()
    {
        return $this->dataHora;
    }
    
    /**
     * Set usuario
     *
     * @param SystemUsers $usuario
     * @return LogAcesso
     */
    public function setUsuario(SystemUsers $usuario = null)
    {
        $this->usuario = $usuario;
        return $this;
    }

    /**
     * Get usuario
     *
     * @return SystemUsers 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function __toString() {
        return $this->id;
    }
    
    public function getDadosRequisicao() {
        return $this->dadosRequisicao;
    }

    public function getDadosSalvos() {
        return $this->dadosSalvos;
    }

    public function setDadosRequisicao($dadosRequisicao) {
        $this->dadosRequisicao = $dadosRequisicao;
    }

    public function setDadosSalvos($dadosSalvos) {
        $this->dadosSalvos = $dadosSalvos;
    }
}