<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <form method="post">
        <label for="fname">Producto:</label><br>
        <input type="text" id="producto" name="producto"><br>
        <input type="submit" value="Añadir">
    </form>

    <?php

        $producto = $_POST['producto'];
        $listaProductos = array();

        
        if (isset($_COOKIE['productos'])) {
            $listaProductos = unserialize($_COOKIE['productos']);
        } 

        setcookie("productos", serialize($listaProductos), time() + 3600 * 24); 

            foreach ($listaProductos as $prod) {
                echo $producto;
            }
        
        //setcookie("productos", serialize($listaProductos), time() -10000); 


    ?>
</body>

</html>