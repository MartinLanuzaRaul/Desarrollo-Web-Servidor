<html>
    <head>
        <title>Registrar producto</title>
    </head>
    <body>

    <a href="?method=home">
        <input type="button" value="volver"></a>

    <form action="?method=new" method="post">
        <label for="">Producto</label>
        <input type="text" name="producto"> <br>
        <label for="">Cantidad</label>
        <input type="number" name="cantidadProducto"> <br>
        <label for="">Precio</label>
    <!-- step para que acepte numeros decimales-->
        <input type="number" step="0.01" name="precioProducto"> <br>
        <input type="submit" value="Registrar producto">
    </form>

    </body>
</html>