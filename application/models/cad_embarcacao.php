<?php
/**
 * @Table(name="cad_embarcacao")
 * @Entity
 */
class Cad_embarcacao {

    /**
     *@var integer $id_embarcacao
     *
     *@Column(name="id_embarcacao", type="integer")
     *@Id
     *@GeneratedValue(strategy="SEQUENCE")
     *@SequenceGenerator(sequenceName="cad_embarcacao_seq", allocationSize=1, initialValue=1)
     */
    private $id_embarcacao;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *@var string $nome
     *
     *@Column(name="nome", type="string", length=50)
     */
    private $nome;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *@var string $auto_pesca
     *
     *@Column(name="autorizacao_pesca", type="string", length=150)
     */
    private $auto_pesca;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *@var string $reg_marinha
     *
     *@Column(name="reg_marinha", type="string", length=30)
     */
    private $reg_marinha;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *@var string $reg_mpa
     *
     *@Column(name="reg_mpa", type="string", length=30)
     */
    private $reg_mpa;
//--------------------------------------------------------------------------------------------------------------------//
//TODO rever o tipo de var (numeric)
    /**
     *@var string $comprimento
     *
     *@Column(name="comprim_barco", type="decimal")
     */
    private $comprimento;
//--------------------------------------------------------------------------------------------------------------------//
//TODO rever o tipo de var (numeric)
    /**
     *@var string $arq_bruta
     *
     *@Column(name="arqueacao_bruta", type="string", length=2)
     */
    private $arq_bruta;
//--------------------------------------------------------------------------------------------------------------------//
//TODO rever o tipo de var (int)
    /**
     *@var string $ano_fab
     *
     *@Column(name="ano_fabricacao", type="string", length=50)
     */
    private $ano_fab;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *@var string $mat_casco
     *
     *@Column(name="mat_casco", type="string", length=10)
     */
    private $mat_casco;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *@var string $propulsao
     *
     *@Column(name="propulsao", type="string", length=10)
     */
    private $propulsao;
//--------------------------------------------------------------------------------------------------------------------//
//TODO rever o tipo da var, como inserir numérica
    /**
     *@var string $pot_motor
     *
     *@Column(name="potencia_motor", type="string", length=2)
     */
    private $pot_motor;
//--------------------------------------------------------------------------------------------------------------------//
//TODO rever o tipo de var (int)
    /**
     *@var string $tripulacao
     *
     *@Column(name="tripulacao", type="string", length=50)
     */
    private $tripulacao;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *@var string $municipio
     *
     *@Column(name="municipio", type="string", length=20)
     */
    private $municipio;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     *@var string $uf
     *
     *@Column(name="uf", type="string", length=3)
     */
    private $uf;
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * set nome
     *
     * @param string $nome
     * @return Cad_embarcacao
     */
    public function setNome($nome){
        $this->nome=$nome;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * set autorizacao_pesca
     *
     * @param string $auto_pesca
     * @return Cad_embarcacao
     */
    public function setAutoPesca($auto_pesca){
        $this->auto_pesca=$auto_pesca;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * set reg_marinha
     *
     * @param string $reg_marinha
     * @return Cad_embarcacao
     */
    public function setRegMarinha($reg_marinha){
        $this->reg_marinha=$reg_marinha;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * set reg_mpa
     *
     * @param string $reg_mpa
     * @return Cad_embarcacao
     */
    public function setRegMpa($reg_mpa){
        $this->reg_mpa=$reg_mpa;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * set comprimento
     *
     * @param string $comprimento
     * @return Cad_embarcacao
     */
    public function setComprimento($comprimento){
        $this->comprimento=$comprimento;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * set arqueacao_bruta
     *
     * @param string $arq_bruta
     * @return Cad_embarcacao
     */
    public function setArqBruta($arq_bruta){
        $this->arq_bruta=$arq_bruta;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * set ano_fabricacao
     *
     * @param string $ano_fab
     * @return Cad_embarcacao
     */
    public function setAnoFab($ano_fab){
        $this->ano_fab=$ano_fab;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * set mat_casco
     *
     * @param string $mat_casco
     * @return Cad_embarcacao
     */
    public function setMatCasco($mat_casco){
        $this->mat_casco=$mat_casco;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * set propulsao
     *
     * @param string $propulsao
     * @return Cad_embarcacao
     */
    public function setPropulsao($propulsao){
        $this->propulsao=$propulsao;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * set potencia_motor
     *
     * @param string $pot_motor
     * @return Cad_embarcacao
     */
    public function setPotMotor($pot_motor){
        $this->pot_motor=$pot_motor;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * set tripulacao
     *
     * @param string $tripulacao
     * @return Cad_embarcacao
     */
    public function setTripulacao($tripulacao){
        $this->tripulacao=$tripulacao;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * set municipio
     *
     * @param string $municipio
     * @return Cad_embarcacao
     */
    public function setMunicipio($municipio){
        $this->municipio=$municipio;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * set uf
     *
     * @param string $uf
     * @return Cad_embarcacao
     */
    public function setUf($uf){
        $this->uf=$uf;
        return $this;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * Get Embarcacao Id
     *
     * @return string
     */
    public function getEmbarcacaoId(){
        return $this->id_embarcacao;
    }
//--------------------------------------------------------------------------------------------------------------------//

    /**
     * Get Embarcacao Nome
     *
     * @return string
     */
    public function getEmbarcacaoNome(){
        return $this->nome;
    }
//--------------------------------------------------------------------------------------------------------------------//

}