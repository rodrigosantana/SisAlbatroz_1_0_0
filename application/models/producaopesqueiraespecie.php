<?php





/**
 * ProducaoPesqueiraEspecie
 *
 * @Table(name="producao_pesqueira_especie", indexes={@Index(name="IDX_258E1E88FF0814ED", columns={"especie"}), @Index(name="IDX_258E1E88AC05902B", columns={"producao_pesqueira"})})
 * @Entity
 */
class ProducaoPesqueiraEspecie
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="producao_pesqueira_especie_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @Column(name="quantidade", type="integer", nullable=true)
     */
    private $quantidade;

    /**
     * @var string
     *
     * @Column(name="predacao", type="string", length=255, nullable=true)
     */
    private $predacao;

    /**
     * @var \Pescado
     *
     * @ManyToOne(targetEntity="Pescado")
     * @JoinColumns({
     *   @JoinColumn(name="especie", referencedColumnName="id")
     * })
     */
    private $especie;

    /**
     * @var \ProducaoPesqueira
     *
     * @ManyToOne(targetEntity="ProducaoPesqueira")
     * @JoinColumns({
     *   @JoinColumn(name="producao_pesqueira", referencedColumnName="id")
     * })
     */
    private $producaoPesqueira;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set quantidade
     *
     * @param integer $quantidade
     * @return ProducaoPesqueiraEspecie
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    /**
     * Get quantidade
     *
     * @return integer 
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * Set predacao
     *
     * @param string $predacao
     * @return ProducaoPesqueiraEspecie
     */
    public function setPredacao($predacao)
    {
        $this->predacao = $predacao;

        return $this;
    }

    /**
     * Get predacao
     *
     * @return string 
     */
    public function getPredacao()
    {
        return $this->predacao;
    }

    /**
     * Set especie
     *
     * @param \Pescado $especie
     * @return ProducaoPesqueiraEspecie
     */
    public function setEspecie(\Pescado $especie = null)
    {
        $this->especie = $especie;

        return $this;
    }

    /**
     * Get especie
     *
     * @return \Pescado 
     */
    public function getEspecie()
    {
        return $this->especie;
    }

    /**
     * Set producaoPesqueira
     *
     * @param \ProducaoPesqueira $producaoPesqueira
     * @return ProducaoPesqueiraEspecie
     */
    public function setProducaoPesqueira(\ProducaoPesqueira $producaoPesqueira = null)
    {
        $this->producaoPesqueira = $producaoPesqueira;

        return $this;
    }

    /**
     * Get producaoPesqueira
     *
     * @return \ProducaoPesqueira 
     */
    public function getProducaoPesqueira()
    {
        return $this->producaoPesqueira;
    }
}
