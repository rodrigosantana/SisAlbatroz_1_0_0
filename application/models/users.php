<?php

/**
 * @Table(name="users")
 * @Entity
 */
class Users {

    /**
     * @var integer $id_users
     *
     * @Column(name="id_users", type="integer")
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="users_seq", allocationSize=1, initialValue=1)
     */
    private $id_users;

//--------------------------------------------------------------------------------------------------------------------//
    /**
     * @var string $nome
     *
     * @Column(name="nome", type="string", length=50)
     */
    private $nome;

//--------------------------------------------------------------------------------------------------------------------//
    /**
     * @var string $base
     *
     * @Column(name="base", type="string", length=30)
     */
    private $base;

//--------------------------------------------------------------------------------------------------------------------//
    /**
     * @var string $email
     *
     * @Column(name="email", type="string", length=100)
     */
    private $email;

//--------------------------------------------------------------------------------------------------------------------//
    /**
     * @var string $skype
     *
     * @Column(name="skype", type="string", length=50)
     */
    private $skype;

//--------------------------------------------------------------------------------------------------------------------//
    /**
     * @var string $senha
     *
     * @Column(name="senha", type="string", length=50)
     */
    private $senha;

//--------------------------------------------------------------------------------------------------------------------//
    /**
     *Set nome
     *
     *@param string $nome
     *@return Users
     */
    public function setNome($nome)
    {
        $this->nome=$nome;
        return $this;
    }

//--------------------------------------------------------------------------------------------------------------------//
    /**
     *Set base
     *
     *@param string $base
     *@return Users
     */
    public function setBase($base)
    {
        $this->base=$base;
        return $this;
    }

//--------------------------------------------------------------------------------------------------------------------//
    /**
     *Set email
     *
     *@param string $email
     *@return Users
     */
    public function setEmail($email)
    {
        $this->email=$email;
        return $this;
    }

//--------------------------------------------------------------------------------------------------------------------//
    /**
     *Set skype
     *
     *@param string $skype
     *@return Users
     */
    public function setSkype($skype)
    {
        $this->skype=$skype;
        return $this;
    }

//--------------------------------------------------------------------------------------------------------------------//
    /**
     *Set senha
     *
     *@param string $senha
     *@return Users
     */
    public function setSenha($senha)
    {
        $this->senha=$senha;
        return $this;
    }

}