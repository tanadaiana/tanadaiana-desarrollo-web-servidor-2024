<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        <?php
            $sql = "SELECT * FROM consolas";
            $resultado = $_conexion -> query($sql);
        ?>
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Nombre</th>
                    <th>Fabricante</th>
                    <th>Generación</th>
                    <th>Unidades vendidas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($fila = $resultado -> fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila["nombre"] . "</td>";
                        echo "<td>" . $fila["fabricante"] . "</td>";
                        echo "<td>" . $fila["generacion"] . "</td>";
                        if($fila["unidades_vendidas"] === NULL) {
                            echo "<td>No hay datos</td>"; //Si es NULL, se muestra el texto "No hay datos" en la celda correspondiente.
                        } else {
                            echo "<td>" . $fila["unidades_vendidas"] . "</td>";//   Si no es NULL, se muestra el valor de unidades_vendidas.
                        }
                        echo "</tr>";
                    }
                    /*Condición: Comprueba si el valor en la columna unidades_vendidas es NULL.
                     Esto ocurre si esa información no está disponible o no ha sido registrada en la base de datos.
                    Salida:
                    Si es NULL, se muestra el texto "No hay datos" en la celda correspondiente.
                    Si no es NULL, se muestra el valor de unidades_vendidas.
                    Esta verificación asegura que no se muestre un valor vacío en la tabla, mejorando la experiencia visual y lógicA*/
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>