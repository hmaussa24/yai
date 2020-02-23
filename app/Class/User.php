<?php
require 'vendor/autoload.php';
require 'app/Database/DataBase.php';
 use Illuminate\Support\Facades\DB;
 use App\modelo\User;
 class Api{
   public function Api(){            
       $datos = User::get();
       return json_encode(array('datos' => $datos), JSON_PRETTY_PRINT);
   }            
}