<?php

/**
 * @Table(name="cad_observador")
 * @Entity
 */
class Cad_observador {
    /**
     *@var integer $id_observ
     *
     *@Column(name="id_observ", type="integer")
     *@Id
     *@GeneratedValue(strategy="SEQUENCE")
     *@SequenceGenerator(sequenceName="cad_observ_seq", allocationSize=1, initialValue=1)
     */
    private $id_observ;

//--------------------------------------------------------------------------------------------------------------------//
    /**
     *@var string $nome
     *
     *@Column(name="nome", type="string", length=50)
     */
    private $nome;
//--------------------------------------------------------------------------------------------------------------------//

    /**
    *@var string $cpf
    *
    *@Column(name="cpf", type="string", length=11)
    */
    private $cpf;
//--------------------------------------------------------------------------------------------------------------------////--------------------------------------------------------------------------------------------------------------------//

    /**
    *@var string $rg
    *
    *@Column(name="rg", type="string", length=10)
    */
    private $rg;
//--------------------------------------------------------------------------------------------------------------------////--------------------------------------------------------------------------------------------------------------------//

    /**
    *@var string $email
    *
    *@Column(name="email", type="string", length=100)
    */
    private $email;
//--------------------------------------------------------------------------------------------------------------------////--------------------------------------------------------------------------------------------------------------------//

    /**
    *@var string $tel
    *
    *@Column(name="telefone", type="string", length=11)
    */
    private $tel;
//--------------------------------------------------------------------------------------------------------------------////--------------------------------------------------------------------------------------------------------------------//

    /**
    *@var string $skype
    *
    *@Column(name="skype", type="string", length=100)
    */
    private $skype;
//--------------------------------------------------------------------------------------------------------------------//

    /**
    *@var string $end
    *
    *@Column(name="endereco", type="string", length=200)
    */
    private $end;
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
     *Set nome
     *
     *@param string $nome
     *@return Cad_observador
     */
    public function setNome($nome)
    {
        $this->nome=$nome;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set cpf
     *
     *@param string $cpf
     *@return Cad_observador
     */
    public function setCpf($cpf)
    {
        $this->cpf=$cpf;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set rg
     *
     *@param string $rg
     *@return Cad_observador
     */
    public function setRg($rg)
    {
        $this->rg=$rg;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set email
     *
     *@param string $email
     *@return Cad_observador
     */
    public function setEmail($email)
    {
        $this->email=$email;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set telefone
     *
     *@param string $tel
     *@return Cad_observador
     */
    public function setTel($tel)
    {
        $this->tel=$tel;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set skype
     *
     *@param string $skype
     *@return Cad_observador
     */
    public function setSkype($skype)
    {
        $this->skype=$skype;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set endereco
     *
     *@param string $end
     *@return Cad_observador
     */
    public function setEnd($end)
    {
        $this->end=$end;
        return $this;
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
     * Get observador Id
     *
     * @return string
     */
    public function getObservId(){
        return $this->id_observ;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * Get observador nome
     *
     * @return string
     */
    public function getObservNome(){
        return $this->nome;
    }
//--------------------------------------------------------------------------------------------------------------------//




}
