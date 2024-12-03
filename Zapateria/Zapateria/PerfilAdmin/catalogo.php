<?php
include('../conexion/conexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylePerfil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <?php include("header.php") ?>

  <div class="login-box">
        <h2>Inventario</h2>
        <table>
            <tr>
                <th>Imagen de Producto</th>
                <th>Nombre de Producto</th>
                <th>ID</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Tipo</th>
                <th>Descripcion</th>
            </tr>
            <?php
            $sql = "SELECT * FROM plato";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><img src='" . $row['image'] . "' alt='" . $row['nombre'] . "' width='50' height='50'></td>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>" . $row['id_Plato'] . "</td>";
                    echo "<td>$" . $row['precio'] . "</td>";
                    echo "<td>" . $row['stock'] . "</td>";
                    echo "<td>" . $row['tipo'] . "</td>";
                    echo "<td>" . $row['descripcion'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No products found</td></tr>";
            }
            ?>
        </table>
    </div>

  

  <?php include("footer.php") ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>