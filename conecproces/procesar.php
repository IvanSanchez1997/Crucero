<?php
// 1. Datos de conexión a la base de datos
include 'connect.php';


// Comprobar de dónde viene el formulario
if (isset($_POST['form_type'])) {

  // Si vienen de destino, recoger los datos
  if ($_POST['form_type'] == 'destino') {
    $destino = $_POST['destino'];
    $fecha = $_POST['fecha'];
    $descripcion = $_POST['descripcion'];
    // INSERTAR LOS DATOS:
    $sql = "INSERT INTO destinos (nombre, fecha_visita, descripcion) VALUES ('$destino', '$fecha', '$descripcion')";
    // COMPROBAR SI SE HAN REGISTRADO:
    if ($conn->query($sql) === TRUE) {
      echo "Registro agregado con éxito";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // Redirigir de vuelta a la página principal después de eliminar
    header("Location: ../info/reginfodestino.php");
    exit();
  }

  // Si vienen de checklist, recoger los datos
  elseif ($_POST['form_type'] == 'checklist') {
    $tarea = $_POST['tarea'];
    // INSERTAR LOS DATOS:
    $sql = "INSERT INTO checklist (tarea, completado) VALUES ('$tarea', 0)";
    // COMPROBAR SI SE HAN REGISTRADO:
    if ($conn->query($sql) === TRUE) {
      echo "Registro agregado con éxito";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // Redirigir de vuelta a la página principal
    header("Location: ../info/reginfoChecklist.php");
    exit();
  }

  // Si el formulario es para actualizar el estado de completado en checklist
  elseif ($_POST['form_type'] == 'update_checklist') {
    // Procesar la actualización del estado del checklist (completada o no)
    $sql = "UPDATE checklist SET completado = 0"; // Desmarcar todas las tareas
    $conn->query($sql);

    // Volver a marcar las tareas completadas
    if (isset($_POST['completado'])) {
      $completadas = $_POST['completado']; // Array de ids de las tareas completadas
      foreach ($completadas as $id) {
        $sql = "UPDATE checklist SET completado = 1 WHERE id = $id";
        $conn->query($sql);
      }
    }

    // Redirigir de vuelta a la página principal
    header("Location: ../info/reginfoChecklist.php");
    exit();
  }


  // Si viene de registrar una Excursión

  elseif ($_POST['form_type'] == 'excursiones') {
    $excursion = $_POST['excursiones'];
    $descripcion = $_POST['Descripcion_excursiones'];
    $destinocexcursion = $_POST['Destino_excursiones'];
    // INSERTAR LOS DATOS:
    $sql = "INSERT INTO excursiones (nombre, descripcion, destino_id) VALUES ('$excursion', '$descripcion', '$destinocexcursion')";
    //COMPROBAR SI SE HAN REGISTRADO:
    if ($conn->query($sql) === TRUE) {
      echo "Registro agregado con éxito";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // Redirigir de vuelta a la página principal
    header("Location: ../info/reginfoexcursiones.php");
    exit();
  }
}
// 5. Cerrar la conexión
$conn->close();

?>
