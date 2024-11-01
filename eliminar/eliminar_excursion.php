<?php
include '../conecproces/connect.php';

// Obtener el id de la excursion a eliminar
$id = $_POST['id'];

// Comprobar si el id no está vacío
if (!empty($id)) {
  // Preparar y ejecutar la consulta SQL para eliminar la excursion
  $sql = "DELETE FROM excursiones WHERE id = '$id'";
  
  if ($conn->query($sql) === TRUE) {
    echo "Excursion eliminada con éxito.";
  } else {
    echo "Error al eliminar la excursion: " . $conn->error;
  }
} else {
  echo "No se recibió ningún id de excursiones.";
}

// Cerrar la conexión a la base de datos
$conn->close();

// Redirigir de vuelta a la página principal después de eliminar
header("Location: ../info/reginfoexcursiones.php");
exit();
?>
