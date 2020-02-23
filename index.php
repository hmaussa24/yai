<?php
require_once('app/Class/'.$_GET['url'].'.php');
if(isset( $_GET['url'])){
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
       $dato=new Api();
       header("Content-Type: application/json");
       echo  $dato->api();
    }
}else{

}

?>