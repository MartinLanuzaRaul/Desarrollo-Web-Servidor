<?php

 function anyadirProducto(){

    $file = fopen("fichero.txt", "a");

    if($file){
        fwrite($file, $_POST['producto'] . "<br>");

        echo "Producto escrito";

    }fclose($file);

    include("views/home.php");    
}

 function mostrarProductos(){

    $file = fopen("fichero.txt", "r");

    if($file){
        $content = fread($file, filesize("fichero.txt"));
    }
    fclose($file);

    include("views/home.php");    
}
