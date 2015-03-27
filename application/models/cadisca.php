<?php



/**
 * CadIsca
 *
 * @Table(name="cad_isca")
 * @Entity
 */
class CadIsca
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
     * @Column(name="id_isca", type="integer")
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="cad_isca_seq", allocationSize=1, initialValue=1)
     */
    private $idIsca;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="MbLance", inversedBy="idIsca")
     * @JoinTable(name="mb_isca",
     *   joinColumns={
     *     @JoinColumn(name="id_isca", referencedColumnName="id_isca")
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
     * @return CadIsca
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
     * Get idIsca
     *
     * @return integer 
     */
    public function getIdIsca()
    {
        return $this->idIsca;
    }

    /**
     * Add idLance
     *
     * @param \MbLance $idLance
     * @return CadIsca
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