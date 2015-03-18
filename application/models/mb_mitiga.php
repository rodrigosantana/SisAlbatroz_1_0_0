<?php

/**
 * @Table(name="mb_mitiga")
 * @Entity
 */
Class Mb_mitiga {

//--------------------------------------------------------------------------------------------------------------------//

    /**
     * @var integer $id_mm
     *
     * @Column(name="id_mm", type="integer")
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="mb_medmit_seq", allocationSize=1, initialValue=1)
     */
    private $id_mm;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * @var integer $id_lance
     *
     * @Column(name="id_lance", type="integer")
     */
    private $id_lance;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * @var string $medmit
     *
     * @Column(name="medida_mitigadora", type="string", length=50)
     */
    private $medmit;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * @Set medida_mitigadora
     *
     * @param string $medmit
     * $return Mb_mitiga
     */
    public function setMedMit($medmit){
        $this->medmit = $medmit;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

}























