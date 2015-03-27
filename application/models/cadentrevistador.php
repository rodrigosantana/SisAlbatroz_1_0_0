<?php

/**
 * CadEntrevistador
 *
 * @Table(name="cad_entrevistador")
 * @Entity
 */
class CadEntrevistador
{
    /**
     * @var string
     *
     * @Column(name="nome", type="string", length=50, nullable=false)
     */
    private $nome;

    /**
     * @var integer
     *
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="cad_entrevistador_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * Set nome
     *
     * @param string $nome
     * @return CadEntrevistador
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
     * Get idObserv
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}