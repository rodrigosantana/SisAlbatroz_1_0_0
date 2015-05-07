<?php 
    $CI = &get_instance();
    $message = str_replace("<p>", "", $message);
    $message = str_replace("</p>", "", $message);
    
    $messageView = $CI->load->view('errors_message/' . $message, array(), true);
    
    echo $CI->load->view('themes/sisalbatroz_template', array('output'=>$messageView), true);
?>