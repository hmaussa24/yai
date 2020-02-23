<?php
require 'vendor/autoload.php';
require 'app/Database/DataBase.php';
 use Illuminate\Support\Facades\DB;
 use App\modelo\Sisben;
 class Api{
   public function Api(){            
       $datos = Sisben::get();
       return json_encode(array('datos' => $datos), JSON_PRETTY_PRINT);
   }            
}