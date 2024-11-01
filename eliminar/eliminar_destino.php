<?php
include '../conecproces/connect.php';

// Obtener el id del destino a eliminar
$id = $_POST['id'];

// Comprobar si el id no está vacío
if (!empty($id)) {
  // Verificar si el destino tiene excursiones asociadas
  $sql = "SELECT COUNT(*) AS total FROM excursiones WHERE destino_id = $id";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  
  if ($row['total'] > 0) {
      // Si tiene excursiones, no permitir la eliminación
      echo "<script>
          alert('No se puede eliminar el destino porque tiene excursiones asociadas.');
          window.location.href = '../info/reginfodestino.php';
      </script>";
  } else {
      // Si no tiene excursiones, proceder con la eliminación
      $sql = "DELETE FROM destinos WHERE id = '$id'";
      if ($conn->query($sql) === TRUE) {
          echo "<script>
              alert('Destino eliminado con éxito.');
              window.location.href = '../info/reginfodestino.php';
          </script>";
      } else {
          echo "Error al eliminar el destino: " . $conn->error;
      }
  }
} else {
  echo "No se recibió ningún id de destino.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
