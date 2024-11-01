<?php
include '../conecproces/connect.php';

// Obtener el id del destino a eliminar
$id = $_POST['id'];

// Comprobar si el id no está vacío
if (!empty($id)) {
  // Preparar y ejecutar la consulta SQL para eliminar el destino
  $sql = "DELETE FROM checklist WHERE id = '$id'";
  
  if ($conn->query($sql) === TRUE) {
    echo "Tarea eliminada con éxito.";
  } else {
    echo "Error al eliminar la tarea: " . $conn->error;
  }
} else {
  echo "No se recibió ningún id de tarea.";
}

// Cerrar la conexión a la base de datos
$conn->close();

// Redirigir de vuelta a la página principal después de eliminar
header("Location: ../info/reginfoChecklist.php");
exit();
?>