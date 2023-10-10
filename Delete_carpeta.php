<?php
$carpeta_a_borrar = __DIR__ . '/nombre_de_la_carpeta_a_borrar'; // Reemplaza 'nombre_de_la_carpeta_a_borrar' con el nombre de tu carpeta

function borrarCarpeta($carpeta) {
    if (is_dir($carpeta)) {
        $archivos = scandir($carpeta);
        foreach ($archivos as $archivo) {
            if ($archivo != "." && $archivo != "..") {
                if (is_dir($carpeta . '/' . $archivo)) {
                    borrarCarpeta($carpeta . '/' . $archivo);
                } else {
                    unlink($carpeta . '/' . $archivo);
                }
            }
        }
        rmdir($carpeta);
    }
}

if (is_dir($carpeta_a_borrar)) {
    borrarCarpeta($carpeta_a_borrar);
    echo "La carpeta ha sido borrada exitosamente.";
} else {
    echo "La carpeta no existe o no se puede acceder.";
}
?>
