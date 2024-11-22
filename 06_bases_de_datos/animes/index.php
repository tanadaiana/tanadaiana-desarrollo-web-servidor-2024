<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('conexion.php');
    ?>
    <style>
        .table-primary {
            --bs-table-bg: #b0008e;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Listado de animes</h1>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $id_anime = $_POST["id_anime"];
                //echo "<h1>$id_anime</h1>";
                $sql = "DELETE FROM animes WHERE id_anime = '$id_anime'";
                $_conexion -> query($sql);
            }

            $sql = "SELECT * FROM animes";
            $resultado = $_conexion -> query($sql);
        ?>
        <a class="btn btn-secondary" href="nuevo_anime.php">Nuevo anime</a><br><br>
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Título</th>
                    <th>Estudio</th>
                    <th>Año</th>
                    <th>Número de temporadas</th>
                    <th>Imagen</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($fila = $resultado -> fetch_assoc()) {
                        // ["titulo"=>"Frieren","nombre_estudio"="Pierrot"...]
                        echo "<tr>";
                        echo "<td>" . $fila["titulo"] . "</td>";
                        echo "<td>" . $fila["nombre_estudio"] . "</td>";
                        echo "<td>" . $fila["anno_estreno"] . "</td>";
                        echo "<td>" . $fila["num_temporadas"] . "</td>";
                        ?>
                        <td>
                            <img width="50" heigth="80" src="<?php echo $fila["imagen"] ?>">
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id_anime" value="<?php echo $fila["id_anime"] ?>">
                                <input class="btn btn-danger" type="submit" value="Borrar">
                            </form>
                        </td>
                        <?php
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
   
</body>
</html>