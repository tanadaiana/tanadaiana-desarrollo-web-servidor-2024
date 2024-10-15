<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes</title>
</head>
<body>
    <?php
       
        /**
         * Ejercicio 1: Añadir al array 4 estudiantes con sus asignaturas
         * 
         * Ejercicio 2: Eliminar 1 estudiante y su asignatura a libre eleción
         * 
         * Ejercicio 3: Añadir una tercera columna que sera la nota, obtenida aleatoriamente entre 1 y 10
         * 
         *  Ejercicio 4: Añadir una cuarta columna que indique APTO o NO APTO,
         * dependiendo de si la nota es igual o superior a 5 o no
         * 
         *  Ejercicio 5: Ordenar alfabéticamente por los alumnos, y luego p
         *  $notas = [
         * ["Paco", "Desarrollo web servidor"],
         * ["Paco", "Desarrollo web cliente"],
         * ["Manu", "Desarrollo web servidor"],
         * ["Manu", "Desarrollo web cliente"] 
         *          ];*/
        $notas = [
            ["Paco", "Desarrollo web servidor"],
            ["Manu", "Desarrollo web cliente"],
            ["Manu", "Desarrollo web servidor"],
            ["Manu", "Desarrollo web cliente"]

        ];

     ?>
     <?php 
        //añadir

        array_push($notas,["Guillermo", "Diseño de interfaces"]);
        array_push($notas,["Guillermo", "Diseño de aplicaciones web"]);
        array_push($notas,["Guillermo", "Desarrollo web cliente"]);
        array_push($notas,["Joaquin", "Diseño de interfaces"]);

        //borrar
        unset($notas[1]);

        //reasigno las claves
        $notas  =  array_values($notas);

        //añadir columnas va a acer si o si

        for($i = 0; $i < count($notas); $i++){
            $notas[$i][2] = rand(1,10);
        }

        for($i = 0; $i < count($notas); $i++){
            $nota = $notas[$i][2];

            if($nota < 5){
                $notas[$i][3] = "NO APTO";
            }else{
                $notas[$i][3] = "APTO";
            }
        }

        //Ordenarlo

        $_estudiante = array_colum($notas,0);
        $_asignatura = array_colum($notas,1);
        $_nota = array_colum($notas,2);

        array_multisort($_estudiante, SORT_ASC,
                        )
     ?>

//MOSTRAR LA TABLA

<table>
    <thead>
        <tr>
            <th>Asignatura</th>
            <th>Nota</th>
            <th>Calificacion</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($notas as $nota){
            list($estudiante, $asignatura, $punto, $calificaciones) = $nota;

            echo "<td>$estudiante</td>";
            echo "<td>$asignatura</td>";
            echo "<td>$punto</td>";
            echo "<td>$calificaciones</td>";
        }
        ?>
    </tbody>
</table>

    
</body>
</html>