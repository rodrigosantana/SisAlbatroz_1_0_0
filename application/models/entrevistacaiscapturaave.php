<?php

/**
 * EntrevistaCaisCapturaAve
 *
 * @Table(name="entrevista_cais_captura_ave")
 * @Entity
 */
class EntrevistaCaisCapturaAve {

    /**
     * @var integer
     *
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="entrevista_cais_captura_ave_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @Column(name="quantidade", type="integer")
     */
    private $quantidade;

    /**
     * @var Especie
     *
     * @ManyToOne(targetEntity="Ave")
     * @JoinColumns({
     *   @JoinColumn(name="especie", referencedColumnName="id")
     * })
     */
    private $especie;
    
    /**
     * @var EntrevistaCais
     *
     * @ManyToOne(targetEntity="EntrevistaCais")
     * @JoinColumns({
     *   @JoinColumn(name="entrevista_cais", referencedColumnName="id")
     * })
     */
    private $entrevistaCais;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    function getEntrevistaCais() {
        return $this->entrevistaCais;
    }

    function setEntrevistaCais(EntrevistaCais $entrevistaCais) {
        $this->entrevistaCais = $entrevistaCais;
    }
    
    function getQuantidade() {
        return $this->quantidade;
    }

    function getEspecie() {
        return $this->especie;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    function setEspecie(Ave $especie = null) {
        $this->especie = $especie;
    }



}
