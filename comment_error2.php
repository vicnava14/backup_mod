<?php
// Ruta al archivo PHP que deseas modificar
$archivo = 'ruta/al/archivo.php';

// Línea que deseas modificar (en este ejemplo, modificaremos la línea 5)
$linea_a_modificar = 5;

// Nuevo contenido que deseas agregar en esa línea
$nuevo_contenido = '$nueva_variable = "Nuevo valor";';

// Leer el archivo PHP en un arreglo de líneas
$lineas = file($archivo);

if ($lineas === false) {
    die("No se pudo abrir el archivo.");
}

// Modificar la línea deseada
if (isset($lineas[$linea_a_modificar - 1])) {
    $lineas[$linea_a_modificar - 1] = rtrim($lineas[$linea_a_modificar - 1]) . $nuevo_contenido . "\n";
} else {
    die("La línea a modificar no existe en el archivo.");
}

// Reescribir el archivo con las modificaciones
if (file_put_contents($archivo, implode('', $lineas))) {
    echo "El archivo ha sido modificado exitosamente.";
} else {
    echo "No se pudo modificar el archivo.";
}
?>
