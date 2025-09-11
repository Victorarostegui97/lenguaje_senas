<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Juego Abecedario</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    .opciones {
      margin-top: 15px;
    }
    .opciones button {
      margin: 5px;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      border: none;
      border-radius: 8px;
      background: #007BFF;
      color: white;
      transition: 0.3s;
    }
    .opciones button.correcta {
      background: green !important;
    }
    .opciones button.incorrecta {
      background: red !important;
    }
    #siguienteBtn {
      display: none;
      margin-top: 20px;
      padding: 12px 25px;
      font-size: 16px;
      background: orange;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }
    #puntaje {
      font-size: 18px;
      margin: 15px 0;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <h1>🎮 Juego del Abecedario en Lengua de Señas</h1>
  <a href="index.php">⬅ Volver al menú</a>

  <!-- Marcador de puntaje -->
  <div id="puntaje">Aciertos: 0 | Intentos: 0</div>

  <div id="juego">
    <video id="videoLetra" width="260" controls>
      <source src="" type="video/mp4">
      Tu navegador no soporta video.
    </video>

    <div class="opciones" id="opciones"></div>
    <button id="siguienteBtn" onclick="nuevoJuego()">➡ Siguiente</button>
  </div>

  <script>
    // Lista de letras disponibles
    const letras = ["A", "B", "C", "D", "E"]; // Agregá todas las letras

    let letraCorrecta = "";
    let aciertos = 0;
    let intentos = 0;

    function actualizarPuntaje() {
      document.getElementById("puntaje").textContent =
        `Aciertos: ${aciertos} | Intentos: ${intentos}`;
    }

    function nuevoJuego() {
      document.getElementById("siguienteBtn").style.display = "none";

      // Seleccionar letra al azar
      letraCorrecta = letras[Math.floor(Math.random() * letras.length)];

      // Cargar video
      const video = document.getElementById("videoLetra");
      video.src = `assets/abecedario/Letra ${letraCorrecta}.mp4`;
      video.load();

      // Generar opciones
      generarOpciones();
    }

    function generarOpciones() {
      let opciones = [letraCorrecta];

      // Elegir 2 incorrectas
      while (opciones.length < 3) {
        let random = letras[Math.floor(Math.random() * letras.length)];
        if (!opciones.includes(random)) {
          opciones.push(random);
        }
      }

      // Mezclar
      opciones = opciones.sort(() => Math.random() - 0.5);

      // Renderizar
      const divOpciones = document.getElementById("opciones");
      divOpciones.innerHTML = "";

      opciones.forEach(opcion => {
        const boton = document.createElement("button");
        boton.textContent = opcion;
        boton.onclick = () => verificarRespuesta(boton, opcion);
        divOpciones.appendChild(boton);
      });
    }

    function verificarRespuesta(boton, opcion) {
      intentos++;

      const botones = document.querySelectorAll("#opciones button");
      botones.forEach(b => {
        if (b.textContent === letraCorrecta) {
          b.classList.add("correcta");
        } else {
          b.classList.add("incorrecta");
        }
        b.disabled = true;
      });

      if (opcion === letraCorrecta) {
        aciertos++;
        document.getElementById("siguienteBtn").style.display = "inline-block";
      } else {
        // Respuesta incorrecta → recargar la misma letra para volver a intentar
        setTimeout(() => {
          nuevoJuego();
        }, 1500);
      }

      actualizarPuntaje();
    }

    // Iniciar
    actualizarPuntaje();
    nuevoJuego();
  </script>
</body>
</html>
