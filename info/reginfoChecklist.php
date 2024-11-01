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
      <li><a href="reginfodocumentacion.php">Documentación</a></li>
      <li><a href="reginfoexcursiones.php">Excursiones</a></li>
    </ul>
  </nav>

  <h2>Preparativos:</h2>
  <form action="../conecproces/procesar.php" method="post">
    <input type="hidden" name="form_type" value="checklist">
    
    <label for="tarea">Tarea:</label><br>
    <input type="text" id="tarea" name="tarea" required><br><br>
    
    <input type="submit" value="Enviar">
  </form>

  <?php
  include '../conecproces/connect.php';

  // Consultar todos los destinos registrados
  $sql = "SELECT id, tarea, completado FROM checklist";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      echo "<h2>Tareas del Checklist</h2>";

      // Abrir formulario para la actualización de los checkboxes
      echo "<form action='../conecproces/procesar.php' method='post'>";
      echo "<input type='hidden' name='form_type' value='update_checklist'>";

      echo "<table border='1'>
              <tr>
                <th>Tarea</th>
                <th>Completado</th>
                <th>Acciones</th>
              </tr>";

      // Mostrar cada fila como una nueva entrada en la tabla
      while ($row = $result->fetch_assoc()) {
          // Si la tarea está completada, el checkbox debe estar marcado
          $checked = $row['completado'] ? 'checked' : '';
          
          echo "<tr>
                  <td>" . $row["tarea"] . "</td>
                  <td>
                      <input type='checkbox' name='completado[]' value='" . $row['id'] . "' $checked>
                  </td>
                  <td>
                    <form action='../eliminar/eliminar_checklist.php' method='post' style='display:inline;'>
                      <input type='hidden' name='id' value='" . $row['id'] . "'>
                      <input type='submit' value='Eliminar'>
                    </form>
                  </td>
                </tr>";
      }

      echo "</table>";
      // Botón para actualizar el estado de las tareas completadas
      echo "<input type='submit' value='Actualizar checklist'>";
      echo "</form>";
  } else {
      echo "No hay tareas registradas.";
  }

  // Cerrar la conexión a la base de datos
  $conn->close();
  ?>
    <footer>
    <p>&copy; 2024 Mi Crucero</p>
  </footer>
</body>
</html>
