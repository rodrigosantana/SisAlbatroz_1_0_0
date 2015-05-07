<?php

/**
 * @Entity
 */
class DadosAbioticosLancamento extends DadosAbioticosComplementar {
    
    /**
     * @OneToOne(targetEntity="DadosAbioticos", mappedBy="dadosAbioticosLancamento")
     **/
//    private $dadosAbioticos;
//    
//    public function setDadosAbioticos($value) {
//        $this->dadosAbioticos = $value;
//    }
//    
//    public function getDadosAbioticos() {
//        return $this->dadosAbioticos;
//    }
    
}
