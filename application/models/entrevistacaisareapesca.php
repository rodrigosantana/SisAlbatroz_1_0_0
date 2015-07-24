<?php

/**
 * EntrevistaCaisAreaPesca
 *
 * @Table(name="ec_area_pesca")
 * @Entity
 */
class EntrevistaCaisAreaPesca {

    /**
     * @var string
     *
     * @Column(name="nome", type="string", length=150, nullable=false)
     */
    private $nome;

    /**
     * @var integer
     *
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="entrevista_cais_area_pesca_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @Column(name="profundidade_inicial", type="integer")
     */
    private $profundidadeInicial;

    /**
     * @var integer
     *
     * @Column(name="profundidade_final", type="integer")
     */
    private $profundidadeFinal;

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
     * Set nome
     *
     * @param string $nome
     * @return Porto
     */
    public function setNome($nome) {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    function getProfundidadeInicial() {
        return $this->profundidadeInicial;
    }

    function getProfundidadeFinal() {
        return $this->profundidadeFinal;
    }

    function getEntrevistaCais() {
        return $this->entrevistaCais;
    }

    function setProfundidadeInicial($profundidadeInicial) {
        $this->profundidadeInicial = $profundidadeInicial;
    }

    function setProfundidadeFinal($profundidadeFinal) {
        $this->profundidadeFinal = $profundidadeFinal;
    }

    function setEntrevistaCais(EntrevistaCais $entrevistaCais) {
        $this->entrevistaCais = $entrevistaCais;
    }


}
