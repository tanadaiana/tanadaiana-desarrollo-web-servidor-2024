<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CALCULAR EL IVA </title>
    //ACTIVAR EL ERROR
    <?php
//DECLARAR CONSTANTES
    define("GENERAL",1.21);
    define("REDUCIDO",1.1);
    define("SUPERREDUCIDO",1.04);


    ?>
</head>
<body>
              

<form action=""   method="post">             <!--action"" ,recarga la pag       -->
    
    <label for="precio>precio </label>           <!--label etiqueta     -->
    <imput type="number" name ="precio" id="precio"> <br><br>   
    <label for="iva"> iva </label>             <!--for te linkea la pag,lo que sea te manda a la pag    -->
    <select name="iva" id="iva" >
        <option value="general">general</option>
        <option value="reducido">reducido</option>
        <option value="superreducido">superreducido</option>    <!--boton enviar      -->
</select><br><br>
<imput type="submit" value="calcular pvp">
</form>

<?php
if ($__SERVER) ["REQUEST__METHOD"]=="POST"{
    $precio =$_POST["precio"];
    $iva = = $_POST["precio"];

    $pvp=match ($iva){
        "general"=> $precio * GENERAL, //ESTA MULTIPLICANDO POR EL 1,21 IVA 
        "reducido"=> $precio * REDUCIDO,
        "superreducido"=> $precio * SUPERREDUCIDO,
    };
 echo "el pvp es $pvp";
    
}

?>





</body>
</html>