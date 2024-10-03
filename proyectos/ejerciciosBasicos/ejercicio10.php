<?php
$equipo = [];
    $jugador = array (
        "nombre" => "Juan",
        "posicion" => "base"
    );

    $jugador1 = array (
        "nombre" => "Isra",
        "posicion" => "escolta"
    );

    $jugador2 = array (
        "nombre" => "Javier",
        "posicion" => "alero"
    );

    $equipo[] = $jugador;    
    $equipo[] = $jugador1;
    $equipo[] = $jugador2;


    foreach($equipo as $jugador){
        echo $jugador["nombre"] . " " . $jugador["posicion"] . "<br>";
    }
    