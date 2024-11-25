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


    <h1>Videogames</h1>
    <h2>
        Select query
    </h2>
    <br>

    <div class="row">

        <div class="column">

            <form action="vistaAnyadir" method="post">
                <label for="">Introduce a new videogame: </label><br>
                <input type="submit" value="Introduce">
            </form>


        </div>

        <div class="column">

            <form action="vistaActualizar" method="post">
                <label for="">Update a videogame: </label><br>
                <input type="submit" value="Update">
            </form>


        </div>

        <div>
            <form action="?method=delete" method="post">
                <label for="">Delete a videogame: </label><br>
                <label for="">Id</label>
                <input id="btn" type="text" name="idAEliminar">
                <input id="btnEliminar" type="submit" value="Delete game">
            </form>
        </div>

        <div class="column">
            <h2>
                Resultado:
            </h2>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Platform</th>
                    <th>Year</th>
                    <th>Genre</th>
                    <th>Publisher</th>
                    <th>NA_Sales</th>
                    <th>EU_Sales</th>
                    <th>JP_Sales</th>
                    <th>Other_Sales</th>
                    <th>Global_Sales</th>
                </tr>


                <?php
                foreach ($pages->videojuegos as $videojuego) {
                    echo "<tr>";
                    echo "<td>" . $videojuego->getId() . "</td>";
                    echo "<td>" . $videojuego->getName() . "</td>";
                    echo "<td>" . $videojuego->getPlatform() . "</td>";
                    echo "<td>" . $videojuego->getYear() . "</td>";
                    echo "<td>" . $videojuego->getGenre() . "</td>";
                    echo "<td>" . $videojuego->getPublisher() . "</td>";
                    echo "<td>" . $videojuego->getNA_Sales() . "</td>";
                    echo "<td>" . $videojuego->getEU_Sales() . "</td>";
                    echo "<td>" . $videojuego->getJP_Sales() . "</td>";
                    echo "<td>" . $videojuego->getOther_Sales() . "</td>";
                    echo "<td>" . $videojuego->getGlobal_Sales() . "</td>";
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