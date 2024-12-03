<?php 
session_start();
$admin = $_SESSION['login_user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KeMonito</title>
    <link rel="stylesheet" href="stylePerfil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="encabezado">
<h1>KeMonitos</h1>
<h2>Zapatitos</h2>
</div>
  <?php include("header.php") ?>

  <div class="login-box">
        <h2>Bienvenido <?php echo $admin; ?></h2>
        <h2>¿Qué haremos hoy?</h2>
        <a href="../index.php" class="btn">Cerrar Sesion</a>
    </div>

  

  <?php include("footer.php") ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>