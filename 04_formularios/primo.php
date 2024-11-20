<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" method="post">
    <input type="number" name="num1" placeholder="Introduce numero 1"><br><br>
    <input type="number" name="segundoNumero" placeholder="Introduce numero 2"><br><br>


<input type="submit" value="enviar">


<?php
    

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $primerNum = $_POST["num1"];
        $segundoNumero= $_POST["segundoNumero"]; 

        if($primerNum > $segundoNum){
          
            echo "no esta en el rango";
        }else{
            
            echo "<ul>";

            //itero en el rango de numeros va desde el primer numero hasta que sea menor o igual que el segundo
            for($i= $num1; $i <= $segundoNumero; $i++ ){
                $esPrimo = true; 

                if($i <= 1){
                    // Un número primo es mayor que 1 y solo divisible por 1 y por sí mismo-
                    $esPrimo = false;
                }else{
                   // Compruebo si el número es divisible por algún número entre 2 y sqrt($i) --> raiz cuadrada
                   
                   for($j = 2; $j <= sqrt($i); $j++){

                    if($i % $j == 0){
                        //si es divisible por culaquier numero no es primo-----------
                        $esPrimo = false;
                   }
                }
            }
            //si es primo los imprimo-------
            if($esPrimo){
                echo "<li>El numero $i es primo</li>";

            }      
        } 
        echo "</ul>";
    }
}
?>
</form>
</body>
</html>
