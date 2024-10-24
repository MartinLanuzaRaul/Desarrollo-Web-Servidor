<html>

<head>
    <title>Buscar producto</title>
    <style>
         table,
        th,
        td {
            border: 1px solid;
            text-align: center;

        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <a href="?method=home">
        <input type="button" value="volver"></a>
    <form action="?method=buscarProducto" method="post">
        <label for="">Producto</label>
        <input type="text" name="productoABuscar"> <br>
        <input type="submit" value="Buscar">
    </form>

    <table>

        <?php
        if (isset($_COOKIE['productos'])) {
            $productos = unserialize($_COOKIE['productos']);

            foreach ($productos as $producto) {
                if ($producto['producto'] == $_POST['productoABuscar']) {
                    echo "
                <tr>
                    <th>Producto</th>
                    <th>Stock</th>
                    <th>Precio unidad</th>
                    <th>Añadido por</th>
                </tr>

                <tr>
                    <td>{$producto['producto']}</td>
                    <td>{$producto['cantidad']}</td>
                    <td>{$producto['precio']}</td>
                    <td>{$producto['mail']}</td>
                  </tr>";
                }
            }
        }

        ?>

    </table>
</body>

</html>