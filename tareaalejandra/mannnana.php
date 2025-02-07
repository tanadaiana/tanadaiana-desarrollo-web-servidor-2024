<?php
/** CÓDIGO PARA ERROR HANDLING */
error_reporting(E_ALL);
ini_set("display_errors", 1);
require('../util/conexion.php');

session_start();
if (!isset($_SESSION["usuario"])) {
    header("location: ../usuario/iniciar_sesion.php");
    exit;
}

function depurar(string $entrada): string {
    $salida = htmlspecialchars($entrada);
    $salida = trim($salida);
    $salida = preg_replace('/\s+/', ' ', $salida);
    return $salida;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_original = $_POST["nombre_original"];
    $tmp_nombre = depurar($_POST["nombre"]);
    $tmp_apellido = depurar($_POST["apellido"]);
    $tmp_materia = depurar($_POST["materia"]);

    $cont_error = 0;

    // Validación de nombre
    if ($tmp_nombre == '') {
        $err_nombre = "El nombre es obligatorio";
        $cont_error++;
    } else {
        if (strlen($tmp_nombre) < 2 || strlen($tmp_nombre) > 50) {
            $err_nombre = "El nombre debe ser entre 2 a 50 caracteres";
            $cont_error++;
        } else {
            $patron = "/^[a-zA-Z\ áéíóúÁÉÍÓÚÑñ]+$/";
            if (!preg_match($patron, $tmp_nombre)) {
                $err_nombre = "El nombre solo puede contener letras y espacios";
                $cont_error++;
            } else {
                $nombre = $tmp_nombre;
            }
        }
    }

    // Validación de apellido
    if ($tmp_apellido == '') {
        $err_apellido = "El apellido es obligatorio";
        $cont_error++;
    } else {
        if (strlen($tmp_apellido) < 2 || strlen($tmp_apellido) > 50) {
            $err_apellido = "El apellido debe ser entre 2 a 50 caracteres";
            $cont_error++;
        } else {
            $patron = "/^[a-zA-Z\ áéíóúÁÉÍÓÚÑñ]+$/";
            if (!preg_match($patron, $tmp_apellido)) {
                $err_apellido = "El apellido solo puede contener letras y espacios";
                $cont_error++;
            } else {
                $apellido = $tmp_apellido;
            }
        }
    }

    // Validación de materia
    if ($tmp_materia == '') {
        $err_materia = "La materia es obligatoria";
        $cont_error++;
    } else {
        $materia = $tmp_materia;
    }

    // Comprobación de errores y actualización en base de datos
    if ($cont_error == 0) {
        $sql = "UPDATE estudiantes SET
                nombre = '$nombre',
                apellido = '$apellido',
                materia = '$materia'
                WHERE nombre = '$nombre_original'";

        $_conexion->query($sql);
    }
}

// Consulta de materias y almacenamiento en un array
$sql = "SELECT * FROM materias ORDER BY nombre";
$resultado = $_conexion->query($sql);

$materias = [];
while ($fila = $resultado->fetch_assoc()) {
    array_push($materias, $fila["nombre"]);
}

// Obtener información del estudiante
if (!isset($_GET["nombre"])) {
    die("Nombre del estudiante no especificado.");
}

$nombre = depurar($_GET["nombre"]);
$sql = "SELECT * FROM estudiantes WHERE nombre = '$nombre'";
$resultado = $_conexion->query($sql);

if ($resultado->num_rows === 0) {
    die("Estudiante no encontrado.");
}

$estudiante = $resultado->fetch_assoc();
?>

<div class="container">
    <h1>Editar Estudiante</h1>
    <form action="" method="post">
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" 
                   value="<?php echo $estudiante['nombre'] ?>">
            <?php if (isset($err_nombre)) echo "<span class='error'>$err_nombre</span>"; ?>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="apellido" 
                   value="<?php echo $estudiante['apellido'] ?>">
            <?php if (isset($err_apellido)) echo "<span class='error'>$err_apellido</span>"; ?>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Materia</label>
            <select name="materia" class="form-select">
                <option value="<?php echo $estudiante['materia'] ?>" selected>
                    <?php echo $estudiante['materia'] ?>
                </option>
                <?php
                foreach ($materias as $materia) {
                    echo "<option value='$materia'>$materia</option>";
                }
                ?>
            </select>
            <?php if (isset($err_materia)) echo "<span class='error'>$err_materia</span>"; ?>
        </div>
        <div class="mb-3">
            <input type="hidden" name="nombre_original" value="<?php echo $estudiante['nombre'] ?>">
            <input class="btn btn-primary" type="submit" value="Modificar">
            <a href="index.php" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>
