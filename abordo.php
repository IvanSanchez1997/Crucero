<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Viaje a los Fiordos Noruegos</title>
  <link rel="stylesheet" href="styles/styles.css">
  <script src="./script.js"></script>
</head>

<body>
  <header>
    <h1>Abordo del viaje a los Fiordos Noruegos</h1>
  </header>
  <nav>
    <ul>
      <li><a href="index.html">Pagina principal</a></li>
      <li><a href="info/reginfo.html">Info del viaje!</a></li>
    </ul>
  </nav>
  
  <section>
    <?php
    include 'conecproces/connect.php'; // Conexión a la base de datos

    // Consultar todos los destinos
    $sqlDestinos = "SELECT id, nombre, descripcion, fecha_visita FROM destinos";
    $resultDestinos = $conn->query($sqlDestinos);
    
    if ($resultDestinos->num_rows > 0) {
      // Mostrar cada destino
      while ($destino = $resultDestinos->fetch_assoc()) {
        $destino_id = $destino['id'];
        echo "<h2>" . $destino['nombre'] . "</h2>";
        echo "<p><strong>Descripción:</strong> " . $destino['descripcion'] . "</p>";
        echo "<p><strong>Fecha de Visita:</strong> " . $destino['fecha_visita'] . "</p>";

        // Consultar las excursiones asociadas al destino
        $sqlExcursiones = "SELECT nombre, descripcion FROM excursiones WHERE destino_id = $destino_id";
        $resultExcursiones = $conn->query($sqlExcursiones);

        if ($resultExcursiones->num_rows > 0) {
          echo "<h3>Excursiones</h3>";
          echo "<ul>";
          // Mostrar cada excursión asociada al destino
          while ($excursion = $resultExcursiones->fetch_assoc()) {
            echo "<li><strong>" . $excursion['nombre'] . ":</strong> " . $excursion['descripcion'] . "</li>";
          }
          echo "</ul>";
        } else {
          echo "<p>No hay excursiones registradas para este destino.</p>";
        }

        echo "<hr>"; // Separador entre destinos
      }
    } else {
      echo "<p>No hay destinos registrados.</p>";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
  </section>



  <footer>
    <p>&copy; 2024 Mi Crucero</p>
  </footer>
</body>
  </html>