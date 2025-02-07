<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        // Habilitar la visualización de errores para depuración
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        
        // Incluir el archivo de conexión a la base de datos
        require('../util/conexion.php');

        // Función para sanitizar la entrada de datos
        function depurar(string $entrada): string {
            $salida = trim(htmlspecialchars($entrada)); // Elimina espacios y caracteres especiales
            $salida = preg_replace('/\s+/', ' ', $salida); // Sustituye múltiples espacios por uno solo
            return $salida;
        }

        // Iniciar sesión para verificar autenticación
        session_start();
        if (!isset($_SESSION["usuario"])) {
            header("location: ../usuario/iniciar_sesion.php"); // Redirigir si no está autenticado
            exit;
        }


        // Manejar el formulario enviado por método POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
           

            // Obtener y sanitizar valores enviados por el formulario
            $id_estudiante = $_POST["id_estudiante"];
            $tmp_nombre = depurar($_POST["nombre"]);
            $tmp_edad = depurar($_POST["edad"]);
            $tmp_materia = depurar($_POST["materia"]);
            $tmp_descripcion = depurar($_POST["descripcion"]);

            $error = 0; // Variable para contar errores de validación
            
        // Obtener las materias disponibles desde la base de datos
        $sql = "SELECT * FROM materias";
        $resultado = $_conexion->query($sql);
        $materias = [];
        while ($registro = $resultado->fetch_assoc()) {
            array_push($materias, $registro["nombre"]);
        }

        // Obtener los datos del estudiante basado en el ID proporcionado por GET
        $id_estudiante = $_GET["id_estudiante"];
        $sql = "SELECT * FROM estudiantes WHERE id_estudiante = $id_estudiante";
        $resultado = $_conexion->query($sql);
        $estudiante = $resultado->fetch_assoc();

            // Validar el nombre
            if ($tmp_nombre != '') {
                if (strlen($tmp_nombre) >= 2 && strlen($tmp_nombre) <= 50) {
                    $patron = "/^[A-Za-zÑÁÉÍÓÚñáéíóú ]+$/"; // Solo letras y espacios
                    if (preg_match($patron, $tmp_nombre)) {
                        $nombre = $tmp_nombre;
                    } else {
                        $err_nombre = "El nombre solo puede contener letras y espacios.";
                        $error++;
                    }
                } else {
                    $err_nombre = "El nombre debe tener entre 2 y 50 caracteres.";
                    $error++;
                }
            } else {
                $err_nombre = "El nombre es obligatorio.";
                $error++;
            }

            // Validar la edad
            if ($tmp_edad != '') {
                if (filter_var($tmp_edad, FILTER_VALIDATE_INT) !== false) {
                    if ($tmp_edad >= 5 && $tmp_edad <= 120) {
                        $edad = $tmp_edad;
                    } else {
                        $err_edad = "La edad debe estar entre 5 y 120.";
                        $error++;
                    }
                } else {
                    $err_edad = "La edad debe ser un número entero.";
                    $error++;
                }
            } else {
                $err_edad = "La edad es obligatoria.";
                $error++;
            }

            // Validar la materia seleccionada
            if (isset($tmp_materia)) {
                if (in_array($tmp_materia, $materias)) {
                    $materia = $tmp_materia;
                } else {
                    $err_materia = "Materia inválida.";
                    $error++;
                }
            } else {
                $err_materia = "La materia es obligatoria.";
                $error++;
            }

            // Validar la descripción
            if ($tmp_descripcion != '') {
                if (strlen($tmp_descripcion) <= 255) {
                    $patron = "/^[A-Za-z0-9ÑÁÉÍÓÚñáéíóú ]+$/"; // Letras, números y espacios
                    if (preg_match($patron, $tmp_descripcion)) {
                        $descripcion = $tmp_descripcion;
                    } else {
                        $err_descripcion = "La descripción solo puede contener letras, números y espacios.";
                        $error++;
                    }
                } else {
                    $err_descripcion = "La descripción no puede tener más de 255 caracteres.";
                    $error++;
                }
            } else {
                $err_descripcion = "La descripción es obligatoria.";
                $error++;
            }

            // Si no hay errores, realiza la actualización en la base de datos
            if ($error === 0) {
                $sql = "UPDATE estudiantes SET
                    nombre = '$nombre',
                    edad = $edad,
                    materia = '$materia',
                    descripcion = '$descripcion'
                WHERE id_estudiante = $id_estudiante";
                $_conexion->query($sql); // Ejecuta la consulta de actualización
            }
        }
    ?>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <div class="mb-3 mt-5">
                <h2>Editar Estudiante</h2>
            </div>

            <div class="mb-3 col-5">
                <label class="form-label">Nombre</label>
                <?php if (isset($err_nombre)) echo "<span class='error'>$err_nombre</span>" ?>
                <input type="text" class="form-control" name="nombre" value="<?php echo $estudiante["nombre"] ?>">
            </div>

            <div class="mb-3 col-5">
                <label class="form-label">Edad</label>
                <?php if (isset($err_edad)) echo "<span class='error'>$err_edad</span>" ?>
                <input type="text" class="form-control" name="edad" value="<?php echo $estudiante["edad"] ?>">
            </div>

            <div class="mb-3 col-5">
                <label class="form-label">Materia</label>
                <?php if (isset($err_materia)) echo "<span class='error'>$err_materia</span>" ?>
                <select class="form-select" name="materia">
                    <option value="" selected disabled hidden>Elige una materia</option>
                    <?php foreach ($materias as $materia_opcion) { ?>
                        <option value="<?php echo $materia_opcion ?>" <?php if ($materia_opcion == $estudiante["materia"]) echo 'selected' ?>>
                            <?php echo $materia_opcion ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3 col-5">
                <label class="form-label">Descripción</label>
                <?php if (isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>" ?>
                <input type="text" class="form-control" name="descripcion" value="<?php echo $estudiante["descripcion"] ?>">
            </div>

            <div class="mb-3">
                <input type="hidden" name="id_estudiante" value="<?php echo $estudiante["id_estudiante"] ?>">
                <input type="submit" class="btn btn-primary" value="Guardar">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
