
  
  <?php
function primosRango ($desde, $hasta) {
for ($i=$desde; $i < $hasta; $i++) { 
    $primo=true;
    if($i <= 1){
        // Un número primo es mayor que 1 y solo divisible por 1 y por sí mismo-
        $esPrimo = false;
    }else{
       // Compruebo si el número es divisible por algún número entre 2 y sqrt($i) --> raiz cuadrada
       for($j = 2; $j <= sqrt($i); $j++){

             if ($primo % i == 0) 
            $primo=false;
        break;
    }
}
}
if ($primo) {
    //i+1;
    echo "<h4> el numero $primo es primo </h4>";
}else {
    echo "<h4> el numero $primo no  primo </h4>";
    }
}

    ?>
      