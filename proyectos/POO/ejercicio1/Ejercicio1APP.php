<?php

class Ejercicio1APP
{

    public function run(){
        if (isset($_GET['method'])){
          $method = $_GET['method'];
        } else {
          $method = 'index';
        }
        $this->$method();
      }
    
    
      public function index()
      {
        include("views/index.php");
        
      }

      public function factorial()
      {
        include("views/factorial.php");
        
      }

      public function fibonacci()
      {
        include("views/fibonacci.php");
        
      }

      public function potencias()
      {
        include("views/potencias.php");
        
      }

      public function primos()
      {
        include("views/primos.php");
        
      }


}
