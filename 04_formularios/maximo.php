<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maximo</title>
</head>
<body>
    <!--CREAR CON NUMEROS A VUESTRA ELECIÓN

    MOSTRAR DICHOS NUMEROS DE LA FORMA QUE MAS OS GUSTE

    CREAR UN FORMULARIO DONDE SE INTENTE INTRODUCIR EL MAXIMO VALOR
    Y SE COMPRUEBE SI HAS ACERTADO-->
<form action="" method="post">
    <label for="maximo">MÁXIMO</label>
    <input type="text" name="maximo" id="maximo" placeholder="Introduce el maximo">
</form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $numero = $_POST["numero"];
            $candidato = $numeros[0];

            for($i = 0; $i < count($numeros); $i++){
                if($numeros[$i] > $candidato) $cadidato = $numeros[$i];
            }
            $maximo = $candidato;

            if($numero == $maximo){
                echo "<h1¡Has acertado! El maximo es $numero</h1>";
            }else{
                echo "<h1>¡Fallaste! El maximo es $maximo</h1>";
            } 
        }
     ?>

</body>
</html>
