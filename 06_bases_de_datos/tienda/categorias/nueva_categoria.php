<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <!-- Bootstrap CSS para diseño y estilo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <?php
        // Configuración de errores y conexión a la base de datos
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        require('../util/conexion.php'); // Archivo externo para conectar a la base de datos

        // Inicio de sesión y verificación de usuario autenticado
        session_start();
        if (!isset($_SESSION["usuario"])) {
            header("location: ../usuario/iniciar_sesion.php"); // Redirige si el usuario no está autenticado
            exit;
        }
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('../util/conexion.php');
    ?>
</head>
<body>
    <div class="container">
    <?php
        // Función para limpiar y validar entradas de usuario
        function depurar(string $entrada): string {
            $salida = htmlspecialchars($entrada); // Convierte caracteres especiales para evitar XSS
            $salida = trim($salida); // Elimina espacios al inicio y final
            $salida = preg_replace('/\s+/', ' ', $salida); // Reemplaza múltiples espacios por uno
            return $salida;
        }

        // Manejo del formulario cuando se envía con el método POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $error = 0; // Contador de errores

            // Sanitización de entradas
            $categoria = depurar($_POST["categoria"]);
            $tmp_descripcion = depurar($_POST["descripcion"]);

            // Validación de la descripción
            if (strlen($tmp_descripcion) > 0) {
                $descripcion = $tmp_descripcion;
            } else {
                $val_descripcion = "La descripción no puede estar vacía.";
                $error++;
            }

            // Si no hay errores, se actualiza la base de datos
            if ($error === 0) {
                $sql = "UPDATE categorias SET descripcion = '$descripcion' WHERE nombre = '$categoria'";
                if (!$_conexion->query($sql)) {
                    $error++; // Incrementa errores si la consulta falla
                }
            }
        }

        // Obtención de la categoría seleccionada para editar
        $_categoria = depurar($_GET["nombre"]);
        $sql = "SELECT * FROM categorias WHERE nombre = '$_categoria'";
        $resultado = $_conexion->query($sql);

        // Verifica si la consulta devolvió resultados
        if ($resultado && $resultado->num_rows > 0) {
            $categoria = $resultado->fetch_assoc(); // Obtiene la categoría actual
        } else {
            $categoria = null;
        }

        // Validaciones específicas para categoría y descripción
        if ($categoria == '') {
            $err_categoria = "La categoría es obligatoria";
        } else if (strlen($categoria) < 2) {
            $err_categoria = "La categoría debe tener al menos 2 caracteres";
        } else {
            $patron = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑ ]+$/";
            if (!preg_match($patron, $categoria)) {
                $err_categoria = "La categoría solo puede contener letras y espacios en blanco";
            } else {
                $sql = "SELECT * FROM categorias WHERE nombre = '$categoria'";
                $resultado = $_conexion->query($sql);

                if ($resultado->num_rows > 0) {
                    $err_categoria = "La categoría ya existe";
                } else {
                    $categoria = $tmp_categoria;
                }
            }
        }

        // Validación de longitud y formato de descripción
        if (strlen($tmp_descripcion) > 255) {
            $err_descripcion = "La descripción no puede tener más de 255 caracteres";
        } else {
            $patron = "/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/";
            if (!preg_match($patron, $tmp_descripcion)) {
                $err_descripcion = "La descripción solo puede contener letras y espacios en blanco";
            } else {
                $descripcion = $tmp_descripcion;
            }
        }
    ?>
        <!-- Formulario HTML para editar la categoría -->
        <div class="container">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Campo para el nombre -->
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input class="form-control" name="nombre" type="text">
                </div>

                <!-- Campo para la categoría -->
                <div class="mb-3">
                    <label class="form-label">Categoría</label>
                    <input class="form-control" name="categoria" type="text">
                    <?php if (isset($err_categoria)) echo $err_categoria; ?>
                </div>

                <!-- Campo para la descripción -->
                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea class="form-control" name="descripcion"></textarea>
                    <?php if (isset($err_descripcion)) echo $err_descripcion; ?>
                </div>

                <!-- Botones de acción -->
                <div class="mb-3">
                    <input class="btn btn-primary" type="submit" value="Crear">
                    <a class="btn btn-secondary" href="index.php">Volver</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS para funcionalidad -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
