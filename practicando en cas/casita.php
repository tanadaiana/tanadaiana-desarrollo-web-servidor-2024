$series = [
    ["Stranger Things", "The Duffer Brothers"],
    ["Breaking Bad", "Vince Gilligan"],
    ["The Crown", "Peter Morgan"],
    ["Game of Thrones", "David Benioff, D.B. Weiss"],
];

// Añadir más series
array_push($series, ["The Mandalorian", "Jon Favreau"]);
array_push($series, ["Squid Game", "Hwang Dong-hyuk"]);
array_push($series, ["Money Heist", "Álex Pina"]);
array_push($series, ["The Witcher", "Lauren Schmidt Hissrich"]);

// Borrar una serie a libre elección (puedes cambiar el índice si lo deseas)
unset($series[2]); // Eliminar "The Crown"

// Reasignar las claves
$series = array_values($series);

// Añadir la columna de popularidad aleatoria
for ($i = 0; $i < count($series); $i++) {
    $series[$i][2] = rand(1, 100);
}

// Añadir la columna de estado ALTA o BAJA
for ($i = 0; $i < count($series); $i++) {
    $popularidad = $series[$i][2];
    $series[$i][3] = ($popularidad < 50) ? "BAJA" : "ALTA";
}

// Añadir la columna de descripción de popularidad
for ($i = 0; $i < count($series); $i++) {
    $estado = $series[$i][3];
    $series[$i][4] = ($estado === "ALTA") ? "Popular" : "Menos Popular"; // Asignar descripción
}

// Ordenar alfabéticamente por las series
$_series = array_column($series, 0);
array_multisort($_series, SORT_ASC, $series);
?>
<!-- MOSTRAR LA TABLA -->
<table>
    <thead>
        <tr>
            <th>Serie</th>
            <th>Creador</th>
            <th>Popularidad</th>
            <th>Estado</th>
            <th>Descripción de Popularidad</th> <!-- Nueva columna para la descripción -->
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($series as $serie) {
            list($nombre, $creador, $popularidad, $estado, $descripcion) = $serie; // Agregar la descripción

            echo "<tr>";
            echo "<td>$nombre</td>";
            echo "<td>$creador</td>";
            echo "<td>$popularidad</td>";
            echo "<td>$estado</td>";
            echo "<td>$descripcion</td>"; // Mostrar la descripción
            echo "</tr>";
        }
        ?>
    </tbody>
</table>---------------------------
$series = [
    ["Stranger Things", "The Duffer Brothers"],
    ["Breaking Bad", "Vince Gilligan"],
    ["The Crown", "Peter Morgan"],
    ["Game of Thrones", "David Benioff, D.B. Weiss"],
];

// Añadir más series
array_push($series, ["The Mandalorian", "Jon Favreau"]);
array_push($series, ["Squid Game", "Hwang Dong-hyuk"]);
array_push($series, ["Money Heist", "Álex Pina"]);
array_push($series, ["The Witcher", "Lauren Schmidt Hissrich"]);

// Borrar una serie a libre elección (puedes cambiar el índice si lo deseas)
unset($series[2]); // Eliminar "The Crown"

// Reasignar las claves
$series = array_values($series);

// Añadir la columna de popularidad aleatoria
for ($i = 0; $i < count($series); $i++) {
    $series[$i][2] = rand(1, 100);
}

// Añadir la columna de estado ALTA o BAJA
for ($i = 0; $i < count($series); $i++) {
    $popularidad = $series[$i][2];
    $series[$i][3] = ($popularidad < 50) ? "BAJA" : "ALTA";
}

// Añadir la columna de descripción de popularidad
for ($i = 0; $i < count($series); $i++) {
    $estado = $series[$i][3];
    $series[$i][4] = ($estado === "ALTA") ? "Popular" : "Menos Popular"; // Asignar descripción
}

// Ordenar alfabéticamente por las series
$_series = array_column($series, 0);
array_multisort($_series, SORT_ASC, $series);
?>
<!-- MOSTRAR LA TABLA -->
<table>
    <thead>
        <tr>
            <th>Serie</th>
            <th>Creador</th>
            <th>Popularidad</th>
            <th>Estado</th>
            <th>Descripción de Popularidad</th> <!-- Nueva columna para la descripción -->
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($series as $serie) {
            list($nombre, $creador, $popularidad, $estado, $descripcion) = $serie; // Agregar la descripción

            echo "<tr>";
            echo "<td>$nombre</td>";
            echo "<td>$creador</td>";
            echo "<td>$popularidad</td>";
            echo "<td>$estado</td>";
            echo "<td>$descripcion</td>"; // Mostrar la descripción
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
Detalles del Código
