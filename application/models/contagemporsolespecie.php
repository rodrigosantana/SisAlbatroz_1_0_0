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
     * @var \Ave
     *
     * @ManyToOne(targetEntity="Ave")
     * @JoinColumns({
     *   @JoinColumn(name="especie", referencedColumnName="id")
     * })
     */
    private $especie;

    /**
     * @var \ContagemPorSolIndice
     *
     * @ManyToOne(targetEntity="ContagemPorSolIndice")
     * @JoinColumns({
     *   @JoinColumn(name="contagem_psi", referencedColumnName="id")
     * })
     */
    private $contagemPsi;



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
     * @param \Ave $especie
     * @return ContagemPorSolEspecie
     */
    public function setEspecie(\Ave $especie = null)
    {
        $this->especie = $especie;

        return $this;
    }

    /**
     * Get especie
     *
     * @return \Ave 
     */
    public function getEspecie()
    {
        return $this->especie;
    }

    /**
     * Set contagemPsi
     *
     * @param \ContagemPorSolIndice $contagemPsi
     * @return ContagemPorSolEspecie
     */
    public function setContagemPsi(\ContagemPorSolIndice $contagemPsi = null)
    {
        $this->contagemPsi = $contagemPsi;

        return $this;
    }

    /**
     * Get contagemPsi
     *
     * @return \ContagemPorSolIndice 
     */
    public function getContagemPsi()
    {
        return $this->contagemPsi;
    }
}
