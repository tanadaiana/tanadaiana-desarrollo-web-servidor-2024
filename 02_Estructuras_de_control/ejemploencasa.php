<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> <?php
        $dia = date("l");
/* Hacer el ejercicio del random(1,3) usando match */
        $num_random = rand(1,3);
        $resultado_random = match ($num_random) {
            1 => "<p>El número es $num_random</p>",
            2 => "<p>El número es $num_random</p>",
            3 => "<p>El número es $num_random</p>"
        };
        echo $resultado_random;

        /* Hacer el ejercicio de par/impar usando match */
        $num_unodiez = rand(1,10);
        $parimpar = $num_unodiez % 2;
        $resultado_unodiez = match ($parimpar) {
            0 => "<p>El número $num_unodiez es par</p>",
            1 => "<p>El número $num_unodiez es impar</p>"
        };
        echo $resultado_unodiez;
        -------------
        <?php
        $edad = rand(-10,140);
        if ($edad >= 0 && $edad <= 4) {
            echo "<p>La persona tiene $edad años y es un BEBÉ.</p>";
        } else if ($edad >= 5 && $edad <= 17) {
            echo "<p>La persona tiene $edad años y es MENOR DE EDAD.</p>";
        } else if ($edad >= 18 && $edad <=65) {
            echo "<p>La persona tiene $edad años y es ADULTO.</p>";
        } else if ($edad >= 66 && $edad <= 120) {
            echo "<p>La persona tiene $edad años y es JUBILADO.</p>";
        } else {
            echo "<p>Es imposible que una persona tenga $edad años...</p>";
        }
    
        $resultado = match (true) {
            $edad >= 0 && $edad <= 4 => "<p>La persona tiene $edad años y es un BEBÉ.</p>",
            $edad >= 5 && $edad <= 17 => "<p>La persona tiene $edad años y es MENOR DE EDAD.</p>",
            $edad >= 18 && $edad <= 65 => "<p>La persona tiene $edad años y es ADULTO.</p>",
            $edad >= 66 && $edad <= 120 => "<p>La persona tiene $edad años y es JUBILADO.</p>",
            default => "<p>Es imposible que una persona tenga $edad años...</p>"
        };
    
        echo $resultado;
        -------------------
         $dia = date('l'); //Dias de la semana completos
        $mes = date('F'); //Mes escrito completo
    
        $dia = match ($dia) {
            "Monday" => "Lunes",
            "Tuesday" => "Martes",
            "Wednesday" => "Miércoles",
            "Thursday" => "Jueves",
            "Friday" => "Viernes",
            "Saturday" => "Sábado",
            "Sunday" => "Domingo"
        };
    
        $mes = match ($mes) {
            "January" => "Enero",
            "February" => "Febrero",
            "March" => "Marzo",
            "April" => "Abril",
            "May" => "Mayo",
            "June" => "Junio",
            "July" => "Julio",
            "August" => "Agosto",
            "September" => "Septiembre",
            "October" => "Octubre",
            "November" => "Noviembre",
            "December" => "Diciembre"
        };
    
        $dia_numero = date('d'); //dia del mes
        $anio = date('Y'); //año con cuatro digitos
    
        echo "$dia $dia_numero de $mes de $anio";
    
    
        /*
            Hacer un bucle que compruebe si un número es primo.
            Bucle desde 2 hasta n-1, si algun resto = 0, no es primo
        */
    
        $j = 2;
        $number = 15;
        $primo = true;
        while (($j < $number - 1) && ($primo)) {
            if ($number % 2 == 0) {
                $primo = false;
            }
            $j++;
        };
    
        if ($primo) {
            echo "<p>El número $number es primo.</p>";
        } else {
            echo "<p>El número $number no es primo.</p>";
        };
    
    
        /*
            Muestra por pantalla los 50 primeros numeros primos.
        */
    
        $numero_primo = 10;
        $contador = 0;
        $k = 0;
    
        echo "<ul>";
        
        while ($contador < 50) {
            $es_primo = true;
            $k = 0;
            while (($k < $numero_primo) && ($es_primo)) {
                if ($numero_primo % $k == 0) {
                    $es_primo = false;
                }
                $k++;
            }
            if ($es_primo) {
                echo "<li>$numero_primo</li>";
                $contador++;
            }
            $numero_primo++;
            
        }
    
        echo "</ul>";
    
    
    
        // Calcular el fibonacci de los 10 primeros números primos
    
        ?>
        $dia = date("j");

        if ($dia % 2 == 0) {
            echo "<p>El día es par</p>";
        } else {
            echo "<p>El día es impar</p>";
        }
        //COn while y las estrucutas de control necesarias, muestra en una lista sin ordenar todos los multiplos de 3 entre 1 y 30
        echo "<h3>Múltiplos de 3</h3>";
        $i = 1;
        echo "<ul type = 'square'>";
        while ($i <= 30) {
            if ($i % 3 == 0) {
                echo "<li>$i</li>";
            }
            $i++;
        }
        echo "</ul>"
          //   Rangos: [-10,0), [0,10], (10,20]
    if ($numero >= -10 && $numero < 0) { //Se puede usar ampersand
        echo "El numero $numero está en el rango [-10,0)";
    } else if ($numero >= 0 and $numero <= 10) { //Se puede usar and
        echo "El numero $numero está en el rango [0,10]";
    } elseif ($numero > 10 && $numero <= 20) {
        echo "El numero $numero está en el rango (10,20]";
    } else {
        echo "El numero no está en ningun rango";
    }

    echo "<br>";

    if ($numero >= -10 && $numero < 0): //Se puede usar ampersand
        echo "El numero $numero está en el rango [-10,0)";
    elseif ($numero >= 0 and $numero <= 10): //Se puede usar and
        echo "El numero $numero está en el rango [0,10]";
    elseif ($numero > 10 && $numero <= 20):
        echo "El numero $numero está en el rango (10,20]";
    else:
        echo "El numero no está en ningun rango";
    endif;

    echo "<br>";

    /*
        $numero1 = 3;
        $numero2 = 4;

        Escribir un if que decida cual de los dos numeros es mayor, o si son iguales.
        Hacerlo de dos dormas diferentes.
    */

    $numero1 = 20;
    $numero2 = 20;

    if ($numero1 > $numero2) {
        echo "<p>$numero1 es mayor que $numero2</p>";
    } else if ($numero2 > $numero1) {
        echo "<p>$numero2 es mayor que $numero1</p>";
    } else {
        echo "<p>Los numeros son iguales.</p>";
    }

    if ($numero1 > $numero2) echo "<p>$numero1 es mayor que $numero2</p>";
    else if ($numero2 > $numero1) echo "<p>$numero2 es mayor que $numero1</p>";
    else echo "<p>Los numeros son iguales.</p>";


    //   Rangos: [-10,0), [0,10], (10,20]
    $numero = rand(-10,20);
    $resultado = match(true) {
        $numero >= -10 && $numero <0 => "El número $numero está en el rango [-10,0)",
        $numero >= 0 && $numero <= 10 => "El número $numero está en el rango [0,10]",
        $numero > 10 && $numero <= 20 => "El número $numero está en el rango (10,20]"
    };
    echo $resultado;
    
    $random = rand(1,10);

    switch ($random) {
        case ($random % 2 == 0):
            echo "<p>El número $random es par.</p>";
            break;
        case ($random % 2 == 1):
            echo "<p>El número $random es impar.</p>";
            break;
    }
?>
    
    ?>
</body>
</html>