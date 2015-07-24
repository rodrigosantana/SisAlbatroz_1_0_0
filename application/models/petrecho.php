<?php

/**
 * Petrecho
 *
 * @Table(name="ec_petrecho")
 * @Entity
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="tipo", type="string")
 * @DiscriminatorMap({"petrecho_espinhel" = "PetrechoEspinhel", "petrecho_linha_mao" = "PetrechoLinhaMao", "petrecho_cerco" = "PetrechoCerco", "petrecho_emalhe" = "PetrechoEmalhe", "petrecho_arrasto" = "PetrechoArrasto", "petrecho_vara_isca_viva" = "PetrechoVaraIscaViva"})
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