<?php

try {
    require_once "Ejercicio1APP.php";
    $app = new Ejercicio1APP;
    $app->run();
    
} catch (zeroException $e) {
    echo $e->errorMessage();
}
