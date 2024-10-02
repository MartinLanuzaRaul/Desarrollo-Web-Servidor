<?php
    $cadena = "sometemos";
    $cadenaDevuelta = "";

    $cadena = strtolower($cadena); //Convierte la cadena a todo minusculas
    $cadenaDevuelta = strrev($cadena);

    if($cadena == $cadenaDevuelta){
        echo "La palabra " . $cadena . " es palindromo";
    }else{
        echo "La palabra " . $cadena . " no es palindromo";
    }
   