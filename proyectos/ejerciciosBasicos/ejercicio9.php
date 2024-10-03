<?php
$equipo = [];
    $equipo[] = "Juan";
    $equipo[1] = "Isra";
    $equipo[2] = "Javier";
    $equipo[3] = "Pau";
    $equipo[4] = "DeBruyne";

    foreach($equipo as $jugador){
        echo $jugador . "<br>";
    }
    foreach($equipo as $numero => $jugador){
        echo $numero . $jugador . "<br>";
    }