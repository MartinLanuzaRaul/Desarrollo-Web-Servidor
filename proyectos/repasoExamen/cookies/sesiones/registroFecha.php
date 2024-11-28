<?php

if(!isset($_COOKIE["fecha"])){
    //El usuario se ha metido por primera vez a la página.
    $fecha = date("Y/m/d");
    $hora = date("h:i:sa");
    $fechaYHora = $fecha . " " . $hora;

    setcookie("fecha", $fechaYHora, time()+3600*24);
    echo "Página visitada por primera vez";
}else{
    //El usuario se ha metido varias veces a la página. 
    $fechaYHora = (string)$_COOKIE["fecha"];

    $fecha = date("Y/m/d");
    $hora = date("h:i:sa");
    $fechaYHora = $fecha . " " . $hora;
    setcookie("fecha", $fechaYHora, time()+3600*24);
    echo 'La ultima vez que visitaste la pagina fue en ' . $_COOKIE["fecha"];
}


?>
<html>
    <head>
        
    </head>
    <body>
        


    </body>
</html>