<?php
    $a = 0;
    $b = 0;
    $c = 0;
    $array = [];

    function ecuacion ($a, $b, $c){
        $solucionA = -$b + sqrt(($b*$b) - 4 * $a * $c) / 2 * $a;
        $solucionB = -$b - sqrt(($b*$b) - 4 * $a * $c) / 2 * $a;

    

    if ((($b*$b) - 4 * $a * $c)<0){
        $array[] = false;
    } else {
        $array[] = [$solucionA];
        $array[] = [$solucionB];
    }

    return $array;
}

$solucion = [];

$solucion = ecuacion(1, -3, 2);

foreach($solucion as $soluciones){
    echo "La solucion es " . $soluciones[0] . "<br>";
}



