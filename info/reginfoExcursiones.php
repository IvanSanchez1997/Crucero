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
      <li><a href="reginfodestino.php">Destinos</a></li>
      <li><a href="reginfoChecklist.php">Checklist</a></li>
      <li><a href="reginfodocumentacion.php">Documentación</a></li>

    </ul>
  </nav>

<body>
  <h2>Registrar información del viaje</h2>
  <form action="../conecproces/procesar.php" method="post">
    <input type="hidden" name="form_type" value="excursiones">
    
    <label for="excursiones">Excursion:</label><br>
    <input type="text" id="excursiones" name="excursiones" required><br><br>

    <label for="Descripcion_excursiones">Detalles</label><br>
    <input type="text" id="Descripcion_excursiones" name="Descripcion_excursiones" required><br><br>

    <label for="Destino_excursiones">Destino</label><br>
    <!--AQUÍ HABRÁ QUE METER LOS DESTINOS QUE ESTÁN EN BASE DE DATOS-->
    <select id="Destino_excursiones" name="Destino_excursiones" required>
    <?php
    include '../conecproces/connect.php';
    
    $sqle = "SELECT id, nombre FROM destinos";
    $result = $conn->query($sqle);
    while ($row = $result->fetch_assoc()) {
      echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
    }
    
    $conn->close();
    ?>
    </select>
    <!-- ESTO HAY QUE BORRARLO CREO<input type="text" id="Destino_excursiones" name="Destino_excursiones" required><br><br>-->
    <input type="submit" value="Enviar">
  </form>


<?php
include '../conecproces/connect.php';
// Consultar todas las excursiones registradas
$sql = "SELECT id, nombre, descripcion, destino_id FROM excursiones";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<h2>Excursiones registrados</h2>";
  echo "<table border='1'>
          <tr>
            <th>Excursion</th>
            <th>Detalles</th>
            <th>Destino</th>
          </tr>";

  // Mostrar cada fila como una nueva entrada en la tabla y mostrar botón de eliminar
  while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . $row["nombre"] . "</td>
            <td>" . $row["descripcion"] . "</td>
            <td>" . $row["destino_id"] . "</td>
            <td>
              <form action='../eliminar/eliminar_excursion.php' method='post'>
              <input type='hidden' name='id' value='" . $row["id"] . "'>
                <input type='submit' value='Eliminar'>
              </form>
            </td>
          </tr>";
  }
  echo "</table>";
} else {
  echo "No hay excursiones registradas.";
}
// Cerrar la conexión a la base de datos
$conn->close();
?>
<footer>
    <p>&copy; 2024 Mi Crucero</p>
  </footer>

  </body>

</html>