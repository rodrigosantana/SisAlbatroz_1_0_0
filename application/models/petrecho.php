<?php

/**
 * Petrecho
 *
 * @Table(name="petrecho")
 * @Entity
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="tipo", type="string")
 * @DiscriminatorMap({"petrecho_espinhel" = "PetrechoEspinhel", "petrecho_linha" = "PetrechoLinha", "petrecho_rede" = "PetrechoRede", "petrecho_rede_pano" = "PetrechoRedePano", "petrecho_arrasto" = "PetrechoArrasto"})
 */
class Petrecho
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="petrecho_seq", allocationSize=1, initialValue=1)
     */
    private $id;

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