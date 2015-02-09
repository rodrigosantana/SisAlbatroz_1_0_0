<?php
# LEMBRETE: Necessario editar
# todo o arquivo conforme a estrutura do BD.

/**
 * @Table(name="mb_geral")
 * @Entity
 */
class Cad_ave {
    /**
     *@var integer $id_mb
     *
     *@Column(name="id_mb", type="integer")
     *@Id
     *@GeneratedValue(strategy="SEQUENCE")
     *@SequenceGenerator(sequenceName="mb_id_seq", allocationSize=1, initialValue=1)
     */
    private $id_mb;

    /**
     *@var string $barco
     *
     *@Column(name="barco", type="string", length=50)
     */
    private $barco;

//    /**
//    *@var string $mestre
//    *
//    *@Column(name="mestre", type="string", length=50)
//    */
//    private $mestre;

    /**
     * Get id_mb
     *
     *@return string
     */
    public function getId_mb()
    {
        return $this->id_mb;
    }

    /**
     *Set barco
     *
     *@param string $barco
     *@return Mapa_bordo
     */
    public function setBarco($barco)
    {
        $this->barco = $barco;
        return $this;
    }

    /**
     * Get barco
     *
     *@return string
     */
    public function getBarco()
    {
        return $this->barco;
    }


}