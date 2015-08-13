<?php

/**
 * ContagemAveBoiaEspecie
 *
 * @Table(name="cr_contagem_ave_boia_especie")
 * @Entity
 */
class ContagemAveBoiaEspecie
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="contagem_ave_boia_especie_seq", allocationSize=1, initialValue=1)
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
     * @var \ContagemAveBoia
     *
     * @ManyToOne(targetEntity="ContagemAveBoia")
     * @JoinColumns({
     *   @JoinColumn(name="contagem_ave_boia", referencedColumnName="id")
     * })
     */
    private $contagemAveBoia;



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
     * @return ContagemAveBoiaEspecie
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
     * @return ContagemAveBoiaEspecie
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
     * Set contagemAveBoia
     *
     * @param \ContagemAveBoia $contagemAveBoia
     * @return ContagemAveBoiaEspecie
     */
    public function setContagemAveBoia(\ContagemAveBoia $contagemAveBoia = null)
    {
        $this->contagemAveBoia = $contagemAveBoia;

        return $this;
    }

    /**
     * Get contagemAveBoia
     *
     * @return \ContagemAveBoia 
     */
    public function getContagemAveBoia()
    {
        return $this->contagemAveBoia;
    }
    
    public function toArray() {
        $data = array(
            'id' => $this->id,
            'quantidade' => $this->quantidade,
            'especie' => $this->especie == null ? null : $this->especie->getId(),
            'contagemAveBoia' => $this->contagemAveBoia->getId()
        );
        
        return $data;
    }
}
