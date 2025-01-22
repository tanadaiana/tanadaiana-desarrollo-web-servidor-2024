<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('../util/conexion.php');
    ?>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_usuario = $_POST["usuario"];
     
        $tmp_contrasena = $_POST["contrasena"];

        $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios VALUES ('$usuario', '$contrasena_cifrada')";
        $_conexion -> query($sql);

        $usuarios_registrados = []; // Esto debe provenir de una base de datos.

        // Validación de usuario
        if($tmp_usuario == '') {
            $err_usuario = "El usuario es obligatorio";
        } else {
            if(strlen($tmp_usuario) < 3 || strlen($tmp_usuario) > 15) {
                $err_usuario = "El usuario tiene que tener entre 3 y 15 caracteres";
            } else {
                $patron = "/^[a-zA-Z0-9_]+$/";
                if(!preg_match($patron_usuario, $tmp_usuario)) {
                    $err_usuario = "El usuario solo puede contener letras, números o guion bajo";
                } else {
                    // Verificar si el usuario ya existe
                    if(!in_array( $tmp_usuario,$usuarios_registrados)) {
                        $err_usuario = "El nombre de usuario ya está en uso.";
                    } else {
                        $usuario = $tmp_usuario;
                        echo "<h2>El usuario es $usuario</h2>";
                    }
                }
            }
        }

            if($tmp_contrasena == '') {
                $err_contrasena = "La contraseña es obligatoria";
            } else {
                $patron_contrasena = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,15}$/";
                if(!preg_match($patron_contrasena, $tmp_contrasena)) {
                    $err_contrasena = "La contraseña debe tener entre 8 y 15 caracteres, 
                        incluir al menos una letra mayúscula, una letra minúscula, 
                        un número y un carácter especial";
                } else {
                    $contrasena = $tmp_contrasena;
                    echo "<h2>La contraseña es válida</h2>";
                }
            }
        }
    ?>
    <div class="container">
        <h1>Formulario de registro</h1>
        <form class="col-4" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" type="text" name="usuario"   placeholder="Usuario">
                <?php if(isset($err_usuario)) echo "<span class='error'>$err_usuario</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control"  type="password" name="contrasena"  placeholder="contrasena">
                <?php if(isset($err_contrasena)) echo "<span class='error'>$err_contrasena</span>"; ?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Registarse">
            </div>
        </form>
        <h3>O, si ya tienes cuenta, inicia sesión</h3>
        <a class="btn btn-secondary" href="iniciar_sesion.php">Iniciar sesión</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>