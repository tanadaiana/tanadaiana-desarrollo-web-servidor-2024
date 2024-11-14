<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require("../05_Funciones/Muchas_Funciones.php");
    <h1>Formulario de IVA</h1>
    <form action = "" method = "post">
        <label for = "nomre_estudio">IVA</label>
        <select name = "nombre_estudio" id = "nombre_estudio">
            <option disabled selected hidden>--- Elige opción ---</option>
            <option value = "Studio Ghibli">Studio Ghibli</option>
            <option value = "Madhouse">Madhouse</option>
            <option value = "Toei Animation">Toei Animation</option>
            <option value = "Bones ">Bones </option>
            <option value = "MAPPA">MAPPA</option>
        </select><br><br>
        <input type = "hidden" name = "accion" value = "formulario_iva">
        <input type = "submit" value = "Calcular PVP">
    </form>
    ?>
    <title>Document</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $tmp_titulo = $_POST["titulo"];
        $tmp_apellidos = $_POST["apellidos"];
        $tmp_fecha_nacimiento = $_POST["fecha_nacimiento"];

    
        if ($tmp_titulo == '') {
            $err_titulo = "El titulo es obligatorio";
        } else {
            if (strlen($tmp_titulo) < 2 || strlen($tmp_titulo) > 80) {
                $err_titulo= "El titulo tiene que tener entre 2 y 30 caracteres";
            } else {
                $patron = "/^.{1,80}$/";
                if (!preg_match($patron, $tmp_titulo)) {
                    $err_titulo = "El nombre solo puede contener letras o espacios en blanco.";
                } else {
                    $titulo = $tmp_titulo;
                }
            }
        }

        $resto = $numeros % 5;
        $letra_dni = substr($tmp_dni, 8, 1); //hay que especificar el length, en este caso 1, porque sino va a coger hasta el final de la cadena.
        $name_estudio = ["Studio Ghibli","Madhouse","Toei Animation","Bones ","MAPPA"];
        if($tmp_nombre_estudio == '') {
            $err_apellidos = "Los apellidos es obligatorio";
        } else {
            if(strlen($tmp_nombre_estudio) < 2 || strlen($tmp_nombre_estudio) > 30) {
                $err_apellidos = "Los apellidos tienen que tener entre 2 y 30 caracteres";
            } else {
                $patron = "/^[a-zA-Z\ áéíóúÁÉÍÓÚ]+$/";
                if(!preg_match($patron, $tmp_nombre_estudio)) {
                    $err_nombre_estudio = " el nombre_estudio de nombre_estudio solo pueden contener letras 
                        o espacios en blanco";
                } else {
                    $nombre_estudio = $tmp_nombre_estudio;
                    echo "<h2>Los apellidos son $nombre_estudio</h2>";
                }
            }
        }



         //  [0-9]{4}\-[0-9]{2}\-[0-9]{2}
         if($tmp_anno_estreno == '') {
            $err_anno_estreno = "La fecha de nacimiento es obligatoria";
        } else {
            $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
            if(!preg_match($patron,$tmp_anno_estreno )) {
                $err_anno_estreno = "El formato de la fecha es incorrecto";
            } else {
                $fecha_actual = date("Y-m-d");  //  2024 25 10
                list($anno_actual,$mes_actual,$dia_actual) = explode('-',$fecha_actual);
            }
        }
    }
        //  [0-9]{4}\-[0-9]{2}\-[0-9]{2}
        if($tmp_num_temporada == '') {
            $err_num_temporada = "La fecha de nacimiento es obligatoria";
        } else {
            $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
            if(!preg_match($patron,$tmp_num_temporada  )) {
                $err_num_temporada  = "El formato de la fecha es incorrecto";
            } else {
                $fecha_actual = date("Y-m-d");  //  2024 25 10
                list($anno_actual,$mes_actual,$dia_actual) = explode('-',$fecha_actual);
            }
        }
    
        ?>
    
</body>
</html>