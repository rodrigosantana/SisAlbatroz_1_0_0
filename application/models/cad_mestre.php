<?php

// Criação da entidade para a tabela de aves

/**
 * @Table(name="cad_mestre")
 * @Entity
 */
class Cad_mestre {

    // Definindo as varáveis da tabela e suas propriedade
    /**
     *@var integer $id_mestre
     *
     *@Column(name="id_mestre", type="integer")
     *@Id
     *@GeneratedValue(strategy="SEQUENCE")
     *@SequenceGenerator(sequenceName="cad_mestre_seq", allocationSize=1, initialValue=1)
     */
    private $id_mestre;

//--------------------------------------------------------------------------------------------------------------------//
    /**
     *@var string $nome
     *
     *@Column(name="nome", type="string", length=50)
     */
    private $nome;

//--------------------------------------------------------------------------------------------------------------------//
    /**
     *@var string $apelido
     *
     *@Column(name="apelido", type="string", length=50)
     */
    private $apelido;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *@var string $telefone
     *
     *@Column(name="telefone", type="string", length=11)
     */
    private $telefone;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *@var string $email
     *
     *@Column(name="email", type="string", length=100)
     */
    private $email;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set nome
     *
     *@param string $nome
     *@return Cad_mestre
     */
    public function setNome($nome)
    {
        $this->nome=$nome;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set apelido
     *
     *@param string $apelido
     *@return Cad_mestre
     */
    public function setApel($apelido)
    {
        $this->apelido=$apelido;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set telefone
     *
     *@param string $tel
     *@return Cad_ave
     */
    public function setTel($tel)
    {
        $this->telefone=$tel;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *Set email
     *
     *@param string $email
     *@return Cad_ave
     */
    public function setEmail($email)
    {
        $this->email=$email;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * Get mestreId
     *
     * @return string
     */
    public function getMestreId(){
        return $this->id_mestre;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * Get mestreApelido
     *
     * @return string
     */
    public function getMestreApel(){
        return $this->apelido;
    }
//--------------------------------------------------------------------------------------------------------------------//

}