<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <ol>
        <?php


        $lista = array('pan', 'refrescos', 'agua', 'galletas', 'arroz');


        /*for($i ; $i < strlen($lista) ; $i++){

        }*/

        foreach ($lista as $producto) {
            echo "<li>" . $producto . "</li>";
        
        }

        ?>
    </ol>
</body>

</html>