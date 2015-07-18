<?php

/**
 * @Table(name="cad_empresa")
 * @Entity
 */
class Cad_empresa {
    /**
     *@var integer $id_empresa
     *
     *@Column(name="id_empresa", type="integer")
     *@Id
     *@GeneratedValue(strategy="SEQUENCE")
     *@SequenceGenerator(sequenceName="cad_empresa_seq", allocationSize=1, initialValue=1)
     */
    private $id_empresa;

//--------------------------------------------------------------------------------------------------------------------//
    /**
     *@var string $nome
     *
     *@Column(name="nome", type="string", length=50)
     */
    private $nome;

//--------------------------------------------------------------------------------------------------------------------//
    /**
     * @var Municipio
     *
     * @ManyToOne(targetEntity="Municipio")
     * @JoinColumns({
     *   @JoinColumn(name="municipio", referencedColumnName="id")
     * })
     */
    private $municipio;

//--------------------------------------------------------------------------------------------------------------------//

    /**
    *@var string $end
    *
    *@Column(name="endereco", type="string", length=225)
    */
    private $end;
//--------------------------------------------------------------------------------------------------------------------//

    /**
    *@var string $contato
    *
    *@Column(name="contato", type="string", length=50)
    */
    private $contato;
//--------------------------------------------------------------------------------------------------------------------//

    /**
    *@var string $cargo
    *
    *@Column(name="cargo", type="string", length=20)
    */
    private $cargo;
//--------------------------------------------------------------------------------------------------------------------//

    /**
    *@var string $tel
    *
    *@Column(name="telefone", type="string", length=11)
    */
    private $tel;
//--------------------------------------------------------------------------------------------------------------------//

    /**
    *@var string $email
    *
    *@Column(name="email", type="string", length=100)
    */
    private $email;
//--------------------------------------------------------------------------------------------------------------------//

   public function getIdEmpresa() {
      return $this->id_empresa;
   }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set nome
     *
     *@param string $nome
     *@return Cad_empresa
     */
    public function setNome($nome)
    {
        $this->nome=$nome;
        return $this;
    }

   public function getNome() {
      return $this->nome;
   }

//--------------------------------------------------------------------------------------------------------------------//
    /**
     * Set Municipio
     *
     * @param Municipio $municipio
     * @return Cad_empresa
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

//--------------------------------------------------------------------------------------------------------------------//
    /**
     *Set endereco
     *
     *@param string $end
     *@return Cad_empresa
     */
    public function setEnd($end)
    {
        $this->end=$end;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set contato
     *
     *@param string $contato
     *@return Cad_empresa
     */
    public function setContato($contato)
    {
        $this->contato=$contato;
        return $this;
    }

    public function getContato() {
      return $this->contato;
   }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set cargo
     *
     *@param string $cargo
     *@return Cad_empresa
     */
    public function setCargo($cargo)
    {
        $this->cargo=$cargo;
        return $this;
    }

    public function getCargo() {
      return $this->cargo;
   }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set telefone
     *
     *@param string $tel
     *@return Cad_empresa
     */
    public function setTel($tel)
    {
        $this->tel=$tel;
        return $this;
    }

    public function getTel(){
      return $this->tel;
   }

//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set email
     *
     *@param string $email
     *@return Cad_empresa
     */
    public function setEmail($email)
    {
        $this->email=$email;
        return $this;
    }

    public function getEmail(){
      return $this->email;
   }
//--------------------------------------------------------------------------------------------------------------------//



}
