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