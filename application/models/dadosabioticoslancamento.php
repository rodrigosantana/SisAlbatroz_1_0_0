<?php

/**
 * @Entity
 */
class DadosAbioticosLancamento extends DadosAbioticosComplementar {
    
    public function toArray() {
        $data = parent::toArray();
        $data['tipo'] = 1;
        return $data;
    }
    
}
