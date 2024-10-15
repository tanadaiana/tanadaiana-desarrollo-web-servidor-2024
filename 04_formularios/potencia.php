
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potencia</title>
</head>
<body>
<!--CREAR UN FORMULARIO QUE RECIBA 2 NUMEROS: BASE Y EXPONENTE
    SE MOSTRARA EL RESULTADO DE ELEVAR LA BASE AL EXPONENTE
    EJEMPLOS: 
    2 ELEVADO A 3 = 8 -> 2 x 2 x 2 
    3 ELEVADO A 2 = 9 -> 3 x 3
    2 ELEVADO A 1 = 2 -> 2
    2 ELEVADO A 0 = 1
    -->
    <form action="" method="post">
        <input type="text" name="num1">
        <input type="text" name="num2">
        <input type="submit" value="Enviar">
        
    </form>
    <?php
         if($_SERVER["REQUEST_METHOD"] == "POST"){
            /**
             * El servidor ejecutara este bloque de codigo cuando reciba una peticion
             * a traves del metodo POST
             */
            $base = $_POST["num1"];//base
            $esponente = $_POST["num2"];//exponente
            $resultado = 1;

            for($i = 0; $i < $esponente; $i++){
                    $resultado = $resultado * $base;
            }
            echo "<h1>$resultado</h1>";

        }
    ?>
</body>
</html>
