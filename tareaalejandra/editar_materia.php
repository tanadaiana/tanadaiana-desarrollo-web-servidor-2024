<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Materia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        require('../util/conexion.php');

        // Función para depurar entradas
        function depurar(string $entrada): string {
            // Convierte caracteres especiales a entidades HTML para evitar ataques XSS
            $salida = htmlspecialchars($entrada); 
            // Elimina espacios en blanco al inicio y final
            $salida = trim($salida);
            // Reemplaza múltiples espacios consecutivos por un solo espacio
            $salida = preg_replace('/\s+/', ' ', $salida); 
            return $salida;
        }

        // Función para validar los datos
        function validar(string $entrada, string $tipo, string $campo): bool {
            // Aquí podrías agregar más validaciones según el tipo y campo
            if ($tipo === "categoria" && $campo === "descripcion") {
                // Validación simple de la descripción (puedes agregar más validaciones si lo necesitas)
                if (strlen($entrada) < 10) {
                    return false; // Si la descripción es demasiado corta, invalidamos
                }
            }
            // Si pasa la validación
            return true;
        }
    ?>
</head>
<body>
    <div class="container">
        <?php
            // Comprobar si el formulario fue enviado
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $error = 0; // Variable para contar errores de validación

                // Sanitiza y valida los campos del formulario
                $nombre = depurar($_POST["nombre"]);
                $descripcion = depurar($_POST["descripcion"]);
                
                // Validar la descripción
                $val_descripcion = validar($descripcion, "categoria", "descripcion");
                if ($val_descripcion === true) {
                    // Descripción válida
                } else {
                    // Si la descripción no es válida, incrementa el contador de errores
                    $error++;
                }

                // Si no hay errores, realiza la actualización en la base de datos
                if ($error === 0) {
                    $id_materia = $_POST["id_materia"];
                    $sql = "UPDATE materias SET
                                nombre = '$nombre',
                                descripcion = '$descripcion'
                            WHERE id_materia = $id_materia";
                    $_conexion->query($sql); // Ejecuta la consulta de actualización
                } else {
                    // Si hay errores, puedes mostrar un mensaje (opcional)
                    echo "<div class='alert alert-danger'>Hubo un error con la descripción proporcionada.</div>";
                }
            }

            // Recuperar la materia a editar
            $id_materia = $_GET["id_materia"];
            $sql = "SELECT * FROM materias WHERE id_materia = '$id_materia'";
            $resultado = $_conexion->query($sql);
            $materia = $resultado->fetch_assoc();
        ?>

        <!-- Formulario para editar materia -->
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" name="nombre" type="text" value="<?php echo $materia['nombre']; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion"><?php echo $materia['descripcion']; ?></textarea>
            </div>

            <div class="mb-3">
                <input type="hidden" name="id_materia" value="<?php echo $materia['id_materia']; ?>">
                <input class="btn btn-primary" type="submit" value="Modificar">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<!--Categoría → Materia:

En el caso de la tienda, las categorías agrupan a los productos según un tema en común.
En el caso del ejemplo de estudiantes, las materias agrupan a los estudiantes o representan el área temática en la que se inscriben.
Las materias serían análogas a las categorías, ya que actúan como una clasificación o relación para los estudiantes.-->
