<?php
/*
foreach($_GET as $nombre_variable => $valor_variable){

    echo $nombre_variable."=".$valor_variable."</br>";
    
} */
require_once('app/Class/'.$_GET['url'].'.php');
if(isset($_GET['url'])){
    if(count($_GET) == 1){
        $dato=new Api();
       header("Content-Type: application/json");
       echo  $dato->Api();
    }elseif(count($_GET) == 2){
        $dato = new Api();
        $i=0;
        foreach($_GET as $nombre_variable => $valor_variable){
            $parametros = array(
                $i => array(
                    "parametro" => $nombre_variable,
                    "valor" => $valor_variable
                )
            );
            
        }
        header("Content-Type: application/json");
        echo  $dato->ApiParametro($parametros[0]["parametro"],$parametros[0]["valor"]);
    }elseif(count($_GET) > 2){
        $dato = new Api();
        $parametros = array();
        foreach($_GET as $nombre_variable => $valor_variable){
            array_push($parametros,array(
                    "parametro" => $nombre_variable,
                    "valor" => $valor_variable

              )
            );

        }//print_r($parametros);
        header("Content-Type: application/json");
        echo  $dato->ApiMultiParametro($_GET['url'],$parametros);
    }
} 

/*
require_once('app/Class/'.$_GET['url'].'.php');
if(isset( $_GET['url'])){
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
       $dato=new Api();
       header("Content-Type: application/json");
       echo  $dato->api();
    }
}else{

}*/

?>