<?php
$listaPaises = [];
    $pais = array (
        "nombre" => "China",
        "poblacion" => "20000 millones",
        "moneda" => "yuan"
    );

    $pais1 = array (
        "nombre" => "España",
        "poblacion" => "50 millones",
        "moneda" => "euro"
    );

    $pais2 = array (
        "nombre" => "Andorra",
        "poblacion" => "4 personas",
        "moneda" => "euro"
    );

    $listaPaises[] = $pais;    
    $listaPaises[] = $pais1;
    $listaPaises[] = $pais2;


    foreach($listaPaises as $pais){
        echo "Nombre: " . $pais["nombre"] . " Poblacion: " . $pais["poblacion"] . " Moneda: " .$pais["moneda"] . "<br>";
    }
    