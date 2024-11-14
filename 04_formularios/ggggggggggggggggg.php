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
    ?>
    <style>
        .error{color: red; font-style: italic}
    </style>
</head>
<body>
<div class="container">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {                
                $tmp_nombre_estudio = $_POST["nombre_estudio"];
                $tmp_ciudad = $_POST["ciudad"];


                /*nombre_estudio: Es obligatorio y solo podrá contener letras, números y espacios en blanco.*/
                if ($tmp_nombre_estudio == '') {
                    $err_nombre_estudio = "El nombre es obligatorio";
                } else {
                    if (strlen($tmp_nombre_estudio) < 2 || strlen($tmp_nombre_estudio) > 30) {
                        $err_nombre_estudio= "El nombre tiene que tener entre 2 y 30 caracteres";
                    } else {
                        $patron = "/^[a-zA-Z0-9 ]+$/";
                        if (!preg_match($patron, $tmp_nombre_estudio)) {
                            $err_nombre = "El nombre solo puede contener letras ,numero o espacios en blanco.";
                        } else {
                            $nombre_estudio = $tmp_nombre_estudio;
                        }
                    }
                }
        /* Es obligatorio y solo podrá contener letras y espacios en blanco.*/
                if ($tmp_apellidos == '') {
                    $err_apellidos = "El nombre es obligatorio";
                } else {
                    if (strlen($tmp_apellidos) < 2 || strlen($tmp_apellidos) > 30) {
                        $err_apellidos = "El nombre tiene que tener entre 2 y 30 caracteres";
                    } else {
                        $patron = "/^[a-zA-Z ]+$/";
                        if (!preg_match($patron, $tmp_nombre)) {
                            $err_apellidos = "El nombre solo puede contener letras o espacioes en blanco.";
                        } else {
                            $apellidos = $tmp_apellidos;
                        }
                    }
                }
                <form action = "" method = "post">
                <div class="mb-3">
                <label for="nombre_estudio">titulo>/label><br>
                <?php if(isset($err_nombre_estudio)) echo "<span class = 'error'>$err_nombre_estudio</span>"; ?><br>
                <input type="text" name = "nombre_estudio" id = "nombre_estudio">
            </div>
                <div class="ciudad">
                <label for="ciudad">ciudad</label><br>
                <?php if (isset($err_ciudad)) echo "<span class = 'error'>$err_ciudad</span>"; ?><br>
                <input type="text" name = "ciudad" id = "ciudad">
            </div>
            <input type="submit" value = "Enviar">
        </form>
    </div>
               
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
    </html>
    
</body>
</html>/*El formulario de los estudios lo crearemos en un fichero llamado “nuevo_estudio.php” y tendrá los siguientes campos:
nombre_estudio: Es obligatorio y solo podrá contener letras, números y espacios en blanco.
ciudad: Es obligatorio y solo podrá contener letras y espacios en blanco.
*/