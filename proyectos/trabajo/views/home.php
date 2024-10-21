<html>
    <head>
        <style>
            h1{
                text-align: center;
                size: 20px;
            }

            header{
                text-align: center;
            }

            #sesion{
                text-align: right;
            }

            table, th{
                border: 1px solid;

            }

            table{
                width: 100%;
                border-collapse: collapse;
            }
            
        </style>
    </head>

    <body>
        <header>
            <p id="sesion"> Correo: <?php  echo $_SESSION["mail"] ?> | <a href="">Cerrar sesión</a></p>
            <h1>Mercado Buranya</h1>
            <input type="button" value="Registrar producto">
            <input type="button" value="Buscar producto">
            <input type="button" value="Valor total">

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
            

        </table>
    </body>
</html>