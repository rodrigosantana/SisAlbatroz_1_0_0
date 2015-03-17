<?php

// Criação da entidade para a tabela de aves

/**
 * @Table(name="autoriz_pesca")
 * @Entity
 */
class AutorizPesca {

    // Definindo as varáveis da tabela e suas propriedade
    /**
     *@var integer $id_auto_pesca
     *
     *@Column(name="id_auto_pesca", type="integer")
     *@Id
     *@GeneratedValue(strategy="SEQUENCE")
     *@SequenceGenerator(sequenceName="auto_pesca_seq", allocationSize=1, initialValue=1)
     */
    private $id_auto_pesca;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *@var string $modalidade
     *
     *@Column(name="modalidade", type="string", length=9)
     */
    private $modalidade;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *@var string $descricao
     *
     *@Column(name="descricao", type="string", length=150)
     */
    private $descricao;
//--------------------------------------------------------------------------------------------------------------------//

    // Definindo funções para as variáveis da tabela
    /**
     * Get modalidade
     *
     *@return string
     */
    public function getModalidade()
    {
        return $this->modalidade;
    }
//--------------------------------------------------------------------------------------------------------------------//

    // Definindo funções para as variáveis da tabela
    /**
     * Get descricao
     *
     *@return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }
//--------------------------------------------------------------------------------------------------------------------//

}