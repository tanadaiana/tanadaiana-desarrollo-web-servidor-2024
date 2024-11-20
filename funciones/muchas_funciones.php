<?php
    function CalcularIrpf($salario) {
        $salario_final = null;
        
        $tramo1 = (12450 * 0.19);
        $tramo2 = ((20200 - 12450) * 0.24);
        $tramo3 = ((35200 - 20200) * 0.30);
        $tramo4 = ((60000 - 35200) * 0.37);
        $tramo5 = ((300000 - 60000) * 0.45);

        if($salario <= 12450) {
            $salario_final = $salario - ($salario * 0.19);
        } elseif ($salario > 12450 && $salario <= 20200) {
            $salario_final = $salario 
                - $tramo1 
                - (($salario - 12450) * 0.24); 
        } elseif ($salario > 20200 && $salario <= 35200) {
            $salario_final = $salario
                - $tramo1
                - $tramo2
                - (($salario - 20200) * 0.30);
        } elseif ($salario > 35200 && $salario <= 60000) {
            $salario_final = $salario 
                - $tramo1
                - $tramo2 
                - $tramo3
                - (($salario - 35200) * 0.37);
        } elseif ($salario > 60000 && $salario <= 300000) {
            $salario_final = $salario 
                - $tramo1
                - $tramo2 
                - $tramo3
                - $tramo4
                - (($salario - 60000) * 0.45);
        } else {
            $salario_final = $salario
                - $tramo1
                - $tramo2 
                - $tramo3
                - $tramo4
                - $tramo5
                - (($salario - 300000) * 0.47);
        }

        echo "<h3>El salario neto de $salario es $salario_final</h3>";
    }

    function CalcularIva($precio, $iva) {
        define("GENERAL", 1.21);
        define("REDUCIDO", 1.1);
        define("SUPERREDUCIDO", 1.04);

        $pvp = match($iva) {
            "general" => $precio * GENERAL,
            "reducido" => $precio * REDUCIDO,
            "superreducido" => $precio * SUPERREDUCIDO
        };

        echo "<h3> El PVP es $pvp </h3>";
    }

    function CalcularPrimos($desde, $hasta) {
        echo "<ul>";
        for($i = $desde; $i <= $hasta; $i++) {
            $esPrimo = TRUE;
            for($j = 2; $j < $i; $j++) {
                if($i % $j == 0) {
                    $esPrimo = FALSE;
                    break;
                }
            }
            if($esPrimo) {
                echo "<li>$i</li>";
            }
        }
        echo "</ul>";
    }
    <?php
    function calcularTemperatura ($grado, $temperatura,$temperatura2) {
       if (($temperatura != '') && ($temperatura2 != '')) {
           $resultado = 0;
       
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
       }
    }
   ?>