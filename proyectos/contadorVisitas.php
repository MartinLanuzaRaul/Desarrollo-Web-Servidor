<?php

if(!isset($_COOKIE["visitas"])){
    //El usuario se ha metido por primera vez a la página.
    setcookie("visitas", "1", time()+3600*24);
    echo "Página visitada por primera vez";
}else{
    //El usuario se ha metido varias veces a la página. 
    $visitas = (int)$_COOKIE["visitas"];
    $visitas++;
    setcookie("visitas", $visitas, time()+3600*24);
    echo "Página visitada " . $visitas . " veces.";
}
if (isset($_GET['boton']) !="")  {
    setcookie("visitas", "0", time()+3600*24);

}

?>
<html>
    <head>
        
    </head>
    <body>
        <form action="" method="get">
            <input type="submit" name="boton" value="Resetear">
        </form>


    </body>
</html>