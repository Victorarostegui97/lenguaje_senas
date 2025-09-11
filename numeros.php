<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Números en Señas</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>Números en Lengua de Señas</h1>
  <div class="mini-menu">
    <?php
      for ($i = 1; $i <= 10; $i++) {
        echo "<a href='?num=$i' class='btn'>$i</a>";
      }
    ?>
  </div>

  <div class="content">
    <?php
      if (isset($_GET['num'])) {
        $num = $_GET['num'];
        echo "
        <video width='720' height='510' controls>
          <source src='assets/numeros/$num.mp4' type='video/mp4'>
          Tu navegador no soporta video.
        </video>";
      } else {
        echo "<p>Selecciona un número</p>";
      }
    ?>
  </div>

  <a href="index.php" class="back-btn">⬅ Volver al Menú</a>
</body>
</html>
