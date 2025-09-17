<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Abecedario en Señas</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>Abecedario en Lengua de Señas</h1>
  <div class="mini-menu">
    <?php
      $letras = range('A', 'Z');
      foreach ($letras as $letra) {
        // En lugar de recargar la página, llamamos a la función JS
        echo "<button class='btn' onclick=\"mostrarVideo('$letra')\">$letra</button>";
      }
    ?>
  </div>

  <!-- Contenedor de video -->
  <div class="video-container">
    <video id="videoSeña" width="260" controls autoplay>
      <source id="videoSource" src="assets/abecedario/Letra A.mp4" type="video/mp4">
      Tu navegador no soporta videos.
    </video>
  </div>

  <script>
    function mostrarVideo(letra) {
      let video = document.getElementById("videoSeña");
      let source = document.getElementById("videoSource");

      source.src = "assets/abecedario/Letra " + letra + ".mp4";
      video.load();
      video.play();
    }
  </script>

  <a href="index.php" class="back-btn">⬅ Volver al Menú</a>
</body>
</html>
