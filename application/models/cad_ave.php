<?php

// Criação da entidade para a tabela de aves

/**
 * @Table(name="cad_aves")
 * @Entity
 */
class Cad_ave {

    // Definindo as varáveis da tabela e suas propriedade
    /**
     *@var integer $id_aves
     *
     *@Column(name="id_aves", type="integer")
     *@Id
     *@GeneratedValue(strategy="SEQUENCE")
     *@SequenceGenerator(sequenceName="cad_aves_seq", allocationSize=1, initialValue=1)
     */
    private $id_aves;

    /**
     *@var string $nome_br
     *
     *@Column(name="nome_comum_br", type="string", length=50)
     */
    private $nome_br;

    /**
    *@var string $nome_en
    *
    *@Column(name="nome_comum_en", type="string", length=50)
    */
    private $nome_en;

    /**
    *@var string $nome_cient
    *
    *@Column(name="nome_cientifico", type="string", length=50)
    */
    private $nome_cient;

    // Definindo funções para as variáveis da tabela
    /**
     * Get id_aves
     *
     *@return integer
     */
    public function getId_aves()
    {
        return $this->id_aves;
    }

    /**
     *Set nome_comum_br
     *
     *@param string $nome_br
     *@return Cad_ave
     */
    public function setNomeBr($nome_br)
    {
        $this->nome_br=$nome_br;
        return $this;
    }

    /**
     *Set nome_comum_en
     *
     *@param string $nome_en
     *@return Cad_ave
     */
    public function setNomeEn($nome_en)
    {
        $this->nome_en=$nome_en;
        return $this;
    }

    /**
     *Set nome_cientifico
     *
     *@param string $nome_cient
     *@return Cad_ave
     */
    public function setNomeCient($nome_cient)
    {
        $this->nome_cient=$nome_cient;
        return $this;
    }

    /**
     * Get ave
     *
     *@return string
     */
    public function getAve()
    {
        return $this->nome_br;
    }


}