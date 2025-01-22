<?php
// Inicia la sesión y verifica si el usuario está logueado.
session_start();
if (!isset($_SESSION["usuario"])) {
    header("location: ../usuario/iniciar_sesion.php");
    exit;
}

error_reporting(E_ALL);
ini_set("display_errors", 1);

// Incluye el archivo de conexión a la base de datos.
require('../util/conexion.php');

// Función para depurar entradas y evitar inyecciones o errores.
function depurar(string $entrada): string {
    $salida = htmlspecialchars($entrada);
    $salida = trim($salida);
    $salida = preg_replace('/\s+/', ' ', $salida);
    return $salida;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = 0;
    // Obtiene el nombre de la categoría a eliminar.
    $nombre = depurar($_POST["nombre"]);

    // Elimina la categoría.
    $sql = "DELETE FROM categorias WHERE nombre = '$nombre'";
    $_conexion->query($sql);

    // Verifica si la categoría tiene productos asociados con stock.
    $sql = "SELECT * FROM productos WHERE categoria = '$nombre' AND stock > 0";
    $resultado = $_conexion->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        echo "<div class='alert alert-warning'>La categoría tiene productos con stock y no se puede eliminar.</div>";
    } else {
        // Si no tiene productos con stock, elimina también los productos de esa categoría.
        $sql = "DELETE FROM productos WHERE categoria = '$nombre'";
        $_conexion->query($sql);

        echo "<div class='alert alert-success'>Categoría eliminada con éxito.</div>";
    }
}

// Consulta para obtener todas las categorías.
$sql = "SELECT * FROM categorias";
$resultado = $_conexion->query($sql);
?>
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
        
        require('../util/conexion.php');
    ?>
    <style>
        .table-primary {
            --bs-table-bg: #b0008e; /* Color de fondo personalizado */
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Categorías</h1>
        <a class="btn btn-secondary" href="nueva_categoria.php">Nueva categoría</a><br><br>

        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acción</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$fila["nombre"]}</td>";
                    echo "<td>{$fila["descripcion"]}</td>";
                    ?>
                    <td>
                        <!-- Formulario para eliminar categoría -->
                        <form action="" method="post">
                            <input type="hidden" name="nombre" value="<?php echo $fila["nombre"] ?>">
                            <input class="btn btn-danger" type="submit" value="Borrar">
                        </form>
                    </td>
                    <td>
                        <!-- Enlace para editar la categoría -->
                        <a class="btn btn-primary" href="editar_categoria.php?nombre=<?php echo $fila["nombre"] ?>">Editar</a>
                    </td>
                    <?php
                    echo "</tr>";
                }
                    while($fila = $resultado -> fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila["nombre"] . "</td>";
                        echo "<td>" . $fila["fabricante"] . "</td>";
                        echo "<td>" . $fila["generacion"] . "</td>";
                        if($fila["unidades_vendidas"] === NULL) {
                            echo "<td>No hay datos</td>";
                        } else {
                            echo "<td>" . $fila["unidades_vendidas"] . "</td>";
                        } 
                        ?>
                        <td>
                            <img width="50" heigth="80" src="<?php echo $fila["imagen"] ?>">
                        </td>
                        <td>
                            <a class="btn btn-primary" 
                               href="editar_anime.php?id_anime=<?php echo $fila["id_anime"] ?>">Editar</a>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
