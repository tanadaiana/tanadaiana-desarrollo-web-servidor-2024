<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
         $numero=[1,5,3,9,20,15,22,11];
         ?>
         <form action="" method="post">
         <label for="maximo">maximo</label>
         <imput type="text" name="maximo id="placeholder="introducion el maximo"
         <br></br>
         </form>
         <?php if($__server["REQUEST_METHOD"]=="POST"){

            $numero=$_POST["numero"];$candidato=$numero[0];

            for ($i=0; $i < count($numero); $i++) { 

                if($numero[$i]>$candidato)$candidato=$numero[$i];
            }
            $maximo=$candidato;

            if ($numero==$maximo) {
            echo"<h1¡has acertado el maximo es $numero</h1>";
            } else{
                
                echo "<h1>¡felicidades el maximo es $numero";
            }
         }
?>

</body>
</html>