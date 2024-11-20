<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );

        require('../05_funciones/edades.php'); // Incluir funciones relacionadas con la edad
        require('../05_funciones/potencias.php');
    ?>
</head>
<body>
    <h1>Formulario edad</h1>
    <form action="" method="post">
        <input type="text" name="nombre" placeholder="Nombre"><br><br>
        <input type="text" name="edad" placeholder="Edad"><br><br>
        <input type="hidden" name="accion" value="formulario_edad">   <!-- Indicar la acción del formulario -->
        <input type="submit" value="Comprobar">
    </form>
    <!--
    
    Depende del value de accion, se hace una cosa u otra en el codigo
    
    Puede tener el nombre que sea, pero todos los formularios tendran el mismo nombre (aqui 'accion').
    -->
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST["accion"] == "formulario_edad") {       // Comprobar si la acción es 'formulario_edad'
            $nombre = $_POST["nombre"];
            $edad = $_POST["edad"];

            comprobarEdad($nombre, $edad);
        }
    }
    ?>
    <br><br>
    <h1>Formulario potencia</h1>
    <form action="" method="post">
        <input type="text" name="base" placeholder="Base"><br><br>
        <input type="text" name="exponente" placeholder="Exponente"><br><br>
        <input type="hidden" name="accion" value="formulario_potencia">
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["accion"] == "formulario_potencia") {
            $tmp_base = $_POST["base"]; //tmp para comprbar que no se ha metido nada "raro"
            $tmp_exponente = $_POST["exponente"];

            //validacion de la base
            if ($tmp_base != ''){                           // Verificar que la base no esté vacía
                if (is_numeric($tmp_base)) {         // Verificar que la base sea un número
                    if ($tmp_base > 0) {                      // Verificar que la base sea mayor a 0
                        $base = $tmp_base;                          // Asignar la base si es válida
                    } else {
                        echo "<p>La base debe ser mayor a 0.</p>";
                    }
                } else {
                    echo "<p>La base debe ser un número.</p>";
                }
            } else {
                echo "<p>La base es obligatoria</p>";
            }

            //validacion de la exponente

            if ($tmp_exponente != ''){                              //<!--El exponente es obligatorio-->
                if (is_numeric($tmp_exponente)) {           //<!--El exponente debe ser un número, -->
                    if ($tmp_exponente > 0) {                       //<!--El exponente debe ser mayor a 0-->
                        $exponente = $tmp_exponente;                 // Asignar la base si es válida
                    } else {
                        echo "<p>El exponente debe ser mayor a 0.</p>";
                    }
                } else {
                    echo "<p>El exponente debe ser un número.</p>";
                }
            } else {
                echo "<p>El exponente es obligatorio.</p>";
            }

            // Comprobar si las variables $base y $exponente están definidas y no son nulas
            if(isset($base) && isset($exponente)) {    //<!-- las variables $base y $exponente están definidas y no son null.si es true se ejecuta-->
                $resultado = calcularPotencia($base, $exponente);        //<!--si paso todo los filtro llamo ala funcion y hago el calculo-->
                echo "<h1>$resultado</h1>";

            }
        }
    }
    ?>
</body>
</html>
