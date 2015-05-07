<?php





/**
 * ContagemPorSolEspecie
 *
 * @Table(name="contagem_por_sol_especie")
 * @Entity
 */
class ContagemPorSolEspecie
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="contagem_por_sol_especie_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @Column(name="quantidade", type="integer", nullable=true)
     */
    private $quantidade;

    /**
     * @var \CadEspecie
     *
     * @ManyToOne(targetEntity="CadEspecie")
     * @JoinColumns({
     *   @JoinColumn(name="especie", referencedColumnName="id")
     * })
     */
    private $especie;

    /**
     * @var \ContagemPorSol
     *
     * @ManyToOne(targetEntity="ContagemPorSol")
     * @JoinColumns({
     *   @JoinColumn(name="contagem_ps", referencedColumnName="id")
     * })
     */
    private $contagemPs;



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
     * Set quantidade
     *
     * @param integer $quantidade
     * @return ContagemPorSolEspecie
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    /**
     * Get quantidade
     *
     * @return integer 
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * Set especie
     *
     * @param \CadEspecie $especie
     * @return ContagemPorSolEspecie
     */
    public function setEspecie(\CadEspecie $especie = null)
    {
        $this->especie = $especie;

        return $this;
    }

    /**
     * Get especie
     *
     * @return \CadEspecie 
     */
    public function getEspecie()
    {
        return $this->especie;
    }

    /**
     * Set contagemPs
     *
     * @param \ContagemPorSol $contagemPs
     * @return ContagemPorSolEspecie
     */
    public function setContagemPs(\ContagemPorSol $contagemPs = null)
    {
        $this->contagemPs = $contagemPs;

        return $this;
    }

    /**
     * Get contagemPs
     *
     * @return \ContagemPorSol 
     */
    public function getContagemPs()
    {
        return $this->contagemPs;
    }
}
