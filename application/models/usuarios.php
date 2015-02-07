<?php
/**
 * Created by PhpStorm.
 * User: Santoro
 * Date: 29/01/2015
 * Time: 23:46
 */

/**
 * @Table(name="usuarios")
 * @Entity
 */
class Usuarios {
    /**
    *@var integer $id_user
    *
    *@Column(name="id_user", type="integer")
    *@Id
    *@GeneratedValue(strategy="SEQUENCE")
    *@SequenceGenerator(sequenceName="user_id_seq", allocationSize=1, initialValue=1)
    */
    private $id_user;

    /**
    *@var string $base
    *
    *@Column(name="base", type="string", length=50)
    */
    private $base;

    /**
     * Get base
     *
     *@return string
     */
    public function getBase()
    {
        return $this->base;
    }

}