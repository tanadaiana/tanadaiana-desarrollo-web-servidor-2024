<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de animes - animes</title>
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
    function depurar(string $entrada) : string {
        $salida = htmlspecialchars($entrada);
        $salida = trim($salida);
        $salida = preg_replace('/\s+/', ' ', $salida);
        return $salida;
    }
    ?>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {                
                $tmp_nombre =depurar( $_POST["nombre"]);
                $tmp_peso = depurar($_POST["peso"]);
              /*  if(isset depurar(($_POST["genero"])) $tmp_genero= $_POST["genero"]);
                else $tmp_genero = "";*/
        
                $tmp_fecha_captura = depurar($_POST["fecha_captura"]);
               

        
                if($tmp_nombre == '') {
                    $err_nombre = "El nombre es obligatorio";
                } else {
                    if(strlen($tmp_nombre) < 3|| strlen($tmp_nombre) > 30) {
                        $err_nombre = "El nombre tiene que tener entre 3 y 30 caracteres";
                    } else {
                        $patron = "/^[a-zA-Z \ áéíóúÁÉÍÓÚ]+$/";
                        if(!preg_match($patron, $tmp_nombre)) {
                            $err_nombre = "El nombre solo puede contener letras 
                                o espacios en blanco";
                        } else {
                            var_dump($nombre = $tmp_nombre);
                            echo "<h2>El nombre es $nombre</h2>";
                        }
                    }
                }
            }
                
                if ($tmp_peso != '') {
                    if (strlen($tmp_peso) >= 1 && strlen($tmp_peso) <= 2) {
                        $patron = "/^[0-9]+$/";
                        if (preg_match($patron, $tmp_peso)) {
                            var_dump($num_temporadas = $tmp_peso);
                        } else $err_peso = "El número de peso solo puede contener caracteres numéricos.";
                    } else $err_peso = "El número de peso tiene como mínimo 1 caracter y como máximo 2 (1 a 99).";
                } else $err_peso = "El número de peso es obligatorio.";
            
            
            

            if($tmp_genero == '') {
                $err_genero = "La genero es obligatoria";
            } else {
                $genero_validas = ["masculino","femenino"];
                if(!in_array($tmp_genero, $genero_validas)) {
                    $err_genero = "Elige una genero válida";
                } else {

                }
            }
        
            



                $array_tipos = ["agua", "fuego", "volador", "planta", "electrico"];
                if (isset($_POST["tipo"])) {
                    $tmp_tipo= $_POST["tipo"];
                    if (in_array($tmp_tipo, $array_tipos)) {
                        var_dump($nombre_tipo = $tmp_tipo);
                    } else {
                        $err_tipo= "Elige un tipo válido.";
                    }
                } else {
                    $err_nombre_tipo = "El tipo es obligatorio.";
                }

                    /*anno_estreno: Es opcional y se elegirá mediante un campo de texto.
            Sólo aceptará valores numéricos entre 2024 y dentro de 30años (inclusive).*/     
                if ($tmp_fecha_captura != '') {
                    $patron = "/^[0-9]{4}$/";
                    if (preg_match($patron, $tmp_fecha_captura)) {
                        $anno_actual = date("Y");
                        if ($tmp_fecha_captura >= 2024) {
                            $anno_estreno = $tmp_fecha_captura;
                        } else $err_anno_estreno = "El año de estreno no puede ser anterior a 2024.";
                        if ($tmp_fecha_captura <= ($anno_actual + 30)) {
                            var_dump($anno_estreno = $tmp_fecha_captura);
                        } else $err_fecha_captura= "El año de estreno no puede ser mayor a " . ($anno_actual + 30);
                        
                        
                    } else $err_anno_estreno = "El año de estreno solo puede contener 4 números.";
                }
            

        ?>


         <form action = "" method = "post">
        
            <div class="mb-3">
                <label for = "nombre">nombre</label><br>
                <?php if(isset($err_nombre)) echo "<span class = 'error'>$err_nombre</span>"; ?> <br>
                <input type = "text" name = "nombre" id = "nombre">
            </div> 
            <div class="mb-3">
                <label for="peso">peso</label><br>
                <?php if (isset($err_peso)) echo "<span class = 'error'>$err_peso</span>"; ?><br>
                <input type="number" name = "peso" id = "peso">
            </div> 
            <div class="mb-3">
                <label class="form-label">genero</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" value="masculino">
                    <label class="form-check-label">masculino</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" value="femenino">
                    <label class="form-check-label">femenino</label>
                </div>   
                <?php if(isset($err_genero)) echo "<span class='error'>$err_genero</span>" ?>       
            <div class="mb-3">
                <label for = "tipos">tipos</label><br>
                <?php if(isset($err_tipos)) echo "<span class = 'error'>$err_tipos</span>"; ?><br>
                <select name="tipos" id = "tipos">
                    <option disabled selected hidden>~ tipos ~</option>
                <?php
                $array_tipos = ["agua", "fuego", "volador", "planta", "electrico"];
                for ($i = 0; $i < count($array_tipos); $i++) {
                    echo "<option value='$array_tipos[$i]'>$array_tipos[$i]</option>";
                }
                ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="fecha_captura">fecha captura</label><br>
                <?php if(isset($err_fecha_captura)) echo "<span class = 'error'>$err_fecha_captura</span>"; ?><br>
                <input type="date" name = "fecha_captura" id = "fecha_captura">
            </div>
         
            <input type="submit" value = "Enviar">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>