<?php
$response = array();
if(isset($erro) && $erro !== false){
    $response["status"] = "errors";
    $response["errors"] = $erro;
}else if(isset($erroNaoEsperado)){
    $response["status"] = "erroNaoEsperado";
}else{
    $response["status"] = "ok";
    if(isset($mensagem)){
        $response["mensagem"] = $mensagem;
    }
    if(isset($destino)){
        $response["destino"] = $destino;
    }
    if(isset($data)){
        $response["data"] = $data;
    }
    if(isset($codigo)){
        $response["codigo"] = $codigo;
    }
    if(isset($reload)){
        $response["reload"] = $reload;
    }
    if(isset($alerta)){
        $response["alerta"] = $alerta;
    }
    if(isset($registronaoencontrado)){
        $response["registronaoencontrado"] = $registronaoencontrado;
    }    
    if(isset($dadosnaoencontrados)){
        $response["dadosnaoencontrados"] = $dadosnaoencontrados;
    }
    if(isset($regsubnaoencontrado)){
        $response["regsubnaoencontrado"] = $regsubnaoencontrado;
    }
    
}
echo json_encode($response);
?>
