<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edades</title>
</head>
<body>
    <!--Crear un formulario que reciba dos valores: el nombre y la edad de una persona
    
        Si la persona tiene:
        < 18 años, se mostrara "X ES MENOR DE EDAD" (X es el nombre)
        >= 18 && < 65, SE MONSTRARA "x ES MAYOR DE EDAD"
        >= 65, se mostrara "X SE HA JUBILADO"

            hacer la logica con un match-->
        
        <form action="" method="post">
            <input type="text" name="nombre"><br><br>
            <input type="text" name="edad">
            <input type="submit" value="Comprobar"> 
        </form>
        
        <?php

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nombre = $_POST["nombre"];
            $edad = $_EDAD["edad"];

            $resultado = match(true){
                $edad < 18 => "es menor de edad",
                $edad >= 18 and $edad < 65 => "es mayor de edad",
                $edad >= 65 => "se ha jubilado"
            };

            echo "<h1>$nombre $resultado</h1>";
        }





             $res = match ($dia_espanol) {
                "Martes" => "<p>Hoy $dia_espanol si tenemos clase de web servidor</p>" ,
                "Miercoles" => "<p>Hoy $dia_espanol si tenemos clase de web servidor</p>" ,
                "Viernes" => "<p>Hoy $dia_espanol si tenemos clase de web servidor</p>",
                default => "<p>Hoy $dia_espanol no tenemos clase de web servidor</p>"
            };
         ?>
</body>
</html>