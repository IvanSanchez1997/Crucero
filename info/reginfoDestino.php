<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Viaje a los Fiordos Noruegos</title>
  <link rel="stylesheet" href="../styles/styles.css">
  <script src="./script.js"></script>
</head>


<body>
  <header>
    <h1>Mi Viaje a los Fiordos Noruegos</h1>
  </header>

  <nav>
    <ul>
    <li><a href="../index.html">Página principal</a></li>
      <li><a href="reginfoChecklist.php">Checklist</a></li>
      <li><a href="reginfodocumentacion.php">Documentación</a></li>
      <li><a href="reginfoexcursiones.php">Excursiones</a></li>
    </ul>
  </nav>


  <h2>Registrar información del viaje</h2>
  <form action="../conecproces/procesar.php" method="post">
    <input type="hidden" name="form_type" value="destino">
    
    <label for="destino">Destino:</label><br>
    <input type="text" id="destino" name="destino" required><br><br>

    <label for="fecha">Fecha del viaje:</label><br>
    <input type="date" id="fecha" name="fecha" required><br><br>
    
    <label for="descripcion">Descripcion:</label><br>
    <input type="text" id="descripcion" name="descripcion" required><br><br>

    
    <input type="submit" value="Enviar">
  </form>


<?php
include '../conecproces/connect.php';
// Consultar todos los destinos registrados
$sql = "SELECT id, nombre, fecha_visita, descripcion FROM destinos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<h2>Destinos registrados</h2>";
  echo "<table border='1'>
          <tr>
            <th>Destino</th>
            <th>Fecha de Visita</th>
            <th>Descripción</th>
          </tr>";

  // Mostrar cada fila como una nueva entrada en la tabla y mostrar botón de eliminar
  while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . $row["nombre"] . "</td>
            <td>" . $row["fecha_visita"] . "</td>
            <td>" . $row["descripcion"] . "</td>
            <td>
              <form action='../eliminar/eliminar_destino.php' method='post'>
              <input type='hidden' name='id' value='" . $row["id"] . "'>
                <input type='submit' value='Eliminar'>
              </form>
            </td>
          </tr>";
  }
  echo "</table>";
} else {
  echo "No hay destinos registrados.";
}
// Cerrar la conexión a la base de datos
$conn->close();
?>
<footer>
    <p>&copy; 2024 Mi Crucero</p>
  </footer>

  </body>

</html>