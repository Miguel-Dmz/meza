<?php
include('../conexion/conexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleUsuarios.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <?php include("header.php") ?>

  <div class="text">Cuentas Registradas</div>
        <div class="card-container">
            <?php
                $sql = "SELECT * FROM cliente";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<form action='' method='POST' class='card'>";
                        echo "<h2>" . $row['id_Cliente'] . "</h2>";
                        echo "<h2 >" . $row['nombre'] . "</h2>";
                        echo "<h2 >" . $row['correo'] . "</h2>";
                        echo "<h2>" . $row['direccion'] . "</h2>";
                        echo "<h2>" . $row['telefono'] . "</h2>";

                        echo "</form>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No products found</td></tr>";
                }
                ?>
        </div>

  

  <?php include("footer.php") ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>