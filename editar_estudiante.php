<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        require('../util/conexion.php');

        // Función para sanitizar las cadenas
        function depurar(string $cadena): string {
            $salida = trim(htmlspecialchars($cadena));
            $salida = preg_replace('/\s+/', ' ', $salida);
            return $salida;
        }

        // Verificar si el usuario está logueado
        session_start();
        if (!isset($_SESSION["usuario"])) {
            header("location: ../usuario/iniciar_sesion.php");
            exit;
        }

        // Obtener materias desde la base de datos
        $sql = "SELECT * FROM materias";
        $resultado = $_conexion->query($sql);
        $materias = [];
        while ($registro = $resultado->fetch_assoc()) {
            array_push($materias, $registro["nombre"]);
        }

        // Obtener el id del estudiante desde la URL
        $id_estudiante = $_GET["id_estudiante"];

        // Obtener los datos del estudiante
        $sql = "SELECT * FROM estudiantes WHERE id_estudiante = $id_estudiante";
        $resultado = $_conexion->query($sql);
        $estudiante = $resultado->fetch_assoc();

        // Procesar los datos del formulario cuando se envía
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_estudiante = $_POST["id_estudiante"];
            $tmp_nombre = $_POST["nombre"];
            $tmp_correo = $_POST["correo"];
            $tmp_materia = $_POST["materia"];

            // Validar nombre
            if ($tmp_nombre != '') {
                depurar($tmp_nombre);
                if (strlen($tmp_nombre) >= 2 && strlen($tmp_nombre) <= 50) {
                    $patron = "/^[A-Za-zÑÁÉÍÓÚñáéíóú ]+$/";
                    if (preg_match($patron, $tmp_nombre)) {
                        $nombre = $tmp_nombre;
                    } else {
                        $err_nombre = "El nombre solo puede tener letras y espacios.";
                    }
                } else {
                    $err_nombre = "El nombre debe tener entre 2 y 50 caracteres.";
                }
            } else {
                $err_nombre = "El nombre es obligatorio.";
            }

            // Validar correo
            if ($tmp_correo != '') {
                depurar($tmp_correo);
                if (filter_var($tmp_correo, FILTER_VALIDATE_EMAIL)) {
                    $correo = $tmp_correo;
                } else {
                    $err_correo = "El correo no es válido.";
                }
            } else {
                $err_correo = "El correo es obligatorio.";
            }

            // Validar materia
            if (isset($_POST["materia"])) {
                $tmp_materia = $_POST["materia"];
                depurar($tmp_materia);
                if (in_array($tmp_materia, $materias)) {
                    $materia = $tmp_materia;
                } else {
                    $err_materia = "Materia inválida.";
                }
            } else {
                $err_materia = "La materia es obligatoria.";
            }

            // Si todo es válido, actualizar el estudiante en la base de datos
            if (isset($nombre) && isset($correo) && isset($materia)) {
                $sql = "UPDATE estudiantes SET
                            nombre = '$nombre',
                            correo = '$correo',
                            materia = '$materia'
                        WHERE id_estudiante = $id_estudiante";
                $_conexion->query($sql);
            }
        }
    ?>

    <style>
        .error {color: red; font-style: italic;}
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <div class="mb-3 mt-5">
                <h2>Editar Estudiante</h2>
            </div>
            <!-- Campo de nombre -->
            <div class="mb-3 col-5">
                <label class="form-label">Nombre</label>
                <?php if (isset($err_nombre)) echo "<span class='error'>$err_nombre</span>"; ?>
                <input type="text" class="form-control" name="nombre" value="<?php echo $estudiante["nombre"] ?>">
            </div>
            <!-- Campo de correo -->
            <div class="mb-3 col-5">
                <label class="form-label">Correo Electrónico</label>
                <?php if (isset($err_correo)) echo "<span class='error'>$err_correo</span>"; ?>
                <input type="email" class="form-control" name="correo" value="<?php echo $estudiante["correo"] ?>">
            </div>
            <!-- Campo de materia -->
            <div class="mb-3 col-5">
                <label class="form-label">Materia</label>
                <?php if (isset($err_materia)) echo "<span class='error'>$err_materia</span>"; ?>
                <select class="form-select" name="materia">
                    <option value="" selected disabled hidden>Elige una materia</option>
                    <?php foreach ($materias as $materia) { ?>
                        <option value="<?php echo $materia ?>" <?php if ($materia == $estudiante["materia"]) echo "selected"; ?>>
                            <?php echo $materia ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <!-- ID del estudiante oculto -->
                <input type="hidden" name="id_estudiante" value="<?php echo $estudiante["id_estudiante"] ?>">
                <input type="submit" class="btn btn-primary btn-sm" value="Modificar">
                <a class="btn btn-secondary btn-sm" href="index.php">Volver</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<!--Producto → Estudiante:

En el caso de la tienda, un producto tiene propiedades como nombre, precio, stock, descripción, etc.
En el caso del estudiante, este tiene propiedades como nombre, correo y la materia asociada.
Así, un estudiante sería análogo al concepto de producto, ya que es una entidad principal que se gestiona.
Categoría → Materia:-->
