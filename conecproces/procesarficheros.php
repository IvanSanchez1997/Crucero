<?php
$dir_subida = 'C:/xampp/htdocs/uploads/';
$fichero_subido = $dir_subida . basename($_FILES['fichero_usuario']['name']);

echo '<pre>';

if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)) {
    // Mensaje de éxito en un alert
    echo "<script>alert('El fichero es válido y se subió con éxito.');</script>";
} else {
    // Mensaje de error en un alert
    echo "<script>alert('¡Posible ataque de subida de ficheros o error al subir!');</script>";
}

echo '<br><a href="../info/reginfodocumentacion.php"><button>Volver a Documentación</button></a>';

/* DESCOMENTA PARA VER EL ERROR
echo 'Más información de depuración:';
print_r($_FILES);

print "</pre>";

?>
*/