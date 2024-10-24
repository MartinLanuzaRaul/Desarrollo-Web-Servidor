<html>

<head>
    <title>Mercado BURANYA</title>
    <style>
        h1 {
            text-align: center;
            size: 20px;
        }

        header {
            text-align: center;
        }

        #sesion {
            text-align: right;
        }

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
        
        a{
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header>
        <p id="sesion"> Correo: <?php echo $_SESSION["mail"] ?> | <a href="?method=logout">Cerrar sesión</a></p>
        <h1>Mercado Buranya</h1>
        <a href="?method=registrarProducto">
            <input type="button" value="Registrar producto">
        </a>
        <a href="?method=buscarProducto">
            <input type="button" value="Buscar producto">
        </a>
        <a href="?method=valorTotal">
            <input type="button" value="Valor total">
        </a>

    </header>

    <p>Tabla inventario</p>
    <table>
    <tr>
        <th>Producto</th>
        <th>Stock</th>
        <th>Precio unidad</th>
        <th>Añadido por</th>
        <th>Acciones</th>
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
                    <td><a href=''><button>Eliminar</button></a></td>
                  </tr>";
        }
    }
   
    ?>
</table>

    <a href="?method=empty"> <input type="button" value="Eliminar todo"> </a><br>



</body>

</html>