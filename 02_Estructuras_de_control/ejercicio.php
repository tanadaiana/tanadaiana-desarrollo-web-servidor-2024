
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
/*<?php
$suma = 0;
for ($i =0; $i <=20; i++){
if($i %2==0){
    $suma=$suma +$i;
}
}
?>*/
<?php
 echo <h3>$dia_espanol</h3>;

    $dia_espanol = date("l");//esto me da el dia en el que estamos 
    $dia_espanol= match ($dia_espanol) {
       
            "Monday"=> $dia_espanol = "Lunes";
            "Tuesday" => $dia_espanol = "Lunes";  
            "Wednesday"=>$dia_espanol = "Miércoles";
            "Thursday"=> $dia_espanol = "Jueves"; 
             "Friday"=>$dia_espanol = "Viernes";
             "Saturday"=> $dia_espanol = "Sábado"; 
             "Sunday"=> $dia_espanol = "Domingo";
               
               
        };
        echo <h3>meses españoles</h3>;

        $mes =date("F");//este me da el mes 
        $mes= match ($mes){

            "january"=>   "enero";
            "february" => "febrero";  
            "March"=> "Marzo";
            "April"=>  "abril"; 
             "May"=> "mayo";
             "June"=>  "junio"; 
             "july"=>  "julio";
             "agust"=>  "Agosto";
             "September"=> "Sepriembre";
             "October"=> "Octubre";
             "November"=>  "Noviembre";
             "December"=>  "Diciembre";
           
        };
        $dia=date("j");//te da el n umero de dia
        $anno =date("Y");//este me da el año,usar para el año y mayuscula

        echo <h3>"$dia_español $dia de $mes de $anno</h3>"

?>





</body>
</html>