<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utils
 *
 * @author Dev
 */
class Utils {
    
    const ESPINHEL_SUPERFICIE = 1;
    const ESPINHEL_FUNDO = 2;
    
    const MM_USO_TOTAL = 'TOTAL';
    const MM_USO_PARCIAL = 'PARCIAL';
    
    public static function findIds($field, $model) {
        $CI = &get_instance();
        
        $q = $CI->doctrine->em->createQuery("SELECT r.".$field." FROM ". $model . " r");
        $results = $q->getResult();
        $return = array();
        
        foreach ($results as $r) {
            $return[] = $r[$field];
        }
        
        return implode(",", $return);
    }

	/**
     * Converte data no formato texto para um objeto do tipo DateTime.
     * 
     * @param string $valor Data no formato dd/mm/yyyy.
     * 
     * @return DateTime
     */
    public static function dataToDateTime($data) {
        $valor = explode("/", $data);
        
        if (count($valor) == 3) {
            return new DateTime($valor[2] .'-'. $valor[1] .'-'. $valor[0]);
        } else if (substr_count($data, '-') == 2) {            
            return new DateTime($data);            
        }
        
        return null;
    }

	/**
     * Verifica se o valor enviado via requisi��o � verdadeiro ou falso.
     * 
     * @param string $valor Valor booleano no formato texto.
     * 
     * @return boolean
     */
    public static function valorBooleano($valor) {
        if ($valor === 'true') {
            return true;
        } else if ($valor === 'false') {
            return false;
        }
        
        return null;
    }
    
    /**
     * Verifica se o item existe na lista de objetos.
     * 
     * @param array $lista Lista de objetos.
     * @param integer $id Código do objeto procurado.
     * 
     * @return boolean 
     */
    public static function ischecked($lista, $id, $metodo = '') {
        if (empty($metodo)) {
            $metodo = 'getId';
        }
        
        if (!is_null($lista)) {
            foreach($lista as $objeto) {
                if ($objeto->$metodo() == $id) {
                    return 'checked';
                }
            }
        }
        return '';
    }
}
