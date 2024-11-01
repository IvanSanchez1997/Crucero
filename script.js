// 1. Establece la fecha del viaje
var fechaViaje = new Date("August 23, 2025 00:00:00").getTime(); // Cambia a tu fecha y hora objetivo

// 2. Actualiza el contador cada segundo
var countdown = setInterval(function() {
  // 3. Obtén la fecha y hora actuales
  var ahora = new Date().getTime();

  // 4. Calcula la diferencia entre la fecha del viaje y la actual
  var diferencia = fechaViaje - ahora;

  // 5. Calcula los días, horas, minutos y segundos restantes
  var dias = Math.floor(diferencia / (1000 * 60 * 60 * 24));
  var horas = Math.floor((diferencia % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutos = Math.floor((diferencia % (1000 * 60 * 60)) / (1000 * 60));
  var segundos = Math.floor((diferencia % (1000 * 60)) / 1000);

  // 6. Muestra el resultado en el elemento con id="timer"
  document.getElementById("timer").innerHTML = dias + "d " + horas + "h "
  + minutos + "m " + segundos + "s ";

  // 7. Si el tiempo llega a 0, muestra un mensaje
  if (diferencia < 0) {
    clearInterval(countdown);
    document.getElementById("timer").innerHTML = "¡Ya comenzó el viaje!";
  }
}, 1000); // Actualiza cada segundo
