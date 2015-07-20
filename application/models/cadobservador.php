<?php

/**
 * CadObservador
 *
 * @Table(name="cad_observador")
 * @Entity
 */
class CadObservador
{
    /**
     * @var string
     *
     * @Column(name="nome", type="string", length=50, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @Column(name="cpf", type="string", length=10, nullable=false)
     */
    private $cpf;

    /**
     * @var string
     *
     * @Column(name="rg", type="string", length=10, nullable=false)
     */
    private $rg;

    /**
     * @var string
     *
     * @Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @Column(name="telefone", type="string", length=11, nullable=false)
     */
    private $telefone;

    /**
     * @var string
     *
     * @Column(name="skype", type="string", length=50, nullable=true)
     */
    private $skype;

    /**
     * @var string
     *
     * @Column(name="endereco", type="string", length=200, nullable=false)
     */
    private $endereco;

    /**
     * @var Municipio
     *
     * @ManyToOne(targetEntity="Municipio")
     * @JoinColumns({
     *   @JoinColumn(name="municipio", referencedColumnName="id")
     * })
     */
    private $municipio;

   /**
   * @var integer
   *
   * @Column(name="id_observ", type="integer")
   * @Id
   * @GeneratedValue(strategy="SEQUENCE")
   * @SequenceGenerator(sequenceName="cad_observador_seq", allocationSize=1, initialValue=1)
   */
   private $idObserv;

    /**
     * Set nome
     *
     * @param string $nome
     * @return CadObservador
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set cpf
     *
     * @param string $cpf
     * @return CadObservador
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get cpf
     *
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set rg
     *
     * @param string $rg
     * @return CadObservador
     */
    public function setRg($rg)
    {
        $this->rg = $rg;

        return $this;
    }

    /**
     * Get rg
     *
     * @return string
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return CadObservador
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     * @return CadObservador
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone
     *
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set skype
     *
     * @param string $skype
     * @return CadObservador
     */
    public function setSkype($skype)
    {
        $this->skype = $skype;

        return $this;
    }

    /**
     * Get skype
     *
     * @return string
     */
    public function getSkype()
    {
        return $this->skype;
    }

    /**
     * Set endereco
     *
     * @param string $endereco
     * @return CadObservador
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get endereco
     *
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set Municipio
     *
     * @param Municipio $municipio
     * @return CadEmbarcacao
     */
    public function setMunicipio(Municipio $municipio)
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * Get Municipio
     *
     * @return string
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Get idObserv
     *
     * @return integer
     */
    public function getIdObserv()
    {
        return $this->idObserv;
    }
}
