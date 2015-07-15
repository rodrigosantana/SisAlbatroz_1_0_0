<?php
/**
 * ContagemPorSol
 *
 * @Table(name="contagem_por_sol_indice")
 * @Entity
 */
class ContagemPorSolIndice
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="contagem_por_sol_indice_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @Column(name="indice", type="integer", nullable=true)
     */
    private $indice;

    /**
     * @var \DateTime
     *
     * @Column(name="hora", type="time", nullable=true)
     */
    private $hora;

    /**
     * @var integer
     *
     * @Column(name="total", type="integer", nullable=true)
     */
    private $total;

    /**
     * @var \ContagemPorSol
     *
     * @ManyToOne(targetEntity="ContagemPorSol")
     * @JoinColumns({
     *   @JoinColumn(name="contagem_por_sol", referencedColumnName="id")
     * })
     */
    private $contagemPorSol;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     * @OneToMany(targetEntity="ContagemPorSolEspecie", mappedBy="contagemPsi", cascade={"all"})
     */
    private $contagemPorSolEspecie;
    
    public function __construct() {
        $this->contagemPorSolEspecie = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Set indice
     *
     * @param integer $indice
     * @return ContagemPorSol
     */
    public function setIndice($indice)
    {
        $this->indice = $indice;

        return $this;
    }

    /**
     * Get indice
     *
     * @return integer 
     */
    public function getIndice()
    {
        return $this->indice;
    }

    /**
     * Set hora
     *
     * @param \DateTime $hora
     * @return ContagemPorSol
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime 
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set total
     *
     * @param integer $total
     * @return ContagemPorSol
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return integer 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set contagemPorSol
     *
     * @param \ContagemPorSol $contagemPorSol
     * @return ContagemPorSolEspecie
     */
    public function setContagemPorSol(\ContagemPorSol $contagemPorSol = null)
    {
        $this->contagemPorSol = $contagemPorSol;

        return $this;
    }

    /**
     * Get contagemPorSol
     *
     * @return \ContagemPorSol
     */
    public function getContagemPorSol()
    {
        return $this->contagemPorSol;
    }
    
    public function addContagemPorSolEspecie(ContagemPorSolEspecie $contagemPorSolEspecie) {
        $contagemPorSolEspecie->setContagemPsi($this);
        $this->contagemPorSolEspecie[] = $contagemPorSolEspecie;
        return $this;
    }
    
    public function getContagemPorSolEspecie() {
        return $this->contagemPorSolEspecie;
    }
}
