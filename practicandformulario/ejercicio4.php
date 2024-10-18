<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Grados</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
</head>
<body>
    <form action="" method="post">
        <label for="grado">Conversor de grados:</label>
        <input type="text" name="grado" id="grado" required>

        <label for="temperatura">Temperatura de origen:</label>
        <select name="temperatura" id="temperatura" required>
            <option value="celsius">Celsius</option>
            <option value="kelvin">Kelvin</option>
            <option value="fahrenheit">Fahrenheit</option>
        </select>

        <label for="temperatura2">Temperatura de destino:</label>
        <select name="temperatura2" id="temperatura2" required>    
            <option value="celsius">Celsius</option>
            <option value="kelvin">Kelvin</option>
            <option value="fahrenheit">Fahrenheit</option>
        </select>

        <input type="submit" value="Convertir">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $grado = $_POST["grado"];
        $temperatura = $_POST["temperatura"];
        $temperatura2 = $_POST["temperatura2"];
    
        
            $opcion = match (true) {
                ($temperatura == "celsius") && ($temperatura2 == "celsius") => $grado,
                ($temperatura == "celsius") && ($temperatura2 == "fahrenheit") => ($grado * 9/5) + 32,
                ($temperatura == "celsius") && ($temperatura2 == "kelvin") => $grado + 273.15,
    
                ($temperatura == "kelvin") && ($temperatura2 == "kelvin") => $grado,
                ($temperatura == "kelvin") && ($temperatura2 == "fahrenheit") => (($grado - 273.15) * 9/5) + 32,
                ($temperatura == "kelvin") && ($temperatura2 == "celsius") => $grado - 273.15,
    
                ($temperatura == "fahrenheit") && ($temperatura2 == "fahrenheit") => $grado,
                ($temperatura == "fahrenheit") && ($temperatura2 == "kelvin") => (($grado - 32) * 5/9) + 273.15,
                ($temperatura == "fahrenheit") && ($temperatura2 == "celsius") => ($grado - 32) * 5/9,
    
                default => "Conversión no soportada.",
            };
    
            echo "<p>La temperatura convertida es: $opcion $temperatura2.</p>";
        }?>
    
    </body>
</html>
<!--EJERCICIO 4: Realiza un formulario que funcione a modo de conversor de temperaturas.
 Se introducirá en un campo de texto la temperatura, y luego tendremos un select para elegir las unidades de dicha temperatura,
  y otro select para elegir las unidades a las que queremos convertir la temperatura.

Por ejemplo, podemos introducir "10", y seleccionar "CELSIUS", y luego "FAHRENHEIT". Se convertirán los 10 CELSIUS a su equivalente en FAHRENHEIT.

En los select se podrá elegir entre: CELSIUS, KELVIN y FAHRENHEIT -->
