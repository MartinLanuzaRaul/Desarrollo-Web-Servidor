<html>


<head>
    <title>Consultas</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin: 20px auto;
        }

        th {
            background-color: blue;
            color: white;
            padding: 12px;
        }

        td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 12px;
            background-color: white;
        }

        .pagination {
            text-align: center;
        }
    </style>
</head>

<body>


    <h1>Steam</h1>

    <form action="miLista" method="post">
                <input type="submit" value="Mi biblioteca">
            </form>

        <div class="column">
            <h2>
                Resultado:
            </h2>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Puntuacion</th>
                    <th>Compañia</th>
                </tr>


                <?php
                foreach ($pages->videojuegos as $videojuego) {
                    echo "<tr>";
                    echo "<td>" . $videojuego->getId() . "</td>";
                    echo "<td>" . $videojuego->getNombre() . "</td>";
                    echo "<td>" . $videojuego->getPuntuacion() . "</td>";
                    echo "<td>" . $videojuego->getCodigo_desarrollador() . "</td>";
                    echo "</tr>";
                }
                ?>

            </table>

            <div class="pagination">
                <?php
                for ($i = 1; $i <= $pages->n; $i++) {
                    echo "<a href='?page=$i'><button>$i</button></a>";
                }
                ?>
            </div>

        </div>
    </div>

</body>

</html>