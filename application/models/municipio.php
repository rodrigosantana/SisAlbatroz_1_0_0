<?php

/**
 * @Table(name="municipio")
 * @Entity
 */
class Municipio {
    /**
     *@var integer $id
     *
     *@Column(name="id", type="integer")
     *@Id
     *@GeneratedValue(strategy="SEQUENCE")
     *@SequenceGenerator(sequenceName="municipio_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     *@var string $nome
     *
     *@Column(name="nome", type="string", length=150)
     */
    private $nome;
    
    /**
     *@var string $uf
     *
     *@Column(name="uf", type="string", length=3)
     */
    private $uf;
    
    /**
     *@var integer $codigoIbge
     *
     *@Column(name="codigo_ibge", type="integer")
     */
    private $codigoIbge;
    
    public function getId() {
        return $this->id;
    }
    
    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    public function getNome() {
        return $this->nome;
    }
    
    public function setUf($uf) {
        $this->uf = $uf;
    }
    
    public function getUf() {
        return $this->uf;
    }
    
    public function setCodigoIbge($codigoIbge) {
        $this->codigoIbge = $codigoIbge;
    }
    
    public function getCodgigoIbge() {
        return $this->codigoIbge;
    }
    
    public function __toString() {
        return $this->nome . '(' . $this->uf . ')';
    }
}
