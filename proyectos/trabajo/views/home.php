<html>

<head>
    <title>Mercado BURANYA</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            text-align: center;
            background-color: #1d1965;
            padding: 20px 0;
            color: white;
        }

        #sesion {
            text-align: right;
            margin-right: 20px;
        }

        #logo {
            max-width: 250px;
            height: auto;
            display: block;
            margin: 10px auto;
        }

        #tituloTabla {
            text-align: center;
            color: black;
            font-size: 24px;
    
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
        

        a {
            text-decoration: none;
        }

        #btnRegistrar,
        #btnBuscar,
        #btnValorTotal,
        #btnEliminar,
        #btnEliminarTodo {
            background-color: #e3ab3c;
            color: white;
            border: none;
            padding: 10px 15px;
            margin: 5px;
            cursor: pointer;
            border-radius: 5px;
        }

        #btnRegistrar:hover,
        #btnBuscar:hover,
        #btnValorTotal:hover,
        #btnEliminar:hover,
        #btnEliminarTodo:hover {
            background-color: #c29e2a;
        }

        #eliminarProducto {
            margin-top: 20px;
            text-align: center;
        }

        #eliminarProducto input[type="text"] {
            padding: 10px;
            width: 200px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        
    </style>
</head>

<body>
    <header>
        <p id="sesion"> Correo: <?php echo $_SESSION["mail"] ?> | <a href="?method=logout">Cerrar sesión</a></p>
        <img src="imagenes/logo.png" id="logo" alt="Logo">
        <a href="?method=registrarProducto">
            <input type="button" id="btnRegistrar" value="Registrar producto">
        </a>
        <a href="?method=buscarProducto">
            <input type="button" id="btnBuscar" value="Buscar producto">
        </a>
        <a href="?method=valorTotal">
            <input type="button" id="btnValorTotal" value="Valor total">
        </a>

    </header>

    <p id="tituloTabla">Tabla inventario</p>
    <table>
        <tr>
            <th>Producto</th>
            <th>Stock</th>
            <th>Precio unidad</th>
            <th>Añadido por</th>
        </tr>
        <?php
        if (isset($_COOKIE['productos'])) {
            $productos = unserialize($_COOKIE['productos']);

            foreach ($productos as $producto) {
                // sin {} no va
                echo "<tr>
                    <td>{$producto['producto']}</td>
                    <td>{$producto['cantidad']}</td>
                    <td>{$producto['precio']}</td>
                    <td>{$producto['mail']}</td>
                  </tr>";
            }
        }

        ?>
    </table>

    <form id="eliminarProducto" action="?method=borrarProducto" method="post">
        <label for="" id="labelProductoAEliminar">Producto a eliminar</label>
        <input type="text" name="productoAEliminar">
        <input id="btnEliminar" type="submit" value="Eliminar producto">
    </form>

    <a href="?method=empty"> <input id="btnEliminarTodo" type="button" value="Eliminar todo"> </a><br>



</body>

</html>