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
    <form action=" " method="post">
        <input type="number" name="numero1" id="numero1">
        <input type="number" name="numero2" id="numero2">
        <input type="number" name="numero3" id="numero3">
        <input type="submit" name="Buscar mayor">
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $numero1=$_POST["numero1"];//post es una variable global( es un array) gusrdo dentro de la varaiable $numero1 la variable del name,id que puse en el formulario
            $numero2=$_POST["numero2"];
            $numero3=$_POST["numero3"];
            $mayor=$numero1;
            if($numero2>$mayor) $mayor=$numero2; 
            if($numero3>$mayor) $mayor=$numero3;
            echo "<p>El mayor es $mayor</p>";
        }
    ?>
</body>
</html>