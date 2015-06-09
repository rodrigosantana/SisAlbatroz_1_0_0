<?php 
    $CI = &get_instance();
    $message = str_replace("<p>", "", $message);
    $message = str_replace("</p>", "", $message);
    
    if (file_exists(dirname(dirname(__FILE__)) . '/views/errors_message/' . $message . '.php')) {
        $messageView = $CI->load->view('errors_message/' . $message, array(), true);
    } else {
        $messageView = $CI->load->view('errors_message/default_error_message', array('message'=>$message), true);
    }
    
    echo $CI->load->view('themes/sisalbatroz_template', array('output'=>$messageView), true);
?>