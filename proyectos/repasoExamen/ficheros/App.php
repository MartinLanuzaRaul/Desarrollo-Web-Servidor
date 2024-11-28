<?php

class App
{

    public function run()
    {
        if (isset($_GET['method'])) {
            $method = $_GET['method'];
        } else {
            $method = 'home';
        }
        $this->$method();
    }


    public function home()
    {
        include("views/home.php");
    }

    public function anyadirProducto(){

        $file = fopen("fichero.txt", "a");

        if($file){
            fwrite($file, $_POST['producto'] . "\n");

            echo "Producto escrito";

        }fclose($file);

        include("views/home.php");    
    }

    
    
  

    
}
