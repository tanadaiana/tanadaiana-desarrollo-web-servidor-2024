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
<form action=" "    method="post">
        <label for="cantidad"> conversor de dinero</label>
        <input type="text" name="cantidad" id="cantidad" placeholder="placeholder: cantidad" >

        <label for="monedaorigen" ></label>
        <input type="text" name ="monedaorigen" id="monedaorigen" placeholder="monedaorigen">
        <label for="monedadestino"></label>
        <input type="text" name="monedadestino" id="monedadestino" placeholder="monedadestino">
        <input type="submit" value="enviar">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $cantidad=$_POST["cantidad"];
        $monedaorigen=$_POST["monedaorigen"];  
        $monedadestino=$_POST["monedadestino"];
        

        opcion=match (true) {
          $monedaorigen == 'EUR' && $monedadestino ==  'EUR'   =>  1,
          $monedaorigen == 'EUR' && $monedadestino ==   'USD' =>  1.09,
          $monedaorigen == 'EUR' && $monedadestino ==    'JPY'=>  156.45,

          $monedaorigen ==  'USD' && $monedadestino ==  'USD'   => 1 ,
          $monedaorigen ==  'USD' && $monedadestino ==  'JPY'=>  1.09,
          $monedaorigen ==  'USD' && $monedadestino ==  'EUR'   =>  1.09,

          $monedaorigen ==  'JPY' && $monedadestino ==  'JPY'  =>  1,
          $monedaorigen ==  'JPY' && $monedadestino ==   'EUR' =>  0.0064,
          $monedaorigen ==  'JPY' && $monedadestino ==  'USD'  =>  0.0067,
          
          default => 0.0,  
        };
        if ($opcion> 0) {
            $resultado = $cantidad * $opcion;
            echo "La cantidad de $cantidad $monedaOrigen es equivalente a $resultado $monedaDestino.";
        } else {
            echo "Conversión de $monedaOrigen a $monedaDestino no soportada.";
    }
     }
     ?>
    
</body>
</html>
