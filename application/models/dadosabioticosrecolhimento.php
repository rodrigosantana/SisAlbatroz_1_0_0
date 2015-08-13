<?php

/**
 * @Entity
 */
class DadosAbioticosRecolhimento extends DadosAbioticosComplementar {
    public function toArray() {
        $data = parent::toArray();
        $data['tipo'] = 2;
        return $data;
    }    
}
