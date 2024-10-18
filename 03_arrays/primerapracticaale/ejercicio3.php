<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<label for="primerNum">primerNum:</label>
        <select name="primerNum" id="primerNum" >   
            <option value="par">par</option>
            <option value="primo">inmpar</option>
        </select>
        <input type="submit" value="enviar">
    </form>
<?php
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $primerNum = $_POST["primerNum"];

        if($primerNum < 0){
            echo "no esta en el rango";
        }else{
            echo "<ul>";
            //itero en el rango de numeros va desde el primer numero hasta que sea menor o igual que el segundo
            for($i=1; $i <= $primerNum; $i++ ){
                $esPrimo = true; 
                if($i <= 1){
                    // Un número primo es mayor que 1 y solo divisible por 1 y por sí mismo-
                    $esPrimo = "primo";
                }else{
                   for($i= 1; $i <= $primerNum; $i++ ){
                    if($esPrimo  % 2==0){
                        $esPrimo ="par" ;
                   }
                }
            }
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


