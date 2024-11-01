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
      <li><a href="reginfoexcursiones.php">Excursiones</a></li>
    </ul>
  </nav>


<form enctype="multipart/form-data" action="../conecproces/procesarficheros.php" method="POST">

    <input type="hidden" name="MAX_FILE_SIZE" value="600000" />

    Enviar este fichero: <input name="fichero_usuario" type="file" />
    <input type="submit" value="Enviar fichero" />
</form>

  </body>

  <p>No se envía a la base de datos, simplemente se almacena en el directorio ...xampp\htdocs\uploads</p><br>
  <footer>
    <p>&copy; 2024 Mi Crucero</p>
  </footer>
 </html>