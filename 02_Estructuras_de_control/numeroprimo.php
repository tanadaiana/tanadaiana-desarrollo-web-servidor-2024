<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="desde" placeholder="desde">
        <input type="text" name="hasta" placeholder="hasta">
        <input type="text" name="num"  placeholder="num">


    </form>
    <?php
    iff ($_SERVER["REQUEST_METHOD"]=="POST"){
        $desde =$_POST["desde"];
        $hasta= $_POST["hasta"];
        $numero3=  $_POST["num"];
    

for ($i=desde; $i < $hasta; $i++) { 
    $primo=true;
    for ($j=2; $j < $i; $j++) { 
    if ($numero % i ==0) 
    $primo=false;
        break;
}
if ($primo) {
    contador++
    echo "<h4> el numero $numero es primo </h4>";
}else {
    echo "<h4> el numero $numero no  primo </h4>";*/
    }?>
</body>
</html>

<!--modo alejandra
$desde=5;
$hasta=10;

/*for ($i=desde; $i < $hasta; $i++) { 
    $primo=true;
    for ($j=2; $j < $i; $j++) { 
    if ($numero % i ==0) 
    $primo=false;
        break;
}
if ($primo) {
    contador++
    echo "<h4> el numero $numero es primo </h4>";
}else {
    echo "<h4> el numero $numero no  primo </h4>";*/
    }
    */-->


    <!--
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
-->