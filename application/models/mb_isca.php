<?php

/**
 * @Table(name="mb_isca")
 * @Entity
 */
Class Mb_isca {

//--------------------------------------------------------------------------------------------------------------------//

    /**
     * @var integer $id_isca
     *
     * @Column(name="id_isca", type="integer")
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="mb_isca_seq", allocationSize=1, initialValue=1)
     */
    private $id_isca;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * @var integer $id_lance
     *
     * @Column(name="id_lance", type="integer")
     */
    private $id_lance;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * @var string $isca
     *
     * @Column(name="isca", type="string", length=50)
     */
    private $isca;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * @Set isca
     *
     * @param string $isca
     * $return Mb_isca
     */
    public function setIsca($isca){
        $this->isca = $isca;
        return $this;
    }


}























