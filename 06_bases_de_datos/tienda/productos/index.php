<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <!-- Enlace al framework Bootstrap para estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    // Activa el informe de todos los errores en PHP
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    // Incluye el archivo de conexión a la base de datos
    require('./tienda/util/conexion.php');

    // Inicia o recupera la sesión existente
    session_start();

    // Verifica si el usuario está logueado
    if (!isset($_SESSION["usuario"])) {
        // Redirige a la página de inicio de sesión si no hay sesión activa
        header("location: ../usuario/iniciar_sesion.php");
        exit; // Asegura que el script no continúe ejecutándose
    }
    ?>
</head>
<body>
    <div class="container">
        <div class="mb-3 mt-5">
            <!-- Título principal de la página -->
            <h2>Productos</h2>
        </div>
        <?php
        // Comprueba si la solicitud es de tipo POST (envío de formulario)
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recupera el ID del producto enviado en el formulario
            $id_producto = $_POST["id_producto"];

            // Consulta SQL para eliminar el producto con el ID proporcionado
            $sql = "DELETE FROM productos WHERE id_producto = $id_producto";

            // Ejecuta la consulta de eliminación
            $_conexion->query($sql);
        }

        // Consulta SQL para obtener todos los productos de la base de datos
        $sql = "SELECT * FROM productos";

        // Ejecuta la consulta y almacena el resultado en $resultado
        $resultado = $_conexion->query($sql);
        ?>
        <!-- Botones de navegación para cambiar entre secciones y agregar nuevos productos -->
        <a class="btn btn-light btn-sm" href="../categorias/index.php">Cambiar a categorías</a>
        <a class="btn btn-dark btn-sm" href="nuevo_producto.php">Nuevo producto</a><br><br>
        <a class="btn btn-outline-dark btn-sm" href="../index.php">Volver al inicio</a><br><br>

        <!-- Tabla para mostrar los productos -->
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <!-- Encabezados de las columnas de la tabla -->
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th>Descripción</th>
                    <th></th> <!-- Espacio para botón "Editar" -->
                    <th></th> <!-- Espacio para botón "Borrar" -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Itera a través de cada fila del resultado de la consulta
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    // Muestra el nombre del producto
                    echo "<td>" . $fila["nombre"] . "</td>";
                    // Muestra el precio del producto
                    echo "<td>" . $fila["precio"] . "</td>";
                    // Muestra la categoría del producto
                    echo "<td>" . $fila["categoria"] . "</td>";
                    // Muestra el stock del producto
                    echo "<td>" . $fila["stock"] . "</td>";
                    ?>
                    <td>
                        <!-- Muestra la imagen del producto -->
                        <img width="100" height="160" src="<?php echo "../" . $fila["imagen"] ?>">
                    </td>
                    <?php
                    // Muestra la descripción del producto
                    echo "<td>" . $fila["descripcion"] . "</td>";
                    ?>
                    <td>
                        <!-- Botón para redirigir a la página de edición del producto -->
                        <a class="btn btn-primary btn-sm" href="editar_producto.php?id_producto=<?php echo $fila['id_producto'] ?>">Editar</a>
                    </td>
                    <td>
                        <!-- Formulario para eliminar el producto -->
                        <form action="" method="post">
                            <!-- Campo oculto para pasar el ID del producto -->
                            <input type="hidden" name="id_producto" value="<?php echo $fila['id_producto']; ?>">
                            <!-- Botón para confirmar la eliminación -->
                            <input class="btn btn-danger btn-sm" type="submit" value="Borrar">
                        </form>
                    </td>
                    <?php
                    echo "</tr>"; // Cierra la fila de la tabla
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Script para los componentes interactivos de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>