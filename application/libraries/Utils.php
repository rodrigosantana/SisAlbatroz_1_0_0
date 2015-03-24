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
        
        $q = $CI->doctrine->em->createQuery("SELECT r.'.$field.' FROM ". $model);
        $results = $q->getResult();
        $return = array();
        
        foreach ($results as $r) {
            $return[] = $r[$field];
        }
        
        return implode(",", $return);
    }
}
