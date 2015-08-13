<?php

/**
 * Porto
 *
 * @Table(name="cad_porto")
 * @Entity
 */
class Porto
{
    /**
     * @var string
     *
     * @Column(name="nome", type="string", length=150, nullable=false)
     */
    private $nome;

    /**
     * @var integer
     *
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="porto_seq", allocationSize=1, initialValue=1)
     */
    private $id;



    /**
     * Set nome
     *
     * @param string $nome
     * @return Porto
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}