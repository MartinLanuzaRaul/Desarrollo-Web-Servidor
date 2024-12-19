<html>


<head>
    <title>Consultas</title>

</head>

<body>


    <h1>Concesionario</h1>
    <h2>
        Estos son todos nuestros coches disponibles:
    </h2>
    <br>

    <div class="row">

        <div class="column">
            <table>
                <tr>
                    <th>id</th>
                    <th>marca</th>
                    <th>modelo</th>
                </tr>
                <?php foreach ($pages->coches as $coche) { ?>
                    <tr>
                        <td><?php echo $coche->getId() ?></td>
                        <td><?php echo $coche->getMarca() ?></td>
                        <td><?php echo $coche->getModelo() ?></td>

                    </tr>
                <?php } ?>
            </table>

            <div class="pagination">
                <?php
                for ($i = 1; $i <= $pages->n; $i++) {
                    echo "<a href='?page=$i'>$i</a>";
                }
                ?>
            </div>

        </div>

    </div>

</body>

</html>