<?php



/**
 * CadMedidaMetigatoria
 *
 * @Table(name="cad_medida_metigatoria")
 * @Entity
 */
class CadMedidaMetigatoria
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
     * @Column(name="id_medida_metigatoria", type="integer")
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="cad_medida_metigatoria_seq", allocationSize=1, initialValue=1)
     */
    private $idMedidaMetigatoria;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="MbLance", inversedBy="idMm")
     * @JoinTable(name="mb_mitigatoria",
     *   joinColumns={
     *     @JoinColumn(name="id_mm", referencedColumnName="id_medida_metigatoria")
     *   },
     *   inverseJoinColumns={
     *     @JoinColumn(name="id_lance", referencedColumnName="id_lance")
     *   }
     * )
     */
    private $idLance;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idLance = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Set nome
     *
     * @param string $nome
     * @return CadMedidaMetigatoria
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
     * Get idMedidaMetigatoria
     *
     * @return integer 
     */
    public function getIdMedidaMetigatoria()
    {
        return $this->idMedidaMetigatoria;
    }

    /**
     * Add idLance
     *
     * @param \MbLance $idLance
     * @return CadMedidaMetigatoria
     */
    public function addIdLance(\MbLance $idLance)
    {
        $this->idLance[] = $idLance;
    
        return $this;
    }

    /**
     * Remove idLance
     *
     * @param \MbLance $idLance
     */
    public function removeIdLance(\MbLance $idLance)
    {
        $this->idLance->removeElement($idLance);
    }

    /**
     * Get idLance
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdLance()
    {
        return $this->idLance;
    }
}