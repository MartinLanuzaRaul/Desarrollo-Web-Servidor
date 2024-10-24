<html>
    <head>
        <title>VAlor total</title>
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
                $totalInventario += $totalProducto ;

               
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
        echo "<p>El total del inventario es de $totalInventario €</p>"
        ?>
    </body>
</html>