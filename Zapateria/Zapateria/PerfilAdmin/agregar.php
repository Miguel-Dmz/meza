<?php
include('../conexion/conexion.php');
$shouldPlaySound = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $descripcion = $_POST['descripcion'];
    $tipo = $_POST['tipo'];
    $image = $_FILES['image']['name'];

    // Prevenir SQL Injection
    $name = $conn->real_escape_string($name);
    $price = $conn->real_escape_string($price);
    $stock = $conn->real_escape_string($stock);
    $descripcion = $conn->real_escape_string($descripcion);
    $tipo = $conn->real_escape_string($tipo);
    $image = $conn->real_escape_string($image);

    // Subir la imagen
    $target_dir = "../images/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $sql = "INSERT INTO plato (nombre, precio, stock, image, descripcion, tipo) VALUES ('$name', '$price', '$stock', '$target_file', '$descripcion', '$tipo')";
    
    if ($conn->query($sql) === TRUE) {
        $shouldPlaySound = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleAgregar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <?php include("header.php") ?>

  <div class="text">Registro de Productos</div>
        <div class="login-box">
        <h2>Registrar Producto</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="textbox">
                <input type="text" placeholder="Nombre del Producto" name="name" required>
            </div>
            <div class="textbox">
                <input type="text" placeholder="Descripcion del Producto" name="descripcion" required>
            </div>
            <div class="textbox">
                <input type="text" placeholder="Precio" name="price" required>
            </div>
            <div class="textbox">
                <input type="text" placeholder="Stock" name="stock" required>
            </div>
            <div class="textbox">
                <input type="text" placeholder="Tipo" name="tipo" required>
            </div>
            <div class="textbox">
                <input type="file" name="image" required>
            </div>
            <input type="submit" class="btn" value="Register">
        </form>
    </div>

  

  <?php include("footer.php") ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>