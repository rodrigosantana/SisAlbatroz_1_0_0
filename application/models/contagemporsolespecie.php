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
     * @var \CadAves
     *
     * @ManyToOne(targetEntity="CadAves")
     * @JoinColumns({
     *   @JoinColumn(name="especie", referencedColumnName="id_aves")
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
     * @param \CadAves $especie
     * @return ContagemPorSolEspecie
     */
    public function setEspecie(\CadAves $especie = null)
    {
        $this->especie = $especie;

        return $this;
    }

    /**
     * Get especie
     *
     * @return \CadAves 
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
