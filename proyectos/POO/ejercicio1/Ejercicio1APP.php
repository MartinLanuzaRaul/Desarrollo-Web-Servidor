<?php

class Ejercicio1APP
{

  public function run()
  {
    if (isset($_GET['method'])) {
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


    include("views/potencias2.php");
  }

  public function primos()
  {
    include("views/primos.php");
  }

  public function funcionPotencias()
  {
    $i = 0;
    for ($i; $i < 24; $i++) {
      $numeroElevado = pow(2, $i);
      echo $numeroElevado . "<br>";
    }
  }

  public function funcionPrimos()
  {
    for ($i = 0; $i < 10000; $i++) {
      if($this->esPrimo($i) == true){
        echo $i . "<br>";
      }
    }
  }

  private function esPrimo($num){
    $esPrimo = true;
    $contador = 0;
    for($i = 1; $i <= $num ; $i++){
      if($num %  $i == 0){
        $contador++;
      }
      if($contador == 2){
        $esPrimo = true;
      }else{
        $esPrimo = false;
      }
      return $esPrimo;
    }
  /*  $esPrimo = true;
    for($i = 2 ; $i < $num-1 ; $i++){
      if($num % $i == 0){
        $esPrimo = false;
      }else{
        $esPrimo = true;
      }
    }
    return $esPrimo;*/
    
  }
}