<?php

class MY_Form_validation extends CI_Form_validation
{
     function __construct($config = array())
     {
          parent::__construct($config);
     }
     
    /**
     * Error Array
     *
     * Returns the error messages as an array
     *
     * @return  array
     */
    function error_array()
    {
        if (count($this->_error_array) === 0)
        {
                return FALSE;
        }
        else
            return $this->_error_array;
 
    }

    function date_validation($str) {
        if ($str === "") {
            return true;
        }
        
        $date = explode("/", $str);
        
        if (count($date) !== 3) {
            $date = explode("-", $str);
            
            if (!checkdate((int)$date[0], (int)$date[1], (int)$date[2])) {
                
            }
        } else if (count($date) !== 3 || !checkdate((int)$date[1], (int)$date[0], (int)$date[2])) {
            return false;
        }
        
        return true;
    }
    
    public function decimal($str)
    {
        if ($str === "") {
            return true;
        }
        
        return (bool) (preg_match('/^[\-+]?[0-9]+\.[0-9]+$/', $str) || preg_match('/^[\-+]?[0-9]+\,[0-9]+$/', $str));
    }
    
    public function integer($str)
    {
        if ($str === "") {
            return true;
        }
        
        return (bool) preg_match('/^[\-+]?[0-9]+$/', $str);
    }
    
    public function in_array() {
        $args = func_get_args();
        $valor = $args[0];
        
        if (empty($valor)) {
            return true;
        }
        
        $args = explode(",", $args[1]);
        if(is_array($valor)){
            $ok = true;
            foreach($valor as $atual){
                $ok = in_array($atual, $args);
                if(!$ok){
                    return false;
                }
            }
            return true;
        }else{
            return in_array($valor, $args);
        }
        
    }
    
    function boolean_validation($str) {
        if (empty($str)) {
            return true;
        }
        
        if (is_numeric($str) && ((int)$str == 0 || (int)$str == 1)) {
            return true;
        }
        
        if ($str === 'true' || $str === 'false') {
            return true;
        }
        
        return false;
    }
}
?>
