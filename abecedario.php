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
        echo "<a href='?letra=$letra' class='btn'>$letra</a>";
      }
    ?>
  </div>

  <!-- Contenedor de video -->
  <div class="video-container">
    <video id="videoSeña" width="260" controls autoplay>
      <source src="assets/abecedario/Letra A.mp4" type="video/mp4">
      Tu navegador no soporta videos.
    </video>
  </div>

  <script>
    function mostrarVideo(letra) {
      let video = document.getElementById("videoSeña");
      video.src = "assets/abecedario/Letra " + letra + ".mp4";
      video.load();
      video.play();
    }
  </script>

  <a href="index.php" class="back-btn">⬅ Volver al Menú</a>
</body>
</html>
