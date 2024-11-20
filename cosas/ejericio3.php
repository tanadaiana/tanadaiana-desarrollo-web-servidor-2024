<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
</head>
<body>

    <form action="" method="post">
        <label for="numero1">Número 1:</label>
        <input type="number" name="numero1" id="numero1" required>

        <label for="numero2">Número 2:</label>
        <input type="number" name="numero2" id="numero2" required>

        <input type="submit" value="Buscar Primos">
    </form>

    <?php
    // Verificar si el formulario fue enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero1 = $_POST["numero1"];
        $numero2 = $_POST["numero2"];

        // Asegurarse de que numero1 sea menor o igual que numero2
        if ($numero1 > $numero2) {
            $temp = $numero1;
            $numero1 = $numero2;
            $numero2 = $temp;
        }

        // Inicializar el contador
        $i = $numero1;

        // Bucle while para recorrer los números en el rango
        echo "<p>Números primos entre $numero1 y $numero2:</p>";
        echo "<p>";

        while ($i <= $numero2) {
            // Comprobar si $i es primo
            $esPrimo = true;

            if ($i < 2) {
                $esPrimo = false; // Números menores a 2 no son primos
            } else {
                $j = 2;
                while ($j <= sqrt($i)) { // Bucle para verificar si tiene divisores
                    if ($i % $j == 0) {
                        $esPrimo = false;
                        break; // No es primo, salir del bucle
                    }
                    $j++;
                }
            }

            // Si $i es primo, lo mostramos
            if ($esPrimo) {
                echo $i . " ";
            }

            $i++; // Incremento del contador
        }

        echo "</p>";
    }
    ?>
</body>
</html>