<html>

<head>
    <?php
    require_once "ProductoNoEncontradoException.php";
    ?>
    <title>Buscar producto</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #1d1965;
            margin: 0;
            padding: 0;
        }

        div {
            border: solid 1px #ddd;
            border-radius: 8px;
            width: 90%;
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin: 20px auto;
        }

        th {
            background-color: #e3ab3c;
            color: white;
            padding: 12px;
        }

        td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 12px;
            background-color: white;
        }

        #volver {
            text-decoration: none;
            display: block;
            text-align: center;
            margin-bottom: 20px;
        }

        #btnVolver {
            margin-top: 5%;
            background-color: #e3ab3c;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        #btnVolver:hover {
            background-color: #d69e2a;
        }

        #btnBuscar {
            background-color: #e3ab3c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            margin-top: 10px;
        }

        #btnBuscar:hover {
            background-color: #d69e2a;
        }

        #inputProductoABuscar {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        #labelProducto {
            font-weight: bold;
            margin-top: 10px;
            display: block;
            color: #555;
        }
    </style>
</head>

<body>
    <a id="volver" href="?method=home">
        <input id="btnVolver" type="button" value="volver"></a>

    <div>
        <form action="?method=buscarProducto" method="post">
            <label id="labelProducto" for="">Producto</label>
            <input id="inputProductoABuscar" type="text" name="productoABuscar"> <br>
            <input id="btnBuscar" type="submit" value="Buscar">
        </form>
    </div>

    <table>

        <?php
        if (isset($_POST['productoABuscar']) && ($_POST['productoABuscar'] != "")) {
            try {
                $productos = unserialize($_COOKIE['productos']);
                $productoEncontrado = false;

                foreach ($productos as $producto) {
                    if ($producto['producto'] == $_POST['productoABuscar']) {
                        $productoEncontrado = true;
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

                if ($productoEncontrado == false) {
                    throw new ProductoNoEncontradoException();
                }
            } catch (ProductoNoEncontradoException $e) {
                echo "<tr>
        <td>{$e->errorMessage()}</td>
      </tr>";
            }
        }

        ?>

    </table>

</body>

</html>