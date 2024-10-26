<html>

<head>
    <title>VAlor total</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #1d1965;
            margin: 0;
            padding: 0;
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

        #volver{
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

        #btnVolver:hover{
            background-color: #d69e2a;
        }

        h1{
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>
    <a id="volver" href="?method=home">
        <input id="btnVolver" type="button" value="volver"></a>
    <h1>Valor total</h1>
    <table>
        <tr>
            <th>Producto</th>
            <th>Stock</th>
            <th>Precio unidad</th>
            <th>Valor producto</th>
        </tr>
        <?php
        if (isset($_COOKIE['productos'])) {
            $productos = unserialize($_COOKIE['productos']);
            $totalInventario = 0;


            foreach ($productos as $producto) {
                $totalProducto = $producto['cantidad'] * $producto['precio'];
                $totalInventario += $totalProducto;


                echo "
                

                <tr>
                    <td>{$producto['producto']}</td>
                    <td>{$producto['cantidad']}</td>
                    <td>{$producto['precio']}</td>
                    <td>$totalProducto </td>
                  </tr>";
            }
        }

        ?>
    </table>

    <?php
    echo "<table><tr><th>VALOR TOTAL</th></tr>
    <tr><td>$totalInventario </td></tr></table>" 
    ?>
</body>

</html>