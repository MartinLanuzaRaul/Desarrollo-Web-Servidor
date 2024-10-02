<html>

<body>

    <form>
         <input type="text" name="nombre"><br>
        <input type="submit" value="Enviar">
        <input type="hidden" name="elemento">
        <?php
        $elementos = [];
        if (isset($_GET['nombre']) && isset($_GET['nombre']) != "") {
            $elementos = $_GET["nombre"];
            foreach($elementos as $nombre){
                $elementos = $_GET['nombre'];
            }
        } 
        ?>
    </form>

    <li> <?php echo $elementos[0] ?> </li>
    <li> <?php echo $elementos[1] ?> </li>
    <li></li>

</body>

</html>