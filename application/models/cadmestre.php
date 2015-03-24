<?php




/**
 * CadMestre
 *
 * @Table(name="cad_mestre")
 * @Entity
 */
class CadMestre
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
     * @Column(name="apelido", type="string", length=20, nullable=true)
     */
    private $apelido;

    /**
     * @var string
     *
     * @Column(name="telefone", type="string", length=11, nullable=true)
     */
    private $telefone;

    /**
     * @var string
     *
     * @Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @var integer
     *
     * @Column(name="id_mestre", type="integer")
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="cad_mestre_id_mestre_seq", allocationSize=1, initialValue=1)
     */
    private $idMestre;



    /**
     * Set nome
     *
     * @param string $nome
     * @return CadMestre
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
     * Set apelido
     *
     * @param string $apelido
     * @return CadMestre
     */
    public function setApelido($apelido)
    {
        $this->apelido = $apelido;
    
        return $this;
    }

    /**
     * Get apelido
     *
     * @return string 
     */
    public function getApelido()
    {
        return $this->apelido;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     * @return CadMestre
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
     * Set email
     *
     * @param string $email
     * @return CadMestre
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
     * Get idMestre
     *
     * @return integer 
     */
    public function getIdMestre()
    {
        return $this->idMestre;
    }
}