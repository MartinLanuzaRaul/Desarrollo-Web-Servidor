<html>

<head>
    <title>Registrar producto</title>
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
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
            color: #555;
        }

        #btnProducto, 
        #btnCantidadProducto,
        #btnPrecio {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

       

        #btnRegistrar {
            background-color: #e3ab3c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        #btnRegistrar:hover {
            background-color: #d69e2a;
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
            transition: background-color 0.3s;
        }

        #btnVolver:hover{
            background-color: #d69e2a;
        }
    
    </style>
</head>

<body>

    <a id="volver" href="?method=home">
        <input id="btnVolver" type="button" value="volver"></a>
    <div>
        <form action="?method=new" method="post">
            <label for="">Producto</label>
            <input id="btnProducto" type="text" name="producto"> <br>
            <label for="">Cantidad</label>
            <input id="btnCantidadProducto" type="number" name="cantidadProducto"> <br>
            <label for="">Precio</label>
            <!-- step para que acepte numeros decimales-->
            <input id="btnPrecio" type="number" step="0.01" name="precioProducto"> <br>
            <input id="btnRegistrar" type="submit" value="Registrar producto">
        </form>
    </div>
</body>

</html>