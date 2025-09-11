<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Familia en Señas</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>Familia en Lengua de Señas</h1>
  <div class="mini-menu">
    <?php
      $familia = ["Papa", "Abuelo", "Abuela", "Familia", "Amigo"];
      foreach ($familia as $miembro) {
        echo "<a href='?persona=$miembro' class='btn'>$miembro</a>";
      }
    ?>
  </div>

  <div class="content">
    <?php
      if (isset($_GET['persona'])) {
        $persona = $_GET['persona'];
        echo "
        <video width='620' height='500' controls>
          <source src='assets/familia/$persona.mp4' type='video/mp4'>
          Tu navegador no soporta video.
        </video>";
      } else {
        echo "<p>Selecciona un miembro de la familia</p>";
      }
    ?>
  </div>

  <a href="index.php" class="back-btn">⬅ Volver al Menú</a>
</body>
</html>
